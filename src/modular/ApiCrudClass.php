<?php
namespace Wisnubaldas\BaldasModule\modular;
use function Laravel\Prompts\select;
use function Laravel\Prompts\clear;
use function Laravel\Prompts\confirm;
final class ApiCrudClass extends MainConsole implements ApiCrudInterface
{
    public $allConn;
    public $argName;
    public string $selectConn;
    public string $selectTable;
    
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
        $db = \DB::connection($conn);
        $tabels = $db->select('SHOW TABLES');
        $tabels = collect($tabels)->transform(function ($item, $key) {
            return array_values((array) $item)[0];
        })->toArray();

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
            label: 'Apakah ini sudah benar ? ' . implode(", ", $status),
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
                    $max = "max:" . preg_replace('/[^0-9]/', '', $v['type']);
                    break;
            }
            $x = [
                $v['nullable'] ? 'nullable' : 'required',
                $v['type_name'],
                'min:1',
                $max
            ];
            $x = array_filter($x);
            $rules[$v['name']] = $x;
        }
        $this->makeAll($field, $kolom, $rules);
    }
    /**
     * Bikin semuanya
     * @param mixed $field
     * @param mixed $kolom
     * @param mixed $rules
     * @return void
     */
    protected function makeAll($field, $kolom, $rules)
    {
        $nsCls = $this->ns_cls($this->argName,'App\Models');
        $stubModel = $this->stubFile('model');
        
        // $str =  $this->replace_content_stub($stubModel);
        // dump($str);
        // \Artisan::call(
        //     'make:model',
        //     array('name' => $this->arg_name)
        // );
    }
    
    
}
