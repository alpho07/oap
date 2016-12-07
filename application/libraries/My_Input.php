<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of My_Input
 *
 * @author Poxy
 */
class My_Input extends CI_Input{
   
    function save_query($array){
       $that  = & get_instance();
       $that->db->insert('ci_query', array('query_string'=>  http_build_query($array)));
       return $that->db->insert_id();
    }
    
        function load_query($id){
           $that  = & get_instance();
           $res = $that->db->where('id',$id)->get('ci_query')->result();
           if($res){
             parse_str($res[0]->query_string, $_GET);
  
           }else{
           }
    }
   
}
