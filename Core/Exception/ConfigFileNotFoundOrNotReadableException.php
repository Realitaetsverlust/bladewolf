<?php

namespace Realitaetsverlust\Bladewolf\Core\Exception;

use Exception;
use JetBrains\PhpStorm\Pure;

class ConfigFileNotFoundOrNotReadableException extends Exception {
    #[Pure] public function __construct() {
        parent::__construct("The config file could not be found or is not readable!");
    }
}