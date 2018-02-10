<?php defined('BASEPATH') or exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: sitesh
 * Date: 9/1/16
 * Time: 11:40 PM
 */

class Project extends MX_Controller
{


    function __construct()
    {
        date_default_timezone_set('Asia/Calcutta');
        parent::__construct();

        $this->load->Model('Mdl_users');

        }
    public function stage(){
        $this->load->view('header/header');
        $this->load->view('stage');
        $this->load->view('header/footer');

    }
}
