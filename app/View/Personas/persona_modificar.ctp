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
			?> Persona » Modificar persona
			
		</div>
	</div>
<?php $this->end(); ?>

<div id="example" class="k-content">
	<div id="formulario">
		
		<?php echo $this->Form->create('Persona',array('action' => 'persona_modificar')); ?>
		<ul>
			<h2>Modificar persona</h2>
				<li>
					<?php echo $this->Form->input('nombrespersona', 
						array(
							'label' => 'Nombres:', 
							'class' => 'k-textbox', 
							'placeholder' => 'Nombres de la persona', 
							'required', 
							'validationMessage' => 'Ingrese nombres de la persona')); ?>
				</li>
				<li>
					<?php echo $this->Form->input('apellidospersona', 
						array(
							'label' => 'Apellidos:', 
							'class' => 'k-textbox', 
							'placeholder' => 'Apellidos de la persona', 
							'required', 
							'validationMessage' => 'Ingrese apellidos de la persona')); ?>
				</li>
				<li>
					<?php echo $this->Form->input('plazas', 
						array(
							'label' => 'Plaza:', 
							'id' => 'plazas',
							'required')); ?>
				</li>
				<li>
					<?php echo $this->Form->input('cargos', 
						array(
							'label' => 'Cargo funcional:', 
							'id' => 'cargos',
							'required')); ?>
				</li>
				<li>
					<?php echo $this->Form->input('telefonocontacto', 
						array(
							'label' => 'Telefono:', 
							'class' => 'k-textbox', 
							'id'	=>	'phone',
							'placeholder' => 'Telefono Empresa', 
							'validationMessage' => 'Ingrese Telefono Empresa')); ?>
				</li>
				<li>
					<?php echo $this->Form->input('correoelectronico', 
						array(
							'label' => 'Correo electronico:', 
							'class' => 'k-textbox', 
							'placeholder' => 'Correo Electronico', 
							'required', 
							'validationMessage' => 'Ingrese Correo Electronico')); ?>
				</li>
				<li  class="accept">
					<?php echo $this->Form->end(array('label' => 'Registrar persona', 'class' => 'k-button')); ?>
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

    $("button").click(function() {
		if (validator.validate()) 
		{
                            //status.text("Hooray! Your tickets has been booked!").addClass("valid");
		} 
		else 
		{
                            //status.text("Oops! There is invalid data in the form.").addClass("invalid");
        }
	});
                
	$("#plazas").kendoDropDownList({
		optionLabel: "Seleccione plaza...",
		dataTextField: "plaza",
		dataValueField: "idplaza",
		dataSource: {
			type: "json",
			transport: 
			{
				read: "/Personas/plazajson.json"
			}
			                        }
	});
	var plazas = $("#plazas").data("kendoDropDownList");
				
	$("#cargos").kendoDropDownList({
            			optionLabel: "Seleccione cargo funcional...",
			            dataTextField: "cargofuncional",
			            dataValueField: "idcargofuncional",
			            dataSource: {
			                            type: "json",
			                            transport: {
			                                read: "/Personas/cargojson.json"
			                            }
			                        }
			        });
			        var cargos = $("#cargos").data("kendoDropDownList");
				
				$("#phone").mask("9999-9999");
                 
				
				
				
				});
                
            </script>