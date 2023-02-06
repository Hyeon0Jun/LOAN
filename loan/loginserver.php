<?php
include('db.php');
session_start();
if(isset($_POST['id']) && isset($_POST['pw']))
{
  $id = $_POST['id'];
  $pw = $_POST['pw'];

  if(empty($id))
  {
    header("location: loginview.php?error=아이디가 비어있어요");
    exit();
  }
  else if(empty($pw))
  {
    header("location: loginview.php?error=비밀번호가 비어있어요");
    exit();
  }
  else
  {
    if ($id=='aa' && $pw=='1234')
    {
        $_SESSION['id']=$id;
        header("location: admin.php");
    }
    else
    {
        $sql="SELECT * FROM member WHERE id='$id' and pw='$pw'";
        $result=mysqli_query($db,$sql);

        if(mysqli_num_rows($result) === 1)
        {
            $_SESSION['id']=$id;
            header("location: loan.php");
        }
        else
        {
          header("location: loginview.php?error=아이디 또는 비밀번호가 일치하지 않습니다");
          exit();
        }
     }
   }
 }
else
{
  header("location: loginview.php?error=오류");
  exit();
}
?>
