<?php
// app/Model/User.php
class User extends AppModel {
    public $name = 'User';

	public $belongsTo = array(
			'Rol' => array(
				'className'    => 'Rol',
				'foreignKey'   => 'idrol'
				) 
			);
			
    public $validate = array(
        'username' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'El Nombre de Usuario es obligatorio'
            )
        ),
        'password' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'La Contraseña es obligatoria'
            )
        ),
        'nombrespersona'=>array(
			'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'Ingrese nombre del usuario'
            ),
            'soloLetras' => array(
				'rule'    => '/^[a-zA-ZáéíóúAÉÍÓÚÑñ\s]{2,}$/i',
	        	'message' => 'Solo Letras'
	        )
		),
		'apellidospersona'=>array(
			'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'Ingrese apellido del usuario'
            ),
            'soloLetras' => array(
				'rule'    => '/^[a-zA-ZáéíóúAÉÍÓÚÑñ\s]{2,}$/i',
	        	'message' => 'Solo Letras'
	        )
		),
		'roles'=>array(
			'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'Seleccione'
            )
		),
		'estado'=>array(
			'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'Seleccione'
            )
		)
        
		
    );
	
	
	public function beforeSave($options = array()) {
	    if (isset($this->data[$this->alias]['password'])) {
	        $this->data[$this->alias]['password'] = AuthComponent::password($this->data[$this->alias]['password']);
	    }
	    return true;
	}
}