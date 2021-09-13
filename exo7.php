<?php
require("./script/cryptage.php");
if (!empty($_POST)) {
  if ($_POST["message"]) {
    $message = strip_tags($_POST["message"]);
  }
  if ($_POST["key"]) {
    $key = strip_tags($_POST["key"]);
  }
  if ($_POST["Action"]) {
    $Action = strip_tags($_POST["Action"]);
  }
  
  if ($message && $key) {
    switch ($Action) {
      case "vigenereEncrypt":
        $result = vigenereEncode($message, $key);
        break;
      case "vigenereDecrypt":
        $result = vigenereDecode($message, $key);
        break;
      default:
        $result = "make a choice";
    }
  }else{
    $result = "$message  $key";
  }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
  <title>exo7</title>
</head>

<body>
  <?php include("./partial/_navbar.php"); ?>
  <div class="container">
    <h1>Exercice 7</h1>

    <?php

    function getVigenereAlphabet(): array
    {
      $alphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
      $alphabetArray = str_split($alphabet);
      return  $alphabetArray;
    }

    function VigenereAlphabetSize(): int
    {
      $alphabetArray = getVigenereAlphabet();
      $size = count($alphabetArray);
      return $size;
    }

    function generateVigenereArray(): array
    {
      /* Generate vigenere array*/
      $alphabetArray = getVigenereAlphabet();
      $twiceAlphabet = array_merge($alphabetArray, $alphabetArray);
      $alphabetSize = count($alphabetArray);

      for ($i = 0; $i < $alphabetSize; $i++) {
        for ($f = 0; $f < $alphabetSize; $f++) {
          $line = $alphabetArray[$i];
          $column = $alphabetArray[$f];
          $vigenere[$line][$column] = $twiceAlphabet[$i + $f];
        }
      }

      return $vigenere;
    };

    function vigenereEncode(string $message, string $key): string
    {
      $vigenere = generateVigenereArray();
      /*message crypting */
      /*$message = "BONJOUR LA TERRE";
      $key = "ALADIN";*/
      $messageArray = str_split($message);
      $keyArray = str_split($key);
      $keySize = count($keyArray);

      $encodedMessage = [];
      $keyCounter = 0;
      foreach ($messageArray as $cursor => $letterToencode) {
        $keyLetterPosition = $keyCounter % $keySize;
        $letterKey = $keyArray[$keyLetterPosition];
        if ($letterToencode != " ") {
          $encodedMessage[] = $vigenere[$letterToencode][$letterKey];
        } else {
          $encodedMessage[] = " ";
        }
        $keyCounter++;
      }
      $cryptedmessage = implode($encodedMessage);
      return $cryptedmessage;
    }

    function vigenereDecode(string $encodedMessage, string $key): string
    {
      $vigenere = generateVigenereArray();
      $alphabetSize =  VigenereAlphabetSize();
      $alphabetArray = getVigenereAlphabet();
      /*message decrypting*/
      $encodedMessageArray = str_split($encodedMessage);
      $keyArray = str_split($key);
      $keySize = count($keyArray);

      $decryptedMessage = [];
      $keycounter = 0;
      foreach ($encodedMessageArray as $cursor => $letterToDecode) {
        $keyLetterPosition = $keycounter % $keySize;
        $letterKey = $keyArray[$keyLetterPosition];
        if ($letterToDecode != " ") {
          for ($i = 0; $i < $alphabetSize; $i++) {
            $lineToDecode = $alphabetArray[$i];
            if ($vigenere[$lineToDecode][$letterKey] == $letterToDecode) {
              $decryptedMessage[] = $lineToDecode;
            }
          }
        } else {
          $decryptedMessage[] = " ";
        }
        $keycounter++;
      }
      $decodedMessage = implode($decryptedMessage);

      return $decodedMessage;
    }





    ?>


    <form method="POST">
      <div class="form-floating mb-2 mt-2">
        <p>le message</p>
        <textarea class="form-control border-secondary" placeholder="Leave a comment here" name="message"></textarea>
        <label for="message"></label>
      </div>
      <div class="form-floating mb-2">
        <p>La clef</p>
        <textarea class="form-control border-secondary" placeholder="Leave a comment here" name="key"></textarea>
        <label for="key"></label>
      </div>
      <div class="form-floating mb-3">
        <p>Action à effectuer</p>
        <select class="form-select border-secondary" name="Action" aria-label="Floating label select example">
          <option value="no value " selected>Choisir une action</option>
          <option value="vigenereEncrypt">Encodage selon Vigenere</option>
          <option value="vigenereDecrypt">Décodage selon Vigenere</option>
        </select>
        <label for="Action"></label>

        <a href="./exo7.php" class="btn btn-primary mt-3" type="submit">Annuler</a>
        <input class="btn btn-primary mt-3" type="submit" value="Envoyer">
      </div>
  </div>
  </form>
  <div class="container">
    <?php if ($result) : ?>
      <p>le message: <?php echo $message; ?><br>
        la clef: <?php echo $key; ?><br>
        le resultat : <?php echo $result; ?></p>
    <?php endif ?>
  </div>








  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
</body>

</html>