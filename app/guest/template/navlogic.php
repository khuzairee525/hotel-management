<?php 
$uplaodpath = '../../upload/user/';
$img_path = "";
// Check if userID is set in the session
if(isset($_SESSION['userID'])){
    // If userID is set, the user is logged in

    // Check if userRoles is set and if the user is a guest (assuming 2 represents a guest role)
    if(isset($_SESSION['userRoles']) && $_SESSION['userRoles'] == 2){
        // Fetch Guest Data
        $userID = $_SESSION['userID'];
        $guestdata = fetchOne("SELECT * FROM guest WHERE accID=$userID");

        // Assign Guest Data
        $guestID = $guestdata['guestID'];
        $firstName = $guestdata['firstName'];
        $img = $guestdata['img_path'];
        if($img == null){
            $img_path = "../../img/user_icon.png";
        }
        else{
            $img_path = $uploadpath . $img;
        }

        // Include the guest navbar
        include "../../template/loggedbar.php";
     
    }
}
else{
    header('location: ../../index.php');
}
?>