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
if (isset($_GET['psi_t'])) {
  $colname_Recordset2 = $_GET['psi_t'];
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
<title>Untitled Document</title>
</head>

<body>
<form id="form1" name="form1" method="get" action="cust_delete2">
  <p>&nbsp;</p>
  <table width="103%" class="table table-hover">
    <thead>
      <tr>
        <th>No.</th>
        <th>Name</th>
        <th>Gender</th>
        <th>Date of birth</th>
        <th>IC Number</th>
        <th>Contact Number</th>
        <th>Email</th>
        <th>Expired Card</th>
        <th>PSI*T</th>
      </tr>
    </thead>
    <tbody>
      <?php $count=0 ?>
      <tr>
        <td height="31"><?php $count=$count+1; echo $count; ?></td>
        <td><?php echo $row_Recordset2['name']; ?></td>
        <td><?php echo $row_Recordset2['gender']; ?></td>
        <td><?php echo $row_Recordset2['date_of_birth']; ?></td>
        <td><?php echo $row_Recordset2['ic_num']; ?>
        <input name="ic_num" type="hidden" id="ic_num" value="<?php echo $row_Recordset1['ic_num']; ?>" /></td>
        <td><?php echo $row_Recordset2['phone_num']; ?></td>
        <td><?php echo $row_Recordset2['email']; ?></td>
        <td><?php echo $row_Recordset2['expired_card']; ?>
        <input name="expired_card" type="hidden" id="expired_card" value="<?php echo $row_Recordset1['expired_card']; ?>" /></td>
        <td><?php echo $row_Recordset2['psi_t']; ?>
        <input name="psi_t" type="hidden" id="psi_t" value="<?php echo $row_Recordset1['psi_t']; ?>" /></td>
      </tr>
    </tbody>
  </table>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
</form>
</body>
</html>
<?php
mysql_free_result($Recordset1);

mysql_free_result($Recordset2);
?>
