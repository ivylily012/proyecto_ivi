<?php 
include_once "/db/conn.php";

try{
    $data_base = new Database;
    $conn_database = $data_base->connect();

    $q_userActives = "SELECT * FROM sessiones_activas";
    $stmt_1 = $conn_database->prepare($q_userActives);
    $stmt_1->execute();

    //Itear sobre los resultados en la busqueda anterior...
    while($row_1 = $stmt_1->fetch(PDO::FETCH_ASSOC)){
        //Consulta para obtener el ultimo mensaje entre el usuario actual y el usuario con session activa
        $q_msg = "SELECT * FROM msg_chat WHERE (incoming_msg_id = :user_id OR outgoing_msg_id = :user_id) AND (outgoing_msg_id = :outgoing_id OR incoming_msg_id = :user_id) ORDER BY msg_id DESC LIMIT 1";
        $stmt_2 = $conn_database->prepare($q_msg);
        $stmt_2->bindParam(':user_id', $row_1['unique_id']);
        $stmt_2->bindParam(':outgoing_id', $outgoing_id);
        $stmt_2->execute();

        $row_2 = $stmt2->fetch(PDO::FETCH_ASSOC);

        //Verifica si hay mensajes nuevos...
        $resultados = ($stmt_2->rowCount() > 0) ? $row_2['msg'] : "no hay mensajes disponibles";
        $msg = (strlen($resultados) > 28) ? substr($resultados, 0, 28) . '. . .' : $resultados;

        //Determina si el mensaje fue enviado por el usuario con sesion activa..
        $tu = (isset($row_2['outgoing_msg_id']) && $outgoing_id == $row_2['outgoing_msg_id']) ? "Tu: ": "";

        //Determina si el usuario esta fuera de linea...
        $offline = ($row_1['status'] == "Fuera de Línea") ? "offline" : "";

        
    }
}catch(PDOException $e){
    echo "ERROR: ".$e->getMessage();
}
?>