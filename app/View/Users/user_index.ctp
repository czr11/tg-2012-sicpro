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
			?> Usuarios
			
		</div>
	</div>
<?php $this->end(); ?>
<div style='margin:4px 0' >
	<?php echo $this->Html->link(
		'Registrar usuario', 
		array('controller' => 'users', 'action' => 'add'),
		array('class'=>'k-button')
	); ?>
</div> 
<h2>Usuarios</h2>

<table id="grid">
    <tr>
        <th data-field="nombre">Nombre</th>
        <th data-field="username">Usuario</th>
        <th data-field="rol">Rol</th>
        <th data-field="accion" width="225px">Acción</th>
    </tr>

    <?php foreach ($usuarios as $usu): ?>
    <tr>
        <td><?php echo $usu['User']['nombre'].' '.$usu['User']['apellidos']; ?></td>
        <td><?php echo $usu['User']['username']; ?></td>
        <td><?php echo $usu['Rol']['rol']; ?></td>
      <td align="center">
            <?php echo $this->Html->link(
            	'Editar', 
            	array('action' => 'edit', $usu['User']['id']),
            	array('class'=>'k-button')
			);?>
			
            <?php echo $this->Form->postLink(
                'Eliminar',
                array('action' => 'persona_eliminar', $usu['User']['id']),
                array('confirm' => '¿Está seguro?','class'=>'k-button')
            )?>
            
       </td> 
    </tr>
    <?php endforeach; ?>
    <?php unset($personas); ?>
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
            			display: "{0} - {1} de {2} Personas",
            			empty: "No hay personas a mostrar",
            			page: "Página",
            			of: "de {0}",
            			itempsPerPage: "Personas por página",
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