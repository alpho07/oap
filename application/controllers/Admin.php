<?php



defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends MY_Controller {

    private $_Auth = '';
    private $_API = '';
    
        public function __construct() {
        parent::__construct();
        $this->_Auth = new User_authentication;
        $this->_API = new API;
    }

       public function AdminDashboard() {
        $data['content'] = 'pages/admindashboard';
        $data['ptitle'] = "Admin -> Dashboard";
        $data['title'] = "Admin Dashboard";
        $data['ads'] = $this->_API->getAllUserAds();
        $data['messages']=  $this->_API->loadMessages();
        $data['mcount']=  $this->_API->unreadMessages();
        $this->load->view('pages/admin/admindashboard', $data);
    }
       public function reports() {
        $data['ptitle'] = "Admin -> Dashboard -> Reported Ads";
        $data['title'] = "Admin Dashboard - Reports";
        $data['ads'] = $this->_API->getAllUserAds();
        $data['messages']=  $this->_API->loadMessages();
        $data['mcount']=  $this->_API->unreadMessages();
        $this->load->view('pages/admin/reports', $data);
    }
       public function ads() {
        $data['ptitle'] = "Admin -> Dashboard ->Normal Ads";
        $data['title'] = "Admin Dashboard -> Normal Ads";
        $data['ads'] = $this->_API->getAllUserAds();
        $data['messages']=  $this->_API->loadMessages();
        $data['mcount']=  $this->_API->unreadMessages();
        $this->load->view('pages/admin/normal_ads', $data);
    }
       public function obituaries() {
        $data['ptitle'] = "Admin -> Dashboard ->Obituaries";
        $data['title'] = "Admin Dashboard - Obituaries";
        $data['ads'] = $this->_API->getAllUserAds();
        $data['messages']=  $this->_API->loadMessages();
        $data['mcount']=  $this->_API->unreadMessages();
        $this->load->view('pages/admin/obituaries', $data);
    }
       public function premium() {
        $data['ptitle'] = "Admin -> Dashboard -> Premium Ads";
        $data['title'] = "Admin Dashboard - Premium Ads";
        $data['ads'] = $this->_API->getAllUserAds();
        $data['messages']=  $this->_API->loadMessages();
        $data['mcount']=  $this->_API->unreadMessages();
        $this->load->view('pages/admin/premium_ads', $data);
    }
       public function payments() {
        $data['ptitle'] = "Admin -> Dashboard -> Payments";
        $data['title'] = "Admin Dashboard - Payments";
        $data['ads'] = $this->_API->getAllUserAds();
        $data['messages']=  $this->_API->loadMessages();
        $data['mcount']=  $this->_API->unreadMessages();
        $this->load->view('pages/admin/payments', $data);
    }
   
}