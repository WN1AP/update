<?
include('../../connect.php');

$extra_status = F;

for($i=0;$i<count($_POST["chkDel"]);$i++)
	{
		if($_POST["chkDel"][$i] != "")
		{
			$strSQL = " UPDATE admin_extraoptions SET extra_status = '$extra_status' ";
			$strSQL .=" WHERE id = '".$_POST["chkDel"][$i]."' ";
			$objQuery = mysql_query($strSQL);
		}
	}

	echo " <script language='javascript'> alert('Record delete successfully'); window.location='index.php'; </script> ";

mysql_close();
?>
