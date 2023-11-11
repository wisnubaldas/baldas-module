<?php
namespace Wisnubaldas\BaldasModule\modular;

use Symfony\Component\Console\Output\StreamOutput;
use Wisnubaldas\BaldasModule\MyHelper;
use Illuminate\Support\Str;
class RouteConsoleClass 
{
    public function __construct(Type $var = null) {
        $this->helper = new MyHelper;
    }
    
    public function cek_option($option,$name)
    {
        $result = [];
        // opt 1 controller
        if($option[0])
        {
            \Artisan::call('make:controller', 
                                    [
                                        'name' => \ucfirst($name)."Controller",
                                        '--resource' => true
                                    ]);
            $result['controller'] = Str::of(\Artisan::output())->trim();
        }
        if($option[1]){
            \Artisan::call('make:model', 
                                    array('name' => \ucfirst($name)));
            $result['model'] = Str::of(\Artisan::output())->trim();
        }
        return $result;
    }
    public function parsing_stub($stub,array $stubVariables = [])
    {
        $contents = file_get_contents($stub);
        foreach ($stubVariables as $search => $replace)
        {
            $contents = str_replace('{{ '.$search.' }}' , $replace, $contents);
        }

        return $contents;
    }
    public function make_route($name,$choice)
    {
        switch ($choice) {
            case 'api':
                $stub = $this->helper->load_stub('route-api');
                $contents = $this->parsing_stub($stub,[
                    'class'=>\strtolower($name),
                    'controller'=>\ucfirst($name).'Controller'
                ]);

                $file = $this->helper->route_api_path($name.'.php');
                    if($this->helper->cek_file_exists($file)){
                        \file_put_contents($file,$contents);
                        return "INFO Route ".$file.' sukses di buat';
                    }else{
                        return "ERROR Route file sudah pernah dibuat";
                    }
                break;
            
            default:
                $stub = $this->helper->load_stub('route');
                $contents = $this->parsing_stub($stub,[
                    'class'=>\strtolower($name),
                    'controller'=>\ucfirst($name).'Controller'
                ]);

                $file = $this->helper->route_web_path($name.'.php');
                if($this->helper->cek_file_exists($file)){
                    \file_put_contents($file,$contents);
                    return "INFO Route ".$file.' sukses di buat';
                }else{
                    return "ERROR Route file sudah pernah dibuat";
                }
                break;
        }
    }
    public static function run(string $name,string $choice,...$option) : array
    {
        $result = [];
        $run = new RouteConsoleClass;
        if($option){
            $opt = $run->cek_option($option,$name);
            $result = $opt;
        }
        $result['route'] = $run->make_route($name,$choice); 
        return $result;
    }    
}
