<?php
include_once 'dbh.class.php';

class Family extends Dbh{



//select all families
public function AllFamily()
{
  try
  {

    $sql = "select * from family";
    $stmt = $this->connection()->prepare($sql);
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_OBJ);
    return $results;

  }catch(Exception $e)
  {

    throw new Exception($e->getMessage());   
  }	         

}


 // add new family
 public function NewFamily($name,$phone,$email,$location)
 {
    try
    {
  
      // insert data into database
      $sql = "INSERT INTO `family`(`name`, `phone`,`email`,`location`) values(?,?,?,?)";
      $stmt = $this->connection()->prepare($sql);
      if($stmt->execute([$name,$phone,$email,$location])){
        return true;
      }else{
        return false;
      }
     

    }catch(Exception $e)
    {

      throw new Exception($e->getMessage());   
    }		

  }



//select single family info
public function GetFamilyInfo($familyid)
{
  try
  {

    $sql = "SELECT * FROM `family` WHERE id = ?";
    $stmt = $this->connection()->prepare($sql);
    $stmt->execute([$familyid]);
    $result = $stmt->fetch(PDO::FETCH_OBJ);
    return $result;

  }catch(Exception $e)
  {

    throw new Exception($e->getMessage());   
  }	         

}  



// update event
public function UpdateFamily($name,$phone,$email,$location,$familyid)
{
   try
   {
     // update data into database
     $sql = "UPDATE `family` SET `name`= ?,`phone`= ?,`email`= ?,`location`= ? WHERE id = ?";
     $stmt = $this->connection()->prepare($sql);
     if($stmt->execute([$name,$phone,$email,$location,$familyid])){
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
public function GetFamilyMembers($familyid)
{
  try
  {

    $sql = "SELECT * FROM `family_members_view` WHERE `family_id` = ?";
    $stmt = $this->connection()->prepare($sql);
    $stmt->execute([$familyid]);
    $result = $stmt->fetchAll(PDO::FETCH_OBJ);
    return $result;

  }catch(Exception $e)
  {

    throw new Exception($e->getMessage());   
  }	         

}


//select all events for a single group
public function NewFamilyMember($familyid,$memberid,$role)
{
  try
  {

    $sql = "INSERT INTO `family_members` (`family_id`, `member_id`, `role`) VALUES (?,?,?)";
    $stmt = $this->connection()->prepare($sql);
    if($stmt->execute([$familyid,$memberid,$role])){
      return true;
    }else{
      return false;
    }

  }catch(Exception $e)
  {

    throw new Exception($e->getMessage());   
  }	         

}
 


// delete family
public function DeleteFamily($id)
{
  try
  {
    $sql = "DELETE from `family` where id = ?";
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


// delete family member
public function DeleteFamilyMember($id)
{
  try
  {
    $sql = "DELETE from `family_members` where id = ?";
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



public function TotalFamilies()
{
  try
  {

    $sql = "select Count(*) total from family";
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