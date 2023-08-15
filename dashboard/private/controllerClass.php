<?php

include("connection_db.php");
// include("class_loginConfig.php");

//setup connection db
class controllerClass
{
  private $id;
  private $username;
  private $name;
  private $email;
  private $company;
  private $requestfor;
  private $department;
  private $date_request;
  private $remarks;
  private $image;
  private $status;
  private $feedback;

  protected $con_Db;

  public function __construct(
    $id = 0,
    $username = "",
    $name = "",
    $email = "",
    $company = "",
    $requestfor = "",
    $department = "",
    $date_request = "",
    $remarks = "",
    $image = "",
    $status = "",
    $feedback = ""
  ) {
    $this->id = $id;
    $this->username = $username;
    $this->name = $name;
    $this->email = $email;
    $this->company = $company;
    $this->requestfor = $requestfor;
    $this->department = $department;
    $this->date_request = $date_request;
    $this->remarks = $remarks;
    $this->image = $image;
    $this->status = $status;
    $this->feedback = $feedback;
    $this->con_Db = new PDO(DB_TYPE . ":host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PWD, [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]);
    $this->con_Db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // $this->dbCnx = new PDO("mysql:host=localhost;dbname=registration;", "root", "");
  }
  public function setId($id)
  {
    $this->id = $id;
  }
  public function getId()
  {
    return $this->id;
  }
  public function setusername($username)
  {
    $this->username = $username;
  }
  public function getusername()
  {
    return $this->username;
  }
  public function setname($name)
  {
    $this->name = $name;
  }
  public function getname()
  {
    return $this->name;
  }
  public function setemail($email)
  {
    $this->email = $email;
  }
  public function getemail()
  {
    return $this->email;
  }
  public function setcompany($company)
  {
    $this->company = $company;
  }
  public function getcompany()
  {
    return $this->company;
  }
  public function setrequestfor($requestfor)
  {
    $this->requestfor = $requestfor;
  }
  public function getrequestfor()
  {
    return $this->requestfor;
  }
  public function setdepartment($department)
  {
    $this->department = $department;
  }
  public function getdepartment()
  {
    return $this->department;
  }
  public function setdate_request($date_request)
  {
    $this->date_request = $date_request;
  }
  public function getdate_request()
  {
    return $this->date_request;
  }
  public function setremarks($remarks)
  {
    $this->remarks = $remarks;
  }
  public function getremarks()
  {
    return $this->remarks;
  }
  public function setimage($image)
  {
    $this->image = $image;
  }
  public function getimage()
  {
    return $this->image;
  }
  public function setstatus($status)
  {
    $this->status = $status;
  }
  public function getstatus($status)
  {
    return ($status == 0) ? "Pending" : "Done";
  }
  public function setfeedback($feedback)
  {
    $this->feedback = $feedback;
  }
  public function getfeedback()
  {
    return $this->feedback;
  }

  public function insertData()
  { // Inserting Data Request Form.

    try {

      $stm = $this->con_Db->prepare("INSERT INTO tbl_request(username, name, email, company, requestfor, department, date_request, remarks, image, status, feedback) 
      values(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
      $stm->execute([
        $this->username, $this->name, $this->email, $this->company, $this->requestfor,
        $this->department, $this->date_request, $this->remarks, $this->image, $this->status, $this->feedback
      ]);
      //  echo "<script>alert('data saved successfully');document.location='../../index.php'</script>";
      //  }
    } catch (PDOException $ex) {
      return $ex->getMessage();
    }
  }

  public function RetrieveAllDone($status)
  {
    try {
      $stm = $this->con_Db->prepare("SELECT * FROM tbl_request WHERE status = ?");
      $stm->execute([$status]);
      return $stm->fetchAll();
    } catch (PDOException $ex) {
      return $ex->getMessage();
    }
  }


  public function RetrieveAllPending()
  {

    try {
      // $stm = $this->con_Db->prepare("SELECT *, DATE_FORMAT(date_request, '%m/%d/%Y') as date_request FROM tbl_request WHERE status=?");
      $stm = $this->con_Db->prepare("SELECT * FROM tbl_request WHERE status=?");
      $stm->execute([$this->status = 'Pending']);
      return $stm->fetchAll();
    } catch (PDOException $ex) {
      return $ex->getMessage();
    }
  }

  public function fetchAll()
  {

    try {
      $stm = $this->con_Db->prepare("SELECT * FROM tbl_request");
      $stm->execute();
      return $stm->fetchAll();
    } catch (PDOException $ex) {
      return $ex->getMessage();
    }
  }

  public function fetchOne()
  {

    try {
      $stm = $this->con_Db->prepare("SELECT * FROM tbl_request WHERE id=?");
      $stm->execute([$this->id]);
      return $stm->fetchAll();
    } catch (PDOException $ex) {
      return $ex->getMessage();
    }
  }

  public function update()
  {

    try {
      $stm = $this->con_Db->prepare("UPDATE tbl_request SET name=?, company=?, department=?, date_request=?, remarks=?, status=? WHERE id =?");
      $stm->execute([$this->name, $this->company, $this->department, $this->date_request, $this->remarks, $this->status, $this->id]);
    } catch (PDOException $ex) {
      return $ex->getMessage();
    }
  }

  public function delete()
  {

    try {
      $stm = $this->con_Db->prepare("DELETE FROM tbl_request WHERE id=?");
      $stm->execute([$this->id]);
      return $stm->fetchAll();
      echo "<script>alert('data deleted successfully');document.location='.php'</script>";
    } catch (PDOException $ex) {
      return $ex->getMessage();
    }
  }

  public function recordAllDone()
  {

    try {

      $stm = $this->con_Db->prepare("SELECT * FROM tbl_request WHERE status=?");
      $stm->execute([$this->status = '1']);
      $total = $stm->rowCount();
      return $total;
      // echo "<script>alert('data deleted successfully');document.location='.php'</script>";

    } catch (PDOException $ex) {
      return $ex->getMessage();
    }
  }

  public function recordAllPending()
  {

    try {

      $stm = $this->con_Db->prepare("SELECT * FROM tbl_request WHERE status=?");
      $stm->execute([$this->status = 'pending']);
      $total = $stm->rowCount();
      return $total;
      // echo "<script>alert('data deleted successfully');document.location='.php'</script>";

    } catch (PDOException $ex) {
      return $ex->getMessage();
    }
  }

  public function retrieveRequestToday()
  {

    try {

      $stm = $this->con_Db->prepare("SELECT id, date_request FROM tbl_request WHERE date_request >= CURDATE() - 1");
      $stm->execute([$this->id, $this->date_request]);
      $total = $stm->rowCount();
      return $total;
      // echo "<script>alert('data deleted successfully');document.location='.php'</script>";
    } catch (PDOException $ex) {
      return $ex->getMessage();
    }
  }
}

class logsController
{
  // private $id;
  private $username;
  private $action;
  protected $con_Db;


  public function __construct($username = "", $action = "")
  {
    // $this->id = $id;
    $this->username = $username;
    $this->action = $action;

    //setup connection db
    $this->con_Db = new PDO(DB_TYPE . ":host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PWD, [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]);
    $this->con_Db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

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


  public function RetrieveAllLogs($username)
  {

    try {
      $stm = $this->con_Db->prepare("SELECT * FROM tbl_logs WHERE username = :username");
      $stm->bindParam(':username', $username, PDO::PARAM_STR);
      $stm->execute();
      return $stm->fetchAll();
    } catch (PDOException $ex) {
      return $ex->getMessage();
    }
  }

  public function getNextAvailableID($tableName)
  {
    try {
      $sql = "SELECT MAX(id) AS max_id FROM $tableName";
      $stm = $this->con_Db->prepare($sql);
      $stm->execute();
      $row = $stm->fetch(PDO::FETCH_ASSOC);
      $max_id = $row['max_id'];

      // Increment the numeric part of the ID
      $next_numeric_id = intval($max_id) + 1;

      // Format the numeric part to have leading zeros
      $next_id = str_pad($next_numeric_id, 5, '0', STR_PAD_LEFT);

      return $next_id;
    } catch (PDOException $ex) {
      return $ex->getMessage();
    }
  }
}
