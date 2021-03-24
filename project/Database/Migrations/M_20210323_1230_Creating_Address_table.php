<?php

$dbh = new PDO("mysql:host=127.0.0.1;dbname=kcs_db", 'devuser', 'devpass');
$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$createTable = 'create table addresses
(
    id int NOT NULL auto_increment,
    city varchar(32) not null,
    region varchar(32) null,
    street varchar(32) null,
    notes TEXT null,
    PRIMARY KEY (id)
);';
$dbh->exec($createTable);