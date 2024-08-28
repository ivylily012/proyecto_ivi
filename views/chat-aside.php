<?php 
session_start();
include_once "/db/conn.php";
if(!isset($_SESSION['unique_id'])){
    header("Location: index.php");
}

$data_base = new Database();
$conn_database = $data_base->connect();

$unique_id = $_SESSION['unique_id'];
?>

<div>
    <section>
        <header>
            <div class="content">
                <?php 
                    $q_userActive = "SELECT * FROM usersActive WHERE unique_id = {$unique_id}";
                    $stmt = $conn_database->prepare($q_userActive);
                    $stmt->execute();

                    $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
                ?>

                <div class="details">
                    <span><?php echo $row['nombre']." ".$row['apellido']; ?></span>
                    <p><?php echo $row['status']; ?></p>
                </div>
            </div>
            <a href="/proyecto_ivi/inc/logout.php?logout_id=<?php echo $row['unique_id'];?>" class="logout">Cerrar Sesion</a>
        </header>
    </section>
</div>