<?php
    require_once $_SERVER["DOCUMENT_ROOT"] . '/backend/app.php';
    $app_instance = new IdeiasComRelevo();
    
    $projects = $app_instance->ProjectsManagement->admin_get_projects();
?>
<!DOCTYPE html>
<html lang="pt">

<?php include_once '../includes/site/head.php'; ?>

<style>
    *,
    *::before,
    *::after {
        scroll-behavior: smooth;
    }
</style>

<body class="index-page sidebar-collapse">
    <!-- Navbar -->
    <?php 
        $PAGE_ID = "404";
        include_once $_SERVER["DOCUMENT_ROOT"] . '/includes/site/nav.php'; 
    ?>
    
    <div class="d-flex justify-content-center align-content-center vh-100 flex-column">
        <div class="container d-flex justify-content-center">
            <i class="mx-3 fas fa-10x fa-map-signs justify-self-end"></i>
            <div class="mx-3">
                <h1 class="p-1 mb-1 bg-primary text-white">404 Error</h1>
                <h3 class="p-1">Oops, Parece que te enganaste na curva!<br>Esta pagina não existe.</h3>
            </div>
        </div>
    </div>

    <!-- footer -->
    <?php include_once $_SERVER["DOCUMENT_ROOT"] . '/includes/site/footer.php'; ?>
    
    <!-- scripts -->
    <?php include_once $_SERVER["DOCUMENT_ROOT"] . '/includes/site/scripts.php'; ?>

</body>

</html>