<?php

/**
 * These are the database login details
 */  

if (APPLICATION_ENV == 'production') {
	define("HOST", "localhost");
	define("USER", "sec_user");
	define("PASSWORD", "eKcGZr59zAa2BEWU");
	define("DATABASE", "secure_login");
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
