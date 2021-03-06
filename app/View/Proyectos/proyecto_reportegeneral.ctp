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
			?> » Reportes 
			» Datos generales de proyecto
			
		</div>
	</div>
<?php $this->end(); ?>

<div id="example" class="k-content">
	<div id="formulario">
		<h2>Reporte general de proyecto</h2>
		<?php echo $this->Form->create('Proyecto',array('action' => 'proyecto_reportegeneral')); ?>
		<ul>
			<li>
				<?php echo $this->Form->input('proys', 
					array(
						'label' => 'Seleccione proyecto:', 
						'id' => 'proys',
						'class'=>'k-combobox',
						'div' => array('id' => 'proyogen', 'class' => 'requerido'))); 
				?>
				<div class="hint">Inicie escribiendo el numero de proyecto</div>
				<script type="text/javascript">
					var proys = new LiveValidation( "proys", { validMessage: " ", insertAfterWhatNode: 'proyogen' } );
		            proys.add(Validate.Presence, { failureMessage: "No puedes dejar este campo en blanco" } );
		        </script>
		        
		        <div id="errornumero" class="LV_validation_message LV_invalid"></div>
			</li>
			
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
                    width: 200px;
                    text-align: right;
                    margin-right: 5px;
                }

                .accept, .status {
                	padding-top: 15px;
                    padding-left: 350px;
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
               		margin-left: 205px; 
               
				}
				 .hint {
	                line-height: 22px;
	                margin-left: 200px;
	                color: #aaa;
	                font-style: italic;
					font-size: .9em;
					color:#959595;
          		}
				    

            </style>
			
            <script>
                $(document).ready(function() {
                    

        			$("#ProyectoProyectoReportegeneralForm").submit(function() {
	                       	
	                       	if(proys.dataItem()){
									$('#errornumero').hide();
									return true;
								}
								else {
									$('#errornumero').show().text('No Existe este Número de Proyecto').delay(5000).slideUp('easy');
									return false;
								}
                    });            
                    
                    
                    $("#proys").kendoComboBox({
			            optionLabel: "Seleccione proyecto",
			            dataTextField: "numeroproyecto",
			            dataValueField: "idproyecto",
			            dataSource: {
			                            type: "json",
			                            transport: {
			                                read: "/Proyectos/proyectotodosjson.json"
			                            }
			                        }
			        });
			        
			        var proys = $("#proys").data("kendoComboBox");
                    proys.list.width(300);
                    
                    
                   
                });
                
                
            </script>