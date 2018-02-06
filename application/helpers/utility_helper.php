<?php
/**
 * Created by PhpStorm.
 * User: tushar
 * Date: 11/9/15
 * Time: 5:51 PM
 */

function islogin(){
    $ci=CI::get_instance();
    if ($ci->session->has_userdata('user_data')){
        return true;
    }
    return false;
}
function asset_url(){
    return base_url().'assets/';
}
function checkSession(){
    $ci=CI::get_instance();
    if($ci->session->userdata('authorize')){
        return true;
    }
    return false;
}
function hasPermission($provided_permission){
    $ci=CI::get_instance();
    $permission=$ci->session->userdata('user_data');
    $permission=$permission['user_permissions'];
    if(checkSession()&&isset($permission)){return in_array($provided_permission,$permission)? true:false;}
    return false;
}
function isAdmin(){
    $ci=CI::get_instance();
    $role=$ci->session->userdata('user_data');
    $role=$role['user_role_name'];
    if(checkSession()){
    if(strtolower($role)=='admin'){
        return true;
        }
    }
    return false;
}
function isSocial($provided_email,$provided_provider){
    $ci=CI::get_instance();
    $ci->load->Model('users/Mdl_users');
    $ci->Mdl_users->setData('is_social',$provided_email,$provided_provider);
    return $ci->Mdl_users->isSocialRegistered()? true:false;
}
function setInformUser(){
    $ci=CI::get_instance();
    $flash_data=$ci->session->flashdata('message');
    unset($flash_data);
    switch(func_get_arg(0)){
        case 'success' : {
            $ci->session->set_flashdata('message',func_get_arg(1));
            break;
        }
        case 'error': {
            $ci->session->set_flashdata('message',func_get_arg(1));
            break;
        }
        default:{
            break;
        }
    }
}
function getInformUser(){
    $ci=CI::get_instance();
    if($ci->session->flashdata('message')){
        return $ci->session->flashdata('message');
    }
}

/**
 * @return bool
 */
function isAccountActive(){
    $ci=ci::get_instance();
    $ci->load->Model('users/Mdl_users');
    return $ci->Mdl_users->isActive()?true:false;
}

/**
 * credit keys to users wallet when some conditions met
 * @return bool
 */
 function offerCredit($wallet_id,$transaction_description,$transaction_type,$transaction_amount){
    $ci=CI::get_instance();
    $ci->load->Model('wallet/Mdl_wallet');
    $ci->Mdl_wallet->setData(strtolower(Wallet_transaction_type::CREDIT),array('users_email'=>$wallet_id,'transaction_description'=>$transaction_description,'transaction_type'=>$transaction_type,'transaction_amount'=>$transaction_amount));
    return $ci->Mdl_wallet->doWalletTransaction(strtolower(Wallet_transaction_type::CREDIT));
}

//test if logged in user is host or not
function isHost(){
    $ci=CI::get_instance();
    if(checkSession()){
      return strtolower($ci->session->userdata('user_data')['user_role_name'])=='host'?true :false;
    }
    return false;
}
//test if logged in user is guest or not
function isGuest(){
    $ci=CI::get_instance();
    if(checkSession()){
        return strtolower($ci->session->userdata('user_data')['user_role_name'])=='guest'?true :false;
    }
    return false;
}


function hasUser(){
    $ci=CI::get_instance();
    $ci->load->Model('users/Mdl_users');
    return $ci->Mdl_users->hasUser()?true:false;
}
function stateUser(){
    $ci=CI::get_instance();
    $ci->load->Model('users/Mdl_users');
    return $ci->Mdl_users->stateUser()?true:false;
}


function setEmail(){
    $ci=CI::get_instance();
    $ci->load->Model('users/Mdl_users');
   $email['set_email']=$ci->Mdl_users->setEmail();

   $email=$email['set_email'][0]['eduworkers_email_settings_smtp_user'];
   return$email; 
}


function currencyConvert($from,$to,$amount){
    /*echo $from; die;*/
        $url = "https://finance.google.com/finance/converter?a=$amount&from=$from&to=$to";

    $req = curl_init();
    $timeout = 0; 
    curl_setopt ($req, CURLOPT_URL, $url); 
    curl_setopt ($req, CURLOPT_RETURNTRANSFER, 1); 

    curl_setopt ($req, CURLOPT_USERAGENT,"Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.1)"); 
    curl_setopt ($req, CURLOPT_CONNECTTIMEOUT, $timeout); 
    $rawdata = curl_exec($req); 
    curl_close($req); 
//    print_r($rawdata);die;
    return $rawdata;
     }


