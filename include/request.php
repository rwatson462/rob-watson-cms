<?php

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

function getQueryParam( string $param ): string
{
   if( hasQueryParam( $param ) ) return $_REQUEST[$param];
   return null;

}
