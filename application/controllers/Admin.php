<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends MY_Controller {

    private $_Auth = '';
    private $_API = '';

    public function __construct() {
        parent::__construct();
        if ($this->session->userdata('user_id') == TRUE && $this->session->userdata('type') > 0) {
            
        } else {
            redirect('/');
        }
        $this->_Auth = new User_authentication;
        $this->_API = new API;
    }

    public function AdminDashboard() {
        $data['content'] = 'pages/admindashboard';
        $data['ptitle'] = "Admin -> Dashboard";
        $data['title'] = "Admin Dashboard";
        $data['ads'] = $this->_API->getUsers();
        $data['messages'] = $this->_API->loadMessages();
        $data['mcount'] = $this->_API->unSolved();
        $this->load->view('pages/admin/admindashboard', $data);
    }

    public function reports() {
        $data['ptitle'] = "Admin -> Dashboard -> Reported Ads";
        $data['title'] = "Admin Dashboard - Reports";
        $data['ads'] = $this->_API->getReportedAds();
        $data['messages'] = $this->_API->loadMessages();
        $data['mcount'] = $this->_API->unSolved();
        $this->load->view('pages/admin/reports', $data);
    }
    public function settings() {
        $data['ptitle'] = "Admin -> Dashboard -> Category Settings";
        $data['title'] = "Admin Dashboard - Settings";
        $data['ads'] = $this->_API->getCategories();
        $data['messages'] = $this->_API->loadMessages();
        $data['mcount'] = $this->_API->unSolved();
        $this->load->view('pages/admin/cat_settings', $data);
    }

    public function ads() {
        $data['ptitle'] = "Admin -> Dashboard ->Normal Ads";
        $data['title'] = "Admin Dashboard -> Normal Ads";
        $data['ads'] = $this->_API->getAllUserAdsAdmin();
        $data['messages'] = $this->_API->loadMessages();
        $data['mcount'] = $this->_API->unSolved();
        $this->load->view('pages/admin/normal_ads', $data);
    }

    public function obituaries() {
        $data['ptitle'] = "Admin -> Dashboard ->Obituaries";
        $data['title'] = "Admin Dashboard - Obituaries";
        $data['ads'] = $this->_API->getAllUserObsAdmin();
        $data['messages'] = $this->_API->loadMessages();
        $data['mcount'] = $this->_API->unSolved();
        $this->load->view('pages/admin/obituaries', $data);
    }

    public function premium() {
        $data['ptitle'] = "Admin -> Dashboard -> Premium Ads";
        $data['title'] = "Admin Dashboard - Premium Ads";
        $data['ads'] = $this->_API->getPremiumAds();
        $data['messages'] = $this->_API->loadMessages();
        $data['mcount'] = $this->_API->unSolved();
        $this->load->view('pages/admin/premium_ads', $data);
    }

    public function payments() {
        $data['ptitle'] = "Admin -> Dashboard -> Payments";
        $data['title'] = "Admin Dashboard - Payments";
        $data['ads'] = $this->_API->getPayments();
        $data['messages'] = $this->_API->loadMessages();
        $data['mcount'] = $this->_API->unSolved();
        $this->load->view('pages/admin/payments', $data);
    }
    
    public function comments() {
        $data['ptitle'] = "Admin -> Dashboard -> Obituary Comments";
        $data['title'] = "Admin Dashboard - Obituary Comments";
        $data['ads'] = $this->_API->loadComments();
        $data['messages'] = $this->_API->loadMessages();
        $data['mcount'] = $this->_API->unSolved();
        $this->load->view('pages/admin/comments', $data);
    }
    
    function savecategory(){
        $data = array('name'=> $this->_POST('category'));
        $this->saveData('categories', $data);
    }
    function saveCategoryAssignment(){
        $parent =$this->_POST('category');
        $child =$this->_POST('sub');
        $data = array('parent'=> $parent);
        $this->_API->setStatus('id', $child, 'categories', $data);
    }
                function adactivate($id) {
        $this->adminAdActivate($id, 'normal_ad');
    }

    function adeactivate($id) {
        $this->adminAdDeactivate($id, 'normal_ad');
    }

    function adelete($id) {
        $this->adminAdDelete($id, 'normal_ad');
    }

    function obactivate($id) {
        $this->adminObActivate($id, 'obituary');
    }

    function obdeactivate($id) {
        $this->adminObDeactivate($id, 'obituary');
    }

    function obdelete($id) {
        $this->adminObDelete($id, 'obituary');
    }
    
    function approvec($id){
        $data = array('approval'=>1);
        $this->_API->setStatus('id', $id, 'obituary_comments', $data);
        $this->session->set_flashdata('message_success', 'Comment Successfully Approved!');
        redirect('admin/comments');
    }
    function rejectc($id){
        $data = array('approval'=>2);
        $this->_API->setStatus('id', $id, 'obituary_comments', $data);
         $this->session->set_flashdata('message_reject', 'Comment Successfully Rejected!');
         redirect('admin/comments');
    }
    
    function solved($id){
        $data = array('solved'=>1);
        $this->_API->setStatus('id', $id, 'reports', $data);
        $this->session->set_flashdata('message_success', 'Report reviewed and removed from this list!');
        redirect('admin/reports');
    }

}
