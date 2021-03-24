<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace KCS\Repository;

use KCS\Model\AddressModel;
use PDO;

/**
 * Description of AddressRepository
 *
 * @author sklk
 */
class AddressRepository extends BaseRepository
{
    public function all(): array
    {
        $stmt = $this->conn->prepare('SELECT * FROM addresses;');
        $stmt->setFetchMode(PDO::FETCH_CLASS, AddressModel::class);
        $stmt->execute();

        return $stmt->fetchAll();
    }
    
    public function one($address_id)
    {
        $stmt = $this->conn->prepare("SELECT * FROM visitors where id = '$address_id' limit 1;");
        $stmt->setFetchMode(PDO::FETCH_CLASS, AddressModel::class);
        $stmt->execute();

        return $stmt->fetch();
    }
}
