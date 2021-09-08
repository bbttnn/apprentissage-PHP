<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
  <title>Exercice 5</title>
</head>

<body>
  <?php include("./partial/_navbar.php"); ?>
  <div class="container ">
    <h1>Exercice 5</h1>


    <?php
    $message = ""; 
    $key = "";
    $encodedMessage = "";
    $errorMessage = "" ;

    if (!empty($_POST)) {
      if ($_POST["message"]) {
        $message = strip_tags($_POST["message"]);
      }
      if ($_POST["key"]) {
        $key = strip_tags($_POST["key"]);
      }
      if ($_POST["encodedMessage"]) {
        $encodedMessage = ($_POST["encodedMessage"]);
      }
      if (!$message &&  $key && !$encodedMessage) {
        $errorMessage = "undefined action";
      } elseif (!$key ) {
        $errorMessage = " enter the key";
      } elseif (($key && $encodedMessage && $message)) {
        $errorMessage = "too many infos ";
      }

      if (!$errorMessage) {
        /*create vigenere tab*/
        $alphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $alphabetArray = str_split($alphabet);
        $twiceArray = array_merge($alphabetArray, $alphabetArray);
        $alphabetSize = count($alphabetArray);

        for ($i = 0; $i < $alphabetSize; $i++) {
          for ($f = 0; $f < $alphabetSize; $f++) {
            $line = $alphabetArray[$i];
            $col = $alphabetArray[$f];
            $vigenere[$line][$col] = $twiceArray[$i + $f];
          }
          
        }
        /* end of tab*/

        if ($message && $key) {

          /* encode le msg*/
          $messageArray = str_split($message);
          $keyArray = str_split($key);
          $keySize = count($keyArray);
          $encodedMessage = [];

          $keycounter = 0;
          foreach ($messageArray as $cursor => $letterToEncode) {
            $keyLetterPosition = $keycounter % $keySize;
            $letterKey = $keyArray[$keyLetterPosition];
            if ($letterToEncode != " ") {
            $encodedMessage[] = $vigenere[$letterToEncode][$letterKey];
            } else {
              $encodedMessage[] = " ";
            }
            $keycounter++;
          }

          $encodedMessage = implode($encodedMessage);
        
        } elseif ($encodedMessage && $key) {
          /*decode msg*/
          $key4decode = $key;
          $encodedMessageArray = str_split($encodedMessage);
          $key4decodeArray = str_split($key4decode);
          $key4decodeSize = count($key4decodeArray);
          $decryptedMessage = [];

          $keycounter = 0;
          foreach ($encodedMessageArray as $cursor => $letterToDecode) {
            $keyLetterPosition = $keycounter % $key4decodeSize;
            $letterKey = $key4decodeArray[$keyLetterPosition];
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
          $message = implode($decryptedMessage);
        }
      }
    }
    ?>


    <h2>Système d'encodage et de décodage de VIGENERE</h2>
    <h5>Vous pouvez entrer un message et une clé ou la clé et le message à décoder</h5>

    <?php if($errorMessage) : ?>
          <div class="alert alert-dismissible alert-danger">
             <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
             <h4 class="alert-heading">Attention !</h4>
             <p class="mb-0"><?php echo $errorMessage; ?></p>
          </div>
    <?php endif ?>



    <form method="POST" class="column g-3 " >
      <div class="col-md-4">
        <label for="message" class="form-label border">message</label>
        <input type="text" class="form-control border-3" name="message" value="<?php echo $message;?>">
      </div>
      <div class="col-md-4 ">
        <label for="key" class="form-label border">key</label>
        <input type="text" class="form-control border-3" name="key" value="<?php echo $key;?>">
      </div>
      <div class="col-md-4 mb-3  ">
        <label for="encodedMessage" class="form-label border">Code</label>
        <input type="text" class="form-control border-3" name="encodedMessage" value="<?php echo $encodedMessage; ?>">
      </div>
      <a href="/exo5.php" class="btn btn-primary" >Annuler</a>
      <button class="btn btn-primary " type="submit">Vigeneriser</button>
    </form>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
</body>

</html>