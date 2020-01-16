
<?php
// use phpmailer\phpmailer\phpmailer;
// require_once "phpmailer/PHPMailer.php";
// require_once "phpmailer/Exception.php";

// //include_once 'administration/inc/config.php';

// $number1 = mt_rand(1, 20);
// $number2 = mt_rand(1, 20);
// if (isset($_POST['submit'])) {
//     $msg = '';
//     // $email = mysqli_real_escape_string($db,$_POST['email']);
//     // $name = mysqli_real_escape_string($db,$_POST['name']);
//     // $message = mysqli_real_escape_string($db,$_POST['message']);
//     // $phone = mysqli_real_escape_string($db,$_POST['phone']);
//     // $captcha = mysqli_real_escape_string($db,$_POST['captcha_sum']);
//     // $captcha_num1 = mysqli_real_escape_string($db,$_POST['captcha_num1']);
//     // $captcha_num2 = mysqli_real_escape_string($db,$_POST['captcha_num2']);

//     $email = $_POST['email'];
//     $name = $_POST['name'];
//     $message = $_POST['message'];
//     $phone = $_POST['phone'];
//     $captcha = $_POST['captcha_sum'];
//     $captcha_num1 = $_POST['captcha_num1'];
//     $captcha_num2 = $_POST['captcha_num2'];

//     if(!empty($name) || !empty($email) || !empty($message) || !empty($phone)) {
//       if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
//           if (($captcha_num1 + $captcha_num2) == $captcha) {
//             if (isset($_POST['policy'])) {
//               // Send email
//               $mail = new phpmailer();
//               $mail->CharSet = 'UTF-8';
//               $mail->addAddress('maksimhristov.1990@gmail.com', 'Portfolio');
//               $mail->setFrom($email, $name, $phone);
//               $mail->Subject = "Portfolio: Запитване";
//               $mail->isHTML(true);
//               $mail->Body = $message;
//               if($mail->send()) {
//                   $msg = "Моля проверете пощата си!";
//               }else {
//                   $msg = "Възниква проблем, опитайте по късно.";
//               }
//             }else {
//               $msg = "Трябва да се съгласите с общите условия!";
//             }
//           }else {
//             $msg = "Моля въведете captcha";
//           }
//       }else {
//         $msg = "Невалиден email!";
//       }
//   }else {
//     $msg = "Полетата са задължителни!";
//   }
// }
//mysqli_close($db);
?>


<!-- <div class="alert alert-success m-0" role="alert">
    Thank you for contacting us. We will be in touch with you very soon.
</div> -->

<ul class="breadcrumb bg-transparent  d-none">
    <li><a href="#" class="text-warning">Home<i class="fas fa-angle-right"></i></a></li>
    <li id="section-name">Contacts</li>
</ul>

<section class="lets_do_it h-100">
        <div class="half_scr_img varna"></div>
        <div class="section_content section_content_ld">
            <h2 class="heading-ld align-center">Свържете се с мен</h2>
            <p class="descr-ld mb-5">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>
            <p class="intro">Варна</p>
            <h2 class="heading">Максим Христов</h2>
            <p class="descr">Телефон: 0894 894 475 <br> email: maxim.1990@abv.bg</p>
        </div>
</section>

<section class="container my-5 py-5">
    
    <div class="section_heading container">
        <h2>Свържете се с мен</h2>
    </div>
    <span>Message:<?php if (isset($msg)) { echo $msg; } ?></span>
    <form class="p-4 shadow bg-gray rounded" method="POST">
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="name">Име</label>
                <input type="text" class="form-control" name="name" id="name" placeholder="Име" required>
                <!-- <span class="help-block"><?php echo $name_err; ?></span> -->
            </div>
            <div class="form-group col-md-6">
                <label for="phone">Телефон</label>
                <input type="text" class="form-control" name="phone" id="phone" placeholder="Телефон" required>
                <!-- <span class="help-block"><?php echo $phone_err; ?></span> -->
            </div>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="text" class="form-control" name="email" id="email" placeholder="Email" required>
        </div>
        <input type="checkbox" name="policy">Съгласен съм<a id="privacy-policy-link" href=""></a>
          <div class="captcha"  data-aos="fade-right" data-aos-easing="linear" data-aos-duration="1000">
            <span><?php echo $number1 . ' + ' . $number2 . ' = '; ?> <input type="text" size="2" name="captcha_sum"> </span>
            <input type="hidden" name="captcha_num1" value="<?php echo $number1; ?>">
            <input type="hidden" name="captcha_num2" value="<?php echo $number2; ?>">
          </div>
        <div class="form-group">
            <label for="message">Съобщение</label>
            <textarea class="form-control" name="message" id="message" placeholder="Съобщение..." rows="3" required></textarea>
        </div>
        <button type="submit" class="btn buts p-0 m-0 text-left">Изпрати</button>
    </form>
</section>
