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

<?php Debugger::dump($this->request->data); ?>
<?php Debugger::dump($infoc); ?>
<div id="example" class="k-content">
	<div id="formulario">
		<h2>Modificar contrato supervisor</h2>
			<?php echo $this->Form->create('Contratosupervisor'); ?>
		<ul>
		<li>
			<?php echo $this->Form->input('con_idcontrato', 
				array(
					'label' => 'Contrato de construcción a supervisar:', 
					'id' => 'construccion',
					'value' => $infoc['0']['Contratosupervisor']['con_idcontrato'],
					//'value'=>$coidcon,
					'div' => array('id'=>'contraasu','class' => 'requerido'))); ?>
			<script type="text/javascript">
				var construccion= new LiveValidation( "construccion", { validMessage: " " , insertAfterWhatNode: "contraasu" } );
				construccion.add(Validate.Presence, { failureMessage: "No puedes dejar este campo en blanco" } );
			</script>
		</li>
		
		<li>
			<?php echo $this->Form->input('codigocontrato', 
				array(
					'label' => 'Código del contrato:', 
					'class' => 'k-textbox',
					'id'=>'codigo',
					//'value' => $codcon, 
					'placeholder' => 'Ej: 001-2012', 
					'div' => array('class' => 'requerido')
					)); 
			?>
			<script type="text/javascript">
		        var codigo = new LiveValidation( "codigo", { validMessage: " " } );
		        codigo.add(Validate.Presence, { failureMessage: "No puedes dejar este campo en blanco" } );
		        codigo.add(Validate.Format, { pattern: /___-____/i, failureMessage: "No puedes dejar este campo en blanco", negate: true } );
		        codigo.add(Validate.Format, { pattern: /\d\d\d-\d\d\d\d/i, failureMessage: "El código de contrato debe tener 7 números"} );
		    </script> 
		</li>
		<li>
			<?php echo $this->Form->input('nombrecontrato', 
				array(
					'label' => 'Título del contrato:', 
					'class' => 'k-textbox',
					'id'=>'nombrecontrato',
					//'value' => $nomcon, 
					'placeholder' => 'Nombre del contrato', 
					'rows'=> 2, 
					'div' => array('class' => 'requerido')
					)); 
			?>
			<script type="text/javascript">
				var nombrecontrato= new LiveValidation( "nombrecontrato", { validMessage: " " } );
				nombrecontrato.add(Validate.Presence, { failureMessage: "No puedes dejar este campo en blanco" } );
			</script>
		</li>
		<li>
			<?php echo $this->Form->input('montooriginal', 
				array(
					'label' => 'Monto: ($)',
					'class' => 'k-textbox',  
					'id' => 'txmonto',
					//'value' => $moncon,
					'type' => 'text',
					'placeholder' => 'Monto del contrato',
					'div' => array('id'=>'montocont','class' => 'requerido')
					)); 
			?>
			<script type="text/javascript">
				var txmonto = new LiveValidation( "txmonto", { validMessage: " " , insertAfterWhatNode: "montocont"} );
		        txmonto.add(Validate.Presence, { failureMessage: "No puedes dejar este campo en blanco" } );
		    </script>
		</li>
		
		<li>
			<?php echo $this->Form->input('fechainiciocontrato', 
				array(
					'label' => 'Fecha inicio de vigencia:', 
					'id'	=> 'datePicker1',
					'value' => date('d/m/Y',strtotime($this->request->data['Contratosupervisor']['fechainiciocontrato'])),
					'div' => array('id'=>'fchaini','class' => 'requerido'),
					'type'  => 'Text'
					));
				?>
				<script type="text/javascript">
				            var datePicker1 = new LiveValidation( "datePicker1", { validMessage: " " , insertAfterWhatNode: "fchaini"} );
				            datePicker1.add(Validate.Presence, { failureMessage: "No puedes dejar este campo en blanco" } );
				            datePicker1.add(Validate.Format, { pattern: /\d\d\/\d\d\/\d\d\d\d/, failureMessage: "La Fecha debe contener un formato un formato DD/MM/AAAA"  } );
				            datePicker1.add(Validate.Length,{is:10, wrongLengthMessage:"Longitud debe ser de 10 caracteres. Formato DD/MM/AAAA"});
				</script> 
		</li>
		<li>
			<?php echo $this->Form->input('fechafincontrato', 
				array(
					'label' => 'Fecha fin de vigencia:', 
					'id'	=> 'datePicker2',
					//'value' => date('d/m/Y',strtotime($fincon)),
					'value' => date('d/m/Y',strtotime($this->request->data['Contratosupervisor']['fechafincontrato'])),
					'div' => array('id'=>'fchafin','class' => 'requerido'),
					'type'  => 'Text'
					)); 
				?>
				<script type="text/javascript">
				    var datePicker2 = new LiveValidation( "datePicker2", { validMessage: " " , insertAfterWhatNode: "fchafin"} );
				    datePicker2.add(Validate.Presence, { failureMessage: "No puedes dejar este campo en blanco" } );
				    datePicker2.add(Validate.Format, { pattern: /\d\d\/\d\d\/\d\d\d\d/, failureMessage: "La Fecha debe contener un formato un formato DD/MM/AAAA"  } );
				   	datePicker2.add(Validate.Length,{is:10, wrongLengthMessage:"Longitud debe ser de 10 caracteres. Formato DD/MM/AAAA"});
				</script>
		</li>
		<li>
			<?php echo $this->Form->input('plazoejecucion', 
				array(
					'label' => 'Plazo de ejecución:',
					'class' => 'k-textbox',  
					'id' => 'txplazo',
					//'value' => $placon,
					'type'  => 'Text', 
					'placeholder' => 'Cantidad de días', 
					'div' => array('class' => 'requerido')
				));
				?>
			<script type="text/javascript">
				var txplazo= new LiveValidation( "txplazo", { validMessage: " " } );
				txplazo.add(Validate.Presence, { failureMessage: "No puedes dejar este campo en blanco" } );
				txplazo.add( Validate.Numericality,{ onlyInteger: true,
				   								   	notAnIntegerMessage: "Debe ser un número entero",
					            				 	notANumberMessage:"Debe ser un número"} );
				txplazo.add(Validate.Length, {minimum: 2, maximum: 3, 
			           							 tooShortMessage:"Longitud mínima de 2 dígitos",
			           							 tooLongMessage:"Longitud máxima de 3 dígitos"});
			</script>
		</li>
		<li>
			<?php echo $this->Form->input('cantidadinformes', 
				array(
					'label' => 'Cantidad informes:',
					'class' => 'k-textbox',  
					'id' => 'txcanti',
					//'value'=>$caicon,
					'type' => 'text',
					'placeholder' => 'Cantidad ej: 3',
					'div' => array('class' => 'requerido'))); ?>
			<script type="text/javascript">
				var txcanti= new LiveValidation( "txcanti", { validMessage: " " } );
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
			<?php echo $this->Form->input('detalleobras', 
				array(
					'label' => 'Obras a desarrollar:', 
					'class' => 'k-textbox',
					//'value' => $obrcon,
					'rows' => 4, 
					'placeholder' => 'Descripción de obras'
					));
				?>
		</li>
		<li>
			<?php echo $this->Form->input('empresas', 
				array(
					'label' => 'Empresa ejecutora:', 
					'id' => 'empresas',
					'class' => 'k-combobox',
					'value' => $infoc['0']['Empresa']['nombreempresa'],
					//'value' => $idecon,
					'div' => array('id'=>'empsup','class' => 'requerido')
					));
				?>
			<script type="text/javascript">
				var empresas = new LiveValidation( "empresas", { validMessage: " " , insertAfterWhatNode: "empsup"} );
		        empresas.add(Validate.Presence, { failureMessage: "No puedes dejar este campo en blanco" } );
		    </script>
		</li>
		<li>
			<?php echo $this->Form->input('admin', 
				array(
					'label' => 'Administrador del contrato:', 
					'id' => 'admin',
					'class' => 'k-combobox',
					//'value' => $infoc['0']['Contratosupervisor']['idpersona'],
					//'value' => $idpcon,
					'div' => array('id'=>'admcon','class' => 'requerido')
					)); 
				?>
			<script type="text/javascript">
				var admin = new LiveValidation( "admin", { validMessage: " " , insertAfterWhatNode: "admcon"} );
		        admin.add(Validate.Presence, { failureMessage: "No puedes dejar este campo en blanco" } );
		    </script>
		    
		</li>
		<li  class="accept">
			<table>
				<tr>
					<td>
						<?php echo $this->Form->end(array('label' => 'Modificar contrato', 'class' => 'k-button')); ?>
					</td>
					<td>
						<?php echo $this->Html->link('Regresar', 
							array('controller' => 'Mains','action' => 'index'),
							array('class'=>'k-button')); ?>
					</td>
				</tr>
			</table>
		</li>
	</div>
