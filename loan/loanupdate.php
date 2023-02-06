<?php

include('db.php');
$loan_num = isset($_GET['loan_num']) ? $_GET['loan_num'] : false;
$sql = "SELECT * FROM loanproduct left outer join interestrate on loanproduct.loan_num = interestrate.loanproduct_loan_num WHERE loan_num='".$loan_num."'";
$ret = mysqli_query($db, $sql);
$row = mysqli_fetch_array($ret);

$loanclassification = isset($row["loanclassification"]) ? $row["loanclassification"] : false;
$loan_name = isset($row["loan_name"]) ? $row["loan_name"] : false;
$l_car = isset($row["l_car"]) ? $row["l_car"] : false;
$l_realestate = isset($row["l_realestate"]) ? $row["l_realestate"] : false;
$avginterestrate = isset($row["avginterestrate"]) ? $row["avginterestrate"] : false;
$limitation = isset($row["limitation"]) ? $row["limitation"] : false;
$bank = isset($row["bank"]) ? $row["bank"] : false;
$grade1 = isset($row["grade1"]) ? $row["grade2"] : false;
$grade2 = isset($row["grade2"]) ? $row["grade2"] : false;
$grade3 = isset($row["grade3"]) ? $row["grade3"] : false;
$grade4 = isset($row["grade4"]) ? $row["grade4"] : false;
$grade5 = isset($row["grade5"]) ? $row["grade5"] : false;
$grade6 = isset($row["grade6"]) ? $row["grade6"] : false;
$grade7 = isset($row["grade7"]) ? $row["grade7"] : false;
$grade8 = isset($row["grade8"]) ? $row["grade8"] : false;
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta charset="utf-8">
  <META http-equiv="X-UA-Compatible" content="IE=edge">
  <META name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="css/my.css">

</head>
  <body>
    <div class="center">
    <form action="loanupdate_result.php" method="post">
    <h2>대출상품수정</h2>
    <?php if(isset($_GET["error"])) { ?>
    <p class="error"><?php echo $_GET["error"]; ?></p>
    <?php } ?>
    <?php if(isset($_GET["success"])) { ?>
    <p class="success"><?php echo $_GET["success"]; ?></p>
    <?php } ?>
    <label>대출번호</label>
    <input type="text" placeholder="대출번호(수정X)" name="loan_num" value=<?php echo $loan_num ?>>
    <label>분류</label>
    <input type="text" placeholder="대출분류" name="loanclassification" value=<?php echo $loanclassification ?>>
    <label>대출이름</label>
    <input type="text" placeholder="대출이름" name="loan_name" value=<?php echo $loan_name ?>>
    <label>자동차담보대출한도비율</label>
    <input type="text" placeholder="자동차담보대출한도비율" name="l_car" value=<?php echo $l_car ?>>
    <label>부동산담보대출한도비율</label>
    <input type="text" placeholder="부동산담보대출한도비율" name="l_realestate" value=<?php echo $l_realestate ?>>
    <label>평균금리</label>
    <input type="text" placeholder="평균금리" name="avginterestrate" value=<?php echo $avginterestrate ?>>
    <label>한도</label>
    <input type="text" placeholder="한도(담보대출text로)" name="limitation" value=<?php echo $limitation ?>>
    <label>은행</label>
    <input type="text" placeholder="은행" name="bank" value=<?php echo $bank ?>>
    <?php if(isset($row['loanname'])) { ?>
      <label>grade1</label>
      <input type="text" placeholder="없으면 -1" name="grade1" value=<?php echo $grade1 ?>>
      <label>grade2</label>
      <input type="text" placeholder="없으면 -1" name="grade2" value=<?php echo $grade2 ?>>
      <label>grade3</label>
      <input type="text" placeholder="없으면 -1" name="grade3" value=<?php echo $grade3 ?>>
      <label>grade4</label>
      <input type="text" placeholder="없으면 -1" name="grade4" value=<?php echo $grade4 ?>>
      <label>grade5</label>
      <input type="text" placeholder="없으면 -1" name="grade5" value=<?php echo $grade5 ?>>
      <label>grade6</label>
      <input type="text" placeholder="없으면 -1" name="grade6" value=<?php echo $grade6 ?>>
      <label>grade7</label>
      <input type="text" placeholder="없으면 -1" name="grade7" value=<?php echo $grade7 ?>>
      <label>grade8</label>
      <input type="text" placeholder="없으면 -1" name="grade8" value=<?php echo $grade8 ?>>
    <?php } ?>
      <button type="submit">수정</button>
      <a href="loan_lookup.php" class="save">대출상품조회</a>
      </div>
  </body>
</html>
