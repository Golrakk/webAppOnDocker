<?php
    if (file_exists("../".$_GET['name'])) {
        unlink("../".$_GET['name']);
    }
    header('Location: ../index.php?page=Courier+Service&delete=Success');
    exit();
?>