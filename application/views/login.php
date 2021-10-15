
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <title>Active Directory Login</title>

    <!-- Bootstrap core CSS -->
	
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.2.0/animate.min.css" rel="stylesheet">
	<link href="<?=base_url()?>assets/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

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
	.bs-example{
    	margin: 20px;
    }
</style>

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
    <link href="<?=base_url()?>assets/css/signin.css" rel="stylesheet">
  </head>
  <body class="text-center">
    <form class="form-signin" action="<?=base_url('signin')?>" method="post">
		<img class="mb-4" src="<?=base_url()?>assets/img/windows.svg" alt="" width="72" height="72">
		<h1 class="h3 mb-3 font-weight-normal">Sign In Intranet.tvip</h1>
		<input type="text" id="username" name="username" class="form-control" placeholder="NIK" required >
		<label for="inputPassword" class="sr-only">Password</label>
		<input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
		<button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
		<p class="mt-5 mb-3 text-muted">&copy; 2020 ICT Dept.</p>
	</form>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>	
<script src="<?=base_url()?>assets/js/bootstrap-notify.min.js"></script>
<script src="<?=base_url()?>assets/js/app.js"></script>
<?php if($this->session->flashdata('errorlogin')){?>
<script>
$.notify({
	icon: "fa fa-exclamation-triangle",
	message: "<?=$this->session->flashdata('errorlogin')?>"
},{
	type: "danger",
	placement: {
		from: "top",
		align: "center"
	},
});
</script>
<?php }elseif ($this->session->flashdata('errorlog')){ ?>
<script>
$.notify({
	icon: "fa fa-exclamation-triangle",
	message: "<?=$this->session->flashdata('errorlog')?>"
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
