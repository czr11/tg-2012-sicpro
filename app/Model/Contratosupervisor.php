<?php
    class Contratosupervisor extends AppModel {
        public $name = 'Contratosupervisor';
		public $useTable = 'contratosupervisor';
		public $primaryKey = 'idcontrato';
		
		public $belongsTo = array(
			'Empresa'=> array(
				'className'    => 'Empresa',
				'foreignKey'   => 'idempresa'
				),
			'Persona'=> array(
				'className'    => 'Persona',
				'foreignKey'   => 'idpersona'
				),
			'Proyecto' => array(
				'className'    => 'Proyecto',
				'foreignKey'   => 'idproyecto'
				)
			);
			
		public $validate = array(
			'codigocontrato' => array(
				'isUnique' => array(
		        	'rule'    => 'isUnique',
		            'allowEmpty' => false,
	            	'message' => 'Este código de contrato ya ha sido asignado'
	        		)
				),
			'fechafincontrato' => array(
	        	'formatofecha'=>array(
					'rule'       => array('date', 'dmy'),
			        'message'    => 'Ingrese fecha fin con el siguiente formato DD/MM/AAAA.',
			        'allowEmpty' => true,
					'required'=>false
					)
				),
	        'fechainicontrato' => array(
		        'rule'       => array('date', 'dmy'),
		        'message'    => 'Ingrese fecha inicio con el siguiente formato DD/MM/AAAA.',
		        'allowEmpty' => true,
				'required'=>false) 
			);
					
		public function beforeSave($options = array()) {
		    if (!empty($this->data['Contratosupervisor']['fechainiciocontrato']) && !empty($this->data['Contratosupervisor']['fechafincontrato'])) {
		        $this->data['Contratosupervisor']['fechainiciocontrato'] = $this->dateFormatBeforeSave($this->data['Contratosupervisor']['fechainiciocontrato']);
		        $this->data['Contratosupervisor']['fechafincontrato'] = $this->dateFormatBeforeSave($this->data['Contratosupervisor']['fechafincontrato']);
	    
			}
			if(!empty($this->data['Contratosupervisor']['ordeninicio'] )){
				$this->data['Contratosupervisor']['ordeninicio'] = $this->dateFormatBeforeSave($this->data['Contratosupervisor']['ordeninicio']);
			}
		    return true;
		}
		
		public function dateFormatBeforeSave($dateString) {
		    
    		list($d, $m, $y) = explode('/', $dateString);
    		$mk=mktime(0, 0, 0, $m, $d, $y);
    		return strftime('%Y-%m-%d',$mk);
		}
		
	};
?>