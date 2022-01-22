
<?php

//Load Composer's autoloader
//header('Content-Type: application/json');
include_once "../classes/User.class.php";
include_once "../classes/Member.class.php";
include_once "../classes/Group.class.php";
include_once "../classes/Event.class.php";
include_once "../classes/Announcement.class.php";
include_once "../classes/Family.class.php";
include_once "../classes/Contribution.class.php";
include_once "../classes/Email.php";

$group = new Group();
$user = new User();
$member = new Member();
$event = new Event();
$announcement = new Announcement();
$family = new Family();
$contribution = new Contribution();
$sendemail = new Email;



// add new group
if(isset($_POST['newgroup'])){

    //retrive all incoming data
    $group_name = $_POST["group_name"];
    $description = $_POST["description"];

    //validate for empty fields
    if(!empty($group_name) && !empty($description)){

        //insert data into database
        if($group->NewGroup($group_name,$description)){
            
            //direct to all rooms page
            header("location:../all.groups?message=success");
    
        }else{
            header("Location: " . $_SERVER["HTTP_REFERER"]);
        };

    }

    
}

// add new event
if(isset($_POST['newevent'])){

    //retrive all incoming data
     $groupid = $_POST["group"];
     $event_name = $_POST["event_name"];
     $start_date = $_POST["start_date"];
     $start_time = $_POST["start_time"];
     $end_date = $_POST["end_date"];
     $end_time = $_POST["end_time"];
     $description = $_POST["description"];
     $status = $_POST["status"];
    
    //validate for empty fields
    if(!empty($group) && !empty($event_name) && !empty($start_date) && !empty($end_date) && !empty($description) && !empty($status)){

        //insert data into database
        if($event->NewEvent($groupid,$event_name,$description,$start_date,$start_time,$end_date,$end_time,$status)){
            
            //direct to all category page
            header("Location: " . $_SERVER["HTTP_REFERER"]."?message=success");
    
        }else{
            header("Location: " . $_SERVER["HTTP_REFERER"]."?message=fail");
        };

    }

    
}




// add new group member
if(isset($_POST['add_group_member'])){

    //retrive all incoming data
    $groupid = $_POST["groupid"];
    $memberid = $_POST["memberid"];

    //validate for empty fields
    if(!empty($groupid) && !empty($memberid)){

        //insert data into database
        if($group->NewGroupMember($groupid,$memberid)){
            
            
            header("Location: " . $_SERVER["HTTP_REFERER"]."?message=success");
    
        }else{
            header("Location: " . $_SERVER["HTTP_REFERER"]."?message=failed");
        };

    }

    
}


// add new staff
if(isset($_POST['newmember'])){


    //retrive all incoming data
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $gender = $_POST["gender"];
    $residential_address = $_POST["address"];
    $image_url = $_FILES["image"]['name'];
    $birth_date = $_POST["birth_date"];
    $place_of_birth = $_POST["Place_of_birth"];
    $home_town = $_POST["home_town"];
    $home_town_address = $_POST["home_town_address"];
    $certificate_date = $_POST["certificate_date"];
    $certificate_no = $_POST["certificate_no"];
    $marital_status = $_POST["marital_status"];
    $occupation = $_POST["occupation"];
    $place_of_work = $_POST["place_of_work"];
    $baptized = $_POST["baptized"];
    $date_baptized = $_POST["baptized_date"];
    $place_baptized = $_POST["place_baptized"];
    $baptized_by = $_POST["baptized_by"];

    //validate for empty fields
    if(!empty($firstname) && !empty($lastname) && !empty($email) && !empty($phone) && !empty($gender) && !empty($residential_address) && !empty($image_url)){

        //insert data into database
        if($member->NewMember($image_url, $firstname, $lastname, $email, $phone, $gender, $residential_address, $birth_date, $place_of_birth, $home_town, $home_town_address, $marital_status, $occupation, $place_of_work,$baptized, $date_baptized, $place_baptized, $baptized_by, $certificate_no, $certificate_date)){
            
            //direct to all rooms page
            $tmp = $_FILES['image']['tmp_name'];
            if(move_uploaded_file($tmp,'../assets/images/uploads/'.$image_url))
            {
            
               // $sendemail->NewMemberEmail('church of Christ',$email,$firstname,$lastname);
                header("location:../all.members?message=success");
            }
            
    
        }else{
            header("Location: " . $_SERVER["HTTP_REFERER"]."?message=failed");
        };

    }

    
}


