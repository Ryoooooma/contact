
 -- database memo
 create database votation_dotinstall;

 grant all on votation_dotinstall.* to dbuser@localhost identified by 'rwrwrwrw0521';


 use votation_dotinstall;

 create table answers (
 	id int not null auto_increment primary key,
 	answer varchar(255),
 	remote_address varchar(15),
 	user_agent varchar(255),
 	answer_date date,
 	created datetime,
 	modified datetime
 	unique unique_answer (remote_address, user_agent, answer_date)
 );

-- define('DSN', 'mysql:host=localhost;dbname=contact_dotinstall');
-- define('DB_USER', 'dbuser');
-- define('DB_PASSWORD', 'rwrwrwrw0521');

-- define('SITE_URL', '192.168.33.10/contact/index.php');
-- define('ADMIN_URL', SITE_URL.'admin/');

-- error_reporting(E_ALL & ~E_NOTICE);

-- session_set_cookie_params(0, '/contact/');
