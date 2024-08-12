<?php
if (isset($_POST['redirectButton'])) {
    $redirectValue = $_POST['redirectButton'];
    switch ($redirectValue) {
        case 'Wild-Life':
            header("Location:updatewildlife.html");
            break;
        case 'Wedding':
            header("Location:updateweddings.html");
            break;
        case 'Portrait':
            header("Location:updateportraits.html");
            break;
        case 'SpecialEvent':
            header("Location:updatespecialevent.html");
                break;
        default:
            
            break;
    }
exit();
}
?>