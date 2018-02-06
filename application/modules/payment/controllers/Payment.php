<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Payment extends CI_Controller
{
	 function  __construct(){
		parent::__construct();
		$this->load->library('paypal_lib');
		$this->load->model('Mdl_payment');
		$this->load->model('users/Mdl_users');
	 }
	 
	 function index(){
		$data = array();
		//get products data from database
        $data['products'] = $this->Mdl_payment->getRows();
		//pass the products data to view
		$this->load->view('products/index', $data);
	}

	 function success(){
	    //get the transaction data
		/*$paypalInfo = $this->input->get();
		  print_r($paypalInfo);die;*/
		/*$data['item_number'] = $paypalInfo['item_number']; 
		 $data['txn_id'] = $paypalInfo["tx"];
		 $data['payment_amt'] = $paypalInfo["amt"];
		 $data['currency_code'] = $paypalInfo["cc"];
		  $data['status'] = $paypalInfo["st"];*/
		
		

		//pass the transaction data to view
		 $this->load->view('users/header/header'); 
         $this->load->view('users/success');
         $this->load->view('users/header/footer');

	 }
	 
	 function cancel(){
	 	$this->load->view('users/header/header');
        $this->load->view('paypal/cancel');
        $this->load->view('users/header/footer');
	 }
	 
	 function ipn(){
		//paypal return transaction details array
		$paypalInfo	= $this->input->post();

		$data['user_id'] = $paypalInfo['custom'];
		$data['product_id']	= $paypalInfo["item_number"];
		$data['txn_id']	= $paypalInfo["txn_id"];
		$data['payment_gross'] = $paypalInfo["payment_gross"];
		$data['currency_code'] = $paypalInfo["mc_currency"];
		$data['payer_email'] = $paypalInfo["payer_email"];
		$data['payment_status']	= $paypalInfo["payment_status"];

		$paypalURL = $this->paypal_lib->paypal_url;		
		$result	= $this->paypal_lib->curlPost($paypalURL,$paypalInfo);
		
		//check whether the payment is verified
		if(eregi("VERIFIED",$result)){
		    //insert the transaction data into the database
			$this->Mdl_payment->insertTransaction($data);
		}
    }
    function buy(){

       if($data['file']=$this->Mdl_users->payment()){
/*    	print_r($this->session->userdata('user_order'));
print_r($this->session->userdata('user_products'));*/

$product_name=$this->session->userdata['user_products']['services'];
           $flag=$this->session->userdata['user_products']['flag'];
//           $country=$this->session->userdata['user_products']['country'];

$prics='';
           if($this->session->userdata('coupon_discount_amount')){
               $prics= round($this->session->userdata('coupon_discount_amount'),2);}
           else{$prics= round($this->session->userdata('user_products')['total'],2);}
           $product_id=$this->session->userdata['order_id'];

           if($flag=='AUD'){$country='Australia';}
           if($flag=='USD'){$country='United States';}
           if($flag=='GBP'){$country='United Kingdom';}
           if($flag=='GBP'){$country='Other Country';}

//           echo $country;
//           echo $prics;
//die;
		//Set variables for paypal form
		/*$paypalURL = 'https://www.sandbox.paypal.com/cgi-bin/webscr'; //test PayPal api url
		$paypalID = 'info@codexworld.com'; //business email */
		$paypalURL = 'https://www.sandbox.paypal.com/cgi-bin/webscr'; //test PayPal api url
		$paypalID = 'team.stabilis@gmail.com';
		$returnURL = base_url().'users/success'; //payment success url
		$cancelURL = base_url().'users/cancel'; //payment cancel url
		$notifyURL = base_url().'payment/ipn'; //ipn url
		//get particular product data
		
		$userID =  $this->session->userdata['user_data']['user_id'];//current user id
		$logo = base_url().'assets/images/codexworld-logo.png';
		
		$this->paypal_lib->add_field('business', $paypalID);
		$this->paypal_lib->add_field('return', $returnURL);
		$this->paypal_lib->add_field('cancel_return', $cancelURL);
		$this->paypal_lib->add_field('notify_url', $notifyURL);
		$this->paypal_lib->add_field('item_name', $product_name);
		$this->paypal_lib->add_field('custom', $userID);
		$this->paypal_lib->add_field('item_number',  $product_id);
		$this->paypal_lib->add_field('amount',  $prics);
		$this->paypal_lib->add_field('currency_code', $flag);
		$this->paypal_lib->add_field('country',$country);


		$this->paypal_lib->image($logo);
		
		$this->paypal_lib->paypal_auto_form();
	}
	else{
          redirect(base_url('users/do_upload'));
	}
}

//<?php echo base_url().'payment/buy';
    function paymentExtraAmount($id){
//         print_r($id);
//        $this->session->set_userdata('user_order',func_get_arg(1));

        if($data['file']=$this->Mdl_users->getProduct($id)){

//             print_r($data['file']); echo $data['file'][0]['eduworkers_products_services']; die();

            /*    	print_r($this->session->userdata('user_order'));

            print_r($this->session->userdata('user_products'));*/
            $product_name=$data['file'][0]['eduworkers_products_services'];
            $prics=$data['file'][0]['eduworkers_products_extra_amount'];
//            echo $product_name; echo $prics; die;
            $product_id=$id;
            $flag=$data['file'][0]['eduworkers_products_currency'];

            if($flag=='AUD'){$country='Australia';}
            if($flag=='USD'){$country='United States';}
            if($flag=='GBP'){$country='United Kingdom';}
            if($flag=='GBP'){$country='Other Country';}
            /*die;*/
            //Set variables for paypal form
            /*$paypalURL = 'https://www.sandbox.paypal.com/cgi-bin/webscr'; //test PayPal api url
            $paypalID = 'info@codexworld.com'; //business email */
            $paypalURL = 'https://www.sandbox.paypal.com/cgi-bin/webscr'; //test PayPal api url
            $paypalID = 'team.stabilis@gmail.com';
            $returnURL = base_url().'users/successExtra'; //payment success url
            $cancelURL = base_url().'users/cancel'; //payment cancel url
            $notifyURL = base_url().'payment/ipn'; //ipn url
            //get particular product data

            $userID =  $this->session->userdata['user_data']['user_id'];//current user id
            $logo = base_url().'assets/images/codexworld-logo.png';

            $this->paypal_lib->add_field('business', $paypalID);
            $this->paypal_lib->add_field('return', $returnURL);
            $this->paypal_lib->add_field('cancel_return', $cancelURL);
            $this->paypal_lib->add_field('notify_url', $notifyURL);
            $this->paypal_lib->add_field('item_name', $product_name);
            $this->paypal_lib->add_field('custom', $userID);
            $this->paypal_lib->add_field('item_number',  $product_id);
            $this->paypal_lib->add_field('amount',  $prics);
            $this->paypal_lib->add_field('currency_code', $flag);
            $this->paypal_lib->add_field('country',$country);
            $this->paypal_lib->image($logo);

            $this->paypal_lib->paypal_auto_form();
        }
        else{
            redirect(base_url('users/do_upload'));
        }
    }
}