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

        $this->load->Model('Mdl_project');

        }
    public function stage(){
        if (islogin()) {
            if (strtolower($_SERVER['REQUEST_METHOD']) == 'post') {
                $this->Mdl_project->setProject('stage', $this->input->post('stage'),$this->input->post('role'));
               $result= $this->Mdl_project->createStage();
               if($result){
                   setInformUser('success', 'Stage created successfully.');
                   redirect(base_url('project/stage'));
               }else{
                   setInformUser('error', 'Some error Occurred!');

                   redirect(base_url('project/stage'));
                   }

            }else{
                $this->load->view('users/header/header');
                $this->load->view('stage');
                $this->load->view('users/header/footer');
            }
        }
    }


     public function activity(){
        if (islogin()) {
            if (strtolower($_SERVER['REQUEST_METHOD']) == 'post') {
                $this->Mdl_project->setProject('activity', $this->input->post(''),$this->input->post('role'));
                $result= $this->Mdl_project->createStage();
                if($result){
                    setInformUser('success', 'Stage created successfully.');
                    redirect(base_url('project/stage'));
                }else{
                    setInformUser('error', 'Some error occurred!');

                    redirect(base_url('project/activity'));
                }

            }else{
                $data['project'] = $this->Mdl_project->is_stage();
                //print_r($data['project']);
                $this->load->view('users/header/header');
                $this->load->view('activity',$data);
                $this->load->view('users/header/footer');
            }
        }

    }

    public function create_project(){
        $this->load->view('header/header');
        $this->load->view('project');
        $this->load->view('header/footer');

    }
}
