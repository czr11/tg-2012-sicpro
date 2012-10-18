<!-- File: /app/View/Personas/add.ctp -->

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
			?> Persona » Registrar persona
			
		</div>
	</div>
<?php $this->end(); ?>

<div id="example" class="k-content">
	<div id="formulario">
		
		<?php echo $this->Form->create('Persona'); ?>
		<ul>
			
				<h2>Registrar persona</h2>
				<li>
					<?php echo $this->Form->input('nombrespersona', 
						array(
							'label' => 'Nombres:', 
							'class' => 'k-textbox', 
							'id' => 'nombrepersona',
							'placeholder' => 'Nombre',
							'div' => array('class' => 'requerido'))); ?>
					<script type="text/javascript">
						var nombrepersona = new LiveValidation( "nombrepersona", { validMessage: " " } );
			            nombrepersona.add(Validate.Presence, { failureMessage: "No puedes dejar este campo en blanco" } );
			            nombrepersona.add(Validate.Format, { pattern: /^[a-zA-Z áéíóúÁÉÍÓÚñÑ]+$/i, failureMessage: "Solo letras" } );
		            </script>
				</li>
				<li>
					<?php echo $this->Form->input('apellidospersona', 
						array(
							'label' => 'Apellidos:', 
							'class' => 'k-textbox', 
							'id' => 'apellidospersona',
							'placeholder' => 'Apellidos',
							'div' => array('class' => 'requerido') 
							)); ?>
					<script type="text/javascript">
						var apellidospersona = new LiveValidation( "apellidospersona", { validMessage: " " } );
			            apellidospersona.add(Validate.Presence, { failureMessage: "No puedes dejar este campo en blanco" } );
			            apellidospersona.add(Validate.Format, { pattern: /^[a-zA-Z áéíóúÁÉÍÓÚñÑ]+$/i, failureMessage: "Solo letras" } );
		            </script>
				</li>
				<li>
					<?php echo $this->Form->input('plazas', 
						array(
							'label' => 'Plaza:', 
							'id' => 'plazas',
							'class' => 'k-combobox',
							'div' => array('id' => 'plazacb', 'class' => 'requerido'))); ?>
				</li>
				<li>
					<?php echo $this->Form->input('cargos', 
						array(
							'label' => 'Cargo funcional:', 
							'id' => 'cargos',
							'class' => 'k-combobox',
							'div' => array('class' => 'requerido'))); ?>
				</li>
				<li>
					<?php echo $this->Form->input('telefonocontacto', 
						array(
							'label' => 'Telefono:', 
							'class' => 'k-textbox', 
							'id'	=>	'phone')); ?>
					<script type="text/javascript">
			            var phone = new LiveValidation( "phone", { validMessage: " ", onlyOnSubmit: true} );
			            phone.add(Validate.Format, { pattern: /^[2378]\d\d\d-\d\d\d\d$/i, failureMessage: "El numero de télefono no es valido"} );
			        </script>
				</li>
				<li>
					<?php echo $this->Form->input('correoelectronico', 
						array(
							'label' => 'Correo electronico:', 
							'class' => 'k-textbox', 
							'id' => 'correo',
							'placeholder' => 'Correo Electronico',
							'div' => array('class' => 'requerido'))); ?>
					<script type="text/javascript">
			            var correo = new LiveValidation( "correo", { validMessage: " " } );
			            correo.add(Validate.Presence, { failureMessage: "No puedes dejar este campo en blanco" } );
			            correo.add(Validate.Email, { failureMessage: "El correo electronico es invalido"} );
			            
			        </script>
				</li>
			
				<h2>Registrar usuario principal</h2>
				<li>
					<?php echo $this->Form->input('rol', 
						array(
							'label' => 'Rol:',
							'id' => 'rol',
							'class' => 'k-combobox',
							'div' => array('class' => 'requerido'))); ?>
				</li>
				<li>
					<?php echo $this->Form->input('estado',
						array('options' => array(0 => 'Deshabilitado', 1 => 'Habilitado'),
							  'id' => 'selectedo',
							  'class' => 'k-combobox',
							  'div' => array('class' => 'requerido'))); ?>
				</li>
				<li>
					<?php echo $this->Form->input('username', 
						array(
							'label' => 'Nombre de usuario:', 
							'class' => 'k-textbox', 
							'placeholder' => 'Usuario',
							'id' => 'username',
							//'readonly' => 'readonly',
							'div' => array('class' => 'requerido'))); ?>
					<script type="text/javascript">
						var username = new LiveValidation( "nombrepersona", { validMessage: " " } );
			            username.add(Validate.Presence, { failureMessage: "No puedes dejar este campo en blanco" } );
			            username.add(Validate.Format, { pattern: /^\w+$/i, failureMessage: "No puede llevar espacios en blanco o caracteres especiales" } );
		            </script>
				</li>
				<li>
					<?php echo $this->Form->input('password', 
						array(
							'label' => 'Contraseña:', 
							'class' => 'k-textbox',
							'type' => 'text', 
							'placeholder' => 'Contraseña',
							//'readonly' => 'readonly',
							'div' => array('class' => 'requerido'))); ?>
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
                }
                
                .k-combobox {
                    width: 250px;
                }
				
				.k-textbox:focus{background-color: rgba(255,255,255,.8);}
			
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
               		margin-left: 155px;
				}
				    
			/*	.LV_valid_field,
				input.LV_valid_field:hover, 
				input.LV_valid_field:active,
				textarea.LV_valid_field:hover, 
				textarea.LV_valid_field:active {
				    border: 1px solid #00CC00;
				}
				    
				.LV_invalid_field, 
				input.LV_invalid_field:hover, 
				input.LV_invalid_field:active,
				textarea.LV_invalid_field:hover, 
				textarea.LV_invalid_field:active {
				    border: 1px solid #CC0000;
				}
                */

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
                
				$("#plazas").kendoDropDownList({
            			optionLabel: "Seleccione plaza",
			            dataTextField: "plaza",
			            dataValueField: "idplaza",
			            dataSource: {
			                            type: "json",
			                            transport: {
			                                read: "/Personas/plazajson.json"
			                            }
			                        }
			        });
			        var plazas = $("#plazas").data("kendoDropDownList");
				
				$("#cargos").kendoDropDownList({
            			optionLabel: "Seleccione cargo funcional",
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
				
				$("#rol").kendoDropDownList({
            			optionLabel: "Seleccione rol",
			            dataTextField: "rol",
			            dataValueField: "idrol",
			            dataSource: {
			                            type: "json",
			                            transport: {
			                                read: "/Personas/rolesjson.json"
			                            }
			                        }
			        });
			        var rol = $("#rol").data("kendoDropDownList");
				
				$("#selectedo").kendoDropDownList();
				$("#phone").mask("9999-9999");
                 
				
				
				
				});
                
            </script>