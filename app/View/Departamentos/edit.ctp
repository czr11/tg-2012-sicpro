<!-- File: /app/View/Departamentos/edit.ctp -->

<div id="example" class="k-content">
	<div id="formulario">
		<h2>Editar Departamento</h2>
		<?php echo $this->Form->create('Departamento'); ?>
		<ul>
			<li>
				<?php Debugger::dump($this->request->data); ?>
				<h3>Archivos que ya existen</h3>
				<?php echo $this->Upload->view('Departamento', $this->request->data['Departamento']['iddepartamento']); ?>
				<h3>Archivos a Agregar</h3>
				<?php echo $this->Upload->edit('Departamento', $this->request->data['Departamento']['iddepartamento']); ?>
			</li>
			<li>
				<?php echo $this->Form->input('codigodepartamento', 
					array(
						'label' => 'Codigo Departamento:', 
						'class' => 'k-textbox', 
						'placeholder' => 'ej. 15', 
						'required', 
						'validationMessage' => 'Ingrese Codigo Departamento')); ?>
			</li>
			<li>
				<?php echo $this->Form->input('departamento', 
					array(
						'label' => 'Departamento:', 
						'class' => 'k-textbox', 
						'placeholder' => 'Nombre Departamento', 
						'required', 
						'validationMessage' => 'Ingrese Nombre Departamento')); ?>
			</li>
			<li  class="accept">
				<?php echo $this->Form->input('id', array('type' => 'hidden')); ?>
				<?php echo $this->Form->end(array('label' => 'Editar Departamento', 'class' => 'k-button')); ?>
			</li>
            
            <li class="status">
            </li>
		</ul>
		 
 
 
   </div>
  </div>
 <style scoped>

                .k-textbox {
                    width: 11.8em;
                    margin-left: 5px;
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
                });
            </script>
