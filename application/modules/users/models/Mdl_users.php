<?php defined('BASEPATH') or exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: Nitesh
 * Date: 2/1/16
 * Time: 7:05 PM
 */

class Mdl_users extends CI_Model
{
    const GUEST_ID = 1; //may be needs to do it like it take it from database or to define user level as global constants later. It will be seen in future.
    private $email;
    private $password;
    private $mobile;
    private $sname;
    private $fname;
    private $username;
    private $address;
    private $role;
    private $workingarea;
    private $newPassword;
    private $qualification;
    private $designation;
    private $dob;
    private $gender;
    private $status;
    private $nationality;

    /**
     * @return mixed
     */
    public function getQualification()
    {
        return $this->qualification;
    }

    /**
     * @param mixed $qualification
     */
    public function setQualification($qualification)
    {
        $this->qualification = $qualification;
    }

    /**
     * @return mixed
     */
    public function getDesignation()
    {
        return $this->designation;
    }

    /**
     * @param mixed $designation
     */
    public function setDesignation($designation)
    {
        $this->designation = $designation;
    }

    /**
     * @return mixed
     */
    public function getDob()
    {
        return $this->dob;
    }

    /**
     * @param mixed $dob
     */
    public function setDob($dob)
    {
        $this->dob = $dob;
    }

    /**
     * @return mixed
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * @param mixed $gender
     */
    public function setGender($gender)
    {
        $this->gender = $gender;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param mixed $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * @return mixed
     */
    public function getNationality()
    {
        return $this->nationality;
    }

    /**
     * @param mixed $nationality
     */
    public function setNationality($nationality)
    {
        $this->nationality = $nationality;
    }


    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @return mixed
     */
    public function getMobile()
    {
        return $this->mobile;
    }

    /**
     * @param mixed $mobile
     */
    public function setMobile($mobile)
    {
        $this->mobile = $mobile;
    }

    /**
     * @return mixed
     */
    public function getSname()
    {
        return $this->sname;
    }

    /**
     * @param mixed $sname
     */
    public function setSname($sname)
    {
        $this->sname = $sname;
    }

    /**
     * @return mixed
     */
    public function getFname()
    {
        return $this->fname;
    }

    /**
     * @param mixed $fname
     */
    public function setFname($fname)
    {
        $this->fname = $fname;
    }

    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param mixed $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }

