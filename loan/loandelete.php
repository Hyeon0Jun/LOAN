<?php
session_start();
include('db.php');
$loan_num = $_GET['loan_num'];
$sql = "DELETE loanproduct from loanproduct where loan_num='".$loan_num."'";
$ret = mysqli_query($db, $sql);

if($ret)
{
  header("location: loan_lookup.php?success=삭제 성공");
  exit();
}
else {
  header("location: loan_lookup.php?error=삭제 실패");
  exit();
}

?>
