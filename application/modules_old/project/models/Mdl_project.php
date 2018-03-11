<?php defined('BASEPATH') or exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: Nitesh
 * Date: 2/1/16
 * Time: 7:05 PM
 */

class Mdl_project extends CI_Model
{
    const GUEST_ID = 1; //may be needs to do it like it take it from database or to define user level as global constants later. It will be seen in future.
    private $stage;
    private $role;
    private $activity_name;
    private $stage_name;
    private $name;
    private $area;
    private $location;
    private $plotNumber;
    private $projectDetails;
    private $conntractor;
    private $client;

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getConntractor()
    {
        return $this->conntractor;
    }

    /**
     * @param mixed $conntractor
     */
    public function setConntractor($conntractor)
    {
        $this->conntractor = $conntractor;
    }

    /**
     * @return mixed
     */
    public function getClient()
    {
        return $this->client;
    }

    /**
     * @param mixed $client
     */
    public function setClient($client)
    {
        $this->client = $client;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getArea()
    {
        return $this->area;
    }

    /**
     * @param mixed $area
     */
    public function setArea($area)
    {
        $this->area = $area;
    }

    /**
     * @return mixed
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * @param mixed $location
     */
    public function setLocation($location)
    {
        $this->location = $location;
    }

    /**
     * @return mixed
     */
    public function getPlotNumber()
    {
        return $this->plotNumber;
    }

    /**
     * @param mixed $plotNumber
     */
    public function setPlotNumber($plotNumber)
    {
        $this->plotNumber = $plotNumber;
    }

    /**
     * @return mixed
     */
    public function getProjectDetails()
    {
        return $this->projectDetails;
    }

    /**
     * @param mixed $projectDetails
     */
    public function setProjectDetails($projectDetails)
    {
        $this->projectDetails = $projectDetails;
    }




//$this->Mdl_project->setProject('project', $this->input->post('name'), $this->input->post('mobile'), $this->input->post('plotNumber'), $this->input->post('address'), $this->input->post('contractor'), $this->input->post('client'), $this->input->post('stage'), $this->input->post('employee'), $this->input->post('projectDetails'));

    /**
     * @return mixed
     */
    public function getStageName()
    {
        return $this->stage_name;
    }

    /**
     * @param mixed $stage_name
     */
    public function setStageName($stage_name)
    {
        $this->stage_name = $stage_name;
    }

    /**
     * @return mixed
     */
    public function getActivityName()
    {
        return $this->activity_name;
    }

    /**
     * @param mixed $activity_name
     */
    public function setActivityName($activity_name)
    {
        $this->activity_name = $activity_name;
    }

    /**
     * @return mixed
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * @param mixed $role
     */
    public function setRole($role)
    {
        $this->role = $role;
    }

    /**
     * @return mixed
     */
    public function getStage()
    {
        return $this->stage;
    }

    /**
     * @param mixed $stage
     */
    public function setStage($stage)
    {
        $this->stage = $stage;
    }




    public function updateProject($proid,$name,$area,$plotNumber,$location,$projectDetails,$client,$conntractor){
		$data = array(
                'name'=>$name,
                'area' => $area,
                'plotNumber'=> $plotNumber,
                'location'=> $location,
                'details'=> $projectDetails,
                 'client_id'=>$client,
                 'contractor_id'=>$conntractor,
                 'ip' =>$_SERVER['REMOTE_ADDR'],
            );
			$this->db->where('id',$proid);
			$query = $this->db->update('project',$data);
			if($query){
                return true;
            }else{
                return false;
            }
	}
    public function setProject()
    {

        switch (func_get_arg(0)) {
            case "stage":
                $this->setStage(func_get_arg(1));
                $this->setRole(func_get_arg(2));
                break;
            case "activity":
                $this->setStageName(func_get_arg(1));
                $this->setActivityName(func_get_arg(2));
                $this->setRole(func_get_arg(3));

                break;
            case "project":
                $this->setName(func_get_arg(1));
                $this->setArea(func_get_arg(2));
                $this->setPlotNumber(func_get_arg(3));
                $this->setLocation(func_get_arg(4));
                $this->setProjectDetails(func_get_arg(5));
                $this->setConntractor(func_get_arg(6));
                $this->setClient(func_get_arg(7));


                break;
            default:
                break;
        }

    }
    public function createProEmp($project_id,$stage_id,$emp_id){
		foreach($stage_id as $stg_id){
			 
			$data = array(
				'project_id'=> 	$project_id,
				'stage_id'	=> 	$stg_id,
				'emp_id'	=>	$emp_id
			);
			$query= $this->db->insert('project_to_employee_mapping', $data);
		}
		return true;
		
	}
    public function createStage(){
        if ($this->role == 'stage') {
            $data = array(
                'name' => $this->stage,
                'is_blocked'=>'0',
                'created_by' => $this->session->userdata['user_data'][0]['fname'],
                'created_on'=>date("Y-m-d H:i:s"),
                 'ip' =>$_SERVER['REMOTE_ADDR']
            );
            $query= $this->db->insert('stage', $data);
            if($query){
                return true;
            }else{
                return false;
            }

        } else if ($this->role == 'activity') {
        $data = array(
            'id' => $this->stage_name,
            'name' => $this->activity_name,
            'is_blocked'=>'0',
            'created_by' => $this->session->userdata['user_data'][0]['fname'],
            'created_on'=>date("Y-m-d H:i:s"),
            'ip' =>$_SERVER['REMOTE_ADDR']
        );
            $query= $this->db->insert('activity', $data);
            if($query){
                return true;
            }else {
                return false;
            }


    }
    }
    public function is_stage(){
                 $this->db->where('is_blocked','0');
        $query = $this->db->get('stage')->result_array();
        if(!empty($query)){
            return $query;
        }else{
            return false;
        }

    }
    public function getData($data){
        if($data =='stage'){
            //$this->db->where('is_blocked','0');
            $result = $this->db->get('stage')->result_array();
            if(!empty($result)){
                return $result;
            }else{
                return false;
            }

        }else if($data =='activity'){
            //$this->db->where('is_blocked','0');
            $result = $this->db->get('activity')->result_array();
            if(!empty($result)){
                return $result;
            }else{
                return false;
            }

        }
    }
    public function getUser($data){
        $this->db->where('role',$data);
        $query = $this->db->get('users')->result_array();
        if(!empty($query)){
            return $query;
        }else{
            return false;
        }

    }

    public function getUserAll(){
        return $this->db->get('users')->result_array();

    }
public function createProject(){
        $data = array(
            'name' => $this->name,
            'area'=>$this->area,
            'location'=>$this->location,
            'details'=>  $this->projectDetails,
            'plotNumber'=>$this->plotNumber,
            'client_id'=>$this->client,
            'contractor_id'=>$this->conntractor,
            'status'=>"0",
//            'user_id'=>$this->session->userdata['user_data'][0]['id'],
            'created_by' => $this->session->userdata['user_data'][0]['fname'],
            'created_on'=>date("Y-m-d H:i:s"),
            'ip' =>$_SERVER['REMOTE_ADDR']
        );
        $query= $this->db->insert('project', $data);
        if($query){
            return true;
        }else{
            return false;
        }

    }

public function getProject(){
    //$query = $this->db->query('SELECT project.id,project.name,project.area,project.plotNumber,project.location,project.details,project.status,users.fname, users.id FROM project INNER JOIN users ON project.client_id=users.id OR project.contractor_id =users.id')->result_array();

       //return $query;


        return $this->db->get('project')->result_array();
}
public function getStages(){

    return $this->db->get('stage')->result_array();

}

public function createStageProject($project,$stage){
//        print_r($stage);
//        echo $project;die;

    foreach ($stage as $row){
            $data= array(
                'project_id' => $project,
                'stage_id'=>$row
                );
	//print_r($data);
            $query= $this->db->insert('project_stage_mapping', $data);

        }
    if($query){
        return true;
    }else{
        return false;
    }

//    echo $project;die;

}
public function createStageEmployee($employee,$stage){
	foreach ($stage as $row){
            $data= array(
                'project_stage_map_id' => $row,
                'user_id'=>$employee
                );
		/* echo '<pre>';
		print_r($data);
		echo '</pre>'; */ 
		 $query= $this->db->insert('stage_user_mapping', $data);
		
	}
	if($query){
        return true;
		}else{
			return false;
		}
}

public function createStageActivity($stage,$activity){
//        print_r($stage);
//        echo $project;die;

    foreach ($activity as $row){
            $data= array(
                'project_stage_map_id' => $stage,
                'activity_id'=>$row
                );
	//print_r($data);
            $query= $this->db->insert('stage_activity_mapping', $data);

        }
    if($query){
        return true;
    }else{
        return false;
    }

//    echo $project;die;

}
public function createStageActEmp($stage,$emp){
//        print_r($stage);
//        echo $project;die;

    foreach ($emp as $row){
            $data= array(
                'project_stage_map_id' => $stage,
                'user_id'=>$row
                );
	//print_r($data);
            $query= $this->db->insert('stage_user_mapping', $data);

        }
    if($query){
        return true;
    }else{
        return false;
    }

//    echo $project;die;

}
	public function getProjectName($proID){
		return $this->db->select('name')
						//->distinct()
						->from('project')
						->where('id',$proID)
						->get()
						->result_array();
	}
	public function getStageNames($stgID){
		return $this->db->select('name')
						//->distinct()
						->from('stage')
						->where('id',$stgID)
						->get()
						->result_array();
	}
	public function getProjectStage($proID){
		return $this->db->select('project_stage_mapping.id,project_stage_mapping.stage_id,stage.name')
						//->distinct()
						->from('project_stage_mapping')
						->join('stage','project_stage_mapping.stage_id = stage.id','left')
						->where('project_id',$proID)
						->get()
						->result_array();
	}
	public function getStageActivityList($stgID){
		return $this->db->select('stage_activity_mapping.activity_id,activity.name')
						//->distinct()
						->from('stage_activity_mapping')
						->join('activity','stage_activity_mapping.activity_id = activity.id','left')
						//->where('stage_activity_mapping.id',$stgID)
						->where('project_stage_map_id',$stgID)
						->get()
						->result_array();
						//$sql = $this->db->last_query();
	}
	public function getStageProject(){
		return $this->db->select('project_id')
						->distinct()
						->from('project_stage_mapping')
						//->group_by('project_id')
						->get()
						->result_array();

	}
	public function getStageActivity(){
		return $this->db->select('project_stage_map_id')
						->distinct()
						->from('stage_activity_mapping')
						//->group_by('project_id')
						->get()
						->result_array();

	}
	public function deleteProjectEmployee($empID){
		$this->db->where('emp_id', $empID);
		return $query = $this->db->delete('project_to_employee_mapping');
	}
	public function deleteProjectStage($proID){
		$this->db->where('project_id', $proID);
		return $query = $this->db->delete('project_stage_mapping');
	}
	public function deleteActivity($actID){
		$this->db->where('id', $actID);
		return $query = $this->db->delete('activity');
	}
	public function deleteStage($stgID){
		$this->db->where('id', $stgID);
		return $query = $this->db->delete('stage');
	}
	public function deleteStageActivity($stgID){
		$this->db->where('project_stage_map_id', $stgID);
		return $query = $this->db->delete('stage_activity_mapping');
	}
	public function deleteStageActEmp($stgID){
		$this->db->where('project_stage_map_id', $stgID);
		return $query = $this->db->delete('stage_user_mapping');
	}
	public function getActivity(){
		return $this->db->select('id,name')
						//->distinct()
						->from('activity')
						->get()
						->result_array();
	}
	public function checkStg($empID, $stgID){
		return $this->db->select('id')
						//->distinct()
						->from('project_to_employee_mapping')
						->where('emp_id',$empID)
						->where('stage_id',$stgID)
						->get()
						->result_array();
	}
	public function checkAct($proID, $actID){
		return $this->db->select('id')
						//->distinct()
						->from('stage_activity_mapping')
						->where('project_stage_map_id',$proID)
						->where('activity_id',$actID)
						->get()
						->result_array();
	}
	public function deleteProject($proID){
		$this->db->where('id', $proID);
		return $query = $this->db->delete('project');
	}
	public function getEmployee(){
		return $this->db->select('id,username')
						->where('role','employee')
                         ->where('status','0')
						->from('users')
						->get()
						->result_array();
	}
	public function updateStage($stgid,$stgname){
		$this->db->where('id',$stgid);
		$query = $this->db->update('stage',array('name' => $stgname));
		if($query){
			return true;
		}else{
			return false;
		}
	}
	public function updateActivity($actid,$actname){
		$this->db->where('id',$actid);
		$query = $this->db->update('activity',array('name' => $actname));
		if($query){
			return true;
		}else{
			return false;
		}
	}
	public function getStagesFormStageMap(){
		return $this->db->distinct()
						->select('project_stage_mapping.id,stage.name')
						->from('project_stage_mapping')
						->join('stage','project_stage_mapping.stage_id = stage.id','left')
						->get()
						->result_array();
	}
	public function getEmpListEmp(){
		return $this->db->distinct()
						->select('project_to_employee_mapping.project_id,project_to_employee_mapping.emp_id,users.fname,users.sname')
						->from('project_to_employee_mapping')
						->join('users','project_to_employee_mapping.emp_id = users.id','left')
						->get()
						->result_array();
	}
	public function getStageListEmp($emp_id){
		return $this->db->distinct()
						->select('stage.name')
						->from('project_to_employee_mapping')
						->join('stage','project_to_employee_mapping.stage_id = stage.id','left')
						->where('project_to_employee_mapping.emp_id',$emp_id)
						->get()
						->result_array();
	}
	public function getProjactEmpMap($emp_id){
		return $this->db->distinct()
						->select('project.name')
						->from('project_to_employee_mapping')
						->join('project','project.id = project_to_employee_mapping.project_id','left')
						->where('project_to_employee_mapping.emp_id',$emp_id)
						->get()
						->result_array();
	}
	public function checkProStg($proId,$stgId){
		 $query = $this->db->select('*')
						->where('project_id',$proId)
						->where('stage_id',$stgId)
						->get('project_to_employee_mapping');
			return $query->num_rows();
	}
	
}
