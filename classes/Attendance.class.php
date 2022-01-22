<?php
include_once 'dbh.class.php';

class Attendance extends Dbh{



//select all Attendance
public function AllAttendance()
{
  try
  {

    $sql = "select * from attendance_view";
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
 public function NewAttendance($eventid,$memberid)
 {
    try
    {
  
      // insert data into database
      $sql = "INSERT INTO `attendance`(`event_id`, `member_id`) values(?,?)";
      $stmt = $this->connection()->prepare($sql);
      if($stmt->execute([$eventid,$memberid])){
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
public function GetEventAttendance($eventid)
{
  try
  {

    $sql = "SELECT * FROM `attendance_view` WHERE event_id = ?";
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
public function DeleteAttendance($attentanceid)
{
  try
  {
    $sql = "DELETE from `events` where id = ?";
    $stmt = $this->connection()->prepare($sql);
    if($stmt->execute([$attentanceid])){
      return true;
    }else{
      return false;
        }
    
  }catch(Exception $e){
  
   throw new Exception($e->getMessage());   
  }	         
}




//select attendance between datas
public function AttendanceReport($startdate,$enddate,$groupid)
{
  try
  {

    $sql = "SELECT * FROM `attendance_view` WHERE date(create_datetime) BETWEEN ? AND ? AND group_id = ?";
    $stmt = $this->connection()->prepare($sql);
    $stmt->execute([$startdate,$enddate,$groupid]);
    $results = $stmt->fetchAll(PDO::FETCH_OBJ);
    return $results;

  }catch(Exception $e)
  {

    throw new Exception($e->getMessage());   
  }	         

}






}