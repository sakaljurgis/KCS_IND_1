<?php

namespace KCS\Model;

class VisitorModel extends BaseModel implements ToStringInterface
{
    private string $name;

    private ?string $email;

    private ?string $phone;

    private string $created_at;

    private string $updated_at;

    private ?string $deleted_at;

    private int $address_id;

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param  string  $name
     *
     * @return VisitorModel
     */
    public function setName(string $name): VisitorModel
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * @param  string|null  $email
     *
     * @return VisitorModel
     */
    public function setEmail(?string $email): VisitorModel
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getPhone(): ?string
    {
        return $this->phone;
    }

    /**
     * @param  string|null  $phone
     *
     * @return VisitorModel
     */
    public function setPhone(?string $phone): VisitorModel
    {
        $this->phone = $phone;
        return $this;
    }

    /**
     * @return int
     */
    public function getAddressId(): int
    {
        return $this->address_id;
    }

    /**
     * @param  int  $address_id
     *
     * @return VisitorModel
     */
    public function setAddressId(int $address_id): VisitorModel
    {
        $this->address_id = $address_id;
        return $this;
    }

    /**
     * @return string
     */
    public function getCreatedAt(): string
    {
        return $this->created_at;
    }

    /**
     * @return string
     */
    public function getUpdatedAt(): string
    {
        return $this->updated_at;
    }

    /**
     * @param  string  $updated_at
     *
     * @return VisitorModel
     */
    public function setUpdatedAt(string $updated_at): VisitorModel
    {
        $this->updated_at = $updated_at;
        return $this;
    }

    /**e
     *
     * @return string|null
     */
    public function getDeletedAt(): ?string
    {
        return $this->deleted_at;
    }

    /**
     * @param  string|null  $deleted_at
     *
     * @return VisitorModel
     */
    public function setDeletedAt(?string $deleted_at): VisitorModel
    {
        $this->deleted_at = $deleted_at;
        return $this;
    }

    public function __toString(): string
    {
        return $this->id.' '.$this->name.' '.$this->email;
    }
}