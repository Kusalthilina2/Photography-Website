<?php
if (isset($_POST['redirectButton'])) {
    $redirectValue = $_POST['redirectButton'];
    switch ($redirectValue) {
        case 'Insert Images':
            header("Location: Insertimage.html");
            break;
        case 'Update Images':
            header("Location: updateimages.html");
            break;
        case 'Delete Images':
            header("Location: deleteimage.html");
            break;
        default:
            
            break;
    }
exit();
}
?>