</div>

	<style scoped>

                .k-textbox {
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
				}
					
				.LV_invalid {
				    color:#CC0000;
					clear:both;
               		display:inline-block;
               		margin-left: 155px; 
               
				}

            </style>

<script>
    $(document).ready(function() {
        var validator = $("#formulario").kendoValidator().data("kendoValidator"),
        status = $(".status");

        $("button").click(function() {
            if (validator.validate()) {
                //status.text("Hooray! Your tickets has been booked!").addClass("valid");
                } else {
                //status.text("Oops! There is invalid data in the form.").addClass("invalid");
            }
        });
    
    

	$("#txmonto").kendoNumericTextBox({
	     min: 0,
	     max: 999999999.99,
	     format: "c2",
	     decimals: 2,
	     spinners: false
	 });

	$("#txanticipo").kendoNumericTextBox({
	     min: 0,
	     max: 999999999.99,
	     format: "c2",
	     decimals: 2,
	     spinners: false
	 });
	 
    $("#empresas").kendoDropDownList({
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
        var empresas = $("#empresas").data("kendoDropDownList");
    
    $("#admin").kendoDropDownList({
			optionLabel: "Seleccione administrador",
			dataTextField: "nomcompleto",
            dataValueField: "idpersona",
            <?php if( isset($this->request->data['Persona']['idpersona']))
						 {echo "value: " . $this->request->data['Persona']['idpersona'] . ",";}
			?>
            dataSource: {
                            type: "json",
                            transport: {
                                read: "/Contratoconstructors/adminjson.json"
                            }
                        }
        });
        var admin = $("#admin").data("kendoDropDownList");
	
	
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
	
	$("#codigo").mask("999-9999");
	
	var construccion = $("#construccion").kendoDropDownList({
        autoBind: false,
        cascadeFrom: "proyectos",
        optionLabel: "Seleccione contrato",
        dataTextField: "codigocontrato",
        dataValueField: "idcontrato",
        <?php if( isset($this->request->data['Contratosupervisor']['con_idcontrato']))
						 {echo "value: " . $this->request->data['Contratosupervisor']['con_idcontrato'] . ",";}
		?>
        dataSource: {
            type: "json",
            transport: {
                read: "/Contratosupervisors/conidcontratojson.json"
            }
        }
    }).data("kendoDropDownList");
  	});  
</script>