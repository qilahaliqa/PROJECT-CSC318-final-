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
  $insertSQL = sprintf("INSERT INTO cust_register (name, gender, date_of_birth, ic_num, phone_num, email, psi_t, password) VALUES (%s, %s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['name'], "text"),
                       GetSQLValueString($_POST['gender'], "text"),
                       GetSQLValueString($_POST['date_of_birth'], "date"),
                       GetSQLValueString($_POST['ic_num'], "text"),
                       GetSQLValueString($_POST['phone_num'], "text"),
                       GetSQLValueString($_POST['email'], "text"),
                       GetSQLValueString($_POST['psi_t'], "int"),
                       GetSQLValueString($_POST['password'], "password"));

  mysql_select_db($database_pustakaseriintan, $pustakaseriintan);
  $Result1 = mysql_query($insertSQL, $pustakaseriintan) or die(mysql_error());
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
              <li class="active">Register</li>
            </ol>
          </div>
        </div>
      </div>
    </div>

	<!--SECTION -->
    <!--===============================================================-->
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
				  				<div class="form-group">
                    <label for="input-name">Name<span class="required">*</span></label>
                    <input name="name" type="text" class="form-control" id="name" placeholder="Name" required>
     
                 </div>
				  				<div class="form-group">
                    <label for="inputGender">Gender</label></br>
                    <select name="gender" class="form-control" id="gender">
<option value="Male">Male</option>
											<option value="Female">Female</option>
										</select>
                  </div>
				  			<div class="form-inline">
          				<label for="inputBirthday">Date of Birth<span class="required">*</span></label></br>
          					<select class="form-control" id="inputYear" required>
											<option value="default">Year</option>
											<option value="1950">1950</option>
											<option value="1951">1951</option>
											<option value="1952">1952</option>
											<option value="1953">1953</option>
											<option value="1954">1954</option>
											<option value="1955">1955</option>
											<option value="1956">1956</option>
											<option value="1957">1957</option>
											<option value="1958">1958</option>
											<option value="1959">1959</option>
											<option value="1960">1960</option>
											<option value="1961">1961</option>
											<option value="1962">1962</option>
											<option value="1963">1963</option>
											<option value="1964">1964</option>
											<option value="1965">1965</option>
											<option value="1966">1966</option>
											<option value="1967">1967</option>
											<option value="1968">1968</option>
											<option value="1969">1969</option>
											<option value="1970">1970</option>
											<option value="1971">1971</option>
											<option value="1972">1972</option>
											<option value="1973">1973</option>
											<option value="1974">1974</option>
											<option value="1975">1975</option>
											<option value="1976">1976</option>
											<option value="1977">1977</option>
											<option value="1978">1978</option>
											<option value="1979">1979</option>
											<option value="1980">1980</option>
											<option value="1981">1981</option>
											<option value="1982">1982</option>
											<option value="1983">1983</option>
											<option value="1984">1984</option>
											<option value="1985">1985</option>
											<option value="1986">1986</option>
											<option value="1987">1987</option>
											<option value="1988">1988</option>
											<option value="1989">1989</option>
											<option value="1990">1990</option>
											<option value="1991">1991</option>
											<option value="1992">1992</option>
											<option value="1993">1993</option>
											<option value="1994">1994</option>
											<option value="1995">1995</option>
											<option value="1996">1996</option>
											<option value="1997">1997</option>
											<option value="1998">1998</option>
											<option value="1999">1999</option>
											<option value="2001">2001</option>
											<option value="2002">2002</option>
											<option value="2003">2003</option>
											<option value="2004">2004</option>
											<option value="2005">2005</option>
											<option value="2006">2006</option>
											<option value="2007">2007</option>
											<option value="2008">2008</option>
											<option value="2009">2009</option>
											<option value="2010">2010</option>
											<option value="2011">2011</option>
											<option value="2012">2012</option>
											<option value="2013">2013</option>
											<option value="2014">2014</option>
											<option value="2015">2015</option>
											<option value="2016">2016</option>
											<option value="2017">2017</option>
										</select>
										<select class="form-control" id="inputMonth" required>
											<option value="default">Month</option>
											<option value="Jan">January</option>
											<option value="Feb">February</option>
											<option value="Mar">March</option>
											<option value="Apr">April</option>
											<option value="June">June</option>
											<option value="July">July</option>
											<option value="Aug">August</option>
											<option value="Sept">September</option>
											<option value="Oct">October</option>
											<option value="Nov">November</option>
											<option value="Dec">December</option>
										</select>
										<select class="form-control" id="inputDay" required>
											<option value="default">Day</option>
											<option value="01">01</option>
											<option value="02">02</option>
											<option value="03">03</option>
											<option value="04">04</option>
											<option value="05">05</option>
											<option value="06">06</option>
											<option value="07">07</option>
											<option value="08">08</option>
											<option value="09">09</option>
											<option value="10">10</option>
											<option value="11">11</option>
											<option value="12">12</option>
											<option value="13">13</option>
											<option value="14">14</option>
											<option value="15">15</option>
											<option value="16">16</option>
											<option value="17">17</option>
											<option value="18">18</option>
											<option value="19">19</option>
											<option value="20">20</option>
											<option value="21">21</option>
											<option value="22">22</option>
											<option value="23">23</option>
											<option value="24">24</option>
											<option value="25">25</option>
											<option value="26">26</option>
											<option value="27">27</option>
											<option value="28">28</option>
											<option value="29">29</option>
											<option value="30">30</option>
											<option value="31">31</option>
										</select>
                  </div>
				  				</br>
				  				<div class="form-group">
                    <label for="inputIC">IC Number <em> (eg: 123456-11-1234)</em> </label>
                    <input name="ic_num" type="text" class="form-control" id="ic_num" placeholder="IC Number">
                  </div>
				  				<div class="form-group">
                    <label for="inputContact">Contact Number</label>
                    <input name="phone_num" type="text" class="form-control" id="phone_num" placeholder="Contact Number">
                  </div>
				  				<div class="form-group">
                    <label for="inputEmail">Email</label>
                    <input name="email" type="email" class="form-control" id="email" placeholder="Email">
                  </div>
				  				<div class="form-group">
                    <label for="inputID">PSI T<span class="required">*</span></label>
                    <input name="psi_t" type="text" class="form-control" id="psi_t" placeholder="PSI T" required>
                  </div>
                  <div class="form-group">
                    <label for="inputPassword">Password<span class="required">*</span></label>
                    <input name="password" type="password" class="form-control" id="password" placeholder="Password" required>
                  </div>
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" required> I read terms and conditions</label>
                  </div>
                  <button type="submit" class="btn btn-primary">Register</button>
				  				<br></br>
				  				<p>Already have an account?<a href="login.html"> Log In</a></p>
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
