<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Dashboard Active Directory</title>

  <!-- Custom fonts for this template -->
  <link href="<?=base_url()?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.2.0/animate.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
 
  <!-- Custom styles for this template -->
  <link href="<?=base_url()?>assets/css/sb-admin-2.min.css" rel="stylesheet">

  <!-- Custom styles for this page -->
  <link href="<?=base_url()?>assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
<link rel="apple-touch-icon" href="/docs/4.4/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
<link rel="icon" href="<?=base_url()?>assets/img/windows.svg" sizes="32x32" type="image/png">
<link rel="icon" href="<?=base_url()?>assets/img/windows.svg" sizes="16x16" type="image/png">
<link rel="manifest" href="/docs/4.4/assets/img/favicons/manifest.json">
<link rel="mask-icon" href="<?=base_url()?>assets/img/windows.svg" color="#563d7c">
<link rel="icon" href="<?=base_url()?>assets/img/windows.svg">
</head>

<body id="page-top">
<?php 
$LDAP_gn = "";
if (!empty($givenname)) {
	$LDAP_gn = $givenname;
	if ($LDAP_gn == "NULL"){
		$LDAP_gn = "";
	}
}
$LDAP_sn = "";
if (!empty($sn)) {
	$LDAP_sn = $sn;
	if ($LDAP_sn == "NULL"){
		$LDAP_sn = "";
	}
}
$LDAP_cn = "";
if (!empty($cn)) {
	$LDAP_cn = $cn;
	if ($LDAP_cn == "NULL"){
		$LDAP_cn = "";
	}
}
$LDAP_mail = "";
if (!empty($mail)) {
	$LDAP_mail = $mail;
	if ($LDAP_mail == "NULL"){
		$LDAP_mail = "";
	}
}
$LDAP_description = "";
if (!empty($description)) {
	$LDAP_description = $description;
	if ($LDAP_description == "NULL"){
		$LDAP_description = "";
	}
}
$LDAP_physicaldeliveryofficename = "";
if (!empty($physicaldeliveryofficename)) {
	$LDAP_physicaldeliveryofficename = $physicaldeliveryofficename;
	if ($LDAP_physicaldeliveryofficename == "NULL"){
		$LDAP_physicaldeliveryofficename = "";
	}
}
?>
  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <?php $this->load->view('sidebar')?>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
		<?php $this->load->view('topbar')?>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Edit User Active Directory</h1>
          
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Edit User</h6>
            </div>
            <div class="card-body">
			  <div class="row">
				<div class="col-md-12">
				  <h4 class="mb-3">New User</h4>
				  <form class="needs-validation" action="<?=base_url('home/updateuser')?>" method="POST" >
					<div class="row">
					  <div class="col-md-6 mb-3">
						<label for="firstName">First name</label>
						<input type="text" class="form-control" name="givenname" placeholder="" value="<?=$LDAP_gn?>" required>
						<div class="invalid-feedback">
						  Valid first name is required.
						</div>
					  </div>
					  <div class="col-md-6 mb-3">
						<label for="lastName">Last name</label>
						<input type="text" class="form-control" name="sn" placeholder="" value="<?=$LDAP_sn?>">
						<div class="invalid-feedback">
						  Valid last name is required.
						</div>
					  </div>
					</div>
					<div class="row">
						<div class="col-md-6 mb-3">
						  <label for="fullname">Full Name</label>
						  <input type="text" class="form-control" name="cn" placeholder="" value="<?=$LDAP_cn?>" required>
						  <div class="invalid-feedback">
							  Valid full name is required.
						  </div>
						</div>
						<div class="col-md-6 mb-3">
						  <label for="email">Email</label>
						  <input type="email" class="form-control" name="mail"  value="<?=$LDAP_mail?>">
						  <div class="invalid-feedback">
							  Valid Email is required.
						  </div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6 mb-3">
						  <label for="username">User Logon</label>
						  <div class="input-group">
							<input type="text" class="form-control" name="sAMAccountName" value="<?=$samaccountname?>" placeholder="Username" disabled required>
							<div class="invalid-feedback" style="width: 100%;">
							  Your username is required.
							</div>
						  </div>
						</div>
						<div class="col-md-6 mb-3">
						  <label for="username">Domain</label>
						  <div class="input-group">
							<div class="input-group-prepend">
							  <span class="input-group-text">@</span>
							</div>
							<input type="text" class="form-control" id="username" placeholder="INTRANET.TVIP" disabled>
							<div class="invalid-feedback" style="width: 100%;">
							  Your username is required.
							</div>
						  </div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6 mb-3">
						  <label for="description">Position As</label>
						  <input type="text" class="form-control" name="description" placeholder="" value="<?=$LDAP_description?>" required>
						  <div class="invalid-feedback">
							  Valid full name is required.
							</div>
						</div>
						<div class="col-md-6 mb-3">
						  <label for="office">Office</label>
						  <input type="text" class="form-control" name="physicalDeliveryOfficeName" value="<?=$LDAP_physicaldeliveryofficename?>" placeholder="" required>
						  <div class="invalid-feedback">
							  Valid full name is required.
							</div>
						</div>
					</div>
					
					
					
					<hr class="mb-4">
					<button class="btn btn-primary btn-lg btn-block" type="submit">Update User</button>
				  </form>
				</div>
			  </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
		<?php $this->load->view('footer')?>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Bootstrap core JavaScript-->
  <script src="<?=base_url()?>assets/vendor/jquery/jquery.min.js"></script>
  <script src="<?=base_url()?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?=base_url()?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?=base_url()?>assets/js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="<?=base_url()?>assets/vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="<?=base_url()?>assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="<?=base_url()?>assets/js/demo/datatables-demo.js"></script>

	<script src="<?=base_url()?>assets/js/bootstrap-notify.min.js"></script>
	<script src="<?=base_url()?>assets/js/app.js"></script>
	<?php if($this->session->flashdata('success')){?>
	<script>
		$.notify({
			icon: "fa fa-check-circle",
			message: "<?=$this->session->flashdata('success')?>"
		},{
			type: "success",
			placement: {
				from: "top",
				align: "right"
			},
		});
	</script>
<?php }elseif($this->session->flashdata('successsave')){?>
	<script>
		$.notify({
			icon: "fa fa-check-circle",
			message: "<?=$this->session->flashdata('successsave')?>"
		},{
			type: "success",
			placement: {
				from: "top",
				align: "right"
			},
		});
	</script>
	<?php }elseif($this->session->flashdata('errorsave')){ ?>
	<script>
		$.notify({
			icon: "fa fa-exclamation-triangle",
			message: "<?=$this->session->flashdata('errorsave')?>"
		},{
			type: "danger",
			placement: {
				from: "top",
				align: "right"
			},
		});
	</script>
<?php } ?>
</body>

</html>
