<?
	$file="../script/conf.json";
	$json=json_decode(file_get_contents($file),true);
	$usr=$json['mysql_setup']['mysql_json_user'];
	$pas=$json['mysql_setup']['mysql_json_password'];
	echo $usr."<br />".$pas."<br />";
	function local_connect()
	{
		mysql_connect('localhost','$usr','$pas') or die("Could not connect to SQL");
	}
	function online_connect()
	{
		mysql_connect('localhost','$usr','$pas') or die("Could not connect to SQL");
	}
	function disconnect()
	{
		mysql_close();
	}
	error_reporting(0);
?>
