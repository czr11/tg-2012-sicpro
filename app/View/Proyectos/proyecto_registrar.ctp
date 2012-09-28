<!-- File: /app/View/Proyectos/add.ctp -->
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
			?> Proyecto » Registrar proyecto
			
		</div>
	</div>
<?php $this->end(); ?>

<div id="example" class="k-content">
	<div id="formulario">
		<h2>Registrar proyecto</h2>
		<?php echo $this->Form->create('Proyecto'); ?>
		<ul>
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
						'label' => 'División:', 
						'id' => 'selecto',
						'empty' => 'Seleccione...',
						'selected' => '05',
						'required')); ?>
			</li>
			<li>
				<?php echo $this->Form->input('montoplaneado', 
					array(
						'label' => 'Monto planeado: ($)',
						'class' => 'k-textbox',  
						'id' => 'txmonto',
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

                    $("button").click(function() {
                        if (validator.validate()) {
                            //status.text("Hooray! Your tickets has been booked!").addClass("valid");
                            } else {
                            //status.text("Oops! There is invalid data in the form.").addClass("invalid");
                        }
                    });
                
				$("#selecto").kendoComboBox();
				var combobox = $("#selecto").data("kendoComboBox");
                    combobox.list.width(200);
				
				$("#txmonto").kendoNumericTextBox({
				     min: 0,
				     max: 999999999.99,
				     spinners: false,
				     format: "c2",
				     decimals: 2
				 });


				
				
				
				});
                
            </script>
