<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('css/bootstrap.css') ?>">
    <link rel="stylesheet" href="<?= base_url('vendors/bootstrap-icons/bootstrap-icons.css') ?>">
    <link rel="stylesheet" href="<?= base_url('css/app.css') ?>">
    <link rel="stylesheet" href="<?= base_url('css/pages/auth.css') ?>">
    <link rel="stylesheet" href="<?= base_url('css/utils.css') ?>">

    <!-- Toastr -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
<div class="limiter">
		<div class="container-login100">
			<div class="animated flipInX wrap-login100" style="padding-top:30px">
				<form id="formlogin" action="<?= base_url('login') ?>" class="login100-form validate-form" method="POST">
					<span class="login100-form-title p-b-26" style="font-weight:bold">
						Perpustakaan
					</span>
					<div class="animated flipInX delay-10s p-b-20">
						<span>Silahkan login</span>
					</div>
					<div class="wrap-input100 validate-input" data-validate="Enter Username" required>
						<input class="input100" type="text" name="username" autocomplete="off">
						<span class="focus-input100" data-placeholder="Username"></span>
					</div>
					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<input class="input100" type="password" name="password">
						<span class="focus-input100" data-placeholder="Password"></span>
					</div>
					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn">
								Login
							</button>
						</div>
						<p><small>Support By Syperpus</small></p>
					</div>
				</form>
			</div>
		</div>
	</div>

	<script src="<?= base_url('vendors/jquery/jquery.min.js') ?>"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    
    <?php if (session()->getFlashdata('error')): ?>
        <script>
            toastr.error('<?= session()->getFlashdata('error') ?>', "ERROR")
        </script>
    <?php elseif (session()->getFlashdata('success')): ?>
        <script>
            toastr.success('<?= session()->getFlashdata('success') ?>', "INFO")
        </script>
    <?php endif ?>
</body>

</html>