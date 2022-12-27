<?php
namespace Wisnubaldas\BaldasModule;

class MyHelper
{
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
}
