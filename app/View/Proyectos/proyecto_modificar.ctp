<!-- File: /app/View/Proyectos/edit.ctp -->

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
			?> Proyecto » Modificar proyecto
			
		</div>
	</div>
<?php $this->end(); ?>

<div id="example" class="k-content">
	<div id="formulario">
		<h2>Modificar Proyecto</h2>
		<?php echo $this->Form->create('Proyecto',array('action' => 'proyecto_modificar')); ?>
		<?php if($idrol == 5 || $idrol== 7)
			{ ?> 
		<ul>
				<li>
					<?php echo $this->Form->input('nombreproyecto', 
						array(
							'label' => 'Nombre del proyecto:',
							'div' => array('class' => 'requerido'),
							'id' => 'nombreproyecto', 
							'rows' => '3', 
							'class' => 'k-textbox')); ?>
					<script type="text/javascript">
			            var nombreproyecto = new LiveValidation( "nombreproyecto", { validMessage: " " } );
			            nombreproyecto.add(Validate.Presence, { failureMessage: "No puedes dejar este campo en blanco" } );
			        </script>
				</li>
				<li>
					<?php echo $this->Form->input('divisiones', 
						array(
							'label' => 'División responsable:', 
							'id' => 'divisiones',
							'class'=>'k-combobox',
							'div' => array('class' => 'requerido'))); 
					?>
					<script type="text/javascript">
						var divisiones = new LiveValidation( "divisiones", { validMessage: " " } );
			            divisiones.add(Validate.Presence, { failureMessage: "No puedes dejar este campo en blanco" } );
			        </script>
				</li>
				<li>
					<?php echo $this->Form->input('montoplaneado', 
						array(
							'label' => 'Monto planeado: ($)', 
							'type'=>'text',  
							'id' => 'txmonto',
							'style'=>'width: 200px',
							'div' => array('id'=> 'monpla','class' => 'requerido'),
							'maxlength'=>'12')); ?>
					<script type="text/javascript">
						var txmonto = new LiveValidation( "txmonto", { validMessage: " " , insertAfterWhatNode: "monpla" } );
			            txmonto.add(Validate.Presence, { failureMessage: "No puedes dejar este campo en blanco" } );
			            txmonto.add( Validate.Numericality, { minimum: 0, maximum: 999999999.99, tooLowMessage: "El monto no puede ser menor a $0.00", tooHighMessage: "El monto no puede ser mayor a $999,999,999.99", notANumberMessage: "Debe ser un número" } );
			        </script>
				</li>
					<?php echo $this->Form->input('idproyecto')?>
				<li  class="accept">
					<table>
						<tr>
							<td>
								<?php echo $this->Form->end(array('label' => 'Modificar', 'class' => 'k-button')); ?>
							</td>
							<td>	
								<?php echo $this->Html->link('Regresar', 
									array('controller' => 'Proyectos','action' => 'proyecto_listado'),
									array('class'=>'k-button')); ?>
							</td>
						</tr>
					</table>
				</li>
	            
	            <li class="status">
	            </li>
            <?php 
            	}
            	else{
            		echo "Lo sentimos, su usuario no cuenta con los permisos adecuados para realizar esta función<br><br>";
            		echo $this->Html->link('Regresar', 
									array('controller' => 'Mains','action' => 'index'),
									array('class'=>'k-button'));
            	}
            	?>
		</ul>
		
	
	</div>
</div>

			<style scoped>

                .k-textbox {
                    width: 300px;
                    
                    
                }
				
				.k-textbox:focus{background-color: rgba(255,255,255,.8);}
				
				.k-combobox {
                    width: 200px;
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
				    display: none;
				}
					
				.LV_invalid {
				    color:#CC0000;
					clear:both;
               		display:inline-block;
               		margin-left: 170px; 
               
				}
				    
				
            </style>
			
			<script>
                $(document).ready(function() {
                    
                    var validator = $("#formulario").kendoValidator().data("kendoValidator"),
                    status = $(".status");

                    $("#button").click(function() {
                        if (validator.validate()) {
                        	save();  
                        } 
                    });
                    
                    
                    $("#divisiones").kendoDropDownList({
            			dataTextField: "divison",
			            dataValueField: "iddivision",
			            index: <?php echo $this->request->data['Division']['iddivision']-1; ?>,
			            dataSource: {
			                            type: "json",
			                            transport: {
			                                read: "/Proyectos/divisionjson.json"
			                            }
			                        }
			        });
			        
			        var divisiones = $("#divisiones").data("kendoDropDownList");
                    
                    $("#txmonto").kendoNumericTextBox({
                        format: "c2",
                        decimals: 2,
                        min: 0,
    					placeholder: "Ej. 10000",
    					spinners: false
                    });
                    
                    $("#texto")
               
                });
                
                
            </script>
