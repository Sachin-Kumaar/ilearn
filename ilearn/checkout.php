<?php

include('./dbConnection.php');
session_start();
// $_SESSION['course_id'] = $_POST['id'];
if (!isset($_SESSION['is_login'])) {
	echo "<script> location.href='loginsignup.php'</script>";
} else {

	header("Pragma: no-cache");
	header("Cache-Control: no-cache");
	header("Expires: 0");
	$stuLogEmial=$_SESSION['stuLogEmail'];
	// echo $_SESSION['course_id'];
?>


	<!DOCTYPE html>
	<html lang="en">

	<head>
		<meta charset="UTF-8">
		<meta name="GENERATOR" content="Evrsoft First Page">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Checkout</title>
		<link rel="stylesheet" media="screen" href="css/bootstrap.min.css?v=<?php echo time(); ?>">
		<link media="screen" href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@700&display=swap" rel="stylesheet">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
		<link rel="stylesheet" href="css/style.css?v=<?php echo time(); ?>">
	</head>

	<body>
		<div class="contanier mt-5">
			<div class="row">
				<div class="col-sm-6 offset-sm-3 jumbotron">
					<h3 class="mb-5">Welcome to Learn2Earn Payment Page</h3>
					<form method="Post" action="./PaytmKit/pgRedirect.php">
						<div class="form-group row">
							<label for="ORDER_ID" class="col-sm-4 col-form-label">Order ID</label>
							<div class="col-sm-8">
								<input id="ORDER_ID" class="form-control" tabindex="1" maxlength="20" size="20" name="ORDER_ID" autocomplete="off" value="<?php echo  "ORDS" . rand(10000, 99999999) ?>" readonly>
							</div>
						</div>
						<div class="form-group row">
							<label for="CUST_ID" class="col-sm-4 col-form-label">Student Email</label>
							<div class="col-sm-8">
								<input id="CUST_ID" class="form-control" tabindex="2" maxlength="12" size="12" name="CUST_ID" autocomplete="off" value="<?php if (isset($stuLogEmial)) {
																																							echo $stuLogEmial;
																																						}  ?>" readonly>
							</div>
						</div>
						<div class="form-group row">
							<label for="TXN_AMOUNT" class="col-sm-4 col-form-label">Amount</label>
							<div class="col-sm-8">
								<input title="TXN_AMOUNT" class="form-control" tabindex="10" type="text" name="TXN_AMOUNT" value="<?php if (isset($_POST['id'])) {
																																		echo $_POST['id'];
																																	}   ?>" readonly>
							</div>
						</div>
						<div class="form-group row">
							<!-- <label for="TXN_AMOUNT" class="col-sm-4 col-form-label">Amount</label> -->
							<div class="col-sm-8">
								<input type="hidden" class="form-control" id="INDUSTRY_TYPE_ID" tabindex="4" maxlength="12" size="12" name="INDUSTRY_TYPE_ID" autocomplete="off" value="Retail" readonly>
							</div>
						</div>
						<div class="form-group row">
							<!-- <label for="TXN_AMOUNT" class="col-sm-4 col-form-label">Amount</label> -->
							<div class="col-sm-8">
								<input type="hidden" id="CHANNEL_ID" tabindex="4" maxlength="12" size="12" name="CHANNEL_ID" autocomplete="off" value="WEB" readonly>
							</div>
						</div>
						<div class="text-center">
							<input value="Checkout" type="submit" class="btn btn-primary" onclick="">	
							<a href="./course.php" class="btn btn-secondary">Cancel</a>																								
						</div>
					</form>
					<small class="form-text text-muted">Note: Complete Payment by Clicking Checkout Button</small>
				</div>
			</div>

		</div>



		<!-- <form method="post" action="pgRedirect.php">
			<table border="1">
				<tbody>
					<tr>
						<th>S.No</th>
						<th>Label</th>
						<th>Value</th>
					</tr>
					<tr>
						<td>1</td>
						<td><label>ORDER_ID::*</label></td>
						<td><input id="ORDER_ID" tabindex="1" maxlength="20" size="20" name="ORDER_ID" autocomplete="off" value="<?php echo  "ORDS" . rand(10000, 99999999) ?>">
						</td>
					</tr>
					<tr>
						<td>2</td>
						<td><label>CUSTID ::*</label></td>
						<td><input id="CUST_ID" tabindex="2" maxlength="12" size="12" name="CUST_ID" autocomplete="off" value="CUST001"></td>
					</tr>
					<tr>
						<td>3</td>
						<td><label>INDUSTRY_TYPE_ID ::*</label></td>
						<td><input id="INDUSTRY_TYPE_ID" tabindex="4" maxlength="12" size="12" name="INDUSTRY_TYPE_ID" autocomplete="off" value="Retail"></td>
					</tr>
					<tr>
						<td>4</td>
						<td><label>Channel ::*</label></td>
						<td><input id="CHANNEL_ID" tabindex="4" maxlength="12" size="12" name="CHANNEL_ID" autocomplete="off" value="WEB">
						</td>
					</tr>
					<tr>
						<td>5</td>
						<td><label>txnAmount*</label></td>
						<td><input title="TXN_AMOUNT" tabindex="10" type="text" name="TXN_AMOUNT" value="1">
						</td>
					</tr>
					<tr>
						<td></td>
						<td></td>
						<td><input value="CheckOut" type="submit" onclick=""></td>
					</tr>
				</tbody>
			</table>
			* - Mandatory Fields
		</form> -->
	</body>

	</html>

<?php
}
?>