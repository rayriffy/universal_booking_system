
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
	$sqlu_file2="../script/conf.json";
	$sqlu_json2=json_decode(file_get_contents($sqlu_file2),true);
	$usr_sql2=$sqlu_json2['mysql_setup']['mysql_json_user'];
	$pas_sql2=$sqlu_json2['mysql_setup']['mysql_json_password'];
	mysql_connect('localhost',$usr_sql2,$pas_sql2) or die("Could not connect to SQL");
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