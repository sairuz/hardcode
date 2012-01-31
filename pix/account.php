<?php require_once('Connections/con_ame.php'); ?>
<?php
//initialize the session
if (!isset($_SESSION)) {
  session_start();
}

// ** Logout the current user. **
$logoutAction = $_SERVER['PHP_SELF']."?doLogout=true";
if ((isset($_SERVER['QUERY_STRING'])) && ($_SERVER['QUERY_STRING'] != "")){
  $logoutAction .="&". htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_GET['doLogout'])) &&($_GET['doLogout']=="true")){
  //to fully log out a visitor we need to clear the session varialbles
  $_SESSION['MM_Username'] = NULL;
  $_SESSION['MM_UserGroup'] = NULL;
  $_SESSION['PrevUrl'] = NULL;
  unset($_SESSION['MM_Username']);
  unset($_SESSION['MM_UserGroup']);
  unset($_SESSION['PrevUrl']);
	
  $logoutGoTo = "index.php";
  if ($logoutGoTo) {
    header("Location: $logoutGoTo");
    exit;
  }
}
?>
<?php
if (!isset($_SESSION)) {
  session_start();
}
$MM_authorizedUsers = "user";
$MM_donotCheckaccess = "false";

// *** Restrict Access To Page: Grant or deny access to this page
function isAuthorized($strUsers, $strGroups, $UserName, $UserGroup) { 
  // For security, start by assuming the visitor is NOT authorized. 
  $isValid = False; 

  // When a visitor has logged into this site, the Session variable MM_Username set equal to their username. 
  // Therefore, we know that a user is NOT logged in if that Session variable is blank. 
  if (!empty($UserName)) { 
    // Besides being logged in, you may restrict access to only certain users based on an ID established when they login. 
    // Parse the strings into arrays. 
    $arrUsers = Explode(",", $strUsers); 
    $arrGroups = Explode(",", $strGroups); 
    if (in_array($UserName, $arrUsers)) { 
      $isValid = true; 
    } 
    // Or, you may restrict access to only certain users based on their username. 
    if (in_array($UserGroup, $arrGroups)) { 
      $isValid = true; 
    } 
    if (($strUsers == "") && false) { 
      $isValid = true; 
    } 
  } 
  return $isValid; 
}

$MM_restrictGoTo = "index.php";
if (!((isset($_SESSION['MM_Username'])) && (isAuthorized("",$MM_authorizedUsers, $_SESSION['MM_Username'], $_SESSION['MM_UserGroup'])))) {   
  $MM_qsChar = "?";
  $MM_referrer = $_SERVER['PHP_SELF'];
  if (strpos($MM_restrictGoTo, "?")) $MM_qsChar = "&";
  if (isset($_SERVER['QUERY_STRING']) && strlen($_SERVER['QUERY_STRING']) > 0) 
  $MM_referrer .= "?" . $_SERVER['QUERY_STRING'];
  $MM_restrictGoTo = $MM_restrictGoTo. $MM_qsChar . "accesscheck=" . urlencode($MM_referrer);
  header("Location: ". $MM_restrictGoTo); 
  exit;
}
?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

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
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
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

$colname_rs_id1 = "-1";
if (isset($_SESSION['MM_Username'])) {
  $colname_rs_id1 = $_SESSION['MM_Username'];
}
mysql_select_db($database_con_ame, $con_ame);
$query_rs_id1 = sprintf("SELECT userid FROM tblregistration WHERE userid = %s", GetSQLValueString($colname_rs_id1, "int"));
$rs_id1 = mysql_query($query_rs_id1, $con_ame) or die(mysql_error());
$row_rs_id1 = mysql_fetch_assoc($rs_id1);
$totalRows_rs_id1 = mysql_num_rows($rs_id1);$colname_rs_id1 = "-1";
if (isset($_SESSION['MM_Username'])) {
  $colname_rs_id1 = $_SESSION['MM_Username'];
}
mysql_select_db($database_con_ame, $con_ame);
$query_rs_id1 = sprintf("SELECT userid FROM tblregistration WHERE userid = %s", GetSQLValueString($colname_rs_id1, "int"));
$rs_id1 = mysql_query($query_rs_id1, $con_ame) or die(mysql_error());
$row_rs_id1 = mysql_fetch_assoc($rs_id1);
$totalRows_rs_id1 = mysql_num_rows($rs_id1);
$query_rs_id1 = "SELECT userid FROM tblregistration";
$rs_id1 = mysql_query($query_rs_id1, $con_ame) or die(mysql_error());
$row_rs_id1 = mysql_fetch_assoc($rs_id1);
$totalRows_rs_id1 = mysql_num_rows($rs_id1);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<style type="text/css">
#apDiv1 {
	position:absolute;
	width:702px;
	height:584px;
	z-index:1;
}
body {
	background-color: #06F;
}
</style>
</head>

<body>
<p>&nbsp;</p>
<p>&nbsp;</p>


<table width="713" border="0" align="center" bgcolor="#FFFFFF">
  <tr>
    <td colspan="6" bgcolor="#000066"><p><img src="pix/Ameritech-logo.png" width="685" height="152" alt="header" /></p></td>
  </tr>
  <tr >
    <td width="110"><img src="pix/home.png" alt="home" width="110" height="34" border="0" usemap="#Map2" /></td>
    <td width="110"><p><img src="pix/view.png" alt="v" width="110" height="34" border="0" usemap="#Map" /></p></td>
   <td width="110"><p><img src="pix/editbotton.png" alt="edit" width="110" height="34" border="0" usemap="#Map4" /></p></td>
    <td width="110"><img src="pix/contactus.png" alt="log" width="110" height="34" border="0" usemap="#Map2" /></td>
    <td width="149"><a href="<?php echo $logoutAction ?>"><img src="pix/logout.png" alt="logout" width="110" height="34" border="0" /></a></td>
    <td width="162"><form id="form1" name="form1" method="post" action="">
  <input name="hd_idpass" type="hidden" id="hd_idpass" value="<?php echo $row_rs_id1['userid']; ?>" />
</form>&nbsp;</td>
 <!-- <td width="46"><a href="view.php?id=<?php echo $row_rs_id1['userid']; ?>" target="f1">View</a> || <a href="update.php?id=<?php echo $row_rs_id1['userid']; ?>">Edit</a> || <a href="delete.php?id=<?php echo $row_rs_id1['userid']; ?>">Delete </a>&nbsp;</td>-->
  </tr>
     
</table>
<table width="715" border="0" align="center" bgcolor="#FFFFFF">
  <tr>
    <td>
    <iframe name ="f1" id="apDiv1"></iframe>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p></td>
  </tr>
</table>

<map name="Map" id="Map">
  <area shape="rect" coords="11,5,97,27" href="view.php?id=<?php echo $row_rs_id1['userid']; ?>" target="f1" />
</map>

<map name="Map2" id="Map2">
  <area shape="rect" coords="9,5,102,26" href="account.php" target="_blank" />
</map>
<map name="Map4" id="Map4">
  <area shape="rect" coords="9,9,101,26" href="update.php?id=<?php echo $row_rs_id1['userid']; ?>" target="f1" />
</map>
</body>
</html>
<?php
mysql_free_result($rs_id1);
?>
