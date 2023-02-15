<?php
class Database
{
  var $conn;
  function __construct()
  {
    $this->conn = mysqli_connect("localhost", "root", "", "v0rt3x");
  }
  //To Insert- Update - delete 
  function RunDML($statment)
  {
    if (!mysqli_query($this->conn, $statment)) {
      return  mysqli_error($this->conn);
    } else
      return "ok";
  }
  //to search
  function GetData($select)
  {
    $result = mysqli_query($this->conn, $select);
    return $result;
  }
}
?>
