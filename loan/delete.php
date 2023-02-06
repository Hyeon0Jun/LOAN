<?php
session_start();
include('db.php');
$id = $_GET['id'];
$sql = "DELETE from member where id='".$id."'";
$ret = mysqli_query($db, $sql);

if($ret)
{
  header("location: admin.php?success=삭제 성공");
  exit();
}
else {
  if(!$ret) { echo("쿼리오류 발생: " . mysqli_error($db));}
  header("location: admin.php?error=삭제 실패");
  exit();
}
?>
