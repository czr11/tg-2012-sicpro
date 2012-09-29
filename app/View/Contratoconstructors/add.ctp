<!-- File: /app/View/Contratoconstructors/add.ctp -->
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
			?> Contrato constructor » Registrar contrato constructor 
			
		</div>
	</div>
	
<?php $this->end(); ?>

<div id="example" class="k-content">
	<div id="formulario">
		<h2>Registrar contrato constructor</h2>
		<?php echo $this->Form->create('Contratoconstructor'); ?>
		<ul>
			<li>
				<?php echo $this->Form->input('proys', 
					array(
						'label' => 'Seleccione proyecto:', 
						'id' => 'selectproy',
						'empty' => 'Seleccione...',
						'required',
						'validationMessage' => 'Seleccione un proyecto'
						)); 
				?>
			</li>
			<li>
				<?php echo $this->Form->input('codigocontrato', 
					array(
						'label' => 'Código contrato:', 
						'class' => 'k-textbox',
						'id'=>'codigo', 
						'placeholder' => 'Ej: 001-2012', 
						'required', 
						'validationMessage' => 'Ingrese el código de contrato'
						)); ?>
			</li>
			<li>
				<?php echo $this->Form->input('nombrecontrato', 
					array(
						'label' => 'Título del contrato:', 
						'class' => 'k-textbox', 
						'placeholder' => 'Nombre del contrato', 
						'required',
						'rows'=> 2, 
						'validationMessage' => 'Ingrese el título del contrato'
						)); ?>
			</li>
			<li>
				<?php echo $this->Form->input('montocon', 
					array(
						'label' => 'Monto: ($)',
						'class' => 'k-textbox',  
						'id' => 'txmonto',
						'type' => 'text',
						'placeholder' => 'Monto del contrato',
						'required',
						'validationMessage' => 'Ingrese el monto original'
						)); ?>
			</li>
			<li>
				<?php echo $this->Form->input('anticipo', 
					array(
						'label' => 'Anticipo: ($)',
						'class' => 'k-textbox',  
						'id' => 'txanticipo',
						'type' => 'text',
						'placeholder' => 'Anticipo del contrato',
						'required',
						'validationMessage' => 'Ingrese el monto de anticipo)')); ?>
			</li>
			<li>
				<?php echo $this->Form->input('fechainicontrato', 
					array(
						'label' => 'Fecha inicio de vigencia:', 
						'id'	=> 'datePicker1',
						'required',
						'type'  => 'Text'
						));
					?>
			</li>
			<li>
				<?php echo $this->Form->input('fechafincontrato', 
					array(
						'label' => 'Fecha fin de vigencia:', 
						'id'	=> 'datePicker2',
						'required',
						'type'  => 'Text'
						)); 
					?>
			</li>
			<li>
				<?php echo $this->Form->input('plazoejecucion', 
					array(
						'label' => 'Plazo de ejecución:', 
						'id' => 'txplazo', 
						'placeholder' => 'Cantidad de días', 
						'required', 
						'validationMessage' => 'Ingrese el plazo de ejecución'
						));
					?>
			</li>
			<li>
				<?php echo $this->Form->input('obras', 
					array(
						'label' => 'Obras a desarrollar:', 
						'class' => 'k-textbox',
						'rows' => 4, 
						'placeholder' => 'Descripción de obras'
						));
					?>
			</li>
			<li>
				<?php echo $this->Form->input('empresas', 
					array(
						'label' => 'Seleccione empresa:', 
						'id' => 'selectemp',
						'empty' => 'Seleccione...',
						'required',
						'validationMessage' => 'Seleccione una empresa'
						));
					?>
			</li>
			<li>
				<?php echo $this->Form->input('administradores', 
					array(
						'label' => 'Seleccione administrador:', 
						'id' => 'selectadm',
						'empty' => 'Seleccione...',
						'required',
						'validationMessage' => 'Seleccione un administrador'
						)); 
					?>
			</li>
			<li  class="accept">
				<?php echo $this->Form->end(array('label' => 'Registrar contrato', 'class' => 'k-button')); ?>
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
				 
				 $("#txplazo").kendoNumericTextBox({
                        min: 0,
    					max: 999,
    					decimals: 0,
    					placeholder: "Ej. 90",
    					spinners: false
                    });
                
				$("#selectproy").kendoComboBox();
				var combobox = $("#selectproy").data("kendoComboBox");
                    combobox.list.width(400);
				
				$("#selectemp").kendoComboBox();
				var combobox = $("#selectemp").data("kendoComboBox");
                    combobox.list.width(400);
				
				$("#selectadm").kendoComboBox();
				var combobox = $("#selectadm").data("kendoComboBox");
                    combobox.list.width(400);
				
				$("#datePicker1").kendoDatePicker({
		   			format: "dd/MM/yyyy",
		   			culture: "es-ES"
		   		});
				$("#datePicker2").kendoDatePicker({
		   			format: "dd/MM/yyyy",
		   			culture: "es-ES"
		   		});
				
				$("#codigo").mask("999-9999");
				
				
				
				});
                
            </script>