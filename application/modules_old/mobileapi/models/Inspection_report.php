<?php

class Inspection_report extends CI_Model {
    
    public function submitInspectionReport($data) {
        $this->db->insert('inspection_report', $data);
        return $this->db->insert_id();
    }
    
    public function getImageCount($inspectionReportId) {
        $count = $this->db
            ->where('inspection_report_id', $inspectionReportId)
            ->from('inspection_report_images')
            ->count_all_results();
            
        return $count + 1;
    }
    
    public function addImage($inspectionReportId, $imagePath) {
        return $this->db->insert('inspection_report_images', array('inspection_report_id' => $inspectionReportId,
            'image_url' => $imagePath));
    }
    
    public function getInspectionReportHistory($userId) {
        return $this->db
                    ->select("project.id as projectId, 
                                project.name as projectName,
                                stage.id as stageId,
                                stage.name as stageName,
                                activity.id as activityId,
                                activity.name as activityName,
                                remarks,
                                replace(iri.image_url, '/home/bucontec/public_html', 'http://bucontechnology.in') as imageUrl,
                                document_number as docNum,
                                approved,
                                datetime")
                    ->from("inspection_report as inre")
                    ->join('inspection_report_images as iri', 'iri.inspection_report_id = inre.id')
                    ->join('project', 'project.id = inre.project_id')
                    ->join('stage', 'stage.id = inre.stage_id')
                    ->join('activity', 'activity.id = inre.activity_id')
                    ->where('inre.user_id', $userId)
                    ->order_by('project.id, stage.id, activity.id, datetime')
                    ->get()
                    ->result_array();
    }
}