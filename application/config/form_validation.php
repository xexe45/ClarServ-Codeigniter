<?php
/**
 * Reglas de validacion para formularios
 */
$config = array(
       
        /**
         * add_formulario
         * */
        'add_usuario'
        => array( //dentro de este arreglo crear una linea de arreglos por cada campo que quiera trabajar
            
            array('field' => 'nombres','label' => 'Nombres de Usuario','rules' => 'required|is_string|trim|max_length[255]'),
            array('field' => 'apellidos','label' => 'Apellidos de Usuario','rules' => 'required|is_string|trim|max_length[255]'),
            array('field' => 'dni','label' => 'DNI','rules' => 'required|numeric|trim|exact_length[8]'),
            array('field' => 'telefono','label' => 'Teléfono Principal','rules' => 'required|numeric|trim|max_length[15]'),
            array('field' => 'direccion','label' => 'Dirección','rules' => 'required|is_string|trim'),
            array('field' => 'rol','label' => 'Rol de Usuario','rules' => 'required|numeric|trim'),
            array('field' => 'email','label' => 'Email de Usuario','rules' => 'required|is_string|trim|valid_email'),
            array('field' => 'password','label' => 'Password','rules' => 'required|is_string|trim'),
        ),

        'update_usuario'
        => array( //dentro de este arreglo crear una linea de arreglos por cada campo que quiera trabajar
            
            array('field' => 'nombres_e','label' => 'Nombres de Usuario','rules' => 'required|is_string|trim|max_length[255]'),
            array('field' => 'apellidos_e','label' => 'Apellidos de Usuario','rules' => 'required|is_string|trim|max_length[255]'),
            array('field' => 'dni_e','label' => 'DNI','rules' => 'required|numeric|trim|exact_length[8]'),
            array('field' => 'telefono_e','label' => 'Teléfono Principal','rules' => 'required|numeric|trim|max_length[15]'),
            array('field' => 'direccion_e','label' => 'Dirección','rules' => 'required|is_string|trim'),
            array('field' => 'rol_e','label' => 'Rol de Usuario','rules' => 'required|numeric|trim'),
            array('field' => 'email_e','label' => 'Email de Usuario','rules' => 'required|is_string|trim|valid_email'),
            array('field' => 'estado_e','label' => 'Estado de Usuario','rules' => 'required|is_string|trim|exact_length[1]'),            
        ),  
        
        
        /**
         * elefante
         * */
        'add_rol'
        => array(
            array('field' => 'rol','label' => 'Rol','rules' => 'required|is_string|trim|max_length[100]'),
            array('field' => 'descripcion','label' => 'Descripción del rol','rules' => 'required|is_string|trim'),            
        ), 

        'add_modulo'
        => array(
            array('field' => 'modulo','label' => 'Módulo','rules' => 'required|is_string|trim|max_length[255]'),
                      
        ), 

 
        
        /**
         * manzana
         * */
        'add_servicio'
        => array(
            
            array('field' => 'plan','label' => 'Plan','rules' => 'required|is_string|trim|max_length[255]'),
            array('field' => 'descripcion','label' => 'Descripción de Plan','rules' => 'required|is_string|trim'),
            array('field' => 'precio_promo','label' => 'Precio de Promo','rules' => 'required|numeric|trim'),
            array('field' => 'precio_normal','label' => 'Precio Normal','rules' => 'required|numeric|trim'),
            
        ),

        'update_servicio'
        => array(
            
            array('field' => 'plan_e','label' => 'Plan','rules' => 'required|is_string|trim|max_length[255]'),
            array('field' => 'descripcion_e','label' => 'Descripción de Plan','rules' => 'required|is_string|trim'),
            array('field' => 'precio_promo_e','label' => 'Precio de Promo','rules' => 'required|numeric|trim'),
            array('field' => 'precio_normal_e','label' => 'Precio Normal','rules' => 'required|numeric|trim'),
            array('field' => 'estado_e','label' => 'Estado','rules' => 'required|is_string|trim|max_length[1]'),
            
        ),

          'add_cliente_interesado'
        => array( //dentro de este arreglo crear una linea de arreglos por cada campo que quiera trabajar
            
            array('field' => 'nombres','label' => 'Nombres de Cliente','rules' => 'required|is_string|trim|max_length[255]'),
            array('field' => 'apellidos','label' => 'Apellidos de Cliente','rules' => 'required|is_string|trim|max_length[255]'),
            array('field' => 'telefono','label' => 'Teléfono Principal','rules' => 'required|numeric|trim|max_length[15]'),
            array('field' => 'descripcion','label' => 'Descripción de consulta','rules' => 'required|is_string|trim'),
           
        ),

        'update_cliente_interesado'
        => array( //dentro de este arreglo crear una linea de arreglos por cada campo que quiera trabajar
            
            array('field' => 'nombres_e','label' => 'Nombres de Cliente','rules' => 'required|is_string|trim|max_length[255]'),
            array('field' => 'apellidos_e','label' => 'Apellidos de Cliente','rules' => 'required|is_string|trim|max_length[255]'),
            array('field' => 'telefono_e','label' => 'Teléfono Principal','rules' => 'required|numeric|trim|max_length[15]'),
            array('field' => 'descripcion_e','label' => 'Descripción de consulta','rules' => 'required|is_string|trim'),
           
        ),

        'add_cliente'
        => array( //dentro de este arreglo crear una linea de arreglos por cada campo que quiera trabajar
            
            array('field' => 'nombres','label' => 'Nombres de Cliente','rules' => 'required|is_string|trim|max_length[255]'),
            array('field' => 'apellidos','label' => 'Apellidos de Cliente','rules' => 'required|is_string|trim|max_length[255]'),
            array('field' => 'dni','label' => 'DNI','rules' => 'required|numeric|trim|exact_length[8]'),
            array('field' => 'telefono','label' => 'Teléfono Principal','rules' => 'required|numeric|trim|max_length[15]'),
            array('field' => 'direccion','label' => 'Direccion de cliente','rules' => 'required|is_string|trim'),
            array('field' => 'correo','label' => 'Correo electrónico de cliente','rules' => 'required|is_string|trim|valid_email'),
            array('field' => 'codigo','label' => 'Código de contrato','rules' => 'required|numeric|trim'),
            array('field' => 'servicio','label' => 'Servicio a instalar','rules' => 'required|numeric|trim'),
            array('field' => 'precio_promo','label' => 'Precio de Promo','rules' => 'required|numeric|trim'),
            array('field' => 'precio_normal','label' => 'Precio Normal','rules' => 'required|numeric|trim'),
            array('field' => 'instalacion','label' => 'Día a realizar instalación','rules' => 'required'),
           
        ),



          'add_producto'
        => array(
            
            array('field' => 'nombre','label' => 'Nombre','rules' => 'required|is_string|trim|max_length[100]'),
            array('field' => 'precio','label' => 'Precio','rules' => 'required|numeric|trim'),
            array('field' => 'stock','label' => 'Stock','rules' => 'required|numeric|trim'),
            
            
        ),

         'login'
        => array(
            
           array('field' => 'correo','label' => 'Correo ','rules' => 'required|is_string|trim|valid_email'),
            array('field' => 'pass','label' => 'Contraseña','rules' => 'required|is_string|trim'),
            
        ),
        



   
   //éste es el final      
);
