<?php
require_once "config.php";

if(isset($_POST['nickname'])) {
    $nickname=$_POST['nickname'];
    if (preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $nickname) || strlen($nickname) < 4) {
        $arr = array(
          'status'    => 'failed',
          'msg'     => 'Nickname invalid.',
        );
        $nick = false;
        echo json_encode($arr); exit;
    }
    else {
        $sql = "select * from registration where nickname='{$nickname}'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
          $arr = array(
            "status" => "failed",
            "msg" => "Nickname deja existent!",
          );
          $nick = false;
          echo json_encode( $arr ); exit;
        }
        else {
          echo json_encode( "valid" );
        }
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['data'])) {
    $data = $_REQUEST['data'];

    $fname = mysqli_real_escape_string($conn, $data['fname']);
    $lname = mysqli_real_escape_string($conn, $data['lname']);
    $nickname = mysqli_real_escape_string($conn, $data['nname']);
    $email = mysqli_real_escape_string($conn, $data['email']);
    $password = mysqli_real_escape_string($conn, $data['password']);

    if (preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $nickname) || strlen($nickname) < 4) {
        $arr = array(
          'status'    => 'failed',
          'msg'     => 'Nickname invalid.',
        );
        $nick = false;
        echo json_encode($arr); exit;
    }
    else {
        $sql = "select * from registration where nickname='{$nickname}'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
          $arr = array(
            "status" => "failed",
            "msg" => "Nickname deja existent!",
          );
          $nick = false;
          echo json_encode( $arr ); exit;
        }
    }

      $cleanEmail = filter_var($email,FILTER_SANITIZE_EMAIL);

      if ($email != $cleanEmail || filter_var($email,FILTER_VALIDATE_EMAIL)==false){
        $arr = array(
          'status'    => 'failed',
          'msg'     => 'Invalid email',
        );
        echo json_encode( $arr ); exit;
      }

      if (preg_match('/[A-Za-z].*[0-9]|[0-9].*[A-Za-z]/', $fname) || preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $fname) || is_numeric($fname) || empty($fname)==true) {
        $arr = array(
          'status'    => 'failed',
          'msg'     => 'Invalid first name',
        );
        echo json_encode($arr); exit;
      }
      if (preg_match('/[A-Za-z].*[0-9]|[0-9].*[A-Za-z]/', $lname) || preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $lname) || is_numeric($lname) || empty($lname)==true) {
        $arr = array(
          'status'    => 'failed',
          'msg'     => 'Invalid last name',
        );
        echo json_encode($arr); exit;
      }
      if(!empty($password) && ($password == $data['cpassword'])) {
          if (strlen($password) <= '8') {
              $arr = array(
                  'status'    => 'failed',
                  'msg'     => 'Your Password Must Contain At Least 8 Characters!',
                );
                echo json_encode($arr); exit;
          }
          if(!preg_match("#[0-9]+#",$password)) {
              $arr = array(
                  'status'    => 'failed',
                  'msg'     => 'Your Password Must Contain At Least 1 Number!',
                );
                echo json_encode($arr); exit;
          }
          if(!preg_match("#[A-Z]+#",$password)) {
              $arr = array(
                  'status'    => 'failed',
                  'msg'     => 'Your Password Must Contain At Least 1 Capital Letter!',
                );
                echo json_encode($arr); exit;
          }
          if(!preg_match("#[a-z]+#",$password)) {
              $arr = array(
                  'status'    => 'failed',
                  'msg'     => 'Your Password Must Contain At Least 1 Lowercase Letter!',
                );
                echo json_encode($arr); exit;
          }
      }
      if(empty($password)) {
          $arr = array(
              'status'    => 'failed',
              'msg'     => "Please enter password",
            );
            echo json_encode($arr); exit;
      }
      if($password != $data['cpassword']) {
           $arr = array(
              'status'    => 'failed',
              'msg'     => "Passwords don't match",
            );
            echo json_encode($arr); exit;
      }
      else {
          //valid
          $sql = "select * from registration where email='{$email}'";
          $result = mysqli_query($conn, $sql);
          if (mysqli_num_rows($result) > 0) {
            $arr = array(
              "status" => "failed",
              "msg" => "This email already exists!",
            );
            echo json_encode( $arr ); exit;
          }
          else {

            $hash = md5($password);

            $sql2 = "insert into registration (firstname, lastname, nickname, email, password) values ('{$fname}','{$lname}','{$nickname}','{$email}','{$hash}')";
            $query = mysqli_query($conn,$sql2);
            if(!$query) {
              $arr = array(
                "status" => "failed",
                "msg" => "Failed to insert!",
              );
              echo json_encode( $arr ); exit;
            }
            else {
              echo json_encode( "Valid2" ); exit;
            }
          }

      }
  }
