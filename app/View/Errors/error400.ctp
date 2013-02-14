<?php $this->layout = 'cyanspark'; ?>

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
			?> » Error 404
			
		</div>
	</div>
<?php $this->end(); ?>


<h2><?php echo $name; ?> </h2>

<div class="pagerror">

<div style="float: left; display: table; margin-top: width: 210px; height: 215px;">
	<?php echo $this->Html->image('no-encontrado.png', array('alt' => 'Página no encontrada')); ?>
</div>


<div style="float: right; width: 360px; height: 215px; padding: 10px 20px;">
	<?php echo $name; ?>. Esto se puede deber a alguna de las siguientes causas: 
	<br />
	<ul>
		<li> El elemento ha sido eliminado del sistema. </li>
		<li> El elemento no existe o no ha sido encontrado. </li>
		<li> La pagina no se encuentra disponible. </li>
	</ul>
	<br />
	Regrese a la página de inicio e intentelo nuevamente
</div>
</div>


<style>
	.pagerror {
		width: 610px;
		height: 400px;
		margin: 25px auto;
		color: black;
		font-size: 115%;
	}
	
	.pagerror ul {
		margin: 20px 0  0 50px;
		
	}
	
	.pagerror img {
		margin: 20px 0 0;
		border: none !important;
		vertical-align: middle;
	}
</style>