<?php
class ContratosController extends AppController {
    public $helpers = array('Html', 'Form', 'Session','Ajax');
   public $components = array('Session','AjaxMultiUpload.Upload','RequestHandler');
	public $uses = array('Contrato','Contratoconstructor','Contratosupervisor','Proyecto');

    public function index() {
    	$this->layout = 'cyanspark';
        $this->set('contratos', $this->Contrato->find('all'));
    }
	
	 
	 
	 public function addordeninicio($id=null) {
		$this->layout = 'cyanspark';
		
		
        if ($this->request->is('post')) 
        {
        	//Debugger::dump($this->request->data);	
        	$id = $this->request->data['Contrato']['contratos'];
			$this->Contrato->create();
			$tipo = $this->Contrato->field('tipocontrato',array('idcontrato'=>$id));
			//Debugger::dump($tipo);
            $this->Contrato->set('idcontrato', $this->request->data['Contrato']['contratos']);
            $this->Contrato->set('ordeninicio', $this->request->data['Contrato']['ordeninicio']);
			$this->Contrato->set('userm', $this->Session->read('User.username'));
			$this->Contrato->set('modificacion', date('Y-m-d h:i:s'));
			$this->Contrato->set('estadocontrato','en marcha');
			if($this->Contrato->save($id, array('fieldList'=>array('ordeninicio','userm','modificacion','estadocontrato'))))
			{
            	//Verifica el tipo de contrato para actualizar en la tabla correspondiente
            	//Primero se verifica si es de construccion
            	if($tipo=='Construcción de obras')
				{
					$this->Contratoconstructor->set('idcontrato', $this->request->data['Contrato']['contratos']);
		            $this->Contratoconstructor->set('ordeninicio', $this->request->data['Contrato']['ordeninicio']);
					$this->Contratoconstructor->set('userm', $this->Session->read('User.username'));
					$this->Contratoconstructor->set('modificacion', date('Y-m-d h:i:s'));
					$this->Contratoconstructor->set('estadocontrato','en marcha');
					if($this->Contratoconstructor->save($id, array('fieldList'=>array('estadocontrato','ordeninicio','userm','modificacion'))))
					{
						$this->Session->setFlash('La Orden de Inicio ha sido registrada.','default',array('class'=>'success'));
            			$this->redirect(array('controller'=>'mains', 'action' => 'index'));
					}
					else 
					{
						$this->Session->setFlash('No se pudo realizar el registro');
					}
				}
				//Si no es de construccion se asume es de supervision
				else 
				{
					$this->Contratosupervisor->set('idcontrato', $this->request->data['Contrato']['contratos']);
		            $this->Contratosupervisor->set('ordeninicio', $this->request->data['Contrato']['ordeninicio']);
					$this->Contratosupervisor->set('userm', $this->Session->read('User.username'));
					$this->Contratosupervisor->set('modificacion', date('Y-m-d h:i:s'));
					$this->Contratosupervisor->set('estadocontrato','en marcha');
					if($this->Contratosupervisor->save($id, array('fieldList'=>array('estadocontrato','ordeninicio','userm','modificacion'))))
					{
						$this->Session->setFlash('La Orden de Inicio ha sido registrada.','default',array('class'=>'success'));
            			$this->redirect(array('controller'=>'mains', 'action' => 'index'));
					}
					else 
					{
						$this->Session->setFlash('No se pudo realizar el registro');
					}
	
				}
			}
			else 
			{
				$this->Session->setFlash('No se pudo realizar el registro');	
			}      	
        } 
    	else 
    	{
        		
        	//no es post
		}
	}
    
	public function contratojson() {
		$contratos = $this->Contrato->find('all',array(
			'fields' => array('Contrato.idproyecto','Contrato.idcontrato', 'Contrato.codigocontrato'),
			'conditions'=> array(
			'OR' => array('Contrato.ordeninicio' => null, 'Contrato.ordeninicio >= now()')),
			
			'order' => array('Contrato.codigocontrato')
		));
		
		$this->set('contratos', Hash::extract($contratos, "{n}.Contrato"));
		$this->set('_serialize', 'contratos');
		$this->render('/json/jsondatad');
	}

	public function proyectojson() {
		$proyectos = $this->Proyecto->find('all',array(
					'fields' => array('Proyecto.idproyecto', 'Proyecto.numeroproyecto'),
					'conditions' => array('Proyecto.estadoproyecto' => array('Ejecucion','Adjudicacion')),
					'order'=>'Proyecto.numeroproyecto'
		 ));
		$this->set('proyectos', Hash::extract($proyectos, "{n}.Proyecto"));
		$this->set('_serialize', 'proyectos');
		$this->render('/json/jsondata');
		
	}
	
	public function proyectoordenjson() {
		$proyectos = $this->Contrato->find('all',array(
					'fields' => array('DISTINCT Proyecto.idproyecto', 'Proyecto.numeroproyecto'),
					'conditions' => array('Proyecto.estadoproyecto' => array('Ejecucion','Adjudicacion'),
						'OR' => array('Contrato.ordeninicio' => null, 'Contrato.ordeninicio >= now()')),
					'order'=>'Proyecto.numeroproyecto')
		 );
		$this->set('proyectos', Hash::extract($proyectos, "{n}.Proyecto"));
		$this->set('_serialize', 'proyectos');
		$this->render('/json/jsondata');
		
	}

	public function edit() {
	    $this->layout = 'cyanspark';

				
		//llenar el array
	    	$this->set('contratos', $this->Contrato->find('list',
		array ('fields'=> array ('idcontrato', 'codigocontrato') ) ));
	        
	        //preguntar si es post
		if ($this->request->is('post')) {
			$id = $this->request->data['Contrato']['contratos'];
			$this->Contrato->read(null, $id);	    	
			$this->Contrato->set('ordeninicio', $this->request->data['Contrato'] ['ordeninicio']);
			//aqui no se si deberias de poner la modificacion del usuario y la fecha
			
	        	if ($this->Contrato->save($id)) {
		            $this->Session->setFlash('La Orden de Inicio ha sido actualizada.');
		            $this->redirect(array('action' => 'index'));
	        	} else {
		            	$this->Session->setFlash('Imposible editar Orden de Inicio');
        		}
	    }
	}
	
	
	public function delete($id) {
		if (!$this->request->is('post')) {
	        throw new MethodNotAllowedException();
	    }
	    if ($this->Contrato->delete($id)) {
	        $this->Session->setFlash('La Orden de Inicio ha sido eliminada.');
	        $this->redirect(array('controller'=>'mains', 'action' => 'index'));
	    }
	}
	
		function update_infoinicio(){
				 if (isset($this->data['Contrato']['contratos']) && !empty($this->data['Contrato']['contratos']))
		                {
		                        //$contrato_id = $this->data['Estado']['contratos']['idcontrato'];
								$contrato_id = $this->data['Contrato']['contratos'];
		                        $contrato= $this->Contrato->find('first', array(
			                        'fields'=>array(
			                        'Contrato.nombrecontrato','Contrato.fechainiciocontrato','Contrato.fechafincontrato','Contrato.ordeninicio'),
			                        'conditions'=>array('Contrato.idcontrato'=>$contrato_id)));
						$this->set('informacion',$contrato);
		                }
				
				 	
				//Debugger::dump($contrato);
				
				/*$this->set('informacion', Set::combine($contrato,
				"{s}.Contratoconstructor.nombrecontrato",
				"{s}.Contratoconstructor.estadocontrato"
				));*/		
				$this->render('/Elements/update_infoinicio', 'ajax');
	}	
}


	