<!-- File: /app/View/Empresas/empresa_rephistorial.ctp -->
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
			?> » Reportes » Historial de empresa
			
		</div>
	</div>
	
<?php $this->end(); ?>

<div id="example" class="k-content">
	<div id="formulario">
		<h2>Reporte historial de empresa</h2>
		<?php echo $this->Form->create('Empresa',array('action' => 'empresa_rephistorial')); ?>
		<ul>
			<li>
				<?php echo $this->Form->input('empresas', 
					array(
						'label' => 'Seleccione empresa:', 
						'id' => 'empresas',
						'class'=>'k-combobox',
						'div' => array('id'=>'empre','class' => 'requerido'))); 
				?>
				<script type="text/javascript">
					var empresas = new LiveValidation( "empresas", { validMessage: " " , insertAfterWhatNode: "empre" } );
		            empresas.add(Validate.Presence, { failureMessage: "No puedes dejar este campo en blanco" } );
		        </script>
			</li>
			
			<li  class="accept">
				<table width="600px">
					<tr>
						<td style="text-align: right;">
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
               		margin-left: 210px; 
               
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
                    
                    $("#empresas").kendoDropDownList({
			            optionLabel: "Seleccione empresa",
			            dataTextField: "nombreempresa",
			            dataValueField: "idempresa",
			            dataSource: {
			                            type: "json",
			                            transport: {
			                                read: "/Empresas/empresarepjson.json"
			                            }
			                        }
			        });
			        
			        var proys = $("#empresas").data("kendoDropDownList");
                    proys.list.width(300);
                    
                    
                   
                });
                
                
            </script>