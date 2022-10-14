@include('layout.header')

		<section class="loginpage">
			<div class="container pt-5">
				<div class="row">
					<div class="col-xl-4 col-lg-5 col-md-6 col-sm-10 mx-auto">
						<h4 class="text-center mb-5">Sign up to your account</h4>
						<form method="POST">
							<div class="form-group">
								<input type="text" name="name" placeholder="Name" class="form-control" required="">
							</div>
							<div class="form-group">
								<input type="email" name="email" placeholder="Email" class="form-control" required="">
							</div>
							<div class="form-group">
								<input type="text" name="company" placeholder="Company" class="form-control" required="">
							</div>
							<div class="form-group">
								<input type="password" name="password" placeholder="Password" class="form-control" required="">
							</div>
							<button type="submit" class="btn btn-logbtn btn-block" name="login">
                                        Sign Up 
                            </button>
						</form>
					</div>
				</div>
			</div>
		</section>

@include('layout.footer')		