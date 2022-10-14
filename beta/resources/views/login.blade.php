@include('layout.header')

		<section class="loginpage">
			<div class="container pt-5">
				<div class="row">
					<div class="col-xl-4 col-lg-5 col-md-6 col-sm-10 mx-auto">
						<h4 class="text-center mb-4">Sign in to Download SDD Software</h4>
						<h6 class="text-center mb-5">Please enter your name and password to log in.</h6>
						<form method="POST">
							<div class="form-group">
								<input type="email" name="email" placeholder="Email" class="form-control" required="">
							</div>
							<div class="form-group">
								<input type="password" name="password" placeholder="Password" class="form-control" required="">
							</div>
							<button type="submit" class="btn btn-logbtn btn-block" name="login">
                                        Login 
                            </button>
                             <div class="text-center mt-3">
                                <a class="" href="#"> Forgot password? </a>
                             </div>
						</form>
					</div>
				</div>
			</div>
		</section>

@include('layout.footer')