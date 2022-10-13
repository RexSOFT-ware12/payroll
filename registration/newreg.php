<?php require(dirname(__FILE__) . '/config.php');
 session_start();
$errors 	= array();
$expensions = array("jpeg", "jpg", "png");
$target_dir = dirname(__FILE__) . "/photos/";

if ( isset($_POST['submit']) ) {

	$selectSQL = mysqli_query($db, "SELECT * FROM `" . DB_PREFIX . "employees` ORDER BY `emp_id` DESC LIMIT 0, 100");
	if ( $selectSQL ) {
		if ( mysqli_num_rows($selectSQL) > 0 ) {
			$LastEMP = mysqli_num_rows($selectSQL);
			$curEmpID = 'UENR-' . ($LastEMP < 10 ? sprintf("%02d", $LastEMP + 1) : $LastEMP + 1);
			$_SESSION['id']=$curEmpID;
		} else {
			$curEmpID = 'UENR-01';
			$_SESSION['id']=$curEmpID;
		}
	} else {
		$errors['database'] = '<span class="text-danger">Something went wrong, please contact to support team!</span>';
	}

    if (empty($_POST['Position']))
	{
		$errors['Position'] = '<span class="text-danger">Please select position</span>';
	}$Position=$_POST['Position'];

	if ( empty($_POST['first_name']) ) {
		$errors['first_name'] = '<span class="text-danger">Please enter your first name!</span>';
	}else{$_SESSION['first_name']=$_POST['first_name'];}
	if ( empty($_POST['last_name']) ) {
		$errors['last_name'] = '<span class="text-danger">Please enter your last name!</span>';
	}else{$_SESSION['last_name']=$_POST['last_name'];}
	if ( empty($_POST['dob']) ) {
		$errors['dob'] = '<span class="text-danger">Please enter your date of birth!</span>';
	}else{$_SESSION['dob']=$_POST['dob'];}
	if ( empty($_POST['gender']) ) {
		$errors['gender'] = '<span class="text-danger">Please select your gender!</span>';
	}else{$_SESSION['gender']=$_POST['gender'];}
	if ( empty($_POST['merital_status']) ) {
		$errors['merital_status'] = '<span class="text-danger">Please choose your merital status!</span>';
	}else{$_SESSION['merital_status']=$_POST['merital_status'];}
	if ( empty($_POST['nationality']) ) {
		$errors['nationality'] = '<span class="text-danger">Please enter your nationality!</span>';
	}else{$_SESSION['nationality']=$_POST['nationality'];}
	if ( empty($_POST['address']) ) {
		$errors['address'] = '<span class="text-danger">Please enter your address!</span>';
	}else{$_SESSION['address']=$_POST['address'];}
	if ( empty($_POST['city']) ) {
		$errors['city'] = '<span class="text-danger">Please enter your city!</span>';
	}else{$_SESSION['city']=$_POST['city'];}
	if ( empty($_POST['state']) ) {
		$errors['state'] = '<span class="text-danger">Please enter your state!</span>';
	}else{$_SESSION['state']=$_POST['state'];}
	if ( empty($_POST['country']) ) {
		$errors['country'] = '<span class="text-danger">Please enter your country!</span>';
	}else{$_SESSION['country']=$_POST['country'];}
	if ( empty($_POST['email']) ) {
		$errors['email'] = '<span class="text-danger">Please enter your Staff id!</span>';
	}else{$_SESSION['email']=$_POST['email'];}
	if ( empty($_POST['mobile']) ) {
		$errors['mobile'] = '<span class="text-danger">Please enter your mobile number!</span>';
	}else{$_SESSION['mobile']=$_POST['mobile'];}
	if ( empty($_POST['identification']) ) {
		$errors['identification'] = '<span class="text-danger">Please choose your identification document!</span>';
	}else{$_SESSION['identification']=$_POST['identification'];}
	if ( empty($_POST['id_no']) ) {
		$errors['id_no'] = '<span class="text-danger">Please enter your identification number!</span>';
	}else{$_SESSION['id_no']=$_POST['id_no'];}
	if ( empty($_POST['employment_type']) ) {
		$errors['employment_type'] = '<span class="text-danger">Please choose your employment type!</span>';
	}else{$_SESSION['employment_type']=$_POST['employment_type'];}
	if ( empty($_POST['joining_date']) ) {
		$errors['joining_date'] = '<span class="text-danger">Please enter your joining date!</span>';
	}else{$_SESSION['joining_date']=$_POST['joining_date'];}
	if ( empty($_POST['Email']) ) {
		$errors['Email'] = '<span class="text-danger">Please enter your email id!</span>';
	}
	if ( empty($_POST['Department']) ) {
		$errors['Department'] = '<span class="text-danger">Enter Department</span>';
	}
	if ( empty($_POST['SSS']) ) {
		$errors['SSS'] = '<span class="text-danger">Enter SSS Level</span>';
	}$SSS=$_POST['SSS'];
	if ( empty($_POST['Grade']) ) {
		$errors['Grade'] = '<span class="text-danger">Enter Grade</span>';
	}
	if ( empty($_POST['emp_password']) ) {
		$errors['emp_password'] = '<span class="text-danger">Please set employee password!</span>';
	} 
	else {
		$emp_password = addslashes($_POST['emp_password']);
		$_SESSION['emp_password']=$_POST['emp_password'];
	}
	
	if ( empty($_FILES['photo']['name']) ) {
		$errors['photo'] = '<span class="text-danger">Please upload your recent photograph!</span>';
	} else {
		$_SESSION['photo']=$_POST['photo'];
		$file_tmp 	= $_FILES['photo']['tmp_name'];
		$file_type 	= $_FILES['photo']['type'];
		$file_ext 	= strtolower(end(explode('.', $_FILES['photo']['name'])));

		$photocopy 	= $curEmpID . '.' . $file_ext;
		if ( in_array($file_ext, $expensions) === false ) {
		 	$errors['photo'] = '<span class="text-danger">Extension not allowed, please choose a JPEG or PNG file!</span>';
		}
	}

	if ( empty($errors) == true ) {
	 	if ( move_uploaded_file($file_tmp, $target_dir . $photocopy) ) {
	 		extract($_POST);
			$insertSQL = mysqli_query($db, "INSERT INTO `" . DB_PREFIX . "employees`(`emp_code`, `first_name`, `last_name`, `dob`, `gender`, `merital_status`, `nationality`, `address`, `city`, `state`, `country`, `email`, `mobile`, `telephone`, `identity_doc`, `identity_no`, `emp_type`, `joining_date`, `emp_password` , `photo`, `created`) VALUES ('$curEmpID', '$first_name', '$last_name', '$dob', '$gender', '$merital_status', '$nationality', '$address', '$city', '$state', '$country', '$email', '$mobile', '$telephone', '$identification', '$id_no', '$employment_type', '$joining_date', '" . sha1($emp_password) . "' , '$photocopy', NOW())");
		
	 		$_SESSION['success'] = '<p class="text-center"><span class="text-success">Employee registration successfully!</span></p>';
	 		header('location:report.php?');

			$SQL = mysqli_query($db, "INSERT INTO `wy_users`(`emp_code`, 'Department') VALUES ('$curEmpID', 'Department')");
	 	} else {
	 		$errors['photo'] = '<span class="text-danger">Photo is not uploaded, please try again!</span>';
	 	}
	}
} ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
  	<meta http-equiv="X-UA-Compatible" content="IE=edge">
  	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

	<title>Employee Registration - Payroll</title>

	<link rel="stylesheet" href="<?php echo BASE_URL; ?>bootstrap/css/bootstrap.min.css">
  	<link rel="stylesheet" href="<?php echo BASE_URL; ?>dist/css/AdminLTE.css">
	<link rel="stylesheet" href="<?php echo BASE_URL; ?>plugins/datepicker/datepicker3.css">
