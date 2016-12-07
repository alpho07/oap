<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends MY_Controller {

    private $_Auth = '';
    private $_API = '';

    public function __construct() {
        parent::__construct();
        $this->_Auth = new User_authentication;
        $this->_API = new API;
    }



    public function newuser() {

             $uid = 'USR' . date('YdmHis');

            $user = array(
                'id' => $uid,
                'name' => $this->_POST('fullname'),
                'phone' => $this->_POST('phone'),
                'email' => $this->_POST('email'),
                'password' => $this->_Auth->cryptPass($this->_POST('password')),
                'code' => rand(0, 5) . date('Hs'),
            );
            // $this->sendNotification();

            $this->saveData('users', $user);
          
        }
    

   
  

}
