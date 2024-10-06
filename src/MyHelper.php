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

    // binding class ke repository provider
    public function _bind($file,$useCase,$interface)
    {
        $t = <<<EOT
            \$this->app->bind($useCase,$interface);
                    //:end-bindings:
            EOT;
        $contents = file_get_contents($file);
        $contents = str_replace("//:end-bindings:", $t, $contents);

        file_put_contents($file,$contents);
    }
    // file repository service profider untuk di load 
    public function file_repository_provider()
    {
        $file = rtrim(dirname(__DIR__,4), '/\\') . 
                    DIRECTORY_SEPARATOR .'app'.
                    DIRECTORY_SEPARATOR.'Providers'.
                    DIRECTORY_SEPARATOR.'RepositoryServiceProvider.php';

        if($this->cek_file_exists($file)){
            // ngga ada file
            $content = file_get_contents(dirname(__DIR__).DIRECTORY_SEPARATOR.'src'.DIRECTORY_SEPARATOR.'RepositoryServiceProvider.php');
            file_put_contents($file,$content);
        }
        return $file;
    }
    // domain path
    public function domain_path(string $file = '')
    {
        return rtrim(dirname(__DIR__,4), '/\\') . 
        DIRECTORY_SEPARATOR . 'app'.DIRECTORY_SEPARATOR.'Domain'.DIRECTORY_SEPARATOR.$file;
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
    public function forceFilePutContents ($filepath, $message){
        try {
            // $filepath = "C:\laragon\www\ctos-api-v2\routes\api\cont\cloud-status.php";
            $dir = array_reverse(explode("\\",$filepath));
            $fileName = $dir[0];
            unset($dir[0]);
            $fullPath = implode("\\",array_reverse($dir));
            
            // example code
            if (!is_dir($fullPath)) {
              // dir doesn't exist, make it
              mkdir($fullPath);
            }
            
            file_put_contents($fullPath."\\".$fileName, $message);
        } catch (\Exception $e) {
            echo "ERR: error writing to '$filepath', ". $e->getMessage();
        }
    }
    public function bikin_path_nama($name) {
        
        
        $array = explode("/",$name);
        $camelCaseArray = array_map([$this, 'toCamelCase'], $array);
        return implode("/",$camelCaseArray);
    }
    protected function toCamelCase($string) {
        $string = str_replace('-', ' ', $string);
        $string = ucwords($string);
        return str_replace(' ', '', $string);
    }
    // public function toCamelCase($string) {
    //     // Replace hyphens with spaces
    //     $string = str_replace('-', ' ', $string);
    //     // Capitalize the first letter of each word
    //     $string = ucwords($string);
    //     // Remove spaces to form camel case
    //     return str_replace(' ', '', $string);
    // }
    
}
