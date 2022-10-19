<!DOCTYPE html>
<html>
<head>
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
				<h1>Verification...</h1>
				
				<form  method="POST" >
					@csrf
					<div class="mb-3">

						<label for="exampleFormControlInput1" class="form-label">Email</label>
						<input type="email" class="form-control" name="email" placeholder="Enter Your Verification  Email" id="email">
						<span class="text-danger error-text email_err"></span>
						
					</div>
					<input type="submit" name="verify" id="verify" value="Verify" class="btn btn-primary">

					
				</form>			
			</div>
		</div>

	</div>
</body>
</html>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>

<script type="text/javascript">
	$(document).ready(function(){

		$(document).on('click','#verify',function(e){
			e.preventDefault()
			var email = $("#email").val();
			$.ajax({
				url:"http://localhost:8000/api/verify",
				data:{email:email},
				dataType:"JSON",
				type:'POST',
				success:function(data){

					if(data.route == 'activation'){
						window.location.href = 'http://localhost:8000/activation';
					}
					if(data.route == 'admincredential'){
						window.location.href = 'http://localhost:8000/admincredential';
					}
					if($.isEmptyObject(data.error)){
						//alert(data.success);
					}else{
						printErrorMsg(data.error);
					}
				}
			})
			function printErrorMsg (msg) {
				$.each( msg, function( key, value ) {
					console.log(key);
					$('.'+key+'_err').text(value);
				});
			}
		})
	})
</script>