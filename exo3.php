<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
  <title>exo3</title>
</head>

<body>
  <?php include("./partial/_navbar.php"); ?>
  <div class="container">
    <h1>exo3</h1>
    <h1>Exercice 3</h1>
    
    <?php
    $tab1 = ["moteur", "carotte", "haricot", "pomme de terre", "usine", "salade", "navet", "marteau"];
    ?>
    <p>voici les éléments du tableau de base:
    <ul>
      <li><?php echo $tab1[0]; ?></li>
      <li><?php echo $tab1[1]; ?></li>
      <li><?php echo $tab1[2]; ?></li>
      <li><?php echo $tab1[3]; ?></li>
      <li><?php echo $tab1[4]; ?></li>
      <li><?php echo $tab1[5]; ?></li>
      <li><?php echo $tab1[6]; ?></li>
      <li><?php echo $tab1[7]; ?></li>
    </ul>
    </p>
    <h3>Premier exercice:</h3>
    <p>retirer les 3 intrus: et afficher les valeurs</p>
    <p>résultat:
      <?php
      $tab1 = ["moteur", "carotte", "haricot", "pomme de terre", "usine", "salade", "navet", "marteau"];

      $element = "moteur";
      unset($tab1[array_search($element, $tab1)]);


      $element = "usine";
      unset($tab1[array_search($element, $tab1)]);

      $element = "marteau";
      unset($tab1[array_search($element,

      ?>
    </p>

    <ul>
      <li><?php echo $tab1[1]; ?></li>
      <li><?php echo $tab1[2]; ?></li>
      <li><?php echo $tab1[3]; ?></li>
      <li><?php echo $tab1[5]; ?></li>
      <li><?php echo $tab1[6]; ?></li>

    </ul>
    </p>
    <h3>Second exercice:</h3>
    <p>transformaer la chaîne de caractère "bleu, vert, noir, rouge, jaune" en un tableau</p>


    <p>ajouter en première position du tableau</p>


    <?php
    $tab = array("bleu", "vert", "noir", "rouge", "jaune");
    array_unshift($tab, "violet");


    ?>


    <ul>
      <li><?php echo $tab[0];
          ?></li>
      <li><?php echo $tab[1];
          ?></li>
      <li><?php echo $tab[2];
          ?></li>
      <li><?php echo $tab[3];
          ?></li>
      <li><?php echo $tab[4];
          ?></li>
      <li><?php echo $tab[5];
          ?></li>
 
    <p>ajouter en première position du tableau la valeur "violet"</p>
    <p>résultat:

      <?php
      $tab = array("bleu", "vert", "noir", "rouge", "jaune");
      array_unshift($tab, "violet");
      var_dump($tab);
      ?>

   
      <?php
      $tab = array("bleu", "vert", "noir", "rouge", "jaune");
      array_unshift($tab, "violet");

      ?>



   

  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
</body>

</html>