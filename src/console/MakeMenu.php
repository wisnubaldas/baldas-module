<?php
namespace Wisnubaldas\BaldasModule\console;

use Illuminate\Console\Command;
use Wisnubaldas\BaldasModule\modular\MakeMenuClass;
class MakeMenu extends Command{
    use ConsoleTrait;
    protected $signature = 'make:menu';
    protected $description;
    protected $menu;
    public function __construct(MakeMenuClass $menu)
    {
        $this->description = $this->teal('Generate menu ', true);
        $this->menu = $menu;
        parent::__construct();
    }
    public function handle()
    {
        $this->menu->run();
    }
}