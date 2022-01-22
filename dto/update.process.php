<?php
session_start();
//header('Content-Type: application/json');
include_once "../classes/User.class.php";
include_once "../classes/Member.class.php";
include_once "../classes/Group.class.php";
include_once "../classes/Event.class.php";
include_once "../classes/Family.class.php";
include_once "../classes/Announcement.class.php";
include_once "../classes/User.class.php";

$member = new Member();
$group = new Group();
$event = new Event();
$user = new User();
$family = new Family();
$announcement = new Announcement();
$user = new User(); 


// update group data
if(isset($_POST['updategroup'])){

    //retrive all incoming data
    echo $group_name = $_POST["group_name"];
    echo $description = $_POST["description"];
    echo $groupid = $_POST["id"];
   

    //validate for empty fields
    if(!empty($group_name) && !empty($description) && !empty($groupid)){

        //insert data into database
        if($group->UpdateGroup($group_name,$description,$groupid)){
            
            //direct to all rooms page
            header("location:../all.groups?message=success");
    
        }else{
            header("Location: " . $_SERVER["HTTP_REFERER"]);
        };

    }

    
}


// Update member data
if(isset($_POST['updatemember'])){

    //retrive all incoming data
    $member_id = $_POST['member_id'];
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

    //validate if staff image was not changed
    if($image_url == "")
    {

        // validate for empty fields
        if(!empty($firstname) && !empty($lastname) && !empty($email) && !empty($phone) && !empty($gender) && !empty($residential_address)){

            //update staff data without image
            if($member->UpdateMemberNoImage($firstname, $lastname, $email, $phone, $gender, $residential_address, $birth_date, $place_of_birth, $home_town, $home_town_address, $marital_status, $occupation, $place_of_work,$baptized, $date_baptized, $place_baptized, $baptized_by, $certificate_no, $certificate_date, $member_id)){
              
                header("location:../all.members?message=success"); // direct user to all staffs page
              
            }else{

                header("Location: " . $_SERVER["HTTP_REFERER"]."?mesage=failed"); // redirect user back to edit staff page
            }
    
        }

    }else{ // if member image was changed

        //validate for empty fields
        if(!empty($firstname) && !empty($lastname) && !empty($email) && !empty($phone) && !empty($gender) && !empty($residential_address) && !empty($image_url)){

            //update staff data image
            if($member->UpdateMember($image_url, $firstname, $lastname, $email, $phone, $gender, $residential_address, $birth_date, $place_of_birth, $home_town, $home_town_address, $marital_status, $occupation, $place_of_work,$baptized, $date_baptized, $place_baptized, $baptized_by, $certificate_no, $certificate_date, $member_id)){
                
                //upload image to server
                $tmp = $_FILES['image']['tmp_name'];
                if(move_uploaded_file($tmp,'../assets/images/uploads/'.$image_url))
                {
                    //direct user to all staffs page
                header("location:../all.members?message=success");

                }
        
            }else{
                // redirect user back to edit staff page
                header("Location: " . $_SERVER["HTTP_REFERER"]."message=failed");
            }
    
        }

    }

    
}



// update event
if(isset($_POST['updateevent'])){

   //retrive all incoming data
   $eventid = $_POST["id"];
   $groupid = $_POST["group"];
   $event_name = $_POST["event_name"];
   $start_date = $_POST["start_date"];
   $start_time = $_POST["start_time"];
   $end_date = $_POST["end_date"];
   $end_time = $_POST["end_time"];
   $description = $_POST["description"];
   $status = $_POST["status"];
  
      //validate for empty fields
      if(!empty($groupid) && !empty($event_name) && !empty($start_date) && !empty($end_date) && !empty($description) && !empty($status) && !empty($eventid)){
  
          //insert data into database
          if($event->UpdateEvent($groupid,$event_name,$description,$start_date,$start_time,$end_date,$end_time,$status,$eventid)){
              
              //direct to all category page
              header("Location: " . $_SERVER["HTTP_REFERER"]."?success");
      
          }else{
            header("Location: " . $_SERVER["HTTP_REFERER"]."?failed");
          }
  
      }

    
}



// Update user
if(isset($_POST['updateuser'])){

    //retrive all incoming data
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $user_role = $_POST["user_role"];
    $userid = $_POST["userid"];

    //validate for empty fields
    if(!empty($username) && !empty($email) && !empty($user_role) && !empty($password) && !empty($userid)){

        //insert data into database
        if($user->UpdateUser($username,$email,$user_role,$password,$userid)){
            
            //direct to all rooms page
            header("Location: " . $_SERVER["HTTP_REFERER"]."?success");
    
        }else{
            header("Location: " . $_SERVER["HTTP_REFERER"]);
        };

    }

    
}



