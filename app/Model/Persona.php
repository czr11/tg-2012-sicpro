<?php
    class Persona extends AppModel 
    {
	    public $name = 'Persona';
		public $useTable = 'persona';
		public $primaryKey = 'idpersona';
		
		public $belongsTo = array(
				'Plaza' => array(
					'className'    => 'Plaza',
					'foreignKey'   => 'idplaza'
					),
				'Cargofuncional' => array(
					'className'=> 'Cargofuncional',
					'foreignKey' => 'idcargofuncional'
					) 
				);
		public $hasMany = array(
		        'User' => array(
		            'className'     => 'User',
		            'foreignKey'    => 'idpersona',
		            'conditions'    => array('User.estado' => TRUE)
		        )
		    );
		
	public $validate = array(
		'nombrespersona' => array(
		    'soloLetras' => array(
				'rule'    => '/^[a-zA-ZáéíóúAÉÍÓÚÑñ\s]{2,}$/i',
	        	'message' => 'Solo Letras'
	        	)),
			
		'apellidospersona'=> array(
			'soloLetras' => array(
				'rule'    => '/^[a-zA-ZáéíóúAÉÍÓÚÑñ\s]{2,}$/i',
	        	'message' => 'Solo Letras'
	        	)),
	        	
	    'correoelectronico' => array(    
	    	'email' => array(        
	    		'rule' => array('email'),
	    		'message' => 'Por favor indique una dirección de correo electrónico válida.'
				)),
		'username' => array(
				'rule'    => array('between', 5, 15),
	            'message' => 'Nombre de usuario entre 5 y 20 caracteres',
			),
		'password' => array(
		        'rule'    => array('between', 6, 15),
		        'message' => 'Passwords must be between 5 and 15 characters long.'
		    )
		
	);
	
	public function beforeValidate($options = array()) {
		parent::beforeValidate(); 
	    if (!empty($this->data['Persona']['telefonocontacto'])) {
	        $this->data['Persona']['telefonocontacto'] = $this->numberFormatBeforeSave($this->data['Persona']['telefonocontacto']);
	    }
	    return true;
	}
	
	public function numberFormatBeforeSave($numberString) {
	    return str_replace("-", "", $numberString);
	}
	
		public $virtualFields = array(
		'nombrecompleto' => "initcap(nombrespersona || ' ' || apellidospersona)"
		
	);
	
	}
