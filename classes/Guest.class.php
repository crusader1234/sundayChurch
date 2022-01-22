<?php
include_once 'dbh.class.php';

class Guest extends Dbh{



//select all Attendance
public function AllGuests()
{
  try
  {

    $sql = "select * from guests";
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
 public function NewGuest($fullname,$phone,$eventid)
 {
    try
    {
  
      // insert data into database
      $sql = "INSERT INTO `guests`(`fullname`, `phone`,`eventid`) values(?,?,?)";
      $stmt = $this->connection()->prepare($sql);
      if($stmt->execute([$fullname,$phone,$eventid])){
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
public function GetEventGuests($eventid)
{
  try
  {

    $sql = "SELECT * FROM `guests` WHERE eventid = ?";
    $stmt = $this->connection()->prepare($sql);
    $stmt->execute([$eventid]);
    $result = $stmt->fetchAll(PDO::FETCH_OBJ);
    return $result;

  }catch(Exception $e)
  {

    throw new Exception($e->getMessage());   
  }	         

}  



// // update event
// public function UpdateEvent($groupid,$name,$description,$startdate,$enddate,$status,$eventid)
// {
//    try
//    {
//      // update data into database
//      $sql = "UPDATE `events` SET `group_id`= ?,`event_name`= ?,`description`= ?,`start_datetime`= ?,`end_datetime`= ?,`status`= ?  WHERE id = ?";
//      $stmt = $this->connection()->prepare($sql);
//      if($stmt->execute([$groupid,$name,$description,$startdate,$enddate,$status,$eventid])){
//        return true;
//      }else{
//        return false;
//      }

//    }catch(Exception $e)
//    {

//      throw new Exception($e->getMessage());   
//    }		

//  }




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
public function DeleteGuest($id)
{
  try
  {
    $sql = "DELETE from `guests` where id = ?";
    $stmt = $this->connection()->prepare($sql);
    if($stmt->execute([$id])){
      return true;
    }else{
      return false;
        }
    
  }catch(Exception $e){
  
   throw new Exception($e->getMessage());   
  }	         
}


    



}