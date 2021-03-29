<?php

namespace KCS\Dtos;

class VisitorDto implements DtoInterface
{
    public string $name;
    public string $phone;
    public string $email;

    public function toArray(): array
    {
        return [
            'name' => $this->name,
            'phone' => $this->phone,
            'email' => $this->email,
        ];
    }
}