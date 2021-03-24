<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace KCS\Manager;
use KCS\Repository\AddressRepository;
use KCS\Model\AddressModel;
/**
 * Description of AddressManager
 *
 * @author sklk
 */
class AddressManager
{
    
    private AddressRepository $repository;
    
    public function __construct(AddressRepository $repository)
    {
        $this->repository = $repository;
    }

    public function getOne($address_id)
    {
        return $this->repository->one($address_id);
    }
    
}