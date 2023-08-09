<?php

include("connection_db.php");
include("class_loginConfig.php");

//setup connection db
class registerConfig{
    private $id;
    private $username;
    private $email;
    private $password;
    private $role;
    private $image;
    protected $con_Db;
 
 public function __construct($id=0, $username="", $email="", $password="", $role="", $image=""){
    $this->id=$id;
    $this->username=$username;
    $this->email=$email;
    $this->password=$password;
    $this->role=$role;
    $this->image=$image;
    $this->con_Db = new PDO(DB_TYPE.":host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PWD,[PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_ASSOC]);
 
    // $this->dbCnx = new PDO("mysql:host=localhost;dbname=registration;", "root", "");
 }
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
    public function setemail($email){
       $this->email=$email;
    }
    public function getemail(){
       return $this->email;
    }
    public function setpassword($password){
    $this->password=$password;
    }
    public function getpassword(){
    return $this->password;
    }
    public function setrole($role){
      $this->role=$role;
    }
    public function setimage($image){
    $this->image=$image;
    }
    public function getimage(){
    return $this->image;
    }
 
    public function insertData(){ // Inserting Data Register.
       try {
       $stm = $this->con_Db->prepare("INSERT INTO tbl_users(email, username, password, role, image) values(?, ?, ?, ?, ?)");
       $stm->execute([$this->email,$this->username,md5($this->password),$this->role,$this->image]);
      //  echo "<script>alert('data saved successfully');document.location='../../index.php'</script>";
         $login = new loginConfig();
         $login->setemail($_POST['email']);    
         $login->setpassword($_POST['password']);
         $success = $login->login();

       }catch(Exception $e){
       return $e->getMessage();
       }
 
    }
    public function checkUser($email){
       try{
          $stm = $this->con_Db->prepare("SELECT * FROM tbl_users WHERE email='$email'");
          $stm->execute();
          if($stm->fetchColumn()){
            return true;

          }else{
            return false;
          }
       }
       catch(Exception $e){
          return $e->getMessage();
       }
    }
 }
   
   // public function checkUserPass($username){
   //    try{
   //       $stm = $this->con_Db->prepare("SELECT * FROM tbl_users WHERE username='$username'");
   //       $stm->execute();
   //       if($stm->fetchColumn()){
   //         return true;

   //       }else{
   //         return false;
   //       }
   //    }
   //    catch(Exception $e){
   //       return $e->getMessage();
   //    }
   // }


 
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




?>