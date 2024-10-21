<?php

namespace Wisnubaldas\BaldasModule\console;

use Illuminate\Console\Command;
use Illuminate\Contracts\Console\PromptsForMissingInput;
use Wisnubaldas\BaldasModule\modular\DomainClass;
use Wisnubaldas\BaldasModule\MyHelper;

class MakeDomain extends Command implements PromptsForMissingInput
{
    use ConsoleTrait;
    protected $signature = 'make:domain {name}';
    protected $description;
    protected $domain;
    public function __construct(DomainClass $domain)
    {
        $this->description = $this->teal('Bikin class Domain', true);
        parent::__construct();
        $this->domain = $domain;
    }

    public function handle()
    {
        $name = $this->argument('name');
        $this->domain->build($name);
    }

    private function create_domain($name)
    {
        $h = new MyHelper;
        $stb = $h->load_stub('domain');
        $contents = $h->parsing_stub($stb, [
            'className' => \ucfirst($name),
        ]);
        $file = $h->domain_path(\ucfirst($name) . 'Domain.php');

        // untuk file interface nya
        $intStub = $h->load_stub('domain-interface');
        $interface = $h->parsing_stub($intStub, [
            'className' => \ucfirst($name),
        ]);
        $interfaceFile = $h->domain_path(\ucfirst($name) . 'DomainInterface.php');

        if ($h->cek_file_exists($file)) {
            $h->save_file($file, $contents);
            $h->save_file($interfaceFile, $interface);
            $repo_file = $h->file_repository_provider();
            if ($repo_file) {
                $h->_bind(
                    $repo_file,
                    '\App\Domain\\' . \ucfirst($name) . 'DomainInterface::class',
                    '\App\Domain\\' . \ucfirst($name) . 'Domain::class'
                );
            } else {
                $this->line('ERROR binding ke repository provider');
            }
            $this->line('INFO Doamin ' . $file . ' sukses di buat');
        } else {
            $this->line('ERROR Domain file sudah pernah dibuat');
        }
    }
}
