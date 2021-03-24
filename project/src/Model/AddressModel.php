<?php

namespace KCS\Model;

class AddressModel extends BaseModel implements ToStringInterface
{
    private string $city;

    private string $region;

    private string $street;

    private string $note;

    public function __toString(): string
    {
        $str = $this->getCity().', '.$this->getRegion().', '.$this->getStreet();
        if (isset($this->note)) {
            $str .= ', ' . $this->getNote();
        }
        return $str;
    }

    /**
     * @return string
     */
    public function getCity(): string
    {
        return $this->city;
    }

    /**
     * @param  string  $city
     *
     * @return AddressModel
     */
    public function setCity(string $city): AddressModel
    {
        $this->city = $city;
        return $this;
    }

    /**
     * @return string
     */
    public function getRegion(): string
    {
        return $this->region;
    }

    /**
     * @param  string  $region
     *
     * @return AddressModel
     */
    public function setRegion(string $region): AddressModel
    {
        $this->region = $region;
        return $this;
    }

    /**
     * @return string
     */
    public function getStreet(): string
    {
        return $this->street;
    }

    /**
     * @param  string  $street
     *
     * @return AddressModel
     */
    public function setStreet(string $street): AddressModel
    {
        $this->street = $street;
        return $this;
    }

    /**
     * @return string
     */
    public function getNote(): string
    {
        return $this->note;
    }

    /**
     * @param  string  $note
     *
     * @return AddressModel
     */
    public function setNote(string $note): AddressModel
    {
        $this->note = $note;
        return $this;
    }
}