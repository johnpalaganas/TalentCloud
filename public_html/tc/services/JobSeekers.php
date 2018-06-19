<?php
/**
 * JobSeekerProfile REST API
 */

require_once __DIR__ . '/../config/php.config.inc';

/*set api path*/
set_include_path(get_include_path() . PATH_SEPARATOR);

require_once __dIR__ . '/../controller/AuthenticationController.php';
require_once __DIR__ . '/../controller/JobSeekerController.php';
require_once __DIR__ . '/../model/JobSeekerProfile.php';
require_once __DIR__ . '/../model/User.php';
require_once __DIR__ . '/../model/UserPermission.php';
require_once __DIR__ . '/../utils/Utils.php';

$requestMethod = filter_input(INPUT_SERVER, 'REQUEST_METHOD', FILTER_SANITIZE_ENCODED);
$requestURI = urldecode(filter_input(INPUT_SERVER, 'REQUEST_URI', FILTER_SANITIZE_ENCODED));
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=utf-8");

$context = '/';

$requestParams = substr($requestURI, strlen($context));

switch ($requestMethod) {
    case 'GET':
        
        //Loading job seekers in bulk is only available to admins
        $userPermissions = [];
        $userPermissions[] = new UserPermission(ROLE_ADMIN);
        AuthenticationController::validateUser($userPermissions);
        
        if(strlen($requestParams) > 1){
            $result = JobSeekerController::getJobSeekers();
            $json = json_encode($result, JSON_PRETTY_PRINT);
            echo($json);
        } else {
            $result = array();
            $json = json_encode($result, JSON_PRETTY_PRINT);
            echo($json);
        }

        break;
    case 'POST':
        break;
    case 'DELETE':
        //Here Handle DELETE Request
        break;
    case 'PUT':
        break;
    case 'PATCH':
        //Here Handle PATCH Request
        break;
    case 'OPTIONS':
        //Here Handle OPTIONS/Pre-flight requests
        header("Access-Control-Allow-Headers: accept, content-type");
        header("Access-Control-Allow-Methods: GET");
        echo("");
        break;
}

?>