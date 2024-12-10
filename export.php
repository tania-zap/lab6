<?php
include 'db_connect.php';

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $sql = "SELECT * FROM survey_responses WHERE id = $id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $data = $result->fetch_assoc();
        $filename = "export_response_$id.json";

        header('Content-Type: application/json');
        header("Content-Disposition: attachment; filename=$filename");

        echo json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
        exit;
    } else {
        echo "Відповідь не знайдена.";
    }
}
?>
