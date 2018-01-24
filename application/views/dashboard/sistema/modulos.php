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
							    				<img src="<?=base_url()?>assets/imagenes/sistem.png" class="img-responsive" alt="">
							    			</div>
							    			<div class="col-md-8">
							    				<p class="text-justify">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quia accusamus impedit consequatur error quos nobis optio laborum vitae voluptatum minima illum facere quae sit illo, autem quas. Numquam, saepe, architecto!</p>
							    			</div>
							    		</div>
							    	</div>
							    	
							    </div>
							    <div role="tabpanel" class="tab-pane fade" id="profile">
							    	<br>
							    	<?=form_open('modulos',array("id" =>"frm-modulos"))?>
									  <div class="form-group">
									    <label for="modulo">Módulo *</label>
									    <select name="modulo" id="modulo" class="form-control" required></select>
									   
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
		                                  <th data-field="v2" data-formatter="formatData">MÓDULO</th>
		                                  <th data-field="v3">Fecha de Registro</th>
		                                  
		                                 
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
<script src="<?=base_url()?>assets/js/toastr.min.js"></script>
<script>
	$(function() {

    	console.log( "ready!" );
    	$('[data-toggle="tooltip"]').tooltip();

    	const ruta = "<?=base_url()?>";
    	const $table = $('#table');

    	listar(ruta,$table);

    	combos(ruta);
    	
    	$('#frm-modulos').on('submit',function(e){
    		e.preventDefault();

    		let data = $(this).serialize();
    		let metodo = $(this).attr('method');
    		let action = $(this).attr('action');


    		$.post(action,data,(response)=>{
    			console.log(response);
    			if(!response["hecho"]){
    				toastr.error(response["mensaje"]);
    			}else{
    				let modulo = response["modulo"];
    				toastr.success(response["mensaje"]);
    				combos(ruta);
    				$table.bootstrapTable('refresh', {
                   		url: ruta + 'getModulos'
                	});

    				$.get(ruta+modulo+"/myFunctions",{},(r)=>{

    					if(!r){
    						return;
    					}

    					if (r["valido"]) {
    						toastr.success("Métodos asignados al módulo correctamente");
    					}else{
    						toastr.error("Métodos no fueron asignados a la clase");
    					}
    				},'json');
    			}
    		
    			$('#frm-modulos')[0].reset();

    		},'json');
    		
    		return false;
	
    	});
	});

		function listar(base_url,$table){
			$.ajax({
                url: base_url + "getModulos",
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

        function combos(ruta){
        	//Combo Módulos
    		$.get(ruta+"modulos",(response)=>{
    			let combo = [];
    			let texto = "Controller";
    			let options = "<option value=''>Seleccionar Módulo</option>";
    			//console.log(response['data']);
    			for(let i=0; i<response['data'].length; i++){
    				let res = response['data'][i].split("Controller");
    				combo.push(res[0]);
    		
    			}

    			for(let i=0; i<combo.length; i++){
    				options+="<option value='"+combo[i]+texto+"'>"+combo[i]+"</option>";
    			}

    			$('#modulo').html(options);

    		},'json')
        }

        function formatData(value){
        	let res = value.split("Controller");
        	return res[0];
        }
	
</script>
<body>