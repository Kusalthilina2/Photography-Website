<?php
if (isset($_POST['redirectButton'])) {
    $redirectValue = $_POST['redirectButton'];
    switch ($redirectValue) {
        case 'changeGallery':
            header("Location: Changegallery.html");
            break;
        case 'changePricing':
            header("Location: Changeprice.html");
            break;
        case 'viewEnquiry':
            header("Location: Enquiryview.html");
            break;
        default:
            // Handle default behavior or error
            break;
    }
exit();
}
?>