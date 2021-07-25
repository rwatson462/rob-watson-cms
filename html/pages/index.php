<?php

/**
 * This file allows for creating and editing pages
 */

include dirname(__DIR__,2).'/application.php';

/**
 * Returns an array of page types.
 * Loads the page-types.json file from /data, if it exists and contains valid
 * json. Otherwise returns an empty array.
 * @return array
 */
function loadPageTypes(): array
{
   $filename = dirname(__DIR__,2).'/data/page-types.json';
   if( !file_exists( $filename ) ) return [];

   $contents = @file_get_contents( $filename );
   if( !$contents ) return [];

   $json = json_decode( $contents );
   if( json_last_error() !== JSON_ERROR_NONE ) return [];
   
   return $json;
}

/**
 * Returns the data for the requested page type
 * @param array $types The page types we have loaded
 * @param string $type_name The type we're looking for
 * @return object The data
 */
function loadPageType( array $types, string $type_name ): object|null
{
   foreach( $types as $page )
   {
      if( $page->name === $type_name )
      {
         return $page;
      }
   }
   return null;
}

//---> entry point

$page_types = loadPageTypes();

if( hasQueryParam( 'type' ) ) {
   // show data for the requested page type
   $type = getQueryParam( 'type' );
   
   $page = loadPageType( $page_types, $type );

   // error if the page type doesn't exist
   if( $page === null )
   {
      header( 'Content-type: text/plain' );
      echo 'Error, page type not found';
      exit;
   }

   include dirname(__DIR__,2).'/templates/new_page_form.php';
   exit;
}

?><!doctype html>
<html lang="en">
   <head>
      <style>

         @import url('https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,400;0,700;1,400&display=swap');

         html,body,ul,li,h1 {
            margin: 0;
            padding: 0;
         }

         html {
            font-size: 18px;
            font-family: "open sans";
         }

         body {
            padding: 1rem;
            font-size: 1rem;
         }

         header {
            padding-bottom: 1rem;
         }

         ul {
            padding: 1rem 0;
            display: flex;
            align-items: center;
            gap: 1rem;
         }

         li {
            list-style: none;
            text-transform: capitalize;
         }

         a {
            padding: 1rem;
            border: 2px solid;
            border-radius: 0.5rem;
            color: blue;
            text-decoration: none;
         }

         a:hover {
            color: purple;
         }

      </style>
      <title>Page types</title>
   </head>
   <body>
      <header>
         <h1>CMS: Create new page</h1>
      </header>
      <ul>
         <?php foreach( $page_types as $type ): ?>
            <li><a href="?type=<?= $type->name ?>"><?= $type->name ?></a></li>
         <?php endforeach; ?>
      </ul>
   </body>
</html>