<?
include('../script/check_inst2.php');
$file="../script/conf.json";
$env_row=json_decode(file_get_contents($file),true);
if($_COOKIE['login_stat']==1)
{
	header('Location: ../system');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
  <title>Register | <? echo $env_row['env']['site_name']; ?></title>

  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="../css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="../css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
</head>
<body <?if($_REQUEST['regis_stat']==2){?>onload="err2();"<?}else if($_REQUEST['regis_stat']==3){?>onload="err3();"<?}else if($_REQUEST['regis_stat']){?>onload="err4();"<?}?>>
<script>
function err2() {
    alert("ERR: Incorrect Pattern");
}
function err3() {
    alert("ERR: Please try again");
}
function err4() {
    alert("Register Sucuessful!");
}
</script>
  <nav class="white" role="navigation">
    <div class="nav-wrapper container">
      <a id="logo-container" href="../" class="brand-logo"><? echo $env_row['env']['site_name']; ?></a>
      <ul class="right hide-on-med-and-down">
        <li><a href="../">Home</a></li>
		<?
		if($_COOKIE['login_stat']!=1)
		{
		?>
        <li><a href="../login">Login</a></li>
        <li><a href="#">Register</a></li>
		<?
		}
		else
		{
		?>
		<li><a href="../system"><? echo $_COOKIE['login_name']; ?></a></li>
		<?
		}
		?>
      </ul>

      <ul id="nav-mobile" class="side-nav">
        <li><a href="../">Home</a></li>
		<?
		if($_COOKIE['login_stat']!=1)
		{
		?>
        <li><a href="../login">Login</a></li>
        <li><a href="#">Register</a></li>
		<?
		}
		else
		{
		?>
		<li><a href="../system"><? echo $_COOKIE['login_name']; ?></a></li>
		<?
		}
		?>
      </ul>
      <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
    </div>
  </nav>

	<div class="row">
	<h4><center><span class="card-title">Register</span></center></h4>
	</div>
	<div class="row">
	<form class="col s12" method="POST" action="register_cmd.php">
		<div class="row">
			<div class="col s12 m4 l2"><p></p></div>
			<div class="input-field col s12 m4 l8">
				  <input placeholder="Name" id="name" name="name" type="text" class="validate">
			</div>
			<div class="col s12 m4 l2"><p></p></div>
		</div>
		<div class="row">
			<div class="col s12 m4 l2"><p></p></div>
			<div class="input-field col s12 m4 l8">
				  <input placeholder="Username" id="user" name="user" type="text" class="validate">
			</div>
			<div class="col s12 m4 l2"><p></p></div>
		</div>
		<div class="row">
			<div class="col s12 m4 l2"><p></p></div>
			<div class="input-field col s12 m4 l8">
				  <input placeholder="Password" id="pass" name="pass" type="password" class="validate">
			</div>
			<div class="col s12 m4 l2"><p></p></div>
		</div>
		<div class="row">
			<div class="col s12 m4 l2"><p></p></div>
			<div class="input-field col s12 m4 l8">
				  <button type="submit" class="waves-effect waves-light btn-large green darken-1">REGISTER</button>
			</div>
			<div class="col s12 m4 l2"><p></p></div>
		</div>
	</form>
	</div>


  <footer class="page-footer green darken-1">
    <div class="container">
      <div class="row">
        <div class="col l6 s12">
          <h5 class="white-text"><? echo $env_row['env']['footer_name']; ?></h5>
          <p class="grey-text text-lighten-4"><? echo $env_row['env']['footer_subtitle']; ?></p>


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
  <script src="../js/materialize.js"></script>
  <script src="../js/init.js"></script>
  </body>
</html>
