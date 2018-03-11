<?php defined('BASEPATH') or exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: Nitesh
 * Date: 2/1/16
 * Time: 4:38 PM
 */

class Users extends MX_Controller{
   



    function __construct()
    {
        date_default_timezone_set('Asia/Calcutta');
        parent::__construct();

        $this->load->Model('Mdl_users');



    }



    /*
     * this is the index method the landing page for all operations
     */

    public function index()
    {
        $this->load->view('index');

        }

   public function login(){

       $email=$this->input->post('email');
       $password=$this->input->post('password');
       $this->Mdl_users->setData('checkUser',$email,$password);
       $data=$this->Mdl_users->checkUser();
//       print_r($data); die;
       if($data){
//                    print_r($data);
//                     die;

//                   $dashbord = $this->Mdl_users->login();
//                   $user_data = $this->Mdl_users->getUserData();
                   $this->_setSessionData('authorize', $data);
                        setInformUser('success', 'Login successfully');
                        redirect(base_url('users/dashboard'));

 }else{


           setInformUser('error','Your email is not registered with us. <br> Please register email using the Signup process.');
           redirect(base_url('users'));
           }

   }
    private function _setSessionData()
    {
        switch(func_get_arg(0)){
            case 'authorize':   $this->session->set_userdata('authorize',true);
                $this->session->set_userdata('user_data',func_get_arg(1));
                $this->session->set_userdata('login_first',1);

                break;

            case 'products':

                $this->session->set_userdata('user_products',func_get_arg(1));
                break;
            case 'order':

                $this->session->set_userdata('user_order',func_get_arg(1));
                break;
            default: break;
        }
    }

 public function dashboard(){
     $result['client'] = $this->Mdl_users->getClient('client');
     $result['contractor'] = $this->Mdl_users->getClient('contractor');
     $result['employee'] = $this->Mdl_users->getClient('employee');
     $result['project'] = $this->Mdl_users->project('project');
     $this->load->view('header/header');
     $this->load->view('dashboard',$result);
     $this->load->view('header/footer');
 }

 public function register()
 {
     if (islogin()) {
         if (strtolower($_SERVER['REQUEST_METHOD']) == 'post') {

             if ($this->input->post('role') == 'client') {
                 $this->Mdl_users->setData('client', $this->input->post('name'), $this->input->post('email'), $this->input->post('mobile'), $this->input->post('address'), $this->input->post('username'), $this->input->post('password'), $this->input->post('role'));
             }

             if ($this->input->post('role') == 'contractor') {
                 $this->Mdl_users->setData('contractor', $this->input->post('name'), $this->input->post('email'), $this->input->post('mobile'), $this->input->post('address'), $this->input->post('username'), $this->input->post('password'), $this->input->post('role'), $this->input->post('working_area'));
             }

             if ($this->input->post('role') == 'employee') {

                 $this->Mdl_users->setData('employee', $this->input->post('name'), $this->input->post('email'), $this->input->post('mobile'), $this->input->post('address'), $this->input->post('username'), $this->input->post('password'), $this->input->post('role'), $this->input->post('working_area'), $this->input->post('qualification'), $this->input->post('designation'), $this->input->post('dob'), $this->input->post('gender'), $this->input->post('status'), $this->input->post('nationality'));
             }

             $data = $this->Mdl_users->checkUser();
             if (!$data) {
                 if ($this->Mdl_users->register()) {
                     setInformUser('success', 'Your account is created successfully.');
                     redirect(base_url('users/dashboard'));
                 } else {
                     setInformUser('error', 'Some error Occurred!');

                     redirect(base_url('users/client'));
                 }

             } else {

                 setInformUser('error', 'Email Allready registered. Please Login. ');

                 redirect(base_url('users/client'));
             }

         } else {
             redirect('users');
         }
     }else{

         redirect('users');
     }
 }
    public function logout(){
        $this->session->sess_destroy();
        redirect(base_url('users?logout=1'));
    }

