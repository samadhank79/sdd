<!DOCTYPE html>
<html>
<head>
	<meta name="csrf-token" content="{{ csrf_token() }}" />
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<link rel="stylesheet" type="text/css"
	href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
	<title></title>
</head>
<body>
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-4">
				<h1>Activation</h1>
				<form  method="post" data-validate="parsley">
					@csrf
					<div class="mb-3">
						<label for="exampleFormControlInput1" class="form-label">First Name</label>
						<input type="text" placeholder="First Name" name='firstname' id="firstname" class="form-control" >
						<span class="text-danger error-text firstname_err"></span>
					</div>
					<div class="mb-3">
						<label for="exampleFormControlInput1" class="form-label">Last Name</label>
						<input type="text" placeholder="Last Name"  name='lastname' id="lastname" class="form-control" >
						<span class="text-danger error-text lastname_err"></span>
					</div>
					<div class="mb-3">
						<label for="exampleFormControlInput1" class="form-label">Email</label>
						<input type="text" placeholder="E-mail" id="email" name='email' class="form-control" >
						<span class="text-danger error-text email_err"></span>
					</div>

					<input type="submit" value="Activate" name="activate" id="activate" class="btn btn-info">
				</form>			
			</div>
		</div>

	</div>
	
</body>
</html>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script>
	$('body').on('click','#activate',function(e){
		e.preventDefault();
		var firstname = $('#firstname').val();
		var lastname = $('#lastname').val();
		var email = $('#email').val();
		//var amount = $('.amount').val();
		var total_amount = 10 * 100;
		$.ajax({
			type:'POST',
			url:"http://localhost:8000/api/activate",
			data:{firstname:firstname,lastname:lastname, email:email},
			success:function(data){
				if(data.route == 'admincredential'){

					window.location.href = 'http://localhost:8000/admincredential';
				}

				if($.isEmptyObject(data.error)){
					var options = {
						"key": "rzp_test_vx7Fkh2ISc8Bjh", 
						"amount": total_amount,
						"currency": "INR",
						"name": "4ever",
						"description": "Test Transaction",
						"image": "https://www.nicesnippets.com/image/imgpsh_fullsize.png",
						"order_id": "", 
						"handler": function (response){
							$.ajaxSetup({
								headers: {
									'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
								}
							});
							$.ajax({
								type:'POST',
								url:"http://localhost:8000/api/pay",
								data:{razorpay_payment_id:response.razorpay_payment_id,amount:total_amount,firstname:firstname,lastname:lastname,total_amount:total_amount,email:email},
								success:function(data){
									if(data.route == 'verify'){

										window.location.href = 'http://localhost:8000/';
									}

								}
							});
						},
						"prefill": {
							"name": "samadhan",
							"email": "samalexe79@gmail.com",
							"contact": ""
						},
						"notes": {
							"address": "test test"
						},
						"theme": {
							"color": "#F37254"
						}
					};
					var rzp1 = new Razorpay(options);
					rzp1.open();
				}else{
					printErrorMsg(data.error);
				}
			}
		});


	});

	function printErrorMsg (msg) {

		$.each( msg, function( key, value ) {
			
			$('.'+key+'_err').text(value);
		});
	}



</script>
