<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Search
 *
 * @author Poxy
 */
class Search extends MY_Controller {

    public $_Input = '';
    public $_API = '';
    public $_Home = '';

    function __construct() {
        parent::__construct();
        $this->load->library('My_Input');
        $this->_Input = new My_Input;
        $this->_API = new API;
        parse_str(substr(strrchr($_SERVER['REQUEST_URI'], "?"), 1), $_GET);
    }

    function display($id) {

        $view = $this->_Input->get('view', TRUE);
        if ($this->_Input->get('page', TRUE)) {
            $page = $this->_Input->get('page', TRUE);
        } else {
            $page = 0;
        }


        $this->_Input->load_query($id);

        $query = array(
            'keyword' => $this->input->get('keyword'),
            'category' => $this->input->get('category'),
        );



        if ($view == 'list') {
            $data['content'] = 'pages/adslist';
            $data['ptitle'] = "Obituary -> List View";
            $data['title'] = "OOP The best obituary classifieds";
            $data['listview'] = 'display/' . $id . '/?view=list&page=' . $page;
            $data['gridview'] = 'display/' . $id . '/?view=grid&page=' . $page;
            $data['flist'] = $this->_API->getSearchResults($query, 20, $page);
            $data['pages'] = $this->spagination(get_class(), 'display', $id, $view = 'list', '20', 'normal_ad', $query, $page);
        } else {
            $data['content'] = 'pages/adsgrid';
            $data['ptitle'] = "Obituary -> Grid View";
            $data['title'] = "OOP The best obituary classifieds";
            $data['listview'] = 'display/' . $id . '/?view=list&page=' . $this->input->get('page');
            $data['gridview'] = 'display/' . $id . '/?view=grid&page=' . $this->input->get('page');
            $data['flist'] = $this->_API->getSearchResults($query, 20, $page);
            $data['pages'] = $this->spagination(get_class(), 'display', $id, $view = 'list', '20', 'normal_ad', $query, $page);
        }
        $this->TemplateBuilder($data);
    }

    public function category($id) {
             $category = $id;
        $view = $this->input->get('view');
        if ($this->input->get('page')) {
            $page = $this->input->get('page');
        } else {
            $page = 0;
        }

        if ($id !== '1') {
            if ($view == 'list') {
                $data['content'] = 'pages/list';
                $data['ptitle'] = "Ads -> List View";
                $data['title'] = "OOP The best obituary classifieds";
                $data['listview'] = 'search/category/'.$id.'?view=list&page=' . $this->input->get('page');
                $data['gridview'] = 'search/category/'.$id.'?view=grid&page=' . $this->input->get('page');
                $data['flist'] = $this->_API->getNormalAdsListByCategory(20, $page,$id);
                $data['pages'] = $this->cpagination('Search', 'category', $view, $page, 20, 'normal_ad',$category);
            } else {
                $data['content'] = 'pages/adgrid';
                $data['ptitle'] = "Ads -> Grid View";
                $data['title'] = "OOP The best obituary classifieds";
                $data['listview'] = 'search/category/'.$id.'?view=list&page=' . $this->input->get('page');
                $data['gridview'] = 'search/category/'.$id.'?view=grid&page=' . $this->input->get('page');
                $data['flist'] = $this->_API->getNormalAdsListByCategory(20, $page,$id);
                $data['pages'] = $this->cpagination('Search', 'category', $view, $page, 20, 'normal_ad',$category);
            }
        } else {

            if ($view == 'list') {
                $data['content'] = 'pages/obituarylist';
                $data['ptitle'] = "Obituary -> List View";
                $data['title'] = "OOP The best obituary classifieds";
                $data['listview'] = 'search/category/'.$id.'?view=list&page=' . $this->input->get('page');
                $data['gridview'] = 'search/category/'.$id.'?view=grid&page=' . $this->input->get('page');
                $data['flist'] = $this->_API->getObituary(18, $page);
                $data['pages'] = $this->cpagination('Search', 'category', $view, $page, 18, 'obituary');
            } else {
                $data['content'] = 'pages/obgrid';
                $data['ptitle'] = "Obituary -> Grid View";
                $data['title'] = "OOP The best obituary classifieds";
                $data['listview'] = 'search/category/'.$id.'?view=list&page=' . $this->input->get('page');
                $data['gridview'] = 'search/category/'.$id.'?view=grid&page=' . $this->input->get('page');
                $data['flist'] = $this->_API->getObituary(20, $page);
                $data['pages'] = $this->cpagination('Search', 'category', $view, $page, 20, 'obituary');
            }
        }

        $this->TemplateBuilder($data);
    }

    function query() {
        $query = array(
            'keyword' => $this->_POST('keyword'),
            'category' => $this->_POST('category'),
        );


        $id = $this->_Input->save_query($query);

        redirect('search/display/' . $id);
    }

    function result($query, $limit, $offset, $orderby) {



        $page = 0;
        $data['slist'] = $this->_API->getObituary(18, $page);
        $data['pages'] = $this->pagination(get_class(), 'display', $view = 'grid', $page, 20, 'obituary');
    }

}
