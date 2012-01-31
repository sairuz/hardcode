<?php include 'config.php'?>
<?php 
	$sql=mysql_query ("select * from tblregistration");
		$row = mysql_fetch_array($sql);
	$num = mysql_num_rows($sql);
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<table width="861" height="50
" border="5" align="10">
  <tr>
    <td><table width="850" height="20" border="1">
      <tr>
        <td align="center"><h1>LIST OF USERS</h1></td>
      </tr>
    </table>
      <table width="854" height="10" border="0">
        <tr>
          <td height="152"><h3><strong>Lastname</strong></h3></td>
          <td><h3><strong>Firstname</strong></h3></td>
          <td><h3><strong>Middlename</strong></h3></td>
          <td><h3><strong>Delete</strong></h3></td>
          <td><h3><strong>Edit</strong></h3></td>
        </tr>
        <?php do{ ?>
        <tr>
          <td height="152"><?php echo $row['fname'];?></td>
          <td><?php echo $row['mname'];?></td>
          <td><?php echo $row['lname'];?></td>
          <td><input type="submit" name="btnedit" value="Edit" /></td>
          <td><input type="submit" name="btndel" value="Delete" /></td>
        </tr>
        <?php }while($row = mysql_fetch_assoc($sql)) ?>
      </table>
    <p>&nbsp;</p></td>
  </tr>
</table>
</body>
</html>