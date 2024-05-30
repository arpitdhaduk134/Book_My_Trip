<?php
session_start();
error_reporting(0);
include('includes/config.php');
if (isset($_POST['submit2'])) {
	$pid = intval($_GET['pkgid']);
	$useremail = $_SESSION['login'];
	$pname = $_POST['pname'];
	$pprice = $_POST['pprice'];
	$fromdate = $_POST['fromdate'];
	$todate = $_POST['todate'];
	$grandTotal2 = $_POST['grandTotal2'];
	$quantity = $_POST['quantity'];
	$vehicleType = $_POST['vehicleType'];
	$tprice = $_POST['tprice'];
	$status = 1;
	$sql = "INSERT INTO tblbooking(PackageId,UserEmail,FromDate,ToDate,status) VALUES(:pid,:useremail,:fromdate,:todate,:status)";
	$query = $dbh->prepare($sql);
	$query->bindParam(':pid', $pid, PDO::PARAM_STR);
	$query->bindParam(':useremail', $useremail, PDO::PARAM_STR);
	$query->bindParam(':fromdate', $fromdate, PDO::PARAM_STR);
	$query->bindParam(':todate', $todate, PDO::PARAM_STR);
	$query->bindParam(':status', $status, PDO::PARAM_STR);
	$query->execute();
	$lastInsertId = $dbh->lastInsertId();
	$sql1 = "INSERT INTO tblinvoice(BillAmount,Quntity,FromDate,PackageId,PackageName,PackagePrice,BookingId,Mode,Tprice) VALUES(:grandTotal2,:quantity,:fromdate,:pid,:pname,:pprice,:bid,:vehicleType,:tprice)";
	$query1 = $dbh->prepare($sql1);
	$query1->bindParam(':grandTotal2', $grandTotal2, PDO::PARAM_STR);
	$query1->bindParam(':quantity', $quantity, PDO::PARAM_STR);
	$query1->bindParam(':fromdate', $fromdate, PDO::PARAM_STR);
	$query1->bindParam(':pid', $pid, PDO::PARAM_STR);
	$query1->bindParam(':pname', $pname, PDO::PARAM_STR);
	$query1->bindParam(':pprice', $pprice, PDO::PARAM_STR);
	$query1->bindParam(':bid', $lastInsertId, PDO::PARAM_STR);
	$query1->bindParam(':vehicleType', $vehicleType, PDO::PARAM_STR);
	$query1->bindParam(':tprice', $tprice, PDO::PARAM_STR);

	$query1->execute();
	$lastInsertId = $dbh->lastInsertId();
	if ($lastInsertId) {
		echo '<script>alert("Booked Scuccessfully . Thank you") </script>';
		header("Location: /Book_My_Trip/bmt/Payment.php?iid=".$lastInsertId."");
		exit();
	} else {
		echo '<script>alert("Something Went Wrong. Please try again")</script>';
	}
}
?>

<!doctype html>
<html lang="en-gb" class="no-js">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<title>My Travel - Package details</title>
	<meta name="description" content="Traveller">
	<meta name="author" content="WebThemez">

	<link rel="stylesheet" href="css/bootstrap.min.css" />
	<!-- <link href="assets/css/bootstrap.css" rel='stylesheet' type='text/css' /> -->
	<link rel="stylesheet" type="text/css" href="css/isotope.css" media="screen" />
	<link rel="stylesheet" href="js/fancybox/jquery.fancybox.css" type="text/css" media="screen" />
	<link rel="stylesheet" type="text/css" href="css/da-slider.css" />
	<!-- Owl Carousel Assets -->
	<link href="js/owl-carousel/owl.carousel.css" rel="stylesheet">
	<link rel="stylesheet" href="css/styles.css" />
	<!-- Font Awesome -->
	<!--animate-->
	<link href="assets/css/animate.css" rel="stylesheet" type="text/css" media="all">
	<link href="font/css/font-awesome.min.css" rel="stylesheet">
	<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

</head>

