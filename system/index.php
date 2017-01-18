<?
include('../check_inst2.php');
$file="../script/conf.json";
$env_row=json_decode(file_get_contents($file),true);
if($_COOKIE['login_stat']!=1)
{
	header('Location: ../login');
}

include('../script/sql.php');
online_connect();
mysql_select_db('vletpaoh_stem');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
  <title>Dashboard | <? echo $env_row['env']['site_name']; ?></title>

  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="../css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="../css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
</head>
<body <?if($_REQUEST['admin_stat']==2 || $_REQUEST['sucuess_stat']==1){?>onload="sucuess();"<?} else if($_REQUEST['booking_stat']==2) { ?>onload="error2();"<? } else if($_REQUEST['booking_stat']==3) { ?>onload="error3();"<? } ?>>
<script>
function sucuess() {
    alert("Processing Completed!");
}
function error2() {
    alert("ERR: Incorrect ITEM_ID");
}
function error3() {
    alert("ERR: Incorrect AMOUNT");
}
</script>
  <nav class="white" role="navigation">
    <div class="nav-wrapper container">
      <a id="logo-container" href="../" class="brand-logo">BS<sup>2</sup></a>
      <ul class="right hide-on-med-and-down">
        <li><a href="../">Home</a></li>
		<?
		if($_COOKIE['login_stat']!=1)
		{
		?>
        <li><a href="#">Login</a></li>
        <li><a href="../register">Register</a></li>
		<?
		}
		else
		{
		?>
		<li><a href="#"><? echo $_COOKIE['login_name']; ?></a></li>
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
        <li><a href="#">Login</a></li>
        <li><a href="../register">Register</a></li>
		<?
		}
		else
		{
		?>
		<li><a href="#"><? echo $_COOKIE['login_name']; ?></a></li>
		<?
		}
		?>
      </ul>
      <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons ">menu</i></a>
    </div>
  </nav>

	<div class="row">
	<h4><center><span class="card-title">Dashboard</span></center></h4>
	</div>

	<div class="row">
		<div class="col s3">
			<div class="card grey lighten-4 z-depth-2">
				<div class="card-content black-text">
				<span class="card-title">Welcome <? echo $_COOKIE['login_name']; ?>!</span>
				<p>All your information will goes here!</p>
				</div>
				<div class="card-action">
				<a href="logout.php">logout</a>
				</div>
			</div>
		</div>
		<div class="col s9">
			<div class="card grey lighten-4 z-depth-2">
				<div class="card-content black-text">
				<span class="card-title">Overall</span>
				<p>


					<table class="responsive-table striped">
					<thead>
						<tr>
							<th data-field="bill_id">Bill ID</th>
							<th data-field="item">Item</th>
							<th data-field="amm">Amount</th>
							<th data-field="who">Who</th>
							<th data-field="stat">Status</th>
							<th data-field="act">Action</th>
						</tr>
					</thead>
					<tbody>
						<?
						  $overall_user=$_COOKIE['login_user'];
							$overall_sql3="SELECT * FROM `booking` WHERE `booking_who` LIKE '$overall_user'";
							$overall_res3=mysql_query($overall_sql3);
							while($overall_row=mysql_fetch_row($overall_res3))
							{
						?>
						<tr>
							<td><? echo $overall_row[0]; ?></td>
							<td>
								<?
									$overall_item9999_id=$overall_row[1];
									$overall_sql90="SELECT * FROM `item` WHERE `id` = $overall_item9999_id";
									$overall_res90=mysql_query($overall_sql90);
									while($overall_row90=mysql_fetch_row($overall_res90))
									{
										echo $overall_row90[1];
									}
								?>
							</td>
							<td><? echo $overall_row[2]; ?></td>
							<td><? echo $overall_row[3]; ?></td>
							<td><? if($overall_row[4]==2){?>WAIT<?} else if($overall_row[4]==0){?>DENIED<?} else if($overall_row[4]==1){ ?>CONFIRM<? } else if($overall_row[4]==3) {?>RETURN_WAIT<?} else if($overall_row[4]==4) { ?>RETURNED<? } else if($overall_row[4]==5) { ?>CANCELED<? } ?>
							</td>
							<td>
									<? if($overall_row[4]==2){ ?><a class="btn-floating red" href="booking_cancel.php?id=<?echo $overall_row[0];?>&stat=cel"><i class="material-icons">clear</i></a> <? } ?>
							</td>
						</tr>
						<?
							}
						?>
					</tbody>
					</table>



				</p>
				</div>
				<div class="card-action">
				<a class="modal-trigger" href="#booking1" onclick="$('#booking1').openModal();">BOOKING</a>
				<a class="modal-trigger" href="#return1" onclick="$('#return1').openModal();">RETURN</a>
				<? if($_COOKIE['login_permit']=='member'){?><a class="modal-trigger" href="#itemlist2" onclick="$('#itemlist2').openModal();">ITEM MANAGER</a><?}?>
				<? if($_COOKIE['login_permit']!='member'){?><a class="modal-trigger" href="#itemlist1" onclick="$('#itemlist1').openModal();">ITEM MANAGER</a><?}?>
				<? if($_COOKIE['login_permit']!='member'){?><a class="modal-trigger" href="#userlist1" onclick="$('#userlist1').openModal();">USER MANAGER</a><?}?>
				<? if($_COOKIE['login_permit']!='member'){?><a class="modal-trigger" href="#bookingsubmit1" onclick="$('#bookingsubmit1').openModal();">BOOKING CONFIRM</a><?}?>
				<? if($_COOKIE['login_permit']!='member'){?><a class="modal-trigger" href="#returnsubmit1" onclick="$('#returnsubmit1').openModal();">RETURNING CONFIRM</a><?}?>



				<!-- BOOKING -->
				  <div id="booking1" class="modal">
					<div class="modal-content">
					  <h4>Booking Request</h4>
					  <p>
							<form action="booking.php" method="POST">
								<div class="s12 m4 l2"></div>
								<div class="input-field s12 m4 l3">
									  <input placeholder="Item ID" id="booking_item_id" name="booking_item_id" type="text" class="validate">
								</div>
								<div class="input-field s12 m4 l3">
									  <input placeholder="Amount" id="booking_item_amm" name="booking_item_amm" type="text" class="validate">
								</div>
								<div class="input-field s12 m4 l2">
									  <button class="waves-effect waves-light btn yellow darken-4" type="submit">SUBMIT</button>
								</div>
								<div class="s12 m4 l2"></div>
						  </form>
						</p>
					</div>
					<div class="modal-footer">
					  <a class=" modal-action modal-close waves-effect btn-flat">CLOSE</a>
					</div>
				  </div>
				<!-- RETURNING -->
				  <div id="return1" class="modal modal-fixed-footer">
					<div class="modal-content">
					  <h4>Returning Request</h4>
					  <p>
						<table class="responsive-table striped">
						<thead>
							<tr>
								<th data-field="booking_id">Bill ID</th>
								<th data-field="booking_item_id">Item</th>
								<th data-field="booking_item_amm">Amount</th>
								<th data-field="booking_who">Who</th>
								<th data-field="booking_stat">Status</th>
								<th data-field="booking_stat">Action</th>
							</tr>
						</thead>
						<tbody>

						<?
				 		 $username=$_COOKIE['login_user'];
							$sql_20="SELECT * FROM `booking` WHERE `booking_who` LIKE '$username' AND `booking_stat` = 1";
							$res_20=mysql_query($sql_20);
							while($row20=mysql_fetch_row($res_20))
							{
						?>
							<tr>
								<td><? echo $row20[0]; ?></td>
								<td>
									<?
										$item_id_ret=$row20[1];
										$sql_ret="SELECT * FROM `item` WHERE `id` = $item_id_ret";
										$res_ret=mysql_query($sql_ret);
										while($row_ret=mysql_fetch_row($res_ret))
										{
											echo $row_ret[1];
										}
									?>
								</td>
								<td><? echo $row20[2]; ?></td>
								<td><? echo $row20[3]; ?></td>
								<td>BOOKING</td>
								<td>
									<a class="btn-floating green" href="return.php?id=<?echo $row20[0];?>&stat=3"><i class="material-icons">call_made</i></a>
								</td>
							</tr>
						<?
							}
						?>
					</tbody>
				</table>
						</p>
					</div>
					<div class="modal-footer">
					  <a href="#!" class=" modal-action modal-close waves-effect  btn-flat">CLOSE</a>
					</div>
				  </div>
						<? if($_COOKIE['login_permit']=='member'){?>
									<!-- ITEM_MANAGER -->
													<!-- ITEM_MANAGER -->
													  <div id="itemlist2" class="modal modal-fixed-footer">
														<div class="modal-content">
														  <h4>Item Manager</h4>
														  <p>
														  <table class="responsive-table striped">
															<thead>
															  <tr>
																  <th data-field="id">ID</th>
																  <th data-field="name">Item</th>
																  <th data-field="amount">Total</th>
																  <th data-field="qty">Used</th>
																	<th data-field="act">Action</th>
															  </tr>
															</thead>
															<tbody>

															<?
																$sql_2="SELECT * FROM `item`";
																$res_2=mysql_query($sql_2);
																while($row2=mysql_fetch_row($res_2))
																{
															?>
															  <tr>
																<td>
																	<?
																		echo $row2[0];
																		$item_id_image=$row2[0];
																	?>
																</td>
																<td>
																	<? echo $row2[1]; ?>
																</td>
																<td>
																	<? echo $row2[2]; ?>
																</td>
																<td>
																	<? echo $row2[3]; ?> (<? echo number_format(100*$row2[3]/$row2[2],2,'.',''); ?>%)
																</td>
																<td>
																	<a class="modal-trigger btn-floating green" href="#imageid<?echo $item_id_image; ?>" onclick="$('#imageid<?echo $item_id_image; ?>').openModal();"><i class="material-icons">perm_media</i></a>
																</td>
															  </tr>

															<?
																}
															?>

															</tbody>
														  </table>

														  </p>
														</div>
														<div class="modal-footer">
														  <a href="#!" class=" modal-action modal-close waves-effect  btn-flat">CLOSE</a>
														</div>
													  </div>


														<?
															$sql_2="SELECT * FROM `item`";
															$res_2=mysql_query($sql_2);
															while($row2=mysql_fetch_row($res_2))
															{
																$item_id_image=$row2[0];
														?>
														<div id="imageid<?echo $item_id_image; ?>" class="modal">
														<?
															$sql_imag="SELECT * FROM `image` WHERE `item_id` = $item_id_image";
															$res_imag=mysql_query($sql_imag);
															while($row_imag=mysql_fetch_row($res_imag))
															{
																$file_dest_imag=$row_imag[1];
															}
														?>
															<div class="modal-content">
																<p><center>
																	<img src="../img/item/<? echo $file_dest_imag ?>" height="10%">
																</center></p>
															</div>
															<div class="modal-footer">
																<a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">CLOSE</a>
															</div>
														</div>
														<?
															}
														?>
										<? } ?>
				<? if($_COOKIE['login_permit']!='member'){?>
				<!-- ONLY FOR ADMIN -->

				<!-- ITEM_MANAGER -->
				  <div id="itemlist1" class="modal modal-fixed-footer">
					<div class="modal-content">
					  <h4>Item Manager</h4>
					  <p>
					  <table class="responsive-table striped">
						<thead>
						  <tr>
							  <th data-field="id">ID</th>
							  <th data-field="name">Item</th>
							  <th data-field="amount">Total</th>
							  <th data-field="qty">Available</th>
								<th data-field="act">Action</th>
						  </tr>
						</thead>
						<tbody>

						<?
							$sql_2="SELECT * FROM `item`";
							$res_2=mysql_query($sql_2);
							while($row2=mysql_fetch_row($res_2))
							{
						?>
						  <tr>
							<td>
								<?
									echo $row2[0];
									$item_id_image=$row2[0];
								?>
							</td>
							<td>
								<? echo $row2[1]; ?>
							</td>
							<td>
								<? echo $row2[2]; ?>
							</td>
							<td>
								<? echo $row2[2]-$row2[3]; ?> (<? echo number_format(100*($row2[2]-$row2[3])/$row2[2],2,'.',''); ?>%)
							</td>
							<td>
								<a class="modal-trigger btn-floating green" href="#imageid<?echo $item_id_image; ?>" onclick="$('#imageid<?echo $item_id_image; ?>').openModal();"><i class="material-icons">perm_media</i></a>
							</td>
						  </tr>

						<?
							}
						?>

						</tbody>
					  </table>

					  </p>
					</div>
					<div class="modal-footer">
					  <a href="#!" class=" modal-action modal-close waves-effect  btn-flat">CLOSE</a>
					  <a class="modal-trigger waves-effect  btn-flat" href="#itemadd1" onclick="$('#itemadd1').openModal();">ADD ITEM</a>
					  <a class="modal-trigger waves-effect  btn-flat" href="#itemremove1" onclick="$('#itemremove1').openModal();">REMOVE ITEM</a>
					</div>
				  </div>


					<?
						$sql_2="SELECT * FROM `item`";
						$res_2=mysql_query($sql_2);
						while($row2=mysql_fetch_row($res_2))
						{
							$item_id_image=$row2[0];
					?>
					<div id="imageid<?echo $item_id_image; ?>" class="modal">
					<?
						$sql_imag="SELECT * FROM `image` WHERE `item_id` = $item_id_image";
						$res_imag=mysql_query($sql_imag);
						while($row_imag=mysql_fetch_row($res_imag))
						{
							$file_dest_imag=$row_imag[1];
						}
					?>
						<div class="modal-content">
							<p><center>
								<img src="../img/item/<? echo $file_dest_imag ?>" height="10%">
							</center></p>
						</div>
						<div class="modal-footer">
							<a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">CLOSE</a>
						</div>
					</div>
					<?
						}
					?>

				<!-- ADD_ITEM -->
				  <div id="itemadd1" class="modal">
					<div class="modal-content">
					  <h4>Adding Item</h4>
					  <p>

					  <div class="container">
					  <form action="item_add.php" method="POST">

						<div class="input-field">
							  <input placeholder="Item Name" id="add_name" name="add_name" type="text" class="validate">
							  <input placeholder="Item Ammount" id="add_amm" name="add_amm" type="text" class="validate">
							  <button class="btn-green" type="submit">SUBMIT</button>
						</div>
					  </form>
					  </div>

					  </p>
					</div>
					<div class="modal-footer">
					  <a href="#!" class=" modal-action modal-close waves-effect  btn-flat">CLOSE</a>
					</div>
				  </div>
				<!-- REMOVE_ITEM -->
				  <div id="itemremove1" class="modal">
					<div class="modal-content">
					  <h4>Removing Item</h4>
					  <p>

					  <div class="container">
					  <form action="item_remove.php" method="POST">

						<div class="input-field">
							  <input placeholder="Please enter item ID and then press [ENTER]" id="remov_id" name="remov_id" type="text" class="validate">
						</div>
					  </form>
					  </div>

					  </p>
					</div>
					<div class="modal-footer">
					  <a href="#!" class=" modal-action modal-close waves-effect  btn-flat">CLOSE</a>
					</div>
				  </div>

					<!-- USR MAN -->
					  <div id="userlist1" class="modal modal-fixed-footer">
						<div class="modal-content">
						  <h4>User Manager</h4>
							<p>
						  <table class="responsive-table striped">
							<thead>
							  <tr>
								  <th data-field="name">Name</th>
								  <th data-field="user">Username</th>
								  <th data-field="pass">Password</th>
								  <th data-field="permit">Permission</th>
								  <th data-field="tel">Phone Number</th>
								  <th data-field="std_id">Student ID</th>
							  </tr>
							</thead>
							<tbody>
								<?
									$sql3="SELECT * FROM `user`";
									$res3=mysql_query($sql3);
									while($row=mysql_fetch_row($res3))
									{
								?>
								<tr>
									<td><? echo $row[0]; ?></td>
									<td><? echo $row[1]; ?></td>
									<td><? echo $row[2]; ?></td>
									<td><? echo $row[3]; ?></td>
									<td><? echo $row[4]; ?></td>
									<td><? echo $row[5]; ?></td>
								</tr>
								<?
									}
								?>
							</tbody>
						</table>
						</p>
						</div>
						<div class="modal-footer">
						  <a href="#!" class=" modal-action modal-close waves-effect  btn-flat">CLOSE</a>
						</div>
					  </div>

						<!-- BOOKING_SUBMIT -->
						<div id="bookingsubmit1" class="modal modal-fixed-footer">
						<div class="modal-content">
							<h4>Booking Submission</h4>
							<p>
						  <table class="responsive-table striped">
							<thead>
							  <tr>
								  <th data-field="booking_id">Bill ID</th>
								  <th data-field="booking_item_id">Item</th>
								  <th data-field="booking_item_amm">Amount</th>
								  <th data-field="booking_who">Who</th>
								  <th data-field="booking_stat">Status</th>
								  <th data-field="booking_stat">Action</th>
							  </tr>
							</thead>
							<tbody>
								<?
									$sql3="SELECT * FROM `booking` WHERE `booking_stat` != 3 AND `booking_stat` != 4";
									$res3=mysql_query($sql3);
									while($row=mysql_fetch_row($res3))
									{
								?>
								<tr>
									<td><? echo $row[0]; ?></td>
									<td>
										<?
										  $item9999_id=$row[1];
											$sql90="SELECT * FROM `item` WHERE `id` = $item9999_id";
											$res90=mysql_query($sql90);
											while($row90=mysql_fetch_row($res90))
											{
												echo $row90[1];
											}
										?>
									</td>
									<td><? echo $row[2]; ?></td>
									<td><? echo $row[3]; ?></td>
									<td><? if($row[4]==2){?>WAIT<?} else if($row[4]==0){?>DENIED<?} else if($row[4]==1){ ?>CONFIRM<? } else if($row[4]==3) {?>RETURN_WAIT<?} else if($row[4]==4) { ?>RETURNED<? } else if($row[4]==5) { ?>CANCELED<? } ?>
									<td><? if($row[4]!=3 && $row[4]!=4 && $row[4]!=5){ ?>
												<a class="btn-floating green" href="booking_cmd.php?id=<?echo $row[0];?>&stat=up"><i class="material-icons">thumb_up</i></a>
												<a class="btn-floating red" href="booking_cmd.php?id=<?echo $row[0];?>&stat=down"><i class="material-icons">thumb_down</i></a>
									<? } ?></td>
								</tr>
								<?
									}
								?>
							</tbody>
						</table>


							</p>
						</div>
						<div class="modal-footer">
							<a href="#!" class=" modal-action modal-close waves-effect  btn-flat">CLOSE</a>
						</div>
						</div>

						<!-- RETURN_SUBMIT -->
						<div id="returnsubmit1" class="modal modal-fixed-footer">
						<div class="modal-content">
							<h4>Returning Submission</h4>
							<p>
						  <table class="responsive-table striped">
							<thead>
							  <tr>
								  <th data-field="booking_id">Bill ID</th>
								  <th data-field="booking_item_id">Item</th>
								  <th data-field="booking_item_amm">Amount</th>
								  <th data-field="booking_who">Who</th>
								  <th data-field="booking_stat">Status</th>
								  <th data-field="booking_stat">Action</th>
							  </tr>
							</thead>
							<tbody>
								<?
									$sql40="SELECT * FROM `booking` WHERE `booking_stat`=3";
									$res40=mysql_query($sql40);
									while($row40=mysql_fetch_row($res40))
									{
								?>
								<tr>
									<td><? echo $row40[0]; ?></td>
									<td>
											<?
											  $item9999_id=$row40[1];
												$sql90="SELECT * FROM `item` WHERE `id` = $item9999_id";
												$res90=mysql_query($sql90);
												while($row90=mysql_fetch_row($res90))
												{
													echo $row90[1];
												}
											?>
									</td>
									<td><? echo $row40[2]; ?></td>
									<td><? echo $row40[3]; ?></td>
									<td><? echo 'RETURNING'; ?></td>
									<td><a class="btn-floating green" href="return_cmd.php?id=<?echo $row40[0];?>"><i class="material-icons">done</i></a></td>
								</tr>
								<?
									}
								?>
							</tbody>
						</table>
							</p>
						</div>
						<div class="modal-footer">
							<a href="#!" class=" modal-action modal-close waves-effect  btn-flat">CLOSE</a>
						</div>
						</div>

				<? } ?>






				</div>
			</div>
		</div>
	</div>


  <footer class="page-footer  yellow darken-4">
    <div class="container">
      <div class="row">
        <div class="col l6 s12">
          <h5 class="white-text"><? echo $env_row['env']['footer_name']; ?></h5>
          <p class="grey-text text-lighten-4"><? echo $env_row['env']['footer_subtitle']; ?></p>


        </div>
				<? /*
        <div class="col l3 s12"></div>
        <div class="col l3 s12">
          <img src="http://goo.gl/7r9NUF" height="140px" width="auto;" />
        </div>
				*/ ?>
      </div>
    </div>
    <div class="footer-copyright">
      <div class="container">
      System & Design by <a class="brown-text text-darken-3" href="http://facebook.com/rayriffy">RayRiffy</a>
      </div>
    </div>
  </footer>


  <!--  Scripts-->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="../js/materialize.js"></script>
  <script src="../js/init.js"></script>

  </body>
</html>
