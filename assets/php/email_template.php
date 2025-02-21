<?php 
    if (!isset($DOMAIN)) $DOMAIN = "https://sevalsirakaya.trinsyca.com";
    if (!isset($name)) $name = "Ömer İslamoğlu";
    if (!isset($phone)) $phone = "0555 555 55 55";
    if (!isset($message)) $message = "Deneme Mesajı\nDeneme\nDeneme2";
?>
<html>
<head>
    <title>Yeni İletişim Formu Mesajı | Seval Sırakaya Güzellik Salonu ve Saç Salonu</title>
</head>
<body style="color: #222; font-family: 'Quicksand', sans-serif; margin:0; padding:0;">

    <div class="messageBox" style="padding: 10px;">
        <h1 style="color: #222; user-select: none;">Seval Sırakaya Güzellik Salonu ve Saç Salonu</h1>
        <p><strong><a href="<?php echo $DOMAIN; ?>" target="_blank" style="color:#7C5CFF; text-decoration:none;"><?php echo $DOMAIN; ?></a></strong></p>
        <br><br>
        <p style="color: #222; font-size:1.3rem; margin:1rem 0;"><strong>Adı Soyadı:</strong> <span style="user-select:all;"><?php echo $name; ?></span></p>
        <p style="color: #222; font-size:1.3rem; margin:1rem 0;"><strong>Telefon:</strong> <span style="user-select:all;"><?php echo $phone; ?></span></p>
        <p style="color: #222; font-size:1.3rem; margin:1rem 0;"><strong>Mesaj:</strong><br><?php echo nl2br($message); ?></p>
    </div>

    <p class="trinsyca" style="color: #222; font-weight:bold; text-align:center; margin-top:10rem;">
        Bu mesaj <a href="https://trinsyca.com" target="_blank" style="background-color: #333; text-decoration:none; padding:8px 12px; border-radius:12px; box-shadow: 0 0 10px rgba(0,0,0,0.9); color: #C79F55; margin: 0 5px;">TrinsyCa</a> sayesinde gönderilmiştir.
    </p>

</body>
</html>
