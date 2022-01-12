<?Php

$dbhost_name = "localhost"; 
$database = "sae_sollen";       
$username = "root";            
$password = "";



try {
    $dbo = new PDO("mysql:host=$dbhost_name;dbname=$database;charset=utf8", $username, $password,
    array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));

//$dbo = new PDO('mysql:host='.$dbhost_name.';dbname='.$database, $username, $password,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));

} catch (PDOException $e) {
print "Error!: " . $e->getMessage() . "<br/>";
die();
}
