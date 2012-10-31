
   <!-- File: /app/View/Estimacion/index.ctp -->
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
			?> » Bienvenido a SICPRO » Control y Seguimiento » Estimación de Avance
			
		</div>
	</div>
	
<?php $this->end(); ?>
<h2>Registrar Estimación de Avance</h2>
<div style='margin:4px 0' >
	<?php echo $this->Html->link(
		'<span class="k-icon k-i-plus"></span> Registrar Estimación de Avance', 
		array('controller' => 'Estimacions', 'action' => 'estimacion_registrar'),
		array('class'=>'k-button','escape' => false)
	);  ?>
</div> 

<table id="grid">
    <tr>
        <th data-field="codigocontrato">CodigoContrato</th>
        <th data-field="idcontrato">IdContrato</th>
        <th data-field="tituloestimacion" width="200px">Titulo Estimación</th>
        <th data-field="fechainicioestimacion">Fecha</th>
        <th data-field="porcentajeestimadoavance">Porcentaje</th>
        <th data-field="montoestimado">Monto</th>
        <th data-field="accion">Acción</th>
    </tr>

    
    
    <?php foreach ( $estimacions as $esti): ?>
    <tr>
        <td><?php echo $esti['Contratoconstructor'] ['codigocontrato']; ?></td>
        <td><?php echo $esti['Contratoconstructor'] ['idcontrato']; ?></td>
        <td><?php echo $esti['Estimacion'] ['tituloestimacion']; ?></td>
        <td><?php echo date('d/m/Y',strtotime ($esti['Estimacion']['fechainicioestimacion'])); ?></td>
        
        <td><?php echo number_format ($esti['Estimacion']['porcentajeestimadoavance'],2) . '%'; ?></td> 
        <td><?php echo '$ ' . number_format ($esti['Estimacion']['montoestimado'],2); ?></td>    
        <td align="center">
            <?php echo $this->Html->link(
            	'<span class="k-icon k-i-pencil"></span>', 
            	array('action' => 'estimacion_modificar', $esti['Estimacion']['idestimacion']),
            	array('class'=>'k-button', 'escape' => false, "title"=>"Editar")
			);?>
			
            <?php echo $this->Form->postLink(
                '<span class="k-icon k-i-close"></span>',
                array('action' => 'estimacion_eliminar', $esti['Estimacion']['idestimacion']),
                array('confirm' => '¿Está seguro que desea eliminar la estimación seleccionada?','class'=>'k-button', 'escape' => false, "title"=>"Eliminar")
            )?>
            
           <?php echo $this->Html->link(
            	'<span class="k-icon k-i-folder-up"></span>', 
            	array('controller' => 'Estimacions','action' => 'agregar_archivo',$esti['Estimacion']['idestimacion']),
            	array('class'=>'k-button', 'escape' => false, "title"=>"Cargar Archivos")
			);?>

        </td>
    </tr>
    <?php endforeach; ?>
    <?php unset($estimacions); ?>
</table>




<!-- <div id="grid2"> </div> -->

<script type="text/x-kendo-template" id="template">
    <div class="toolbar">
        <label class="codigocontrato-label" for="codigocontrato">Mostrar Estimaciones por Contrato:</label>
        <input type="search" id="codigocontrato" style="width: 230px"></input>
    </div>
</script>

    <style scoped="scoped">
    	#grid .k-button
        {
            vertical-align: middle;
            width: 28px;
            margin: 0 3px;
            padding: .1em .4em .3em;
            display: inline;
            
        }
        
        #grid .k-toolbar
        {
            min-height: 27px;
        }
        .codigocontrato-label
        {
            vertical-align: middle;
            padding-right: .5em;
        }
        #codigocontrato
        {
            vertical-align: middle;
        }
        .toolbar {
            float: right;
            margin-right: .8em;
        }
    </style>


<script>
	$(document).ready(function() {
		
		
		
    	var grid =$("#grid").kendoGrid({
            	dataSource: {
	           		pageSize: 10,
	           		group: { field: "codigocontrato" }
            	},
            	pageable: true,
            	pageable: {
            		messages: {
            			display: "{0} - {1} de {2} Estimaciones",
            			empty: "No hay Estimaciones de Avances a mostrar",
            			page: "Página",
            			of: "de {0}",
            			itempsPerPage: "Estimaciones por página",
            			first: "Ir a la primera página",
            			previous: "Ir a la página anterior",
            			next: "Ir a la siguiente página",
            			last: "Ir a la última página",
            			refresh: "Actualizar"
            		}
            	},
 				toolbar: kendo.template($("#template").html()),
            	sortable: true,
            	sortable: {
 			    	mode: "single", // enables multi-column sorting
        			allowUnsort: true
				},
				columns: [
                            { field: "codigocontrato", title: "Codigo Contrato" },
                            "idcontrato",
                            "tituloestimacion",
                            { field:"fechainicioestimacion", width:75 },
                            { field:"porcentajeestimadoavance", width:75 },
                            { field:"montoestimado", width:125 },
                            { field:"accion", width:130 }
                            
                            
                        ],
				scrollable: false
            	});
           
          
         	
       /* var grid = $("#grid2").kendoGrid({
            	dataSource: {
	           		pageSize: 10,
            	},
            	pageable: true,
            	pageable: {
            		messages: {
            			display: "{0} - {1} de {2} Estimaciones",
            			empty: "No hay Estimaciones de Avances a mostrar",
            			page: "Página",
            			of: "de {0}",
            			itempsPerPage: "Estimaciones por página",
            			first: "Ir a la primera página",
            			previous: "Ir a la página anterior",
            			next: "Ir a la siguiente página",
            			last: "Ir a la última página",
            			refresh: "Actualizar"
            		}
            	},
            	toolbar: kendo.template($("#template").html()),
            	sortable: true,
            	sortable: {
 			    	mode: "single", // enables multi-column sorting
        			allowUnsort: true
				},
				scrollable: false,
				columns:[
		              {
		                  field: "tituloestimacion",
		                  title: "Titulo Estimación"
		              },
		              {
		                  field: "fechainicioestimacion",
		                  title: "Fecha Inicio Estimación"
		          }],
		          dataSource: {
	                	type: "json",
		                transport: {
		                	read: "/Estimacions/indexjson.json"
		               	}
		            }
            	});*/
            	
            	var dropDown = $("#codigocontrato").kendoDropDownList({
	            	dataTextField: "codigocontrato",
	                dataValueField: "idcontrato",
	                autoBind: false,
	                optionLabel: "Todos los contratos",
	                dataSource: {
	                	type: "json",
		                transport: {
		                	read: "/Estimacions/contratoestjson.json"
		               	}
		            },
	                change: function() {
	                    var value = this.value();
	                    //alert(value);
	                    if (value) {
	                        grid.data("kendoGrid").dataSource.filter({ field: "idcontrato", operator: "eq", value: parseInt(value) });
	                    } else {
	                        grid.data("kendoGrid").dataSource.filter({});
	                    }
	                }
	            });
            	
        	 var gridyy = $("#grid").data("kendoGrid");
        	 gridyy.hideColumn("idcontrato"); 
        	 gridyy.hideColumn("codigocontrato"); 
        });
</script>