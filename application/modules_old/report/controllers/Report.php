<?php
/**
 * Created by PhpStorm.
 * User: sitesh
 * Date: 4/3/18
 * Time: 7:50 PM
 */
 defined('BASEPATH') or exit('No direct script access allowed');

class Report extends MX_Controller
{


    function __construct()
    {
        date_default_timezone_set('Asia/Calcutta');
        parent::__construct();

        $this->load->Model('Mdl_report');

    }
    public function projectreport(){

               $result = $this->Mdl_report->getAllReport();

                $this->load->view('users/header/header');
                $this->load->view('projectstatus');
                $this->load->view('users/header/footer');

    }

}

 ?>