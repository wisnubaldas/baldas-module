<?php

namespace Wisnubaldas\BaldasModule\modular;

use function Laravel\Prompts\clear;
use function Laravel\Prompts\confirm;
use function Laravel\Prompts\select;
use function Laravel\Prompts\info;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

final class ApiCrudClass extends MainConsole implements ApiCrudInterface
{
    public $allConn;

    public $argName;

    public string $selectConn;

    public string $selectTable;

    public function __construct()
    {
        parent::__construct();
    }

    public function select_connection(): int|string
    {
        $koneksiDB = select(
            label: 'Pilih koneksi database yang digunakan',
            options: array_keys($this->allConn),
            hint: 'Koneksi database akan di gunakan oleh model yg dibuat',
            required: true,
            scroll: 5
        );
        clear();
        $this->selectConn = $koneksiDB;

        return $koneksiDB;
    }

    public function show_table($conn)
    {
        switch ($conn) {
            case 'sqlite':
                $q = \DB::connection($conn)->select("SELECT name FROM sqlite_master WHERE type='table' ORDER BY name;");
                $tabels = collect($q)->pluck('name')->toArray();
                break;
            default:
                $db = \DB::connection($conn);
                $tabels = $db->select('SHOW TABLES');
                $tabels = collect($tabels)->transform(function ($item, $key) {
                    return array_values((array) $item)[0];
                })->toArray();
                break;
        }

        $tbl = select(
            label: 'Pilih table yang ingin digunakan :',
            options: (array) $tabels,
            hint: 'Table yang akan digunakan pada Model',
            required: true,
            scroll: 5
        );
        clear();
        $this->selectTable = $tbl;

        return $tbl;
    }

    public function confirm(...$status)
    {
        $confirmed = confirm(
            label: 'Apakah ini sudah benar ? ' . implode(', ', $status),
            default: true,
            yes: 'I accept',
            no: 'I decline',
            hint: 'The terms must be accepted to continue.'
        );
        clear();
        return $confirmed;
    }

    public function create_crud()
    {
        $db = \DB::connection($this->selectConn);
        $field = $db->getSchemaBuilder()->getColumnListing($this->selectTable);
        $kolom = $db->getSchemaBuilder()->getColumns($this->selectTable);
        $rules = [];
        foreach ($kolom as $v) {
            switch ($v['type_name']) {
                case 'varchar':
                case 'text':
                    $v['type_name'] = 'string';
                    break;
                case 'bigint':
                case 'int':
                    $v['type_name'] = 'integer';
                    break;
            }
            $max = '';
            switch ($v['type']) {
                case 'timestamp':
                case 'text':
                    $max = false;
                    break;
                default:
                    $max = 'max:' . preg_replace('/[^0-9]/', '', $v['type']);
                    break;
            }
            $x = [
                $v['nullable'] ? 'nullable' : 'required',
                $v['type_name'],
                'min:1',
                $max,
            ];
            $x = array_filter($x);
            $rules[$v['name']] = $x;
        }
        $this->makeAll($field, $rules);
    }

    /**
     * Bikin semuanya
     *
     * @param  mixed  $field
     * @param  mixed  $rules
     * @return void
     */
    protected function makeAll($field, $rules)
    {
        // create model
        $nsClsModel = $this->ns_cls($this->argName, 'App\Models');
        $prop = array_merge(
            $nsClsModel,
            ['connection' => $this->selectConn],
            ['table' => $this->selectTable],
            ['primaryKey' => $field[0]],
            ['field' => $field],
            ['rules' => $rules]
        );
        $stubModel = $this->stubFile('model');
        $str = $this->replace_content_stub($stubModel, $prop);
        $fileModel = $this->save_file($str, $nsClsModel, $this->argName);
        
        $confirmedController = confirm('Mau bikin Controller nya ?');
        if($confirmedController){
            $nsClsController = $this->ns_cls($this->argName, 'App\Http\Controllers');
            $prop = array_merge(
                $nsClsController,
                ['fileName' => $this->argName . 'Controller'],
                ['connection' => $this->selectConn],
            );
            $stubController = $this->stubFile('controller.api');
            $content = $this->replace_content_stub($stubController, $prop);
            $this->save_file($content, $nsClsController, $prop['fileName']);
            $this->save_file_storage(json_encode( $rules,JSON_PRETTY_PRINT),'responses',$this->argName.'.json');
        }

        $confirmedRequest = confirm('Mau bikin request nya ?');
        if ($confirmedRequest) {
            // create request
            $nsClsRequest = $this->ns_cls($this->argName.'Request', 'App\Http\Requests');
            $prop = array_merge(
                $nsClsRequest,
                ['fileName' => $this->argName . 'Request'],
                ['connection' => $this->selectConn],
                ['table' => $this->selectTable],
                ['primaryKey' => $field[0]],
                ['field' => $field],
                ['rules' => $rules]
            );
            $stubRequest = $this->stubFile('request');
            $content = $this->replace_content_stub($stubRequest, $prop);
            $fileRequest = $this->save_file($content, $nsClsRequest, $this->argName . 'Request');
        }
        $confirmedRepo = confirm('Mau bikin repository nya ?');
        if ($confirmedRepo) {
            \Artisan::call(
                'make:repository',
                ['name' => $this->argName, '--skip-model' => true, '--skip-migration' => true]
            );
            info("Sukses membuat " . \Artisan::output());
            $confirmedBin = confirm('Mau bikin binding repository nya ?');
            if ($confirmedBin) {
                \Artisan::call(
                    'make:bindings',
                    ['name' => 'App\\Models\\' . $this->argName]
                );
                info("Sukses membuat " . \Artisan::output());
            }
        }
    }
}
