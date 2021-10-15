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
<style>
a.disabled {
  pointer-events: none;
  cursor: default;
}
</style>
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
          <h1 class="h3 mb-2 text-gray-800">Tables Users Active Directory</h1>
          
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Data Users</h6>
            </div>
            <div class="card-body">
<?php
set_time_limit(30);
error_reporting(0);
ini_set('error_reporting', 0);
ini_set('display_errors',1);

// config
//$ldapserver = "ldap://login.intranet.tvip";
$ldapserver = "ldap://192.168.4.150";
$ldapuser   = "Administrator@intranet.tvip"; 
$ldappass   = "Databa53";
$ldaptree   = "CN=users, DC=intranet,DC=tvip ";

// connect
$ldapconn = ldap_connect($ldapserver) or die("Could not connect to LDAP server.");

if($ldapconn) {
    // binding to ldap server
    $ldapbind = ldap_bind($ldapconn, $ldapuser, $ldappass) or die ("Error trying to bind: ".ldap_error($ldapconn));
    // verify binding
		$filter = "(objectClass=user)";
        $result = ldap_search($ldapconn, $ldaptree, $filter) or die ("Error in search query: ".ldap_error($ldapconn));
		ldap_sort($ldapconn, $result, 'givenname') or die ("Error trying to sort: ".ldap_error($ldapconn));
        $data = ldap_get_entries($ldapconn, $result);
?>
              <div class="table-responsive">
                <table class="table table-lg table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead class="thead-dark text-center">
                    <tr>
					  
					  <th></th>
                      <th>Name</th>
                      <th>Username</th>
                       <th scope="col">Position</th>
                 <th>Office</th>
                     <!--  <th>Email</th>
                      <th>disable</th>-->
                      <th>Edit</th>
                      <th>Disable</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      
                      <th></th>
                      <th>Name</th>
                      <th>Username</th>
                      <th>Position</th>
                      <th>Office</th>
                     <!-- <th>Email</th>
                       <th>disable</th>-->
                      <th>Edit</th>
                      <th>Disable</th>
                    </tr>
                  </tfoot>
                  <tbody>
<?php
	for ($i=0; $i<$data["count"]; $i++) { 
		$LDAP_Name = "";
		if (!empty($data[$i]['cn'][0])) {
			$LDAP_Name = $data[$i]['cn'][0];
			if ($LDAP_Name == "NULL"){
				$LDAP_Name = "";
			}
		}
		//echo $data[$i]['useraccountcontrol'][0];
		if ($data[$i]['useraccountcontrol'][0] == '546'){
			$LDAP_Name = '<i><b>'.$data[$i]['cn'][0].'</b></i>';
			if ($LDAP_Name == "NULL"){
				$LDAP_Name = "";
			}
		}
		$LDAP_samaccountname = "";
		if (!empty($data[$i]['samaccountname'][0])) {
			$LDAP_samaccountname = $data[$i]['samaccountname'][0];
			if ($LDAP_samaccountname == "NULL"){
				$LDAP_samaccountname= "";
			}
		} /* else {
	 //#There is no samaccountname s0 assume this is an AD contact record so generate a unique username
			$LDAP_uSNCreated = $data[$i]['usncreated'][0];
			$LDAP_samaccountname= "CONTACT_" . $LDAP_uSNCreated;
		} */
		 $LDAP_Description = "";
		if (!empty($data[$i]['description'][0])) {
			$LDAP_Description = $data[$i]['description'][0];
			if ($LDAP_Description == "NULL"){
				$LDAP_Description = "";
			}
		}

		$LDAP_Office = "";
		if (!empty($data[$i]['physicaldeliveryofficename'][0])) {
			$LDAP_Office = $data[$i]['physicaldeliveryofficename'][0];
			if ($LDAP_Office == "NULL"){
				$LDAP_Office = "";
			}
		}
		/*$LDAP_Mail = "";
		if (!empty($data[$i]['mail'][0])) {
			$LDAP_Mail = $data[$i]['mail'][0]; 
			if ($LDAP_Mail == "NULL"){
				$LDAP_Mail = "";
			}
		}
		$LDAP_dis = "";
		if (!empty($data[$i]['useraccountcontrol'][0])) {
			$LDAP_dis = $data[$i]['useraccountcontrol'][0]; 
			if ($LDAP_dis == "NULL"){
				$LDAP_dis = "";
			}
		} */
?>
					<tr>
						<!-- <td><?=$i+1?></td> -->
						<td><i class="fas fa-user" ></i></a></td>
						<td><?=$LDAP_Name?></td>
						<td><?=$LDAP_samaccountname?></td>
						<td><?=$LDAP_Description?></td> 
						<td><?=$LDAP_Office?></td>
					<!--	<td><?php //$LDAP_Mail?></td> -->
						
						<td class="text-center"><!-- <a href="<?=base_url('home/edituser/').$data[$i]['samaccountname'][0]?>" >--><i class="fas fa-user-edit "></i></a></td>
					<?php if($data[$i]['useraccountcontrol'][0] == '546'){?>
						<td class="text-center"><a href="<?=base_url('home/enable/').$data[$i]['samaccountname'][0]?>" data-toggle="tooltip" title="enable User" ><i class="fas fa-user" ></i></a></td>
					<?php }else{ ?>
						<td class="text-center"><a href="<?=base_url('home/disable/').$data[$i]['samaccountname'][0]?>" data-toggle="tooltip" title="Disable User"><i class="fas fa-user-slash" ></i></a></td>
					<?php } ?>
					</tr>
<?php	}
}
ldap_close($ldapconn);
?>                  
                  </tbody>
                </table>
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
  <?php if($this->session->flashdata('sucdis')){?>
	<script>
		$.notify({
			icon: "fa fa-check-circle",
			message: "<?=$this->session->flashdata('sucdis')?>"
		},{
			type: "success",
			placement: {
				from: "top",
				align: "right"
			},
		});
	</script>
<?php }elseif($this->session->flashdata('fail')){?>
	<script>
		$.notify({
			icon: "fa fa-exclamation-triangle",
			message: "<?=$this->session->flashdata('fail')?>"
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
