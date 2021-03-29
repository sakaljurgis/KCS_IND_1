<?php

namespace KCS\ValidationRules;

class VisitorValidationRules extends BaseValidationRules implements ValidationRulesInterface
{
    public function getRules(): array
    {
        return [
            'name'  => ['required', 'max:20', 'string'],
            'phone' => ['required', 'number'],
            'email' => ['required', 'email']
        ];
    }

}
