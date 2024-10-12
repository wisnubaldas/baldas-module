<?php
namespace Wisnubaldas\BaldasModule\modular;
use function Laravel\Prompts\error;

class MainConsole
{
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
            error("ERROR Nama tidak boleh mengandung karakter spesial." . $karakterSpesial);
            exit(1);
        }
    }
    /**
     * bikin namespace sama nama class nya
     * @param mixed $name
     * @param mixed $namespace
     * @return void
     */
    public function ns_cls($name, $namespace)
    {
        $nameClass = $name;
        if (str_contains($name, '/')) {
            $str = array_reverse(explode('/', $name));
            $nameClass = $str[0];
            unset($str[0]);
            $namespace = $namespace . '\\' . implode('\\', array_reverse($str));
        }
        return [
            'class'=>ucwords($nameClass), 
            'namespace'=>$namespace
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
            $contents = str_replace('{{' . $search . '}}', $replace, $contents);
        }
        return $contents;
    }
}
