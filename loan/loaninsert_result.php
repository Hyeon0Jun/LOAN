<?php
include('db.php');

if(isset($_POST["grade1"]))
{
  $loanclassification = $_POST["loanclassification"];
  $loan_name = $_POST["loan_name"];
  $l_car = $_POST["l_car"];
  $l_realestate = $_POST["l_realestate"];
  $avginterestrate = $_POST["avginterestrate"];
  $limitation = $_POST["limitation"];
  $bank = $_POST["bank"];
  $grade1 = $_POST["grade1"];
  $grade2 = $_POST["grade2"];
  $grade3 = $_POST["grade3"];
  $grade4 = $_POST["grade4"];
  $grade5 = $_POST["grade5"];
  $grade6 = $_POST["grade6"];
  $grade7 = $_POST["grade7"];
  $grade8 = $_POST["grade8"];

  $numsql = "SELECT loan_num FROM loanproduct";
  $numret = mysqli_query($db, $numsql);
  $loanproduct_loan_num = mysqli_num_rows($numret)+1;

  if(empty($loanclassification))
  {
    header("location: loaninsert.php?error=분류가 비어있어요");
    exit();
  }
  else if(empty($loan_name))
  {
    header("location: loaninsert.php?error=이름이 비어있어요");
    exit();
  }
  else if(empty($avginterestrate))
  {
    header("location: loaninsert.php?error=금리가 비어있어요");
    exit();
  }
  else if(empty($limitation))
  {
    header("location: loaninsert.php?error=한도가 비어있어요");
    exit();
  }
  else if(empty($bank))
  {
    header("location: loaninsert.php?error=은행이 비어있어요");
    exit();
  }
  else
  {
    $sql_same = "SELECT * FROM loanproduct where loan_name = '$loan_name'";
    $order = mysqli_query($db, $sql_same);

    if(mysqli_num_rows($order) > 0)
    {
      header("location: loaninsert.php?error=이미 있어요");
      exit();
    }

    else
    {
      $sql = "INSERT into loanproduct values(null, '$loanclassification','$loan_name','$l_car','$l_realestate','$avginterestrate','$limitation','$bank');
       ALTER TABLE loanproduct auto_increment=1; SET @COUNT = 0; UPDATE loanproduct SET loan_num = @COUNT:=@COUNT+1;
      INSERT INTO interestrate values('$loan_name', '$grade1', '$grade2', '$grade3', '$grade4', '$grade5', '$grade6', '$grade7', '$grade8', '$loanproduct_loan_num');";

      $ret = mysqli_multi_query($db, $sql);

      if($ret)
      {
        header("location: loaninsert.php?success=성공적으로 입력되었습니다.");
        exit();
      }
      else {
        if(!$ret) {
    printf("Error: %s\n", mysqli_error($db));
    exit();
        }
        header("location: loaninsert.php?error=입력에 실패했습니다.");
        exit();
      }
    }
  }
}

else if(empty($_POST["grade1"]))
{
    $loanclassification = $_POST["loanclassification"];
    $loan_name = $_POST["loan_name"];
    $l_car = $_POST["l_car"];
    $l_realestate = $_POST["l_realestate"];
    $avginterestrate = $_POST["avginterestrate"];
    $limitation = $_POST["limitation"];
    $bank = $_POST["bank"];
    if(empty($loanclassification))
    {
      header("location: loaninsert.php?error=분류가 비어있어요");
      exit();
    }
    else if(empty($loan_name))
    {
      header("location: loaninsert.php?error=이름이 비어있어요");
      exit();
    }
    else if(empty($avginterestrate))
    {
      header("location: loaninsert.php?error=금리가 비어있어요");
      exit();
    }
    else if(empty($limitation))
    {
      header("location: loaninsert.php?error=한도가 비어있어요");
      exit();
    }
    else if(empty($bank))
    {
      header("location: loaninsert.php?error=은행이 비어있어요  ");
      exit();
    }
    else
    {
      $sql_same = "SELECT * FROM loanproduct where loan_name = '$loan_name'";
      $order = mysqli_query($db, $sql_same);

      if(mysqli_num_rows($order) > 0)
      {
        header("location: loaninsert.php?error=이미 있어요");
        exit();
      }
      else
      {
        $sql = "INSERT into loanproduct values(null, '$loanclassification','$loan_name','$l_car','$l_realestate','$avginterestrate','$limitation','$bank'); ALTER TABLE loanproduct auto_increment=1; SET @COUNT = 0; UPDATE loanproduct SET loan_num = @COUNT:=@COUNT+1;";
        $ret = mysqli_multi_query($db, $sql);

        if($ret)
        {
          header("location: loaninsert.php?success=성공적으로 입력되었습니다.");
          exit();
        }
        else {
          if(!$ret) {
      printf("Error: %s\n", mysqli_error($db));
      exit();
          }
          header("location: loaninsert.php?error=입력에 실패했습니다.");
          exit();
        }
      }
    }
}
?>
