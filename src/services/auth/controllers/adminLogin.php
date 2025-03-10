<?php

  session_start();

  include_once __DIR__ .'/../services/auth.service.php';
  include_once __DIR__ . '/../types/loginRequest.php';

  header("Content-Type: application/json");

  if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode([
      "status" => "failure",
      "error" => [
        "errorCode" => 400,
        "errorMessage" => "Invalid request method"
      ]
      ]);
  }

  $rawData = @file_get_contents('php://input');

  $loginRequest = json_decode($rawData);
  $request = new LoginRequest();
  $request->email = $loginRequest->email;
  $request->password = $loginRequest->password;

 $loginResult = Auth::loginAdministrator($request);

 echo json_encode($loginResult);

