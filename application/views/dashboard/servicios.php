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
							    				<img src="<?=base_url()?>assets/imagenes/claro_hogar.jpg" class="img-responsive" alt="">
							    			</div>
							    			<div class="col-md-8">
							    				<p class="text-justify">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quia accusamus impedit consequatur error quos nobis optio laborum vitae voluptatum minima illum facere quae sit illo, autem quas. Numquam, saepe, architecto!</p>
							    			</div>
							    		</div>
							    	</div>
							    	
							    </div>
							    <div role="tabpanel" class="tab-pane fade" id="profile">
							    	<br>
							    	<?=form_open('servicios',array("id" =>"frm-servicios"))?>
									  <div class="form-group">
									    <label for="plan">Nombre de Plan *</label>
									    <input type="text" class="form-control" id="plan" placeholder="Plan" name="plan" required>
									  </div>
									  <div class="form-group">
									    <label for="descripcion">Descripción de Plan a ofrecer *</label>
									    <textarea name="descripcion" required id="descripcion" class="form-control" rows="5"></textarea>
									  </div>
									  <div class="form-group">
									    <label for="precio_promo">Precio de Costo Primer Mes *</label>
									    <input type="text" class="form-control" id="precio_promo" placeholder="Costo Promoción" name="precio_promo" required>
									  </div>
									  <div class="form-group">
									    <label for="precio_normal">Precio de Costo Normal *</label>
									    <input type="text" class="form-control" id="precio_normal" placeholder="Costo Normal" name="precio_normal" required>
									  </div>
									  <button type="submit" class="btn btn-primary"><i class="fa fa-floppy-o" aria-hidden="true"></i> Registrar</button>
									  <button type="reset" class="btn btn-default">Cancelar</button>
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
		                                  <th data-field="v2">PLAN</th>
		                                  <th data-field="v3">DESCRIPCIÓN DETALLADA</th>
		                                  <th data-field="v4">PRECIO PRIMER MES</th>
		                                  <th data-field="v5">PRECIO NORMAL</th>
		                                  <th data-field="v6">ESTADO</th>
		                                  <th data-field="v7">FECHA DE REGISTRO</th>
		                                  <th data-field="v8">ÚLTIMA ACTUALIZACIÓN</th>
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
<div class="modal fade" id="myModal_S" tabindex="-1" role="dialog" aria-labelledby="myModalLabel_S">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel_S">Editar Plan</h4>
      </div>
      <?=form_open('editar-plan',array("id" => "frm-editar-plan"))?>
      <div class="modal-body">
      	<input type="hidden" id="id_p" name="id_p">
		<div class="form-group">
			<label for="plan_e">Nombre de Plan *</label>
			<input type="text" class="form-control" id="plan_e" name="plan_e" required>
		</div>
		<div class="form-group">
			<label for="descripcion_e">Descripción de Plan a ofrecer *</label>
			<textarea name="descripcion_e" required id="descripcion_e" class="form-control" rows="5"></textarea>
		</div>
		<div class="form-group">
			<label for="precio_promo_e">Precio de Costo Primer Mes *</label>
			<input type="text" class="form-control" id="precio_promo_e" name="precio_promo_e" required>
		</div>
		<div class="form-group">
			<label for="precio_normal_e">Precio de Costo Normal *</label>
			<input type="text" class="form-control" id="precio_normal_e" name="precio_normal_e" required>
		</div>
		<div class="form-group">
			<label for="estado_e">Estado *</label>
			<select name="estado_e" id="estado_e" class="form-control">
				<option value="A">ACTIVO</option>
				<option value="D">DE BAJA</option>
			</select>
			
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
<script src="<?=base_url()?>assets/js/toastr.min.js"></script>
<script>
	$(function() {
    	console.log( "ready!" );
    	$('[data-toggle="tooltip"]').tooltip()
    	const ruta = "<?=base_url()?>";
    	const $table = $('#table');

    	listar(ruta,$table);
    	

    	$('#frm-servicios').on('submit',function(e){
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
                   		url: ruta + 'getPlanes'
                	});
    			}
    		
    			$('#frm-servicios')[0].reset();
    		},'json');
    		
    		return false;
    	});

    	$('#frm-editar-plan').on('submit',function(e){
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
                   			url: ruta + 'getPlanes'
                		});
    			}

    			$('#id_p').val("");
    			$('#frm-editar-plan')[0].reset();
    			$('#myModal_S').modal('hide');
    			
    		},'json');
    		
    		return false;
	
    	});

	});

		function listar(base_url,$table){
			$.ajax({
                url: base_url + "getPlanes",
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
          	'<a class="edit" href="javascript:void(0)" data-toggle="tooltip" title="Editar" style="margin-left: 10px">',
              '<button type="button" class="btn btn-success"><i class="fa fa-pencil-square-o"></i></button>',
            '</a>',
            
          ].join('');
        }

         window.operateEvents = {
            'click .edit': function (e, value, row, index) {
              console.log(row);
              $('#id_p').val(row['v1']);
              $('#plan_e').val(row['v2']);
              $('#descripcion_e').val(row['v3']);
              $('#precio_promo_e').val(row['v4']);
              $('#precio_normal_e').val(row['v5']);
              $('#estado_e').val(row['v6']);
              	$('#myModal_S').modal({
				  keyboard: false,
				  backdrop: 'static'
				})
            },
        };
	
</script>
<body>