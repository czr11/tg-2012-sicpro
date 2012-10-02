
   <!-- File: /app/View/Fuentefinanciamiento/index.ctp -->
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
			?> » Bienvenido a SICPRO
			
		</div>
	</div>
	
<?php $this->end(); ?>
<h2>Fuente de Financiamiento</h2>
<div style='margin:4px 0' >
	<?php echo $this->Html->link(
		'Registrar Fuente de Financiamiento', 
		array('controller' => 'Fuentefinanciamientos', 'action' => 'fuentefinanciamiento_registrarfuente'),
		array('class'=>'k-button')
	); ?>
</div> 
<table id="grid">
    <tr>
        <th data-field="nombrefuente">Nombre Fuente</th>
        <th data-field="montoinicial">Monto Inicial</th>
        <th data-field="fechadisponible">Fecha de Disponibilidad</th>
        <th data-field="tipofuente" width="225px">Tipo de Fuente</th>
        <th data-field="accion" width="225px">Acción</th>
    </tr>

    <!-- Here is where we loop through our $fuente array, printing out post info -->

    <?php foreach ($fuentefinanciamientos as $fuente): ?>
    <tr>
        <td><?php echo $fuente['Fuentefinanciamiento']['nombrefuente']; ?></td>
        <td><?php echo $fuente['Fuentefinanciamiento']['montoinicial']; ?></td>
        <td><?php echo $fuente['Fuentefinanciamiento']['fechadisponible']; ?></td>  
        <td><?php echo $fuente['Tipofuente']['tipofuente']; ?></td>      
        <td align="center">
            <?php echo $this->Html->link(
            	'Editar', 
            	array('action' => 'fuentefinanciamiento_modificarfuente', $fuente['Fuentefinanciamiento']['idfuentefinanciamiento']),
            	array('class'=>'k-button')
			);?>
            <?php echo $this->Form->postLink(
                'Eliminar',
                array('action' => 'delete', $fuente['Fuentefinanciamiento']['idfuentefinanciamiento']),
                array('confirm' => '¿Está seguro?','class'=>'k-button')
            )?>
            
        </td>
    </tr>
    <?php endforeach; ?>
    <?php unset($fuentefinanciamientos); ?>
</table>

<script>
	$(document).ready(function() {
    	$("#grid").kendoGrid({
            	dataSource: {
	           		pageSize: 10,
            	},
            	pageable: true,
            	pageable: {
            		messages: {
            			display: "{0} - {1} de {2} Fuentes",
            			empty: "No hay fuentes de financiamiento a mostrar",
            			page: "Página",
            			of: "de {0}",
            			itempsPerPage: "fuentes de financiamiento por página",
            			first: "Ir a la primera página",
            			previous: "Ir a la página anterior",
            			next: "Ir a la siguiente página",
            			last: "Ir a la última página",
            			refresh: "Actualizar"
            		}
            	},
            	sortable: true,
            	sortable: {
 			    	mode: "single", // enables multi-column sorting
        			allowUnsort: true
				},
				scrollable: false
            	
            	
        	});
        });
</script>