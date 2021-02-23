<?php
require_once "config.php";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $email = $_POST['email_data'];
  $password = $_POST['password_data'];
  //echo ($password);

  $email = mysqli_real_escape_string($conn, $email);
  $password = mysqli_real_escape_string($conn, $password);


    $cleanEmail = filter_var($email,FILTER_SANITIZE_EMAIL);

    if ($email != $cleanEmail || filter_var($email,FILTER_VALIDATE_EMAIL)==false){
      $arr = array(
        'status'    => 'failed',
        'msg'     => 'Email sau parola gresita!',
        'where'   => '.pass-wrapper'
      );
      echo json_encode( $arr ); exit;
    }
    else {

        $sql = "select password from registration where email='{$email}'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) == 0) {

            $arr = array(
                'status'    => 'failed',
                'msg'     => 'Email sau parola gresita!',
                'where'   => '.pass-wrapper'
              );
        
            echo json_encode( $arr ); exit;
        }
        else {
            $row = mysqli_fetch_array($result);
            $pass = $row['password'];
            $hash = md5($password);
            if($pass == $hash) {
                echo json_encode("Valid");
            }
            else {
                $arr = array(
                    'status'    => 'failed',
                    'msg'     => 'Email sau parola gresita!',
                    'where'   => '.pass-wrapper'
                );

                echo json_encode( $arr ); exit;
            }
        }
    }

}
