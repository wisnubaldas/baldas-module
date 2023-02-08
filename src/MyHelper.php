<?php
namespace Wisnubaldas\BaldasModule;
use Illuminate\Support\Facades\File;
class MyHelper
{
    public function save_file (string $fullPathWithFileName, string $fileContents)
    {
        $exploded = explode(DIRECTORY_SEPARATOR,$fullPathWithFileName);

        array_pop($exploded);

        $directoryPathOnly = implode(DIRECTORY_SEPARATOR,$exploded);

        if (!File::exists($directoryPathOnly)) 
        {
            File::makeDirectory($directoryPathOnly,0775,true,false);
        }
        File::put($fullPathWithFileName,$fileContents);
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
    public function cek_file_exists($uri)
    {
        if (!file_exists($uri)) {   
            return true;
        }
    }
    public function load_stub(string $name)
    {
        return rtrim(dirname(__DIR__).DIRECTORY_SEPARATOR.
                    'src'.DIRECTORY_SEPARATOR.
                    'stub'.DIRECTORY_SEPARATOR.
                    $name.'.stub', '/\\');
    }
    public function use_case_path(string $file = '')
    {
        return rtrim(dirname(__DIR__,4), '/\\') . 
        DIRECTORY_SEPARATOR . 'app'.DIRECTORY_SEPARATOR.'UseCase'.DIRECTORY_SEPARATOR.$file;
    }
    public function route_api_path(string $file = '')
    {
        return rtrim(dirname(__DIR__,4), '/\\') . 
        DIRECTORY_SEPARATOR . 'routes'.DIRECTORY_SEPARATOR.'api'.DIRECTORY_SEPARATOR.$file;
    }
    public function route_web_path(string $file = '')
    {
        return rtrim(dirname(__DIR__,4), '/\\') . 
        DIRECTORY_SEPARATOR . 'routes'.DIRECTORY_SEPARATOR.'web'.DIRECTORY_SEPARATOR.$file;
    }
    public function route_path($file)
    {
        return rtrim(dirname(__DIR__).DIRECTORY_SEPARATOR.
                    'src'.DIRECTORY_SEPARATOR.
                    'routes'.DIRECTORY_SEPARATOR.
                    $file.'.php', '/\\');
    }
    public function controller_path($file)
    {
        return rtrim(dirname(__DIR__).DIRECTORY_SEPARATOR.
            'src'.DIRECTORY_SEPARATOR.
            'app'.DIRECTORY_SEPARATOR.
            'Controller'.DIRECTORY_SEPARATOR.
            $file.'.php', '/\\');
    }
    public function view_path($path_name)
    {
     return rtrim(dirname(__DIR__).DIRECTORY_SEPARATOR.
            'src'.DIRECTORY_SEPARATOR.
            'App'.DIRECTORY_SEPARATOR.
            'View'.DIRECTORY_SEPARATOR.
            $path_name, '/\\');   
    }
    public function multiple_database()
    {
        return rtrim(dirname(__DIR__).DIRECTORY_SEPARATOR.
                    'src'.DIRECTORY_SEPARATOR.
                    'config'.DIRECTORY_SEPARATOR.'multiple-connect.php', '/\\');
    }
}
