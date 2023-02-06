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
    <form action="loaninsert_result.php" method="post">
    <h2>대출상품입력</h2>
    <?php if(isset($_GET["error"])) { ?>
    <p class="error"><?php echo $_GET["error"]; ?></p>
    <?php } ?>
    <?php if(isset($_GET["success"])) { ?>
    <p class="success"><?php echo $_GET["success"]; ?></p>
    <?php } ?>
      <label>분류</label>
      <input type="text" placeholder="대출분류" name="loanclassification">
      <label>대출이름</label>
      <input type="text" placeholder="대출이름" name="loan_name">
      <label>자동차담보대출한도비율</label>
      <input type="text" placeholder="자동차담보대출한도비율" name="l_car">
      <label>부동산담보대출한도비율</label>
      <input type="text" placeholder="부동산담보대출한도비율" name="l_realestate">
      <label>평균금리</label>
      <input type="text" placeholder="평균금리" name="avginterestrate">
      <label>한도</label>
      <input type="text" placeholder="한도(담보대출text로)" name="limitation">
      <label>은행</label>
      <input type="text" placeholder="은행" name="bank">
      <label>grade1</label>
      <input type="text" placeholder="(금리)없으면 -1" name="grade1">
      <label>grade2</label>
      <input type="text" placeholder="(금리)없으면 -1" name="grade2">
      <label>grade3</label>
      <input type="text" placeholder="(금리)없으면 -1" name="grade3">
      <label>grade4</label>
      <input type="text" placeholder="(금리)없으면 -1" name="grade4">
      <label>grade5</label>
      <input type="text" placeholder="(금리)없으면 -1" name="grade5">
      <label>grade6</label>
      <input type="text" placeholder="(금리)없으면 -1" name="grade6">
      <label>grade7</label>
      <input type="text" placeholder="(금리)없으면 -1" name="grade7">
      <label>grade8</label>
      <input type="text" placeholder="(금리)없으면 -1" name="grade8">

      <button type="submit">저장</button>
      <a href="loan_lookup.php" class="save">대출상품조회</a>
      </div>
  </body>
</html>
