<?php

include_once __DIR__ . '/../../../../utils/classes/Request.php';
include_once __DIR__ . '/../../../../config/database/Database.php';
include_once __DIR__ . '/../../../../services/students/types/StudentResponse.php';

session_start();
Request::isWrongRequestMethod('GET');

if (empty($_SESSION) || !isset($_SESSION["ID_STUDENT"])) {
    echo json_encode(new StudentResponse("failure", error: new ErrorResponse(401, "Unauthorized")));
    return;
}

$studentId = (int) $_SESSION["ID_STUDENT"];
$page = isset($_GET["page"]) ? max(1, (int) $_GET["page"]) : 1;
$limit = 20;
$offset = $limit * ($page - 1);

$db = Database::getDatabaseInstace();
$mysqli = $db->getConnection();

try {

    $countQuery = "
        SELECT COUNT(*) AS total FROM (
            SELECT FRIEND_ID AS contact_id FROM TBL_CONTACTS
            WHERE OWNER_ID = ? AND STATUS = 'ADDED'
            UNION
            SELECT OWNER_ID AS contact_id FROM TBL_CONTACTS
            WHERE FRIEND_ID = ? AND STATUS = 'ADDED'
        ) AS total_contacts
    ";
    $stmt = $mysqli->prepare($countQuery);
    $stmt->bind_param("ii", $studentId, $studentId);
    $stmt->execute();
    $countResult = $stmt->get_result();
    $totalContacts = $countResult->fetch_assoc()["total"];
    $totalPages = ceil($totalContacts / $limit);
    $stmt->close();


    $query = "CALL SP_GET_STUDENT_CONTACTS(?, ?, ?)";
    $result = $db->callStoredProcedure($query, "iii", [$studentId, $offset, $limit], $mysqli);

    $contacts = [];
    while ($row = $result->fetch_assoc()) {
        $contacts[] = $row;
    }

    $mysqli->close();

    echo json_encode([
        "status" => "success",
        "data" => $contacts,
        "totalPages" => $totalPages,
        "currentPage" => $page
    ]);
} catch (Throwable $err) {
    $mysqli->close();
    echo json_encode(new StudentResponse("failure", error: new ErrorResponse(500, $err->getMessage())));
}