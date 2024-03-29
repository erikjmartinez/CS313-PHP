<?php
session_start();

if (isset($_SESSION['username'])) {
	$username = $_SESSION['username'];
} else {
	header("Location: signIn.php");
	die(); // we always include a die after redirects.
}

include("./library/functions.php");

if (isset($_SESSION['loggedIn'])) {
	?>
	<!DOCTYPE html>
	<html>

	<head>
		<?php
			include('./common/head.php');
			?>
		<title>Notes</title>
	</head>

	<body>
		<nav class="navbar navbar-dark bg-primary pl-5 pr-5">
			<a class="navbar-brand" href="./showNotes.php">Notes</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse text-center" id="navbarColor01">
				<?php
					include('./common/nav.php');
					?>
			</div>
		</nav>
		<div>

			<div class="container-fluid p-5">
				<div class="text-center">
					<h1 class="display-3">Notes</h1>
				</div>
				<div class="c_date">
					<?php echo '<h2>Welcome ' . $username . '!</h2>' ?>
					<h3>Today's Date:</h3>
					<h4> <?php
								$date = new DateTime("now", new DateTimeZone('America/Boise'));
								echo $date->format('l, M d, Y h:i A');
								?>
					</h4>
				</div>
				<div class="table-responsive">
					<table class="table table-hover">
						<thead>
							<tr>
								<th scope="col">Note Title</th>
								<th scope="col">Note Description</th>
								<th scope="col">Category</th>
								<th scope="col">Action</th>
							</tr>
						</thead>
						<tbody>
							<?php load_notes();	?>
						</tbody>

					</table>
				</div>
				<a href="./signOut.php" class="btn btn-warning btn-sm  mr-3">Sign Out</a>
				<!-- <div class="spacer"></div> -->
				<a href="./noteEntry.php" class="btn btn-success btn-sm  mr-3">Add New Note</a>
				<a href="./newCat.php" class="btn btn-success btn-sm ">Add New Category</a>

			</div>
		</div>
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" i ntegrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

	</body>

	</html>
<?php
}
?>