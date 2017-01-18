<?
  error_reporting(0);
  include('script/check_inst.php');
  $file="script/conf.json";
  $env_row=json_decode(file_get_contents($file),true);

  $env_site_name=$env_row['env']['site_name'];
  $env_site_subtitle=$env_row['env']['site_subtitle'];
  $env_footer_name=$env_row['env']['footer_name'];
  $env_footer_subtitle=$env_row['env']['footer_subtitle'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
  <title><? echo $env_site_name; ?></title>

  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
</head>
<body>
  <nav class="white" role="navigation">
    <div class="nav-wrapper container">
      <a id="logo-container" href="#" class="brand-logo"><? echo $env_row['env']['site_name']; ?></a>
      <ul class="right hide-on-med-and-down">
        <li><a href="#">Home</a></li>
		<?
		if($_COOKIE['login_stat']!=1)
		{
		?>
        <li><a href="login">Login</a></li>
        <li><a href="register">Register</a></li>
		<?
		}
		else
		{
		?>
		<li><a href="system"><? echo $_COOKIE['login_name']; ?></a></li>
		<?
		}
		?>
      </ul>

      <ul id="nav-mobile" class="side-nav">
        <li><a href="#">Home</a></li>
		<?
		if($_COOKIE['login_stat']!=1)
		{
		?>
        <li><a href="login">Login</a></li>
        <li><a href="register">Register</a></li>
		<?
		}
		else
		{
		?>
		<li><a href="system"><? echo $_COOKIE['login_name']; ?></a></li>
		<?
		}
		?>
      </ul>
      <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
    </div>
  </nav>

  <div id="index-banner" class="parallax-container">
    <div class="section no-pad-bot">
      <div class="container">
        <br><br>
        <h1 class="header center teal-text text-lighten-2"><? echo $env_site_name; ?></h1>
        <div class="row center">
          <h5 class="header col s12 light"><? echo $env_site_subtitle; ?></h5>
        </div>
        <div class="row center">
          <a href="login" id="download-button" class="btn-large waves-effect waves-light teal lighten-1">Get Started</a>
        </div>
        <br><br>

      </div>
    </div>
    <div class="parallax"><img src="http://goo.gl/BwdAE3" alt="Unsplashed background img 1"></div>
  </div>


  <div class="container">
    <div class="section">

      <!--   Icon Section   -->
      <div class="row">
        <div class="col s12 m4">
          <div class="icon-block">
            <h2 class="center brown-text"><i class="material-icons">polymer</i></h2>
            <h5 class="center">It's FREE</h5>

            <p class="center light">Yep, our objective is trying to make it <b>UNIVERSAL</b> that's mean every one can take this code to make their own booking site.</p>
          </div>
        </div>

        <div class="col s12 m4">
          <div class="icon-block">
            <h2 class="center brown-text"><i class="material-icons">verified_user</i></h2>
            <h5 class="center">Secured</h5>

            <p class="center light">Our user database use MD5 so, hacker could not decrypt your password. And <b>Anti SQL Injection</b></p>
          </div>
        </div>

        <div class="col s12 m4">
          <div class="icon-block">
            <h2 class="center brown-text"><i class="material-icons">new_releases</i></h2>
            <h5 class="center">Events</h5>

            <p class="center light">STEM Presentation</p>
          </div>
        </div>
      </div>

    </div>
  </div>


  <div class="parallax-container valign-wrapper">
    <div class="section no-pad-bot">
      <div class="container">
        <div class="row center">
          <!-- <h5 class="header col s12 light">Minecraft is one of my best game in my life</h5> -->
        </div>
      </div>
    </div>
    <div class="parallax"><img src="http://goo.gl/Ty8oHb" alt="Unsplashed background img 2"></div>
  </div>

  <div class="container">
    <div class="section">

      <div class="row">
        <div class="col s12 center">
          <h3><i class="mdi-content-send brown-text"></i></h3>
          <h4>Our Team</h4>
          <p class="left-align light"><table><tr><td>Phumapee Limpianchop<br />088-658-2601<br />gayriffy@gmail.com</td><td>Chanachoke Siripornpisut<br />094-257-5559<br />diamondbilli2543@gmail.com</td><td>Sirawit Phongphornchettha<br />083-442-3859<br />flukdream@gmail.com</td><td>Satakun Polila<br />090-342-8675<br />Nice_59842@hotmail.com</td><td>Nuttanon Muanphannarai<br />089-464-9520<br />nuttanon211@gmail.com</td></tr></table></p>
        </div>
      </div>

    </div>
  </div>


  <div class="parallax-container valign-wrapper">
    <div class="section no-pad-bot">
      <div class="container">
        <div class="row center">
          <h5 class="header col s12 light"></h5>
        </div>
      </div>
    </div>
    <div class="parallax"><img src="http://goo.gl/NnSym4" alt="Unsplashed background img 3"></div>
  </div>

  <footer class="page-footer teal">
    <div class="container">
      <div class="row">
        <div class="col l6 s12">
          <h5 class="white-text"><? echo $env_footer_name; ?></h5>
          <p class="grey-text text-lighten-4"><? echo $env_footer_subtitle; ?></p>


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
