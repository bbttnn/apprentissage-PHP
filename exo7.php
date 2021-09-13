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
   
    $alphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
    $alphabetArray =str_split($alphabet);
    $twiceAlphabet = array_merge($alphabetArray, $alphabetArray);
    $alphabetSize = count($alphabetArray);

    for($i=0; $i< $alphabetSize; $i++ ){
        for($f=0; $f < $alphabetSize; $f++){
          $line = $alphabetArray[$i];
          $column = $alphabetArray[$f];
          $vigenere[ $line][$column]= $twiceAlphabet[$i+$f];
              
        }

    }
    $message = "";
    $key = "";
    $messageArray = str_split($message);
    $keyArray = str_split($key);
    $keySize = count($keyArray);

    $encodedMessage = [];
    $keycounter = 0;
    foreach($messageArray as $cursor => $letterToencode) {
      $keyLetterPosition = $keycounter % $keySize;
      $keyletter = $keyArray[$keyLetterPosition];
      if($letterToencode != " ") {
          $encodedMessage[] = $vigenere[$letterToencode][$keyletter];
      }else {
        $encodedMessage = " ";
      }
      $keycounter ++;

    }
    $cryptedmessage = implode($encodedMessage);
    















    ?>
    
    "<form method="POST"></form>
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
      <select class="form-select border-secondary" name="Action à effectue" aria-label="Floating label select example">
        <option selected>Choisir une action</option>
        <option value="1">Encodage selon Vigenere</option>
        <option value="2">Décodage selon Vigenere</option>
      </select>
      <label for="Action à effectuer"></label>

      <a href = "./index.php" class="btn btn-primary mt-3" type="submit">Annuler</a>
      <input class="btn btn-primary mt-3" type="submit" value="Envoyer">
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
</body>

</html>