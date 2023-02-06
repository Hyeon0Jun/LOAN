<?php
include('db.php');

$loan_num = $_POST['loan_num'];
$loanclassification = $_POST["loanclassification"];
$loan_name = $_POST["loan_name"];
$l_car = $_POST["l_car"];
$l_realestate = $_POST["l_realestate"];
$avginterestrate = $_POST["avginterestrate"];
$limitation = $_POST["limitation"];
$bank = $_POST["bank"];
if(isset($_POST["grade1"]))
{
  $grade1 = $_POST["grade1"];
  $grade2 = $_POST["grade2"];
  $grade3 = $_POST["grade3"];
  $grade4 = $_POST["grade4"];
  $grade5 = $_POST["grade5"];
  $grade6 = $_POST["grade6"];
  $grade7 = $_POST["grade7"];
  $grade8 = $_POST["grade8"];

$sql = "UPDATE loanproduct SET loan_num='".$loan_num."', loanclassification='".$loanclassification."', loan_name='".$loan_name."', l_car='".$l_car."', l_realestate='".$l_realestate."', avginterestrate='".$avginterestrate."', limitation='".$limitation."', bank='".$bank."' WHERE loan_num='".$loan_num."';
UPDATE interestrate SET loan_name='".$loan_name."', grade1='".$grade1."', grade2='".$grade2."', grade3='".$grade3."', grade4='".$grade4."', grade5='".$grade5."', grade6='".$grade6."', grade7='".$grade7."', grade8='".$grade8."', loanproduct_loan_num='".$loan_num."' WHERE loanproduct_loan_num='".$loan_num."';";

$ret = mysqli_multi_query($db, $sql);
}
else
{
  $sql = "UPDATE loanproduct SET loan_num='".$loan_num."', loanclassification='".$loanclassification."', loan_name='".$loan_name."', l_car='".$l_car."', l_realestate='".$l_realestate."', avginterestrate='".$avginterestrate."', limitation='".$limitation."', bank='".$bank."' WHERE loan_num='".$loan_num."';";

  $ret = mysqli_query($db, $sql);
}
if($ret)
{
  header("location: loanupdate.php?success=수정 성공");
  exit();
}
else {

  header("location: loanupdate.php?error=수정 실패");
  exit();
}
?>
