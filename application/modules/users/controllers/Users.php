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

//      if (islogin()) {
//         /*redirect(base_url('users/dashboard'));*/
//         if (isAdmin()) {
//             redirect(base_url('admin'));
//         }
//         else{
//             $this->load->view('header/header');
//             $this->load->view('index');
//             $this->load->view('header/footer');
//         }
//      }
//        else{
//
//        if($this->_logged_in()){
//            if($this->_getRole()=='guest'){
//                //show their dashboard
//            }elseif($this->_getRole()=='host'){
//                //show their dashboard
//            }
//        }else if(strtolower( $_SERVER['REQUEST_METHOD'] ) == 'post'){
//            $to_do_with_post=$_POST["todo"];
//            if(isset($to_do_with_post)){
//                if($to_do_with_post=='login'){
//                    $this->_login($this->input->post());
//                }elseif($to_do_with_post=='register'){
//
//
//
//
//                    $this->_register($this->input->post());
//                }
//            }
//        }else{
//
//            $this->load->view('header/header');
//             $this->load->view('index');
//             $this->load->view('header/footer');
//        }
//    }
// }



    }

   public function login(){

       $email=$this->input->post('email');
       $password=$this->input->post('password');

//       echo $data['email'];
//       print_r($data); die;
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
                   /*echo $user_data['user_role_name'];die;*/
//                   if ($user_data['user_role_name'] == 'admin') {
//                       setInformUser('success', 'Login successfully');
//                       redirect(base_url('admin'));
//                   } else if ($this->session->userdata('user_products')) {
//
//                       redirect(base_url('users/do_upload'));
//
//                   }
//                   if(){
//                       setInformUser('success', 'Login successfully');
//                       redirect(base_url('users'));
//                   }
//                   else{
//                       setInformUser('success', 'Login successfully');
//                       redirect(base_url('users'));
//                   }
//                   echo $dashbord;
//                   if ($dashbord == 1) {
//                       echo 'ok';
//
//                   } else if ($dashbord == 2) {
//                       echo 'wrong';
//                   } else {
//                       echo 'wrong';
//                   }


      }else{


           setInformUser('error','Your email is not registered with us. <br> Please register email using the Signup process.');
           redirect(base_url('users'));
           }

//       $user_name = $this->input->post('user_name');
//       echo $user_name;

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

     $this->load->view('header/header');
     $this->load->view('dashboard');
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
                 $this->Mdl_users->setData('employee', $this->input->post('name'), $this->input->post('email'), $this->input->post('mobile'), $this->input->post('address'), $this->input->post('username'), $this->input->post('password'), $this->input->post('role'), $this->input->post('working_area'));
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


         $this->load->view('header/header');
         $this->load->view('client');
         $this->load->view('header/footer');

 }
    public function contractor(){


        $this->load->view('header/header');
        $this->load->view('contractor');
        $this->load->view('header/footer');

    }
    public function employee(){


        $this->load->view('header/header');
        $this->load->view('employee');
        $this->load->view('header/footer');

    }

}
