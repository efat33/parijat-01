<?php

namespace App\Enums;

use ReflectionClass;
use Illuminate\Validation\Rules\Enum;

final class StoreType extends Enum
{
    const STORE = 'store';
    const FACTORY = 'factory';

    static function cases()
    {
        $oClass = new ReflectionClass(__CLASS__);
        return $oClass->getConstants();
    }
}
