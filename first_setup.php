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
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
  <title>Setup Wizard</title>

  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
</head>
<body>
  <nav class="red" role="navigation">
    <div class="nav-wrapper container">
      <a id="logo-container" href="#" class="brand-logo"><font color="white">UBS Setup Wizard</font></a>
    </div>
  </nav> <? //cms_us2  DeGE3A4H5VTscKuy?><? //CREATE USER 'cms_us2'@'%' IDENTIFIED WITH mysql_native_password AS '***';GRANT ALL PRIVILEGES ON *.* TO 'cms_us2'@'%' REQUIRE NONE WITH GRANT OPTION MAX_QUERIES_PER_HOUR 0 MAX_CONNECTIONS_PER_HOUR 0 MAX_UPDATES_PER_HOUR 0 MAX_USER_CONNECTIONS 0;CREATE DATABASE IF NOT EXISTS `cms_us2`;GRANT ALL PRIVILEGES ON `cms\_us2`.* TO 'cms_us2'@'%';GRANT ALL PRIVILEGES ON `cms_us2\_%`.* TO 'cms_us2'@'%'; ?>
<br />
<br />
<form action="setup.php" method="POST">
<div class="container">
  <h5>PART 1: MySQL</h5>
    <div class="row">
          <div class="input-field col s6">
            <input id="mysql_username" type="text" name="mysql_username" class="validate">
            <label for="mysql_username">Username</label>
          </div>
          <div class="input-field col s6">
            <input id="mysql_password" type="password" name="mysql_password" class="validate">
            <label for="mysql_password">Password</label>
          </div>
    </div>
</div>
<br />
<br />
<div class="container">
  <h5>PART 2: Personalize</h5>
    <div class="row">
      <div class="input-field col s6">
        <input id="system_name" type="text" name="system_name" class="validate">
        <label for="system_name">System Name</label>
      </div>
      <div class="input-field col s6">
        <input id="system_subtitle" type="text" name="system_subtitle" class="validate">
        <label for="system_subtitle">System Subtitle</label>
      </div>
    </div>
      <div class="row">
        <div class="input-field col s6">
          <input id="footer_name" type="text" name="footer_name" class="validate">
          <label for="footer_name">Footer Name</label>
        </div>
        <div class="input-field col s6">
          <input id="footer_subtitle" type="text" name="footer_subtitle" class="validate">
          <label for="footer_subtitle">Footer Subtitle</label>
        </div>
      </div>
    <div class="row">
      <div class="input-field col s6">
        <input id="root_user" type="text" name="root_user" class="validate">
        <label for="root_user">Root Username</label>
      </div>
      <div class="input-field col s6">
        <input id="root_password" type="password" name="root_password" class="validate">
        <label for="root_password">Root Password</label>
      </div>
    </div>
</div>
<br />
<br />
<div class="container">
  <h5>PART 3: Finishing Up</h5>
    <div class="row">
    <p class="red-text center"><font size="4">
      <b>WARNING</b>: YOU WILL NOT BE ABLE TO EDIT INFORMATION ANYMORE!!!
    </font></p>
    </div>
    <div class="row center">
        <input type="checkbox" name="agreem" value="1001" id="agreement" />
        <label for="agreement">I understand</label>
    </div>
</div>
<div class="container">
  <div class="row center">
    <button class="waves-effect waves-light btn red" type="submit">INSTALL</button>
  </div>
</div>
</form>

<br />
<br />
<br />
<br />
  <footer class="page-footer red darken-1">
    <div class="container">
      <div class="row">
        <div class="col l6 s12">
          <h5 class="white-text">Mahidol Wittayanusorn School</h5>
          <p class="grey-text text-lighten-4">Mahidol Wittayanusorn School (MWITS) which in its English translation means “Prince Mahidol Memorial Science School” is funded by the government.</p>


        </div>
        <?
        /*
        <div class="col l3 s12">
          <h5 class="white-text">Settings</h5>
          <ul>
            <li><a class="white-text" href="#!">Link 1</a></li>
            <li><a class="white-text" href="#!">Link 2</a></li>
            <li><a class="white-text" href="#!">Link 3</a></li>
            <li><a class="white-text" href="#!">Link 4</a></li>
          </ul>
        </div>
        */
        ?>
      </div>
    </div>
    <div class="footer-copyright">
      <div class="container">
      System & Design by <a class="brown-text text-lighten-3" href="http://facebook.com/rayriffy">RayRiffy</a>
      </div>
    </div>
  </footer>


  <!--  Scripts-->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="js/materialize.js"></script>
  <script src="js/init.js"></script>

  </body>
</html>
