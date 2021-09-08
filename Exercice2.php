<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <title>newProject</title>
</head>

<body>


    <?php include("./partial/_navbar.php"); ?>
    <div class="container">
        <h1>Exercice2 php</h1>
        <h1>Exercice 2</h1>
        <h3>Décoder des messages</h3>
        <p>les messages à décoder</p>
        <?php
        $message1 = "0@sn9sirppa@#?ia'jgtvryko1";
        $message2 = "q8e?wsellecif@#?sel@#?setuotpazdsy0*b9+mw@x1vj";
        $message3 = "aopi?sgnirts@#?sedhtg+p9l!";
        ?>
        <ul>
            <li>message 1 : <?php echo $message1; ?></li>
            <li>message 2 : <?php echo $message2; ?></li>
            <li>message 3 : <?php echo $message3; ?></li>
        </ul>
        <p>comment proceder?</p>
        <ol>
            <li>Calculer la longueur de la chaîne et la diviser par 2, tu obtiendras ainsi le "chiffre-clé".</li>
            <li>Récupère ensuite la <a href="https://www.php.net/manual/fr/function.substr.php">sous-chaîne</a> de la longueur du chiffre-clé en commençant à partir du 6ème caractère.</li>
            <li>Remplace les chaînes '@#?' par un espace.</li>
            <li>Pour finir, inverse la chaîne de caractères.</li>
        </ol>
        <?php
        // TO DO

        $key = strlen($message1) / 2;
        $subString = substr($message1, 5, $key);
        $messageWithSpace = str_replace("@#?", " ", $subString);
        $decodedMessage1 = strrev($messageWithSpace);

        $key = strlen($message2) / 2;
        $subString = substr($message2, 5, $key);
        $messageWithSpace = str_replace("@#?", " ", $subString);
        $decodedMessage2 = strrev($messageWithSpace);

        $key = strlen($message3) / 2;
        $subString = substr($message3, 5, $key);
        $messageWithSpace = str_replace("@#?", " ", $subString);
        $decodedMessage3 = strrev($messageWithSpace);
        
        ?>
        <p>résultats:</p>
        <p>message1: <?php echo $decodedMessage1 ?><br>
            message2: <?php echo $decodedMessage2 ?><br>
            message3: <?php echo $decodedMessage3 ?><br>
        </p>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
</body>

</html>