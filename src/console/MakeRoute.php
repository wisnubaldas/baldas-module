<?php
namespace Wisnubaldas\BaldasModule\console;

use Illuminate\Console\Command;
// use Wisnubaldas\BaldasModule\MyHelper;
use Wisnubaldas\BaldasModule\modular\RouteConsoleClass;
class MakeRoute extends Command
{
    use ConsoleTrait;

    protected $signature = 'make:route {name} {--C|controller} {--M|model}';
    protected $description;

    public function __construct() {
        $this->description = $this->teal('Bikin route terpisah',true);
        $this->choice_message = $this->yellow('Pilih route yg mau di buat...? default',true);
        // $this->helper = new MyHelper;

        parent::__construct();
    }
    public function handle()
    {

        $name = $this->argument('name');
        $choice = $this->choice($this->choice_message,
            ['web', 'api'],
            'web',
            $maxAttempts = null,
            $allowMultipleSelections = false
        );

        $message = RouteConsoleClass::run(
                    $name,
                    $choice,
                    $controller = $this->option('controller'),
                    $model = $this->option('model'),
            );
        foreach ($message as $v) {
            $this->line($this->pink($v,true));
        }
        return Command::SUCCESS;
    }
}
