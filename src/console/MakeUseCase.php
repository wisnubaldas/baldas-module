<?php
namespace Wisnubaldas\BaldasModule\console;

use Illuminate\Console\Command;
use Wisnubaldas\BaldasModule\MyHelper;
// use Wisnubaldas\BaldasModule\modular\RouteConsoleClass;
class MakeUseCase extends Command
{
    use ConsoleTrait;

    protected $signature = 'make:use-case {name}';
    protected $description;

    public function __construct() {
        $this->description = $this->teal('Bikin class UseCase',true);
        parent::__construct();
    }
    public function handle()
    {

        $name = $this->argument('name');
        $this->create_use_case($name);
        return Command::SUCCESS;
    }
    private function create_use_case($name)
    {
        $h = new MyHelper;
        $stb = $h->load_stub('use-case');
        $contents = $h->parsing_stub($stb,[
                    'className'=>\ucfirst($name)
                ]);
        $file = $h->use_case_path(\ucfirst($name).'UseCase.php');

        // untuk file interface nya
        $intStub = $h->load_stub('use-case-interface');
        $interface = $h->parsing_stub($intStub,[
                    'className'=>\ucfirst($name)
                ]);
        $interfaceFile = $h->use_case_path(\ucfirst($name).'UseCaseInterface.php');
        
        if($h->cek_file_exists($file)){
            $h->save_file($file,$contents);
            $h->save_file($interfaceFile,$interface);
            $repo_file = $h->file_repository_provider();
                if($repo_file){
                    $h->_bind(
                            $repo_file,
                            '\App\UseCase\\'.\ucfirst($name).'UseCaseInterface::class',
                            '\App\UseCase\\'.\ucfirst($name).'UseCase::class'
                        );
                }else{
                    $this->line("ERROR binding ke repository provider");
                }
            $this->line("INFO useCase ".$file.' sukses di buat');
        }else{
            $this->line("ERROR usecase file sudah pernah dibuat");
        }
    }
}
