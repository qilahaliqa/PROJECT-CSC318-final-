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
?>
<?php
// *** Validate request to login to this site.
if (!isset($_SESSION)) {
  session_start();
}

$loginFormAction = $_SERVER['PHP_SELF'];
if (isset($_GET['accesscheck'])) {
  $_SESSION['PrevUrl'] = $_GET['accesscheck'];
}

if (isset($_POST['staff_id'])) {
  $loginUsername=$_POST['staff_id'];
  $password=$_POST['password'];
  $MM_fldUserAuthorization = "";
  $MM_redirectLoginSuccess = "examples/member.php";
  $MM_redirectLoginFailed = "staff_login.php";
  $MM_redirecttoReferrer = false;
  mysql_select_db($database_pustakaseriintan, $pustakaseriintan);
  
  $LoginRS__query=sprintf("SELECT staff_id, password FROM staff_register WHERE staff_id=%s AND password=%s",
    GetSQLValueString($loginUsername, "int"), GetSQLValueString($password, "text")); 
   
  $LoginRS = mysql_query($LoginRS__query, $pustakaseriintan) or die(mysql_error());
  $loginFoundUser = mysql_num_rows($LoginRS);
  if ($loginFoundUser) {
     $loginStrGroup = "";
    
    //declare two session variables and assign them
    $_SESSION['MM_Username'] = $loginUsername;
    $_SESSION['MM_UserGroup'] = $loginStrGroup;	      

    if (isset($_SESSION['PrevUrl']) && false) {
      $MM_redirectLoginSuccess = $_SESSION['PrevUrl'];	
    }
    header("Location: " . $MM_redirectLoginSuccess );
  }
  else {
    header("Location: ". $MM_redirectLoginFailed );
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
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
</head><!--/head-->
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
              <li class="active">Customer Login</li>
            </ol>
          </div>
        </div>
      </div>
    </div>

	<!-- SECTION -->
    <!--===============================================================-->
    <div class="section section-xs section-bottom">
      <div class="container">
        <div class="row mb">
          <div class="col-md-6 col-md-offset-3">
            <h3 class="title-md hr-left text-theme">Log in</h3>
            <div class="panel panel-primary text-theme">
              <div class="panel-heading">
                <h3 class="panel-title">Log In</h3>
              </div>
              <div class="panel-body">
                <form id="login-form" class="login" name="login-form" method="POST" action="<?php echo $loginFormAction; ?>">
                  <div class="form-group">
                    <label for="inputID">Staff ID</label>
                    <input name="staff_id" type="text" class="form-control" id="inputID" placeholder="Staff ID">
                  </div>
                  <div class="form-group">
                    <label for="inputPassword">Password</label>
                    <input name="password" type="password" class="form-control" id="inputPassword" placeholder="Password">
                  </div>
                  <div class="checkbox">
                    <label>
                      <input type="checkbox"> Remember me</label>
                  </div>
                  <input type="submit" name="login" id="login" value="Log In"  class="btn btn-primary text-theme-xs type=" size="5">
                  <a href="#" class="text-theme-xs pull-right a-black">Forgot your password ?</a>
									<br>
</br>
							
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
<br></br>
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