    /**
     * @return mixed
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param mixed $address
     */
    public function setAddress($address)
    {
        $this->address = $address;
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
    public function getWorkingarea()
    {
        return $this->workingarea;
    }

    /**
     * @param mixed $workingarea
     */
    public function setWorkingarea($workingarea)
    {
        $this->workingarea = $workingarea;
    }

    /**
     * @return mixed
     */
    public function getNewPassword()
    {
        return $this->newPassword;
    }

    /**
     * @param mixed $newPassword
     */
    public function setNewPassword($newPassword)
    {
        $this->newPassword = $newPassword;
    }


    public function setData()
    {

        switch (func_get_arg(0)) {
            case "checkUser":
                $this->setEmail(func_get_arg(1));
                $this->setPassword(func_get_arg(2));
//                $this->setRoleId(func_get_arg(3));
//                $this->setUserFname(func_get_arg(4));
//                $this->setPhone(func_get_arg(5));
                break;
            case "client":
                $this->setFname(func_get_arg(1));
                $this->setEmail(func_get_arg(2));
                $this->setMobile(func_get_arg(3));
                $this->setAddress(func_get_arg(4));
                $this->setUsername(func_get_arg(5));
                $this->setPassword(func_get_arg(6));
                $this->setRole(func_get_arg(7));


                break;
            case "contractor":
                $this->setFname(func_get_arg(1));
                $this->setEmail(func_get_arg(2));
                $this->setMobile(func_get_arg(3));
                $this->setAddress(func_get_arg(4));
                $this->setUsername(func_get_arg(5));
                $this->setPassword(func_get_arg(6));
                $this->setRole(func_get_arg(7));
                $this->setWorkingarea(func_get_arg(8));

                break;
            case "employee":
                $this->setFname(func_get_arg(1));
                $this->setEmail(func_get_arg(2));
                $this->setMobile(func_get_arg(3));
                $this->setAddress(func_get_arg(4));
                $this->setUsername(func_get_arg(5));
                $this->setPassword(func_get_arg(6));
                $this->setRole(func_get_arg(7));
                $this->setWorkingarea(func_get_arg(8));
                $this->setQualification(func_get_arg(9));
                $this->setDesignation(func_get_arg(10));
                $this->setDob(func_get_arg(11));
                $this->setGender(func_get_arg(12));
                $this->setStatus(func_get_arg(13));
                $this->setNationality(func_get_arg(14));


                break;

            case "profile":
                $this->setFname(func_get_arg(1));
                $this->setEmail(func_get_arg(2));
                $this->setMobile(func_get_arg(3));
                $this->setAddress(func_get_arg(4));
                $this->setRole(func_get_arg(5));
                break;


            case "password":
                $this->setNewPassword(func_get_arg(1));
                $this->setPassword(func_get_arg(2));

                break;

//            case "setSessionData": {
//
//                $data = $this->db->where(array('eduworkers_users_username' => func_get_arg(1)))->select('eduworkers_users_username,eduworkers_users_id,eduworkers_users_roles_id,eduworkers_users_userfname')->get('eduworkers_users')->result_array();
//                /*print_r($data); die;*/
//                $this->setUserID($data[0]['eduworkers_users_id']);
//                $this->setUserName($data[0]['eduworkers_users_username']);
//                $this->setUserFname($data[0]['eduworkers_users_userfname']);
//                $this->setRoleId($data[0]['eduworkers_users_roles_id']);
//                //$this->setPhone($data[0]['eduworkers_users_phone']);
//                $role_name = $this->db->where(array('eduworkers_roles_id' => $this->role_id))->select('eduworkers_roles_name')->get('eduworkers_roles')->result_array();
//                $this->setRolesName($role_name[0]['eduworkers_roles_name']);
//                $this->permissions_name = array();
//                /* echo $this->getUserFname(); die;*/
//
//            }
//                break;
//            case "facebook_login": {
//                $this->setUserName(func_get_arg(1));
//                $this->setSocialId(func_get_arg(2));
//                $this->setToken(func_get_arg(3));
//                $this->setProvider(func_get_arg(4));
//                break;
//            }
//            case "is_Social": {
//                $this->setUserId(func_get_arg(1));
//                $this->setProvider(func_get_arg(2));
//                break;
//            }
//            case 'UidEmail' : {
//                $this->setUserId(func_get_arg(1));
//                $this->setUserId(func_get_arg(2));
//                break;
//            }
//
//
//            case'get_email': {
//                $this->setUserName(func_get_arg(1));
//                $this->setToken(func_get_arg(2));
//                break;
//
//
//            }
//
//            case 'token':{
//                $this->setToken(func_get_arg(1));
//
//                break;
//            }
//
//            case'pass':{
//                $this->setPassword(func_get_arg(1));
//
//
//                break;
//
//            }
//            case'update_profile':{
//
//                $this->setPhone(func_get_arg(1));
//                $this->setUserFname(func_get_arg(2));
//
//
//                break;
//
//            }
//            case'updatePassword':{
//                $this->setPassword(func_get_arg(1));
//                $this->setNewPassword(func_get_arg(2));
//
//
//
//                break;
//
//            }
            default:
                break;
        }

    }

    public function checkUser()
    {
        if (filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            $this->db->where(array('email' => $this->email));
        }
        elseif (is_numeric($this->email)) {
            $this->db->where(array('mobile' => $this->email));
        }else{
            $this->db->where(array('username' => $this->email));

        }
            $data = $this->db->get('users')->result_array();
//          print_r($this->email);
//        $data2 = $this->db->where(array('email' => $this->email))->select('password')->get('users')->result_array();
//        $data3 = $this->db->where(array('mobile' => $this->email))->select('password')->get('users')->result_array();
//         print_r($data);
//         $pss="q1w2e3r4";
//        print_r(password_hash($pss, PASSWORD_DEFAULT));
//       die;
//        print_r($data);
//        echo $this->password;
//        echo $data[0]['password'];
//        die;

        if ($data){
            if (password_verify($this->password,$data[0]['password'])){
                return $data;
            }else {
//                die;
                return false;
            }

        }else{ return false;}


    }

  public function getUserData()
    {
        return $this->db->where('user_name',$this->getUserName())->get('users')->result_array();
    }

  public  function register()
  {

      $this->setPassword(password_hash($this->password, PASSWORD_DEFAULT));
      if ($this->role == 'client') {
          $data = array(
              'fname' => $this->fname,
              'username' => $this->username,
              'email' => $this->email,
              'password' => $this->password,
              'mobile' => $this->mobile,
              'address' => $this->address,
              'role' => 'client',
              'status' => 0
          );
      } else if ($this->role == 'contractor') {
          $data = array(
              'fname' => $this->fname,
              'username' => $this->username,
              'email' => $this->email,
              'password' => $this->password,
              'mobile' => $this->mobile,
              'address' => $this->address,
              'role' => 'contractor',
              'working_area' => $this->workingarea,
              'status'=>'0'


          );
      } else if ($this->role == 'employee') {
          $data = array(
              'fname' => $this->fname,
              'username' => $this->username,
              'email' => $this->email,
              'password' => $this->password,
              'mobile' => $this->mobile,
              'address' => $this->address,
              'role' => 'employee',
              'working_area' => $this->workingarea,
              'qualification'=>$this->qualification,
              'qesignation'=>$this->designation,
              'dob'=>$this->dob,
              'gender'=>$this->gender,
              'Nationality'=>$this->nationality,
              'status'=>$this->status

          );
      }
//      print_r($data);die;

//      $da=$this->db->insert('users', $data);
      $query= $this->db->insert('users', $data)? true : false;

      if ($query) {
       return true;
      }else{
          return false;
      }
  }
//    public function is_user($data){
//        $final_result = '';
//        if(!empty($data)){
//            if (filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
//                $this->db->where('email', $data['email']);
//            } else {
//                $this->db->where('mobile', $data['email']);
//            }
//        }
////        $cols = array("id", "name", "email",'password','mobile','created_by');
//        $results=$this->db->get('user')->result_array();
////        $results = $this->db->getOne('client_table',$cols);
//
//
//
//        if(!empty($results)){
//            $final_result =$results;
//        } else{
//            $final_result = 0;
//        }
//        return $final_result;
//
//    }
public function getProfile(){

    if($this->role == 'profile'){
        $data = array(
        'fname' => $this->fname,
        'username' => $this->username,
        'email' => $this->email,
        'mobile' => $this->mobile,
        'address' => $this->address,
    );
        $this->db->where('mobile', $this->session->userdata['user_data'][0]['mobile']);
        $query = $this->db->update('users', $data);
        if($query){
            return true;
        }else{
            return false;
        }
    }else{
        //$this->db->where('role',$this->session->userdata['user_data'][0]['role']);
        $this->db->where('mobile',$this->session->userdata['user_data'][0]['mobile']);
        $query = $this->db->get('users')->result_array();
        return $query;
    }


    }

    public function password(){
        $data = $this->db->where('id',$this->session->userdata['user_data'][0]['id'])->select('password')->get('users')->result_array();
// echo $this->db->last_query();
//   echo     $this->session->userdata['user_data']['id'];

// print_r($this->session->userdata['user_data'][0]['id']); die;
//      echo  $data[0]['password'];
// print_r($data);die;
//    echo    password_hash('q1w2e3r4', PASSWORD_DEFAULT);
//    die;
        if($data) {
            //    echo $this->new_pass;
//             print_r($data);die;
            if (password_verify($this->password, $data[0]['password'])){
                $this->setNewPassword(password_hash($this->newPassword, PASSWORD_DEFAULT));

                $data=array('password'=>$this->newPassword);

//                 print_r($data);die;
                $this->db->where('id',$this->session->userdata['user_data'][0]['id'])->update('users',$data);

                if ($this->db->affected_rows('users')) {
                    /*print_r($data);die;*/
                    return true;
                }else{
                    return false;
                }


            }else {return false;}

        }else { return false;}

    }
    public function getClient($data){

        if($data == 'client'){
            $this->db->where('role',$data);
            $result = $this->db->get('users')->result_array();
            if(!empty($result)){
                return $result;
            }else{
                return false;
            }
        }else if($data =='contractor'){
            $this->db->where('role',$data);
            $result = $this->db->get('users')->result_array();
            if(!empty($result)){
                return $result;
            }else{
                return false;
            }


        }else if($data =='employee'){
            $this->db->where('role',$data);
            $result = $this->db->get('users')->result_array();
            if(!empty($result)){
                return $result;
            }else{
                return false;
            }


        }

//        if($this->role == 'profile'){
//            $data = array(
//                'fname' => $this->fname,
//                'username' => $this->username,
//                'email' => $this->email,
//                'mobile' => $this->mobile,
//                'address' => $this->address,
//            );
//            $this->db->where('mobile', $this->session->userdata['user_data'][0]['mobile']);
//            $query = $this->db->update('users', $data);
//            if($query){
//                return true;
//            }else{
//                return false;
//            }
//        }else{
//            //$this->db->where('role',$this->session->userdata['user_data'][0]['role']);
//            $this->db->where('mobile',$this->session->userdata['user_data'][0]['mobile']);
//            $query = $this->db->get('users')->result_array();
//            return $query;
//        }


    }


}
