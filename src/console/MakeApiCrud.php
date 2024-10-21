<?php

namespace Wisnubaldas\BaldasModule\console;

use Illuminate\Console\Command;
use Illuminate\Contracts\Console\PromptsForMissingInput;
use Wisnubaldas\BaldasModule\modular\ApiCrudClass;

class MakeApiCrud extends Command implements PromptsForMissingInput
{
    use ConsoleTrait;

    protected $signature = 'make:custom-model {name}';

    protected $description;

    protected $conn;

    protected $crud;

    public function __construct(ApiCrudClass $crud)
    {
        $this->description = $this->teal('Jalanin ini bikin route,controller,model,request,repository,..etc.', true);
        parent::__construct();
        $crud->allConn = config('database.connections');
        $this->crud = $crud;
    }

    public function handle()
    {
        $this->crud->argName = $this->argument('name');
        $this->crud->validateName($this->crud->argName);
        $koneksi = $this->crud->select_connection();
        $table = $this->crud->show_table($koneksi);
        $ok = $this->crud->confirm($this->green('Koneksi :'.$koneksi), $this->yellow('Table :'.$table));
        if ($ok) {
            $this->crud->create_crud();
        }
    }

    protected function promptForMissingArgumentsUsing(): array
    {
        return [
            'name' => 'Nama Model nya apa...???',
        ];
    }
}
