<?php
require APPPATH.'third_party/PHPMailerAutoload.php';
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Mailer extends PHPMailer {

    function __construct() {
        parent::__construct();
        }

}

