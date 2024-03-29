<?php

require 'start.php'
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<title>Your Order</title>
</head>

<body class="container">
	<header>
		<?php
		include("nav.php")
		?>
	</header>

	<h1 class="display-4">Your Order</h1>
	<?php
	if (isset($_SESSION["cart"])) {
		?>
		<table>
			<tr>
				<th>Product</th>
				<th width="10px">&nbsp;</th>
				<th>Qty</th>
				<th width="10px">&nbsp;</th>
				<th>Amount</th>
				<th width="10px">&nbsp;</th>
				<th>Action</th>
			</tr>
			<?php
				$total = 0;
				foreach ($_SESSION["cart"] as $i) {
					?>
				<tr>
					<td><?php echo ($products[$_SESSION["cart"][$i]]); ?></td>
					<td width="10px">&nbsp;</td>
					<td><?php echo ($_SESSION["qty"][$i]); ?></td>
					<td width="10px">&nbsp;</td>
					<td><?php echo ($_SESSION["amounts"][$i]); ?></td>
					<td width="10px">&nbsp;</td>
					<td><a href="?delete=<?php echo ($i); ?>"><button type="button" class="btn-sm btn-danger">Delete</button></a></td>
				</tr>
			<?php
					$total = $total + $_SESSION["amounts"][$i];
				}
				$_SESSION["total"] = $total;
				?>
			<tr>
				<td colspan="7">Total : <?php echo ($total); ?></td>
			</tr>
		</table>
	<?php
	}
	?>

	<table>
		<tr>
			<td colspan="5"><a href="?reset=true"><button type="submit" class="btn-sm btn-danger" onclick="toast()">Clear</button></a></td>
			<td colspan="5"><a href="shopping.php"><button type="button" class="btn-sm btn-success">Keep Shopping</button></a></td>
			<td colspan="5"><a href="checkout.php"><button type="button" class="btn-sm btn-primary">Check Out</button></a></td>
		</tr>
	</table>
	<div id="snackbar">Cart Cleared</div>


	<footer class="col-md-12">

	</footer>
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<script src="./scripts/toast.js"></script>
</body>

</html>