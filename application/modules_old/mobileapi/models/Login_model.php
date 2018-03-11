<?php

/**
 * Created by PhpStorm.
 * User: gauravkumar
 * Date: 18/02/18
 * Time: 9:50 PM
 */
class Login_model extends CI_Model
{

    public function login($username, $password) {

        if (filter_var($username, FILTER_VALIDATE_EMAIL)) {
            $this->db->where('email', $username);
        } else {
            $this->db->where('username', $username);
        }
        $data = $this->db
            //->where("(email = '$username' or username = '$username')")
            //->or_where("username", $username)
            ->where_in('role', array('employee'))
            ->get("users")
            ->row_array();

        if ($data
            && password_verify($password, $data["password"])) {
            return intval($data['id']);
        } else {
            return false;
        }
    }

}