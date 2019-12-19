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
$query_Recordset1 = "SELECT * FROM cust_register";
$Recordset1 = mysql_query($query_Recordset1, $pustakaseriintan) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);

$colname_Recordset2 = "-1";
if (isset($_POST['psi_t'])) {
  $colname_Recordset2 = $_POST['psi_t'];
}
mysql_select_db($database_pustakaseriintan, $pustakaseriintan);
$query_Recordset2 = sprintf("SELECT * FROM cust_register WHERE psi_t = %s", GetSQLValueString($colname_Recordset2, "int"));
$Recordset2 = mysql_query($query_Recordset2, $pustakaseriintan) or die(mysql_error());
$row_Recordset2 = mysql_fetch_assoc($Recordset2);
$totalRows_Recordset2 = mysql_num_rows($Recordset2);
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png" />
    <link rel="icon" type="image/png" href="../assets/img/favicon.png" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Material Dashboard by Creative Tim</title>
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
<title>PUSTAKA SERI INTAN</title>
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
                     <li>
                        <a href="../examples/member.php#">
                            <i class="material-icons">person</i>
                            <p>Member List</p>
                        </a>
                    </li>
                    <li class="active">
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
                        <a class="navbar-brand" href="#"> Search Member </a>
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
            
<form class="navbar-form navbar-right" role="search" id="form1" name="form1" method="post" action="cust_search.php">
  <div class="form-group is-empty">
    <span class="material-input"><input name="psi_t" type="text" class="form-control" placeholder="Search by PSI T" id="psi_t" /></span>  
  </div>
    <button type="submit" class="btn btn-white btn-round btn-just-icon" name="search" id="search" value="<?php echo $row_Recordset1['psi_t']; ?>" />
    <i class="material-icons">search</i>
    <div class="ripple-container"></div>
    </button>
  <p>&nbsp;</p>
  <p>Search Result</p>
  
  
  <?php if ($totalRows_Recordset2 > 0) { // Show if recordset not empty ?>
    <table width="100%" class="table table-hover" border="1">
      <thead>
        <tr>
          <th width="7%">Name</th>
          <th width="9%">Gender</th>
          <th width="15%">Date of birth</th>
          <th width="13%">IC Number</th>
          <th width="16%">Contact Number</th>
          <th width="10%">Email</th>
          <th width="15%">Expired Card</th>
          <th width="10%">PSI T</th>
        </tr>
      </thead>
      <tbody>
        <?php $count=0 ?>
        <tr>
          <td height="31"><?php echo $row_Recordset2['name']; ?></td>
          <td><?php echo $row_Recordset2['gender']; ?></td>
          <td><?php echo $row_Recordset2['date_of_birth']; ?></td>
          <td><?php echo $row_Recordset2['ic_num']; ?></td>
          <td><?php echo $row_Recordset2['phone_num']; ?></td>
          <td><?php echo $row_Recordset2['email']; ?></td>
          <td><?php echo $row_Recordset2['expired_card']; ?></td>
          <td><?php echo $row_Recordset2['psi_t']; ?></td>
        </tr>
      </tbody>
    </table>
    <?php } // Show if recordset not empty ?>
  <p>&nbsp;</p>
  <?php if ($totalRows_Recordset2 == 0) { // Show if recordset empty ?>
    <p>No information available</p>
    <?php } // Show if recordset empty ?>
<p>&nbsp;</p>
  <p>&nbsp;</p>
</form>
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
</body>
</html>
<?php
mysql_free_result($Recordset1);

mysql_free_result($Recordset2);
?>
