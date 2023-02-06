<?php
session_start();
include('db.php');
$user=$_SESSION['id'];
$sql = "SELECT * FROM loanproduct left outer join interestrate on loanproduct.loan_num = interestrate.loanproduct_loan_num";
$ret = mysqli_query($db, $sql);
$usql = "SELECT * FROM member WHERE id='$user'";
$uret = mysqli_query($db, $usql);
$urow = mysqli_fetch_array($uret);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>LOAN</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="loan.php">LOAN</a>
            <!-- Sidebar Toggle-->
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <a class="nav-link" href="insert.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                회원가입
                            </a>
                            <a class="nav-link" href="loginview.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                로그인
                            </a>
                            <a class="nav-link" href="logout.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                로그아웃
                            </a>
                            <a class="nav-link" href="loan.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                대출상품
                            </a>
                            <a class="nav-link" href="loanapplication.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                대출신청
                            </a>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        <?php if(isset($_SESSION['id'])) {echo $_SESSION['id'];} ?>님
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">대출상품</h1>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                대출상품
                            </div>
                            <div class="card-body">
                              <a class="btn btn-secondary" href="loanproduct1.php">신용대출</a>
                              <a class="btn btn-secondary" href="loanproduct2.php">부동산담보대출</a>
                              <a class="btn btn-secondary" href="loanproduct3.php">자동차담보대출</a>
                              <a class="btn btn-secondary" href="loanproduct4.php">서민금융대출</a>
                              <input type="text" class="btn btn-inputsearch" id="myinput" onkeyup="searchtable()" placeholder="Search for loannames.." style="float: right;">

                                <table class="table" id="mytable">
                                    <thead>
                                        <tr>
                                          <th>분류</th>
                                          <th>대출이름</th>
                                          <th>한도 <a onclick="sorttable(2)">▲</a></th>
                                          <th>금리 <a onclick="sorttable(3)">▲</a></th>
                                          <th>은행</th>
                                          <th>대출신청</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      <?php while($row = mysqli_fetch_array($ret)) { if(isset($row['loanname'])) {
                                      if($urow['creditscore'] > 900) { if($row['grade1'] == -1) { continue; } else{$interestrate = $row['grade1'];} }
                                      else if($urow['creditscore'] > 800) { if($row['grade2'] == -1) { continue; } else{$interestrate = $row['grade2'];} }
                                      else if($urow['creditscore'] > 700) { if($row['grade3'] == -1) { continue; } else{$interestrate = $row['grade3'];} }
                                      else if($urow['creditscore'] > 600) { if($row['grade4'] == -1) { continue; } else{$interestrate = $row['grade4'];} }
                                      else if($urow['creditscore'] > 500) { if($row['grade5'] == -1) { continue; } else{$interestrate = $row['grade5'];} }
                                      else if($urow['creditscore'] > 400) { if($row['grade6'] == -1) { continue; } else{$interestrate = $row['grade6'];} }
                                      else if($urow['creditscore'] > 300) { if($row['grade7'] == -1) { continue; } else{$interestrate = $row['grade7'];} }
                                      else { if($row['grade8'] == -1) { continue; } else{$interestrate = $row['grade8'];} }}?>

                                        <tr>
                                            <td><?php echo $row['loanclassification'] ?></td>
                                            <td><?php echo $row['loan_name'] ?></td>
                                            <td><?php if($row['loanclassification'] == "신용대출" || $row['loanclassification'] == "서민금융대출") { echo $row['limitation']; }
                                            else if($row['loanclassification'] == "부동산담보대출") { echo $urow['realestate']*$row['l_realestate']; }
                                            else if($row['loanclassification'] == "자동차담보대출") { echo $urow['car']*$row['l_car']; }?></td>
                                            <td><?php if(isset($row['loanname'])) {echo $interestrate;} else {echo $row['avginterestrate'];} ?>%</td>
                                            <td><?php echo $row['bank'] ?></td>
                                            <td> <a class="btn btn-secondary" href="loanapplication.php?loan_num=<?php echo $row['loan_num']?>">신청</a></td>
                                        </tr>
                                      <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
        <script>
        function sorttable(n) {
          var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
          table = document.getElementById("mytable");
          switching = true;
          dir = "asc";
          while (switching) {
            switching = false;
            rows = table.rows;
            for (i = 1; i < (rows.length - 1); i++) {
              shouldSwitch = false;
              x = rows[i].getElementsByTagName("TD")[n];
              y = rows[i + 1].getElementsByTagName("TD")[n];
              if (dir == "asc") {
                if (parseInt(x.innerHTML, 10) > parseInt(y.innerHTML, 10)) {
                  shouldSwitch= true;
                  break;
                }
              } else if (dir == "desc") {
                if (parseInt(x.innerHTML, 10) < parseInt(y.innerHTML, 10)) {

                  shouldSwitch = true;
                  break;
                }
              }
            }
            if (shouldSwitch) {

              rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
              switching = true;
              switchcount ++;
            }
            else {
              if (switchcount == 0 && dir == "asc") {
                dir = "desc";
                switching = true;
              }
            }
          }
        }

        function searchtable() {
          var input, filter, table, tr, td, i, txtValue;
          input = document.getElementById("myinput");
          filter = input.value.toUpperCase();
          table = document.getElementById("mytable");
          tr = table.getElementsByTagName("tr");
          for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[1];
            if (td) {
              txtValue = td.textContent || td.innerText;
              if (txtValue.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
              } else {
                tr[i].style.display = "none";
              }
            }
          }
        }
        </script>
    </body>
</html>
