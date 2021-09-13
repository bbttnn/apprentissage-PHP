<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
  <title>Exercice 4</title>
</head>

<body>
  <?php include("./partial/_navbar.php"); ?>
  <div class="container">
    <h1>exo4</h1>
    <h1>Exercice 4</h1>
    <h5>1- créer une <a href="https://www.latoilescoute.net/table-de-vigenere" target="_blank">table de vigenère</a></h5>
    <?php

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

    ?>
    
    
    <h5>2- encode le message "APPRENDRE PHP EST UNE CHOSE FORMIDABLE" avec la clé "BACKEND"</h5>
    <?php
    
    $message = "APPRENDRE PHP EST UNE CHOSE FORMIDABLE";
    $key = "BACKEND";

    /* encode le msg*/

    $messageArray = str_split($message);
    $keyArray = str_split($key);
    $keySize = count($keyArray);

    $keycounter = 0;
    foreach($messageArray as $cursor => $letterToEncode) {
        $keyLetterPosition = $keycounter % $keySize;
        $letterKey = $keyArray[$keyLetterPosition];
        if($letterToEncode != " "){
            $encodedMessage[] = $vigenere[$letterToEncode][$letterKey];
        
        }else{

           $encodedMessage[] = " ";


        }
        $keycounter++;

    }


       $cryptedMessage = implode($encodedMessage);

    ?>

    <p>le message est: <?php echo $message; ?></p>
    <p>la clé est: <?php echo $key ?></p>
    
    
    <h5>3- decoder le message "TWA PEE WM TESLH WL LSLVNMRJ" avec la clé "VIGENERE"</h5>
    
    <?php

    /*decode msg*/

    $encodedMessage = "TWA PEE WM TESLH WL LSLVNMRJ";
    $key4decode = "VIGENERE";
    $encodedMessageArray = str_split($encodedMessage);
    $key4decodeArray = str_split($key4decode);
    $key4decodeSize = count($key4decodeArray);

    $keycounter = 0;
    foreach($encodedMessageArray as $cursor => $letterToDecode) {
        $keyLetterPosition = $keycounter % $key4decodeSize;
        $letterKey = $key4decodeArray[$keyLetterPosition];
        if ($letterToDecode != " ") {
            for($i = 0; $i < $alphabetSize; $i++){
                $lineToDecode = $alphabetArray[$i];
                if($vigenere[$lineToDecode][$letterKey] == $letterToDecode){
                    $decryptedMessage[] = $lineToDecode;
                }
            }
          
        } else {
            $decryptedMessage[] = " ";

      }

           
     

        $keycounter++;
    }
            $decodedMessage = implode($decryptedMessage);
   
   ?>

    
$decodedMessage = implode($decryptedMessage);
    <p>le message chiffré est: <?php echo $encodedMessage; ?></p>
    <p>la clé est: <?php echo $key4decode ?></p>
    <p>le résultat est: <?php echo $decodedMessage; ?></p>
  
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
</body>

</html>