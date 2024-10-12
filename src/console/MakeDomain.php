<?php

namespace Wisnubaldas\BaldasModule\console;

use Illuminate\Console\Command;
use Wisnubaldas\BaldasModule\MyHelper;

// use Wisnubaldas\BaldasModule\modular\RouteConsoleClass;
class MakeDomain extends Command
{
    use ConsoleTrait;

    protected $signature = 'make:domain {name}';

    protected $description;

    public function __construct()
    {
        $this->description = $this->teal('Bikin class Domain beserta jajarannya', true);
        parent::__construct();
    }

    public function handle()
    {

        $name = $this->argument('name');
        $this->create_domain($name);

        return Command::SUCCESS;
    }

    private function create_domain($name)
    {
        $h = new MyHelper;
        $stb = $h->load_stub('domain');
        $contents = $h->parsing_stub($stb, [
            'className' => \ucfirst($name),
        ]);
        $file = $h->domain_path(\ucfirst($name).'Domain.php');

        // untuk file interface nya
        $intStub = $h->load_stub('domain-interface');
        $interface = $h->parsing_stub($intStub, [
            'className' => \ucfirst($name),
        ]);
        $interfaceFile = $h->domain_path(\ucfirst($name).'DomainInterface.php');

        if ($h->cek_file_exists($file)) {
            $h->save_file($file, $contents);
            $h->save_file($interfaceFile, $interface);
            $repo_file = $h->file_repository_provider();
            if ($repo_file) {
                $h->_bind(
                    $repo_file,
                    '\App\Domain\\'.\ucfirst($name).'DomainInterface::class',
                    '\App\Domain\\'.\ucfirst($name).'Domain::class'
                );
            } else {
                $this->line('ERROR binding ke repository provider');
            }
            $this->line('INFO Doamin '.$file.' sukses di buat');
        } else {
            $this->line('ERROR Domain file sudah pernah dibuat');
        }
    }
}
