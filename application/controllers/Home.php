<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller {

    private $_Auth = '';
    private $_API = '';

    public function __construct() {
        parent::__construct();
        $this->_Auth = new User_authentication;
        $this->_API = new API;
    }

    public function index() {
        $data['content'] = 'pages/featured';
        $data['ptitle'] = "Latest Adds -> Grid View";
        $data['title'] = "OOP The best obituary classifieds";
        $data['featured'] = $this->_API->getNormalAdsFeatured();
        $data['obituaries'] = $this->_API->getAllObs();
        $this->TemplateBuilder($data);
    }

    public function all() {
        $view = $this->input->get('view');
           if ($this->input->get('page')) {
            $page = $this->input->get('page');
        } else {
            $page = 1;
        }
        if($view=='list'){
        $data['content'] = 'pages/list';
        $data['ptitle'] = "Ads -> List View";
        $data['title'] = "OOP The best obituary classifieds";
        $data['listview']=  'all/?view=list&page='.$this->input->get('page');
        $data['gridview']=  'all/?view=grid&page='.$this->input->get('page');
        $data['flist'] = $this->_API->getNormalAdsList(18, $page);
        $data['pages'] = $this->pagination('Home', 'all',$view,$page, 18,'normal_ad');
        
        }else{
        $data['content'] = 'pages/adgrid';
        $data['ptitle'] = "Ads -> Grid View";
        $data['title'] = "OOP The best obituary classifieds";
        $data['listview']=  'all/?view=list&page='.$this->input->get('page');
        $data['gridview']=  'all/?view=grid&page='.$this->input->get('page');
        $data['flist'] = $this->_API->getNormalAdsList(20, $page);
        $data['pages'] = $this->pagination('Home', 'all',$view,$page, 20,'normal_ad');
        }
        $this->TemplateBuilder($data);
    }
    
    
       public function allobs() {
         $view = $this->input->get('view');
           if ($this->input->get('page')) {
            $page = $this->input->get('page');
        } else {
            $page = 1;
        }
        if($view=='list'){
        $data['content'] = 'pages/obituarylist';
        $data['ptitle'] = "Obituary -> List View";
        $data['title'] = "OOP The best obituary classifieds";
        $data['listview']=  'allobs/?view=list&page='.$this->input->get('page');
        $data['gridview']=  'allobs/?view=grid&page='.$this->input->get('page');
        $data['flist'] = $this->_API->getObituary(18, $page);
        $data['pages'] = $this->pagination('Home', 'allobs',$view,$page, 18,'obituary');
        
        }else{
        $data['content'] = 'pages/obgrid';
        $data['ptitle'] = "Obituary -> Grid View";
        $data['title'] = "OOP The best obituary classifieds";
        $data['listview']=  'allobs/?view=list&page='.$this->input->get('page');
        $data['gridview']=  'allobs/?view=grid&page='.$this->input->get('page');
        $data['flist'] = $this->_API->getObituary(20, $page);
        $data['pages'] = $this->pagination('Home', 'allobs',$view,$page, 20,'obituary');
        }
        $this->TemplateBuilder($data);
    }

    public function UserDashboard() {
        $data['content'] = 'pages/userdashboard';
        $data['ptitle'] = "User -> Dashboard";
        $data['title'] = "My Dashboard";
        $data['ads'] = $this->_API->getAllUserAds();
        $this->load->view('pages/userdashboard', $data);
    }

    public function listview() {
        $data['content'] = 'pages/list';
        $data['ptitle'] = "Obituaries -> List View";
        $data['title'] = "Obituaries List";
        $this->TemplateBuilder($data);
    }

    function loadSingle($id, $pe) {
        $data['ptitle'] = "Ads Single";
        $data['title'] = "Ads Highlight";
        $data['pe'] = $pe;
        $data['ver'] = $this->_API->checkArticle('normal_ad', $id);
        $data['info'] = $this->_API->getSingleAd($id);
        $this->load->view('pages/singleview_ad', $data);
    }

    function loadprofile($id, $pe) {
        $data['content'] = 'pages/singleview';
        $data['ptitle'] = "Obituaries Single";
        $data['title'] = "Obituaries Highlight";
        $data['blogid'] = $id;
        $data['pe'] = $pe;
        $data['ver'] = $this->_API->checkArticle('obituary', $id);
        $data['info'] = $this->_API->getSingleOb($id);
        $data['comments'] = $this->_API->getObComments($id);
        $this->TemplateBuilder($data);
    }

    function register() {
        $data['content'] = 'pages/register';
        $data['ptitle'] = "Obituaries Single";
        $data['title'] = "Register";
        $this->TemplateBuilder($data);
    }

    function postad() {
        $data['content'] = 'pages/postad';
        $data['ptitle'] = "Post Ad";
        $data['title'] = "Post Ad";
        $this->TemplateBuilder($data);
    }

    function postobituary() {
        $data['content'] = 'pages/obituary';
        $data['ptitle'] = "Post Obituary";
        $data['title'] = "Post Obituary";
        $this->TemplateBuilder($data);
    }

    function postada() {
        $data['content'] = 'pages/postad_1';
        $data['ptitle'] = "Post Ad";
        $data['title'] = "Post Ad";
        $this->TemplateBuilder($data);
    }

    function postobituarya() {
        $data['content'] = 'pages/obituary_1';
        $data['ptitle'] = "Post Obituary";
        $data['title'] = "Post Obituary";
        $this->TemplateBuilder($data);
    }

    function edits($id, $pe) {
        $data['content'] = 'pages/postad_edit';
        $data['ptitle'] = "Edit Ad";
        $data['title'] = "Edit Ad";
        $data['id'] = $id;
        $data['pe'] = $pe;
        $data['info'] = $this->_API->getSingleAd($id);
        $this->TemplateBuilder($data);
    }

    function editpf($id, $pe) {
        $data['content'] = 'pages/obituary_edit';
        $data['ptitle'] = "Edit Obituary";
        $data['title'] = "Edit Obituary";
        $data['id'] = $id;
        $data['pe'] = $pe;
        $data['info'] = $this->_API->getSingleOb($id);
        $this->TemplateBuilder($data);
    }

    function CreateNewAd() {
        $this->do_upload();
    }

    function CreateNewOb() {
        $this->do_Obupload();
    }

    public function do_uploaad() {
        $config['upload_path'] = 'uploads';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size'] = 1024;
        $config['file_name'] = 'ad' . date('YdmHis');
        $config['max_width'] = 1024;
        $config['max_height'] = 1024;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('file')) {


            $data['content'] = 'pages/postad_1';
            $data['ptitle'] = "Post Ad";
            $data['error'] = $this->upload->display_errors();
            $data['title'] = "Post Ad";
            $this->TemplateBuilder($data);
        } else {

            $filedata = $this->upload->data();


            $addata = array(
                'title' => $this->_POST('addtitle'),
                'category' => $this->_POST('category'),
                'price' => $this->_POST('price'),
                'description' => $this->_POST('description'),
                'image_path' => 'uploads/' . $filedata['orig_name'],
                'region' => $this->_POST('region'),
                'date_posted' => date('d-m-Y'),
                'user_id' => $this->session->userdata('user_id'),
            );





            $this->saveData('normal_ad', $addata);
            redirect('home/userdashboard');
        }
    }

    public function do_upload() {
        $config['upload_path'] = 'uploads';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size'] = 1024;
        $config['file_name'] = 'ad' . date('YdmHis');
        $config['max_width'] = 1024;
        $config['max_height'] = 1024;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('file')) {


            $data['content'] = 'pages/postad';
            $data['ptitle'] = "Post Ad";
            $data['error'] = $this->upload->display_errors();
            $data['title'] = "Post Ad";
            $this->TemplateBuilder($data);
        } else {

            $filedata = $this->upload->data();

            $uid = $this->getLastId();

            $addata = array(
                'title' => $this->_POST('addtitle'),
                'category' => $this->_POST('category'),
                'price' => $this->_POST('price'),
                'description' => $this->_POST('description'),
                'image_path' => 'uploads/' . $filedata['orig_name'],
                'region' => $this->_POST('region'),
                'date_posted' => date('d-m-Y'),
                'user_id' => $uid,
            );



            $user = array(
                'name' => $this->_POST('fullname'),
                'phone' => $this->_POST('phone'),
                'email' => $this->_POST('email'),
                'password' => $this->_Auth->cryptPass($this->_POST('password')),
                'code' => rand(0, 5) . date('Hs'),
            );



            // $this->sendNotification();

            $this->saveData('users', $user);
            $this->saveData('normal_ad', $addata);
            $this->_Auth->Authenticate_user($this->_POST('email'), $this->_POST('password'));
        }
    }

    function login() {
        $username = $this->_POST('username');
        $password = $this->_POST('password');
        $this->_Auth->Authenticate_user_ck($username, $password);
    }

    function logout() {
        $this->_Auth->kill_session();
    }

    public function do_Obupload() {
        $config['upload_path'] = 'uploads';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size'] = 1024;
        $config['file_name'] = 'ad' . date('YdmHis');
        $config['max_width'] = 1024;
        $config['max_height'] = 1024;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('file')) {


            $data['content'] = 'pages/obituary';
            $data['ptitle'] = "Post Obituary";
            $data['error'] = $this->upload->display_errors();
            $data['title'] = "Post Obituary";
            $this->TemplateBuilder($data);
        } else {

            $filedata = $this->upload->data();

            $uid = $this->getLastId();

            $addata = array(
                'title' => $this->_POST('obtitle'),
                'obtitle' => $this->_POST('addtitle'),
                'category' => $this->_POST('category'),
                'dob' => $this->_POST('dob'),
                'dod' => $this->_POST('dod'),
                'description' => $this->_POST('description'),
                'image_path' => 'uploads/' . $filedata['orig_name'],
                'date_posted' => date('d-m-Y'),
                'region' => $this->_POST('region'),
                'user_id' => $uid,
            );



            $user = array(
                'name' => $this->_POST('fullname'),
                'phone' => $this->_POST('phone'),
                'email' => $this->_POST('email'),
                'password' => $this->_Auth->cryptPass($this->_POST('password')),
                'code' => rand(0, 5) . date('Hs'),
            );


            // $this->_Auth->Authenticate_user($this->post('email'), $this->post('password'));
            // $this->sendNotification();

            $this->saveData('users', $user);
            $this->saveData('obituary', $addata);
            $this->_Auth->Authenticate_user($this->_POST('email'), $this->_POST('password'));
        }
    }

    public function obedit($id, $pe) {

        if ($_FILES['file']['tmp_name'] == '') {
            $addata = array(
                'title' => $this->_POST('obtitle'),
                'obtitle' => $this->_POST('addtitle'),
                'category' => $this->_POST('category'),
                'dob' => $this->_POST('dob'),
                'dod' => $this->_POST('dod'),
                'description' => $this->_POST('description'),
                'region' => $this->_POST('region'),
            );
            $this->Update($id, 'obituary', $addata);
            redirect('home/editpf/' . $id . '/' . $pe);
        } else {

            $config['upload_path'] = 'uploads';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size'] = 1024;
            $config['file_name'] = 'ad' . date('YdmHis');
            $config['max_width'] = 1024;
            $config['max_height'] = 1024;

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('file')) {


                $data['content'] = 'pages/obituary_edit';
                $data['ptitle'] = "Edit Obituary";
                $data['error'] = $this->upload->display_errors();
                $data['title'] = "Edit Obituary";
                $this->TemplateBuilder($data);
            } else {

                $filedata = $this->upload->data();



                $addata = array(
                    'title' => $this->_POST('obtitle'),
                    'obtitle' => $this->_POST('addtitle'),
                    'category' => $this->_POST('category'),
                    'dob' => $this->_POST('dob'),
                    'dod' => $this->_POST('dod'),
                    'description' => $this->_POST('description'),
                    'image_path' => 'uploads/' . $filedata['orig_name'],
                    'region' => $this->_POST('region'),
                );

                $this->Update($id, 'obituary', $addata);
                redirect('home/editpf/' . $id . '/' . $pe);
            }
        }
    }

    public function adedit($id, $pe) {

        if ($_FILES['file']['tmp_name'] == '') {
            $addata = array(
                'title' => $this->_POST('addtitle'),
                'category' => $this->_POST('category'),
                'price' => $this->_POST('price'),
                'description' => $this->_POST('description'),
                'region' => $this->_POST('region'),
            );

            $this->Update($id, 'normal_ad', $addata);
            redirect('home/edits/' . $id . '/' . $pe);
        } else {

            $config['upload_path'] = 'uploads';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size'] = 1024;
            $config['file_name'] = 'ad' . date('YdmHis');
            $config['max_width'] = 1024;
            $config['max_height'] = 1024;

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('file')) {


                $data['content'] = 'pages/obituary_edit';
                $data['ptitle'] = "Edit Obituary";
                $data['error'] = $this->upload->display_errors();
                $data['title'] = "Edit Obituary";
                $this->TemplateBuilder($data);
            } else {

                $filedata = $this->upload->data();



                $addata = array(
                    'title' => $this->_POST('addtitle'),
                    'category' => $this->_POST('category'),
                    'price' => $this->_POST('price'),
                    'description' => $this->_POST('description'),
                    'region' => $this->_POST('region'),
                    'image_path' => 'uploads/' . $filedata['orig_name'],
                    'region' => $this->_POST('region'),
                );

                $this->Update($id, 'normal_ad', $addata);
                redirect('home/edits/' . $id . '/' . $pe);
            }
        }
    }

    public function do_Obuploada() {
        $config['upload_path'] = 'uploads';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size'] = 1024;
        $config['file_name'] = 'ad' . date('YdmHis');
        $config['max_width'] = 1024;
        $config['max_height'] = 1024;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('file')) {


            $data['content'] = 'pages/obituary_1';
            $data['ptitle'] = "Post Obituary";
            $data['error'] = $this->upload->display_errors();
            $data['title'] = "Post Obituary";
            $this->TemplateBuilder($data);
        } else {

            $filedata = $this->upload->data();



            $addata = array(
                'title' => $this->_POST('obtitle'),
                'obtitle' => $this->_POST('addtitle'),
                'category' => $this->_POST('category'),
                'dob' => $this->_POST('dob'),
                'dod' => $this->_POST('dod'),
                'description' => $this->_POST('description'),
                'image_path' => 'uploads/' . $filedata['orig_name'],
                'date_posted' => date('d-m-Y'),
                'region' => $this->_POST('region'),
                'user_id' => $this->session->userdata('user_id'),
            );

            $this->saveData('obituary', $addata);
            redirect('home/userdashboard');
        }
    }

    function getLastId() {
        $q = $this->db->query("SELECT MAX(id) AS id FROM users ")->result();
        return $q[0]->id + 1;
    }

    function addcomment($id, $pe) {
        $name = $this->input->post('name');
        $comment = $this->input->post('comment');
        $data = array(
            'obid' => $id,
            'author' => $name,
            'body' => $comment,
            'date' => date('d-m-Y H:i:s')
        );
        $this->saveData('obituary_comments', $data);
        redirect('home/loadProfile/' . $id . '/' . $pe);
    }

    function SynchContacts() {

        $phone = $this->input->post('phone');
        $name = $this->input->post('name');

        for ($i = 0; $i < count($phone); $i++) {
            $data = array(
                'name' => $name[$i],
                'phone' => $phone[$i]
            );
            $this->saveData('phonebook', $data);
        }
    }

    function delob($id) {
        $this->Delete($id, 'obituary');
    }

    function delad($id) {
        $this->Delete($id, 'normal_ad');
    }

    function obactivate($id) {
        $this->Activate($id, 'obituary');
    }

    function obdeactivate($id) {
        $this->Deactivate($id, 'obituary');
    }

    function adactivate($id) {
        $this->Activate($id, 'normal_ad');
    }

    function adeactivate($id) {
        $this->Deactivate($id, 'normal_ad');
    }

}
