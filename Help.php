<?php require_once(dirname(__FILE__) . '/config.php'); 
if ( !isset($_SESSION['Admin_ID']) || !isset($_SESSION['Login_Type']) ) {
   	header('location:' . BASE_URL);
} ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

	<title>Help - Payroll</title>

	<link rel="stylesheet" href="<?php echo BASE_URL; ?>bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?php echo BASE_URL; ?>plugins/datatables/dataTables.bootstrap.css">
	<link rel="stylesheet" href="<?php echo BASE_URL; ?>plugins/datatables/jquery.dataTables_themeroller.css">
	<link rel="stylesheet" href="<?php echo BASE_URL; ?>dist/css/AdminLTE.css">
	<link rel="stylesheet" href="<?php echo BASE_URL; ?>plugins/iCheck/all.css">
	<link rel="stylesheet" href="<?php echo BASE_URL; ?>plugins/datepicker/datepicker3.css">
	<link rel="stylesheet" href="<?php echo BASE_URL; ?>dist/css/skins/_all-skins.min.css">

	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body class="hold-transition skin-blue sidebar-mini">
	<div class="wrapper">
		
		<?php require_once(dirname(__FILE__) . '/partials/topnav.php'); ?>

		<?php require_once(dirname(__FILE__) . '/partials/sidenav.php'); ?>

		<div class="content-wrapper">
			<section class="content-header">
				<h1>FAQ</h1>
				<ol class="breadcrumb">
					<li><a href="<?php echo BASE_URL; ?>"><i class="fa fa-dashboard"></i> Home</a></li>
					<li class="active">Help</li>
				</ol>
			</section>

			<section class="content">
				<div class="row">
        			<div class="col-xs-12">
						<div class="box">
							<div class="box-header">
								<h3 class="box-title">Questions</h3>
								<?php if ( $_SESSION['Login_Type'] == 'admin' ) { ?>
									<button type="button" class="btn btn-xs btn-primary pull-right" data-toggle="modal" data-target="#HelpModal">
										<i class="fa fa-plus"></i> Answer
									</button>
                                 
								<?php } 
                                else{?>
                                    <button type="button" class="btn btn-xs btn-primary pull-right" data-toggle="modal" data-target="#HelpModal">
										<i class="fa fa-plus"></i> Send Question
									</button>
                             <?php  }?>
							</div>
							<div class="box-body">
								<div class="table-responsiove">
									<?php if ( $_SESSION['Login_Type'] == 'admin' ) { ?>
										<table id="help" class="table table-bordered table-striped">
											<thead>
												<tr>
													<th class="text-center">HELP #</th>
													<th>QUESTION</th>
													<th>QUESTION</th>
													<th class="text-center">HELP DATE</th>
													<th>ANWSERS</th>
													<th class="text-center">ACTION</th>
												</tr>
											</thead>
										</table>
									<?php } else { ?>
										<table id="empHelp" class="table table-bordered table-striped">
											<thead>
												<tr>
												    <th class="text-center">HELP #</th>
													<th>QUESTION TITLE</th>
													<th>QUESTION</th>
													<th class="text-center">HELP DATE</th>
													<th>ANWSERS</th>
												</tr>
											</thead>
										</table>
									<?php } ?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
		</div>

		<?php if ( $_SESSION['Login_Type'] == 'admin' ) { ?>
			<div class="modal fade in" id="HelpModal" tabindex="-1">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
							<h4 class="modal-title">Help</h4>
						</div>
						<form method="post" role="form" data-toggle="validator" id="help-form">
							<div class="modal-body">
								<div class="form-group">
									<label for="help_title">Help Title</label>
									<input type="text" class="form-control" id="help_title" name="help_title" placeholder="Help Title" required />
								</div>
								<div class="form-group">
									<label for="help_desc">Question Description</label>
									<textarea class="form-control" id="help_desc" name="help_desc" placeholder="Question Description" required></textarea>
								</div>
								<div class="form-group">
									<label for="help_anwser">Anwser Description</label>
									<textarea class="form-control" id="help_anwser" name="help_anwser" placeholder="Anwser Description" required></textarea>
								</div>
								<div class="form-group">
					                <label for="help_date">Help Date (MM/DD/YYYY)</label>
					                <div class="input-group date">
					                  	<div class="input-group-addon">
					                    	<i class="fa fa-calendar"></i>
					                  	</div>
					                  	<input type="text" class="form-control datepicker pull-right" id="help_date" name="help_date" required />
					                </div>
					            </div>
					           
							</div>
							<div class="modal-footer">
								<input type="hidden" name="help_id" id="help_id" />
								<button type="submit" name="submit" class="btn btn-primary">Answer Question</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		<?php } else{?>
            <div class="modal fade in" id="HelpModal" tabindex="-1">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
							<h4 class="modal-title">Help</h4>
						</div>
						<form method="post" role="form" data-toggle="validator" id="help-form">
							<div class="modal-body">
								<div class="form-group">
									<label for="help_title">Help Title</label>
									<input type="text" class="form-control" id="help_title" name="help_title" placeholder="Help Title" required />
								</div>
								<div class="form-group">
									<label for="help_desc">Question Description</label>
									<textarea class="form-control" id="help_desc" name="help_desc" placeholder="Question Description"  required></textarea>
								</div>
								<div class="form-group">
									
									<input type="hidden" class="form-control" id="help_anwser" name="help_anwser" value="Not Anwsered yet" >
								</div>
								<div class="form-group">
					                <label for="help_date">Help Date (MM/DD/YYYY)</label>
					                <div class="input-group date">
					                  	<div class="input-group-addon">
					                    	<i class="fa fa-calendar"></i>
					                  	</div>
					                  	<input type="text" class="form-control datepicker pull-right" id="help_date" name="help_date" required />
					                </div>
					            </div>
					           
							</div>
							<div class="modal-footer">
								<input type="hidden" name="help_id" id="help_id" />
								<button type="submit" name="submit" class="btn btn-primary">Answer Question</button>
							</div>
						</form>
					</div>
				</div>
			</div>
            <?php }?>

		<footer class="main-footer">
		<strong> &copy; <?php echo date("Y");?> UENR Payroll System | </strong> Developed By RexSoft
		</footer>
	</div>

	<script src="<?php echo BASE_URL; ?>plugins/jQuery/jquery-2.2.3.min.js"></script>
	<script src="<?php echo BASE_URL; ?>bootstrap/js/bootstrap.min.js"></script>
	<script src="<?php echo BASE_URL; ?>plugins/datatables/jquery.dataTables.min.js"></script>
	<script src="<?php echo BASE_URL; ?>plugins/datatables/dataTables.bootstrap.min.js"></script>
	<script src="<?php echo BASE_URL; ?>plugins/jquery-validator/validator.min.js"></script>
	<script src="<?php echo BASE_URL; ?>plugins/datepicker/bootstrap-datepicker.js"></script>
	<script src="<?php echo BASE_URL; ?>plugins/iCheck/icheck.min.js"></script>
	<script src="<?php echo BASE_URL; ?>plugins/bootstrap-notify/bootstrap-notify.min.js"></script>
	<script src="<?php echo BASE_URL; ?>dist/js/app.min.js"></script>
	<script type="text/javascript">var baseurl = '<?php echo BASE_URL; ?>';</script>
	<script src="<?php echo BASE_URL; ?>dist/js/script.js?rand=<?php echo rand(); ?>"></script>
</body>
</html>