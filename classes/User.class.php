<?php
include_once 'dbh.class.php';
include_once 'Email.class.php';

class User extends Dbh{

   



        //select all customers
        public function AllUsers()
        {
          try
          {
    
            $sql = "select * from users";
            $stmt = $this->connection()->prepare($sql);
            $stmt->execute();
            $results = $stmt->fetchAll(PDO::FETCH_OBJ);
            return $results;
    
          }catch(Exception $e)
          {

            throw new Exception($e->getMessage());   
          }	         
        
        }


        // add new user
       public function NewUser($email,$role,$password,$group)
       {
          try
          {
             $hashpassword = Password_hash($password, PASSWORD_DEFAULT);
            
            // insert data into database
            $sql = "INSERT INTO `users`(`email`,`user_role`,`password`,`group`) values(?,?,?,?)";
            $stmt = $this->connection()->prepare($sql);
            if($stmt->execute([$email,$role,$hashpassword,$group])){
              $sendemail = new Email;
              $sendemail = $sendemail->NewUserEmail($email,$password);
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
                public function DeleteUser($Userid)
                {
                  try
                  {
                   
                    $sql = "DELETE from users where userid = ?";
                    $stmt = $this->connection()->prepare($sql);
                    if($stmt->execute([$Userid])){
                      return true;
                    }else{
                      return false;
                    }
                    
            
                  }catch(Exception $e)
                  {
        
                    throw new Exception($e->getMessage());   
                  }	         
                }


        //select single user data
        public function GetUser($userid)
        {
          try
          {
    
            $sql = "SELECT * from users WHERE userid = ?";
            $stmt = $this->connection()->prepare($sql);
            $stmt->execute([$userid]);
            $result = $stmt->fetch(PDO::FETCH_OBJ);
            return $result;
    
          }catch(Exception $e)
          {

            throw new Exception($e->getMessage());   
          }	         
        
        }


        // update user
       public function UpdateUser($username,$email,$role,$password,$userid)
       {
          try
          {
            $hashpassword = Password_hash($password, PASSWORD_DEFAULT);
            // update data into database
            $sql = "UPDATE `users` SET `username` = ?, `email` = ?, `user_role` = ?, `password` = ?  WHERE userid = ?";
            $stmt = $this->connection()->prepare($sql);
            if($stmt->execute([$username,$email,$role,$hashpassword,$userid])){
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
public function LoginUser($email,$password)
{
  try
   {

    $sql = "SELECT * FROM users WHERE `email` = ?";
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
      $_SESSION['userid'] = $result->userid;
      $_SESSION['email'] = $result->email;
      //$_SESSION['username'] = $result->username;
      $_SESSION['role'] = $result->user_role;
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
 
 

//update user password
 public function updatePassword($userid,$oldpassword,$newpassword){

  try
  {

    $hashpassword = Password_hash($newpassword, PASSWORD_DEFAULT);

    $sql = "SELECT * FROM `users` WHERE `id` = ?";
    $stmt = $this->connection()->prepare($sql);
    $stmt->execute([$userid]);
    $results = $stmt->fetch(PDO::FETCH_OBJ);
    
        if($userid == $results->id && password_verify($oldpassword, $results->password)){
    
            $sql = "UPDATE `users` SET `password`= ? WHERE `id` = ?";
            $stmt = $this->connection()->prepare($sql);
            if($stmt->execute([$hashpassword,$userid])){
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
               



}