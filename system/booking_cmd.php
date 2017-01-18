<?
 if($_COOKIE['login_permit']=='member'){ echo 'TO DO'; } else{

   $book_id=$_REQUEST['id'];
   $book_stat=$_REQUEST['stat']; // up down

   $stt=2;
   if($book_stat=='up')
   {
     $stt=1;
   }
   else if($book_stat=='down')
   {
     $stt=0;
   }

   $sqlu_file2="../script/conf.json";
   $sqlu_json2=json_decode(file_get_contents($sqlu_file2),true);
   $usr_sql2=$sqlu_json2['mysql_setup']['mysql_json_user'];
   $pas_sql2=$sqlu_json2['mysql_setup']['mysql_json_password'];
   mysql_connect('localhost',$usr_sql2,$pas_sql2) or die("Could not connect to SQL");
   mysql_select_db('vletpaoh_stem');
   $sql="SELECT * FROM `booking` WHERE `booking_id`=$book_id";
   $res=mysql_query($sql);
   while($row=mysql_fetch_row($res))
   {
     $crr_stat=$row[4];
     $amm=$row[2];
     $item_id=$row[1];
   }
   if($crr_stat==2 && $book_stat=='down')
   {
     $sql55="UPDATE `booking` SET `booking_stat`=$stt WHERE `booking_id`=$book_id";
     $res55=mysql_query($sql55);
   }
   else if($crr_stat==2 && $book_stat=='up')
   {
     $sql55="UPDATE `booking` SET `booking_stat`=$stt WHERE `booking_id`=$book_id";
     $res55=mysql_query($sql55);
     $sql6="UPDATE `item` SET `qty`=`qty`+$amm WHERE `id`=$item_id";
     $res6=mysql_query($sql6);
   }
   else if($crr_stat==1 && $book_stat=='down')
   {
       $sql55="UPDATE `booking` SET `booking_stat`=$stt WHERE `booking_id`=$book_id";
       $res55=mysql_query($sql55);
       $sql6="UPDATE `item` SET `qty`=`qty`-$amm WHERE `id`=$item_id";
       $res6=mysql_query($sql6);
   }
   else if($crr_stat==1 && $book_stat=='up')
   {
       $sql55="UPDATE `booking` SET `booking_stat`=$stt WHERE `booking_id`=$book_id";
       $res55=mysql_query($sql55);
   }
   else if($crr_stat==0 && $book_stat=='up')
   {
       $sql55="UPDATE `booking` SET `booking_stat`=$stt WHERE `booking_id`=$book_id";
       $res55=mysql_query($sql55);
       $sql6="UPDATE `item` SET `qty`=`qty`+$amm WHERE `id`=$item_id";
       $res6=mysql_query($sql6);
   }
   else if($crr_stat==0 && $book_stat=='down')
   {
       $sql55="UPDATE `booking` SET `booking_stat`=$stt WHERE `booking_id`=$book_id";
       $res55=mysql_query($sql55);
   }
   header('Location: index.php?admin_stat=2');

 }
?>
