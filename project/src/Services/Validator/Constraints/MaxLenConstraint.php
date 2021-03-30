<?php

namespace KCS\Services\Validator\Constraints;
use KCS\Exceptions\ValidationException;


class MaxLenConstraint implements ConstraintInterface
{
    private int $maxLen;
    
    public function __construct($ruleDescription)
    {
        $this->maxLen = (int)explode(":", $ruleDescription)[1];
    }
    
    public function isValid($fieldValue, $fieldName = ''): bool {
        
        if (strlen($fieldValue) > $this->maxLen) {
            throw new ValidationException("field '$fieldName' max len is {$this->maxLen} characters.");
        }
        return true;
    }

}