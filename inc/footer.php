
<?php
define('BASE_URL', '/proyecto_ivi/');
?>
<?php include __DIR__.'/data/footer_data.php';?>
<footer class="bg-dark text-white py-4">
    <div class="container">
        <div class="row">
            <?php 
                foreach ($footer_sections as $section_name => $links):
            ?>
            <div class="col-md-3">
                <h5><?php echo $section_name?></h5>
                    <ul class="list-unstyled">
                        <?php 
                        foreach ($links as $link):
                        ?>
                            <li><a href="<?php echo $link['url']?>" class="text-white text-decoration-none"><?php echo $link['text']?></a></li>
                        <?php endforeach; ?>
                    </ul>
            </div>
            <?php endforeach;?>
            <div class="col-md-3">
                <h5>Jobcrafters</h5>
                    <img src="<?php echo BASE_URL; ?>assets/img/favicon.png" alt="Logo" class="img-fluid mb-2" style="max-width: 150px;">
            <div>
                <a href="#" class="text-white me-2"><i class="bi bi-linkedin"></i></a>
                <a href="#" class="text-white me-2"><i class="bi bi-youtube"></i></a>
                <a href="#" class="text-white me-2"><i class="bi bi-instagram"></i></a>
                <a href="#" class="text-white me-2"><i class="bi bi-facebook"></i></a>
                <a href="#" class="text-white me-2"><i class="bi bi-twitter"></i></a>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col text-center">
                <p class="mb-0">&copy; 2024 Jobcrafters.com Todos los Derechos Reservados</p>
        </div>
    </div>
</footer>
    