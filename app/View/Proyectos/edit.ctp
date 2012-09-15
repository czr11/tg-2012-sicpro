<!-- File: /app/View/Proyectos/edit.ctp -->

<div id="example" class="k-content">
	<div id="formulario">
		<h2>Modificar proyecto</h2>
		<?php echo $this->Form->create('Proyecto',array('action' => 'edit')); ?>
		<ul>
			<li>
				<?php echo $this->Form->input('proys', 
					array(
						'label' => 'Seleccione proyecto:', 
						'id' => 'selectpro', 
						'empty' => 'Seleccione...',
						'validationMessage' => 'Seleccione un proyecto')); ?>
			</li>
			<!-- -->
			<li>
				<?php echo $this->Form->input('nombreproyecto', 
					array(
						'label' => 'Nombre del proyecto:', 
						'class' => 'k-textbox', 
						'placeholder' => 'Nombre del proyecto', 
						'required', 
						'validationMessage' => 'Ingrese Nombre de Proyecto')); ?>
			</li>
			<li>
				<?php echo $this->Form->input('divisions', 
					array(
						'label' => 'División responsable:', 
						'id' => 'selectpro',
						'validationMessage' => 'Seleccione una división',
						'required')); ?>
			</li>
			<li>
				<?php echo $this->Form->input('montoplaneado', 
					array(
						'label' => 'Monto planeado: ($)', 
						'id' => 'monto',
						'type' => 'text',
						'placeholder' => 'Ingrese Monto',
						'required',
						'validationMessage' => 'Ingrese un monto planeado ($)')); ?>
			</li>
			<li  class="accept">
				<?php echo $this->Form->end(array('label' => 'Registrar proyecto', 'class' => 'k-button')); ?>
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
				
				.k-textbox:focus{background-color: rgba(255,255,255,.8);}
			
                form .required label:after {
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
                    color: red;
                }
                span.k-tooltip {
                    margin-left: 6px;
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
                    
                    $("#selectpro").kendoComboBox({
                    	highLightFirst: true,
                    	filter: "contains"
                    });
                    
                    var combobox = $("#selectpro").data("kendoComboBox");
                    combobox.list.width(400);
                    
                    $("#monto").kendoNumericTextBox({
                        format: "c2",
                        decimals: 2,
                        value: 0,
                        min: 0,
    					max: 999999999.99,
    					placeholder: "Ej. 10000",
    					spinners: false
                    });
                    
                    $("#texto")
               
                });
                
                
            </script>
