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
							    				<img src="<?=base_url()?>assets/imagenes/registro.png" class="img-responsive" alt="">
							    			</div>
							    			<div class="col-md-8">
							    				<p class="text-justify">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quia accusamus impedit consequatur error quos nobis optio laborum vitae voluptatum minima illum facere quae sit illo, autem quas. Numquam, saepe, architecto!</p>
							    			</div>
							    		</div>
							    	</div>
							    	
							    </div>
							    <div role="tabpanel" class="tab-pane fade" id="profile">
							    	<br>
							    	<?=form_open('usuarios',array("id" =>"frm-usuarios"))?>
								    	<div class="row">
								    		<div class="col-md-4">
								    			 <div class="form-group">
												    <label for="nombres">Nombres *</label>
												    <input type="text" class="form-control" id="nombres" placeholder="Nombres del Usuario" name="nombres" required>
												  </div>

								    		</div>
								    		<div class="col-md-6">
										    			
											  <div class="form-group">
											    <label for="apellidos">Apellidos *</label>
											    <input type="text" class="form-control" id="apellidos" placeholder="Apellidos del Usuario" name="apellidos" required>
											  </div>

								    		</div>
								    		<div class="col-md-2">
										    			
											  <div class="form-group">
											    <label for="dni">DNI *</label>
											    <input type="text" class="form-control" id="dni" placeholder="Dni" name="dni" required>
											  </div>

								    		</div>
								    	</div>

								    	<div class="row">
								    		<div class="col-md-3">
								    			 <div class="form-group">
												    <label for="telefono">Teléfono *</label>
												    <input type="text" class="form-control" id="telefono" placeholder="Teléfono de contacto" name="telefono" required>
												  </div>

								    		</div>
								    		<div class="col-md-3">
										    			
											  <div class="form-group">
											    <label for="opcional">Teléfono Opcional</label>
											    <input type="text" class="form-control" id="opcional" placeholder="Teléfono Opcional" name="opcional">
											  </div>

								    		</div>
								    		<div class="col-md-6">
										    			
											  <div class="form-group">
											    <label for="direccion">Dirección *</label>
											    <input type="text" class="form-control" id="direccion" placeholder="Dirección del Usuario" name="direccion" required>
											  </div>

								    		</div>
								    	</div>

								    	<div class="row">
								    		<div class="col-md-4">
								    			<div class="form-group">
								    				<label for="rol">Rol de Usuario *</label>
								    				<select name="rol" id="rol" class="form-control">
								    					<option value="">Seleccione Rol de Usuario</option>
								    					<?php foreach ($roles as $rol): ?>
								    						<option value="<?=$rol->v1?>"><?=$rol->v2?></option>
								    					<?php endforeach ?>
								    				</select>
								    			</div>
								    		</div>
								    		<div class="col-md-4">
										    			
											  <div class="form-group">
											    <label for="email">Email *</label>
											    <input type="email" class="form-control" id="email" placeholder="Email del Usuario" name="email" required>
											  </div>

								    		</div>
								    		<div class="col-md-4">
										    			
											  <div class="form-group">
											    <label for="password">Password *</label>
											    <input type="password" class="form-control" id="password" placeholder="Password del Usuario" name="password" required>
											  </div>

								    		</div>
								    	</div>
									  
									  <button type="submit" class="btn btn-primary"><i class="fa fa-floppy-o" aria-hidden="true"></i> Registrar</button>
									  <button type="reset" class="btn btn-default"><i class="fa fa-eraser" aria-hidden="true"></i> Cancelar</button>
									<?=form_close()?>
							    </div>
							    <div role="tabpanel" class="tab-pane fade" id="messages">
							    	<br>
									<table id="table" 
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
		                                  <th data-field="v2">NOMBRES</th>
		                                  <th data-field="v3">APELLIDOS</th>
		                                  <th data-field="v4">DNI</th>
		                                  <th data-field="v5">TELÉFONO</th>
		                                  <th data-field="v6">TELÉFONO OPCIONAL</th>
		                                  <th data-field="v7">DIRECCIÓN</th>
		                                  <th data-field="v8">ROL_ID</th>
		                                  <th data-field="v9">ROL</th>
		                                  <th data-field="v10">EMAIL</th>
		                                  <th data-field="v11">ESTADO </th>
		                                  <th data-field="v12">FECHA DE REGISTRO </th>
		                                  <th data-field="v13">ÚLTIMA ACTUALIZACIÓN</th>
		                                  <th data-field="operate"
		                                      data-align="center"
		                                      data-formatter="operateFormatter"
		                                      data-events="operateEvents">OPCIONES</th>
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
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Editar Información</h4>
      </div>
      <?=form_open('editar-usuario',array("id" => "frm-editar"))?>
      <div class="modal-body">
      	<input type="hidden" id="id_e" name="id_e">
        <div class="row">
			<div class="col-md-4">
				<div class="form-group">
					<label for="nombres_e">Nombres *</label>
					<input type="text" class="form-control" id="nombres_e" name="nombres_e" required>
				</div>

			</div>
			<div class="col-md-6">
										    			
				<div class="form-group">
						<label for="apellidos_e">Apellidos *</label>
						<input type="text" class="form-control" id="apellidos_e" name="apellidos_e" required>
				</div>

			</div>
			<div class="col-md-2">
										    			
				<div class="form-group">
						<label for="dni_e">DNI *</label>
						<input type="text" class="form-control" id="dni_e" name="dni_e" required>
				</div>

			</div>
		</div>

		<div class="row">
			<div class="col-md-3">
				<div class="form-group">
					<label for="telefono_e">Teléfono *</label>
					<input type="text" class="form-control" id="telefono_e" name="telefono_e" required>
				</div>

			</div>
			<div class="col-md-3">
										    			
				<div class="form-group">
						<label for="opcional_e">Teléfono Opcional</label>
						<input type="text" class="form-control" id="opcional_e" name="opcional_e">
				</div>

			</div>
			<div class="col-md-6">
										    			
				<div class="form-group">
						<label for="direccion_e">Dirección *</label>
						<input type="text" class="form-control" id="direccion_e" name="direccion_e" required>
				</div>

			</div>
		</div>

		<div class="row">
			<div class="col-md-4">
				<div class="form-group">
					<label for="rol_e">Rol de Usuario *</label>
					<select name="rol_e" id="rol_e" class="form-control">
						<option value="">Seleccione Rol de Usuario</option>
							<?php foreach ($roles as $rol): ?>
								<option value="<?=$rol->v1?>"><?=$rol->v2?></option>
							<?php endforeach ?>
					</select>
				</div>
			</div>
			<div class="col-md-4">
										    			
				<div class="form-group">
					<label for="email_e">Email *</label>
					<input type="email" class="form-control" id="email_e" name="email_e" required>
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label for="estado_e">Estado *</label>
					<select name="estado_e" id="estado_e" class="form-control">
						<option value="A">ACTIVO</option>
						<option value="D">NO ACTIVO</option>
					</select>
				</div>
			</div>
								    		
		</div>
									  
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
      </div>
      <?=form_close()?>
    </div>
  </div>
