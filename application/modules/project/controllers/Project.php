<?php defined('BASEPATH') or exit('No direct script access allowed');
error_reporting(0);
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

        if(isAdmin()) {
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
    }else{
setInformUser('error', 'Not Allowed to Access this Page.');
redirect(base_url('users/dashboard'));
}
    }


    public function activity()
    {

        if(isAdmin()) {
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

        }else{
            setInformUser('error', 'Not Allowed to Access this Page.');
            redirect(base_url('users/dashboard'));
        }

    }
	public function updateProject(){
		if (islogin()){
			if (strtolower($_SERVER['REQUEST_METHOD']) == 'post') {

                $result = $this->Mdl_project->updateProject($this->input->post('proid'),$this->input->post('name'), $this->input->post('area'), $this->input->post('plotNumber'), $this->input->post('location'), $this->input->post('projectDetails'),$this->input->post('client'),$this->input->post('conntractor'));
                // $result = $this->Mdl_project->createProject();
                if ($result) {
                    setInformUser('success', 'Project created successfully.');
                    redirect(base_url('project'));
                } else {
                    setInformUser('error', 'Some error occurred!');

                    redirect(base_url('project'));
                }

			}
		}else{
             redirect(base_url('users'));
        }
	}
    public function index()
    {

        if(isAdmin()) {

        if (islogin()) {
            if (strtolower($_SERVER['REQUEST_METHOD']) == 'post') {

                $this->Mdl_project->setProject('project', $this->input->post('name'), $this->input->post('area'), $this->input->post('plotNumber'), $this->input->post('location'), $this->input->post('projectDetails'),$this->input->post('conntractor'),$this->input->post('client'));
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
           $result['user'] = $this->Mdl_project->getUserAll();
           $result['data'] = $this->Mdl_project->getProject();
           $this->load->view('users/header/header');
           $this->load->view('project', $result);
           $this->load->view('users/header/footer');
       }
        }else{
                redirect(base_url('users'));
            }
    }else{
setInformUser('error', 'Not Allowed to Access this Page.');
redirect(base_url('users/dashboard'));
}


}

    public function getuser(){

        $data=$this->input->post('role');
//        echo $data;
        $result = $this->Mdl_project->getUser($data);
         echo json_encode($result);


    }
    public function createStage(){

        if (islogin()) {
            if(isAdmin()) {

                if (strtolower($_SERVER['REQUEST_METHOD']) == 'post') {

              
//                $this->Mdl_project->setProject('stagemapping', $this->input->post('name'), $this->input->post('area'), $this->input->post('plotNumber'), $this->input->post('location'), $this->input->post('projectDetails'));
				$this->Mdl_project->deleteProjectStage($this->input->post('project'));
                $result = $this->Mdl_project->createStageProject($this->input->post('project'),$this->input->post('stage'));
                if ($result) {
                    setInformUser('success', 'Stage created successfully.');
                    redirect(base_url('project/createStage'));
                } else {
                    setInformUser('error', 'Some error occurred!');

                    redirect(base_url('project'));
                }

            }
            else {
//           $result['stage'] = $this->Mdl_project->getData('stage');
                $result['data'] = $this->Mdl_project->getProject();
                $result['stage'] = $this->Mdl_project->getStages();
                $result['StageProject'] = $this->Mdl_project->getStageProject();
				/* echo '<pre>';
				print_r($result['StageProject']);
				echo '</pre>';  */

                $this->load->view('users/header/header');
                $this->load->view('addstage',$result);
                $this->load->view('users/header/footer');
            }
            }else{
                setInformUser('error', 'Not Allowed to Access this Page.');
                redirect(base_url('users/dashboard'));
            }
        }else{
            redirect(base_url('users'));
        }

    }
	public function stageEmpActMap(){
		if (islogin()) {
			if (strtolower($_SERVER['REQUEST_METHOD']) == 'post') {
					/* $stage = $this->input->post('stage');
					$activity = $this->input->post('employee');
					echo '<pre>';
					print_r($activity);
					echo '</pre>';
              die; */
//                $this->Mdl_project->setProject('stagemapping', $this->input->post('name'), $this->input->post('area'), $this->input->post('plotNumber'), $this->input->post('location'), $this->input->post('projectDetails'));
				$this->Mdl_project->deleteStageActEmp($this->input->post('stage'));
                $result = $this->Mdl_project->createStageActEmp($this->input->post('stage'),$this->input->post('employee'));
                if ($result) {
                    setInformUser('success', 'Activity mapped successfully.');
                    redirect(base_url('project/stageActivity'));
                } else {
                    setInformUser('error', 'Some error occurred!');

                    redirect(base_url('project/stageActivity'));
                }

            }
        }else{
            redirect(base_url('users'));
		}
	}
	public function stageActivity(){

        if(isAdmin()) {
		if (islogin()) {
			if (strtolower($_SERVER['REQUEST_METHOD']) == 'post') {
					/* $stage = $this->input->post('stage');
					$activity = $this->input->post('activity');
					echo '<pre>';
					print_r($activity);
					echo '</pre>';
              die; */
//                $this->Mdl_project->setProject('stagemapping', $this->input->post('name'), $this->input->post('area'), $this->input->post('plotNumber'), $this->input->post('location'), $this->input->post('projectDetails'));
				$this->Mdl_project->deleteStageActivity($this->input->post('stage'));
                $result = $this->Mdl_project->createStageActivity($this->input->post('stage'),$this->input->post('activity'));
                if ($result) {
                    setInformUser('success', 'Activity mapped successfully.');
                    redirect(base_url('project/stageActivity'));
                } else {
                    setInformUser('error', 'Some error occurred!');

                    redirect(base_url('project/stageActivity'));
                }

            }
            else {
				$result['data'] = $this->Mdl_project->getProject();
				$result['stage'] = $this->Mdl_project->getStagesFormStageMap();
				$result['stageList'] = $this->Mdl_project->getStages();
				$result['activity'] = $this->Mdl_project->getActivity();
				$result['StageActivity'] = $this->Mdl_project->getStageActivity();
				$result['getEmployee'] = $this->Mdl_project->getEmployee();
				/* echo '<pre>';
				print_r($result['StageActivity']);
				echo '</pre>'; */

				$this->load->view('users/header/header');
				$this->load->view('stageactivity',$result);
				$this->load->view('users/header/footer');
			}
		}else{
            redirect(base_url('users'));
        }
        }else{
            setInformUser('error', 'Not Allowed to Access this Page.');
            redirect(base_url('users/dashboard'));
        }
	}
	public function stageEmp(){
	  if (islogin()) {
			if (strtolower($_SERVER['REQUEST_METHOD']) == 'post') {
					/* $stage = $this->input->post('stage');
					$activity = $this->input->post('activity');
					echo '<pre>';
					print_r($activity);
					echo '</pre>';
              die; */
//                $this->Mdl_project->setProject('stagemapping', $this->input->post('name'), $this->input->post('area'), $this->input->post('plotNumber'), $this->input->post('location'), $this->input->post('projectDetails'));
				//$this->Mdl_project->deleteStageActivity($this->input->post('stage'));
                $result = $this->Mdl_project->createStageEmployee($this->input->post('employee'),$this->input->post('stage'));
                if ($result) {
                    setInformUser('success', 'Stage mapped successfully.');
                    redirect(base_url('project/stageEmp'));
                } else {
                    setInformUser('error', 'Some error occurred!');

                    redirect(base_url('project/stageEmp'));
                }

            }
            else {
				//$result['data'] = $this->Mdl_project->getProject();
				$result['stage'] = $this->Mdl_project->getStagesFormStageMap();
				//$result['activity'] = $this->Mdl_project->getActivity();
				//$result['StageActivity'] = $this->Mdl_project->getStageActivity();
				$result['getEmployee'] = $this->Mdl_project->getEmployee();
				
				$this->load->view('users/header/header');
				$this->load->view('stageemp',$result);
				$this->load->view('users/header/footer');
			}
		}else{
            redirect(base_url('users'));
        }
	}
	public function viewall(){
		if (islogin()) {
            if (isAdmin()) {
				$result['stage'] = $this->Mdl_project->getStages();
				$result['activity'] = $this->Mdl_project->getActivity();
				$result['StageActivity'] = $this->Mdl_project->getStageActivity();
				$result['StageProject'] = $this->Mdl_project->getStageProject();
				/*  echo '<pre>';
				print_r($result['activity']);
				echo '</pre>'; */  

				$this->load->view('users/header/header');
				$this->load->view('viewall',$result);
				$this->load->view('users/header/footer');
        }else{
            setInformUser('error', 'Not Allowed to Access this Page.');
            redirect(base_url('users/dashboard'));
        }
		}else{
            redirect(base_url('users'));
        }
	}
  public function getstage(){
      $data=$this->input->post('role');
         $result = $this->Mdl_project->getUser($data);
             echo json_encode($result);

  }
  public function deleteProjectStage($proID){
	  //echo $proID = $this->input->post('role');
	  
	  /* $this->db->where('project_id', $proID);
      $this->db->delete('project_stage_mapping'); */
	  $result = $this->Mdl_project->deleteProjectStage($proID);
	  setInformUser('success', 'Proect stage mapping deleted successfully');
      redirect(base_url('project/createStage'));
  }
  public function deleteStageActivity($stgID){
	  //echo $proID = $this->input->post('role');
	  
	  /* $this->db->where('project_id', $proID);
      $this->db->delete('project_stage_mapping'); */
	  $result = $this->Mdl_project->deleteStageActivity($stgID);
	  setInformUser('success', 'Project stage mapping deleted successfully');
      redirect(base_url('project/stageActivity'));
  }
  public function deleteProject($proID){
	if (islogin()) {
	  $result = $this->Mdl_project->deleteProject($proID);
	  setInformUser('success', 'Project deleted successfully');
      redirect(base_url('project'));
	}else{
            redirect(base_url('users'));
    }
  }
  public function deleteActivity($actID){
	if (islogin()) {
	  $result = $this->Mdl_project->deleteActivity($actID);
	  setInformUser('success', 'Project Activity deleted successfully');
      redirect(base_url('project/activity'));
	}else{
            redirect(base_url('users'));
    }
  }
  public function deleteStage($stgID){
	if (islogin()) {
	  $result = $this->Mdl_project->deleteStage($stgID);
	  setInformUser('success', 'Stage deleted successfully');
      redirect(base_url('project/stage'));
	}else{
            redirect(base_url('users'));
    }
  }
  public function updateStage(){
	if (islogin()) {
	  $result = $this->Mdl_project->updateStage($this->input->post('stgid'),$this->input->post('stgname'));
		if ($result) {
			setInformUser('success', 'Stage updated successfully.');
			redirect(base_url('project/Stage'));
		} else {
			setInformUser('error', 'Some error occurred!');

			redirect(base_url('project/Stage'));
		}
	}else{
            redirect(base_url('users'));
    }
  }
  public function updateActivity(){
	if (islogin()) {
	  $result = $this->Mdl_project->updateActivity($this->input->post('actid'),$this->input->post('actname'));
		if ($result) {
			setInformUser('success', 'Activity updated successfully.');
			redirect(base_url('project/activity'));
		} else {
			setInformUser('error', 'Some error occurred!');

			redirect(base_url('project/Stage'));
		}
	}else{
            redirect(base_url('users'));
    }
  }
  public function projectEmployeeDelete($empId){
	$this->Mdl_project->deleteProjectEmployee($empId);
	setInformUser('success', 'You have deleted successfully.');
	redirect(base_url('project/projectEmployee'));
  }
  public function projectEmployeeUpdate(){
	  $this->Mdl_project->deleteProjectEmployee($this->input->post('employee'));
	  $result = $this->Mdl_project->createProEmp($this->input->post('projectname'),$this->input->post('stage'),$this->input->post('employee'));
			if ($result) {
			setInformUser('success', 'Project updated successfully.');
			redirect(base_url('project/projectEmployee'));
		} else {
			setInformUser('error', 'Some error occurred!');

			redirect(base_url('project/projectEmployee'));
		}
  }
  public function projectEmployee(){
	if (islogin()) {


        if(isAdmin()) {

		if (strtolower($_SERVER['REQUEST_METHOD']) == 'post') {
			
			//$this->Mdl_project->deleteProjectEmployee($this->input->post('employee'));
			$stg = $this->input->post('stage');
			foreach($stg as $st_id){
				//echo $st_id;
			$check_pro_stg = $this->Mdl_project->checkProStg($this->input->post('projectname'),$st_id);
			if($check_pro_stg > 0){
				setInformUser('error', 'This job already assign to other employee.');
				redirect(base_url('project/projectEmployee'));
			}
			
			}
			$result = $this->Mdl_project->createProEmp($this->input->post('projectname'),$this->input->post('stage'),$this->input->post('employee'));
			if ($result) {
			setInformUser('success', 'Project assign successfully.');
			redirect(base_url('project/projectEmployee'));
		} else {
			setInformUser('error', 'Some error occurred!');

			redirect(base_url('project/projectEmployee'));
		}
				
			
		}else{
		$result['projactname'] = $this->Mdl_project->getProject();
		$result['datapro'] = $this->Mdl_project->getEmpListEmp();
		//$result['stage'] = $this->Mdl_project->getStagesFormStageMap();
		//$result['activity'] = $this->Mdl_project->getActivity();
		//$result['StageActivity'] = $this->Mdl_project->getStageActivity();
		 
		$result['getEmployee'] = $this->Mdl_project->getEmployee();

		$this->load->view('users/header/header');
		$this->load->view('projecteemp',$result);
		$this->load->view('users/header/footer');
		}
    }else{
        setInformUser('error', 'Not Allowed to Access this Page.');
        redirect(base_url('users/dashboard'));
    }
	}else{
        redirect(base_url('users'));
    }
  }
  public function stage_call(){
	  $projectid = $this->input->post('projectid');
	  $res_stg = $this->Mdl_project->getProjectStage($projectid);
	  foreach($res_stg as $stage_data){
		  $stg_return .= '<input type="checkbox" name="stage[]" value="'.$stage_data['stage_id'].'">'.$stage_data['name'].'';
	  }
	  echo $stg_return;
	  /* echo '<pre>';
	  print_r($res);
	  echo '</pre>'; */
  }
    public function projectstatus(){
        $this->load->view('users/header/header');
        $this->load->view('projecteemp','projectstatus');
        $this->load->view('users/header/footer');
    }


  public function generalProject(){
      if (islogin()) {

          $data['project']=$this->Mdl_project->getProjectAndDate();
          $data['employee']=$this->Mdl_project->getProjectEmployee();
          $data['date'] = $this->Mdl_project->getreportDate();

          if (strtolower($_SERVER['REQUEST_METHOD']) == 'post') {
              $project = $this->input->post('project');
              $date = $this->input->post('projectdate');
              $employee = $this->input->post('employee');


//              echo $date;
//              echo $project;


              $data['projectdata']=$this->Mdl_project->getProjectAndByDate($project,$date,$employee);
//                            print_r($data['projectdata']); die;
//              $data['project']=$this->Mdl_project->getProjectAndDate();

              $this->load->view('users/header/header');
              $this->load->view('generalProject',$data);
              $this->load->view('users/header/footer');
          }
          else{
//              print_r($result['date'] );
//              print_r($result['stage'] );
//              die;
//              print_r($data['project'])
              $this->load->view('users/header/header');
              $this->load->view('generalProject',$data);
              $this->load->view('users/header/footer');
          }



      }else{
          redirect(base_url('users'));
      }

  }



  public function Report1(){
      if (islogin()) {
          if (strtolower($_SERVER['REQUEST_METHOD']) == 'post') {

              if( $this->input->post('reportType')=="stage") {
                  $data1['project']=$this->Mdl_project->getProjects();
                  $this->load->view('users/header/header');
                  $this->load->view('report_stage',$data1);
                  $this->load->view('users/header/footer');

                }

              if( $this->input->post('reportType')=="date") {
                  $data1['project']=$this->Mdl_project->getProjects();
                  $this->load->view('users/header/header');
                  $this->load->view('report_date',$data1);
                  $this->load->view('users/header/footer');

              }


                  $project = $this->input->post('project');
                  $date = $this->input->post('date');
                  $stage = $this->input->post('stage');


                  $data['projectdata'] = $this->Mdl_project->getreport($project, $date, $stage);

                  $data1['project'] = $this->Mdl_project->getProjects();

                  $this->load->view('users/header/header', $data1);
                  $this->load->view('report', $data);
                  $this->load->view('users/header/footer');







          }
          else{
              $data1['project']=$this->Mdl_project->getProjects();
              $this->load->view('users/header/header');
              $this->load->view('report',$data1);
              $this->load->view('users/header/footer');
          }



      }else{
          redirect(base_url('users'));
      }


  }

  public function reportDate(){
      if (strtolower($_SERVER['REQUEST_METHOD']) == 'post') {


          $project = $this->input->post('project');
          $date = $this->input->post('date');
          $data['report'] = $this->Mdl_project->getProjectsReportDate($project,$date);
          $data['project'] = $this->Mdl_project->getProjects();
          $data['date'] = $this->Mdl_project->getProjectsDate();

          $this->load->view('users/header/header');
          $this->load->view('report_date', $data);
          $this->load->view('users/header/footer');

      }
      else {
          $data['project'] = $this->Mdl_project->getProjects();
          $data['date'] = $this->Mdl_project->getProjectsDate();
          $data['report']=$this->Mdl_project->getreportStageAll();

          $this->load->view('users/header/header');
          $this->load->view('report_date', $data);
          $this->load->view('users/header/footer');
      }
  }

    public function reportStage(){
        if (islogin()) {
        $data['date'] = $this->Mdl_project->getProjectsDate();
        $data['project'] = $this->Mdl_project->getProjects();

        if (strtolower($_SERVER['REQUEST_METHOD']) == 'post') {

                   $project = $this->input->post('project');
                  $stage = $this->input->post('stage');
                   $date = $this->input->post('date');

            $data['report']=$this->Mdl_project->getreportStage($project,$stage,$date);
//                  echo "<pre>";
//                  print_r($data1['project']);die;
//                $data['project'] = $this->Mdl_project->getProjects();
                $this->load->view('users/header/header');
                $this->load->view('report_stage', $data);
                $this->load->view('users/header/footer');


        }
        else {
            $data['report']=$this->Mdl_project->getreportStageAll();
//            echo $data['report']; die;
            $this->load->view('users/header/header');
            $this->load->view('report_stage', $data);
            $this->load->view('users/header/footer');
        }

        }else{
            redirect(base_url('users'));
        }

    }


    public function  report(){
      if (strtolower($_SERVER['REQUEST_METHOD']) == 'post') {

          if( $this->input->post('reportType')=="stage") {
              redirect(base_url('project/reportStage'));
          }

          if( $this->input->post('reportType')=="date") {
              redirect(base_url('project/reportDate'));
          }
      }
      else {
          $data1['project'] = $this->Mdl_project->getProjects();
          $this->load->view('users/header/header');
          $this->load->view('report', $data1);
          $this->load->view('users/header/footer');
      }

  }
    public function stage_calls(){
        $projectid = $this->input->post('projectid');
        $res_stg = $this->Mdl_project->getProjectStage($projectid);
        $stg_return='<option value="">Select Stage </option>';
        foreach($res_stg as $stage_data){
            $stg_return .= '<option   value="'.$stage_data['stage_id'].'">'.$stage_data['name'].'</option>';
        }
        echo $stg_return;
        /* echo '<pre>';
        print_r($res);
        echo '</pre>'; */
    }





    public function get_employee(){
        $projectid = $this->input->post('projectid');
        $res_stg = $this->Mdl_project->getProjectEmployee($projectid);
        $stg_return='<option value="">Select Employee </option>';
        foreach($res_stg as $stage_data){
            $stg_return .= '<option   value="'.$stage_data['id'].'">'.$stage_data['fname'].'</option>';
        }
        echo $stg_return;

    }

  	
}
