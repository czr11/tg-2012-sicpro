<!-- File: /app/View/Contratosupervisors/add.ctp -->

<?php $this->start('menu');
	switch ($this->Session->read('User.idrol')) {
		case 9:
	        echo $this->element('menu/menu_all');
	        break;
	    case 8:
	        echo $this->element('menu/menu_observer');
	        break;
	    case 7:
	        echo $this->element('menu/menu_jefeplan');
	        break;
		case 6:
	        echo $this->element('menu/menu_tecproy');
	        break;
	    case 5:
	        echo $this->element('menu/menu_tecplan');
	        break;
	    case 4:
	        echo $this->element('menu/menu_adminsys');
	        break;
		case 3:
	        echo $this->element('menu/menu_admincon');
	        break;
	    case 2:
	        echo $this->element('menu/menu_adminproy');
	        break;
	    case 1:
	        echo $this->element('menu/menu_director');
	        break;			
	}
$this->end(); ?>

<?php $this->start('breadcrumb'); ?>
	
	<div id="menuderastros">
		<div id="rastros">
			
			<?php
			echo $this->Html->image("home.png", array(
	    		"alt" => "Inicio",
	    		'url' => array('controller' => 'mains'),
				'width' => '30px',
				'class' => 'homeimg'
			));
			?> Contrato supervisor » Registrar contrato supervisor
			
		</div>
	</div>
<?php $this->end(); ?>

