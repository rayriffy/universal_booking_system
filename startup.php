<?
$file = "script/conf.json";
$json = json_decode(file_get_contents($file), true);
if($json['env']['is_first_setup_finish']==1)
{
  //Reject
  echo "<script type='text/javascript'>alert('ERR: Setup Failed! Aborting...');</script>";
  echo "Click <a href='index.php'>here</a> to continue";
  exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Setup Wizard</title>
  <!-- Compiled and minified CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/css/materialize.min.css">

  <!-- Compiled and minified JavaScript -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/js/materialize.min.js"></script>

<body>
  <table style="width:100%; height:100vh">
    <tr style="height:100%">
      <td style="height:100%; text-align:center">
        <div class="row">
          <h5><font cloor="#212121">Welcome to </font></h5><h4><i><font cloor="#424242"><b>Universal Booking System</b></font></i></h4><h5><font cloor="#212121"> setup wizard!</font></h5>
        </div>
        <div class="row">
          <a href="first_setup.php" class="btn wave wave-light red">Next</a>
        </div>
      </td>
    </tr>
  </table>
</body>
</html>
