	          			<div class="col-xs-12">
	          				 <!-- Nav tabs -->
							  <ul class="nav nav-tabs" role="tablist">
							    <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Presentación</a></li>
							    <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Registro</a></li>
							    <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">Listado</a></li>
							    
							  </ul>

							  <!-- Tab panes -->
							  <div class="tab-content">
							    <div role="tabpanel" class="tab-pane fade in active active" id="home">
							    	<br>
							    	<div class="container-fluid">
							    		<div class="row">
							    			<div class="col-md-4">
							    				<img src="<?=base_url()?>assets/imagenes/clientes.png" class="img-responsive" alt="">
							    			</div>
							    			<div class="col-md-8">
							    				<p class="text-justify">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quia accusamus impedit consequatur error quos nobis optio laborum vitae voluptatum minima illum facere quae sit illo, autem quas. Numquam, saepe, architecto!</p>
							    			</div>
							    		</div>
							    	</div>
							    	
							    </div>
							    <div role="tabpanel" class="tab-pane fade" id="profile">
							    	<br>
							    	<?=form_open('clientes',array("id" =>"frm-clientes"))?>
							    	<div class="row">
							    		
							    		<div class="col-md-6">
							    				
							    			<div class="form-group">
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

											  <div class="form-group">
											  	<button type="submit" class="btn btn-primary"><i class="fa fa-floppy-o" aria-hidden="true"></i> Registrar</button>
											 <button type="reset" class="btn btn-default">Cancelar</button>
											  </div>

							    			</div>
							    		</div>
							    		 
							    		
							    	</div>
							    	<?=form_close()?>
							    	
							    </div>
							    <div role="tabpanel" class="tab-pane fade" id="messages">
							    	<br>
									<table id="table"
										data-group-by="true"
               							data-group-by-field="v4" 
		                                data-sort-name="v1"
		                                data-sort-order="desc"
		                                data-search="true"
		                                data-pagination="true"               
		                                data-page-size="8"
		                                data-page-list="[5,8,10]"
		                                data-pagination-first-text="Primero"
		                                data-pagination-pre-text="Anterior"
		                                data-pagination-next-text="Siguiente"
		                                data-pagination-last-text="Último">
		                              <thead>
		                              <tr>
		                                  <th data-field="v1">ID</th>
		                                  
		                                  <th data-field="v4">CLIENTE</th>
		                                  <th data-field="v5">TELÉFONO</th>
		                                  <th data-field="v6">TELÉFONO OPCIONAL</th>
		                                  <th data-field="v7">DIRECCIÓN</th>
		                                  <th data-field="v8">CORREO ELECTRÓNICO</th>
		                                  <th data-field="v9">IDACUERDO</th>
		                                  <th data-field="v10">CÓDIGO DE ACUERDO</th>
		                                  <th data-field="v18">PLAN CONTRATADO</th>
		                                  <th data-field="v11">PLANID</th>
		                                  <th data-field="v12">PRECIO PRIMER MES</th>
		                                  <th data-field="v13">PRECIO NORMAL</th>
		                                  <th data-field="v14">IDUSUARIO</th>
		                                  <th data-field="v15">FECHA DE REGISTRO</th>
		                                  <th data-field="v16">FECHA DE INSTALACIÓN</th>
		                                  <th data-field="v17">OBSERVACIONES</th>
		                                  
		                                  <th data-field="v19">REGISTRADO POR</th>
		                                  
		                                  
		                              </tr>
		                              </thead>
		                          </table>
							    	
							    </div>
							   
							  </div>

	          			</div>
	           		</div>
            	</div>
			  </div>
			</div>	
		</div>
	</div>
</div>

<script src="<?=base_url()?>assets/btable/bootstrap-table.min.js"></script>
<script src="<?=base_url()?>assets/btable/bootstrap-table-group-by.js"></script>
<script src="<?=base_url()?>assets/js/toastr.min.js"></script>
<script>
	$(function() {
    	console.log( "ready!" );
    	$('[data-toggle="tooltip"]').tooltip()
    	const ruta = "<?=base_url()?>";
    	const $table = $('#table');
    	const $buscar = $('#btn-buscar');

    	listar(ruta,$table);

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

    		console.log(data);
    		
    		$.post(action,data,(response)=>{
    			console.log(response);
    			if(!response["hecho"]){
    				toastr.error(response["mensaje"]);
    			}else{
    				toastr.success(response["mensaje"]);
    				$('#frm-clientes')[0].reset();
    				
    				$table.bootstrapTable('refresh', {
                   		url: ruta + 'getClientes'
                	});
                	
                	
    			}
    		
    			
    		},'json');
    		
    		return false;
    	});

    	$('#frm-editar-interesado').on('submit',function(e){
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
    					$table.bootstrapTable('refresh', {
                   			url: ruta + 'getInteresados'
                		});
    			}

    			$('#id_c').val("");
    			$('#frm-editar-interesado')[0].reset();
    			$('#myModal_C').modal('hide');
    			
    		},'json');
    		
    		return false;
	
    	});

	});

		function listar(base_url,$table){
			$.ajax({
                url: base_url + "getClientes",
                type: 'get',
                data: {},
                dataType: 'json',
                success:function(response){
                  console.log(response);
                  $(function () {
                    var data = response['data'];
                    $table.bootstrapTable({data: data});
                    $table.bootstrapTable('hideColumn', 'v1');
                    
                    $table.bootstrapTable('hideColumn', 'v4');
                    
                    $table.bootstrapTable('hideColumn', 'v9');
                    $table.bootstrapTable('hideColumn', 'v11');
                    $table.bootstrapTable('hideColumn', 'v14');
                  });
                }
              });
		}
		
	
</script>
<body>