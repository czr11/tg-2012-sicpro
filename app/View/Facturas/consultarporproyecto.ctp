<!-- File: /app/View/Factura/consultarporproyecto.ctp -->
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
			?> » Bienvenido a SICPRO » Facturas » Consulta de facturas por proyecto
			
		</div>
	</div>
	
<?php $this->end(); ?>

<div id="example" class="k-content">
	
		<h2>Consultar Facturas por Proyecto</h2>
		
		<?php //echo $this->Form->create('Factura'); ?>
		
		<?php echo $this->ajax->form(array('type' => 'post',
		    'options' => array(
		        'model'=>'Factura',
		        'update'=>'facturaxproy',
		        'indicator' => 'loading',
				'before' => '$("#facturaxproy").html(" ")',
		        'url' => array(
		            'action' => 'update_facturasxproyecto'
		        )
		    )
		)); ?>
		
		<div id="shipping">
            <label for="input" class="info">Seleccione un proyecto:</label>
			<table border="0">
            	<tr>
            		<!--<td><input id="proyectos" /></td>-->
            		<td><?php echo $this->form->input('proyectos',array('id'=>'proyectos','label'=>false,'div'=>false,'maxlength'=>4,'autofocus'=>'autofocus'));?></td>
            
             		<td><?php echo $this->Form->end(array('label' => 'Buscar', 'class' => 'k-button', 'id' => 'button')); ?></td>
             		<!--<td><a class="k-button"><span class="k-icon k-i-search"></span></a></td>-->
             	</tr>
             
			</table>
            <div class="hint">Inicie escribiendo el número de un proyecto</div>

		</div>


	<div id='loading' style="text-align: center; width: 600px; display: none;"><?php echo $this->Html->image('spinner.gif', array('alt' => 'cargando', "style" => "border: 0;")); ?></div>
	<div id="facturaxproy"></div>
	
	<table width="600px">
			<tr>
			<td style="text-align: right">
			<?php echo $this->Html->link('Regresar', 
									array('controller' => 'Mains','action' => 'index'),
									array('class'=>'k-button')); ?>
			</td>
			</tr>
			</table>
	<!--
		<?php echo $this->ajax->observeForm( 'FacturaConsultarporproyectoForm', 
		array(
    		'url' => array( 'action' => 'update_facturasxproyecto'),
    		'update' => 'facturaxproy'
		) 
	); ?> -->
	
      <style scoped>
/*
             ul {
                list-style-type: none;
                margin: 0;
                padding: 0;
            }
            
            li {
                margin: 10px 0 0 0;
            }       
       */     

            .accept {
            	padding-top: 15px;
                padding-left: 150px;
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
           		margin-left: 130px;
			}
			
			
            .info {
                display: block;
                line-height: 22px;
                padding: 0 5px 5px 0;
				/*color: #36558e;*/
				color: black;
            }

			#shipping {
				width: 350px;
				height: 100px;
				padding: 0 0 0 30px;
				margin: 30px 30px 10px 0;
			}

            .k-autocomplete
            {
                width: 250px;
				vertical-align: middle;
            }

            .hint {
                line-height: 22px;
                color: #aaa;
                font-style: italic;
				font-size: .9em;
				color:#959595;
            }

        </style>
	
	<script>
		$(document).ready(function() {
	      	var autoComplete = $("#proyectos").kendoAutoComplete({
            	dataTextField: "numeroproyecto",
            	filter: 'contains',
            	minLength: 1,
            	//placeholder: "Ingrese un número de proyecto",
            	suggest: true,
                //dataValueField: "idproyecto",
                //autoBind: false,
                //optionLabel: "Todos los contratos",
                dataSource: {
                	type: "json",
                	//serverFiltering: true,
                    //serverPaging: true,
                    //pageSize: 20,
	                transport: {
	                	read: "/Facturas/proyectosfactjson.json"
	               	}
	            }
            });
		});
	</script>
</div>

