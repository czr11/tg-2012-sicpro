<!-- File: /app/View/Empresas/empresa_rephistorial_result.ctp -->
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
			?> » Reportes » Historial de empresa » Resultados
			
		</div>
	</div>
	
<?php $this->end(); ?>

<div id="example" class="k-content">
	<div id="formulario">
		<?php echo $this->Form->create('Empresa',array('action' => 'empresa_rephistorial_result','target' => '_blank')); ?>
		<h2><?php echo "Historial de ". $nombre?></h2>
		<h3>Contratos que ha supervisado:</h3>
		<div id= tablagrid>
			<table>
				<thead>
					<tr>
						<th data-field="codigo">Código</th>
						<th data-field="monto">Monto</th>
						<th data-field="orden">Orden de inicio</th>
						<th data-field="plazo">Plazo(días)</th>
						<th data-field="admin">Administrador</th>
						<th data-field="empresa">Empresa supervisada</th>
					</tr>
					<?php foreach ($datos as $dat): ?>
						<tr>
							<td width="75px"><?php echo $dat['Empresaconsuper']['codigosuper'];?></td>
							<td width="85px"><?php echo "$".number_format($dat['Empresaconsuper']['montooriginal'],2);?></td>
							<td width="85px"><?php 
									if(isset($dat['Empresaconsuper']['ordeninicio']))
											echo date('d/m/Y',strtotime($dat['Empresaconsuper']['ordeninicio']));
										else
											echo "No definida";
								?></td>
							<td width="70px"><?php echo $dat['Empresaconsuper']['plazoejecucion'];?></td>
							<td width="100px"><?php echo $dat['Empresaconsuper']['nomcompleto'];?></td>
							<td width="125px"><?php echo $dat['Empresaconsuper']['constructora'];?></td>
						</tr>
					<?php endforeach; ?>
				</thead>
			</table>
		</div>
		<ul>
			<li  class="accept">
			<table>
				<tr>
					<td>
						<?php echo $this->Form->input('Empresa.empresasup', 
							array('type' => 'hidden',
								  'value'=> $datos[0]['Empresaconsuper']['empresasup'])); ?>
						<?php echo $this->Form->end(array('label' => 'Generar PDF', 
									'class' => 'k-button', 'id' => 'button')); ?>
					</td>
					<td>
						<?php echo $this->Html->link('Regresar', 
							array('controller' => 'Empresas','action' => 'empresa_rephistorial'),
							array('class'=>'k-button')); ?>
					</td>
				</tr>
			</table>
			</li>
		</ul>
		<?php unset($datos); ?>	
	</div>
</div>

<style scoped>

                form .requerido label:after {
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
                    width: 200px;
                    text-align: right;
                    margin-right: 5px;
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
                
                #tablagrid table, #tablagrid th, #tablagrid td {
					border: 1px solid #D4E0EE;
					border-collapse: collapse;
					font-family: "Trebuchet MS", Arial, sans-serif;
					color: #555;
				}
				
				#tablagrid caption {
					font-size: 100%;
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
                    
                    var validator = $("#formulario").kendoValidator().data("kendoValidator"),
                    status = $(".status");

                    $("#button").click(function() {
                        if (validator.validate()) {
                        	save();  
                        } 
                    });
                
                
            </script>