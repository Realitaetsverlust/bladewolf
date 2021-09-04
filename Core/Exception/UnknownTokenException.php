<?php

namespace Realitaetsverlust\Bladewolf\Core\Exception;

use Exception;
use JetBrains\PhpStorm\Pure;

class UnknownTokenException extends Exception {
    #[Pure] public function __construct(string $token) {
        parent::__construct("The token {$token} was not recognized by bladewolf.");
    }
}