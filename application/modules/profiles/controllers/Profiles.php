<?php 
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Created by PhpStorm.
 * User: Nitesh
 * Date: 17/9/15
 * Time: 3:00 PM
 */
Class Profiles extends MX_Controller{


function __construct(){
	parent::__construct();
	$this->load->Model('Mdl_profiles');
//	$this->load->helper(array('form','url','language'));
	$this->load->library('upload');
}

function index()
{


	if (strtolower($_SERVER['REQUEST_METHOD']) == 'post') {
		$to_do_with_post=$_POST['todo'];
		if ($to_do_with_post=="hlm8734"){
         echo $this->_updateProfile('step1',$this->input->post())?"your profiles inserted sucessfully":"sorry, some error occured";
		}
		elseif($to_do_with_post=="hlm34523")
		{
			echo $this->_updateProfile('step2',$this->input->post())?"Your profiles update sucessfully":"sorry, some error occured";
		}
		elseif ($to_do_with_post=="hlm23413")
		{
			echo $this->_updateProfile('step3',$this->input->post())?"Your profiles update sucessfully":"sorry, some error occured";
		}

	}

	else {
		$data['profiles_data']=$this->_getProfileData();
		$this->load->view('index.php',$data);
		//$this->_getProfileData();
	    }
}

	/**
	 * @param $todo
	 * @param $data
     */
	private function _updateProfile($todo,$data)
	{
		switch ($todo){

			case'step1':   /*echo '<pre/>' ;
							print_r($data);*/
							$this->Mdl_profiles->setData($todo,/*"2"*/$this->session->userdata['user_data']['user_id'],$data['first_name'],$data['last_name']);
							return $this->Mdl_profiles->updateProfile($todo)?true:false;
							break;
			case 'step2':

							$config['upload_path'] = APPPATH.'modules/profiles/upload/';

				            $config['allowed_types'] = 'png|jpeg|gif|jpg';
							$config['max_size'] = '2048000';

				            $image=time().$_FILES['image']['name'];
							 $config['upload_path'];
							// die;
				            $_FILES['image']['name'] = $image;

				            $this->upload->initialize($config);
				            $this->upload->do_upload('image');


							$this->Mdl_profiles->setData($todo,$image,$this->session->userdata['user_data']['user_id']);

						   return $this->Mdl_profiles->updateProfile($todo)?true:false;
			      break;

			case 'step3': $this->Mdl_profiles->setData($todo,$data['address'],$data['pin'],$data['state'],$data['country'],$this->session->userdata['user_data']['user_id']);
						  return $this->Mdl_profiles->updateProfile($todo)?true:false;
				break;

			default: break;
		}

	}



	private  function _getProfileData()
	{
		$todo = "get_profiles_data";

		$this->Mdl_profiles->setData($todo, $this->session->userdata['user_data']['user_id']);
		$data['profiles_data'] = $this->Mdl_profiles->toArray();
	}

				private  function _toArray(){
					  $this->Mdl_profiles->setData($this->session->userdata['user_data']['user_id']);
					  $data['profilesData']=$this->Mdl_profiles->getProfileData($this->session->userdata['user_data']['user_id']);

					 return $data;
				}

}