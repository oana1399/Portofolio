<?php

require_once "config.php";

function check($nr) {
    $result = substr($nr, 0, 2);
    if($result==="07")
      return true;
    else
      return false;
  }

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $data = $_REQUEST['data'];

    $email = mysqli_real_escape_string($conn, $data['txtEmail']);
    $fname = mysqli_real_escape_string($conn, $data['txtName']);

    $cleanEmail = filter_var($email,FILTER_SANITIZE_EMAIL);

    if ($email != $cleanEmail || filter_var($email,FILTER_VALIDATE_EMAIL)==false){
        $arr = array(
          'status'    => 'failed',
          'msg'     => 'Adresa de mail este invalida',
          'where'   => '.mail-wrapper'
        );
        echo json_encode( $arr ); exit;
    }
      if (preg_match('/[A-Za-z].*[0-9]|[0-9].*[A-Za-z]/', $fname) || preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $fname) || is_numeric($fname)) {
        $arr = array(
          'status'    => 'failed',
          'msg'     => 'Prenume invalid.',
          'where'   => '.name-wrapper'
        );
        echo json_encode($arr); exit;
      }
      if(is_numeric($data['txtPhone']) == false || strlen($data['txtPhone']) != 10 || check($data['txtPhone']) == false) {
        $arr = array(
          'status'    => 'failed',
          'msg'     => 'Numar invalid.',
          'where'   => '.phone-wrapper'
        );
        echo json_encode($arr); exit;
      }

      if (preg_match('/[A-Za-z].*[0-9]|[0-9].*[A-Za-z]/', $data['txtMsg']) || preg_match('/[\'^£$%&*()}{@#~><>|=_+¬-]/', $data['txtMsg']) || strlen($data['txtMsg']) > 250) {
          $arr = array(
            'status'    => 'failed',
            'msg'     => 'Caractere invalide sau depasirea de 250 de caractere.',
            'where'   => '.message-wrapper'
          );
          echo json_encode($arr); exit;
      }
      else {
          $sql = "select * from contactemails where email='{$email}'";
          $result = mysqli_query($conn, $sql);
          if (mysqli_num_rows($result) > 0) {
            echo json_encode( "Adresa de email existenta" ); exit;
          }
          else {
            $sql2 = "insert into contactemails (firstname, email) values ('{$fname}','{$email}')";
            $query = mysqli_query($conn, $sql2);
            if(!$query) {
              $arr = array(
                "status" => "failed",
                "msg" => "Failed to insert!",
                "where" => ".mail-wrapper"
              );
              echo json_encode( $arr ); exit;
            }
            else {
              echo json_encode( "Valid" ); exit;
            }
          }
      }

  }