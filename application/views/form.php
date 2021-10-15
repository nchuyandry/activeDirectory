
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.6">
    <title>Add User Domain Intranet.tvip</title>

    <!-- Bootstrap core CSS -->	
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.2.0/animate.min.css" rel="stylesheet">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
 
    <!-- Favicons -->
<link rel="apple-touch-icon" href="/docs/4.4/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
<link rel="icon" href="<?=base_url()?>assets/img/windows.svg" sizes="32x32" type="image/png">
<link rel="icon" href="<?=base_url()?>assets/img/windows.svg" sizes="16x16" type="image/png">
<link rel="manifest" href="/docs/4.4/assets/img/favicons/manifest.json">
<link rel="mask-icon" href="<?=base_url()?>assets/img/windows.svg" color="#563d7c">
<link rel="icon" href="<?=base_url()?>assets/img/windows.svg">
<meta name="msapplication-config" content="/docs/4.4/assets/img/favicons/browserconfig.xml">
<meta name="theme-color" content="#563d7c">


    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <!-- Custom styles for this template -->
    <link href="<?=base_url()?>assets/css/form-validation.css" rel="stylesheet">
  </head>
  <body class="bg-light">
    <div class="container">
  <div class="py-5 text-center">
    <img class="d-block mx-auto mb-4" src="/docs/4.4/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
    <h2>Add User Domain Intranet.tvip</h2>
    </div>
  <div class="row">
    <div class="col-md-12">
      <h4 class="mb-3">New User</h4>
      <form class="needs-validation" action="<?=base_url('saveuser')?>" method="POST" >
        <div class="row">
          <div class="col-md-6 mb-3">
            <label for="firstName">First name</label>
            <input type="text" class="form-control" name="givenname" placeholder="" value="" required>
            <div class="invalid-feedback">
              Valid first name is required.
            </div>
          </div>
          <div class="col-md-6 mb-3">
            <label for="lastName">Last name</label>
            <input type="text" class="form-control" name="sn" placeholder="" value="" required>
            <div class="invalid-feedback">
              Valid last name is required.
            </div>
          </div>
        </div>
		<div class="mb-3">
          <label for="fullname">Full Name</label>
          <input type="text" class="form-control" name="cn" placeholder="" required>
		  <div class="invalid-feedback">
              Valid full name is required.
            </div>
        </div>
		<div class="row">
			<div class="col-md-6 mb-3">
			  <label for="username">User Logon</label>
			  <div class="input-group">
				<input type="text" class="form-control" name="sAMAccountName" placeholder="Username" required>
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
			  <input type="text" class="form-control" name="description" placeholder="" required>
			  <div class="invalid-feedback">
				  Valid full name is required.
				</div>
			</div>
			<div class="col-md-6 mb-3">
			  <label for="office">Office</label>
			  <input type="text" class="form-control" name="physicalDeliveryOfficeName" placeholder="" required>
			  <div class="invalid-feedback">
				  Valid full name is required.
				</div>
			</div>
        </div>
		
		
        <h4 class="mb-3">Password</h4>
        <div class="row">
          <div class="col-md-6 mb-3">
            <label for="Password">Password</label>
            <input type="password" class="form-control" name="password" placeholder="" required>
            <div class="invalid-feedback">
              Password is required
            </div>
          </div>
          <div class="col-md-6 mb-3">
            <label for="Password">Confirm Password</label>
            <input type="Password" class="form-control" name="cpassword" placeholder="" required>
            <div class="invalid-feedback">
              Confirm Password is required
            </div>
          </div>
        </div>
        <hr class="mb-4">
        <button class="btn btn-primary btn-lg btn-block" type="submit">Save User</button>
      </form>
    </div>
  </div>

  <footer class="my-5 pt-5 text-muted text-center text-small">
    <p class="mb-1">&copy; 2020 ICT Dept.</p>
    <ul class="list-inline">
      <li class="list-inline-item"><a href="#">Privacy</a></li>
      <li class="list-inline-item"><a href="#">Terms</a></li>
      <li class="list-inline-item"><a href="#">Support</a></li>
    </ul>
  </footer>
</div>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
      <script>window.jQuery || document.write('<script src="/docs/4.4/assets/js/vendor/jquery.slim.min.js"><\/script>')</script><script src="/docs/4.4/dist/js/bootstrap.bundle.min.js" integrity="sha384-6khuMg9gaYr5AxOqhkVIODVIvm9ynTT5J4V1cfthmT+emCG6yVmEZsRHdxlotUnm" crossorigin="anonymous"></script>
        <script src="form-validation.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>	
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
		align: "center"
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
		align: "center"
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
		align: "center"
	},
});
</script>
<?php } ?>
</body>
</html>