<body>
	<header class="header">
		<?php if ($_SESSION['login']) { ?>
			<div class="top-header">
				<div class="container">
					<ul class="tp-hd-lft wow fadeInLeft animated" data-wow-delay=".5s">
						<li class="hm"><a href="index.php"><i class="fa fa-home"></i></a></li>
						<li class="prnt"><a href="profile.php">My Profile</a></li>
						<li class="prnt"><a href="change_password.php">Change Password</a></li>
						<li class="prnt"><a href="tour_history.php">My Tour History</a></li>
					</ul>
					<ul class="tp-hd-rgt wow fadeInRight animated" data-wow-delay=".5s">
						<li class="tol">Welcome :</li>
						<li class="sig"><?php echo htmlentities($_SESSION['login']); ?></li>
						<li class="sigi"><a href="logout.php">/ Logout</a></li>
					</ul>
					<div class="clearfix"></div>
				</div>
			</div>
		<?php
		} else {
		?>
			<div class="top-header">
				<div class="container">
					<ul class="tp-hd-lft wow fadeInLeft animated" data-wow-delay=".5s">
						<li class="hm"><a href="admin/index.php">Admin Login</a></li>
					</ul>
					<ul class="tp-hd-rgt wow fadeInRight animated" data-wow-delay=".5s">
						<li class="tol">Toll Number : 123-4568790</li>
						<li class="sig"><a href="#" data-toggle="modal" data-target="#myModal">Sign Up</a></li>
						<li class="sigi"><a href="#" data-toggle="modal" data-target="#myModal4">&nbsp; Sign In</a></li>
					</ul>
					<div class="clearfix"></div>
				</div>
			</div>
		<?php
		} ?>
		<div class="container">
			<nav class="navbar navbar-inverse" role="navigation">
				<div class="navbar-header adeInDown animated animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInDown;">
					<a href="#" class="navbar-brand scroll-top logo"><b>Traveller</b></a>
					<button type="button" id="nav-toggle" class="navbar-toggle" data-toggle="collapse" data-target="#main-nav">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
				</div>
				<!--/.navbar-header-->
				<div id="main-nav" class="collapse navbar-collapse adeInDown animated animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInDown;">
					<ul class="nav navbar-nav" id="mainNav">
						<li><a href="index.php" class="scroll-link">Home</a></li>
						<li><a href="index.php" class="scroll-link">About Us</a></li>
						<li><a href="index.php" class="scroll-link">Packages</a></li>
						<li><a href="index.php" class="scroll-link">Gallery</a></li>
						<li><a href="index.php" class="scroll-link">Contact Us</a></li>
					</ul>
				</div>
				<!--/.navbar-collapse-->
			</nav>
			<!--/.navbar-->
		</div>
		<!--/.container-->
	</header>
	<!--/.header-->
	<div id="#top"></div>
	<section id="home">
		<div class="banner-container" style="height: 300px;">
			<!-- <img src="images/banner-bg.jpg" alt="banner" /> -->
			<div class="container banner-content">
				<div id="da-slider" class="da-slider">
					<div class="da-slide">
						<h2>Tour Packages</h2>
						<p>Get your plans right away.. enjoy!!!</p>
						<div class="da-img"></div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!--Package-->
	<section id="packages" class="secPad">
		<div class="container">
			<div class="heading text-center">
				<!-- Heading -->
				<h2>Package Details</h2>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit</p>
			</div>
			<!--- selectroom ---->
			<div class="selectroom">
				<div class="container">
					<?php if ($error) { ?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } else if ($msg) { ?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php } ?>
					<?php
					$pid = intval($_GET['pkgid']);
					$sql = "SELECT * from tbltourpackages where PackageId=:pid";
					$query = $dbh->prepare($sql);
					$query->bindParam(':pid', $pid, PDO::PARAM_STR);
					$query->execute();
					$results = $query->fetchAll(PDO::FETCH_OBJ);
					$cnt = 1;
					if ($query->rowCount() > 0) {
						foreach ($results as $result) {
					?>

							<div class="selectroom_top">
								<div class="col-md-4 selectroom_left wow fadeInLeft animated" data-wow-delay=".5s">
									<img src="admin/pacakgeimages/<?php echo htmlentities($result->PackageImage); ?>" class="img-responsive" alt="">
								</div>
								<div class="col-md-8 selectroom_right wow fadeInRight animated" data-wow-delay=".5s">
									<h2 id="pkgname"><?php echo htmlentities($result->PackageName); ?></h2>
									<p class="dow">#PKG-<?php echo htmlentities($result->PackageId); ?></p>
									<p><b>Hotel Name :</b> <?php echo htmlentities($result->HotelName); ?></p>
									<p><b>Location :</b> <?php echo htmlentities($result->PackageLocation); ?></p>
									<p><b>Meal :</b> <?php echo htmlentities($result->PackageFetures); ?></p>
									<p><b>Bus Ticket Price:</b> <?php echo htmlentities($result->Bus); ?></p>
									<p><b>Flight Ticket Price:</b> <?php echo htmlentities($result->Flight); ?></p>
									<p><b>Train Ticket Price:</b> <?php echo htmlentities($result->Train); ?></p>

									<div class="clearfix"></div>
									<div class="grand">
										<p>Package Price</p>
										<h3>RS.<span id="packagePrice"><?php echo htmlentities($result->PackagePrice); ?></span></h3>
									</div>
								</div>
								<h3>Package Details</h3>
								<p style="padding-top: 1%"><?php echo htmlentities($result->PackageDetails); ?> </p>
								<div class="clearfix"></div>
							</div>
							<form name="book" method="post">
								<div class="selectroom_top">
									<div class="selectroom-info animated wow fadeInUp animated" data-wow-duration="1200ms" data-wow-delay="500ms" style="visibility: visible; animation-duration: 1200ms; animation-delay: 500ms; animation-name: fadeInUp; margin-top: -70px">

										<div class="ban-bottom">
											<div class=" col-md-6 mr-2 ">
												<label class="inputLabel" for="fromdate">From</label>
												<input style="border: 0.5px solid black;" class="form-control" type="date" id="fromdate" name="fromdate" min="<?php echo date('Y-m-d'); ?>" placeholder="dd-mm-yyyy">
											</div>

										
										<ul>
											<li class="spe">
												<label class="inputlabel">Tour Date</label>

											</li>
											<li class="spe">
												<p>Please select Medium of travel:</p>
												<input type="radio" id="train" name="mp" value="<?php echo htmlentities($result->Train); ?>" data="Train">
												<label for="train">Train</label><br>
												<input type="radio" id="bus" name="mp" value="<?php echo htmlentities($result->Bus); ?>" data="Bus">
												<label for="bus">Bus</label><br>
												<input type="radio" id="flight" name="mp" value="<?php echo htmlentities($result->Flight); ?>" data="Flight">
												<label for="flight">Flight</label>
												<input type="hidden" id="vehicleType" name="vehicleType" value="<?php echo $t?>">
												<input type="hidden" name="tprice" id="tprice" value="<?php echo $tprice ?>">
											
											</li>

											<li class="spe">
												<label for="quantity">Person:</label>
												<input style="border: 0.5px solid black;" type="number" id="quantity" name="quantity" min="1">
											</li>
											<li class="spe">
												<label>Total</label>
											<input style="border: 0.5px solid black;" type="text" name="grandTotal2" id="grandTotal2" value="<?php echo $grandTotal ?>" disable>
											</li>
											<li class="spe">
											<button type="button" name="calculate" id="calculate">calculate</button>
											</li>
											</div>
												
											<input type="hidden" name="pname" value="<?php echo htmlentities($result->PackageName); ?>">
											<input type="hidden" name="pprice" value="<?php echo htmlentities($result->PackagePrice); ?>">
											
											<?php if ($_SESSION['login']) { ?>
												<li class="spe" align="center">
													<a href=""></a>
													<button type="submit" name="submit2" class="btn-primary btn">Book</button>
												</li>
											<?php
													} else { ?>
												<li class="sigi" align="center" style="margin-top: 1%">
													<a href="#" data-toggle="modal" data-target="#myModal4" class="btn-primary btn"> Book</a>
												</li>
											<?php
													} ?>

											<div class="clearfix"></div>
										</ul>
									</div>
								</div>
							</form>

					<?php
						}
					} ?>
				</div>
			</div>
			<!--- /selectroom ---->
		</div>
	</section>
	<script>
		$(document).ready(function() {
			$("#calculate").click(function() {
				var packagePrice = Number($("#packagePrice").text());
				var radioValue = Number($("input[name='mp']:checked").val());
				var tprice = Number($("input[name='mp']:checked").val());
				var totalPrice = packagePrice + radioValue;
				var person = Number($("#quantity").val());
				var grandTotal = totalPrice * person;
				$("#grandTotal").text(grandTotal);
				$("#grandTotal2").val(grandTotal);
				console.log("Radio value: " + radioValue);
				console.log("Package Price: " + packagePrice);
				console.log("Total Price: " + totalPrice);
				console.log("Quentity: " + totalPrice);
				console.log("Grand Total: " + grandTotal);
				var t = $("input[name='mp']:checked").attr("data");
				$("#tprice").val(tprice);
				$("#vehicleType").val (t);			});
		});
	</script>
	<script>
		const fromdate = document.getElementById("fromdate");
		const todate = document.getElementById("todate");

		fromdate.addEventListener("change", function() {
			// Update the "min" attribute of the "To date" input to be equal to the "From date" input value
			todate.setAttribute("min", fromdate.value);

			// Reset the "To date" input value if it is less than the "From date" input value
			if (todate.value < fromdate.value) {
				todate.value = fromdate.value;
			}
		});

		todate.addEventListener("change", function() {
			// Reset the "To date" input value if it is less than the "From date" input value
			if (todate.value < fromdate.value) {
				todate.value = fromdate.value;
			}
		});
	</script>
	<a href="#top" class="topHome"><i class="fa fa-chevron-up fa-2x"></i></a>
	<?php include('includes/footer.php'); ?>
	<!-- signup -->
	<?php include('includes/signup.php'); ?>
	<!-- //signu -->
	<!-- signin -->
	<?php include('includes/signin.php'); ?>
	<!-- //signin -->
	<script src="js/modernizr-latest.js"></script>

	<script>

	</script>

	<script src="js/jquery-1.8.2.min.js" type="text/javascript"></script>
	<script src="js/bootstrap.min.js" type="text/javascript"></script>
	<script src="js/jquery.isotope.min.js" type="text/javascript"></script>
	<script src="js/fancybox/jquery.fancybox.pack.js" type="text/javascript"></script>
	<script src="js/jquery.nav.js" type="text/javascript"></script>
	<script src="js/jquery.cslider.js" type="text/javascript"></script>
	<script src="contact/contact_me.js"></script>
	<script src="js/custom.js" type="text/javascript"></script>
	<script src="js/owl-carousel/owl.carousel.js"></script>
</body>

</html>