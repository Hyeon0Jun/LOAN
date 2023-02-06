<?php
session_start();
include('db.php');
$sql = "SELECT * from member";
$ret = mysqli_query($db, $sql);

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>관리자</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="admin.php">관리자</a>
            <!-- Sidebar Toggle-->
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <a class="nav-link" href="admin.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                회원조회
                            </a>
                            <a class="nav-link" href="loan_lookup.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                대출조회
                            </a>
                            <a class="nav-link" href="loaninsert.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                대출상품입력
                            </a>
                            <a class="nav-link" href="logout.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                로그아웃
                            </a>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        <?php echo $_SESSION['id']; ?>님
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">회원</h1>
                        <div class="card mb-4">
                          <div>
                          <?php if(isset($_GET["error"])) { ?>
                          <p style="background-color: rgb(0, 0, 0); color: #ffffff; text-align: center; margin: 5px auto; font-size: 20px; border-radius: 5px;"><?php echo $_GET["error"]; ?></p>
                          <?php } ?>

                          <?php if(isset($_GET["success"])) { ?>
                          <p style="background-color: rgb(0, 0, 0); color: #ffffff; text-align: center; margin: 5px auto; font-size: 20px; border-radius: 5px;"><?php echo $_GET["success"]; ?></p>
                          <?php } ?>
                          </div>
                            <div class="card-body">
                              <input type="text" class="btn btn-inputsearch" id="myinput" onkeyup="searchtable()" placeholder="Search for loannames.." style="float: right;">
                                <table class="table" id="mytable">
                                  <thead>
                                      <tr>
                                          <th>아이디</th>
                                          <th>이름</th>
                                          <th>생년월일 <a onclick="sorttable(2)">▲</a></th>
                                          <th>전화번호</th>
                                          <th>부동산(단위:만) <a onclick="sorttable(4)">▲</a></th>
                                          <th>차(단위:만) <a onclick="sorttable(5)">▲</a></th>
                                          <th>신용점수 <a onclick="sorttable(6)">▲</a></th>
                                          <th>삭제</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                    <?php while($row = mysqli_fetch_array($ret)) { ?>

                                      <tr>
                                          <td><?php echo $row['id'] ?></td>
                                          <td><?php echo $row['mem_name'] ?></td>
                                          <td><?php echo $row['birth'] ?></td>
                                          <td><?php echo $row['phone'] ?></td>
                                          <td><?php echo $row['realestate'] ?></td>
                                          <td><?php echo $row['car'] ?></td>
                                          <td><?php echo $row['creditscore'] ?></td>
                                          <td> <a class="btn btn-secondary" href="delete.php?id=<?php echo $row['id']?>">삭제</a></td>
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
