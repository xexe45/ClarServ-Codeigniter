	          			<div class="col-md-6">
	          				<div class="panel panel-default">
							  <div class="panel-body text-center">
							    <h2><i class="fa fa-file-text" aria-hidden="true"></i> 50 </h2>
							    <p>Contratos Realizados</p>
							  </div>
							</div>
							<button class="btn btn-primary btn-block" type="button" data-toggle="modal" data-target="#myModal_Co">Registrar Cliente</button>
							<br>
	          			</div>
	          			<div class="col-md-6">
	          				<div class="panel panel-default">
							  <div class="panel-body text-center">
							    <h2><i class="fa fa-phone" aria-hidden="true"></i> 5 </h2>
							    <p>Clientes Interesados</p>
							  </div>
							</div>
							<button data-toggle="modal" data-target="#myModal" class="btn btn-primary btn-block" type="button">Registrar Cliente Interesado</button>
	          			</div>
	          			
	           		</div>
	           		
            	</div>
			  </div>
			</div>	
		</div>
	</div>
</div>
<!-- Modal -->
<div class="modal fade" id="myModal_Co" tabindex="-1" role="dialog" aria-labelledby="myModalLabel_Co">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel_Co">Registrar Contrato</h4>
      </div>
      <?=form_open('clientes',array("id" =>"frm-clientes"))?>
      <div class="modal-body">
		
		<div class="row">
							    		
							    		<div class="col-md-6">
							    				
							    			<div class="form-group">
							    				<label for="dni">Dni *</label>
											    <div class="input-group">

											    	<input type="text" class="form-control" id="dni" placeholder="DNI del cliente" name="dni" required>
											    	 <span class="input-group-btn">
												        <button class="btn btn-default" type="button" id="btn-buscar"><i class="fa fa-search" aria-hidden="true"></i></button>
												      </span>
												</div>
											</div>
	
											  <div class="form-group">
											    <label for="nombres">Nombres *</label>
											    <input type="text" class="form-control" id="nombres" placeholder="Nombre del cliente" name="nombres" required>
											  </div>

											  <div class="form-group">
											    <label for="apellidos">Apellidos *</label>
											    <input type="text" class="form-control" id="apellidos" placeholder="Apellidos del cliente" name="apellidos" required>
											  </div>

											  <div class="form-group">
											    <label for="telefono">Teléfono *</label>
											    <input type="text" class="form-control" id="telefono" placeholder="Teléfono del cliente" name="telefono" required>
											  </div>

											  <div class="form-group">
											    <label for="telefono_opcional">Teléfono Opcional </label>
											    <input type="text" class="form-control" id="telefono_opcional" placeholder="Teléfono Opcional del cliente" name="telefono_opcional">
											  </div>

											  <div class="form-group">
											    <label for="direccion">Dirección</label>
											    <input type="text" class="form-control" id="direccion" placeholder="Dirección del cliente" name="direccion" required>
											  </div>

											  <div class="form-group">
											    <label for="correo">Correo Electrónico</label>
											    <input type="text" class="form-control" id="correo" placeholder="Correo Electrónico del cliente" name="correo" required>
											  </div>
							    		</div>
							    		<div class="col-md-6">
							    			<div class="form-group">
							    				<label for="codigo">Código de Acuerdo *</label>
							    				<input type="text" class="form-control" id="codigo" name="codigo" placeholder="Código de acuerdo">
							    			</div>
							    			<div class="form-group">
							    				<label for="servicio">Servicio a contratar *</label>
							    				<select name="servicio" id="servicio" class="form-control">
							    					<option value="">Seleccionar Servicio a contratar</option>
							    					<?php foreach ($servicios as $servicio): ?>
							    						
							    							<option value="<?=$servicio->v1?>"><?=$servicio->v2?></option>
							    						
							    						
							    					<?php endforeach ?>
							    					
							    				</select>
							    				<div class="form-group">
											    <label for="precio_promo">Precio de Costo Primer Mes *</label>
											   
											    <input type="text" class="form-control" id="precio_promo" name="precio_promo" readonly>
											  </div>
											  <div class="form-group">
											    <label for="precio_normal">Precio de Costo Normal *</label>
										
											    <input type="text" class="form-control" id="precio_normal" readonly name="precio_normal">
											  </div>

											  <div class="form-group">
											    <label for="instalacion">Fecha de Instalación *</label>
											    <input type="date" class="form-control" id="instalacion" name="instalacion" required>
											  </div>

											  <div class="form-group">
											    <label for="observaciones">Observaciones a tener en cuenta</label>
											    <textarea name="observaciones" required id="observaciones" class="form-control"></textarea>
											  </div>	

											  

							    			</div>
							    		</div>
							    		 
							    		
							    	</div>
									  
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-primary">Guardar</button>
      </div>
      <?=form_close()?>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Registro de posibles clientes</h4>
      </div>
      <?=form_open('clientes-interesados',array("id" =>"frm-interesados"))?>
      <div class="modal-body">
        <div class="form-group">
			<label for="nombres">Nombres *</label>
			<input type="text" class="form-control" id="nombres" placeholder="Nombre del cliente" name="nombres" required>
		</div>

		<div class="form-group">
			<label for="apellidos">Apellidos *</label>
			<input type="text" class="form-control" id="apellidos" placeholder="Apellidos del cliente" name="apellidos" required>
		</div>

		<div class="form-group">
			<label for="telefono">Teléfono *</label>
			<input type="text" class="form-control" id="telefono" placeholder="Teléfono del cliente" name="telefono" required>
		</div>

		<div class="form-group">
			<label for="direccion">Dirección</label>
			<input type="text" class="form-control" id="direccion" placeholder="Dirección del cliente" name="direccion" required>
		</div>


		<div class="form-group">
			<label for="descripcion">Descripción de consulta</label>
			<textarea name="descripcion" required id="descripcion" class="form-control"></textarea>
		</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Guardar</button>
      </div>
      <?=form_close()?>
    </div>
  </div>
