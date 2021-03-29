<?php

namespace KCS\ValidationRules;

class AddressValidationRules extends BaseValidationRules implements ValidationRulesInterface
{
    public function getRules(): array
    {
        return [
            'city'  => ['required', 'max:20', 'string'],
            'region' => ['required', 'max:20', 'string'],
            'street' => ['required', 'max:20', 'string'],
            'note' => [],
        ];
    }
}
