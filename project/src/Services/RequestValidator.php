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
                
                if ($rule === 'required') {
                    continue;
                }
                ConstraintFactory::make($rule)->isValid($fieldValue, $fieldName);
                
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
