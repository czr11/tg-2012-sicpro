<div class="navmenu" style="margin:0px auto; width: 970px">
						<ul id="menu">
							<li>Proyectos
								<ul>	
									<li disabled="disabled">Consultar ficha t&eacute;cnica</li>
								</ul>
							</li>
							<li>Contratos
								<ul>
									<li><?php echo $this->Html->link('Consultar contrato', array('controller' => 'Contratos','action'=>'contrato_consultar')); ?></li>
								</ul>
							</li>
							<li>Control y seguimiento
								<ul>
									<li disabled="disabled">Consultar Programaci&oacute;n</li>
									<li disabled="disabled">Consultar informe supervisi&oacute;n</li>
									<li><?php echo $this->Html->link('Consultar Estimación de Avance', array('controller' => 'Estimacions','action'=>'estimacion_consultar')); ?></li>
									<li>Informe t&eacute;cnico
										<ul>
											<li><?php echo $this->Html->link('Registrar informe técnico', array('controller' => 'Informetecnicos','action'=>'informetecnico_registrar')); ?></li>
											<li disabled="disabled">Modificar informe t&eacute;cnico</li>
											<li disabled="disabled">Eliminar informe t&eacute;cnico</li>
											<li><?php echo $this->Html->link('Consultar informe técnico', array('controller' => 'Informetecnicos','action'=>'informetecnico_consultar')); ?></li>
										</ul>
									</li>	
								</ul>
							</li>	
							<li>Reportes
								<ul>
									<li><?php echo $this->Html->link('Reporte general de proyecto', array('controller' => 'Proyectos','action'=>'proyecto_reportegeneral')); ?></li>
									<li><?php echo $this->Html->link('Consultar avances de contratos ', array('controller' => 'Contratos','action'=>'avancecontrato')); ?></li>
									<li><?php echo $this->Html->link('Estado de proyecto y contratos ', array('controller' => 'Proyectos','action'=>'proyecto_consultaestados')); ?></li>
								</ul>
							</li>
							<li>Perfil
								<ul>
									<li disabled="disabled">Modificar perfil</li>
									<li><?php echo $this->Html->link('Cambiar Contraseña', array('controller' => 'Users','action'=>'cambiarpass')); ?></li>
									<li disabled="disabled">Consultar perfil</li>
								</ul>
							</li>
							
						</ul>
				</div>	
