<!-- File: /app/View/Fichatecnicas/fichatecnica_registrarficha.ctp -->
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
			?> » Proyectos » Ficha Tecnica » 
			
		</div>
	</div>
	
<?php $this->end(); ?>

<div id="example" class="k-content">
	<div id="formulario">
		<h2>Beneficiarios y empleos generados</h2>
		
		
		<?php echo $this->ajax->form(array(
				'type' => 'post',
			    'options' => array(
					        'model'=>'Proyembe',
					        'update'=>'resultadosbusqueda',
					        'indicator' => 'loading',
							'before' => '$("#resultadosbusqueda").html(" ")',
					        'url' => array('action' => 'update_rep_empbene')
							))); ?>	
		
		<ul>
			<li>
				<?php echo $this->Form->input('divisiones', 
					array(
						'label' => 'Seleccione división:', 
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
				<?php echo $this->Form->input('fechainicio', 
					array(
						'label' => 'Fecha mínima de inicio:', 
						'id'	=> 'datePicker1',
						'div' => array('id' => 'ini', 'class' => 'requerido'),
						'type'  => 'Text')); ?>
				<script type="text/javascript">
		            var datePicker1 = new LiveValidation( "datePicker1", { validMessage: " ", insertAfterWhatNode: "ini"  } );
		            datePicker1.add(Validate.Presence, { failureMessage: "No puedes dejar este campo en blanco" } );
		            datePicker1.add(Validate.Format, { pattern: /\d\d\/\d\d\/\d\d\d\d/, failureMessage: "La Fecha debe contener un formato un formato DD/MM/AAAA"  } );
		            datePicker1.add(Validate.Length,{is:10, wrongLengthMessage:"Longitud debe ser de 10 caracteres. Formato DD/MM/AAAA"});
		        </script> 
			</li>
			<li>
				<?php echo $this->Form->input('fechafin', 
					array(
						'label' => 'Fecha máxima de fin:', 
						'id'	=> 'datePicker2',
						'div' => array('id' => 'fin', 'class' => 'requerido'),
						'type'  => 'Text')); ?>
				<script type="text/javascript">
		            var datePicker2 = new LiveValidation( "datePicker2", { validMessage: " ",insertAfterWhatNode: "fin" } );
		            datePicker2.add(Validate.Presence, { failureMessage: "No puedes dejar este campo en blanco" } );
		            datePicker2.add(Validate.Format, { pattern: /\d\d\/\d\d\/\d\d\d\d/, failureMessage: "La Fecha debe contener un formato un formato DD/MM/AAAA"  } );
		        	datePicker2.add(Validate.Length,{is:10, wrongLengthMessage:"Longitud debe ser de 10 caracteres. Formato DD/MM/AAAA"});
		        </script>
			
			<li  class="accept">
				<table>
					<tr>
						<td>
							<?php echo $this->Form->end(array('label' => 'Buscar', 
									'class' => 'k-button', 'id' => 'button')); ?>
						</td>
						<td>	
							<?php echo $this->Html->link('Regresar', 
								array('controller' => 'Mains','action' => 'index'),
								array('class'=>'k-button')); ?>
						</td>
					</tr>
				</table>
			</li>
		</ul>
			
			<div id='loading' style="text-align: center; width: 600px; display: none;"><?php echo $this->Html->image('spinner.gif', array('alt' => 'cargando', "style" => "border: 0;")); ?></div>

			<div id=resultadosbusqueda>
			
			</div>
					
		
		
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
			            optionLabel: "Seleccione",
			            dataTextField: "divison",
			            dataValueField: "iddivision",
			            dataSource: {
			                            type: "json",
			                            transport: {
			                                read: "/Fichatecnicas/divisionjson.json"
			                            }
			                        }
			        });
			        
			        var proys = $("#divisiones").data("kendoDropDownList");
                    proys.list.width(300);
                    
                    
			   		
			   		function filtrarDrop() 
			   		{
						var startDate = datePicker1.value();
						var endDate = datePicker2.value();
					}    
				        
					function startChange() {
						var startDate = datePicker1.value();
						if (startDate) {
				            startDate = new Date(startDate);
				            startDate.setDate(startDate.getDate() + 1);
				            datePicker2.min(startDate);
				    	}
				    }
					
					function endChange() {
						var endDate = datePicker2.value();
					    if (endDate) {
					        endDate = new Date(endDate);
					        endDate.setDate(endDate.getDate() - 1);
					        datePicker1.max(endDate);
					    }
					}
				
				    var datePicker1 = $("#datePicker1").kendoDatePicker({
				        culture: "es-ES",
					   	format: "dd/MM/yyyy",
				        change: startChange,
				        close: filtrarDrop
				    }).data("kendoDatePicker");
					
				    var datePicker2 = $("#datePicker2").kendoDatePicker({
				        culture: "es-ES",
					   	format: "dd/MM/yyyy",
				        change: endChange,
				        close: filtrarDrop
				    }).data("kendoDatePicker");
					
				    datePicker1.max(datePicker2.value());
				    datePicker2.min(datePicker1.value());
                    
                   
                });
                
                
            </script>