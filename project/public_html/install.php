<?php

$dbh = new PDO("mysql:host=127.0.0.1;dbname=kcs_db", 'devuser', 'devpass');
$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$createTable = 'create table visitors
(
    id int NOT NULL auto_increment,
    name varchar(50) null,
    email varchar(255) null,
    phone varchar(50) null,
    created_at datetime default now() null,
    updated_at datetime default now() null,
    deleted_at datetime null,
    PRIMARY KEY (id)
);';
$dbh->exec($createTable);

$insertData = [
    [
        'name' => 'Vardenis',
        'email' => 'vardenis@test.com',
        'phone' => '+37067777777',
    ],
    [
        'name' => 'Jonas',
        'email' => 'JOnas@test.com',
        'phone' => '+37067777778',
    ],
];
foreach ($insertData as $item) {
    $query = 'INSERT INTO visitors (name, email, phone) VALUES (:name, :email, :phone);';

    $stmt = $dbh->prepare($query);
    $stmt->bindParam(':name', $item['name']);
    $stmt->bindParam(':email', $item['email']);
    $stmt->bindParam(':phone', $item['phone']);
    $stmt->execute();

}