</div>
<script src="<?=base_url()?>assets/btable/bootstrap-table.min.js"></script>
<script src="<?=base_url()?>assets/btable/bootstrap-table-editable.js"></script>
<script src="<?=base_url()?>assets/btable/bootstrap-editable.js"></script>
<script src="<?=base_url()?>assets/js/toastr.min.js"></script>
<script>
	$(function() {
    	console.log( "ready!" );
    	$('[data-toggle="tooltip"]').tooltip()
    	const ruta = "<?=base_url()?>";
    	const $table = $('#table');

    	listar(ruta,$table);

    	$('#frm-usuarios').on('submit',function(e){
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
    				$('#frm-usuarios')[0].reset();
    					
    					$table.bootstrapTable('refresh', {
                   			url: ruta + 'getUsers'
                		});
                		
    			}
    		
    			
    		},'json');
    		
    		return false;
	
    	});

    	$('#frm-editar').on('submit',function(e){
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
                   			url: ruta + 'getUsers'
                		});
    			}

    			$('#id_e').val("");
    			$('#frm-editar')[0].reset();
    			$('#myModal').modal('hide');
    			
    		},'json');
    		
    		return false;
	
    	});


	});

		function listar(base_url,$table){
			$.ajax({
                url: base_url + "getUsers",
                type: 'get',
                data: {},
                dataType: 'json',
                success:function(response){
                  console.log(response);
                  $(function () {
                    var data = response['data'];
                    $table.bootstrapTable({data: data});
                    $table.bootstrapTable('hideColumn', 'v1');
                    $table.bootstrapTable('hideColumn', 'v8');
                  });
                }
              });
		}


        function operateFormatter(value, row, index) {
          return [
          	'<a class="edit" href="javascript:void(0)" data-toggle="tooltip" title="Editar" style="margin-left: 10px">',
              '<button type="button" class="btn btn-success"><i class="fa fa-pencil-square-o"></i></button>',
            '</a>',
            
          ].join('');
        }

        window.operateEvents = {
            'click .edit': function (e, value, row, index) {
              console.log(row);
              $('#id_e').val(row['v1']);
              $('#nombres_e').val(row['v2']);
              $('#apellidos_e').val(row['v3']);
              $('#dni_e').val(row['v4']);
              $('#telefono_e').val(row['v5']);
              $('#opcional_e').val(row['v6']);
              $('#direccion_e').val(row['v7']);
              $('#rol_e').val(row['v8']);
              $('#email_e').val(row['v10']);
              $('#estado_e').val(row['v11']);
              	$('#myModal').modal({
				  keyboard: false,
				  backdrop: 'static'
				})
            },
        };

	
</script>
<body>