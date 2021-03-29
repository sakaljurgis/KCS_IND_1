<?php

namespace KCS\Services;

use KCS\ValidationRules\ValidationRulesInterface;
use KCS\Dtos\DtoInterface;
use KCS\Exceptions\ValidationException;
use KCS\Services\Validator\ConstraintFactory;

class RequestValidator
{
    public function validate(ValidationRulesInterface $validationRules): bool
    {

        $requestPayload = $_POST;
        
        $rules = $validationRules->getRules();
        
        $requiredFields = $this->extractRequiredFields($rules);
        
        foreach ($requiredFields as $fieldName) {
            if (!isset($requestPayload[$fieldName])){
                throw new ValidationException("field '$fieldName' is mandatory");
            }
        }
        
        foreach ($rules as $fieldName => $fieldRules) {
            
            if (!isset($requestPayload[$fieldName])){
                continue;
            }
            
            $fieldValue = $requestPayload[$fieldName];
            
            foreach ($fieldRules as $rule) {
                
                ConstraintFactory::make($rule)->isValid($fieldValue, $fieldName);
                
                switch ($rule) {
                    case 'required':
                        break;
                    
                    case 'string':
                        if (!preg_match("/^[a-zA-Z-' ]*$/", $fieldValue)) {
                            throw new ValidationException("field '$fieldName' must be letters only");
                        }
                        break;
                    
                    case 'number':
                        if (!is_numeric($fieldValue)) {
                            throw new ValidationException("field '$fieldName' must be a number");
                        }
                        break;
                    
                    case 'email':
                        if (!filter_var($fieldValue, FILTER_VALIDATE_EMAIL)) {
                            throw new ValidationException("field '$fieldName' must be a valid email address");
                        }
                        break;
                    
                    case (preg_match('/max:*/', $rule) ? true : false): //todo export to function
                        $max_len = (int)explode(':', $rule)[1];
                        if (strlen($fieldValue) > $max_len) {
                            throw new ValidationException("field '$fieldName' max len is $max_len characters.");
                        }
                        break;
                        
                    default:
                        throw new ValidationException("Validation rule '$rule' is not defined");
                }
            }
            
        }
        
        return true;
        
    }
    
    private function extractRequiredFields(array $rules): array {
        
        $requiredFields = [];
    
        foreach ($rules as $fieldName => $fieldRules) {
            
            if (in_array('required', $fieldRules)) {
                $requiredFields[] = $fieldName;
            }
            
        }
        
        return $requiredFields;
        
    }
    
}
