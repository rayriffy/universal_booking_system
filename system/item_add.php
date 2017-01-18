<?
 if($_COOKIE['login_permit']=='member'){ echo 'TO DO'; } else{
	 
	 include('../script/sql.php');
	 online_connect();
	 mysql_select_db('vletpaoh_stem');
	 //READ DATA ITEM_ID_COUNTER AND THEN UPDATE
	 $sql="SELECT `item_id_counter` FROM `system` WHERE 1";
	 $res=mysql_query($sql);
	 while($row=mysql_fetch_row($res))
	 {
		 $count=$row[0];
	 }
	 $req_name=$_REQUEST['add_name'];
	 $req_amm=$_REQUEST['add_amm'];
	 $sql_2="INSERT INTO `vletpaoh_stem`.`item`(`id`, `name`, `amount`, `qty`) VALUES ('$count','$req_name','$req_amm','0');";
	 $res_2=mysql_query($sql_2);
	 $count++;
	 $res3=mysql_query("UPDATE `system` SET `item_id_counter`=$count WHERE 1");
	 mysql_close();
	 header('Location: index.php?admin_stat=2');
 }
 ?>