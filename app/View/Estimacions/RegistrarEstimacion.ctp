<!-- File: /app/View/Estimacions/RegistrarEstimacion.ctp -->
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
			?> » Bienvenido a SICPRO
			
		</div>
	</div>
	
<?php $this->end(); ?>
<div id="example" class="k-content">
	<div id="formulario">
		<h2>Registrar Estimación de Avance</h2>
		
		<?php echo $this->Form->create('Estimacion'); ?>
		<ul>
			<li>
				<?php echo $this->Form->input('proyectos',
					array(
						'label' => 'Proyectos:', 
						'id' => 'proyectos'
					)); ?>
			</li>
				<li>
				<?php echo $this->Form->input('idcontrato',
					array(
						'label' => 'Contratos:', 
						'id' => 'contratos'
					)); ?>
			</li>
			<li>
				<?php echo $this->Form->input('tituloestimacion', 
					array(
						'label' => 'Título Estimación: ', 
						'class' => 'k-textbox', 
						'placeholder' => 'Título Estimación',
						'required', 
						'validationMessage' => 'Ingrese el Título de la Esimación')); ?>
			</li>
			<li>
				<?php echo $this->Form->input('fechainicioestimacion', 
					array(
						'label' => 'Inicio Estimación:', 
						'id'	=> 'datePicker1',
						'type'  => 'Text'
						 ) ); ?>
			</li>
			<li>
				<?php echo $this->Form->input('fechafinestimacion', 
					array(
						'label' => 'Fin Estimación:', 
						'id'	=> 'datePicker2',
						'type'  => 'Text'
						 ) ); ?>
			</li>
			<li>
				<?php echo $this->Form->input('montoestimado', 
					array(
						'label' => 'Monto Estimado:',
						'id'    => 'moneda',
						'placeholder' => 'Monto Estimado', 
						'validationMessage' => 'Ingrese el Monto Estimado')); ?>
		    </li>
		    <li>
				<?php echo $this->Form->input('porcentajeestimadoavance', 
					array(
						'label' => 'Porcentaje Estimación: ', 
						'class' => 'k-textbox', 
						'type' => 'text',
						'placeholder' => 'Porcentaje Estimado',
						'required', 
						'validationMessage' => 'Ingrese el Porcentaje Esimado')); ?>
			</li>
			<li>
				<?php echo $this->Form->input('fechaestimacion', 
					array(
						'label' => 'Fecha Estimación:', 
						'id'	=> 'datePicker3',
						'type'  => 'Text'
						 ) ); ?>
			</li>
			<div id='prueba'>
				
			</div>
			<li  class="accept">
				<?php echo $this->Form->input('userc', array('type' => 'hidden', 'value'=> $this->Session->read('User.username') )); ?>
				
				
<table border="0">
<tr>
<td><?php echo $this->Form->end(array('label' => 'Registrar Estimación', 'class' => 'k-button')); ?></td>

</tr>
</table>
				<?php $options = array('url' => 'update_selectContrato1','update' => 'select2');
				echo $this->ajax->observeField('select1',$options);?>
				
			</li>
				
			 <li class="status">
            </li>
            
		</ul>

	</div>
</div>

            <style scoped>

                .k-textbox {
                    width: 300px;
                    margin-left: 5px;
                    
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
                    
                }

                .required {
                    font-weight: bold;
                }

                .accept, .status {
                	padding-top: 15px;
                    padding-left: 150px;
                }

                .valid {
                    color: green;
                }

                .invalid {
                    color: gray;
                }
                span.k-tooltip {
                    margin-left: 6px;
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


		$("#datePicker1").kendoDatePicker({
		   culture: "es-ES",
		   format: "dd/MM/yyyy"  //Define el formato de fecha
		});
		$("#datePicker2").kendoDatePicker({
		   culture: "es-ES",
		   format: "dd/MM/yyyy" //Define el formato de fecha
		});
		$("#datePicker3").kendoDatePicker({
		   culture: "es-ES",
		   format: "dd/MM/yyyy" //Define el formato de fecha
		});
         $("#moneda").kendoNumericTextBox({
		     format: "c2", //Define currency type and 2 digits precision
		     spinners: false
		 });
		 
		$("#proyectos").kendoDropDownList({
		            			optionLabel: "Seleccione proyecto...",
					            dataTextField: "numeroproyecto",
					            dataValueField: "idproyecto",
					            dataSource: {
					                            type: "json",
					                            transport: {
					                                read: "/Estimacions/proyectojson.json"
					                            }
					                        }
					        });

		var proyectos = $("#proyectos").data("kendoDropDownList");
			        
			        var contratos = $("#contratos").kendoDropDownList({
			                        autoBind: false,
			                        cascadeFrom: "proyectos",
			                        optionLabel: "Seleccione contrato...",
			                        dataTextField: "codigocontrato",
			                        dataValueField: "idcontrato",
			                        dataSource: {
			                            type: "json",
			                            transport: {
			                                read: "/Avanceprogramados/contratojson.json"
			                            }
			                        }
			                    }).data("kendoDropDownList");
	                });
            </script>
			
			