<div id="example" class="k-content">
	<div id="formulario">
		<h2>Registrar contrato supervisor</h2>
		<?php echo $this->Form->create('Contratosupervisor'); ?>
		<ul>
			<li>
				<?php echo $this->Form->input('proyectos', 
					array(
						'label' => 'Seleccione proyecto:', 
						'id' => 'proyectos',
						'div' => array('id'=>'proyo','class' => 'requerido'))); ?>
				<script type="text/javascript">
					var proyectos= new LiveValidation( "proyectos", { validMessage: " ", insertAfterWhatNode: "proyo" } );
					proyectos.add(Validate.Presence, { failureMessage: "No puedes dejar este campo en blanco" } );
				</script>
			</li>
			<li>
				<?php echo $this->Form->input('contratos', 
					array(
						'label' => 'Contrato a supervisar:', 
						'id' => 'contratos',
						'div' => array('id'=>'contrasup','class' => 'requerido'))); ?>
				<script type="text/javascript">
					var contratos= new LiveValidation( "contratos", { validMessage: " " , insertAfterWhatNode: "contrasup"} );
					contratos.add(Validate.Presence, { failureMessage: "No puedes dejar este campo en blanco" } );
				</script>
			</li>
			<div id=infoproy><!--- Aqui se carga el nombre del proyecto seleccionado-->	</div>
			<div id=infoconstructor><!--- Aqui se muestran datos sobre el contratoconstructor seleccionado --></div>
			
			<li>
				<?php echo $this->Form->input('codigocontrato', 
					array(
						'label' => 'Código del contrato:', 
						'class' => 'k-textbox',
						'id' => 'codigo',
						'div' => array('class' => 'requerido'), 
						'placeholder' => 'Ej: 001-2012')); ?>
				<script type="text/javascript">
		            var codigo = new LiveValidation( "codigo", { validMessage: " " } );
		            codigo.add(Validate.Presence, { failureMessage: "No puedes dejar este campo en blanco" } );
		            codigo.add(Validate.Format, { pattern: /___-____/i, failureMessage: "No puedes dejar este campo en blanco", negate: true } );
		            codigo.add(Validate.Format, { pattern: /\d\d\d-\d\d\d\d/i, failureMessage: "El código de contrato debe tener 7 números"} );
		        </script> 
		        <?php if ($this->Form->isFieldError('Contrato.codigocontrato')) {
 	 					echo $this->Form->error('Contrato.codigocontrato'); } ?>
			</li>
			<li>
				<?php echo $this->Form->input('nombrecontrato', 
					array(
						'label' => 'Título del contrato:', 
						'class' => 'k-textbox', 
						'placeholder' => 'Nombre del contrato',
						'id'=>'nombrecontrato',
						'rows' => 2,
						'cols' => 45,
						'div' => array('class' => 'requerido'))); ?>
				<script type="text/javascript">
					var nombrecontrato= new LiveValidation( "nombrecontrato", { validMessage: " " } );
					nombrecontrato.add(Validate.Presence, { failureMessage: "No puedes dejar este campo en blanco" } );
				</script>
			</li>
			<li>
				<?php echo $this->Form->input('montocon', 
					array(
						'label' => 'Monto: ($)',
						'class' => 'k-textbox',  
						'id' => 'txmonto',
						'type' => 'text',
						'placeholder' => 'Ingrese Monto',
						'div' => array('id'=>'montot','class' => 'requerido'))); ?>
				<script type="text/javascript">
					var txmonto = new LiveValidation( "txmonto", { validMessage: " " , insertAfterWhatNode: "montot"  } );
		            txmonto.add(Validate.Presence, { failureMessage: "No puedes dejar este campo en blanco" } );
		        </script>
		    <?php if ($this->Form->isFieldError('Contrato.montooriginal')) {
 	 					echo $this->Form->error('Contrato.montooriginal'); } ?>
			</li>
			<li>
				<?php echo $this->Form->input('fechainicontrato', 
					array(
						'label' => 'Fecha de inicio de contrato:', 
						'id'	=> 'datePicker1',
						'div' => array('id'=>'fchaini','class' => 'requerido'),
						'type'  => 'Text')); ?>
				<script type="text/javascript">
		            var datePicker1 = new LiveValidation( "datePicker1", { validMessage: " " , insertAfterWhatNode: "fchaini"} );
		            datePicker1.add(Validate.Presence, { failureMessage: "No puedes dejar este campo en blanco" } );
		            datePicker1.add(Validate.Format, { pattern: /\d\d\/\d\d\/\d\d\d\d/, failureMessage: "La Fecha debe contener un formato un formato DD/MM/AAAA"  } );
		            datePicker1.add(Validate.Length,{is:10, wrongLengthMessage:"Longitud debe ser de 10 caracteres. Formato DD/MM/AAAA"});
		        </script>
		        <?php if ($this->Form->isFieldError('Contrato.fechainiciocontrato')) {
 	 					echo $this->Form->error('Contrato.fechainiciocontrato'); } ?> 
			</li>
			<li>
				<?php echo $this->Form->input('fechafincontrato', 
					array(
						'label' => 'Fecha de fin de contrato:', 
						'id'	=> 'datePicker2',
						'div' => array('id'=>'fchafin','class' => 'requerido'),
						'type'  => 'Text')); ?>
				<script type="text/javascript">
		            var datePicker2 = new LiveValidation( "datePicker2", { validMessage: " " , insertAfterWhatNode: "fchafin"} );
		            datePicker2.add(Validate.Presence, { failureMessage: "No puedes dejar este campo en blanco" } );
		            datePicker2.add(Validate.Format, { pattern: /\d\d\/\d\d\/\d\d\d\d/, failureMessage: "La Fecha debe contener un formato un formato DD/MM/AAAA"  } );
		        	datePicker2.add(Validate.Length,{is:10, wrongLengthMessage:"Longitud debe ser de 10 caracteres. Formato DD/MM/AAAA"});
		        </script>
		        <?php if ($this->Form->isFieldError('Contrato.fechafincontrato')) {
 	 					echo $this->Form->error('Contrato.fechafincontrato'); } ?> 
			</li>
			<li>
				<?php echo $this->Form->input('plazoejecucion', 
					array(
						'label' => 'Plazo de ejecución:', 
						'class' => 'k-textbox',
						'id' => 'txplazo',
						'type'  => 'Text', 
						'maxlength' => '4', 
						'placeholder' => 'Cantidad de días', 
						'div' => array('id'=>'plaej','class' => 'requerido'))); ?>
				<script type="text/javascript">
					var txplazo= new LiveValidation( "txplazo", { validMessage: " " , insertAfterWhatNode: "plaej"  } );
					txplazo.add(Validate.Presence, { failureMessage: "No puedes dejar este campo en blanco" } );
					txplazo.add( Validate.Numericality,{ onlyInteger: true,
					   								   	notAnIntegerMessage: "Debe ser un número entero",
						            				 	notANumberMessage:"Debe ser un número"} );
					txplazo.add(Validate.Length, {minimum: 2, maximum: 4, 
				           							 tooShortMessage:"Longitud mínima de 2 dígitos",
				           							 tooLongMessage:"Longitud máxima de 3 dígitos"});
				</script>
			</li>
			<li>
				<?php echo $this->Form->input('cantinf', 
					array(
						'label' => 'Cantidad informes:',
						'class' => 'k-textbox',  
						'id' => 'txcanti',
						'type' => 'text',
						'maxlength' => '2', 
						'placeholder' => 'Cantidad ej: 3',
						'div' => array('id'=>'caninfo','class' => 'requerido'))); ?>
				<script type="text/javascript">
					var txcanti= new LiveValidation( "txcanti", { validMessage: " " , insertAfterWhatNode: "caninfo"  } );
					txcanti.add(Validate.Presence, { failureMessage: "No puedes dejar este campo en blanco" } );
					txcanti.add( Validate.Numericality,{ onlyInteger: true,
					   								   	notAnIntegerMessage: "Debe ser un número entero",
						            				 	notANumberMessage:"Debe ser un número"} );
					txcanti.add(Validate.Length, {minimum: 1, maximum: 2, 
				           							 tooShortMessage:"Longitud mínima de 1 dígitos",
				           							 tooLongMessage:"Longitud máxima de 2 dígitos"});
				</script>
			</li>
			<li>
				<?php echo $this->Form->input('obras', 
					array(
						'label' => 'Obras a desarrollar:', 
						'class' => 'k-textbox', 
						'rows' => 4, 
						'placeholder' => 'Descripción de obras')); ?>
			</li>
			<li>
				<?php echo $this->Form->input('empresas', 
					array(
						'label' => 'Empresa ejecutora:', 
						'id' => 'empresas',
						'class' => 'k-combobox',
						'div' => array('id'=>'empeje','class' => 'requerido'))); ?>
				<script type="text/javascript">
					var empresas = new LiveValidation( "empresas", { validMessage: " " , insertAfterWhatNode: "empeje"} );
		            empresas.add(Validate.Presence, { failureMessage: "No puedes dejar este campo en blanco" } );
		        </script>
		         <div id="errorempresa" class="LV_validation_message LV_invalid"></div>
			</li>
			<li>
				<?php echo $this->Form->input('admin', 
					array(
						'label' => 'Administrador del contrato:', 
						'id' => 'admin',
						'class' => 'k-combobox',
						'div' => array('id'=>'admco','class' => 'requerido'))); ?>
				<script type="text/javascript">
					var admin = new LiveValidation( "admin", { validMessage: " " , insertAfterWhatNode: "admco"} );
		            admin.add(Validate.Presence, { failureMessage: "No puedes dejar este campo en blanco" } );
		        </script>
			</li>
			<li  class="accept">
				<table>
					<tr>
						<td>
							<?php echo $this->Form->end(array('label' => 'Registrar', 'class' => 'k-button')); ?>
						</td>
						<td>	
							<?php echo $this->Html->link('Regresar', 
									array('controller' => 'Contratosupervisors','action' => 'contratosupervisor_listar'),
									array('class'=>'k-button')); ?>
						</td>
					</tr>
				</table>
			</li>
				<?php echo $this->ajax->observeField( 'proyectos',array(
			        		'url' => array( 'action' => 'update_nomproyecto'),
			        		'update' => 'infoproy'));  
					?>
				
				<?php echo $this->ajax->observeField( 'contratos',array(
			        		'url' => array( 'action' => 'update_infoconstructor'),
			        		'update' => 'infoconstructor'));  
					?>
            <li class="status">
            </li>
		</ul>
	</div>
