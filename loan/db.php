<?php

$db = mysqli_connect('localhost', 'root', '1234', 'myDB');
if (!$db)
{
	echo "접속 실패 :" . mysqli_connect_error();
}
else
{
}
?>
