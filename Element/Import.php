<?php

namespace Realitaetsverlust\Bladewolf\Element;

class Import implements ElementInterface {
    private const ROOT = '@import';

    private array $tokens = [
        'T_FILEPATH' => '/"(.*)"/'
    ];

    public function parse(string $line) {
        $line = str_replace(self::ROOT . ' ', '', $line);
    }
}