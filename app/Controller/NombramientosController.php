<?php
class NombramientosController extends AppController {
    public $helpers = array('Html', 'Form', 'Session','Ajax','Javascript','Js');
    public $components = array('Session','RequestHandler');
	public $uses = array('Contrato','Persona','Nombramiento','Proyecto','Contratoconstructor');
	
	public function Nombramiento_asignartecnico(){
		$this->layout = 'cyanspark';
		//$selected = $this->Nombramiento->find('all',array('conditions' => array('Nombramiento.idcontrato' => '1')));
		//$d = Hash::extract($selected,'{n}.Nombramiento.idpersona');
		
		if ($this->request->is('post')) {
				    // it validated logic
				    Debugger::dump($this->request->data);
					$this->Nombramiento->set('idpersona', $this->request->data['disponibles']);
					$this->Nombramiento->set('idcontrato', $this->request->data['Nombramiento']['contratos']);
					//$this->Nombramiento->set('fechanombramiento', $this->request->data['Nombramiento']['fechanombramiento']);
					$this->Nombramiento->set('userc', $this->Session->read('User.username'));			
				    if ($this->Nombramiento->save()) {
				    	$tecnico=$this->Persona->findByIdpersona($this->request->data['disponibles']);
						$contrato=$this->Contratoconstructor->findByIdcontrato($this->request->data['Nombramiento']['contratos']);
		            	$this->Session->setFlash('Tecnico "'. $tecnico['Persona']['nombrespersona'] .' '. $tecnico['Persona']['apellidospersona'] .'" Asignado al contrato "'. $contrato['Contratoconstructor']['codigocontrato'] .'".','default',array('class'=>'success'));
		            	//$this->redirect(array('controller' => 'fichatecnicas','action' => 'add'));
		            	$this->redirect(array('controller' => 'Nombramientos','action' => 'Nombramiento_asignartecnico'));
		        	} else {
		            	$this->Session->setFlash('No se pudo realizar el registro' /*. $this->data['Fichatecnica']['idfichatenica'] */);
		        	}
    	}
	}

	public function Nombramiento_desasignartecnico()
	{
		echo "Eliminando..";
		Debugger::dump($this->request->data);
		
	}
	
	
	
	public function proyectojson() {
		$conditions =
		array(
		    'OR' => array(
		        array('Proyecto.estadoproyecto' => 'Ejecucion'),
		        array('Proyecto.estadoproyecto' => 'Adjudicacion')
				)
			);
		$proyectos = $this->Proyecto->find('all',array(
			'fields' => array('Proyecto.idproyecto', 'Proyecto.numeroproyecto'), 
			'conditions' => $conditions,
			'order' => array('Proyecto.numeroproyecto')
		));
		$this->set('proyectos', Hash::extract($proyectos, "{n}.Proyecto"));
		$this->set('_serialize', 'proyectos');
		$this->render('/json/jsondata');
	}
	
	public function contratojson() {
		$contratos = $this->Contratoconstructor->find('all',array(
			'fields' => array('Contratoconstructor.idproyecto','Contratoconstructor.idcontrato', 'Contratoconstructor.codigocontrato'),
			'order' => array('Contratoconstructor.codigocontrato')
		));
		$this->set('contratos', Hash::extract($contratos, "{n}.Contratoconstructor"));
		$this->set('_serialize', 'contratos');
		$this->render('/json/jsondatad');
	}
	
					
				/*$this->set('informacion', Set::combine($contrato,
				"{s}.Contratoconstructor.nombrecontrato",
				"{s}.Contratoconstructor.estadocontrato"
				));*/	
	
	function update_multic(){
				 if (!empty($this->data['Nombramiento']['contratos']))
		                {
		                        //$contrato_id = $this->data['Estado']['contratos']['idcontrato'];
								$contrato_id = $this->data['Nombramiento']['contratos'];
								
		                        $contrato= $this->Nombramiento->find('all', array(
			                        'fields'=>array(
			                        'Persona.idpersona','Persona.nombrespersona' || 'Persona.apellidospersona'),
			                        'conditions'=>array('Nombramiento.idcontrato'=>$contrato_id)));
						$this->set('informacion',$contrato);
		                }
				$this->render('/Elements/update_multic', 'ajax');
	}

	function update_tecdispo(){
				 if (!empty($this->data['Nombramiento']['contratos']))
		                {
		                        //$contrato_id = $this->data['Estado']['contratos']['idcontrato'];
								$contrato_id = $this->data['Nombramiento']['contratos'];
		
		$per= $this->Persona->find('all', array(
			                        'fields'=>array(
			                        'Persona.idpersona','Persona.nombrespersona', 'Persona.apellidospersona'),

			'conditions' => array('Persona.idpersona NOT IN (SELECT idpersona FROM sicpro2012.nombramiento where nombramiento.idcontrato = '.$contrato_id.')',
									'Persona.idcargofuncional'=> '5')
											));
		//Tenicos disponibles para ser asignados al contrato seleccinoado
		$this->set('disponibles',$per);
		
		$per2= $this->Nombramiento->find('all', array(
			                        'fields'=>array(
			                        'Persona.idpersona','Persona.nombrespersona', 'Persona.apellidospersona'),
			'conditions' => array('Nombramiento.idcontrato' => $contrato_id)
											));
		//Tecnicos que estan asignados al contrato seleccinado
		$this->set('seleccionados',$per2);

		                }
				$this->render('/Elements/update_multic', 'ajax');
	}

}