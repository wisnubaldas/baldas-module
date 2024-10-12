<?php

namespace Wisnubaldas\BaldasModule\console;

trait ConsoleTrait
{
    public $bg = '';

    public $bl = '';

    public function cek_opt($opt, $color)
    {
        if ($opt) {
            if (isset($opt[0]) && $opt[0] == true) {
                $this->bl = 'options=bold;';
            }

            if (isset($opt[1]) && $opt[1] == true) {

                switch ($color) {
                    case 'yellow':
                        $this->bg = 'bg=#26230e;';
                        break;
                    case 'blue':
                        $this->bg = 'bg=#424444;';
                        break;
                    case 'indigo':
                        $this->bg = 'bg=#ebe8ef;';
                        break;
                    case 'purple':
                        $this->bg = 'bg=#ebe8ef;';
                        break;
                    case 'pink':
                        $this->bg = 'bg=#ebe8ef;';
                        break;
                    case 'red':
                        $this->bg = 'bg=#ebe8ef;';
                        break;
                    case 'orange':
                        $this->bg = 'bg=#ebe8ef;';
                        break;
                    case 'green':
                        $this->bg = 'bg=#ebe8ef;';
                        break;
                    case 'teal':
                        $this->bg = 'bg=#ebe8ef;';
                        break;
                    case 'cyan':
                        $this->bg = 'bg=#ebe8ef;';
                        break;
                    case 'gray':
                        $this->bg = 'bg=#ebe8ef;';
                        break;
                    case 'black':
                        $this->bg = 'bg=#ebe8ef;';
                        break;
                    case 'white':
                        $this->bg = 'bg=#030007;';
                        break;
                    default:
                        $this->bg;
                        break;
                }
            }
        }
    }

    public function yellow(string $v, ...$opt)
    {
        $this->cek_opt($opt, 'yellow');

        return '<fg=#ffc107;'.$this->bg.$this->bl.'>'.$v.'</>';
    }

    public function blue(string $v, ...$opt)
    {
        $this->cek_opt($opt, 'blue');

        return '<fg=#0d6efd;'.$this->bg.$this->bl.'>'.$v.'</>';
    }

    public function indigo(string $v, ...$opt)
    {
        $this->cek_opt($opt, 'indigo');

        return '<fg=#6610f2;'.$this->bg.$this->bl.'>'.$v.'</>';
    }

    public function purple(string $v, ...$opt)
    {
        $this->cek_opt($opt, 'purple');

        return '<fg=#6f42c1;'.$this->bg.$this->bl.'>'.$v.'</>';
    }

    public function pink(string $v, ...$opt)
    {
        $this->cek_opt($opt, 'pink');

        return '<fg=#d63384;'.$this->bg.$this->bl.'>'.$v.'</>';
    }

    public function red(string $v, ...$opt)
    {
        $this->cek_opt($opt, 'red');

        return '<fg=#dc3545;'.$this->bg.$this->bl.'>'.$v.'</>';
    }

    public function orange(string $v, ...$opt)
    {
        $this->cek_opt($opt, 'orange');

        return '<fg=#fd7e14;'.$this->bg.$this->bl.'>'.$v.'</>';
    }

    public function green(string $v, ...$opt)
    {
        $this->cek_opt($opt, 'green');

        return '<fg=#198754;'.$this->bg.$this->bl.'>'.$v.'</>';
    }

    public function teal(string $v, ...$opt)
    {
        $this->cek_opt($opt, 'teal');

        return '<fg=#20c997;'.$this->bg.$this->bl.'>'.$v.'</>';
    }

    public function cyan(string $v, ...$opt)
    {
        return '<fg=#0dcaf0;'.$this->bg.$this->bl.'>'.$v.'</>';
    }

    public function gray(string $v, ...$opt)
    {
        $this->cek_opt($opt, 'gray');

        return '<fg=#adb5bd;'.$this->bg.$this->bl.'>'.$v.'</>';
    }

    public function black(string $v, ...$opt)
    {
        $this->cek_opt($opt, 'black');

        return '<fg=#000;'.$this->bg.$this->bl.'>'.$v.'</>';
    }

    public function white(string $v, ...$opt)
    {
        $this->cek_opt($opt, 'white');

        return '<fg=#fff;'.$this->bg.$this->bl.'>'.$v.'</>';
    }
}
