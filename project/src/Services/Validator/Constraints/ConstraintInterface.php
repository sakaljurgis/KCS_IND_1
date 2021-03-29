<?php

namespace KCS\Services\Validator\Constraints;

interface ConstraintInterface
{
    public function isValid(): bool;
}
