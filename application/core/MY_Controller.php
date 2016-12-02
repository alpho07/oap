<?php

class MY_Controller extends CI_Controller {

    private $_API = '';
    private $_Auth = '';

    function __construct() {
        parent::__construct();
        $this->_API = new API;
        $this->_Auth = new User_authentication;
    }

    function pagination($controller, $method,$id,$view='grid', $per_page,$table) {
           if($this->input->get('view')){
               $view = $this->input->get('view');
           }else{
               $view = 'grid';
           }
        $config['base_url'] = base_url() . '/' . $controller . '/' . $method."/?view=$view";
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

    function _POST($name) {
        return $this->input->post($name);
    }

    function _SESSION() {
        return $this->session->userdata('user_id');
    }

    function TemplateBuilder($data) {
        $this->load->view('_layout', $data);
    }

}
