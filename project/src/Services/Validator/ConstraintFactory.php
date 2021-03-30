<?php


namespace KCS\Services\Validator;
use KCS\Services\Validator\Constraints\ {
    ConstraintInterface,
    IsStringConstraint,
    IsNumberConstraint,
    IsEmailConstraint,
    MaxLenConstraint,
};
use KCS\Exceptions\ValidationException;

class ConstraintFactory
{
    private const MAP = [
        'string' => IsStringConstraint::class,
        'number' => IsNumberConstraint::class,
        'email' => IsEmailConstraint::class,
        'max' => MaxLenConstraint::class,
    ];
    
    public static function make(string $ruleDescription): ConstraintInterface
    {
        $ruleName = explode(":", $ruleDescription)[0];
        $className = self::MAP[$ruleName];
        
        if (isset($className)){
            return new $className($ruleDescription);
        } else {
            throw new ValidationException("Validation rule '$ruleName' is not defined");
        }
        
    }
    
}
