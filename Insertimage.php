<?php
if (isset($_POST['redirectButton'])) {
    $redirectValue = $_POST['redirectButton'];
    switch ($redirectValue) {
        case 'Wild-Life':
            header("Location:wildlifeedit.html");
            break;
        case 'Wedding':
            header("Location:weddingedit.html");
            break;
        case 'Portrait':
            header("Location:portraitedit.html");
            break;
        case 'SpecialEvent':
             header("Location:specialeventsedit.html");
                break;
        default:
            
            break;
    }
exit();
}
?>