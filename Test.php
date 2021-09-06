<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <title>Page de test</title>
</head>

<body>
    <?php include("./partial/_navbar.php"); ?>
    <div class="container">
        <h1>Page de tests</h1>
        <p>tests php</p>

        <pre>
            resultats php 
        =============================================================

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
        
        <?php

        $message = "APPRENDRE PHP EST UNE CHOSE FORMIDABLE";
        $key = "BACKEND";

        $messageArray = str_split($message);
        $keyArray = str_split($key);
        $keySize = count($keyArray);

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

        $cryptedMessage = implode($encodedMessage);
        ?>
    

        <?php
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
        var_dump($decodedMessage)
        ?>






        </pre>



    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
</body>

</html>