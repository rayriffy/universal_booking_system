<?
$my_usr=$_REQUEST['mysql_username'];
$my_pas=$_REQUEST['mysql_password'];
error_reporting(0);

if($_REQUEST['agreem']!=1001)
{
  echo "<script type='text/javascript'>alert('ERR: Please accept agreement! Aborting...');</script>";
  echo "Click <a href='first_setup.php'>here</a> to continue";
  exit();
}

$file = "script/conf.json";

$json = json_decode(file_get_contents($file), true);

if($json['env']['is_first_setup_finish']==1)
{
  //Reject
  echo "<script type='text/javascript'>alert('ERR: Setup Failed! Aborting...');</script>";
  echo "Click <a href='index.php'>here</a> to continue";
  exit();
}
if($_REQUEST['system_name']==NULL || $_REQUEST['system_subtitle']==NULL ||  $_REQUEST['footer_name']==NULL || $_REQUEST['footer_subtitle']==NULL)
{
  echo "<script type='text/javascript'>alert('ERR: Invalid Input! Aborting...');</script>";
  echo "Click <a href='first_setup.php'>here</a> to continue";
  exit();
}

$conn=mysql_connect('localhost',$my_usr,$my_pas);
if(!$conn)
{
  echo "<script type='text/javascript'>alert('ERR: Cannot connect to MySQL aborting...');</script>";
  echo "Click <a href='first_setup.php'>here</a> to continue";
  exit();
}

$json['mysql_setup'] = array("mysql_json_user" => $my_usr, "mysql_json_password" => $my_pas);
file_put_contents($file, json_encode($json));

$json['env'] = array("is_first_setup_finish" => 1,"site_name" => $_REQUEST['system_name'],"site_subtitle" => $_REQUEST['system_subtitle'], "footer_name" => $_REQUEST['footer_name'], "footer_subtitle" => $_REQUEST['footer_subtitle']);
file_put_contents($file, json_encode($json));

//TEST_SIGNAL
  $command1=mysql_query("CREATE DATABASE IF NOT EXISTS `vletpaoh_stem` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci");
  mysql_select_db("vletpaoh_stem") or die("ERROR :P");
  $command2="
          CREATE TABLE `booking` (
            `booking_id` int(255) NOT NULL,
            `booking_item_id` int(255) NOT NULL,
            `booking_item_amm` int(255) NOT NULL,
            `booking_who` text NOT NULL,
            `booking_stat` int(255) NOT NULL DEFAULT '2'
          ) ENGINE=InnoDB DEFAULT CHARSET=latin1;";
  $command2q=mysql_query($command2);
  $command3="
          CREATE TABLE `item` (
            `id` int(255) NOT NULL,
            `name` text NOT NULL,
            `amount` int(255) NOT NULL,
            `qty` int(255) NOT NULL
          ) ENGINE=InnoDB DEFAULT CHARSET=utf8;";
  $command3q=mysql_query($command3);
  $command4="
          CREATE TABLE `system` (
            `item_id_counter` int(255) NOT NULL
          ) ENGINE=InnoDB DEFAULT CHARSET=utf8;";
  $command4q=mysql_query($command4);
  $command5=mysql_query("INSERT INTO `system` (`item_id_counter`) VALUES (1);");
  $command6="
          CREATE TABLE `system2` (
            `booking_id` int(255) NOT NULL
          ) ENGINE=InnoDB DEFAULT CHARSET=latin1;";
  $command6q=mysql_query($command6);
  $command7=mysql_query("INSERT INTO `system2` (`booking_id`) VALUES (1);");
  $command8="
          CREATE TABLE `user` (
            `name` text NOT NULL,
            `user` text NOT NULL,
            `pass` text NOT NULL,
            `permit` varchar(6) NOT NULL DEFAULT 'member',
            `tel` text NOT NULL,
            `std_id` text NOT NULL
          ) ENGINE=InnoDB DEFAULT CHARSET=utf8;";
  $command8q=mysql_query($command8);

  $query1=mysql_query($sql);
  $new_root_pwd=md5(md5(md5(md5($_REQEST['root_password']))));
  $new_root_usr=$_REQUEST['root_user'];
  $query2=mysql_query("INSERT INTO `user`(`name`, `user`, `pass`, `permit`, `tel`, `std_id`) VALUES ('root','$new_root_usr','$new_root_pwd','admin','123','123')");
  mysql_close();
  echo "<script type='text/javascript'>alert('Setup Completed!');</script>";
  echo "Click <a href='index.php'>here</a> to continue";
?>
