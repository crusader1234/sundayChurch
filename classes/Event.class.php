<?php
include_once 'dbh.class.php';

class Event extends Dbh{




        //select all events
        public function AllEvents()
        {
          try
          {
    
            $sql = "select * from events_view ORDER BY `start_date` ASC";
            $stmt = $this->connection()->prepare($sql);
            $stmt->execute();
            $results = $stmt->fetchAll(PDO::FETCH_OBJ);
            return $results;
    
          }catch(Exception $e)
          {

            throw new Exception($e->getMessage());   
          }	         
        
        }



 // add new group
 public function NewEvent($groupid,$event_name,$description,$start_date,$start_time,$end_date,$end_time,$status)
 {
    try
    {
  
      // insert data into database
      $sql = "INSERT INTO `events`(`group_id`, `event_name`, `description`,`start_date`, `start_time`, `end_date`, `end_time`,`status`) values(?,?,?,?,?,?,?,?)";
      $stmt = $this->connection()->prepare($sql);
      if($stmt->execute([$groupid,$event_name,$description,$start_date,$start_time,$end_date,$end_time,$status])){
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
public function GetEvent($eventid)
{
  try
  {

    $sql = "SELECT * FROM `events` WHERE id = ?";
    $stmt = $this->connection()->prepare($sql);
    $stmt->execute([$eventid]);
    $result = $stmt->fetch(PDO::FETCH_OBJ);
    return $result;

  }catch(Exception $e)
  {

    throw new Exception($e->getMessage());   
  }	         

} 


//select all current month birthday
public function GetCurrentMonthBirthdays()
{
  try
  {

    $sql = "SELECT * FROM `birthdays` where month(`birth_date`) = month(CURRENT_DATE) ORDER BY day(`birth_date`) ASC";
    $stmt = $this->connection()->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_OBJ);
    return $result;

  }catch(Exception $e)
  {

    throw new Exception($e->getMessage());   
  }	         

}









// update event
public function UpdateEvent($groupid,$event_name,$description,$start_date,$start_time,$end_date,$end_time,$status,$eventid)
{
   try
   {
     // update data into database
     $sql = "UPDATE `events` SET `group_id`= ?,`event_name`= ?,`description`= ?,`start_date`= ?,`start_time`= ?,`end_date`= ?,`end_time`= ?,`status`= ?  WHERE id = ?";
     $stmt = $this->connection()->prepare($sql);
     if($stmt->execute([$groupid,$event_name,$description,$start_date,$start_time,$end_date,$end_time,$status,$eventid])){
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
public function GetGroupEvents($groupid)
{
  try
  {

    $sql = "SELECT * FROM `events_view` WHERE group_id = ? ORDER BY `start_date` ASC";
    $stmt = $this->connection()->prepare($sql);
    $stmt->execute([$groupid]);
    $result = $stmt->fetchAll(PDO::FETCH_OBJ);
    return $result;

  }catch(Exception $e)
  {

    throw new Exception($e->getMessage());   
  }	         

}
 


// delete customer
public function DeleteEvent($eventid)
{
  try
  {
    $sql = "DELETE from `events` where id = ?";
    $stmt = $this->connection()->prepare($sql);
    if($stmt->execute([$eventid])){
      return true;
    }else{
      return false;
        }
    
  }catch(Exception $e){
  
   throw new Exception($e->getMessage());   
  }	         
}



//select all customers
public function TotalEvents()
{
  try
  {

    $sql = "select Count(*) events from events";
    $stmt = $this->connection()->prepare($sql);
    $stmt->execute();
    $results = $stmt->fetch(PDO::FETCH_OBJ);
    return $results;

  }catch(Exception $e)
  {

    throw new Exception($e->getMessage());   
  }	         

}
    



}