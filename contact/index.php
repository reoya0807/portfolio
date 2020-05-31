<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Portfolio - Yagi Reoya - Contact</title>
    <link rel="stylesheet" href="../stylesheet.css">
  </head>
  <body>
    <header>
      <div class="header-logo">Portfolio - Yagi Reoya</div>
      <div class="header-right">
        <a href="/">Home</a>
        <a href="../biography">Biography</a>
        <a href="../contact/">Contact</a>
      </div>
    </header>

<?php
if ( empty($_POST["name"]) ) {
?>

<div class="contact-contents">
  <h2>メールフォーム</h2>
  <div class="form-content">
    <form action="../contact/" method="post" onSubmit="return checkSubmit()">
      <p>お名前: </p>
      <input class="in-box" type="text" name="name" placeholder="未入力" required>
      <p>メールアドレス: </p>
      <input class="in-box" type="email" name="email" placeholder="未入力" required>
      <p>件名: </p>
      <input class="in-box" type="text" name="subject" value="無題">
      <p>本文: </p>
      <textarea class="in-box" name="content" rows="8" cols="80" value="未入力"></textarea>
      <input class="sent-box" type="submit" name="submit" value="メール送信">
    </form>

<script type="text/javascript">
function checkSubmit() {
return confirm("送信してよろしいですか？");
}
</script>

  </div>
</div>

<?php } else {
  mb_language("Ja");
  mb_internal_encoding("UTF-8");

  $mailto = $_POST["email"];
  $mailfrom = "From: Yagi Reoya <noreply@reoya.sakura.ne.jp>";
  $auto_reply_subject = "Yagi Reoyaご連絡受付メール";

  $auto_reply_text = $_POST["name"]."様\n\n";

  $auto_reply_text .= "ご連絡ありがとうございます。\n";
  $auto_reply_text .= "メール内容は下記の通りです。\n\n";

  $auto_reply_text .= "件名: \n".$_POST["subject"]."\n";
  $auto_reply_text .= "本文: \n".$_POST["content"]."\n\n";

  $auto_reply_text .= "※このメールは送信専用メールアドレスから送信しています。\n";
  $auto_reply_text .= "　返信には対応できませんので、ご了承ください。\n\n";

  $auto_reply_text .= "------------------------\n";
  $auto_reply_text .= "東京工業大学大学院 物質理工学院 材料系材料コース\n";
  $auto_reply_text .= "八木 伶於也\n";
  $auto_reply_text .= "Web: https://reoya.sakura.ne.jp/";

  mb_send_mail($mailto, $auto_reply_subject, $auto_reply_text, $mailfrom);

  $auto_reply_text .= "\n\n送信者のメールアドレス: \n".$mailto;
  mb_send_mail("reoya0807@reoya.sakura.ne.jp", $_POST["subject"], $auto_reply_text, $mailfrom);
?>

<div class="send-contents">
  <p>メールが送信されました。</p>
</div>

<?php } ?>

    <footer>
      <div class="footer-logo">Copyright &copy; 2020 Yagi Reoya.</div>
    </footer>
  </body>
</html>
