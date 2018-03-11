<?php

/**
 * Created by PhpStorm.
 * User: gauravkumar
 * Date: 07/03/18
 * Time: 8:43 PM
 */
class Inspection_deleted extends CI_Model {

    public function insertReport($data) {
        return $this->db
            ->insert('deleted_inspection_report', $data);
    }
}