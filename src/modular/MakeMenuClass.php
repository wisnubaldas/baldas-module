<?php
namespace Wisnubaldas\BaldasModule\modular;

use Wisnubaldas\BaldasModule\modular\MainConsole;
use function Laravel\Prompts\error;
final class MakeMenuClass extends MainConsole implements MakeMenuInterface
{
    public function run() {
        $x = $this->cek_file_menu();
        if(!$x){
            error("File menu.csv tidak ada, buat file menu simpan di /database/seeders/");
        }
    }
}
