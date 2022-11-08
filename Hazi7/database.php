<?php

    $DATABASE_HOST = 'localhost';
    $DATABASE_USER = 'root';
    $DATABASE_PASSWORD = '';
    $DATABASE_NAME = 'egyetem';

    $DATABASE = new mysqli($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASSWORD, $DATABASE_NAME);

    if ($DATABASE->connect_error) {
        die("Connection failed: " . $DATABASE->connect_error);
    }