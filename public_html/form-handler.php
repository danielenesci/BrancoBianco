<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    // HONEYPOT
    if (!empty($_POST["website"])) {
        die("Spam rilevato.");
    }

    $nome = htmlspecialchars($_POST["nome"]);
    $email = htmlspecialchars($_POST["email"]);
    $messaggio = htmlspecialchars($_POST["messaggio"]);

    $to = "dani.nesci@hotmail.it";
    $subject = "Nuova richiesta dal sito White Pack";
    
    $body = "Nome: $nome\nEmail: $email\n\nMessaggio:\n$messaggio";
    $headers = "From: $email";

    $sent = mail($to, $subject, $body, $headers);
}
?>
<!DOCTYPE html>
<html lang="it">
<head>
<meta charset="UTF-8">
<title>Messaggio inviato</title>
<link rel="stylesheet" href="style.css">
</head>
<body>

<section class="section">
  <?php if ($sent): ?>
    <div class="contact-success">
      <h2>Messaggio inviato con successo</h2>
      <p>Grazie <strong><?php echo $nome; ?></strong>, ho ricevuto la tua richiesta.<br>
      Ti risponderò il prima possibile.</p>
      <a href="index.html" class="back-home">Torna alla Home</a>
    </div>
  <?php else: ?>
    <div class="contact-error">
      <h2>Si è verificato un errore</h2>
      <p>Il messaggio non è stato inviato. Riprova più tardi.</p>
      <a href="contatti.html" class="back-home">Torna ai Contatti</a>
    </div>
  <?php endif; ?>
</section>

</body>
</html>
