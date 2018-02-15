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

    public function stage()
    {
        if (islogin()) {
            if (strtolower($_SERVER['REQUEST_METHOD']) == 'post') {
                $this->Mdl_project->setProject('stage', $this->input->post('stage'), $this->input->post('role'));
                $result = $this->Mdl_project->createStage();
                if ($result) {
                    setInformUser('success', 'Stage created successfully.');
                    redirect(base_url('project/stage'));
                } else {
                    setInformUser('error', 'Some error Occurred!');

                    redirect(base_url('project/stage'));
                }

            } else {
                $result['stage'] = $this->Mdl_project->getData('stage');
                $this->load->view('users/header/header');
                $this->load->view('stage',$result);
                $this->load->view('users/header/footer');
            }
        }
    }


    public function activity()
    {
        if (islogin()) {
            if (strtolower($_SERVER['REQUEST_METHOD']) == 'post') {
                if ($this->input->post('role') == 'activity') {
                    $this->Mdl_project->setProject('activity', $this->input->post('stage_name'), $this->input->post('activity_name'), $this->input->post('role'));
                    $result = $this->Mdl_project->createStage();
                    if ($result) {
                        setInformUser('success', 'Activity created successfully.');
                        redirect(base_url('project/activity'));
                    } else {
                        setInformUser('error', 'Some error occurred!');

                        redirect(base_url('project/activity'));
                    }
                }
            } else {
                $data['project'] = $this->Mdl_project->is_stage();
                $data['activity'] = $this->Mdl_project->getData('activity');
                //print_r($result);
                $this->load->view('users/header/header');
                $this->load->view('activity', $data);
                $this->load->view('users/header/footer');
            }
        }else{
            redirect(base_url('users'));
        }


    }

    public function index()
    {
        if (islogin()) {
            if (strtolower($_SERVER['REQUEST_METHOD']) == 'post') {

                $this->Mdl_project->setProject('project', $this->input->post('name'), $this->input->post('area'), $this->input->post('plotNumber'), $this->input->post('location'), $this->input->post('projectDetails'));
                $result = $this->Mdl_project->createProject();
                if ($result) {
                    setInformUser('success', 'Project created successfully.');
                    redirect(base_url('project'));
                } else {
                    setInformUser('error', 'Some error occurred!');

                    redirect(base_url('project'));
                }

       }
       else {
//           $result['stage'] = $this->Mdl_project->getData('stage');
           $result['data'] = $this->Mdl_project->getProject();
           $this->load->view('users/header/header');
           $this->load->view('project', $result);
           $this->load->view('users/header/footer');
       }
        }else{
                redirect(base_url('users'));
            }

    }

    public function getuser(){

        $data=$this->input->post('role');
//        echo $data;
        $result = $this->Mdl_project->getUser($data);
         echo json_encode($result);


    }
}
