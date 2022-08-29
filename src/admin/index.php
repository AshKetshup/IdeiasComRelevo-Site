<!DOCTYPE html>
<html lang="pt">

<!-- 
    This contains the head part of the file.
    To set the page name change the $PAGE_NAME variable
-->
<?php 
    $PAGE_NAME = "Landing Page";
    $PAGE_ID = "index";
    include_once '../includes/admin/head.php'; 
?>
<body class="hold-transition sidebar-mini dark-mode">
    <div class="wrapper">

        <!-- Navbar -->
        <?php include_once '../includes/admin/navbar.php'; ?>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <?php include_once '../includes/admin/sidebar.php'; ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper d-flex justify-content-center h-100 align-items-center flex-column">
            <h1><b>Bem-Vindo</b></h1>
            <h3>De momento estás no lado Admin do site IdeiasComRelevo</h3>
        </div>

        <!-- Main Footer -->
        <?php include_once '../includes/admin/footer.php'; ?>

    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->
    <?php include_once '../includes/admin/scripts.php'; ?>
    
</body>

</html>