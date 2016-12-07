<?php

class Auth extends MY_Controller {
      private $Auth='';
     
    function __construct() {
        parent::__construct();
        $this->Auth = new User_authentication;     
    }
    
    function index(){
       $data['page'] = 'content/_login_default';
        $this->TemplateBuilder($data);     
    }
    
    function login(){      
        
        $data['page'] = 'content/_login';
        $this->TemplateBuilder($data);  
    }
    
    function forgot(){      
        
         $data['page'] = 'content/front/forgot';
        $this->TemplateBuilder($data);  
    }
    
      function authorize(){       
        $this->load->view('pages/login');
    }
    
      function register(){       
        $this->load->view('pages/register');
    }
    
       function loginCheckout($mode){
           $data['check']=$mode;
          $data['page'] = 'content/_login';
        $this->builtIctShopTemplate($data);      
      }
      
      function authenticate(){
             $this->Auth->Authenticate_user_ck($this->_POST('username'), $this->_POST('password'));         
      }
      
      function verify($criteria,$data){
          $this->Auth->check_user_details($criteria, $data);
      }
      
      function authPhone($phone){
             $this->Auth->findUser($phone);         
      }
      function authCode($email,$code){
             $this->Auth->findCode($email,$code);         
      }
      
      function authReset($email){          
             $this->Auth->Reset($email,  $this->post('pass'));         
      }
      
      function logout(){
          $this->Auth->kill_session();
      }
      
     

}


