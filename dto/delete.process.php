<?php

//header('Content-Type: application/json');
include_once "../classes/User.class.php";
include_once "../classes/Member.class.php";
include_once "../classes/Group.class.php";
include_once "../classes/Event.class.php";
include_once "../classes/Announcement.class.php";
include_once "../classes/Family.class.php";

$group = new Group();
$user = new User();
$member = new Member();
$event = new Event();
$announcement = new Announcement();
$family = new Family();



// delete event
if(isset($_GET['eventid'])){

    //retrive all incoming data
    $eventid = $_GET['eventid'];

    //validate for empty fields
    if(!empty($eventid)){

        //delete data from database
        if( $event->DeleteEvent($eventid) ){
            
            //direct to all rooms page
            header("Location: " . $_SERVER["HTTP_REFERER"].'?message=success');
    
        }else{
            header("Location: " . $_SERVER["HTTP_REFERER"].'?message=success');
        };

    }

    
}



// delete member
if(isset($_GET["memberid"])){

    //retrive all incoming data
    $memberid = $_GET["memberid"];

    //validate for empty fields
    if(!empty($memberid)){

        //delete data from database
        if( $member->DeleteMember($memberid) ){
            
            //direct to all rooms page
            header("Location: " . $_SERVER["HTTP_REFERER"].'?message=success');
    
        }else{
            header("Location: " . $_SERVER["HTTP_REFERER"].'?message=failed');
        };

    }

    
}


// delete group
if(isset($_GET['groupid'])){

    //retrive all incoming data
    $groupid = $_GET['groupid'];

    //validate for empty fields
    if(!empty($groupid)){

        //delete data from database
        if($group->DeleteGroup($groupid)){
            //direct to all rooms page
            header("Location: " . $_SERVER["HTTP_REFERER"].'?message=success');
    
        }else{
            header("Location: " . $_SERVER["HTTP_REFERER"].'?message=failed');
        };

    }

    
}




// delete group member
if(isset($_GET["membershipid"])){

    //retrive all incoming data
    $membershipid = $_GET["membershipid"];

    //validate for empty fields
    if(!empty($membershipid)){

        //delete data from database
        if($group->DeleteGroupMember($membershipid)){
            
            //direct to all rooms page
            header("Location: " . $_SERVER["HTTP_REFERER"].'?message=success');
    
        }else{
            header("Location: " . $_SERVER["HTTP_REFERER"].'?message=failed');
        };

    }

    
}




// delete user
if(isset($_GET['userid'])){

    //retrive all incoming data
    $userid = $_GET['userid'];

    //validate for empty fields
    if(!empty($userid)){

        //delete data from database
        if($user->DeleteUser($userid)){
            //direct to all rooms page
            header("Location: " . $_SERVER["HTTP_REFERER"].'?message=success');
    
        }else{
            header("Location: " . $_SERVER["HTTP_REFERER"].'?message=failed');
        }

    }

    
}



// delete announcement
if(isset($_GET['announcementid'])){

    //retrive all incoming data
    $id = $_GET['announcementid'];

    //validate for empty fields
    if(!empty($id)){

        //delete data from database
        if($announcement->DeleteAnnouncement($id)){
            //direct to all rooms page
            header("Location: " . $_SERVER["HTTP_REFERER"].'?message=success');
    
        }else{
            header("Location: " . $_SERVER["HTTP_REFERER"].'?message=success');
        };

    }

}


// delete family
if(isset($_GET['familyid'])){

    //retrive all incoming data
    $id = $_GET['familyid'];

    //validate for empty fields
    if(!empty($id)){

        //delete data from database
        if($family->DeleteFamily($id)){
            //direct to all rooms page
            header("Location: " . $_SERVER["HTTP_REFERER"].'?message=success');
    
        }else{
            header("Location: " . $_SERVER["HTTP_REFERER"].'?message=success');
        };

    }

}


// delete family
if(isset($_GET['familymemberid'])){

    //retrive all incoming data
    $id = $_GET['familymemberid'];

    //validate for empty fields
    if(!empty($id)){

        //delete data from database
        if($family->DeleteFamilyMember($id)){
            //direct to all rooms page
            header("Location: " . $_SERVER["HTTP_REFERER"].'?message=success');
    
        }else{
            header("Location: " . $_SERVER["HTTP_REFERER"].'?message=success');
        };

    }

}



    


// }







//Encode the $return variable
// echo json_encode($return, true);
