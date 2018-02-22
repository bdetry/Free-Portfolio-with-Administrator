<?php

if(!defined('DB_HOST'))
{
    define('DB_HOST' , "");
}

if(!defined('DB_NAME'))
{
    define('DB_NAME' , "");
}

if(!defined('DB_USER'))
{
    define('DB_USER' , "");
}

if(!defined('DB_PASS'))
{
    define('DB_PASS' , "");
}

if(!defined( 'DOMAIN' ))
{
    define( 'DOMAIN', ( isset( $_SERVER['REQUEST_SCHEME'] ) ? $_SERVER['REQUEST_SCHEME'] : 'http' ) . '://' . $_SERVER['SERVER_NAME'] . ( !empty( $_SERVER['SERVER_PORT'] ) ? ':' . $_SERVER['SERVER_PORT'] : '' ) . dirname( $_SERVER['PHP_SELF'] ) . '/' );
}

if(!defined( 'THIS_SCRIPT_FOLDER' ))
{
    define('THIS_SCRIPT_FOLDER', basename(dirname( $_SERVER['PHP_SELF'] ))) ;
}

if(!defined('CONTACT_ME'))
{
    define('CONTACT_ME' , "");
}

/**
 * Author : Damian Tivelet
 **/

 if( strtoupper( substr( PHP_OS, 0, 3 ) )=='WIN' ) : // If the version of the operating system (provided by the pre-defined constants PHP_OS) corresponds to a Windows kernel,
    if( !defined( 'PHP_EOL') ) :
        define( 'PHP_EOL', "\r\n" );
    endif;

    if( !defined( 'DIRECTORY_SEPARATOR') ) :
        define( 'DIRECTORY_SEPARATOR', "\\" );
    endif;
else :
    if( !defined( 'PHP_EOL') ) :
        define( 'PHP_EOL', "\n" );
    endif;

    if( !defined( 'DIRECTORY_SEPARATOR') ) :
        define( 'DIRECTORY_SEPARATOR', "/" );
    endif;
endif;

if( !defined( 'DS' ) )
    define( 'DS', DIRECTORY_SEPARATOR ); // Defines the folders separator according to the system

