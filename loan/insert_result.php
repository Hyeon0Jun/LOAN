<?php
include('db.php');

if(isset($_POST['id']) && isset($_POST['pw']) && isset($_POST['mem_name']) && isset($_POST['phone']) && isset($_POST['birth']))
{
  $id = $_POST["id"];
  $pw = $_POST["pw"];
  $mem_name = $_POST["mem_name"];
  $phone = $_POST["phone"];
  $birth = $_POST["birth"];
  $realestate = $_POST["realestate"];
  $car = $_POST["car"];
  $creditscore = $_POST["creditscore"];

  if(empty($id))
  {
    header("location: insert.php?error=아이디가 비어있어요");
    exit();
  }
  else if(empty($pw))
  {
    header("location: insert.php?error=비밀번호가 비어있어요");
    exit();
  }
  else if(empty($mem_name))
  {
    header("location: insert.php?error=이름이 비어있어요");
    exit();
  }
  else if(empty($phone))
  {
    header("location: insert.php?error=핸드폰번호가 비어있어요");
    exit();
  }
  else if(empty($birth))
  {
    header("location: insert.php?error=생년월일 비어있어요  ");
    exit();
  }
  else
  {
    $sql_same = "SELECT * FROM member where id = '$id'";
    $order = mysqli_query($db, $sql_same);

    if(mysqli_num_rows($order) > 0)
    {
      header("location: insert.php?error=이름이 이미 있어요");
      exit();
    }
    else
    {
      $sql = "insert into member(id,pw,mem_name,phone,birth,realestate,car,creditscore) values('$id','$pw','$mem_name','$phone','$birth','$realestate','$car','$creditscore')";
      $ret = mysqli_query($db, $sql);

      if($ret)
      {
        header("location: insert.php?success=성공적으로 가입되었습니다.");
        exit();
      }
      else {
        header("location: insert.php?error=가입에 실패했습니다.");
        exit();
      }
    }
  }
}
else
{
  header("location: insert.php?error=오류");
  exit();
}
?>
