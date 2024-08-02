<!-- app/Views/home.php -->
<?= $this->extend('layouts/auth') ?>


<?= $this->section('content') ?>
<div class="container">

	<!-- Outer Row -->
	<div class="row justify-content-center">

		<div class="col-xl-10 col-lg-12 col-md-9">

			<div class="card o-hidden border-0 shadow-lg my-5">
				<div class="card-body p-0">
					<!-- Nested Row within Card Body -->
					<div class="row">

						<div class="col-lg-6">
							<div class="p-5 mt-4">
								<div class="text-center">
									<h1 class="h4 text-gray-900 mb-4">Masuk</h1>
								</div>
								<?= view('Myth\Auth\Views\_message_block') ?>

								<form action="<?= url_to('login') ?>" method="post">
									<?= csrf_field() ?>


									<div class="form-group">
										<label for="login"><?= lang('Auth.emailOrUsername') ?></label>
										<input type="text" class="form-control <?php if (session('errors.login')) : ?>is-invalid<?php endif ?>" name="login" placeholder="<?= lang('Auth.emailOrUsername') ?>">
										<div class="invalid-feedback">
											<?= session('errors.login') ?>
										</div>
									</div>


									<div class="form-group">
										<label for="password"><?= lang('Auth.password') ?></label>
										<input type="password" name="password" class="form-control  <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" placeholder="<?= lang('Auth.password') ?>">
										<div class="invalid-feedback">
											<?= session('errors.password') ?>
										</div>
									</div>

									<br>

									<button type="submit" class="btn btn-primary btn-block"><?= lang('Auth.loginAction') ?></button>
								</form>

								<hr>


								<p><a href="<?= url_to('register') ?>"><?= lang('Auth.needAnAccount') ?></a></p>


								<p><a href="<?= url_to('forgot') ?>"><?= lang('Auth.forgotYourPassword') ?></a></p>

							</div>
						</div>
						<div class="col-lg-6 d-none d-lg-block login-img"></div>
					</div>
				</div>
			</div>

		</div>

	</div>

</div>
<?= $this->endSection() ?>