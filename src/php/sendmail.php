<?php
     use PHPMailer\PHPMailer\PHPMailer;
     use PHPMailer\PHPMailer\Exception;

     require 'phpmailer/src/Exception.php';
     require 'phpmailer/src/PHPMailer.php';
     

     $mail = new PHPMailer(true);
     $mail->CharSet = 'UTF-8';
     $mail->setLanguage('ru', '../../phpmailer/language/');
     $mail->IsHTML(true);

     $mail->setFrom('vladddd.vz@gmail.com', 'hiking is life');
     $mail->addAddress('vladddd.vz@gmail.com');
     $mail->Subject = 'Заявка, Hiking is Life';

     $equipment = "Все своё";
     if($_POST['equipment'] == "rent") {
          $equipment = "Возьму в аренду";
     }
     $tent = "палатка / место в палатке";
     $sleeping_bag = "спальник";
     $bag = "рюкзак";
     $trekking_poles = "треккинговые палки";
     $carimate = "каримат / пенка";
     $other = "иное";


     $body = '<h1>h</h1>';
     if(trim(!empty($_POST['hike']))) {
          $body.='<p><strong>Маршрут:</strong> '.$_POST['hike'].'</p>';
     }
     if(trim(!empty($_POST['date']))) {
          $body.='<p><strong>Дата маршрута:</strong> '.$_POST['date'].'</p>';
     }
     if(trim(!empty($_POST['name']))) {
          $body.='<p><strong>Имя:</strong> '.$_POST['name'].'</p>';
     }
     if(trim(!empty($_POST['surname']))) {
          $body.='<p><strong>Фамилия:</strong> '.$_POST['surname'].'</p>';
     }
     if(trim(!empty($_POST['mail']))) {
          $body.='<p><strong>Электронная почта:</strong> '.$_POST['mail'].'</p>';
     }
     if(trim(!empty($_POST['phone']))) {
          $body.='<p><strong>Телефон:</strong> '.$_POST['phone'].'</p>';
     }
     if(trim(!empty($_POST['birthday']))) {
          $body.='<p><strong>Дата рождения:</strong> '.$_POST['birthday'].'</p>';
     }
     if(trim(!empty($_POST['countries']))) {
          $body.='<p><strong>Страна:</strong> '.$_POST['countries'].'</p>';
     }
     if(trim(!empty($_POST['country']))) {
          $body.='<p><strong>Страна:</strong> '.$_POST['country'].'</p>';
     }
     if(trim(!empty($_POST['experience']))) {
          $body.='<p><strong>Опыт походов:</strong> '.$_POST['experience'].'</p>';
     }
     if(trim(!empty($_POST['restrictions']))) {
          $body.='<p><strong>Заболевания и ограничения в питании:</strong> '.$_POST['restrictions'].'</p>';
     }
     if(trim(!empty($_POST['equipment']))) {
          $body.='<p><strong>Наличие снаряжения:</strong>'.$equipment.'</p>';
          if($_POST['equipment'] == "rent") {
               if(trim(!empty($_POST['tent']))) {
                    $body.='<p>'.$tent.'</p>';
               }
               if(trim(!empty($_POST['sleeping-bag']))) {
                    $body.='<p>'.$sleeping_bag.'</p>';
               }
               if(trim(!empty($_POST['bag']))) {
                    $body.='<p>'.$bag.'</p>';
               }
               if(trim(!empty($_POST['trekking-poles']))) {
                    $body.='<p>'.$trekking_poles.'</p>';
               }
               if(trim(!empty($_POST['carimate']))) {
                    $body.='<p>'.$carimate.'</p>';
               }
               if(trim(!empty($_POST['other']))) {
                    $body.='<p>'.$other.'<p>:</p></p>';
                    if(trim(!empty($_POST['equipmentOther']))) {
                         $body.='<p>'.$_POST['equipmentOther'].'</p>';
                    }
               }
          }
     }

     $mail->Body = $body;
     if(!$mail->send()) {
          $message = 'Ошибка';
     }
     else {
          $message = 'Данные отправлены!';
     }

     $response = ['message' => $message];
     header('Content-type: application/json');
     echo json_encode($response);
?>