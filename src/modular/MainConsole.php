<?php

namespace Wisnubaldas\BaldasModule\modular;

use Brick\VarExporter\VarExporter;

use function Laravel\Prompts\error;

class MainConsole
{
    public $rootPath;

    public function __construct()
    {
        $this->rootPath = dirname(__DIR__, 5);
    }

    /**
     * validasi nama file
     */
    public function validateName($argName)
    {
        $karakterSpesial = '!@#$%^&*()_+[]{}|;:,.<>?\\';
        // Membuat pola regex untuk mencocokkan karakter spesial
        $pola = '/[' . preg_quote($karakterSpesial, '/') . ']/';
        // Menggunakan preg_match untuk mengecek keberadaan karakter spesial
        if (preg_match($pola, $argName)) {
            error('ERROR Nama tidak boleh mengandung karakter spesial.' . $karakterSpesial);
            exit(1);
        }
    }

    /**
     * bikin namespace sama nama class nya
     *
     * @param  mixed  $name
     * @param  mixed  $namespace
     * @return void
     */
    public function ns_cls($name, $namespace): array
    {
        $nameClass = $name;
        if (str_contains($name, '/')) {
            $str = array_reverse(explode('/', $name));
            $nameClass = $str[0];
            unset($str[0]);
            $namespace = $namespace . '\\' . implode('\\', array_reverse($str));
        }

        return [
            'class' => ucwords($nameClass),
            'namespace' => $namespace,
        ];
    }

    /**
     * load file stub di lokal package
     */
    public function stubFile($name)
    {
        return rtrim(dirname(__DIR__), '/\\') . DIRECTORY_SEPARATOR . 'stub' . DIRECTORY_SEPARATOR . $name . '.stub';
    }

    /**
     * masukin content ke file stub
     */
    public function replace_content_stub($stub, array $stubVariables = []): string
    {
        $contents = file_get_contents($stub);
        foreach ($stubVariables as $search => $replace) {
            if (is_array($replace)) {
                $replace = VarExporter::export($replace, VarExporter::TRAILING_COMMA_IN_ARRAY | VarExporter::INLINE_SCALAR_LIST);
            }
            $contents = str_replace('{{' . $search . '}}', $replace, $contents);
        }

        return $contents;
    }

    public function forceFilePutContents($dir, $filename, $message)
    {
        $fN = array_reverse(explode("/", $filename));
        try {
            if (!is_dir($dir)) {
                // dir doesn't exist, make it
                mkdir($dir, 0777, true);
            }
            file_put_contents($dir . DIRECTORY_SEPARATOR . ucfirst($fN[0]), $message);
        } catch (\Exception $e) {
            dump($e->getMessage());
        }
    }

    public function save_file($content, $path, $fileName)
    {
        $modelFile = $fileName . '.php';
        $dirCek = $this->rootPath . DIRECTORY_SEPARATOR . lcfirst($path['namespace']);
        $this->forceFilePutContents($dirCek, $modelFile, $content);
        return $dirCek . DIRECTORY_SEPARATOR . $modelFile;
    }
    public function save_file_storage($content, $path, $fileName)
    {
        $dirCek = $this->rootPath . DIRECTORY_SEPARATOR . 'storage' . DIRECTORY_SEPARATOR . $path;
        $this->forceFilePutContents($dirCek, $fileName, $content);
    }
    public function cek_file_menu()
    {
        $dir = dirname(__DIR__, 5) .
            DIRECTORY_SEPARATOR .
            'database' .
            DIRECTORY_SEPARATOR .
            'seeders' .
            DIRECTORY_SEPARATOR .
            'menu.csv';
        try {
            if (!is_dir($dir)) {
                // dir doesn't exist, make it
                return false;
            } else {
                return true;
            }
            // file_put_contents($dir.DIRECTORY_SEPARATOR.ucfirst($fN[0]), $message);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
    public function binding($content)
    {
        $file = rtrim(dirname(__DIR__, 5), '/\\') .
            DIRECTORY_SEPARATOR . 'app' .
            DIRECTORY_SEPARATOR . 'Providers' .
            DIRECTORY_SEPARATOR . 'RepositoryServiceProvider.php';

        $Int = $content['interface'];
        $Cls = $content['class'];

        $t = <<<EOT
        \$this->app->bind($Int,$Cls);
            //:end-bindings:
        EOT;

        if (file_exists($file)) {
            $r = file_get_contents($file);
            $w = str_replace('//:end-bindings:', $t, $r);
            file_put_contents($file, $w);
        } else {
            $stb = $this->stubFile('provider');
            $strClass = $this->replace_content_stub($stb, ['bind'=>$t]);
            file_put_contents($file, $strClass);
        }
    }
}
