<!DOCTYPE html>
<html>
<head>
    <title>Réponse à votre ticket</title>
</head>
<body>
    <h1>Réponse à votre ticket : {{ $ticket->subject }}</h1>
    <p><strong>Message que vous avez envoyé :</strong></p>
    <p>{{ $ticket->message }}</p>
    
    <p><strong>Réponse de l'administration :</strong></p>
    <p>{{ $ticket->response }}</p>

    <p>Merci de nous avoir contacté !</p>
</body>
</html>
