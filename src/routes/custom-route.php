<?php

use Illuminate\Support\Facades\Route;

// web route
$dir = rtrim(dirname(__DIR__,5), '/\\') . DIRECTORY_SEPARATOR . 'routes'.DIRECTORY_SEPARATOR.'web';
if(!is_dir($dir)) {
    mkdir($dir,0775,true);
}
try {
    $rdi = new \RecursiveDirectoryIterator($dir);
    $it = new \RecursiveIteratorIterator($rdi);
    while ($it->valid()) {
        if (! $it->isDot() && $it->isFile() && $it->isReadable() && $it->current()->getExtension() === 'php') {
            require $it->key();
        }
        $it->next();
    }
} catch (Exception $e) {
    echo $e->getMessage();
}

// api route
$api = rtrim(dirname(__DIR__,5), '/\\') . DIRECTORY_SEPARATOR . 'routes'.DIRECTORY_SEPARATOR.'api';
        if(!is_dir($api)) {
            mkdir($api,0775,true);
         }
        try {
            $rdi = new \RecursiveDirectoryIterator($api);
            $it = new \RecursiveIteratorIterator($rdi);
            while ($it->valid()) {
                if (! $it->isDot() && $it->isFile() && $it->isReadable() && $it->current()->getExtension() === 'php') {
                    require $it->key();
                }
                $it->next();
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
