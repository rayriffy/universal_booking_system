<?
$file = "../script/conf.json";

$json = json_decode(file_get_contents($file), true);

if($json['env']['is_first_setup_finish']==0)
{
  //Reject
  echo "<script type='text/javascript'>alert('Launching installation wizard');</script>";
  echo "<a href='startup.php'>Start</a>";
  exit();
}
?>
