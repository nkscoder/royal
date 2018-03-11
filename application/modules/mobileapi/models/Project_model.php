<?php

/**
 * Created by PhpStorm.
 * User: gauravkumar
 * Date: 19/02/18
 * Time: 11:06 PM
 */
class Project_model extends CI_Model
{

    public function getProjects($userId) {
        $this->db->distinct();
        $this->db->select('project.id, project.name');
        $this->db->from('project');
        $this->db->join('project_to_employee_mapping as psm', 'psm.project_id = project.id');
        $this->db->where('psm.emp_id', $userId);
        return $this->db->get()->result_array();
    }

    public function getProjectStageActivity($userId) {
        $response = $this->db->distinct()
            ->select('project.id as projectId, project.name as projectName, '
            .'stage.id as stageId, stage.name as stageName, '
            .'activity.id as activityId, activity.name as activityName')
            ->from('project_to_employee_mapping as pem')
            ->join('project', 'project.id = pem.project_id')
            ->join('stage', 'stage.id = pem.stage_id')
            ->join('stage_activity_mapping as sam', 'sam.project_stage_map_id = stage.id')
            ->join('activity', 'activity.id = sam.activity_id')
            ->join('inspection_report as inre', 'inre.project_id = pem.project_id and inre.stage_id = pem.stage_id and inre.activity_id = sam.activity_id', 'left')
            ->where('pem.emp_id', $userId)
            ->where('inre.project_id is null and inre.stage_id is null and inre.activity_id is null')
            ->order_by('project.id, stage.id, activity.id')
            ->get()
            ->result_array();
        //echo $this->db->last_query();
        return $response;
    }

}