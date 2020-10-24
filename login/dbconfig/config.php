<?php
// https://www.w3schools.com/php/func_mysqli_connect.asp
// https://www.guru99.com/mysql-php-and-other-database-access-methods.html#1

$con = mysqli_connect("localhost", "root", "3193B03yk0kch1n") or die("Unable to connect");

// https://www.w3schools.com/php/func_mysqli_select_db.asp
// https://www.guru99.com/mysql-php-and-other-database-access-methods.html#2
mysqli_select_db($con, "testdb");
?>
