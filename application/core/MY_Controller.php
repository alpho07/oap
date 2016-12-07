<?php

require APPPATH . 'third_party/AfricasTalkingGateway.php';
require APPPATH . 'third_party/PHPMailerAutoload.php';
require APPPATH . 'third_party/PHPMailer.php';

class MY_Controller extends CI_Controller {

    private $_API = '';
    private $_Auth = '';
    private $Mailer = '';
    Private $_SMS = '';
    private $_smsuser = 'Dindi';
    private $_smskey = '4824103407c20a26c3dca5b5888b7fffd5f952060ebc07dd59e57d2fde5b9e2d';

    function __construct() {
         $this->allow_get_array = TRUE;
        parent::__construct();
        $this->_API = new API;
        $this->_Auth = new User_authentication;
        $this->_SMS = new AfricasTalkingGateway($this->_smsuser, $this->_smskey);
        $this->Mailer = new PHPMailer;
        $this->load->library('email');
        $config['protocol'] = 'smtp';
        $config['smtp_host'] = 'ssl://smtp.googlemail.com';
        $config['smtp_port'] = '465';
        $config['smtp_timeout'] = '7';
        $config['smtp_user'] = 'ictechshop@gmail.com';
        $config['smtp_pass'] = 'techshop2016';
        $config['charset'] = 'utf-8';
        $config['newline'] = "\r\n";
        $config['mailtype'] = 'html'; // or html
        $config['validation'] = TRUE; // bool whether to validate email or not 

        $this->email->initialize($config);
    }
    function isAuthorized(){
             if ($this->session->userdata('user_id') == TRUE ) {
            
        } else {
            redirect('/');
        }
    }

    function sendUMAIL($email, $name, $package) {
        $message = "Hello $name,<br> Your SMARTSchema Account upgrade to  <strong>" . $package . "</strong> has successfully completed.";

        $this->email->from('noreply@ictech.co.ke', 'SMARTSchema Upgrade Agent');
        $this->email->to($email);
        $this->email->subject('PACKAGE UPGRADE');
        $this->email->message($message);
        $this->email->send();
        //echo $this->email->print_debugger();
    }

    function sendPText($phone, $name, $code) {

        $new = substr($phone, 1);

        echo $recipients = "+254" . $new;
        $message = "Hello $name, Thank you for purchasing SMARTSchema please use this code $code to activate your product.";
        $from = '20880';
        $gateway = $this->_SMS;

        try {
            $results = $gateway->sendMessage($recipients, $message, $from);
            foreach ($results as $result) {
                // Note that only the Status "Success" means the message was sent
                echo " Number: " . $result->number;
                echo " Status: " . $result->status;
                echo " MessageId: " . $result->messageId;
                echo " Cost: " . $result->cost . "\n";
            }
        } catch (AfricasTalkingGatewayException $e) {
            echo "Encountered an error while sending: " . $e->getMessage();
        }
    }

