<?php
include_once 'dbh.class.php';

class Announcement extends Dbh{



//select all Attendance
public function AllAnouncement()
{
  try
  {

    $sql = "select * from announcements_view";
    $stmt = $this->connection()->prepare($sql);
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_OBJ);
    return $results;

  }catch(Exception $e)
  {

    throw new Exception($e->getMessage());   
  }	         

}


 // add new attentance
 public function NewAnnouncement($groupid,$title,$description)
 {
    try
    {
  
      // insert data into database
      $sql = "INSERT INTO `announcements`(`group_id`, `title`, `description`) values(?,?,?)";
      $stmt = $this->connection()->prepare($sql);
      if($stmt->execute([$groupid,$title,$description])){
        return true;
      }else{
        return false;
      }
     

    }catch(Exception $e)
    {

      throw new Exception($e->getMessage());   
    }		

  }



//select all events for a single group
public function GetAnnouncement($id)
{
  try
  {

    $sql = "SELECT * FROM `announcements_view` WHERE a_id = ?";
    $stmt = $this->connection()->prepare($sql);
    $stmt->execute([$id]);
    $result = $stmt->fetch(PDO::FETCH_OBJ);
    return $result;

  }catch(Exception $e)
  {

    throw new Exception($e->getMessage());   
  }	         

}  



// update event
public function UpdateAnnouncement($groupid,$title,$description,$id)
{
   try
   {
     // update data into database
     $sql = "UPDATE `announcements` SET `group_id`= ?,`title`= ?,`description`= ? WHERE a_id = ?";
     $stmt = $this->connection()->prepare($sql);
     if($stmt->execute([$groupid,$title,$description,$id])){
       return true;
     }else{
       return false;
     }

   }catch(Exception $e)
   {

     throw new Exception($e->getMessage());   
   }		

 }




// //select all events for a single group
// public function GetGroupEvents($groupid)
// {
//   try
//   {

//     $sql = "SELECT * FROM `events_view` WHERE group_id = ? ORDER BY `start_datetime` ASC";
//     $stmt = $this->connection()->prepare($sql);
//     $stmt->execute([$groupid]);
//     $result = $stmt->fetchAll(PDO::FETCH_OBJ);
//     return $result;

//   }catch(Exception $e)
//   {

//     throw new Exception($e->getMessage());   
//   }	         

// }
 


// delete attentance
public function DeleteAnnouncement($Announcementid)
{
  try
  {
    $sql = "DELETE from `announcements` where a_id = ?";
    $stmt = $this->connection()->prepare($sql);
    if($stmt->execute([$Announcementid])){
      return true;
    }else{
      return false;
        }
    
  }catch(Exception $e){
  
   throw new Exception($e->getMessage());   
  }	         
}


    



}