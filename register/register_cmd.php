
<?
	$nam=$_REQUEST['name'];
	$usr=$_REQUEST['user'];
	$pas=$_REQUEST['pass'];
	if($nam=="" || $usr=="" || $pas=="")
	{
		header('Location: index.php?regis_stat=2');
	}
	else
	{
	$pas_hash=md5(md5(md5(md5($pas))));
	include('../script/sql.php');
	online_connect();
	mysql_select_db('vletpaoh_stem');

	$sql="INSERT INTO `user`(`name`, `user`, `pass`) VALUES ('$nam','$usr','$pas_hash')";
	$res=mysql_query($sql);
	if($res==NULL)
	{
		mysql_close();
		header('Location: index.php?regis_stat=3');
	}
	else
	{
		mysql_close();
		header('Location: index.php?regis_stat=4');
	}
	}
?>