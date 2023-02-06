<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta charset="utf-8">
  <META http-equiv="X-UA-Compatible" content="IE=edge">
  <META name="viewport" content="width=device-width, initial-scale=1.0">
  <title>로그인</title>
  <link rel="stylesheet" type="text/css" href="css/my.css">
</head>
  <body>
    <div class="center" style="margin-top: 170px;">
    <form action="loginserver.php" method="post">
    <h2>로그인</h2>
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
    <br>
    <button type="submit">로그인</button>
    <a href="insert.php" class="save">회원가입 페이지</a>

    </form>
    </div>
  </body>
</html>
