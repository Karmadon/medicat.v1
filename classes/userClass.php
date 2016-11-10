<?php
require_once("dbconfig.php");
class USER extends dbconfig {
   
   public static $data;

   function __construct() {
     parent::__construct();
   }
 
   public static function addNewUser($userData) {
     try {
       $check = self::checkUserExist($userData['username']);
       if($check['status'] == 'error') {
       $data = $check;
       } else {
       $query = "INSERT INTO users (name, lastname, username, password, groupd_id) ";
       $query .= "VALUES ('".$userData['name']."', '".$userData['lastname']."', '".$userData['username']."', '".md5($userData['password'])."', '".$userData['groupd_id']."')";
       $result = dbconfig::run($query);
       if(!$result) {
         throw new exception("Error to create new user.");
       }       
       $data = array('status'=>'success', 'msg'=>"You have been registered successfully login now.", 'result'=>'');
      }
     } catch (Exception $e) {
       $data = array('status'=>'error', 'msg'=>$e->getMessage());
     } finally {
        return $data;
     }
   }

   public static function checkUserExist($username) {
     try {
       $query = "SELECT username FROM users WHERE username = '".$username."'";
       $result = dbconfig::run($query);
       if(!$result) {
         throw new exception("Error in query!");
       }
       $count = mysqli_num_rows($result); 
       if($count>0) {
          throw new exception("Username already exist.");
       }       
       $data = array('status'=>'success', 'msg'=>"", 'result'=>'');
     } catch (Exception $e) {
      echo  $data = array('status'=>'error', 'msg'=>$e->getMessage()); 
     } finally {
        return $data;
     }
   }

   public static function checkUser($username, $password) {
     try {
       $query = "SELECT username FROM users WHERE username = '".$username."' and password = '".md5($password)."'";
       $result = dbconfig::run($query);
       if(!$result) {
         throw new exception("Error in query!");
       }
       $count = mysqli_num_rows($result); 
       if($count == 0) {
          throw new exception("Username/Password is incorrect.");
       }        
       $data = array('status'=>'success', 'msg'=>"", 'result'=>'');
     } catch (Exception $e) {
      echo  $data = array('status'=>'error', 'msg'=>$e->getMessage()); 
     } finally {
        return $data;
     }
   }

   public static function login($username, $password) {
     try {
        $check = self::checkUser($username, $password);
       if($check['status'] == 'error') {
       $data = $check;
       } else {
       $query = "SELECT id FROM users WHERE username = '".$username."' AND password = '".md5($password)."' AND status='1'";
       $result = dbconfig::run($query);
       if(!$result) {
         throw new exception("Error in query!");
       }
       $resultSet = mysqli_fetch_assoc($result);         
       $data = array('status'=>'success', 'msg'=>"User detail fetched successfully.", 'result'=>$resultSet);
      }
     } catch (Exception $e) {
       $data = array('status'=>'error', 'msg'=>$e->getMessage());
     } finally {
        return $data;
     }
   }

  public static function getUserById($id) {
     try {
       $query = "SELECT * FROM users WHERE id=".$id;
       $result = dbconfig::run($query);
       if(!$result) {
         throw new exception("Error in query");
       }
       $resultSet = mysqli_fetch_assoc($result); 
       $data = array('status'=>'success', 'tp'=>1, 'msg'=>"User detail fetched successfully", 'result'=>$resultSet);
     } catch (Exception $e) {
       $data = array('status'=>'error', 'tp'=>0, 'msg'=>$e->getMessage());
     } finally {
        return $data;
     }
   }

}
