<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------
| DATABASE CONNECTIVITY SETTINGS
| -------------------------------------------------------------------
| This file will contain the settings needed to access your database.
|
| For complete instructions please consult the "Database Connection"
| page of the User Guide.
|
| -------------------------------------------------------------------
| EXPLANATION OF VARIABLES
| -------------------------------------------------------------------
|
|	['hostname'] The hostname of your database server.
|	['username'] The username used to connect to the database
|	['password'] The password used to connect to the database
|	['database'] The name of the database you want to connect to
|	['dbdriver'] The database type. ie: mysql.  Currently supported:
				 mysql, mysqli, postgre, odbc, mssql, sqlite, oci8
|	['dbprefix'] You can add an optional prefix, which will be added
|				 to the table name when using the  Active Record class
|	['pconnect'] TRUE/FALSE - Whether to use a persistent connection
|	['db_debug'] TRUE/FALSE - Whether database errors should be displayed.
|	['cache_on'] TRUE/FALSE - Enables/disables query caching
|	['cachedir'] The path to the folder where cache files should be stored
|	['char_set'] The character set used in communicating with the database
|	['dbcollat'] The character collation used in communicating with the database
|
| The $active_group variable lets you choose which connection group to
| make active.  By pilsen there is only one group (the "pilsen" group).
|
| The $active_record variables lets you determine whether or not to load
| the active record class
*/

$active_group = "pilsen";
$active_record = TRUE;

$db['pilsen']['hostname'] = "localhost";
$db['pilsen']['username'] = "root";
$db['pilsen']['password'] = "";
$db['pilsen']['database'] = "db_pilsencallao";
$db['pilsen']['dbdriver'] = "mysql";
$db['pilsen']['dbprefix'] = "";
$db['pilsen']['pconnect'] = FALSE;
$db['pilsen']['db_debug'] = TRUE;
$db['pilsen']['cache_on'] = FALSE;
$db['pilsen']['cachedir'] = "";
$db['pilsen']['char_set'] = "utf8";
$db['pilsen']['dbcollat'] = "utf8_general_ci";


$db['galvez']['hostname'] = "localhost";
$db['galvez']['username'] = "root";
$db['galvez']['password'] = "";
$db['galvez']['database'] = "db_busca_galvez";
$db['galvez']['dbdriver'] = "mysql";
$db['galvez']['dbprefix'] = "";
$db['galvez']['pconnect'] = FALSE;
$db['galvez']['db_debug'] = FALSE;
$db['galvez']['cache_on'] = FALSE;
$db['galvez']['cachedir'] = "";
$db['galvez']['char_set'] = "utf8";
$db['galvez']['dbcollat'] = "utf8_general_ci";
$db['galvez']['swap_pre'] = "";
$db['galvez']['autoinit'] = TRUE;
$db['galvez']['stricton'] = FALSE;

/* End of file database.php */
/* Location: ./system/application/config/database.php */