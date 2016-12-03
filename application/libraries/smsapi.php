<?php
require_once APPPATH."/third_party/AfricasTalkingGateway.php"; 
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Smsapi extends AfricasTalkingGateway {

    function __construct() {
        parent::__construct($username='',$api='');        
         
    }

}

