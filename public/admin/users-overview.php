<?php
//Require the functions and start the session
require '../includes/functions.inc.php';

//Load the latest profile data
LoadProfileData($_SESSION['user']['id']);

//Check if the user is logged in
If (!CheckIfLoggedIn()) {
	header("Location: ../../index.php");
}

//Check if the user is logged in
If (!CheckIfAdmin($_SESSION['user']['email'])) {
	header("Location: ../../index.php");
}

?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
		  content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<meta name="description" content="Oryx Network">
	<meta name="keywords" content="Oryx Network, Oryx, Network">
	<meta name="author" content="C0DE-BUST3RS">
	<link rel="stylesheet" href="../css/main.css">
	<link rel="stylesheet" href="../css/bulma.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css">
	<title>Dashboard - Oryx Network</title>
</head>

<body>
<section class="hero is-fullheight is-default is-bold">
	<?php
	require '../includes/nav-login.php';
	?>
	<div class="container">
		<div class="columns">
			<div class="column is-3">
				<?php
				require 'nav-admin.php';
				?>
			</div>
			<div class="column is-9">
				<div class="columns">
					<div class="column is-12">
						<div class="card events-card">
							<header class="card-header">
								<p class="card-header-title">
									All Users
								</p>
								<a href="#" class="card-header-icon" aria-label="more options">
								  <span class="icon">
									<i class="fa fa-angle-down" aria-hidden="true"></i>
								  </span>
								</a>
							</header>
							<div class="card-table">
								<div class="content">
									<!-- Start all users -->
									<div class="content">
										<table class="table is-fullwidth is-striped">
											<thead>
											<tr>
												<th><abbr title="ID">#</abbr></th>
												<th><abbr title="Firstname">Firstname</abbr></th>
												<th><abbr title="Lastname">Lastname</abbr></th>
												<th><abbr title="Rank">Rank</abbr></th>
												<th><abbr title="RegisterDate">Register Date</abbr></th>
												<th><abbr title="LastLogin">Last Login</abbr></th>
												<th><abbr title="RegisterIP">Register IP</abbr></th>
												<th><abbr title="LastIP">Last IP</abbr></th>
												<th><abbr title="Email">Email</abbr></th>
												<th><abbr title="Edit">Edit</abbr></th>
											</tr>
											</thead>
											<tbody>

											<?php
											$stmt = $conn->prepare("SELECT u.id ,u.email ,u.firstname ,u.lastname, u.admin ,po.id ,po.date ,po.user_id ,po.likes ,po.content ,pr.profile_picture ,pr.intro FROM user u INNER JOIN post po on u.id = po.user_id INNER JOIN profiles pr on po.user_id = pr.user_id ORDER BY po.id DESC LIMIT 5");
											$stmt->execute();
											$result = $stmt->get_result();

											while ($row = $result->fetch_assoc()) { ?>
												<tr>
													<td width="5%">
														<img class="is-centered" src="<?php echo $row['profile_picture']; ?>" alt="">
													</td>
													<td>
														<p><?php echo ucfirst($row['firstname']);?></p>
													</td>
													<td>
														<p><?php echo ucfirst($row['lastname']);?></p>
													</td>
													<td>
														<?php
														if($row['admin'] === 1) { ?>
															<span class="tag is-danger">Admin</span>
														<?php } else { ?>
															<span class="tag is-success">User</span>
														<?php } ?>
													</td>
													<td>
														<?php
															echo date('d M Y, H.i.s A', strtotime($row['date']));
														?>
													</td>
													<td><a class="button is-small is-primary" href="#">Action</a></td>
													<td><a class="button is-small is-primary" href="#">Action</a></td>
													<td><a class="button is-small is-primary" href="#">Action</a></td>
													<td><a class="button is-small is-primary" href="#">Action</a></td>
													<td><a class="button is-small is-primary" href="#">Action</a></td>
												</tr>
											<?php } ?>

											</tbody>
										</table>
									</div>
									<!-- End all users -->
								</div>
							</div>

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>


	<?php
	require '../includes/footer.php';
	?>
</section>

<script src="../js/main.js"></script>
<script src="../js/navbarMenu.js"></script>
</body>

</html>