<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="form.css">
</head>
<style>
    .abc{
        text-align: center;
    }
</style>
<body>
    <?php
    include('smtp/PHPMailerAutoload.php');
    include('./src/connection.php');
    function smtp_mailer($to,$subject, $msg){
        $mail = new PHPMailer(); 
        $mail->IsSMTP(); 
        $mail->SMTPAuth = true; 
        $mail->SMTPSecure = 'tls'; 
        $mail->Host = "smtp.gmail.com";
        $mail->Port = 587; 
        $mail->IsHTML(true);
        $mail->CharSet = 'UTF-8';
        //$mail->SMTPDebug = 2; 
        $mail->Username = "sourabhdubey29112003@gmail.com";
        $mail->Password = "igff fmpt lcrh cqap";
        $mail->SetFrom("sourabhdubey29112003@gmail.com");
        $mail->Subject = $subject;
        $mail->Body =$msg;
        $mail->AddAddress($to);
        $mail->SMTPOptions=array('ssl'=>array(
            'verify_peer'=>false,
            'verify_peer_name'=>false,
            'allow_self_signed'=>false
        ));
        if(!$mail->Send()){
            echo $mail->ErrorInfo;
        }else{
            ?>
            <script>alert("sent");</script>
            <?php
        }
    }
    
if(isset($_POST['submit'])){
  $name = $_POST['name'];
  $email = $_POST['email'];
  $roll = $_POST['roll'];

  $query1 = "select cgpa from tamsik where roll = $roll";
  $cgpa = mysqli_query($connection, $query1);
  $num1 = mysqli_fetch_array($cgpa)[0];

  $query2 = "select university from tamsik where roll = $roll";
  $university = mysqli_query($connection, $query2);
  $num2= mysqli_fetch_array($university)[0];

  $query3 = "select maths from tamsik where roll = $roll";
  $maths = mysqli_query($connection, $query3);
  $num3= mysqli_fetch_array($maths)[0];

  $query4 = "select dsa from tamsik where roll = $roll";
  $dsa = mysqli_query($connection, $query4);
  $num4= mysqli_fetch_array($dsa)[0];

  $query5 = "select cyber from tamsik where roll = $roll";
  $cyber = mysqli_query($connection, $query5);
  $num5= mysqli_fetch_array($cyber)[0];

  $query6 = "select uhv from tamsik where roll = $roll";
  $uhv = mysqli_query($connection, $query6);
  $num6= mysqli_fetch_array($uhv)[0];

  $query7 = "select dstl from tamsik where roll = $roll";
  $dstl = mysqli_query($connection, $query7);
  $num7= mysqli_fetch_array($dstl)[0];

  $query8 = "select coa from tamsik where roll = $roll";
  $coa= mysqli_query($connection, $query8);
  $num8= mysqli_fetch_array($coa)[0];

//$mail -> addAttachment('SIH.pdf');

 echo smtp_mailer($email,'Subject',"Dear ".$name."<br> your roll no. is ".$roll."<br>UNIVERSITY name = ".$num2."<br>maths:".$num3."<br>data structure:".$num4."<br>cyber security:".$num5."<br>universal human values:".$num6."<br>discrete mathematics:".$num7."<br>computer organisation:".$num8."<br>your cgpa is".$num1." <br> (this is an auto generated email,so please do not reply back.)"); //recipient's email
};
     
    ?>
    <div class="wrapper">
        <div class="title">
          <h1>STUDENT RESULT PORTAL</h1>
        </div>
        <form action="" method="post">
        <div class="contact-form">
          <div class="input-fields">
            <input type="text" class="input" name="name" placeholder="Name">
            <input type="number" class="input" name="roll" placeholder="roll No.">
            <input type="date" class="input" name="dob" placeholder="D.O.B.">
            <input type="email" class="input" name="email" placeholder="email">
          </div>
          <div class="msg">
            <button name="submit" class="btn">Submit</button>
          </div>
        </div>
        </form>
      </div>
</body>
</html>