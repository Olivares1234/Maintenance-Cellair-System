<?php

include("../config/connection_db.php"); 

//setup connection db
class loginConfig{
    private $id;
    private $username;
    private $password;
    protected $con_Db;
    
 public function __construct($id=0, $username="", $password=""){
    $this->id=$id;
    $this->username=$username;
    $this->password=$password;
    $this->con_Db = new PDO(DB_TYPE.":host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PWD,[PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_ASSOC]);
 
    // $this->dbCnx = new PDO("mysql:host=localhost;dbname=registration;", "root", "");
 
   }

   // setter & getters
   public function setId($id){
    $this->id=$id;
    }
    public function getId(){
    return $this->id;
    }
    public function setusername($username){
       $this->username=$username;
    }
    public function getusername(){
       return $this->username;
    }
    public function setpassword($password){
    $this->password=$password;
    }
    public function getpassword(){
    return $this->password;
    }


    public function fetchAll(){
      try{
         $stm = $this->con_Db->prepare("SELECT * FROM tbl_users");
         $stm->execute();
         return $stm->fetchAll();
      }
      catch(Exception $e){
         return $e->getMessage();
      }
   }

   public function login() {
    try {
         $stm = $this->con_Db->prepare("SELECT * FROM tbl_users WHERE username=? AND password=?");
         $stm->execute([$this->username,md5($this->password)]);
         $user = $stm->fetchAll();
         if (count($user) > 0){
            session_start();
            $_SESSION['id'] = $user[0]['id'];
            $_SESSION['username'] = $user[0]['username'];
            $_SESSION['email'] = $user[0]['email'];
            $_SESSION['password'] = $user[0]['password'];
            $_SESSION['role'] = $user[0]['role'];
            $_SESSION['image'] = $user[0]['image'];
            return true;

         } else {
            return false;
         }
      } catch (Exception $e) {
         return $e-> getMessage();
      }
   }
}

class logsController
{
  // private $id;
  private $username;
  private $action;
  protected $con_Db;


  public function __construct($username = '', $action = '')
  {
    // $this->id = $id;
    $this->username = $username;
    $this->action = $action;

    //setup connection db
    include("../config/connection_db.php");
    $this->con_Db = new PDO(DB_TYPE . ":host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PWD, [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]);

    // $this->dbCnx = new PDO("mysql:host=localhost;dbname=registration;", "root", "");

  }
  public function setusername($username)
  {
    $this->username = $username;
  }
  public function getusername()
  {
    return $this->username;
  }

  public function setaction($action)
  {
    $this->action = $action;
  }
  public function getaction()
  {
    return $this->action;
  }

  public function insertActionLogs()
  { // Inserting Data Timeline.
    try {
      $stm = $this->con_Db->prepare("INSERT INTO tbl_logs(username, action) values(?, ?)");
      $stm->execute([$this->username, $this->action]);
      //  echo "<script>alert('data saved successfully');document.location='../../index.php'</script>";
    } catch (Exception $e) {
      return $e->getMessage();
    }
  }
}
 
   //  public function insertData(){ // Inserting Data Register.
   //     try {
   //     $stm = $this->con_Db->prepare("INSERT INTO tbl_users(email, password) values(?, ?)");
   //     $stm->execute([$this->username,$this->email,$this->password]);
   //    //  echo "<script>alert('data saved successfully');document.location='../../index.php'</script>";
 
   //     }catch(Exception $e){
   //     return $e->getMessage();
   //     }
 
   // }
  


   //  public function checkUsers(){
   //      try{
   //         $stm = $this->con_Db->prepare("SELECT * FROM tbl_users WHERE username = ? AND email = ? AND password = ?");
   //         $stm->execute([$this->username,$this->email,md5($this->password)]);
           
   //         $users =  $stm->fetchAll();

   //         if(count($user)>0){
   //          session_start();
   //          $_SESSION['id'] = $user[0]['id'];
   //          $_SESSION['username'] = $user[0]['username'];
   //          $_SESSION['email'] = $user[0]['email'];
   //          $_SESSION['password'] = $user[0]['password'];
   //          return true;
   //         } else {
   //           return false;
   //         }

   //      }
   //      catch(Exception $e){
   //         return $e->getMessage();
   //      }
   //   }

//     public function fetchOne(){
 
//        try{
//           $stm = $this->dbCnx->prepare("SELECT * FROM users WHERE id=?");
//           $stm->execute([$this->id]);
//           return $stm->fetchAll();
 
//        }
//        catch(Exception $e){
//           return $e->getMesssage();
//        }
//     }
 
//     public function update(){
 
//        try{
//           $stm = $this->dbCnx->prepare("UPDATE users SET firstName = ?, lastName=?, address=? WHERE id = ?");
//           $stm->execute([$this->firstName,$this->lastName,$this->address,$this->id]);
//           return $stm->fetchAll();
 
//        }
//        catch(Exception $e){
//           return $e->getMessage();
//        }
//     }
 
//     public function delete(){
 
//        try{
//           $stm = $this->dbCnx->prepare("DELETE FROM users WHERE id=?");
//           $stm->execute([$this->id]);
//           return $stm->fetchAll();
//           echo "<script>alert('data deleted successfully');document.location='allData.php'</script>";
 
//        }
//        catch(Exception $e){
//           return $e->getMessage();
//        }
//     }
 
 
//  }
