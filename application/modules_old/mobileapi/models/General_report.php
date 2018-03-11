<?php defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Created by PhpStorm.
 * User: gauravkumar
 * Date: 17/02/18
 * Time: 9:33 PM
 */
class General_report extends CI_Model
{
    public function insert_report($userId, $projectId,  $reportName, $description)
    {
        return $this->db->insert("general_reports",
            array("user_id" => $userId,
                "project_id" => $projectId,
                "report_name" => $reportName,
                "description" => $description));
    }

    public function history($userId) {
        $this->db->select("name as projectName, report_name as reportName, description, "
            ."DATE_FORMAT(datetime, '%h:%i %p, %d %b %Y') as dateTime");
        $this->db->from('general_reports as general');
        $this->db->join('project', 'project.id = general.project_id');
        $this->db->where('user_id', $userId);
        $this->db->order_by('datetime', 'DESC');
        return $this->db->get()->result_array();
    }
}