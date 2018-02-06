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

       $data=$this->input->post();
//       print_r($data);
       $this->Mdl_users->setData('login',$data['email'],$data['password']);


       if(!empty($data)){


               $dashbord = $this->Mdl_users->login();
               if($dashbord == 1){
                   echo 'ok';

               } else if($dashbord == 2){
                   echo 'wrong';
               }else{
                   echo 'wrong';
               }
       }

//       $user_name = $this->input->post('user_name');
//       echo $user_name;

   }
}