 public function client(){

         $result['client'] = $this->Mdl_users->getClient('client');
             $this->load->view('header/header');
             $this->load->view('client',$result);
             $this->load->view('header/footer');

 }
    public function contractor(){

        $result['contractor'] = $this->Mdl_users->getClient('contractor');
        $this->load->view('header/header');
        $this->load->view('contractor',$result);
        $this->load->view('header/footer');

    }
    public function employee(){

        $result['employee'] = $this->Mdl_users->getClient('employee');
        $this->load->view('header/header');
        $this->load->view('employee',$result);
        $this->load->view('header/footer');

    }
    public function profile(){
        if (islogin()) {
            if (strtolower($_SERVER['REQUEST_METHOD']) == 'post') {
                $this->Mdl_users->setData('profile', $this->input->post('name'), $this->input->post('email'), $this->input->post('mobile'), $this->input->post('address'), $this->input->post('role'));
                $data = $this->Mdl_users->getProfile();
                if($data){

                    setInformUser('success', 'Profile updated successfully.');
                    redirect(base_url('users/profile'));


                }else{

                    setInformUser('success', 'Your account is created successfully.');
                    redirect(base_url('users/profile'));
                }
            }else{
                $data['profile'] = $this->Mdl_users->getProfile();
                $this->load->view('header/header');
                $this->load->view('profile',$data);
                $this->load->view('header/footer');
            }


        }


    }
    public function password()
    {

        if (islogin()) {
//            cPassword
            if (strtolower($_SERVER['REQUEST_METHOD']) == 'post') {
                $data = $this->input->post();

                $this->Mdl_users->setData('password', $data['newPassword'], $data['oldPassword']);
                if($data['newPassword']== $data['cPassword']) {
                    if ($this->Mdl_users->password()) {
                        setInformUser('success', 'your password has been successfully updated.');
                        redirect(base_url('users/password/'));
                    } else {
                        setInformUser('error', 'password does not match old password');
                        redirect(base_url('users/password/'));
                    }
                }else{
                    setInformUser('error', 'new password  does not confirm password ; ');
                    redirect(base_url('users/password/'));
                }


            } else {
                $this->load->view('header/header');
                $this->load->view('password');
                $this->load->view('header/footer');
            }


        } else {
            redirect(base_url('/users/'));

        }

    }
    public function status(){
        if (strtolower($_SERVER['REQUEST_METHOD']) == 'post') {
            //print_r($_POST);

            $exp = explode('_',$_POST['id']);
            $status= $exp['0'];
            $id = $exp['1'];
            $dd= $this->Mdl_users->status($status,$id);
            if($dd ==1){
                echo 0;

            }else{
              echo 1;
            }

        }


    }
    public function update(){
        if (strtolower($_SERVER['REQUEST_METHOD']) == 'post') {
            $dd= $this->Mdl_users->update($_POST);
            if($this->input->post('role') == 'employee'){
                $link = 'users/employee';
            }elseif ($this->input->post('role') == 'client'){
                $link = 'users/client';
            }elseif ($this->input->post('role') == 'contractor'){
                $link = 'users/contractor';
            }

            if($dd){
                setInformUser('success', 'updated successfully.');
                redirect(base_url($link));
            }else{
                setInformUser('success', 'something worng.');
                redirect(base_url($link));
            }
        }


    }
    public function admin_changePassword(){
        if($_POST['change_password'] != $_POST['confirm_password']){
            setInformUser('success', 'Please Enter Same Password');
            redirect('users/client');
        }else{
            $ch= $this->Mdl_users->adminChangepassword($_POST['confirm_password'],$_POST['changepasswod']);
           if($ch){
               setInformUser('success', 'Password change successfully');
               redirect('users/client');
           }else{
               setInformUser('success', 'Something Error');
               redirect('users/client');
           }
        }
    }
}
