<?php

namespace Wisnubaldas\BaldasModule\bladedirective;

use Wisnubaldas\BaldasModule\modular\MainConsole;
class Parser
{
    
    /**
     * Parse expression.
     *
     * @param  string  $expression
     * @return \Illuminate\Support\Collection
     */
    public static function multipleArgs($expression)
    {
        return collect(explode(',', $expression))->map(function ($item) {
            return trim($item);
        });
    }

    /**
     * Strip quotes.
     *
     * @param  string  $expression
     * @return string
     */
    public static function stripQuotes($expression)
    {
        return str_replace(["'", '"'], '', $expression);
    }

    public static function load_resource($expression,$fileName,$path) {
        $fileSource = resource_path($expression);
        $contentFile = file_get_contents($fileSource);
        $jing = new MainConsole();
        $jing->forceFilePutContents($path,$fileName,$contentFile);
    }
}
