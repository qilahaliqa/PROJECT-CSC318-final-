<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_pustakaseriintan = "localhost";
$database_pustakaseriintan = "pustaka_seri_intan";
$username_pustakaseriintan = "root";
$password_pustakaseriintan = "";
$pustakaseriintan = mysql_pconnect($hostname_pustakaseriintan, $username_pustakaseriintan, $password_pustakaseriintan) or trigger_error(mysql_error(),E_USER_ERROR); 
?>