    function pagination($controller, $method, $id, $view = 'grid', $per_page, $table) {
        if ($this->input->get('view')) {
            $view = $this->input->get('view');
        } else {
            $view = 'grid';
        }
        $config['base_url'] = base_url() . '/' . $controller . '/' . $method . "/?view=$view";
        $config['total_rows'] = $this->_API->getTotal($table);
        $config['per_page'] = $per_page;
        $config['use_page_numbers'] = TRUE;
        $config['uri_segment'] = 3;
        $config['num_links'] = 6;
        $config['page_query_string'] = TRUE;
        $config['query_string_segment'] = 'page';
        $config['full_tag_open'] = '<div><ul class="pagination">';
        $config['full_tag_close'] = '</ul></div><!--pagination-->';
        $config['first_link'] = '&laquo; First';
        $config['first_tag_open'] = '<li class="prev page">';
        $config['first_tag_close'] = '</li>';
        $config['last_link'] = 'Last &raquo;';
        $config['last_tag_open'] = '<li class="next page">';
        $config['last_tag_close'] = '</li>';
        $config['next_link'] = 'Next &rarr;';
        $config['next_tag_open'] = '<li class="next page">';
        $config['next_tag_close'] = '</li>';
        $config['prev_link'] = '&larr; Previous';
        $config['prev_tag_open'] = '<li class="prev page">';
        $config['prev_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li class="page">';
        $config['num_tag_close'] = '</li>';

        $config['anchor_class'] = 'follow_link';

        $this->pagination->initialize($config);
        return $this->pagination->create_links();
    }
    
    
      function spagination($controller, $method, $id, $view = 'grid', $per_page, $table,$query,$offset) {
        if ($this->input->get('view',TRUE)) {
            $view = $this->input->get('view',TRUE);
        } else {
            $view = 'grid';
        }
        $config['base_url'] = base_url() . '/' . $controller . '/' . $method . "/".$id."/?view=$view";
        $config['total_rows'] = $this->_API->getSearchCount($query);
        $config['per_page'] = $per_page;
        $config['use_page_numbers'] = TRUE;
        $config['uri_segment'] = 3;
        $config['num_links'] = 6;
        $config['page_query_string'] = TRUE;
        $config['query_string_segment'] = 'page';
        $config['full_tag_open'] = '<div><ul class="pagination">';
        $config['full_tag_close'] = '</ul></div><!--pagination-->';
        $config['first_link'] = '&laquo; First';
        $config['first_tag_open'] = '<li class="prev page">';
        $config['first_tag_close'] = '</li>';
        $config['last_link'] = 'Last &raquo;';
        $config['last_tag_open'] = '<li class="next page">';
        $config['last_tag_close'] = '</li>';
        $config['next_link'] = 'Next &rarr;';
        $config['next_tag_open'] = '<li class="next page">';
        $config['next_tag_close'] = '</li>';
        $config['prev_link'] = '&larr; Previous';
        $config['prev_tag_open'] = '<li class="prev page">';
        $config['prev_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li class="page">';
        $config['num_tag_close'] = '</li>';

        $config['anchor_class'] = 'follow_link';

        $this->pagination->initialize($config);
        return $this->pagination->create_links();
    }
    
    
    
    

    function saveData($table, $data) {
        $this->_API->Save($table, $data);
    }

    function Update($id, $table, $data) {
        $this->_API->Update($id, $table, $data);
    }

    function Activate($id, $table) {
        $data = array('user_status' => '1');
        $this->_API->Activate($id, $table, $data);
        redirect('home/userdashboard');
    }

    function Deactivate($id, $table) {
        $data = array('user_status' => '0');
        $this->_API->Deactivate($id, $table, $data);
        redirect('home/userdashboard');
    }

    function Delete($id, $table) {
        $this->_API->Delete($id, $table);
        redirect('home/userdashboard');
    }

    function adminAdActivate($id, $table) {
        $data = array('admin_status' => '1');
        $this->_API->Activate($id, $table, $data);
        redirect('admin/ads');
    }

    function adminAdDeactivate($id, $table) {
        $data = array('admin_status' => '0');
        $this->_API->Deactivate($id, $table, $data);
        redirect('admin/ads');
    }

    function adminAdDelete($id, $table) {
        $this->_API->Delete($id, $table);
        redirect('admin/ads');
    }

    function adminObActivate($id, $table) {
        $data = array('admin_status' => '1');
        $this->_API->Activate($id, $table, $data);
        redirect('admin/obituaries');
    }

    function adminObDeactivate($id, $table) {
        $data = array('admin_status' => '0');
        $this->_API->Deactivate($id, $table, $data);
        redirect('admin/obituaries');
    }

    function adminObDelete($id, $table) {
        $this->_API->Delete($id, $table);
        redirect('admin/obituaries');
    }

    function DeleteAccount($id, $table) {
        $this->_API->Delete($id, $table);
        $this->_Auth->kill_session();
    }

    function _POST($name) {
        return $this->input->post($name);
    }

    function _SESSION() {
        return $this->session->userdata('user_id');
    }

    function TemplateBuilder($data) {
        $data['categories']=  $this->_API->getData('categories');
        $this->load->view('_layout', $data);
    }

}
