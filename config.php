<?php

// database memo
// create database contact_dotinstall;

// grant all on contact_dotinstall.* to dbuser@localhost identified by 'rwrwrwrw0521';


// use contact_dotinstall;

// create table entries (
// 	id int not null auto_increment primary key,
// 	name varchar(255),
// 	email varchar(255),
// 	memo text,
// 	created datetime,
// 	modified datetime
// );

define('DSN', 'mysql:host=localhost;dbname=contact_dotinstall');
define('DB_USER', 'dbuser');
define('DB_PASSWORD', 'rwrwrwrw0521');

define('SITE_URL', '192.168.33.10/contact/index.php');
define('ADMIN_URL', SITE_URL.'admin/');

error_reporting(E_ALL & ~E_NOTICE);

session_set_cookie_params(0, '/contact/');
