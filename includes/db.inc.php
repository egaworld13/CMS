<?php 
$db['db_host']="localhost";
$db['db_user']="root";
$db['db_pass']="";
$db['db_name']="cms";

// define("DB_HOST",'localhost')
//* with loop make same thing as line above but for all at once.
foreach($db as $key => $value){
//* define a constant 
  define(strtoupper($key),$value);

}
$connection = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);


//* Easyest way to connect to db
// $connection = mysqli_connect('localhost','root','','cms');
// if($connection){

//   echo "We are connected!";
// }


?>