<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of API
 *
 * @author Poxy
 */
class API extends CI_Model {

    function Save($table, $data) {
        $resp = $this->db->insert($table, $data);
        if ($resp):
            echo 'Save Complete';
        else:
            echo $this->db->_error_message();
        endif;
    }

    function Update($id, $table, $data) {
        $this->db->where('id', $id)->update($table, $data);
    }

    function Activate($id, $table, $data) {
        $this->db->where('id', $id)->update($table, $data);
    }

    function Deactivate($id, $table, $data) {
        $this->db->where('id', $id)->update($table, $data);
    }

    function Delete($id, $table) {
        $this->db->where('id', $id)->delete($table);
    }

    function getUsers() {
        return $this->db->get('users')->result();
    }

    function getAllUserAdsAdmin() {
        return $this->db->query("SELECT ad.*, c.name , u.name as user, u.id uid
              FROM normal_ad ad 
              INNER JOIN categories c ON c.id=ad.category 
              INNER JOIN users u ON ad.user_id = u.id
              ORDER BY ad.id DESC")->result();
    }

    function getAllUserObsAdmin() {
        return $this->db->query("SELECT ad.*, c.name , u.name as user,  u.id uid
              FROM obituary ad 
              INNER JOIN categories c ON c.id=ad.category 
              INNER JOIN users u ON ad.user_id = u.id
              ORDER BY ad.id DESC
              ")->result();
    }

    function getReportedAds() {
        return $this->db->get('reports')->result();
    }

    function getPayments() {
         return $this->db->query("SELECT * 
              FROM payments p, users u 
              WHERE u.id=p.user_id 
              ORDER BY p.id DESC
              ")->result();
    }

    function loadMessages() {
        $id = $this->session->userdata('user_id');
        return $this->db->where('user_id', $id)->get('inbox')->result();
    }

    function unreadMessages() {
        $id = $this->session->userdata('user_id');
        return $this->db->where('user_id', $id)->where('read', '0')->get('inbox')->num_rows();
    }

    function getUserAds($uid) {
        return $this->db->query("SELECT ad.id,ad.title,ad.image_path,ad.date_posted,ad.user_status,ad.admin_status,c.name 
              FROM normal_ad ad, categories c 
              WHERE user_id=$uid 
              AND c.id=ad.category  
              UNION SELECT ad.id,ad.title,ad.image_path,ad.date_posted,ad.user_status,ad.admin_status,c.name 
              FROM obituary ad, categories c 
              WHERE user_id=$uid 
              AND c.id=ad.category")->result();
    }

    function getAllUserAds() {
        $id = $this->session->userdata('user_id');
        return $this->db->query("SELECT ad.id,ad.category,ad.title,ad.image_path,ad.date_posted,ad.user_status,ad.admin_status,c.name 
              FROM normal_ad ad, categories c 
              WHERE c.id=ad.category 
              AND user_id ='$id'
              UNION SELECT ad.id,ad.category,ad.title,ad.image_path,ad.date_posted,ad.user_status,ad.admin_status,c.name 
              FROM obituary ad, categories c 
              WHERE  c.id=ad.category
              AND user_id ='$id' ")->result();
    }

    function getNormalAdsFeatured() {
        $query = $this->db->query("
            SELECT * FROM( 
            (select * from normal_ad where category = '1' order by id desc limit 3)
            union all (select * from normal_ad where category = '2' order by id desc limit 4)
            union all (select * from normal_ad where category = '3' order by id desc limit 3) 
            union all (select * from normal_ad where category = '4' order by id desc limit 3)
            union all (select * from normal_ad where category = '5' order by id desc limit 3)
            union all (select * from normal_ad where category = '6' order by id desc limit 3))
            res ORDER BY id DESC                
           ")->result();

        return $query;
    }

    function getNormalAdsList($limit, $offset) {
        $query = $this->db->query("
            SELECT * FROM( 
            (select * from normal_ad where category = '1' order by id desc )
            union all (select * from normal_ad where category = '2' order by id desc )
            union all (select * from normal_ad where category = '3' order by id desc ) 
            union all (select * from normal_ad where category = '4' order by id desc)
            union all (select * from normal_ad where category = '5' order by id desc)
            union all (select * from normal_ad where category = '6' order by id desc))
            res ORDER BY id DESC LIMIT $limit OFFSET $offset               
           ")->result();

        return $query;
    }

    function getObituary($limit, $offset) {
        $query = $this->db->query("
            SELECT * FROM obituary
             ORDER BY id DESC LIMIT $limit OFFSET $offset               
           ")->result();

        return $query;
    }

    function getTotal($table) {
        return $this->db->get($table)->num_rows();
    }

    function getAllObs() {
        return $this->db->order_by('id', 'desc')->limit(5)->get('obituary')->result();
    }

    function checkArticle($table, $aid) {
        $id = $this->session->userdata('user_id');
        return $this->db->where('user_id', $id)->where('id', $aid)->get($table)->num_rows();
    }

    function getSingleOb($id) {
        return $this->db->where('id', $id)->get('obituary')->result();
    }

    function getObComments($id) {
        return $this->db->where('obid', $id)->get('obituary_comments')->result();
    }

    function getSingleAd($id) {
        return $this->db->query("SELECT ad.* ,c.name,u.name user, u.phone 
              FROM normal_ad ad, categories c, users u
              WHERE c.id=ad.category  
              AND u.id = ad.user_id
              AND ad.id='$id'")->result();
    }

}
