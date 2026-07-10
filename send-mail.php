php

if ($_SERVER[REQUEST_METHOD] === POST) {

    $nome = htmlspecialchars($_POST[nome]);
    $email = htmlspecialchars($_POST[email]);
    $messaggio = htmlspecialchars($_POST[messaggio]);

    $to = dani.nesci@hotmail.it;
    $subject = Nuova richiesta dal sito White Pack;
    
    $body = Nome $nomenEmail $emailnnMessaggion$messaggio;
    $headers = From $email;

    $sent = mail($to, $subject, $body, $headers);
}

!DOCTYPE html
html lang=it
head
meta charset=UTF-8
titleMessaggio inviatotitle
link rel=stylesheet href=style.css
head
body

section class=section
  php if ($sent) 
    div class=contact-success
      h2Messaggio inviato con successoh2
      pGrazie strongphp echo $nome; strong, ho ricevuto la tua richiesta.br
      Ti risponderò il prima possibile.p
      a href=index.html class=back-homeTorna alla Homea
    div
  php else 
    div class=contact-error
      h2Si è verificato un erroreh2
      pIl messaggio non è stato inviato. Riprova più tardi.p
      a href=contatti.html class=back-homeTorna ai Contattia
    div
  php endif; 
section

body
html