</head>

<body style="background-color:white;" class="hold-transition register-page">
	<div class="container" >
		<div class="register-box">
		  	<div class="register-logo">
		    	<a href="<?php echo BASE_URL; ?>"><b>UENR</b> Payroll </a>
				<p  class="login-box-msg"><img height="100px" width="120px" src="dist/img/imageedit_2_9223538341.png"></p>
		  	</div>
			  <small>Employee Registration Form</small>
		</div>
		<div class="box box-primary" style="border:2px solid green;">
			<div class="box-header with-border">
				<h3 class="box-title">Fill the below form</h3>
				<div class="box-tools pull-right">
					<span class="text-red"><sup>*</sup>Note: All fields are required</span>
				</div>
			</div>

			<form class="form-horizontal" method="post" enctype="multipart/form-data" novalidate="">
				<div class="box-body">
					<div class="form-group">
						<label for="first_name" class="col-sm-2 control-label">Full Name</label>
						<div class="col-sm-5">
							<input type="text" style="border:2px solid green; border-radius:24px;" class="form-control" id="first_name" name="first_name" placeholder="First Name" value="<?php echo $_POST['first_name']; ?>" required />
							<?php echo $errors['first_name']; ?>
						</div>
						<div class="col-sm-5">
							<input type="text" style="border:2px solid green; border-radius:24px;" class="form-control" id="last_name" name="last_name" placeholder="Last Name" value="<?php echo $_POST['last_name']; ?>" required />
							<?php echo $errors['last_name']; ?>
						</div>
					</div>
					
					
					<input type="text" style="display:none;" class="form-control" name="status" value="Not Approved"/>
					
					<div class="form-group">
						<label for="dob" class="col-sm-2 control-label">DOB</label>
						<div class="col-sm-5">
							<div class="input-group">
								<input type="text" style="border:2px solid green; border-radius:24px;" class="form-control" id="dob" name="dob" placeholder="MM/DD/YYYY" value="<?php echo $_POST['dob']; ?>" required />
								<span class="input-group-addon">
									<i class="glyphicon glyphicon-calendar"></i>
								</span>
							</div>
							<?php echo $errors['dob']; ?>
						</div>
					</div>
			        <div class="form-group">
				        <label class="col-xs-2 control-label">Gender</label>
				        <div class="col-xs-10">
				            <div class="btn-group" data-toggle="buttons">
				                <label style="border:2px solid green; " class="btn btn-default <?php echo $_POST['gender']=='male' ? 'active' : ''; ?>">
				                    <input type="radio" style="border:2px solid green; border-radius:24px;" name="gender" value="male" <?php echo $_POST['gender']=='male' ? 'checked' : ''; ?> required /> Male
				                </label>
				                <label style="border:2px solid green; " class="btn btn-default <?php echo $_POST['gender']=='female' ? 'active' : ''; ?>">
				                    <input type="radio" style="border:2px solid green; border-radius:24px;" name="gender" value="female" <?php echo $_POST['gender']=='female' ? 'checked' : ''; ?> required /> Female
				                </label>
				            </div><br />
				            <?php echo $errors['gender']; ?>
				        </div>
				    </div>
					<div class="form-group">
						<label for="marital_status" class="col-sm-2 control-label">Marital status</label>
						<div class="col-sm-5">
							<select class="form-control" style="border:2px solid green;" id="merital_status" name="merital_status" required>
								<option value="">Please make a choice</option>
								<option <?php echo $_POST['merital_status']=='Single' ? 'selected' : ''; ?> value="Single">Single</option>
								<option <?php echo $_POST['merital_status']=='Cohabitation' ? 'selected' : ''; ?> value="Cohabitation">Cohabitation</option>
								<option <?php echo $_POST['merital_status']=='Married' ? 'selected' : ''; ?> value="Married">Married</option>
								<option <?php echo $_POST['merital_status']=='Registered partnership' ? 'selected' : ''; ?> value="Registered partnership">Registered partnership</option>
								<option <?php echo $_POST['merital_status']=='Have been married before' ? 'selected' : ''; ?> value="Have been married before">Have been married before</option>
								<option <?php echo $_POST['merital_status']=='Widow' ? 'selected' : ''; ?> value="Widow">Widow</option>
							</select>
							<?php echo $errors['merital_status']; ?>
						</div>
					</div>
					<div class="form-group">
						<label for="nationality" class="col-sm-2 control-label">Nationality</label>
						<div class="col-sm-5">
							<input type="text" style="border:2px solid green; border-radius:24px;" class="form-control" id="nationality" name="nationality" placeholder="Nationality" value="<?php echo $_POST['nationality']; ?>" required />
							<?php echo $errors['nationality']; ?>
						</div>
						
					</div>
					<hr />
					<div class="form-group">
						<label for="address" class="col-sm-2 control-label">Address</label>
						<div class="col-sm-10">
							<textarea style="border:2px solid green;"class="form-control" id="address" name="address" placeholder="Address" required><?php echo $_POST['address']; ?></textarea>
							<?php echo $errors['address']; ?>
						</div>
					</div>
					<div class="form-group">
						<label for="city" class="col-sm-2 control-label">City</label>
						<div class="col-sm-8">
							<input type="text" style="border:2px solid green; border-radius:24px;" class="form-control" id="city" name="city" placeholder="City" value="<?php echo $_POST['city']; ?>" required />
							<?php echo $errors['city']; ?>
						</div>
					</div>
					<div class="form-group">
						<label for="state" class="col-sm-2 control-label">State</label>
						<div class="col-sm-8">
							<input type="text" style="border:2px solid green; border-radius:24px;" class="form-control" id="state" name="state" placeholder="State" value="<?php echo $_POST['state']; ?>" required />
							<?php echo $errors['state']; ?>
						</div>
					</div>
					<div class="form-group">
						<label for="country" class="col-sm-2 control-label">Country</label>
						<div class="col-sm-8">
							<input type="text" style="border:2px solid green; border-radius:24px;" class="form-control" id="country" name="country" placeholder="Country" value="<?php echo $_POST['country']; ?>" required />
							<?php echo $errors['country']; ?>
						</div>
					</div>
					<div class="form-group">
						<label for="Position" class="col-sm-2 control-label">Position</label>
						<div class="col-sm-5">
							<select class="form-control" style="border:2px solid green;" id="Position" name="Position" required>
								<option value="">Please make a choice</option>
								<option <?php echo $_POST['Position']=='Junior staff' ? 'selected' : ''; ?> value="Junior staff">Junior staff</option>
								<option <?php echo $_POST['Position']=='Senior Staff' ? 'selected' : ''; ?> value="Senior Staff">Senior Staff</option>
								
							</select>
							<?php echo $errors['Position']; ?>
						</div>
					</div>
					<div class="form-group">
						<label for="email" class="col-sm-2 control-label">Staff id</label>
						<div class="col-sm-10">
							<input type="email" style="border:2px solid green; border-radius:24px;" class="form-control" id="email" name="email" placeholder="Staff id" value="<?php echo $_POST['email']; ?>" required />
							<?php echo $errors['email']; ?>
						</div>
					</div>
					<div class="form-group">
						<label for="Email" class="col-sm-2 control-label">Email</label>
						<div class="col-sm-10">
							<input type="email" style="border:2px solid green; border-radius:24px;" class="form-control" id="Email" name="Email" placeholder="Email" value="<?php echo $_POST['Email']; ?>" required />
							<?php echo $errors['Email']; ?>
						</div>
					</div>
					<div class="form-group">
						<label for="Department" class="col-sm-2 control-label">Department</label>
						<div class="col-sm-10">
							<input type="text" style="border:2px solid green; border-radius:24px;" class="form-control" id="Department" name="Department" placeholder="Department" value="<?php echo $_POST['Department']; ?>" required />
							<?php echo $errors['Department']; ?>
						</div>
					</div>

					<div class="form-group">
						<label for="Grade" class="col-sm-2 control-label">Grade</label>
						<div class="col-sm-10">
							<input type="text" style="border:2px solid green; border-radius:24px;" class="form-control" id="Grade" name="Grade" placeholder="Grade" value="<?php echo $_POST['Grade']; ?>" required />
							<?php echo $errors['Grade']; ?>
						</div>
					</div>

					<div class="form-group">
						<label for="SSS" class="col-sm-2 control-label">SSS Level</label>
						<div class="col-sm-10">
							<input type="email" style="border:2px solid green; border-radius:24px;" class="form-control" id="SSS" name="SSS" placeholder="SSS Level" value="<?php echo $_POST['SSS']; ?>" required />
							<?php echo $errors['SSS']; ?>
						</div>
					</div>
					
					<div class="form-group">
						<label for="mobile" class="col-sm-2 control-label">Contact No</label>
						<div class="col-sm-5">
							<input type="text" style="border:2px solid green; border-radius:24px;" class="form-control" id="mobile" name="mobile" placeholder="Mobile No" value="<?php echo $_POST['mobile']; ?>" required />
							<?php echo $errors['mobile']; ?>
						</div>
						<div class="col-sm-5">
							<input type="text" style="display:none; border:2px solid green; border-radius:24px;" class="form-control" id="telephone" name="telephone" value="Not Approved" />
						</div>
					</div>
					<div class="form-group">
						<label for="identification" class="col-sm-2 control-label">Identification</label>
						<div class="col-sm-10">
							<select class="form-control" style="border:2px solid green;" id="identification" name="identification" required>
								<option value="">Please make a choice</option>
								<option <?php echo $_POST['identification']=='Voter Id' ? 'selected' : ''; ?> value="Voter Id">Voter Id</option>
								<option <?php echo $_POST['identification']=='SSNIT Card' ? 'selected' : ''; ?> value="SSNIT Card">SSNIT Card</option>
								<option <?php echo $_POST['identification']=='Driving License' ? 'selected' : ''; ?> value="Driving License">Driving License</option>
								<option <?php echo $_POST['identification']=='Passport' ? 'selected' : ''; ?> value="Passport">Passport</option>
							</select>
							<?php echo $errors['identification']; ?>
						</div>
					</div>
					<div class="form-group">
						<label for="id_no" class="col-sm-2 control-label">Id Number</label>
						<div class="col-sm-8">
							<input type="text" style="border:2px solid green; border-radius:24px;" class="form-control" id="id_no" name="id_no" placeholder="Identification No" value="<?php echo $_POST['id_no']; ?>" required />
							<?php echo $errors['id_no']; ?>
						</div>
					</div>
					<hr />
					<div class="form-group">
						<label for="employment_type" class="col-sm-2 control-label">Employee Type</label>
						<div class="col-sm-10">
							<select class="form-control" style="border:2px solid green;" id="employment_type" name="employment_type">
								<option value="">Please make a choice</option>
								<option <?php echo $_POST['employment_type']=='Part-time employee' ? 'selected' : ''; ?> value="Part-time employee">Part-time employee</option>
								<option <?php echo $_POST['employment_type']=='Intern' ? 'selected' : ''; ?> value="Intern">Intern</option>
								<option <?php echo $_POST['employment_type']=='Holiday worker' ? 'selected' : ''; ?> value="Holiday worker">Holiday worker</option>
								<option <?php echo $_POST['employment_type']=='Permanent position' ? 'selected' : ''; ?> value="Permanent position">Permanent position</option>
							</select>
							<?php echo $errors['employment_type']; ?>
						</div>
					</div>
					<div class="form-group">
						<label for="joining_date" class="col-sm-2 control-label">Joining Date</label>
						<div class="col-sm-5">
							<div class="input-group">
								<input type="text" style="border:2px solid green; border-radius:24px;" class="form-control" id="joining_date" name="joining_date" placeholder="MM/DD/YYYY" value="<?php echo $_POST['joining_date']; ?>" required />
								<span class="input-group-addon">
									<i class="glyphicon glyphicon-calendar"></i>
								</span>
							</div>
							<?php echo $errors['joining_date']; ?>
						</div>
					</div>
					
					<div class="form-group">
						<label for="photo" class="col-sm-2 control-label">Photograph</label>
						<div class="col-sm-10">
							<input type="file" style="border:2px solid green; " class="form-control" id="photo" name="photo" accept="image/*" placeholder="Photograph" required style="height:auto" />
							<?php echo $errors['photo']; ?>
						</div>
					</div>
					<div class="form-group">
						<label for="password" class="col-sm-2 control-label">Password</label>
						<div class="col-sm-4">
							<input type="password" style="border:2px solid green; border-radius:24px;" class="form-control" id="emp_password" name="emp_password" placeholder="Password" value="<?php echo $_POST['emp_password']; ?>" required />
							<?php echo $errors['emp_password']; ?>
						</div>
					</div>
				</div>
				<div class="box-footer">
					<div class="col-sm-offset-2 col-sm-10">
						<button type="submit" class="btn btn-primary" name="submit">Submit</button>
						
					</div>
					
				</div>
			</form>
		</div>
	</div>

	<script src="<?php echo BASE_URL; ?>plugins/jQuery/jquery-2.2.3.min.js"></script>
	<script src="<?php echo BASE_URL; ?>bootstrap/js/bootstrap.min.js"></script>
	<script src="<?php echo BASE_URL; ?>plugins/datepicker/bootstrap-datepicker.js"></script>
	<script type="text/javascript">
	$('#dob, #joining_date').datepicker();
	</script>
</body>
</html>
