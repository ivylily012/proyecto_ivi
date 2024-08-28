<?php 
session_start();
include_once "/db/conn.php";

if (!isset($_SESSION['inique_id'])){
    header("Location: index.php");
}

$data_base = new Database();
$conn_database = $data_base->connect();
?>

<div>
    <section class="chat-area">
        <header>
            <?php 
                $user_id = htmlspecialchars($_GET['user_id']); //Sanitizamos la entrad de datos apra evitar inyecciones de codigo
                
                $q_registros = "SELECT * FROM usuarios WHERE unique_id = :unique_id";

                $stmt = $conn_database->prepare($q_registros);
                $stmt->bindParam(':unique_id', $user_id, PDO::PARAM_STR);
                $stmt->execute();

                //Si el resultado es mayor a 0, este pasara los datos en un array, pero si no, redirigue a user.php, esto es para seleccionar ocn quien hablar, pero, despues lo corregimos..
                if($stmt->rowCount()>0){
                    $row = $stmt->fetch(PDO::FETCH_ASSOC);
                } else {
                    header("Location: user.php ZD");
                    exit();
                }
            ?>
            <a href=""></a>
            <div class="chat-detalles">
                <span><?php echo htmlspecialchars($row['nombre']." ".htmlspecialchars($row['apellido']));?></span>
                <p><?php echo htmlspecialchars($row['status']);?></p>
            </div>
        </header>
        <?php //AQUI SE IMPRIMRAN LOS MENSAJES ENTRE PARES... NO SE CUANTO TOME?>
        <div class="chat-box"></div>

        <form action="" class="typing-area">
            <input type="text" name="incoming_id" class="incoming_id" value="<?php echo htmlspecialchars($user_id); ?>" hidden>
            <input type="text" name="message" class="input-field" placeholder="Escribe tu mensaje aquí..." autocomplete="off">
            <button><i class="fab fa-telegram-plane"></i></button>
        </form>
    </section>
</div>

<script src="/assets/js/chat.js"></script>