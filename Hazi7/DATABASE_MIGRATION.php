<?php

    // Egyenesen a MySQLWorkbenchből másoltam a kódot de nem működik
    // Külön ott kell beilleszteni és lefuttatni a $sql részt, PhpMyAdminban nem teszteltem

    /*$DATABASE_HOST = 'localhost';
    $DATABASE_USER = 'root';
    $DATABASE_PASSWORD = '';
    $DATABASE_NAME = 'egyetem';

    $DATABASE = new mysqli($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASSWORD, $DATABASE_NAME);

    if ($DATABASE->connect_error) {
        die("Connection failed: " . $DATABASE->connect_error);
    }

    $sql = "
    CREATE TABLE `hallgatok` (
      `id` int(11) NOT NULL AUTO_INCREMENT,
      `nev` tinytext COLLATE utf8mb4_unicode_ci,
      `szak` tinytext COLLATE utf8mb4_unicode_ci,
      `atlag` double DEFAULT NULL,
      PRIMARY KEY (`id`)
    ) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
    
    CREATE TABLE `users` (
      `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
      `name` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
      `password` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
      PRIMARY KEY (`id`),
      UNIQUE KEY `id_UNIQUE` (`id`),
      UNIQUE KEY `name_UNIQUE` (`name`)
    ) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
    ";

    if ($DATABASE->query($sql) === TRUE) {
        echo "Database created successfully with the name newDB";
    } else {
        echo "Error creating database: " . $DATABASE->error;
    }

    $DATABASE->close();*/
