<?php 
session_start();
if(isset($_SESSION['unique_id'])){
    include_once "/db/conn.php";
    $data_base = new Database();
    $conn_database = $data_base->connect();

    $outgoing_id = $_SESSION['unique_id'];
    $incoming_id = filter_input(INPUT_POST, 'incoming_id', FILTER_SANITIZE_NUMBER_INT);
    $output = "";

    $q_getSMG = "SELECT * FROM messages LEFT JOIN registros ON.registros.unique_id = messages.outgoing_msg_id WHERE (outgoing_msg_id = :incoming_id AND incoming_msg_id = :outgoing_id) ORDER BY msg_id";

    $stmt = $conn_database->prepare($q_getSMG);
    $stmt->bindParam(':outgoing_id', $outgoing_id, PDO::PARAM_INT);
    $stmt->bindParam(':incoming_id', $incoming_id, PDO::PARAM_INT);
    $stmt->execute();

    if($stmt->rowCount()>0){
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            if ($row['outgoing_msg_id'] === $outgoing_id){
                $output .= '<div class="chat outgoing">
                                <div class="details">
                                    <p>' . htmlspecialchars($row['msg']) . '</p>
                                </div>
                            </div>';
            } else {
                $output .= '<div class="chat incoming">
                                <img src="php/images/' . htmlspecialchars($row['img']) . '" alt="">
                                <div class="details">
                                    <p>' . htmlspecialchars($row['msg']) . '</p>
                                </div>
                            </div>';
                }
            } 
    }else {
        $output .= '<div class="text">No hay mensajes disponibles. Una vez que envíe el mensaje, aparecerán aquí.</div>';
    }
    echo $output;
} else {
    header("Location: ../views/login-form.php");
}


?>