</div>
<script src="<?=base_url()?>assets/js/toastr.min.js"></script>
<script>

	$(function(){

		const ruta = "<?=base_url()?>";
		const $buscar = $('#btn-buscar');
		
		$buscar.on('click',function(){

    		let dni = $('#dni').val();

    		if( !dni || dni.length < 8 || dni.length > 8 ){
    			toastr.warning("Ingrese un dni válido");
    			return;
    		}

    		$.post(ruta+"getByDni",{dni},( response ) => {
    			if( !response ){
    				toastr.warning("Persona no registrada en el sistema como cliente.");
    			}else{
    				$('#nombres').val(response['v2']);
    				$('#apellidos').val(response['v3']);
    				$('#telefono').val(response['v5']);
    				$('#telefono_opcional').val(response['v6']);
    				$('#direccion').val(response['v7']);
    				$('#correo').val(response['v8']);
    			}
    		},'json');
    	});


    	$('#servicio').on('change',function(){
    		let valor = $(this).val();
    		if(!valor){
    			$('#precio_promo').val("");
    			$('#precio_normal').val("");
    			return;
    		}
    		$.get(ruta+"combo-servicios/"+valor,(response)=>{
    			//console.log(response);
    			$('#precio_promo').val(response['v1']);
    			$('#precio_normal').val(response['v2']);

    		},'json');
    	});

    	$('#frm-clientes').on('submit',function(e){
    		e.preventDefault();

    		let data = $(this).serialize();
    		let metodo = $(this).attr('method');
    		let action = $(this).attr('action');
    		
    		$.post(action,data,(response)=>{
    			console.log(response);
    			if(!response["hecho"]){
    				toastr.error(response["mensaje"]);
    			}else{
    				toastr.success(response["mensaje"]);
    			}
    		
    			$('#frm-clientes')[0].reset();
    			$('#myModal_Co').modal('hide');
    		},'json');
    		
    		return false;
    	});
    	

		$('#frm-interesados').on('submit',function(e){
    		e.preventDefault();

    		let data = $(this).serialize();
    		let metodo = $(this).attr('method');
    		let action = $(this).attr('action');

    		console.log(data);
    		
    		$.post(action,data,(response)=>{
    			console.log(response);
    			if(!response["hecho"]){
    				toastr.error(response["mensaje"]);
    			}else{
    				toastr.success(response["mensaje"]);
    			}
    		
    			$('#frm-interesados')[0].reset();
    			$('#myModal').modal('hide');
    		},'json');
    		
    		return false;
    	});

	});
</script>
<body>