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
			?> Proyectos » Detalles
			
		</div>
	</div>
<?php $this->end(); ?>

<ul>
		<h3>Nombre proyecto:</h3>
			<?php echo $proyectos['Proyecto']['nombreproyecto']; ?>
		<h3>Número proyecto: </h3>
			<?php echo $proyectos['Proyecto']['numeroproyecto']; ?>
		<h3>Monto planeado:</h3>
			<?php echo ($proyectos['Proyecto']['montoplaneado']); ?>
		<h3>Estado proyecto: </h3>
			<?php echo ($proyectos['Proyecto']['estadoproyecto']); ?>
		<h3>División responsable:</h3>
			<?php echo ($proyectos['Division']['divison']); ?>
	
</ul>