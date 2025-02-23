<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require 'vendor/autoload.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $PATH = htmlspecialchars($_POST["base_path"] ?? "");
        
        if ($PATH) {
            include_once $PATH . "/config.php";

            $name = htmlspecialchars($_POST["name_surname"]);
            $phone = htmlspecialchars($_POST["phone"]);
            $message = htmlspecialchars($_POST["input_text"]);

            if (empty($name) || empty($phone) || empty($message)) {
                echo "<p style='color:red;'>Lütfen tüm alanları doldurunuz.</p>";
                exit;
            }

            function getEmailBody($name, $phone, $message, $DOMAIN) {
                ob_start(); // Çıktıyı yakala
                $GLOBALS['name'] = $name;
                $GLOBALS['phone'] = $phone;
                $GLOBALS['message'] = $message;
                $GLOBALS['DOMAIN'] = $DOMAIN;
                include 'email_template.php'; // Template dosyasını içe aktar
                return ob_get_clean(); // Yakalanan çıktıyı döndür
            }

            // PHPMailer ile e-posta gönderme
            $mail = new PHPMailer(true);
            try {
                // SMTP Ayarları
                $mail->isSMTP();
                $mail->Host = $EMAIL_HOST;
                $mail->SMTPAuth = true;
                $mail->Username = $EMAIL_FROM;
                $mail->Password = $EMAIL_PASS;
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
                $mail->Port = 465;

                // E-posta Bilgileri
                $mail->setFrom($EMAIL_FROM, $EMAIL_NAME);
                $mail->addAddress($EMAIL_TO);

                // İçerik
                $mail->CharSet = 'UTF-8';
                $mail->Encoding = 'base64';
                $mail->isHTML(true);
                $mail->Subject = "Yeni İletişim Formu Mesajı";
                $mail->Body = getEmailBody($name, $phone, $message, $DOMAIN);

                $mail->send();
                echo "<p style='color:green;'>Mesajınız başarıyla gönderildi.</p>";

            } catch (Exception $e) {
                echo "<p style='color:red;'>Mesaj gönderilirken bir hata oluştu: {$mail->ErrorInfo}</p>";
            }
        } else {
            echo "<p style='color:red;'>Geçersiz istek.</p>";
        }
    } else {
        echo "<p style='color:red;'>Geçersiz istek.</p>";
    }
?>
