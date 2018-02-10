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
}