function calculate($data){
//    $phone
//    $email
    $date11=$data['date'];
    $country=$data['country'];
//    $flag1=$data['flags'];

//    $subject
//    $services
//    $grade
//    $word_count
//    $word_count1
//    $word_count2
//    $slide
//      echo $country;
     if($country=='Australia'){$flag1='AUD';}
     if($country=='United States'){$flag1='USD';}
     if($country=='United Kingdom'){$flag1='GBP';}
     if($country=='Other Country'){$flag1='GBP';}


    $date1 = new DateTime($date11);
    $date2 = new DateTime("now");
    $diff = $date2->diff($date1);
    $date=$diff->days;
//    $flag1=$data['flags'];
    $total=0;
//    echo $date;
//    print_r($data); die;

    $grade=$data['grade'];
    $subjects=$data['subject'];
    if($data['word_count']){$words=$data['word_count'];}
    if($data['word_count1']){$words=$data['word_count1'];}
    if($data['word_count2']){$words=$data['word_count2'];}
//    echo $words;
//    echo $grade;
//    $words=$data['length'];
    $slide=$data['slide'];
    $services=$data['services'];
    $checkbokEng='';
    if($services=='Powerpoint presentation'){


        $pl=15;

        $total=$pl* $slide;
        /* echo json_encode($total);*/

    }




    else if($grade=='gcse A'){
        $pl=0.075;


        if ($date==1 ) {

            $pl2=2.5;
            $total=$pl* $words*$pl2;
            /* echo json_encode($total);*/
        }
        elseif ($date==2 ) {

            $pl2=1.75;
            $total=$pl* $words*$pl2;
            /* echo json_encode($total);*/
        }
        elseif ($date==3 ) {

            $pl2=1.5;
            $total=$pl* $words*$pl2;
            /*echo json_encode($total);*/
        }elseif ($date==4 ) {

            $pl2=1.35;
            $total=$pl* $words*$pl2;
            /*echo json_encode($total);*/
        }elseif ($date==5 ) {

            $pl2=1.20;
            $total=$pl*$words*$pl2;
            /* echo json_encode($total);*/
        }elseif ( $date==6 or $date==7 or $date==8 or $date==9) {

            $pl2=1.15;
            $total=$pl* $words*$pl2;
            /*  echo json_encode($total);*/
        }elseif ($date==10 ) {

            $pl2=1;
            $total=$pl* $words*$pl2;
            /* echo json_encode($total);*/
        }
    }
    else if ($grade=='gcse B' or $grade=='nvq') {

        $pl=0.0714;
        $pl2=1;


        $total=$pl* $words*$pl2;
        /*echo json_encode($total);*/
    }

    else if ($grade=='merit') {

        $pl=0.075;
        $pl2=1;
        $total=$pl* $words*$pl2;
        /* echo json_encode($total);*/
    }

    else if ($grade=='A grade b') {

        $pl=0.075;
        $pl2=1;
        $total=$pl* $words*$pl2;
        /*echo json_encode($total);*/
    }
    else if ($grade=='A grade A') {

        $pl=0.0786;
        $pl2=1;
        $total=$pl* $words*$pl2;
        /* echo json_encode($total);*/
    }
    else if ($grade=='Diploma pass') {

        $pl=0.075;
        $pl2=1;
        $total=$pl* $words*$pl2;
        /* echo json_encode($total);*/
    }
    else if ($grade=='Diploma merit') {

        $pl=0.093;
        $pl2=1;
        $total=$pl* $words*$pl2;
        /*echo json_encode($total);*/
    }

    else if ($grade=='Undergraduate 2:2') {

        $pl=0.082;
        $pl2=1;
        $total=$pl* $words*$pl2;
        /* echo json_encode($total);*/
    }
    else if ($grade=='Undergraduate 2:1' or $grade=='postgraduate Diploma 2:2') {

        $pl=0.093;
        $pl2=1;
        $total=$pl* $words*$pl2;
        /* echo json_encode($total);*/
    }


    else if ($grade=='postgraduate Diploma 2:1'  or $grade=='Masters 2:1' ) {

        $pl=0.129;
        $pl2=1;
        $total=$pl* $words*$pl2;
        /* echo json_encode($total);*/
    }
    else if ($grade=='Masters 2:2') {

        $pl=0.093;
        $pl2=1;
        $total=$pl* $words*$pl2;
        /* echo json_encode($total);*/
    }
    else if ($grade=='Mphil Pass' or $grade=='PhD') {

        if($words>10000){

            $pl=0.3;
            $pl2=1;
            $total=$pl* $words*$pl2;
            /*echo json_encode($total);*/
        }else{

            $pl=0.2;
            $pl2=1;
            $total=$pl* $words*$pl2;
            /* echo json_encode($total);*/
        }


    }
    else if ($grade=='GDL Pass') {

        $pl=0.0822;
        $pl2=1;
        $total=$pl* $words*$pl2;
        /* echo json_encode($total);*/
    }
    else if ($grade=='GDL commendation') {

        $pl=0.093;
        $pl2=1;
        $total=$pl* $words*$pl2;
        /* echo json_encode($total);*/
    }  else if ($grade=='LPC Pass') {

        $pl=0.0858;
        $pl2=1;
        $total=$pl* $words*$pl2;
        /* echo json_encode($total);*/
    }  else if ($grade=='LPC Pass 1') {

        $pl=0.1326;
        $pl2=1;
        $total=$pl* $words*$pl2;
        /*  echo json_encode($total);*/
    }  else if ($grade=='BPTC Competent') {

        $pl=0.1428;
        $pl2=1;
        $total=$pl* $words*$pl2;
        /* echo json_encode($total);*/
    }  else if ($grade=='BPTC very Competent') {

        $pl=0.1716;
        $pl2=1;
        $total=$pl* $words*$pl2;
        /*  echo json_encode($total);*/
    }

    $primeryFlag='GBP';
    if ($checkbokEng=="YES"){
        $total=30;
    }




    if($flag1=='USD' or $flag1=='AUD'){

        $amount = urlencode(round($total,0));
        $from_Currency = urlencode($primeryFlag);
        $to_Currency = urlencode($flag1);
        $data = explode('"', currencyConvert($from_Currency,$to_Currency,$amount));
//        print_r($data);
        $data1 = explode(' ', $data[716]);
//         print_r($data1[8]); die;
        $data2 = explode('>', $data1[8]);
        $data3 = explode('>', $data2[1]);

//    $data4=round((float)$data3,2);
        return $data3[0];



    }else{
        return $total;
    }


}

