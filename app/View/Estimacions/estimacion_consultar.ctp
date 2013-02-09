<!-- File: /app/View/Estimacions/estimacion_consultar.ctp -->
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
			?> » Control y Seguimiento » Consultar Estimación de Avance
			
		</div>
	</div>
<?php $this->end(); ?>

<div id="example" class="k-content">
	<div id="formulario">
		<h2>Consultar Estimación de Avance</h2>
		
		<?php echo $this->Form->create('Estimacion',array('action' => 'estimacion_consultar')); ?>
		<ul>
			<li>
				<?php echo $this->Form->input('proyectos',
					array(
						'label' => 'Contratos:', 
						'id' => 'contratos',
						'div' => array('id'=>'proyo','class' => 'requerido')
					)); ?>
				<script type="text/javascript">
					var contratos = new LiveValidation( "contratos", { validMessage: " " , insertAfterWhatNode: "proyo"  } );
		            contratos.add(Validate.Presence, { failureMessage: "Selecciona un elemento" } );
		        </script>
			</li>
			<li>
				<?php echo $this->Form->input('informeestima',
					array(
						'label' => 'Estimación:', 
						'id' => 'estimaciones',
						'class' => 'k-combobox',
						'div' => array('id'=>'admc','class' => 'requerido')
					)); ?>
				<script type="text/javascript">
					var estimaciones = new LiveValidation( "estimaciones", { validMessage: " " , insertAfterWhatNode: "admc"  } );
		            estimaciones.add(Validate.Presence, { failureMessage: "Selecciona un elemento" } );
		        </script>
			</li>
			<li  class="accept">
				<table>
					<tr>
						<td><?php echo $this->Form->end(array('label' => 'Buscar', 'class' => 'k-button')); ?></td>
						<td>
						    <?php echo $this->Html->link('Regresar', array('controller' => 'Mains','action' => 'index'),
						    array('class'=>'k-button'));?>
						</td>
					</tr>
				</table>
			</li>
		</ul>
	</div>
</div>

<style scoped>

                .k-textbox {
                    width: 300px;   
                }
                
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
                    width: 140px;
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
                    color: gray;
                }
                span.k-tooltip {
                    margin-left: 6px;
                }
                
 				.LV_validation_message{
				    /*font-weight:bold;*/
				    margin:0 0 0 5px;
				}
				
				.LV_valid {
				    color:#00CC00;
				    margin-left: 10px;
				    display: none;
				}
					
				.LV_invalid {
				    color:#CC0000;
               		display:block;
               		margin-left: 145px;
				}
				    
			
            </style>
            
<script>
	$(document).ready(function() {
		

		$("#contratos").kendoDropDownList({
		            			optionLabel: "Seleccione contrato",
					            dataTextField: "codigocontrato",
					            dataValueField: "idcontrato",
					            dataSource: {
					                            type: "json",
					                            transport: {
					                                read: "/Estimacions/contrato_est_json.json"
					                            }
					                        }
					        });

		var estimaciones = $("#estimaciones").data("kendoDropDownList");
			        
			        var estimaciones = $("#estimaciones").kendoDropDownList({
			                        autoBind: false,
			                        cascadeFrom: "contratos",
			                        dataTextField: "tituloestimacion",
			                        dataValueField: "idestimacion",
			                        dataSource: {
			                            type: "json",
			                            transport: {
			                                read: "/Estimacions/estimacion_cons_json.json"
			                            }
			                        }
			                    }).data("kendoDropDownList");
	                });
            </script>