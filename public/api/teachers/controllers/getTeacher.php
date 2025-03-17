<?php

  include_once __DIR__ . '/../../../../utils/classes/Request.php';
  include_once __DIR__ . '/../../../../services/teachers/types/TeacherResponse.php';
  include_once __DIR__ . '/../../../../utils/types/postResponse.php';
  include_once __DIR__ . '/../../../../services/teachers/services/Teachers.php';
  include_once __DIR__ . '/../../../../utils/functions/setErrorResponse.php';
  include_once __DIR__ . '/../../../../utils/functions/setUnauthorizedResponse.php';

  session_start();
  header("Content-Type: application/json");

  Request::isWrongRequestMethod('GET');

  if (empty($_SESSION)) {
    setUnauthorizedResponse();
    return;
  }

  $teacherNumber = (int) $_GET['teacher-number'];
  $teacherResponse = TeacherService::getTeacher($teacherNumber);
  
  if ($teacherResponse->getStatus() == 'failure') {
    setErrorResponse($teacherResponse);
    return;
  }

  http_response_code(200);
  echo json_encode($teacherResponse);
