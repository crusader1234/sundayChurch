<?php
include_once 'dbh.class.php';

class Contribution extends Dbh{



//select all Attendance
public function AllContribution()
{
  try
  {

    $sql = "select * from Contributions_view";
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
 public function NewContribution($amount,$groupid,$type,$created_date)
 {
    try
    {
  
      // insert data into database
      $sql = "INSERT INTO `contributions`(`amount`,`group_id`, `type`, `created_date`) values(?,?,?,?)";
      $stmt = $this->connection()->prepare($sql);
      if($stmt->execute([$amount,$groupid,$type,$created_date])){
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
public function GetContribution($id)
{
  try
  {

    $sql = "SELECT * FROM `Contributions_view` WHERE id = ?";
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
public function UpdateContribution($groupid,$title,$description,$id)
{
   try
   {
     // update data into database
     $sql = "UPDATE `Contributions` SET `group_id`= ?,`title`= ?,`description`= ? WHERE a_id = ?";
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
public function DeleteContribution($contributionid)
{
  try
  {
    $sql = "DELETE from `Contributions` where id = ?";
    $stmt = $this->connection()->prepare($sql);
    if($stmt->execute([$contributionid])){
      return true;
    }else{
      return false;
        }
    
  }catch(Exception $e){
  
   throw new Exception($e->getMessage());   
  }	         
}




//select all customers
public function TotalContributions()
{
  try
  {

    $sql = "select Sum(amount) amount from Contributions where month(created_date) = month(CURRENT_DATE)";
    $stmt = $this->connection()->prepare($sql);
    $stmt->execute();
    $results = $stmt->fetch(PDO::FETCH_OBJ);
    return $results;

  }catch(Exception $e)
  {

    throw new Exception($e->getMessage());   
  }	         

}


//general contributions report
public function GeneralContributionReport($startdate,$enddate)
{
  try
  {

    $sql = "SELECT count(*) total,sum(amount) amount, group_name group,date(created_date) logdate from contributions_view where date(created_date) BETWEEN ? and ? GROUP by created_date, group_name";
    $stmt = $this->connection()->prepare($sql);
    $stmt->execute([$startdate,$enddate]);
    $results = $stmt->fetchAll(PDO::FETCH_OBJ);
    
    $output = [];

    $output['report'] = $results;
    $output['total'] = $this->GeneralContributionReportTotal($startdate,$enddate);

    return $output;

  }catch(Exception $e)
  {

    throw new Exception($e->getMessage());   
  }	         

}


//general contributions report
public function GeneralContributionReportTotal($startdate,$enddate)
{
  try
  {

    $sql = "SELECT count(*) total,sum(amount) amount from contributions_view where date(created_date) BETWEEN ? and ?";
    $stmt = $this->connection()->prepare($sql);
    $stmt->execute([$startdate,$enddate]);
    $results = $stmt->fetch(PDO::FETCH_OBJ);
    return $results;

  }catch(Exception $e)
  {

    throw new Exception($e->getMessage());   
  }	         

}



//group contribution report
public function GroupContributionReport($startdate,$enddate,$groupid)
{
  try
  {

    $sql = "SELECT count(*) total,sum(amount) amount, group_name,date(created_date) logdate from contributions_view where date(created_date) BETWEEN ? and ? and group_id = ? GROUP by created_date, group_name";
    $stmt = $this->connection()->prepare($sql);
    $stmt->execute([$startdate,$enddate,$groupid]);
    $results = $stmt->fetchAll(PDO::FETCH_OBJ);

    $output = [];

    $output['report'] = $results;
    $output['total'] = $this->GroupContributionReportTotal($startdate,$enddate,$groupid);

    return $output;

  }catch(Exception $e)
  {

    throw new Exception($e->getMessage());   
  }	         

}


//general contributions report
public function GroupContributionReportTotal($startdate,$enddate,$groupid)
{
  try
  {

    $sql = "SELECT count(*) total,sum(amount) amount from contributions_view where date(created_date) BETWEEN ? and ? and group_id = ?";
    $stmt = $this->connection()->prepare($sql);
    $stmt->execute([$startdate,$enddate,$groupid]);
    $results = $stmt->fetch(PDO::FETCH_OBJ);
    return $results;
    
    

  }catch(Exception $e)
  {

    throw new Exception($e->getMessage());   
  }	         

}



}