</div>

	<style scoped>

                .k-textbox, .k-kendobox{
                    width: 300px;
                    
                    
                }
				
				.k-textbox:focus{background-color: rgba(255,255,255,.8);}
				
				.k-combobox {
                    width: 300px;
                }
                
                form .requerido label:after {
					font-size: 1.4em;
					color: #e32;
					content: '*';
					display:inline;
					}
                
                #formulario {
                    width: 600px;
                    /*height: 323px;*/
                    margin: 15px 0;
                    padding: 10px 20px 20px 0px;
                    /*background: url('../../content/web/validator/ticketsOnline.png') transparent no-repeat 0 0;*/
                }

                #formulario h3 {
                    font-weight: normal;
                    font-size: 1.4em;
                    border-bottom: 1px solid #ccc;
                }

                #formulario ul {
                    list-style-type: none;
                    margin: 0;
                    padding: 0;
                }
                #formulario li {
                    margin: 10px 0 0 0;
                }

                label {
                    display: inline-block;
                    width: 150px;
                    text-align: right;
                    margin-right: 5px;
                }

                .accept, .status {
                	padding-top: 15px;
                    padding-left: 150px;
                }

                .valid {
                    color: green;
                }

                .invalid {
                    color: red;
                }
                span.k-tooltip {
                    margin-left: 6px;
                }
                
                .LV_validation_message{
				    margin:0 0 0 5px;
				}
				
				.LV_valid {
				    color:#00CC00;
				    display:none;
				}
					
				.LV_invalid {
				    color:#CC0000;
					clear:both;
               		display:inline-block;
               		margin-left: 155px; 
               
				}
				
				#errorempresa{
					display: none;
				}
				   
