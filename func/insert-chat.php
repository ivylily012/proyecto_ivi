<?php 
require_once '/db/conn.php';

session_start();

if(isset($_SESSION['unique_id'])){
    $data_base = new Database();
    $conn_database = $data_base->connect();

    $outgoing_id = $_SESSION['unique_id'];
    $incoming_id = filter_input(INPUT_POST, 'incoming_id', FILTER_SANITIZE_NUMBER_INT);
    $messages = filter_input(INPUT_POST, 'message', FILTER_SANITIZE_STRING);

    if(!empty($messages)){
        $q_insetMSG = "INSERT INTO mensajes (incoming_msg_id, outgoing_msg_id, msg) VALUES (:incoming_msg_id, :outgoing_msg_id, :messages)";
        $stmt = $conn_database->prepare($q_insetMSG);
        $stmt->bindParam(':incoming_id', $incoming_id, PDO::PARAM_INT);
        $stmt->bindParam(':outcoming_id', $outgoing_id, PDO::PARAM_INT);
        $stmt->bindParam(':messages', $messages, PDO::PARAM_STR);
        $stmt->execute();
    }
} else {
    header("Location: ../views/login_form.php");
    exit();
}
?>