// add new user
if(isset($_POST['newuser'])){

    //retrive all incoming data
   
    // $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $user_role = $_POST["user_role"];
    $group = $_POST['group'];

    if($user_role == 3){
        $group = 0;
    }
    


    
    

    //validate for empty fields
    if(!empty($email) && !empty($user_role) && !empty($password)){

        //insert data into database
        if($user->NewUser($email,$user_role,$password,$group)){

          
           header("Location: " . $_SERVER["HTTP_REFERER"]."?message=success");
    
        }else{
            header("Location: " . $_SERVER["HTTP_REFERER"]."?message=failed");
        };

    }

    
}



// add new announcement
if(isset($_POST['new_announcement'])){

    //retrive all incoming data
   
    $title = $_POST["title"];
    $group = $_POST["group"];
    $description = $_POST["description"];
    

    //validate for empty fields
    if(!empty($title) && !empty($group) && !empty($description)){

        //insert data into database
        if($announcement->NewAnnouncement($group,$title,$description)){
            
            //direct to all rooms page
            header("Location: " . $_SERVER["HTTP_REFERER"]."?message=success");
    
        }else{
            header("Location: " . $_SERVER["HTTP_REFERER"]."?message=failed");
        };

    }

    
}




// add new family
if(isset($_POST['newfamily'])){

    //retrive all incoming data
   
    $family_name = $_POST["family_name"];
    $phone = $_POST["phone"];
    $email = $_POST["email"];
    $location = $_POST["location"];
    

    //validate for empty fields
    if(!empty($family_name) && !empty($phone) && !empty($email) && !empty($location)){

        //insert data into database
        if($family->NewFamily($family_name,$phone,$email,$location)){
            
            
            //direct to all rooms page
            header("Location: " . $_SERVER["HTTP_REFERER"]."?message=success");
    
        }else{
            header("Location: " . $_SERVER["HTTP_REFERER"]."?message=failed");
        }

    }

    
}



// add new family
if(isset($_POST['newfamilymember'])){

    //retrive all incoming data
   
    $familyid = $_POST["familyid"];
    $memberid = $_POST["memberid"];
    $role = $_POST["role"];
    

    //validate for empty fields
    if(!empty($familyid) && !empty($memberid) && !empty($role)){

        //insert data into database
        if($family->NewFamilyMember($familyid,$memberid,$role)){
            
            
            //direct to all rooms page
            header("Location: " . $_SERVER["HTTP_REFERER"]."?message=success");
    
        }else{
            header("Location: " . $_SERVER["HTTP_REFERER"]."?message=failed");
        }

    }

    
}



// add new family
if(isset($_POST['new_contribution'])){

    //retrive all incoming data
   
    $amount = $_POST["amount"];
    $type = $_POST["type"];
    $group = $_POST["group"];
    $date = $_POST["date"];
    

    //validate for empty fields
    if(!empty($amount) && !empty($type) && !empty($group) && !empty($date)){

        //insert data into database
        if($contribution->NewContribution($amount,$group,$type,$date)){
            
            
            //direct to all rooms page
            header("Location: " . $_SERVER["HTTP_REFERER"]."?message=success");
    
        }else{
            header("Location: " . $_SERVER["HTTP_REFERER"]."?message=failed");
        }

    }

    
}






// add new room category
if(isset($_POST['newreservation'])){

    //retrive all incoming data
    $customer = $_POST["customer"];
    $category = $_POST["category"];
    $arrival = $_POST["arrival"];
    $departure = $_POST["departure"];

    //validate for empty fields
    if(!empty($customer) && !empty($category) && !empty($arrival) && !empty($departure)){

        //insert data into database
        if($reservation->NewReservation($customer,$category,$arrival,$departure)){
            
            //direct to all reservation page
            header("location:../confirmed.reservations?message=success");
    
        }else{
            header("location:../confirmed.reservations?message=failed");
        };

    }

    
}





// if($btn == "updateroom"){
    
//     $roomid = $incomingData["roomid"];
//     $category = $incomingData["category"];
//     $room_number = $incomingData["room_number"];
//     $phone = $incomingData["phone"];
//     $name = $incomingData["name"];

//     if(!empty($category) && !empty($room_number) && !empty($phone) && !empty($name) && !empty($roomid)){

//         if(updateroom($category,$room_number,$name,$phone,$roomid))
//         {
//             $return["status"] = "success";
    
//         }else{
//             $return["status"] = "failed";
//         };

//     }

    


// }







//Encode the $return variable
// echo json_encode($return, true);