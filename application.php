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
Database::pool(
   username: DB_USER,
   password: DB_PASS,
   host:     DB_HOST,
   dbname:   DB_NAME,
   pool_name: 'cms'
);


/**
 * Determine if the current request has been made with the 'POST' method.
 * Uses $_SERVER['REQUEST_METHOD'] to determine the request method
 * @return bool
 */
function isPostRequest(): bool
{
   return $_SERVER['REQUEST_METHOD'] === 'POST';
}

/**
 * Determine if the requested query parameter exists.
 * Uses $_REQUEST to check for the parameter
 * @param string $param the parameter to check for
 * @return bool
 */
function hasQueryParam( string $param ): bool
{
   return array_key_exists( $param, $_REQUEST );
}

function queryParam( string $param ): string
{
   if( hasQueryParam( $param ) ) return $_REQUEST[$param];
   return null;

}