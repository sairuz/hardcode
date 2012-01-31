<?php include 'config.php';?>
<?php
session_start();

if(isset($_POST['btnlogin']))
{
$email =$_POST['txtemail'];
$pass = $_POST['txtpass'];

$test =mysql_query("select * from  tblregistration where email='$email' and password ='$pass'");

$data = mysql_num_rows($test);
$kuha = mysql_fetch_array($test);

$id = $kuha['userid'];

if($data> 0)
{
echo "<script>alert('Welcome...Successfully Login!!');

</script>";	
header("Location: update.php?id=$id");

}
else
{
	echo"<script>alert('Login Failed. Please Check you email and password');</script>";
}
}
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<style type="text/css">
body,td,th {
	color: #FFF;
}
</style>
</head>

<body>
<form name= "form1" action="<?php echo $_SERVER['PHP_SELF']; ?>"   method="post" enctype="multipart/form-data">
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <table width="348" height="293" border="8" bgcolor="#000033" align="center" bordercolor="#999999">
 
  <tr>
    <td height="83"><h1><img src="pix/login_icon.png" height="100px" width="107"  />LOG-IN</h1></td>

  </tr>
  <tr>
    <td height="83"><table width="343" border="0">
      <tr>
        <td width="91"><strong>Email:</strong></td>
        <td width="241"><input name="txtemail" type="email" /></td>
      </tr>
      <tr>
        <td><strong>Password:</strong></td>
        <td><input name="txtpass"  type="password" /></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td align="right">&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td align="right"><input  name="btnlogin" type="submit" value="LOG-IN"/></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td>Please Enter your valid Account!!!</td>
  </tr>
  </table>
  <p>&nbsp;</p>
</form>
<h1>&nbsp;</h1>
</body>
</html>