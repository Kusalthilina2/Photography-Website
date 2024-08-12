<?php
if (isset($_POST['redirectButton'])) {
    $redirectValue = $_POST['redirectButton'];
    switch ($redirectValue) {
        case 'Wild-Life':
            header("Location:Deletewildlife.html");
            break;
        case 'Wedding':
            header("Location:Deletewedding.html");
            break;
        case 'Portrait':
            header("Location:Deleteportrait.html");
            break;
        case 'SpecialEvent':
             header("Location:Deletespecialevent.html");
                break;
        default:
            
            break;
    }
    exit();
}
?>