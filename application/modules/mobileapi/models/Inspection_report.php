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

    public function getInspectionReportProjects($userId) {
        return $this->db
                    ->distinct()
                    ->select('project.name as name,
                                project.id as id')
                    ->from('inspection_report as inre')
                    ->join('project', 'project.id = inre.project_id')
                    ->where('inre.user_id', $userId)
                    ->order_by('id')
                    ->get()
                    ->result_array();
    }
    
    public function getInspectionReportHistory($projectId, $date) {
        $data = $this->db
                    ->select("inre.id as reportId,
                                stage.id as stageId,
                                stage.name as stageName,
                                activity.id as activityId,
                                activity.name as activityName,
                                remarks,
                                replace(iri.image_url, '/home/bucontec/public_html', 'http://bucontechnology.in') as imageUrl,
                                document_number as docNum,
                                approved,
                                date_format(datetime, '%h:%i %p') as datetime")
                    ->from("inspection_report as inre")
                    ->join('inspection_report_images as iri', 'iri.inspection_report_id = inre.id', 'left')
                    ->join('stage', 'stage.id = inre.stage_id')
                    ->join('activity', 'activity.id = inre.activity_id')
                    ->where('inre.project_id', $projectId)
                    ->where('date(datetime)', $date)
                    ->order_by('stage.id, activity.id, datetime desc')
                    ->get()
                    ->result_array();
        //echo $this->db->last_query();
        return $data;
    }

    public function getReport($reportId) {
        return $this->db
            ->from('inspection_report')
            ->where('id', $reportId)
            ->get()
            ->row_array();
    }

    public function deleteReport($reportId) {
        $this->db
            ->delete('inspection_report', array('id' => $reportId));
        $this->db
            ->delete('inspection_report_images', array('inspection_report_id' => $reportId));
    }

    public function getReportsForReportIds($reportIds) {
        $data = $this->db
            ->select("project.name as projectName,
                        stage.name as stageName,
                        activity.name as activityName,
                        concat(users.fname, ' ', users.sname) as userName,
                        contractor.email as contractorEmail,
                        concat(contractor.fname, ' ', contractor.sname) as contractorName,
                        concat('http://bucontechnology.in/royal/mobileapi/showreportpictures/', 
                        inre.id) as imageLink,
                        inre.datetime,
                        case  when inre.approved = 1 then 'Accepted' else 'Rejected' end as status")
            ->from('inspection_report as inre')
            ->join('project', 'project.id = inre.project_id')
            ->join('stage', 'stage.id = inre.stage_id')
            ->join('activity', 'activity.id = inre.activity_id')
            ->join('users', 'users.id = inre.user_id')
            ->join('users as contractor', 'contractor.id = project.contractor_id')
            ->where("inre.id in ('$reportIds')")
            ->get()
            ->result_array();
        //echo $this->db->last_query();
        return $data;
    }
}