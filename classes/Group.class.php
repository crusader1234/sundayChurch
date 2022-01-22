<?php
include_once 'dbh.class.php';
include_once 'Event.class.php';

class Group extends Dbh{




  //select all group
  public function AllGroups()
  {
    try
    {
      $sql = "select * from groups";
      $stmt = $this->connection()->prepare($sql);
      $stmt->execute();
      $results = $stmt->fetchAll(PDO::FETCH_OBJ);
      return $results;
    
    }catch(Exception $e){

        throw new Exception($e->getMessage());  
      }

        
  }


        // add new group
       public function NewGroup($name,$description)
       {
          try
          {
        
            // insert data into database
            $sql = "INSERT INTO `groups`(`name`, `description`) values(?,?)";
            $stmt = $this->connection()->prepare($sql);
            if($stmt->execute([$name,$description])){
              return true;
            }else{
              return false;
            }
           
    
          }catch(Exception $e)
          {

            throw new Exception($e->getMessage());   
          }		

        }





 // add new group
 public function NewGroupMember($groupid,$memberid)
 {
    try
    {
  
      // insert data into database
      $sql = "INSERT INTO `group_members`(`group_id`, `member_id`) values(?,?)";
      $stmt = $this->connection()->prepare($sql);
      if($stmt->execute([$groupid,$memberid])){
        return true;
      }else{
        return false;
      }
     

    }catch(Exception $e)
    {

      throw new Exception($e->getMessage());   
    }		

  }        



                // delete customer
                public function DeleteGroup($id)
                {
                  try
                  {
            
                    $sql = "DELETE from `groups` where id = ?";
                    $stmt = $this->connection()->prepare($sql);
                    if($stmt->execute([$id])){
                      return true;
                    }else{
                      return false;
                    }
                    
            
                  }catch(Exception $e)
                  {
        
                    throw new Exception($e->getMessage());   
                  }	         
                }



// delete customer
public function DeleteGroupMember($id)
{
  try
  {

    $sql = "DELETE FROM `group_members` WHERE id = ?";
    $stmt = $this->connection()->prepare($sql);
    if($stmt->execute([$id])){
      return true;
    }else{
      return false;
    }
    

  }catch(Exception $e)
  {

    throw new Exception($e->getMessage());   
  }	         
}
                

 

        //select single group data
        public function GetGroup($id)
        {
          try
          {
    
            $sql = "SELECT * from `groups` WHERE id = ?";
            $stmt = $this->connection()->prepare($sql);
            $stmt->execute([$id]);
            $result = $stmt->fetch(PDO::FETCH_OBJ);
            return $result;
    
          }catch(Exception $e)
          {

            throw new Exception($e->getMessage());   
          }	         
        
        }



//select single group data
public function GetGroupMembers($groupid)
{
  try
  {

    $sql = "SELECT * FROM `group_members_view` WHERE group_id = ?";
    $stmt = $this->connection()->prepare($sql);
    $stmt->execute([$groupid]);
    $result = $stmt->fetchAll(PDO::FETCH_OBJ);
    return $result;

  }catch(Exception $e)
  {

    throw new Exception($e->getMessage());   
  }	         

}



//select single group data
public function GetEvents($groupid)
{
    $event = new Event();
    return $event->GetGroupEvents($groupid);     

}





        // update customer
       public function UpdateGroup($name,$description,$id)
       {
          try
          {
            // update data into database
            $sql = "UPDATE `groups` SET `name` = ?, `description` = ?  WHERE id = ?";
            $stmt = $this->connection()->prepare($sql);
            if($stmt->execute([$name,$description,$id])){
              return true;
            }else{
              return false;
            }
    
          }catch(Exception $e)
          {

            throw new Exception($e->getMessage());   
          }		

        }


         //select all customers
         public function TotalGroups()
         {
           try
           {
     
             $sql = "select Count(*) groups from groups";
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