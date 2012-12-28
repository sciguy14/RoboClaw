<?php
error_reporting(E_ALL);
echo "Hello";

ini_set("enable_dl","On");
echo "hi";
include('wiringpi.php');
echo "hello";
wiringpi::digitalWrite(21,1);



echo " World<br />\n";

?>
