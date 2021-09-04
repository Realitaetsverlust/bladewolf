<?php

namespace Realitaetsverlust\Bladewolf\Core;

use Realitaetsverlust\Bladewolf\Core\Exception\ConfigFileNotFoundOrNotReadableException;

class ConfigStorage {
    public static string $inputfile;
    public static string $outputfile;

    public static function init() : void {
        $bladewolfConfigFile = getcwd() . '/bladewolf.yml';

        if(!is_file($bladewolfConfigFile) || !is_readable($bladewolfConfigFile)) {
            throw new ConfigFileNotFoundOrNotReadableException();
        }

        $yamlContent = yaml_parse_file($bladewolfConfigFile);

        self::$inputfile = $yamlContent['global']['inputfile'];
        self::$outputfile = $yamlContent['global']['outputfile'];
    }
}