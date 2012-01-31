<?php session_start();
$ids=$_GET['id'];
include 'config.php';

$sql = mysql_query ("select * from tblregistration where userid='$ids'") or die(mysql_error());
$row = mysql_fetch_array($sql);
$fname = $row['fname'];
$mname = $row['mname'];
$lname = $row['lname'];
$email = $row['email'];
$pass = $row['password'];
$level = $row['hd_level'];
$picture="images/".$row['picture'];

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

mysql_query( "update tblregistration set fname ='$fname', mname = '$mname', lname='$lname', email = '$email', password = '$pass' , userlevel='$level', picture = '$picture' where userid='$ids'");

echo "<script>alert('fsfsl');</script>>";	

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
  
  <table width="390" border="8" align="center" bgcolor="#000033" bordercolor="#999999">
  <tr>
    <td><strong><h2>EDIT PROFILE</h2></strong></td>
  </tr>
  <tr>
  	<td align="center">i<img src="<?php echo $picture; ?>"  width="150px" height="150px" />;</td>
  </tr>
  <tr>
    <td><table width="368" border="0">
      <tr>
        <td>&nbsp;</td>
        <td></td>
      </tr>
      <tr>
        <td width="108"><strong>Firstname:</strong></td>
        <td width="182"><input name="txtfname" type="text" value="<?php echo $fname; ?>" /></td>
      </tr>
      <tr>
        <td><strong>Middlename:</strong></td>
        <td><input name="txtmname" type="text" value="<?php echo $mname; ?>" /></td>
      </tr>
      <tr>
        <td><strong>Lastname:</strong></td>
        <td><input name="txtlname" type="text" value="<?php echo $lname; ?>" /></td>
      </tr>
      <tr>
        <td><strong>Email:</strong></td>
        <td><input name="txtemail" type="text" value="<?php echo $email; ?>" /></td>
      </tr>
      <tr>
        <td><strong>Password:</strong></td>
        <td><input name="txtpass" type="password" id="txtpass" value="<?php echo $pass; ?>" />
          <input name="hd_level" type="hidden" id="hd_level" value="<?php echo "user"?>" /></td>
      </tr>
      <tr>
        <td><strong>Picture:</strong></td>
        <td><input name="picture" type="file" value="<?php echo $pic; ?>"  /></td>
      </tr>
      <tr>
        <td><?php echo $ids;?></td>
        <td align="right">&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td align="right"><input name="btnreg" type="submit"   value="Save the changes"/></td>
      </tr>
    </table></td>
  </tr>
</table>
</form>
</body>
</html>