// add new family
if(isset($_POST['update_family'])){

    //retrive all incoming data
    $family_id = $_POST['id'];
    $family_name = $_POST["family_name"];
    $phone = $_POST["phone"];
    $email = $_POST["email"];
    $location = $_POST["location"];
    

    //validate for empty fields
    if(!empty($family_name) && !empty($phone) && !empty($email) && !empty($location) && !empty($family_id)){

        //insert data into database
        if($family->UpdateFamily($family_name,$phone,$email,$location,$family_id)){
            
            
            //direct to all family page
            header("Location: " . $_SERVER["HTTP_REFERER"]."?message=success");
    
        }else{
            header("Location: " . $_SERVER["HTTP_REFERER"]."?message=failed");
        }

    }

    
}




// add new announcement
if(isset($_POST['update_announcement'])){

    //retrive all incoming data
    $id = $_POST['id'];
    $title = $_POST["title"];
    $group = $_POST["group"];
    $description = $_POST["description"];
    

    //validate for empty fields
    if(!empty($title) && !empty($group) && !empty($description) && !empty($id)){

        //insert data into database
        if($announcement->UpdateAnnouncement($group,$title,$description,$id)){
            
            //direct to all rooms page
            header("Location: " . $_SERVER["HTTP_REFERER"]."?message=success");
    
        }else{
            header("Location: " . $_SERVER["HTTP_REFERER"]."?message=failed");
        };

    }

    
}






// Update confirm reservation data
if(isset($_POST['updateconfirm'])){

    //retrive all incoming data
    $resid = $_POST["resid"];
    $room = $_POST["room"];
    $amount = $_POST["amount"];
    $paymode = $_POST["paymode"];
    $status = $_POST["status"];
    $user = $_SESSION['userid'];

    //validate for empty fields
    if($status == 4){


        //validate status -- 
        if(!empty($resid) && !empty($room) && !empty($amount) && !empty($paymode) && !empty($status) && !empty($user)){

            //if status is checkin 
            //insert data into database
        if($reservation->UpdateConfirmedReservation($resid,$room,$amount,$paymode,$user)){
            
            //direct to all rooms page
            header("location:../today.reservations?message=success");
    
        }else{
            header("location:../confirmed.reservations?message=failed");
        }

        }else{
            header("location:../edit.confirmed.reservation?resid=$resid");
        }

    }elseif($status == 6){

        if($reservation->CancelConfirmedReservation($resid)){
            header("Location: " . $_SERVER["HTTP_REFERER"]);
        }else{
            header("location:../confirmed.reservations");
        }

    }

    
}


// checkout reservation
if(isset($_POST['updatereserve'])){

    //retrive all incoming data
    $resid = $_POST["resid"];
    $status = $_POST["status"];

    //validate for empty fields
    if($status == 5){

        if($reservation->CheckoutReservation($resid)){
            header("Location: " . $_SERVER["HTTP_REFERER"]);
        }else{
            header("Location: " . $_SERVER["HTTP_REFERER"]);
        }

    }
  
}


// confirm online reservation
if(isset($_POST['updateonline'])){

    //retrive all incoming data
    $resid = $_POST["resid"];
   // $status = $_POST["status"];

    //validate for empty fields
if(!empty($resid)){

        if($reservation->ConfirmOnlineReservation($resid)){
            header("location:../online.reservations");
        }else{
            header("Location: " . $_SERVER["HTTP_REFERER"]);
        }

    }
  
}



// upgrade online reservation
if(isset($_POST['updateresdate'])){

    //retrive all incoming data
    $resid = $_POST["resid"];
    $arrival = $_POST["arrival"];
    $departure = $_POST["departure"];
    $category = $_POST["category"];
   // $status = $_POST["status"];

    //validate for empty fields
if(!empty($resid)){

        if($reservation->UpgradeOnlineReservation($category,$arrival,$departure,$resid)){
            header("Location: " . $_SERVER["HTTP_REFERER"]);
        }else{
             echo "hello";//header("Location: " . $_SERVER["HTTP_REFERER"]);
        }

    }
  
}



// update user password
if(isset($_POST['changeUpass'])){

    //retrive all incoming data
    $oldpassword = $_POST["cPassword"];
    $newpassword = $_POST["nPassword"];

    //validate for empty fields
if(!empty($oldpassword) && !empty($newpassword)){

    
    // echo $hashpassword = Password_hash($newpassword, PASSWORD_DEFAULT);
        if($user->updatePassword($_SESSION['userid'],$oldpassword,$newpassword)){
            header("Location: " . $_SERVER["HTTP_REFERER"].'?message=success');
        }else{
            header("Location: " . $_SERVER["HTTP_REFERER"].'?message=failed');
        }

    }
  
}