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

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form1")) {
  $updateSQL = sprintf("UPDATE cust_register SET name=%s, date_of_birth=%s, ic_num=%s, phone_num=%s, email=%s, password=%s WHERE psi_t=%s",
                       GetSQLValueString($_POST['name'], "text"),
                       GetSQLValueString($_POST['date_of_birth'], "text"),
                       GetSQLValueString($_POST['ic_num'], "text"),
                       GetSQLValueString($_POST['phone_num'], "text"),
                       GetSQLValueString($_POST['email'], "text"),
                       GetSQLValueString($_POST['password'], "text"),
                       GetSQLValueString($_POST['psi_t'], "int"));

  mysql_select_db($database_pustakaseriintan, $pustakaseriintan);
  $Result1 = mysql_query($updateSQL, $pustakaseriintan) or die(mysql_error());

  $updateGoTo = "../examples/profile2.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}

$colname_Recordset1 = "-1";
if (isset($_GET['psi_t'])) {
  $colname_Recordset1 = $_GET['psi_t'];
}
mysql_select_db($database_pustakaseriintan, $pustakaseriintan);
$query_Recordset1 = sprintf("SELECT * FROM cust_register WHERE psi_t = %s", GetSQLValueString($colname_Recordset1, "int"));
$Recordset1 = mysql_query($query_Recordset1, $pustakaseriintan) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
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
<title>PUSTAKA INTAN SERI INTAN</title>
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
                        <a href="../examples/profile2.php">
                        <i class="material-icons">person</i>
                        <p>User Profile</p>
                      </a>
                  </li>
                    <li></li>
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
                        <a class="navbar-brand" href="#"> Profile </a>
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
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header" data-background-color="purple">
                                    <h4 class="title">Edit Profile</h4>
                                    <p class="category">Complete your profile</p>
                                </div>
                              <div class="card-content">
                              
<form id="form1" name="form1" method="POST" action="<?php echo $editFormAction; ?>">
  <div align="center"></div>
  <div align="center"></div>
  <p>&nbsp;</p>
  <table width="469" border="0" align="center">
    <tr>
      <td width="143">Name</td>
      <td width="310"><input class="form-control" name="name" type="text" id="name" value="<?php echo $row_Recordset1['name']; ?>" size="60" /></td>
    </tr>
    <tr>
      <td>Gender</td>
      
      		<?php if ($row_Recordset1['gender']=="1")
				$gender="Male";
			else
				$gender="Female";
			?>
      	<td><p>
      	  <label>
      	    <input  <?php if (!(strcmp($row_Recordset1['gender'],"Male"))) {echo "checked=\"checked\"";} ?> type="radio" name="gender" value="Male" id="RadioGroup1_0" />
      	    Male</label>
      	  <br />
      	  <label>
      	    <input  <?php if (!(strcmp($row_Recordset1['gender'],"Female"))) {echo "checked=\"checked\"";} ?> type="radio" name="gender" value="Female" id="RadioGroup1_1" />
      	    Female</label>
      	  <br />
    	  </p>      	<label></label></td>
    </tr>
    <tr>
      <td>Email</td>
      <td><input class="form-control" name="email" type="text" id="email" value="<?php echo $row_Recordset1['email']; ?>" size="60" /></td>
    </tr>
    <tr>
      <td>Date of birth</td>
      <td><input class="form-control" name="date_of_birth" type="text" id="date_of_birth" value="<?php echo $row_Recordset1['date_of_birth']; ?>" size="60" /></td>
    </tr>
    <tr>
      <td>IC Number</td>
      <td><input class="form-control" name="ic_num" type="hidden" id="ic_num" value="<?php echo $row_Recordset1['ic_num']; ?>" />
      <?php echo $row_Recordset1['ic_num']; ?></td>
    </tr>
    <tr>
      <td>Phone Number</td>
      <td><input class="form-control" name="phone_num" type="text" id="phone_num" value="<?php echo $row_Recordset1['phone_num']; ?>" size="60" /></td>
    </tr>
    <tr>
      <td>PSI T</td>
      <td><input class="form-control" name="psi_t" type="hidden" id="psi_t" value="<?php echo $row_Recordset1['psi_t']; ?>" />
        <?php echo $row_Recordset1['psi_t']; ?></td>
    </tr>
    <tr>
      <td>Password</td>
      <td><input class="form-control" name="password" type="text" id="password" value="<?php echo $row_Recordset1['password']; ?>" size="60" /></td>
    </tr>
  </table>
  <p>&nbsp;</p>
  <p align="center">
    <input name="update" type="submit" class="btn-success" id="update" value="Update" />
  </p>
  <p align="center">&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <input type="hidden" name="MM_update" value="form1" />
</form>

</div>
                           </div>
                        </div>
                 
                    </div>
                </div>
            </div>
<footer class="footer">
                <div class="container-fluid">
                    <p class="copyright pull-right">
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
?>