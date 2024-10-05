<?php
namespace Wisnubaldas\BaldasModule\modular;

use Symfony\Component\Console\Output\StreamOutput;
use Wisnubaldas\BaldasModule\MyHelper;
use Illuminate\Support\Str;

class RouteConsoleClass
{
    public function __construct(Type $var = null)
    {
        $this->helper = new MyHelper;
    }

    public function cek_option($option, $name, $choice)
    {
        $result = [];
        // opt 1 controller
        if ($option[0]) {
            if ($choice == 'api') {
                $nameController = 'api/' . \ucfirst(Str::camel($name)) . "Controller";
                $resourceParam = ['--api' => true];
            } else {
                $nameController = \ucfirst(Str::camel($name)) . "Controller";
                $resourceParam = ['--resource' => true];
            }
            \Artisan::call(
                'make:controller',
                array_merge(['name' => $nameController], $resourceParam),
            );
            $result['controller'] = Str::of(\Artisan::output())->trim();
        }
        if ($option[1]) {
            \Artisan::call(
                'make:model',
                array('name' => \ucfirst(Str::camel($name)))
            );
            $result['model'] = Str::of(\Artisan::output())->trim();
        }
        return $result;
    }
    public function parsing_stub($stub, array $stubVariables = [])
    {
        $contents = file_get_contents($stub);
        foreach ($stubVariables as $search => $replace) {
            $contents = str_replace('{{ ' . $search . ' }}', $replace, $contents);
        }

        return $contents;
    }
    public function make_route($name, $choice)
    {
        switch ($choice) {
            case 'api':
                $str = [];
                if (str_contains($name, '/')) {
                    $str = array_reverse(explode('/', $name));
                    $name = $str[0];
                }
                dump($str);
                dump($name);

                $str = implode(DIRECTORY_SEPARATOR, $str) . DIRECTORY_SEPARATOR;
                $stub = $this->helper->load_stub('route-api');
                $contents = $this->parsing_stub($stub, [
                    'class' => $name,
                    'controller' => $str . \ucfirst(Str::camel($name)) . 'Controller'
                ]);

                $file = $this->helper->route_api_path($str . Str::kebab($name) . '.php');
                dd($file);

                if ($this->helper->cek_file_exists($file)) {
                    \file_put_contents($file, $contents);
                    return "INFO Route " . $file . ' sukses di buat';
                } else {
                    return "ERROR Route file sudah pernah dibuat";
                }
                break;

            default:

                $stub = $this->helper->load_stub('route');
                $contents = $this->parsing_stub($stub, [
                    'class' => $name,
                    'controller' => \ucfirst(Str::camel($name)) . 'Controller'
                ]);

                $file = $this->helper->route_web_path(Str::kebab($name) . '.php');
                if ($this->helper->cek_file_exists($file)) {
                    \file_put_contents($file, $contents);
                    return "INFO Route " . $file . ' sukses di buat';
                } else {
                    return "ERROR Route file sudah pernah dibuat";
                }
                break;
        }
    }
    public static function run(string $name, string $choice, ...$option): array
    {
        $result = [];
        $run = new RouteConsoleClass;
        if ($option) {
            $opt = $run->cek_option($option, $name, $choice);
            $result = $opt;
        }
        $result['route'] = $run->make_route($name, $choice);
        return $result;
    }
}
