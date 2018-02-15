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

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
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


                break;
            default:
                break;
        }

    }
    public function createStage()
    {
        if ($this->role == 'stage') {
            $data = array(
                'stage_name' => $this->stage,
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
            'stage_id' => $this->stage_name,
            'activity_name' => $this->activity_name,
            'is_blocked'=>'0',
            'created_by' => $this->session->userdata['user_data'][0]['fname'],
            'created_on'=>date("Y-m-d H:i:s"),
            'ip' =>$_SERVER['REMOTE_ADDR']
        );
            $query= $this->db->insert('activite', $data);
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
            $result = $this->db->get('activite')->result_array();
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
            'status'=>"0",
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
        return $this->db->get('project')->result_array();
}
}
