<?php

namespace Realitaetsverlust\Bladewolf\Core;

use Realitaetsverlust\Bladewolf\Core\Exception\UnknownTokenException;
use Realitaetsverlust\Bladewolf\Element\Extend;
use Realitaetsverlust\Bladewolf\Element\Import;

class Bladewolf {
    public array $keywordMapping = [
        '@import' => Import::class,
        '@extend' => Extend::class
    ];

    public function __construct() {
        ConfigStorage::init();
    }

    public function execute() {
        $mainFileContents = file_get_contents(ConfigStorage::$inputfile);

        foreach(explode("\n", $mainFileContents) as $line) {
            // Check for any @ statements like @import, @use, @extend, @if, @else etc
            if(preg_match("/^(@.*)(?= )/", $line, $match)) {
                $keyword = $match[0];
                if(!isset($this->keywordMapping[$keyword])) {
                    throw new UnknownTokenException($keyword);
                }
                $instance = new $this->keywordMapping[$keyword]();
                $instance->parse($line);
            }
        }
    }
}
