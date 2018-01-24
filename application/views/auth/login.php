<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Clase Serv</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="<?=base_url()?>assets/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?=base_url()?>assets/css/login.css">
	<link rel="stylesheet" href="<?=base_url()?>assets/css/toastr.min.css">
	<link rel="stylesheet" href="<?=base_url()?>assets/font-awesome/css/font-awesome.min.css">
	<link rel="icon" href="<?=base_url()?>assets/imagenes/claro.png">
	<script src="<?=base_url()?>assets/jquery/jquery-3.2.1.min.js"></script>
	<script src="<?=base_url()?>assets/bootstrap/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-4 col-md-offset-4 top">
				<h1 class="text-center">CLARO SERV</h1>
				<div class="panel panel-default sombra">
				  <div class="panel-body">
				  	<h2 class="text-center"><i class="fa fa-user" aria-hidden="true"></i></h2>
				  	<?=form_open('login',array("id" => "frm-login"));?>
				  		<div class="form-group">
				  			<div class="input-group input-group-lg">
							  	<input type="text" name="correo" class="form-control" placeholder="Correo Electrónico" aria-describedby="basic-addon1"><span class="input-group-addon" id="basic-addon1"><i class="fa fa-user span" aria-hidden="true"></i></span>
							</div>
				  		</div>
				  		<div class="form-group">
				  			<div class="input-group input-group-lg">
							  	<input type="password" name="pass" class="form-control" placeholder="Password" aria-describedby="basic-addon2"><span class="input-group-addon" id="basic-addon2"><i class="fa fa-key span" aria-hidden="true"></i></span>

							</div>
				  		</div>
				  		<div class="form-group">
				  			<button type="submit" class="btn btn-primary btn-lg btn-block">Ingresar</button>
				  		</div>
				  	<?=form_close()?>
				  </div>
				</div>
			</div>
		</div>
	</div>
	<script src="<?=base_url()?>assets/js/toastr.min.js"></script>
	<script>

		$(function(){
			const base_url = "<?=base_url()?>";
			$('#frm-login').on('submit',function(e){
				e.preventDefault();

				let data = $(this).serialize();
    			let metodo = $(this).attr('method');
    			let action = $(this).attr('action');

    			$.post(action,data,(response)=>{
    			console.log(response);
    			if(!response["ejecutado"]){
    				toastr.error(response["mensaje"]);
    			}else{
    				location.href = base_url + "/home";
    			}
    		
    			$('#frm-login')[0].reset();
    		},'json');
				return false;
			});
		});

	</script>
</body>
</html>