
<?
	$usr=$_REQUEST['user'];
	$pas=$_REQUEST['pass'];
	$pas_hash=md5(md5(md5(md5($pas))));
	include('../script/sql.php');
	online_connect();
	mysql_select_db('vletpaoh_stem') or die ('Cannot connect to DB');

	$sql="SELECT * FROM `user` WHERE `user` LIKE '$usr' AND `pass` LIKE '$pas_hash'";
	$res=mysql_query($sql);
	if(mysql_fetch_row($res)==NULL || $res==NULL)
	{
		mysql_close();
		//header('Location: index.php?login_fail=1');
	}
	else
	{
		$res=mysql_query($sql);
		while($row=mysql_fetch_row($res))
		{
			setcookie("login_stat", 1, time() + (3600), "/");
			setcookie("login_name", $row[0], time() + (3600), "/");
			setcookie("login_permit", $row[3], time() + (3600), "/");
			setcookie("login_user", $row[1], time() + (3600), "/");
			//
			// 86400 -> 1D
			// 3600  -> 1HR
			// 60    -> 1MIN
			//
			mysql_close();
			header('Location: ../system');
		}
	}
?>
