<ul id="panelBar">
<?php $anterior = null; 
	foreach ($proyectos as $proy): ?>
	<?php if($proy['Proyecto']['idproyecto']!=$anterior){ ?>
	<li style="margin: 0;" >Proyecto: <?php echo $proy['Proyecto']['numeroproyecto'];?>
		<div style="padding: 30px 20px;">
			<br />Nombre Proyecto: <?php echo $proy['Proyecto']['nombreproyecto'];?>
			<br />Estado: <?php echo $proy['Proyecto']['estadoproyecto'];?><br />
			
			<h4>Fuentes Asignadas: </h4>
				<div id="tablagrid">
				<table id="grid">
				    <thead>
				    <tr>
				        <th data-field="Nombrefuente" width="85%">Nombre fuente</th>
				        <th data-field="Montofuente" width="20%">Monto</th>
				    </tr>
				    </thead>
				    <tbody>
				    <?php foreach ($proyectos as $fuentes): 
						if($fuentes['Proyecto']['idproyecto']==$proy['Proyecto']['idproyecto']) {?>
				   	<tr>
				   		<td><?php echo $fuentes['Fuentefinanciamiento']['nombrefuente'];?></td>
				   		<td><?php echo $fuentes['Financia']['montoparcial'];?></td>
				   	</tr>
				   	<?php } 
					endforeach?>
					</tbody>
				</table>
				</div>

			<h4>Contratos: </h4>
				<div id="tablagrid">
				<table id="grid">
				    <thead>
				    <tr>
				        <th data-field="Codigocontrato" width="20%">Codigo Contrato</th>
				        <th data-field="Nombrecontrato" width="35%">Nombre Contrato</th>
				        <th data-field="Estadocontrato" width="45%">Estado Contrato</th>
				    </tr>
				    </thead>
				    <tbody>
					<?php foreach ($contratos as $contra): 
						if($fuentes['Proyecto']['idproyecto']==$contra['idproyecto']) {?>
				   	<tr>
				   		<td><?php echo $contra['codigocontrato'];?></td>
				   		<td><?php echo $contra['nombrecontrato'];?></td>
				   		<td><?php echo $contra['estadocontrato'];?></td>
				   	</tr>
				   	<?php } 
					endforeach?>
					</tbody>
				</table>
				</div>
								
		<?php
			$anterior= $proy['Proyecto']['idproyecto'];
			}
			endforeach ?>
		</div>
	</li>
</ul>
<!--<?php echo "Proyectos"; Debugger::dump($proyectos); ?>
<?php echo "Contratos"; Debugger::dump($contratos); ?>-->

<style>
	#tablas {
		width: 500px;
		margin-left: 30px;
	}
	
	#Proyecto, #Contrato {
		border-collapse: collapse;
		color: black;
	}
	
	#Proyecto .primerac, #Contrato .primerac {
		font-family: "Trebuchet MS", Arial, sans-serif;
		font-weight: bold;
		text-align: right;
		padding-right: 10px;
		min-width: 80px;
	}
	
	/* 
	Cusco Sky table styles
	written by Braulio Soncco http://www.buayacorp.com
	*/

	#tablagrid table, #tablagrid th, #tablagrid td {
		border: 1px solid #D4E0EE;
		border-collapse: collapse;
		font-family: "Trebuchet MS", Arial, sans-serif;
		color: #555;
	}
	
	#tablagrid caption {
		font-size: 150%;
		font-weight: bold;
		margin: 5px;
	}
	
	#tablagrid td, #tablagrid th {
		padding: 4px;
		text-align: center;
	}
	
	#tablagrid thead th {
		text-align: center;
		background: #E6EDF5;
		color: #4F76A3;
		font-size: 100% !important;
	}
	
	#tablagrid tbody th {
		font-weight: bold;
	}
	
	#tablagrid tbody tr { background: #FCFDFE; }
	
	#tablagrid tbody tr.odd { background: #F7F9FC; }
	
	#tablagrid table a:link {
		color: #718ABE;
		text-decoration: none;
	}
	
	#tablagrid table a:visited {
		color: #718ABE;
		text-decoration: none;
	}
	
	#tablagrid table a:hover {
		color: #718ABE;
		text-decoration: underline !important;
	}
	
	#tablagrid tfoot th, #tablagrid tfoot td {
		font-size: 100%;
		font-weight: bold;
	}

</style>

<script>
	
	$(document).ready(function() {
    $("#panelBar").kendoPanelBar();
});
</script>