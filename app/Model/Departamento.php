<?php
class Departamento extends AppModel {
	public $name = 'Departamento';
	public $useTable = 'departamento';
    public $primaryKey = 'iddepartamento';
	
    public $validate = array(
		'codigodepartamento' => array(
	    	'numeric' => array(
	        	'rule'    => 'numeric',
	        	'required' => true,
	        	'allowEmpty' => false,
	            'message' => 'Solo números son permitidos',
	            'last'    => true
	         ),
	        'isUnique' => array(
	            'rule'    => 'isUnique',
	            'message' => 'El Codigo Departamento ya ha sido ingresado'
	        ),
	        'minLenght' => array(
	            'rule'    => array('minLength', 2),
        		'message' => 'Codigo Departamento debe de tener al menos 2 caracteres.'
	        )
	    ),
	    'departamento' => array(
	        'isUnique' => array(
	            'rule'    => 'isUnique',
	            'required' => true,
	            'allowEmpty' => false,
	            'message' => 'El Departamento ya existe'
	        ),
	    'soloLetras' => array(
			'rule'    => '/^[a-zA-Z][a-zA-ZáéíóúAÉÍÓÚÑñ\s]{2,}$/i',
        	'message' => 'Solo Letras'
			)
		),
	);
}