<?php

namespace KCS\Dtos;

class AddressDto implements DtoInterface
{
    public string $city;
    public string $region;
    public string $street;
    public string $note;
    
    public function toArray(): array
    {
        return [
            'city' => $this->city,
            'region' => $this->region,
            'street' => $this->street,
            'note' => $this->note,
        ];
    }
    
}
