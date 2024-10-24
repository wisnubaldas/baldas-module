<?php

namespace Wisnubaldas\BaldasModule\modular;

use Illuminate\Support\Str;
use Wisnubaldas\BaldasModule\MyHelper;

class RouteConsoleClass
{
    public function __construct()
    {
        $this->helper = new MyHelper;
    }

    public function cek_option($option, $name, $choice)
    {
        $result = [];
        // opt 1 controller
        if ($option[0]) {
            if ($choice == 'api') {
                $nameController = 'api/'.$this->helper->bikin_path_nama($name).'Controller';
                $resourceParam = ['--api' => true];
            } else {
                $nameController = $this->helper->bikin_path_nama($name).'Controller';
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
                ['name' => \ucfirst(Str::camel($name))]
            );
            $result['model'] = Str::of(\Artisan::output())->trim();
        }

        return $result;
    }

    public function parsing_stub($stub, array $stubVariables = [])
    {
        $contents = file_get_contents($stub);
        foreach ($stubVariables as $search => $replace) {
            $contents = str_replace('{{ '.$search.' }}', $replace, $contents);
        }

        return $contents;
    }

    protected function parsing_string($name)
    {
        $str = [];
        if (str_contains($name, '/')) {
            $str = array_reverse(explode('/', $name));
            $name = $str[0];
        }
        unset($str[0]);
        $str = implode(DIRECTORY_SEPARATOR, $str).DIRECTORY_SEPARATOR;
        $prefix = str_replace('\\', '/', $str);
        if ($prefix == '/') {
            $prefix = '';
        }

        if ($str == '\\') {
            $str = '';
        }

        $controllerPath = $str.\ucfirst(Str::camel($name)).'Controller';
        $controller = array_reverse(explode('\\', $controllerPath))[0];

        return compact('controllerPath', 'controller', 'prefix', 'str');
    }

    public function make_route($name, $choice)
    {
        switch ($choice) {
            case 'api':
                $strStub = $this->parsing_string($name);
                $stub = $this->helper->load_stub('route-api');
                $contents = $this->parsing_stub($stub, [
                    'class' => Str::kebab(array_reverse(explode('/', $name))[0]),
                    'controllerPath' => $strStub['controllerPath'],
                    'controller' => $strStub['controller'],
                    'prefix' => '/'.$strStub['prefix'],
                ]);

                $file = $this->helper->route_api_path(Str::kebab(str_replace('/', '\\', $name)).'.php');

                if ($this->helper->cek_file_exists($file)) {
                    if (! $this->helper->cek_karakter($name, '/')) {
                        \file_put_contents($file, $contents);
                    } else {
                        $this->helper->forceFilePutContents($file, $contents);
                    }

                    return 'INFO Route '.$file.' sukses di buat';
                } else {
                    return 'ERROR Route file sudah pernah dibuat';
                }
                break;

            default:

                $stub = $this->helper->load_stub('route');
                $strStub = $this->parsing_string($name);
                $contents = $this->parsing_stub($stub, [
                    'class' => Str::kebab(array_reverse(explode('/', $name))[0]),
                    'controllerPath' => $strStub['controllerPath'],
                    'controller' => $strStub['controller'],
                    'prefix' => '/'.$strStub['prefix'],
                ]);

                $file = $this->helper->route_web_path(Str::kebab(str_replace('/', '\\', $name)).'.php');

                if ($this->helper->cek_file_exists($file)) {
                    if (! $this->helper->cek_karakter($name, '/')) {
                        \file_put_contents($file, $contents);
                    } else {
                        $this->helper->forceFilePutContents($file, $contents);
                    }

                    return 'INFO Route '.$file.' sukses di buat';
                } else {
                    return 'ERROR Route file sudah pernah dibuat';
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
