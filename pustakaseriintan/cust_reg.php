<?php require_once('Connections/pustakaseriintan.php'); ?>
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

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form3")) {
  $insertSQL = sprintf("INSERT INTO cust_register (name, gender, date_of_birth, ic_num, phone_num, email, psi_t, password, expired_card) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['name'], "text"),
                       GetSQLValueString($_POST['gender'], "text"),
					    GetSQLValueString($_POST['date_of_birth'], "text"),
                       GetSQLValueString($_POST['ic_num'], "text"),
                       GetSQLValueString($_POST['phone_num'], "text"),
                       GetSQLValueString($_POST['email'], "text"),
                       GetSQLValueString($_POST['psi_t'], "int"),
                       GetSQLValueString($_POST['password'], "text"),
                       GetSQLValueString($_POST['expired_card'], "text"));

  mysql_select_db($database_pustakaseriintan, $pustakaseriintan);
  $Result1 = mysql_query($insertSQL, $pustakaseriintan) or die(mysql_error());

  $insertGoTo = "cust_login.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="Creative One Page Parallax Template">
<meta name="keywords" content="Creative, Onepage, Parallax, HTML5, Bootstrap, Popular, custom, personal, portfolio" />
<meta name="author" content="">
<title>PUSTAKA SERI INTAN</title>
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/prettyPhoto.css" rel="stylesheet">
<link href="css/font-awesome.min.css" rel="stylesheet">
<link href="css/animate.css" rel="stylesheet">
<link href="css/main.css" rel="stylesheet">
<link href="css/responsive.css" rel="stylesheet">
<!--[if lt IE 9]> <script src="js/html5shiv.js"></script>
<script src="js/respond.min.js"></script> <![endif]-->
<link rel="shortcut icon" href="images/ico/icon.jpg">
<link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
<link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
<link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
</head>
<body>
	<div class="preloader">
		<div class="preloder-wrap">
			<div class="preloder-inner">
				<div class="ball"></div>
				<div class="ball"></div>
				<div class="ball"></div>
				<div class="ball"></div>
				<div class="ball"></div>
				<div class="ball"></div>
				<div class="ball"></div>
			</div>
		</div>
	</div><!--/.preloader-->
	<header id="navigation">
		<div class="navbar navbar-inverse navbar-fixed-top" role="banner">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
						<span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="index.html"><h1><img src="images/ico/ico.png" alt="logo"></h1></a>
				</div>
				<div class="collapse navbar-collapse">
					<ul class="nav navbar-nav navbar-right">
						<li><a href="index.html">Home</a></li>
						<li><a href="outlets.html">Outlets</a></li>
						<li><a href="contact.html">Contact</a></li>
						<li class="active"><a href="loyalty card.html">Loyalty Card</a></li>
					</ul>
				</div>
			</div>
		</div><!--/navbar-->
	</header> <!--/#navigation-->

	<br></br><br></br>
	<!--SECTION HEADING -->
    <!--===============================================================-->
    <div class="section-heading-page">
      <div class="container">
        <div class="row">
          <div class="col-sm-12">
            <ol class="breadcrumb text-right text-center-xs">
              <li>
                <a href="index.html">Home</a>
              </li>
              <li>
                <a href="loyalty card.html">Loyalty Card</a>
              </li>
              <li class="active">Register</li>
            </ol>
          </div>
        </div>
      </div>
    </div>

	<div class="section section-xs section-bottom">
      <div class="container">
        <div class="row mb">
          <div class="col-md-8 col-md-offset-2">
            <h3 class="title-md hr-left text-theme">Register</h3>
            <div class="panel panel-primary text-theme">
              <div class="panel-heading">
                <h3 class="panel-title">Registration Form</h3>
              </div>
              <div class="panel-body">
				<form action="<?php echo $editFormAction; ?>" id="form3" name="form3" method="POST">
				  <p align="center"></p>
  					<div align="center">
  					  <table width="695" border="0">
  					    <tr>
  					      <td width="350">Name</td>
   					     <td width="329"><input class="form-control" name="name" type="text" id="name" size="50" required/></td>
    				   </tr>
  					    <tr>
  					      <td>Gender</td>
      					  <td><p>
      					    <label>
      					      <input type="radio" name="gender" value="Male" id="RadioGroup1_0" />
      					      Male</label>
      					    <br />
      					    <label>
      					      <input type="radio" name="gender" value="Female" id="RadioGroup1_1" />
      					      Female</label>
      					    <br />
   					      </p></td>
  					    </tr>
                       <tr>
  					      <td>Date of birth <small> (eg: 12/12/2017)</small></td>
      					  <td><input class="form-control" name="date_of_birth" type="text" id="date_of_birth" size="50" /></td>
    				   </tr>
  					    <tr>
  					      <td>IC Number <small> (eg: 123456-11-1234)</small></td>
      					  <td><input class="form-control" name="ic_num" type="text" id="ic_num" size="50" /></td>
    				   </tr>
  					    <tr>
  					      <td>Contact Number</td>
      					  <td><input class="form-control" name="phone_num" type="text" id="phone_num" size="50" /></td>
    				   </tr>
  					    <tr>
  					      <td>Email</td>
      					  <td><input class="form-control" name="email" type="email" id="email" size="50" /></td>
    				   </tr>
  					    <tr>
  					      <td>PSI T*</td>
      					  <td><input class="form-control" name="psi_t" type="text" id="psi_t" size="50" required/></td>
    				   </tr>
  					    <tr>
  					      <td>Expired Card <small> (eg: 12/12/2017) </small></td>
      					  <td><input class="form-control" name="expired_card" type="text" id="expired_card" size="50" required/></td>
    				   </tr>  
  					    <tr>
  					      <td>Password <small>(less than 10)</small></td>
      					  <td><input class="form-control" name="password" type="text" id="password" size="50" required/></td>
    				   </tr>
			          </table>
                      <p>&nbsp;</p>
                     
<input name="cond" type="checkbox" id="cond" required/>
				           I read terms and conditions </td>
      					  &nbsp;
    				   
  					     <input name="Register" type="submit" class="btn btn-primary text-theme-xs type=" id="Register" value="Register" size="5" />  
      					
				  </div>
				 
  
  				<input type="hidden" name="MM_insert" value="form3" />
				</form>
				</div>
            </div>
          </div>
        </div>
      </div>
    </div>

	<footer id="footer">
		<div class="container">
			<div class="text-center">
				<p>Copyright &copy; 2017 - <a href="#">Pustaka Seri Intan</a> | All Rights Reserved</p>
			</div>
		</div>
	</footer> <!--/#footer-->
    
    <script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/smoothscroll.js"></script>
	<script type="text/javascript" src="js/jquery.isotope.min.js"></script>
	<script type="text/javascript" src="js/jquery.prettyPhoto.js"></script>
	<script type="text/javascript" src="js/jquery.parallax.js"></script>
	<script type="text/javascript" src="js/main.js"></script>
</body>
</html>