</style>
			
			<script>
                $(document).ready(function() {
                    var validator = $("#formulario").kendoValidator().data("kendoValidator"),
                    status = $(".status");

 				$("#ContratosupervisorContratosupervisorRegistrarForm").submit(function() {
								if(empresas.dataItem()){
									$('#errorempresa').hide();
									return true;
								}
								else {
									$('#errorempresa').show().text('No Existe la empresa');
									return false;
								}								
                    });
                
				$("#txmonto").kendoNumericTextBox({
				     min: 0,
				     max: 999999999.99,
				     format: "c2",
				     decimals: 2,
				     spinners: false
				 });
				 
				 $("#txplazo").kendoNumericTextBox({
				     min: 0,
				     max: 9999,
				     format: "{0:n0}",
				     decimals: 0,
				     placeholder: "Ej. 60",
				     spinners: false
				 });
	
	 $("#txcanti").kendoNumericTextBox({
				     min: 0,
				     max: 99,
				     format: "{0:n0}",
				     decimals: 0,
				     placeholder: "Ej. 60",
				     spinners: false
				 });
				
				$("#selectproy").kendoComboBox({
					index: 0,
			        suggest: true,
			        filter: 'none'
				});
				
				$("#proyectos").kendoDropDownList({
            			optionLabel: "Seleccione proyecto",
			            dataTextField: "numeroproyecto",
			            dataValueField: "idproyecto",
			            dataSource: {
			                            type: "json",
			                            transport: {
			                                read: "/Contratosupervisors/proyectojson.json"
			                            }
			                        }
			        });
			        var proyectos = $("#proyectos").data("kendoDropDownList");
			        
			    var contratos = $("#contratos").kendoDropDownList({
			                        autoBind: false,
			                        cascadeFrom: "proyectos",
			                        optionLabel: "Seleccione contrato",
			                        dataTextField: "codigocontrato",
			                        dataValueField: "idcontrato",
			                        dataSource: {
			                            type: "json",
			                            transport: {
			                                read: "/Contratosupervisors/contratojson.json"
			                            }
			                        }
			                    }).data("kendoDropDownList");
			        
			    $("#empresas").kendoComboBox({
            			optionLabel: "Seleccione empresa",
			            dataTextField: "nombreempresa",
			            dataValueField: "idempresa",
			            dataSource: {
			                            type: "json",
			                            transport: {
			                                read: "/Contratoconstructors/empresajson.json"
			                            }
			                        }
			        });
			        var empresas = $("#empresas").data("kendoComboBox");
			    
			    $("#admin").kendoDropDownList({
            			optionLabel: "Seleccione administrador",
			            dataTextField: "nomcompleto",
			            dataValueField: "idpersona",
			            dataSource: {
			                            type: "json",
			                            transport: {
			                                read: "/Contratosupervisors/adminjson.json"
			                            }
			                        }
			        });
			        var admin = $("#admin").data("kendoDropDownList");
				
				$("#codigo").mask("999-9999");
				
						
		
	function filtrarDrop() {
		var startDate = start.value();
		var endDate = end.value();
			//alert('dafuq');
			/*proy.data("kendoDropDownList").dataSource.filter([
				     { field: "creacion", operator: "gte", value: startDate },
				     { field: "creacion", operator: "lte", value: endDate }
				]);
			*/
			
			//proy.data("kendoDropDownList").dataSource.filter({ field: "idproyecto", operator: "eq", value: 5});
	}
		
	
	function startChange() {
		var startDate = start.value();
		if (startDate) {
            startDate = new Date(startDate);
            startDate.setDate(startDate.getDate() + 1);
            end.min(startDate);
    	}
    }
	
	function endChange() {
		var endDate = end.value();
	    if (endDate) {
	        endDate = new Date(endDate);
	        endDate.setDate(endDate.getDate() - 1);
	        start.max(endDate);
	    }
	}

    var start = $("#datePicker1").kendoDatePicker({
        culture: "es-ES",
	   	format: "dd/MM/yyyy",
        change: startChange,
        close: filtrarDrop
    }).data("kendoDatePicker");
	
    var end = $("#datePicker2").kendoDatePicker({
        culture: "es-ES",
	   	format: "dd/MM/yyyy",
        change: endChange,
        close: filtrarDrop
    }).data("kendoDatePicker");
	
    start.max(end.value());
    end.min(start.value());
				
				
				});
                
            </script>