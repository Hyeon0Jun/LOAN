<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta charset="utf-8">
  <META http-equiv="X-UA-Compatible" content="IE=edge">
  <META name="viewport" content="width=device-width, initial-scale=1.0">
  <title>회원가입</title>
  <link rel="stylesheet" type="text/css" href="css/my.css">
</head>
  <body>
    <div class="center">
    <form action="insert_result.php" method="post">
    <h2>회원 가입</h2>
    <?php if(isset($_GET["error"])) { ?>
    <p class="error"><?php echo $_GET["error"]; ?></p>
    <?php } ?>
    <?php if(isset($_GET["success"])) { ?>
    <p class="success"><?php echo $_GET["success"]; ?></p>
    <?php } ?>
    <label>아이디</label>
    <input type="text" placeholder="아이디" name="id">
    <label>비밀번호</label>
    <input type="password" placeholder="비밀번호" name="pw">
    <label>이름</label>
    <input type="text" placeholder="이름" name="mem_name">
    <label>핸드폰번호</label>
    <input type="text" placeholder="번호" name="phone">
    <label>생년월일</label>
    <input type="text" placeholder="생년월일" name="birth">
    <label>부동산</label>
    <input type="text" placeholder="부동산가격단위(:만)" name="realestate">
    <label>차</label>
    <input type="text" placeholder="차가격단위(:만)" name="car">
    <label>신용점수</label>
    <input type="text" placeholder="신용점수" name="creditscore">
    <br>
    <button type="submit">가입</button>
    <a href="loginview.php" class="save">로그인 페이지</a>

    </form>
    </div>
  </body>
</html>
