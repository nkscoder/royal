<?php //defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Created by PhpStorm.
 * User: gauravkumar
 * Date: 17/02/18
 * Time: 9:23 PM
 */
class Mobileapi extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('general_report', 'general');
        $this->load->model('login_model', 'login');
        $this->load->model('project_model', 'project');
        $this->load->model('inspection_report', 'inspection');
        $this->load->model('inspection_deleted', 'deleted');
    }

    public function index()
    {
        echo "hello";
    }

    public function generalReport()
    {
        $userId = $this->input->post('user_id');
        $projectId = $this->input->post('project_id');
        $reportName = $this->input->post("report_name");
        $description = $this->input->post("description");

        if (empty($projectId)) {
            $this->output->set_status_header(400);
            $response = array("error" => "Project id missing");
        } else if (empty($userId)) {
            $this->output->set_status_header(400);
            $response = array("error" => "User id missing");
        } else if (empty($reportName)) {
            $this->output->set_status_header(400);
            $response = array("error" => "Report Name missing");
        } else if (empty($description)) {
            $this->output->set_status_header(400);
            $response = array("error" => "Description missing");
        } else {
            $insertSuccess = $this->general->insert_report($userId, $projectId, $reportName, $description);

            if ($insertSuccess) {
                $response = array("success" => true);
            } else {
                $this->output->set_status_header(400);
                $response = array("error" => "Failed to insert");
            }
        }

        $this->output
            ->set_content_type('application/json', 'utf-8')
            ->set_output(json_encode($response));
    }

    public function generalReportList($userId) {
        $this->output
            ->set_output(json_encode($this->general->history($userId)));
    }

    public function login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        if (empty($username)
            || empty($password)) {
            $this->output->set_status_header(400);
            $response = array('error' => 'Invalid Credentials1');
        } else {
            $userId = $this->login->login($username, $password);
            if ($userId) {
                $response = array('userId' => $userId);
            } else {
                $this->output->set_status_header(400);
                $response = array('error' => 'Invalid Credentials2');
            }
        }

        $this->output
            ->set_content_type('application/json', 'utf-8')
            ->set_output(json_encode($response));
    }

    public function getProjects($userId) {
        $this->output
            ->set_content_type('application/json', 'utf-8')
            ->set_output(json_encode($this->project->getProjects($userId)));
    }

    public function getProjectStageActivity($userId) {
        $crudeData = $this->project->getProjectStageActivity($userId);
        $response = array();

        $project = null;
        $projectId = 0;

        $stage = null;
        $stageId = 0;

        $activity = null;
        $activityId = 0;

        $projectIndex = -1;
        $stageIndex = -1;

        foreach ( $crudeData as $item ) {
            if ($item['projectId'] != $projectId) {

                $projectIndex++;
                $projectId = $item['projectId'];
                $project = array('id' => $item['projectId'],
                    'name' => $item['projectName'],
                    'stage' => array());
                array_push($response, $project);
                $stageId = 0;
                $stageIndex = -1;
            }

            if ($item['stageId'] != $stageId) {

                $stageIndex++;
                $stageId = $item['stageId'];
                $stage = array('id' => $item['stageId'],
                    'name' => $item['stageName'],
                    'activity' => array());
                array_push($response[$projectIndex]['stage'], $stage);
                $activityId = 0;
            }

            if ($item['activityId'] != $activityId) {

                $activityId = $item['activityId'];
                $activity = array('id' => $item['activityId'],
                    'name' => $item['activityName']);
                array_push($response[$projectIndex]['stage'][$stageIndex]['activity'], $activity);
            }
        }

        $this->output
            ->set_content_type('application/json', 'utf-8')
            ->set_output(json_encode($response));
    }

    public function submitInspectionReport() {
        $userId = $this->input->post("userId");
        $projectId = $this->input->post("projectId");
        $stageId = $this->input->post("stageId");
        $activityId = $this->input->post("activityId");
        $documentNumber = $this->input->post('docNum');
        $accepted = $this->input->post("accepted");
        $remarks = $this->input->post("remarks");

        $this->output
            ->set_content_type('application/json', 'utf-8');

        if (empty($userId)) {
            $this->output
                ->set_status_header(400)
                ->set_output(json_encode(array('error' => 'User Id required')));
        } else if (empty($projectId)) {
            $this->output
                ->set_status_header(400)
                ->set_output(json_encode(array('error' => 'Project Id required')));
        } else if (empty($stageId)) {
            $this->output
                ->set_status_header(400)
                ->set_output(json_encode(array('error' => 'Stage Id required')));
        } else if (empty($activityId)) {
            $this->output
                ->set_status_header(400)
                ->set_output(json_encode(array('error' => 'Activity Id required')));
        } else if ($accepted == null) {
            $this->output
                ->set_status_header(400)
                ->set_output(json_encode(array('error' => 'Accept/Reject activity')));
        } /*else if (empty($remarks)) {
            $this->output
                ->set_status_header(400)
                ->set_output(json_encode(array('error' => 'Remarks required')));
        } */else {
            $data = array('project_id'          => $projectId,
                            'stage_id'          => $stageId,
                            'activity_id'       => $activityId,
                            'user_id'           => $userId,
                            'approved'          => $accepted);
            if (!empty($documentNumber)) {
                $data['document_number'] = $documentNumber;
            }
            if (!empty($remarks)) {
                $data['remarks'] = $remarks;
            }

            $rowId = $this->inspection->submitInspectionReport($data);
            if ($rowId) {
                $this->output
                    ->set_output(json_encode(array('rowId' => $rowId)));
            } else {
                $this->output
                    ->set_status_header(400)
                    ->set_output(json_encode(array('error' => 'Failed to submit report')));
            }

        }
    }

    public function uploadInspectionImage($inspectionReportId) {
        $count = $this->inspection->getImageCount($inspectionReportId);

        $config['upload_path']          = APPPATH.'../uploads/';
        $config['allowed_types']        = 'jpg|png|jpeg';
        $config['max_size']             = 4096;
        $config['max_width']            = 2048;
        $config['max_height']           = 2048;
        $config['overwrite']            = true;

        $config['file_name'] = $inspectionReportId."_".$count;
        $this->upload->initialize($config);

        $this->output
            ->set_content_type('application/json', 'utf-8');

        if ( ! $this->upload->do_upload('image')) {
            $error = array('error' => $this->upload->display_errors());
            $this->output
                ->set_status_header(400)
                ->set_output(json_encode($error));
        } else {
            $data = $this->upload->data();
            $fullPath = $data['full_path'];
            if ($this->inspection->addImage($inspectionReportId, $fullPath)) {
                chmod($fullPath, 0775);
                $this->output
                    ->set_output(json_encode(array('success' => true)));
            } else {
                $this->output
                    ->set_status_header(400)
                    ->set_output(json_encode(array('error' => 'Upload failed')));
            }
        }
    }

    public function getInspectionReportProjects($userId) {
        $this->output
            ->set_content_type('application/json', 'utf-8')
            ->set_output(json_encode($this->inspection->getInspectionReportProjects($userId)));
    }

    public function getInspectionReportHistory($projectId, $date) {
        $crudeData = $this->inspection->getInspectionReportHistory($projectId, $date);

        $response = array();

        /*$project = null;
        $projectId = 0;*/

        $stage = null;
        $stageId = 0;

        $activity = null;
        $activityId = 0;

        $imageUrl = null;

        //$projectIndex = -1;
        $stageIndex = -1;
        $activityIndex = -1;

        foreach ( $crudeData as $item ) {
            /*if ($item['projectId'] != $projectId) {

                $projectIndex++;
                $projectId = $item['projectId'];
                $project = array('id' => $item['projectId'],
                    'name' => $item['projectName'],
                    'stage' => array());
                array_push($response, $project);
                $stageId = 0;
                $stageIndex = -1;
            }*/

            if ($item['stageId'] != $stageId) {

                $stageIndex++;
                $stageId = $item['stageId'];
                $stage = array('id' => $item['stageId'],
                    'name' => $item['stageName'],
                    'activity' => array());
                array_push($response, $stage);
                $activityId = 0;
                $activityIndex = -1;
            }

            if ($item['activityId'] != $activityId) {

                $activityIndex++;
                $activityId = $item['activityId'];
                $activity = array('id' => $item['activityId'],
                    'reportId' => $item['reportId'],
                    'name' => $item['activityName'],
                    'docNum' => $item['docNum'],
                    'remarks' => $item['remarks'],
                    'accepted' => $item['approved'] == 1,
                    'datetime' => $item['datetime'],
                    'imageUrls' => array());
                array_push($response[$stageIndex]['activity'],
                $activity);
                $imageUrl = null;
            }

            if (strcmp($imageUrl, $item['imageUrl']) !== 0) {
                $imageUrl = $item['imageUrl'];
                array_push($response[$stageIndex]['activity'][$activityIndex]['imageUrls'], $imageUrl);
              }
        }

        $this->output
            ->set_content_type('application/json', 'utf-8')
            ->set_output(json_encode($response));
    }

    public function deleteReport($reportId) {
        $this->output
            ->set_content_type('application/json', 'utf-8');

        $report = $this->inspection->getReport($reportId);
        if (empty($report)) {
            $this->output
                ->set_status_header(400)
                ->set_output(json_encode(array('error' => 'Invalid Report Id')));
        } else if ($this->deleted->insertReport($report)) {
            $this->inspection->deleteReport($reportId);
            $this->output
                ->set_output(json_encode(array('success' => true)));
        } else {
            $this->output
                ->set_status_header(400)
                ->set_output(json_encode(array('error' => 'Operation failed')));
        }
    }

    public function sendEmail($reportIds) {
        $this->output
            ->set_content_type('application/json', 'utf-8');

        $reports = $this->inspection->getReportsForReportIds($reportIds);
        $data['reports'] = $reports;
        if (!empty($reports)) {
            $emailMsg = $this->load->view('emailtemplate', $data, TRUE);

            if ($this->email
                    ->to($reports[0]['contractorEmail'])
                    ->from('report.status@croquis.com')
                    ->subject('Inspection Reports')
                    ->message($emailMsg)
                    ->send()
            ) {
                $this->output
                    ->set_output(json_encode(array('success' => true)));
            } else {
                $this->output
                    ->set_status_header(400)
                    ->set_output(json_encode(array('error' => 'Mail sending failed')));
            }
        } else {
            $this->output
                ->set_status_header(400)
                ->set_output(json_encode(array('error' => 'No reports found')));
        }
    }
}