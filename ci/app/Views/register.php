<div class="container">
	<div class="row">
		<div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 mt-5 pt-3 pb-3 bg-white from-wrapper">
			<div class="containe">
				<h3>Register</h3>
				<hr>
				<form class="" action="/register" method="post">
					<div class="row">
						<div class="col-12 col-sm-6">
							<div class="form-group">
								<label for="firstname">First Name</label>
								<input type="text" name="firstname" id="firstname" value="<?=set_value('firstname')?>" >
							</div>
						</div>
						<div class="col-12 col-sm-6">
							<div class="form-group">
								<label for="lastname">last Name</label>
								<input type="text" name="lastname" id="lastname" value="<?=set_value('lastname')?>" >
							</div>
						</div>
						<div class="col-12">
					<div class="form-group">
						<label for="email">Email</label>
						<input type="text" name="email" id="email" value="<?= set_value('email')?>" class="form-control">
					</div>
					 </div>
					 <div class="col-12 col-sm-6">
					<div class="form-group">
						<label for="password">Password</label>
						<input type="password" name="password" id="password" value="" class="form-control">
					</div>
						</div>
						 <div class="col-12 col-sm-6">
					<div class="form-group">
						<label for="password_cnfm">Confirm Password</label>
						<input type="password" name="password_cnfm" id="password_cnfm" value="" class="form-control">
					</div>
						</div>
						<?php if(isset($validation)): ?> 
						 <div class="col-12">
						 	 <div class="alert alert-danger" role="alert">
						 	 	 <?= $validation->listerrors() ?> 
						 	 </div>
						 	<?php endif ?>
						 </div>
				</div>

					


					<div class="row">
						<div class="col-12 col-sm-4">
							<button type="submit" class="btn btn-primary">Register</button>
						</div>
						<div class="col-12 col-sm-8 text-right">
							<a href="/">Already Have an Account ? </a>
						</div>

					</div>
				</form>
			</div>
		</div>
	</div>
</div>