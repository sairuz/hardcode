<?php
include('config.php');
if(isset($_POST['btnreg']))
{
$fname = $_POST['txtfname'];
$mname = $_POST['txtmname'];
$lname = $_POST['txtlname'];
$email = $_POST['txtemail'];
$pass = $_POST['txtpass'];
$level = $_POST['hd_level'];
$picture =$_FILES['picture']['name'];

if($picture=="")
{
	$picture=="";
}
else
{ 
$path = "images/"; 
copy($_FILES['picture']['tmp_name'],$path.$picture);
}

mysql_query (" insert into tblregistration(`fname`,`mname`, `lname`,`email`,`password`,`userlevel`,`picture`) values ('$fname', '$mname', '$lname', '$email', '$pass', '$level', '$picture')") or die(mysql_error());

echo "<script>alert('Succesfull Login!!!');</script";
header("Location: index.php?");

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
<form name="form1" action="<?php echo $_SERVER['PHP_SELF']?>" method="post" enctype="multipart/form-data">

<table width="200" border="8" align="center" bgcolor="#000033" bordercolor="#999999">
  <tr>
    <td><img src="pix/reg_icon.jpg" alt="register" height="100px" width="300px"  /></td>
  </tr>
  <tr>
    <td><table width="303" border="0">
      <tr>
        <td width="108"><strong>Firstname:</strong></td>
        <td width="182"><input name="txtfname" type="text" /></td>
      </tr>
      <tr>
        <td><strong>Middlename:</strong></td>
        <td><input name="txtmname" type="text" /></td>
      </tr>
      <tr>
        <td><strong>Lastname:</strong></td>
        <td><input name="txtlname" type="text" /></td>
      </tr>
      <tr>
        <td><strong>Email:</strong></td>
        <td><input name="txtemail" type="email" required /></td>
      </tr>
      <tr>
        <td><strong>Password:</strong></td>
        <td><input name="txtpass" type="password" />
          <input name="hd_level" type="hidden" id="hd_level" value="<?php echo "user"?>" /></td>
      </tr>
      <tr>
        <td><strong>Picture:</strong></td>
        <td><input name="picture" type="file" id="picture"  /></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td align="right">&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td align="right"><input name="btnreg" type="submit"   value="Register"/></td>
      </tr>
    </table></td>
  </tr>
</table>
<?php echo $_row['userid'];?>
</form>
</body>
</html>