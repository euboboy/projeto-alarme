<?php 
/*
     *  change state of alam and create file for executable C 
     *  @author  SGV
     *  @version 20210420   1.0   initial release
     *  @param   <bool> $stateOfAlarm (change state of alarm)
     *  @return <bool>  (true==yes he managed to create the file, false == failed to create the file)
     *                 
     */

require 'alarmController.php';
$AlarmWk = new AlarmController();
if (isset($_POST['aceitarLigar'])) {
       $stateOfAlarm = true;
    }
    if (isset($_POST['cancelarLigar'])) {
        $stateOfAlarm = false;
    }
    if (isset($_POST['aceitarDesligar'])) {
        $stateOfAlarm = false;
    }
    if (isset($_POST['cancelarDesligar'])) {
        $stateOfAlarm = true;
    }

    $messageToUser = '';
    $title = '';
    $message = '';
     $saveStateOfAlarm = '';
    if ($stateOfAlarm != false) {
      $saveStateOfAlarm = '/xampp/htdocs/newTcc/ligado.txt';
      if (file_exists("../desligado.txt")){ 
      if (unlink('/xampp/htdocs/newTcc/desligado.txt')) {
        $title = 'change state of alarm';
        $message = 'failed to delete the folder "desligado" for the new alarm status';
        $AlarmWk->sendErrorMessage($title, $message);
      }
    }
      file_put_contents($saveStateOfAlarm, '');
      header("Location:../views/main/main.php");
    } else {
      $saveStateOfAlarm = '/xampp/htdocs/newTcc/desligado.txt';
      if (file_exists("../ligado.txt")){ 
      if (unlink('/xampp/htdocs/newTcc/ligado.txt')) {
        $title = 'change state of alarm';
        $message = 'failed to delete the folder "ligado" for the new alarm status';
        $AlarmWk->sendErrorMessage($title, $message);
        header("Location:../views/main/main.php");
      }
    }
      file_put_contents($saveStateOfAlarm, '');
      $messageToUser = 'alarme desligado';

    
    }
//   }