<?php
include_once 'dbh.class.php';

class Member extends Dbh{


        //select all Members
        public function AllMembers()
        {
          try
          {
    
            $sql = "select * from members";
            $stmt = $this->connection()->prepare($sql);
            $stmt->execute();
            $results = $stmt->fetchAll(PDO::FETCH_OBJ);
            return $results;
    
          }catch(Exception $e)
          {

            throw new Exception($e->getMessage());   
          }	         
        }




         //select single Member data
         public function GetMember($memberid)
         {
           try
           {
     
             $sql = "select * from members WHERE member_id = ?";
             $stmt = $this->connection()->prepare($sql);
             $stmt->execute([$memberid]);
             $result = $stmt->fetch(PDO::FETCH_OBJ);
             return $result;
     
           }catch(Exception $e)
           {
 
             throw new Exception($e->getMessage());   
           }	         
         }       



 //select single Member data
 public function GetMemberByEmail($email)
 {
   try
   {

     $sql = "select * from members WHERE email = ?";
     $stmt = $this->connection()->prepare($sql);
     $stmt->execute([$email]);
     $result = $stmt->fetch(PDO::FETCH_OBJ);
     return $result;

   }catch(Exception $e)
   {

     throw new Exception($e->getMessage());   
   }	         
 }         




        // create new Member
        public function NewMember($image_url, $firstname, $lastname, $email, $phone, $gender, $residential_address, $birth_date, $place_of_birth, $home_town, $home_town_address, $marital_status, $occupation, $place_of_work,$baptized, $date_baptised, $place_baptised, $baptised_by, $certificate_no, $certificate_date)
        {
          try
          {
    
            // $hashpassword = Password_hash("123456", PASSWORD_DEFAULT);
            $sql = "INSERT INTO `members`(`image_url`, `firstname`, `lastname`, `email`, `phone`, `gender`, `residential_address`, `birth_date`, `place_of_birth`, `home_town`, `home_town_address`, `marital_status`, `occupation`, `place_of_work`,`baptized`, `date_baptised`, `place_baptised`, `baptised_by`,  `certificate_no`, `certificate_date`)
             VALUE(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
            $stmt = $this->connection()->prepare($sql);
            if($stmt->execute([$image_url, $firstname, $lastname, $email, $phone, $gender, $residential_address, $birth_date, $place_of_birth, $home_town, $home_town_address, $marital_status, $occupation, $place_of_work,$baptized, $date_baptised, $place_baptised, $baptised_by, $certificate_no, $certificate_date]))
            {
              return true;
            }else{
              return false;
            }
    
          }catch(Exception $e)
          {

            throw new Exception($e->getMessage());   
          }	         
        }

        
        // update Member data with image
        public function UpdateMember($image_url, $firstname, $lastname, $email, $phone, $gender, $residential_address, $birth_date, $place_of_birth, $home_town, $home_town_address, $marital_status, $occupation, $place_of_work,$baptized, $date_baptised, $place_baptised, $baptised_by, $certificate_no, $certificate_date, $member_id)
        {
          try
          {
    
            $sql = "UPDATE `members` SET `image_url` = ?,`firstname` = ?,`lastname` = ?,`email` = ?,`phone` = ?,`gender` = ?,`residential_address` = ?,`birth_date` = ?,`place_of_birth` = ?,`home_town` = ?,`home_town_address` = ?,`marital_status` = ?,`occupation` = ?,`place_of_work` = ?,`baptized` = ?,`date_baptised` = ?,`place_baptised` = ?,`baptised_by` = ?,`certificate_no` = ?,`certificate_date` = ? WHERE member_id = ?";
            $stmt = $this->connection()->prepare($sql);
            if($stmt->execute([$image_url, $firstname, $lastname, $email, $phone, $gender, $residential_address, $birth_date, $place_of_birth, $home_town, $home_town_address, $marital_status, $occupation, $place_of_work,$baptized, $date_baptised, $place_baptised, $baptised_by, $certificate_no, $certificate_date, $member_id]))
            {
              return true;
            }else{
              return false;
            }
    
          }catch(Exception $e)
          {

            throw new Exception($e->getMessage());   
          }	         
        }


     // update Member data without image
     public function UpdateMemberNoImage($firstname, $lastname, $email, $phone, $gender, $residential_address, $birth_date, $place_of_birth, $home_town, $home_town_address, $marital_status, $occupation, $place_of_work,$baptized, $date_baptised, $place_baptised, $baptised_by, $certificate_no, $certificate_date, $member_id)
     {
       try
      {
    
        $sql = "UPDATE `members` SET `firstname` = ?,`lastname` = ?,`email` = ?,`phone` = ?,`gender` = ?,`residential_address` = ?,`birth_date` = ?,`place_of_birth` = ?,`home_town` = ?,`home_town_address` = ?,`marital_status` = ?,`occupation` = ?,`place_of_work` = ?,`baptized` = ?,`date_baptised` = ?,`place_baptised` = ?,`baptised_by` = ?,`certificate_no` = ?,`certificate_date` = ? WHERE member_id = ?";
        $stmt = $this->connection()->prepare($sql);
        if($stmt->execute([$firstname, $lastname, $email, $phone, $gender, $residential_address, $birth_date, $place_of_birth, $home_town, $home_town_address, $marital_status, $occupation, $place_of_work,$baptized, $date_baptised, $place_baptised, $baptised_by, $certificate_no, $certificate_date, $member_id]))
        {
          return true;
        }else{
          return false;
        }

      }catch(Exception $e)
       {

         throw new Exception($e->getMessage());   
       }	 
               
     }   



        //select all Members
        public function selectMemberByPhone($phone)
        {
          try
          {
    
            $sql = "SELECT * FROM `members` WHERE phone = ?";
            $stmt = $this->connection()->prepare($sql);
            $stmt->execute([$phone]);
            
            if($stmt->rowCount() == 1){

              $result = $stmt->fetch(PDO::FETCH_OBJ);
              return $result;

            }else{
              return null;
            }
            
    
          }catch(Exception $e)
          {

            throw new Exception($e->getMessage());   
          }	         
        }
     

       // delete Member
       public function DeleteMember($memberid)
      {
        try
        {
            
          
          $sql = "DELETE from `members` WHERE member_id = ?";
          $stmt = $this->connection()->prepare($sql);
          if($stmt->execute([$memberid])){
            return true;
          }else{
            return false;
          }
          
  
        }catch(Exception $e)
         {
          throw new Exception($e->getMessage());   
         }	         
      }




 //login Member 
 public function LoginMember($email,$password)
 {
   try
    {

     $sql = "SELECT * FROM members WHERE `email` = ?";
     $stmt = $this->connection()->prepare($sql);
     $stmt->execute([$email]);
     $count = $stmt->rowCount();

     if ($count == 1) { // if row count is 1

      // retrieve row's data
       $result = $stmt->fetch(PDO::FETCH_OBJ);

       // validate if data matches incoming data
       if ($email == $result->email && password_verify($password, $result->password)) {
        
        // start session and assign userid and designation
       session_start();
       $_SESSION['Memberid'] = $result->id;
       $_SESSION['image'] = $result->image;
       $_SESSION['username'] = $result->lastname;
       $_SESSION['designation'] = $result->department;
       return true;

      }else{ // if incoming data doesn't match the retrived data

        return false;
      }

     }else{ // if row count is not equal to 1 

       return false;
     }


    }
   catch(Exception $e)
    {

     throw new Exception($e->getMessage());   
    }	         
 
  }








  public function updatePassword($Memberid,$oldpassword,$newpassword){

    try
    {

      $hashpassword = Password_hash($newpassword, PASSWORD_DEFAULT);

      $sql = "SELECT * FROM `Members` WHERE `id` = ?";
      $stmt = $this->connection()->prepare($sql);
      $stmt->execute([$Memberid]);
      $results = $stmt->fetch(PDO::FETCH_OBJ);
      
          if($Memberid == $results->id && password_verify($oldpassword, $results->password)){
      
              $sql = "UPDATE `Members` SET `password`= ? WHERE `id` = ?";
              $stmt = $this->connection()->prepare($sql);
              if($stmt->execute([$hashpassword,$Memberid])){
                return true;
              }else{
                return false;
              }
      
              
          }else{
            return false;
          } 
        

    }catch(Exception $e)
    {

      throw new Exception($e->getMessage());   
    }	


  }


         //select all customers
         public function TotalMembers()
         {
           try
           {
     
             $sql = "select Count(*) members from members";
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




 