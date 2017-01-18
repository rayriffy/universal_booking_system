<?
	setcookie("login_stat", NULL, time() + (-3600), "/");
	setcookie("login_name", NULL, time() + (-3600), "/");
	setcookie("login_permit", NULL, time() + (-3600), "/");
	setcookie("login_user", NULL, time() + (-3600), "/");
	header('Location: ../');
?>
