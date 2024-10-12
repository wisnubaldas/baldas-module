<?php

namespace Wisnubaldas\BaldasModule\console;

use Illuminate\Console\Command;
use Illuminate\Contracts\Console\PromptsForMissingInput;
use Wisnubaldas\BaldasModule\modular\ApiCrudClass;

// use Wisnubaldas\BaldasModule\modular\RouteConsoleClass;

class MakeApiCrud extends Command implements PromptsForMissingInput
{
    use ConsoleTrait;

    protected $signature = 'make:api-crud {name}';

    protected $description;

    protected $conn;

    protected $crud;

    public function __construct(ApiCrudClass $crud)
    {
        $this->description = $this->teal('Jalanin ini bikin route,controller,model,request,repository,..etc. Udah terintegrasi sama API Doc nya juga', true);
        parent::__construct();
        $crud->allConn = config('database.connections');
        $this->crud = $crud;
    }

    public function handle()
    {
        $this->crud->argName = $this->argument('name');
        $this->crud->validateName($this->crud->argName);
        $koneksi = $this->crud->select_connection();
        $this->info($this->indigo('Koneksi DB : '.$this->red($koneksi, 'bold')));
        $table = $this->crud->show_table($koneksi);
        $ok = $this->crud->confirm($this->green('Koneksi :'.$koneksi), $this->yellow('Table :'.$table));
        if ($ok) {
            $this->crud->create_crud();
            
        }
    }

    protected function promptForMissingArgumentsUsing(): array
    {
        return [
            'name' => 'Nama api crud nya apa...???',
        ];
    }
}
