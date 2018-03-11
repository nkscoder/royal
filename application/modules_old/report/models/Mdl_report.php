<?php defined('BASEPATH') or exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: Nitesh
 * Date: 2/1/16
 * Time: 7:05 PM
 */

class Mdl_report extends CI_Model
{
    public function getAllReport()
    {
        $this->db->select('users.usrID, users_profiles.usrpID')
            ->from('users')
            ->join('users_profiles', 'users.usrID = users_profiles.usrpID');
        $result = $this->db->get();
    }

}