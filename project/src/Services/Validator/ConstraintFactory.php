<?php


namespace KCS\Services\Validator;
use KCS\Services\Validator\Constraints;
use KCS\Exceptions\ValidationException;

class ConstraintFactory
{
    private const MAP = [
        'string' => IsStringConstraint::class,
        'number' => IsNumberConstraint::class,
    ];
    
    public static function make(string $ruleName): ConstraintInterface
    {
        $className = self::MAP[$ruleName];
        if (isset($className)){
            return new $className();
        } else {
            throw new ValidationException("Validation rule '$ruleName' is not defined");
        }
        
    }
    
}
