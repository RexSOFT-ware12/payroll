<?php require(dirname(__FILE__) . '/config.php');
session_start();
$empId = $_REQUEST['emp'];
$selectSQL = mysqli_query($db, "SELECT * FROM `" . DB_PREFIX . "employees` WHERE `emp_code` = '$empId' LIMIT 0, 1");
if ( $selectSQL ) {
	if ( mysqli_num_rows($selectSQL) > 0 ) {
		$empDATA = mysqli_fetch_assoc($selectSQL);
	}
} 


?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />

	<title>Employee Information - Payroll</title>

	<link rel="stylesheet" href="<?php echo BASE_URL; ?>bootstrap/css/bootstrap.min.css">
  	<link rel="stylesheet" href="<?php echo BASE_URL; ?>dist/css/AdminLTE.css">

	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>

<body style="background-color:white;" class="hold-transition register-page">
	<div class="container">
		<div class="register-box">
		  	<div class="register-logo">
		    	<a href="<?php echo BASE_URL; ?>reports/<?php echo $empDATA['emp_code']; ?>/"><b>Payroll</b> system</a>
		    	<small>Employee Code: <?php echo $_SESSION['id'] ?></small>
		  	</div>
		</div>
		<div class="box box-primary" style="border:2px solid green;">
			<div class="box-header with-border">
				<h3 class="box-title">Employee Information</h3>
			</div>
			<div class="box-body">
				<?php echo $_SESSION['success']; ?>
				<div class="row">
					<label class="col-sm-3">Full Name</label>
					<div class="col-sm-9">
						<p><?php echo $_SESSION['first_name'] ?> <?php echo $_SESSION['last_name'] ?></p>
					</div>
				</div>
				<div class="row">
					<label class="col-sm-3">DOB</label>
					<div class="col-sm-9">
						<p><?php echo $_SESSION['dob'] ?></p>
					</div>
				</div>
		        <div class="row">
			        <label class="col-sm-3">Gender</label>
			        <div class="col-sm-9">
			            <p><?php echo $_SESSION['gender'] ?></p>
			        </div>
			    </div>
				<div class="row">
					<label class="col-sm-3">Marital status</label>
					<div class="col-sm-9">
						<p><?php echo $_SESSION['merital_status'] ?></p>
					</div>
				</div>
				<div class="row">
					<label class="col-sm-3">Nationality</label>
					<div class="col-sm-9">
						<p><?php echo $_SESSION['nationality']; ?></p>
					</div>
				</div>
				<hr />
				<div class="row">
					<label class="col-sm-3">Address</label>
					<div class="col-sm-9">
						<p><?php echo $_SESSION['address']; ?></p>
					</div>
				</div>
				<div class="row">
					<label class="col-sm-3">City</label>
					<div class="col-sm-9">
						<p><?php echo $_SESSION['city']; ?></p>
					</div>
				</div>
				<div class="row">
					<label class="col-sm-3">State</label>
					<div class="col-sm-9">
						<p><?php echo $_SESSION['state']; ?></p>
					</div>
				</div>
				<div class="row">
					<label class="col-sm-3">Country</label>
					<div class="col-sm-9">
						<p><?php echo $_SESSION['country']; ?></p>
					</div>
				</div>
				<div class="row">
					<label class="col-sm-3">Email</label>
					<div class="col-sm-9">
						<p><?php echo $_SESSION['email']; ?></p>
					</div>
				</div>
				<div class="row">
					<label class="col-sm-3">Mobile No</label>
					<div class="col-sm-9">
						<p><?php echo $_SESSION['mobile']; ?></p>
					</div>
				</div>
				<div class="row">
					<label class="col-sm-3">Telephone No</label>
					<div class="col-sm-9">
						<p><?php echo $_SESSION['telephone'] ? $_SESSION['telephone'] : 'N/A'; ?></p>
					</div>
				</div>
				<div class="row">
					<label class="col-sm-3">Identification</label>
					<div class="col-sm-9">
						<p><?php echo $_SESSION['identification']; ?></p>
					</div>
				</div>
				<div class="row">
					<label class="col-sm-3">Id No</label>
					<div class="col-sm-9">
						<p><?php echo $_SESSION['id_no']; ?></p>
					</div>
				</div>
				<hr />
				<div class="row">
					<label class="col-sm-3">Emp. Type</label>
					<div class="col-sm-9">
						<p><?php echo $_SESSION['emp_type']; ?></p>
					</div>
				</div>
				<div class="row">
					<label class="col-sm-3">Joining Date</label>
					<div class="col-sm-9">
						<p><?php echo $_SESSION['joining_date']; ?></p>
					</div>
				</div>
				
			</div>
			

			<div class="box-footer" >
				<div class="col-sm-offset-3 col-sm-9" >
					<button type="button" class="btn btn-primary" onclick="window.print();">Print</button>
				</div><br>
			</div>
			
		</div>
	</div>

	<script src="<?php echo BASE_URL; ?>plugins/jQuery/jquery-2.2.3.min.js"></script>
	<script src="<?php echo BASE_URL; ?>bootstrap/js/bootstrap.min.js"></script>
</body>
</html>

<?php unset($_SESSION['success']); ?>
