<?php require_once('../Connections/pustakaseriintan.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? "'" . doubleval($theValue) . "'" : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

mysql_select_db($database_pustakaseriintan, $pustakaseriintan);
$query_member = "SELECT * FROM cust_register";
$member = mysql_query($query_member, $pustakaseriintan) or die(mysql_error());
$row_member = mysql_fetch_assoc($member);
$totalRows_member = mysql_num_rows($member);
?><!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png" />
    <link rel="icon" type="image/png" href="../assets/img/favicon.png" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>PUSTAKA SERI INTAN</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    <!-- Bootstrap core CSS     -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
    <!--  Material Dashboard CSS    -->
    <link href="../assets/css/material-dashboard.css?v=1.2.0" rel="stylesheet" />
    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="../assets/css/demo.css" rel="stylesheet" />
    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300|Material+Icons' rel='stylesheet' type='text/css'>
</head>

<body>
    <div class="wrapper">
        <div class="sidebar" data-color="purple" data-image="../assets/img/sidebar-1.jpg">
            <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | blue | green | orange | red"

        Tip 2: you can also add an image using data-image tag
    -->
            <div class="logo">
                <a class="simple-text">
                    Pustaka Seri Intan
                </a>
            </div>
            <div class="sidebar-wrapper">
                <ul class="nav">
                   
                    <li class="active">
                        <a href="../examples/member.php#">
                            <i class="material-icons">person</i>
                            <p>Member List</p>
                        </a>
                    </li>
                    <li>
                        <a href="../examples/cust_search.php">
                            <i class="material-icons">search</i>
                            <p>Search Member</p>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="main-panel">
            <nav class="navbar navbar-transparent navbar-absolute">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="#"> Member List </a>
                    </div>
                    <div class="collapse navbar-collapse">
                        <ul class="nav navbar-nav navbar-right">
                            <li>
                                <a href="#pablo" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="material-icons">person</i>
                                    <p class="hidden-lg hidden-md">Profile</p>
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="http://localhost/pustakaseriintan/loyalty%20card.html">Log Out</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <div class="content">
                
                                    
                        <div class="col-md-12">
                            <div class="card card-plain">
                                <div class="card-header" data-background-color="purple">
                                    <h4 class="title">Member List </h4>
                                    <p class="category">Member List</p>
                                </div>
                                <div class="card-content table-responsive">
								 <form>
                                    <table width="103%" class="table table-hover">
                                        <thead>
                                            <tr><th>No.</th>
                                            <th>Name</th>
											<th>Gender</th>
											<th>Date of birth</th>
											<th>IC Number</th>
                                            <th>Contact Number</th>
											 <th>Email</th>
											 <th>Expired Card</th>
											 <th>PSI T</th>
                                        </thead>
										<tbody>
                                        <?php $count=0 ?>
                                            <?php do { ?>
                                              <tr>
                                                <td height="31"><?php $count=$count+1; echo $count; ?></td>
                                                <td><?php echo $row_member['name']; ?></td>
                                                <td><?php echo $row_member['gender']; ?></td>
                                                <td><?php echo $row_member['date_of_birth']; ?></td>
                                                <td><?php echo $row_member['ic_num']; ?>
                                                <input name="ic_num" type="hidden" id="ic_num" value="<?php echo $row_member['ic_num']; ?>"></td>
                                                <td><?php echo $row_member['phone_num']; ?></td>
                                                <td><?php echo $row_member['email']; ?></td>
                                                <td><?php echo $row_member['expired_card']; ?>
                                                <input name="expired_card" type="hidden" id="expired_card" value="<?php echo $row_member['expired_card']; ?>"></td>
                                                <td><?php echo $row_member['psi_t']; ?>
                                                <input name="psi_t" type="hidden" id="psi_t" value="<?php echo $row_member['psi_t']; ?>"></td>
                                                
                                                  <td><button align="right" style="font-size: 10px"><a href="cust_delete2.php?psi_t=<?php echo $row_member['psi_t']; ?>">Delete</a></button></td>
                                            </tr>
                                              <?php } while ($row_member = mysql_fetch_assoc($member)); ?>
                                        </tbody>
                                    </table>
								    
								 </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <footer class="footer">
                <div class="container-fluid">
                    <p align="right" class="copyright pull-right">
                        &copy;
                        <script>
                            document.write(new Date().getFullYear())
                        </script>
                        <a>PUSTAKA SERI INTAN</a></p>
                </div>
            </footer>
        </div>
    </div>
</body>
<!--   Core JS Files   -->
<script src="../assets/js/jquery-3.2.1.min.js" type="text/javascript"></script>
<script src="../assets/js/bootstrap.min.js" type="text/javascript"></script>
<script src="../assets/js/material.min.js" type="text/javascript"></script>
<!--  Charts Plugin -->
<script src="../assets/js/chartist.min.js"></script>
<!--  Dynamic Elements plugin -->
<script src="../assets/js/arrive.min.js"></script>
<!--  PerfectScrollbar Library -->
<script src="../assets/js/perfect-scrollbar.jquery.min.js"></script>
<!--  Notifications Plugin    -->
<script src="../assets/js/bootstrap-notify.js"></script>
<!--  Google Maps Plugin    -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
<!-- Material Dashboard javascript methods -->
<script src="../assets/js/material-dashboard.js?v=1.2.0"></script>
<!-- Material Dashboard DEMO methods, don't include it in your project! -->
<script src="../assets/js/demo.js"></script>

</html>
<?php
mysql_free_result($member);
?>
