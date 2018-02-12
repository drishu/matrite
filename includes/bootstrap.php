<?php

/**
 * These are the database login details
 */  

if (APPLICATION_ENV == 'production') {
    define("HOST", "localhost");
    define("USER", "r51890hobb_matrite");
    define("PASSWORD", "Sibiu=123");
    define("DATABASE", "r51890hobb_wp223");
}
if (APPLICATION_ENV == 'andras') {
    define("HOST", "localhost");
    define("USER", "myuser");
    define("PASSWORD", "andras");
    define("DATABASE", "matrite");
}
if (APPLICATION_ENV == 'adi') {
    define("HOST", "localhost");
    define("USER", "root");
    define("PASSWORD", "");
    define("DATABASE", "matrite");
}

define("BASE_PATH", $base);
