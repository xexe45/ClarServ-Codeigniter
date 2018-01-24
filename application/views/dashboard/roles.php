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
          	'<a class="permisos" href="javascript:void(0)" data-toggle="tooltip" title="Otorgar Permisos" style="margin-left: 10px">',
              '<i class="fa fa-lock"></i>',
            '</a>',
            

          ].join('');
        }
	

	
</script>
<body>