<?php

/**
 * Each page can include this file which will automatically load the
 * config file and instantiate a database object.
 */

// load config file from outside the public directory
include __DIR__ . '/config.php';

// include database class and fetch an instance
include __DIR__ . '/vendor/SourcePot/Database/Database.php';
use SourcePot\Database\Database;
$db = Database::pool(
   username: DB_USER,
   password: DB_PASS,
   host:     DB_HOST,
   dbname:   DB_NAME
);
