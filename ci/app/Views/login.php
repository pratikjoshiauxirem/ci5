<div class="container">
	<div class="row">
		<div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 mt-5 pt-3 pb-3 bg-white from-wrapper">
			<div class="container">
				<h3>Login</h3>
				<hr>
				<?php if(session()->get('success')): ?>
				<div class="alert alert-success" role="alert">
					<?= session()->get('success') ?>
				
				</div>
				 <?php endif ?>
				
				<form class="" action="/" method="">
					<div class="form-group">
						<label for="email">Email</label>
						<input type="text" name="email" id="email" value="<?= set_value('email')?>" class="form-control">
					</div>
					<div class="form-group">
						<label for="password">Password</label>
						<input type="password" name="password" id="password" value="" class="form-control">
					</div>
					<?php if(session()->get('loginfail')): ?>
				<div class="alert alert-danger" role="alert">
					<?= session()->get('loginfail') ?>
				
				</div>
				 <?php endif ?>
					<div class="row">
						<div class="col-12 col-sm-4">
							<button type="submit" class="btn btn-primary">Login</button>
						</div>
						<div class="col-12 col-sm-8 text-right">
							<a href="/register">Dont Have an Account yet ? </a>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>