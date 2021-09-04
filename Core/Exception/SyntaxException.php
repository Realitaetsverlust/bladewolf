<?php

namespace Realitaetsverlust\Bladewolf\Core\Exception;

use Exception;
use JetBrains\PhpStorm\Pure;

class SyntaxException extends Exception {
    #[Pure] public function __construct(string $expectation, string $token) {
        parent::__construct("Syntax error: Excpected {$expectation}, but received {$token}");
    }
}