	          			<div class="col-xs-12">
	          				 <!-- Nav tabs -->
							  <ul class="nav nav-tabs" role="tablist">
							    <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Presentación</a></li>
							    <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Registro</a></li>
							    <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">Listado</a></li>
							    <li role="permisos"><a href="#permisos" aria-controls="permisos" role="tab" data-toggle="tab">Permisos</a></li>

							    
							  </ul>

							  <!-- Tab panes -->
							  <div class="tab-content">
							    <div role="tabpanel" class="tab-pane fade in active active" id="home">
							    	<br>
							    	<div class="container-fluid">
							    		<div class="row">
							    			<div class="col-md-6">
							    				<img src="<?=base_url()?>assets/imagenes/roles.png" class="img-responsive" alt="">
							    			</div>
							    			<div class="col-md-6">
							    				<p class="text-justify">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quia accusamus impedit consequatur error quos nobis optio laborum vitae voluptatum minima illum facere quae sit illo, autem quas. Numquam, saepe, architecto!</p>
							    			</div>
							    		</div>
							    	</div>
							    	
							    </div>
							    <div role="tabpanel" class="tab-pane fade" id="profile">
							    	<br>
							    	<?=form_open('roles',array("id" =>"frm-roles"))?>
									  <div class="form-group">
									    <label for="rol">Nombre de Rol *</label>
									    <input type="text" class="form-control" id="rol" placeholder="Rol" name="rol" required>
									  </div>
									  <div class="form-group">
									    <label for="descripcion">Descripción de Rol *</label>
									    <textarea name="descripcion" required id="descripcion" class="form-control"></textarea>
									  </div>
									  <button type="submit" class="btn btn-primary"><i class="fa fa-floppy-o" aria-hidden="true"></i> Registrar</button>
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
		                                  <th data-field="v2" data-editable="true">ROL</th>
		                                  <th data-field="v3" data-editable="true">DESCRIPCIÓN</th>
		                                  
		                              </tr>
		                              </thead>
		                          </table>
											
							    	
							    </div>
							   <div role="tabpanel" class="tab-pane fade" id="permisos">
							    	<br>
							    	<?=form_open('',array("id" => "frm-permisos"))?>
							    		<div class="form-group">
							    			<label for="roles">Roles del Sistema</label>
							    			<select name="role_id" id="role_id" class="form-control">
							    				<option value="">Seleccionar Rol...</option>
							    				<?php foreach ($roles as $rol): ?>
							    					<option value="<?=$rol->v1?>"><?=$rol->v2?></option>
							    				<?php endforeach ?>
							    			</select>
							    		</div>
							    		<div class="form-group">
							    			<label for="modulos">Módulos</label>
							    			<div>
							    				<?php foreach ($modulos as $modulo): ?>
							    				<label class="checkbox-inline">
												  <input name="checks" type="checkbox" id="<?=$modulo->v2?>" value="<?=$modulo->v1?>"> <?=remplazo($modulo->v2)?>
												</label>	
							    				<?php endforeach ?>
							    				
							    			</div>
							    		</div>
							    	<?=form_close()?>
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
<script src="<?=base_url()?>assets/btable/bootstrap-table-editable.js"></script>
<script src="<?=base_url()?>assets/btable/bootstrap-editable.js"></script>
<script src="<?=base_url()?>assets/js/toastr.min.js"></script>
<script>
	$(function() {
    	console.log( "ready!" );
    	$('[data-toggle="tooltip"]').tooltip()
    	const ruta = "<?=base_url()?>";
    	const $table = $('#table');
    	const $checks = $('input[name="checks"]');

    	$('#role_id').on('change',function(){
    		var valor = $(this).val();
    		$( "input[type='checkbox']" ).prop({
				  checked: false
				});
    		if( valor == ''){
    			toastr.error('Seleccionar Rol'); 
    			$( "input[type='checkbox']" ).prop({
				  checked: false
				});
    			return; 
    		}
    		$.get(ruta+'permisos/'+valor,{},function(response){
    			$.each(response['data'],function(index,value){
    				$('#'+value['v2']).prop({
    					checked: true
    				});
    			})
    		},'json')
    	});

    	$checks.each(function(index,value){
    		$(this).on('click',function(){
    			if($('#role_id').val() === ''){
    				toastr.error('Seleccionar Rol');
    				$( this ).prop({
					  checked: false
					});
    				return;
    			}
    			var role = $('#role_id').val();
    			var modulo = $(this).val();

    			$.post(ruta + 'permisos',{rol_id:role,modulo_id:modulo},function(response){
    				if(response['hecho']){
    					toastr.success(response['mensaje']);
    				}else{
    					toastr.error(response['mensaje']);
    				}
    			},'json')

    		})
    	});

    	listar(ruta,$table);
    	
    	$table.on('editable-save.bs.table', function(field, row, $el, oldValue){
       		$.post(ruta+'updateRol/'+$el.v1,{rol:$el.v2,descripcion:$el.v3},function(response){
    			console.log(response);
    			if(!response["hecho"]){
    				toastr.error(response["mensaje"]);
    				$table.bootstrapTable('refresh', {
                   		url: ruta + 'getRoles'
                	});
    			}else{
    				toastr.success(response["mensaje"]);
    				
    			}
    		},'json');
    	});

    	$('#frm-roles').on('submit',function(e){
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
    					$table.bootstrapTable('refresh', {
                   		url: ruta + 'getRoles'
                	});
    				
    			}
    		
    			$('#frm-roles')[0].reset();
    		},'json');
    		
    		return false;
	
    	});
	});

		function listar(base_url,$table){
			$.ajax({
                url: base_url + "getRoles",
                type: 'get',
                data: {},
                dataType: 'json',
                success:function(response){
                  console.log(response);
                  $(function () {
                    var data = response['data'];
                    $table.bootstrapTable({data: data});
                    $table.bootstrapTable('hideColumn', 'v1');
                  });
                }
              });
		}


         function operateFormatter(value, row, index) {
          return [
          	'<a class="permisos" href="javascript:void(0)" title="Otorgar Permisos" style="margin-left: 10px">',
              '<i class="fa fa-lock"></i>',
            '</a>',
            

          ].join('');
        }
	

	
</script>
<body>