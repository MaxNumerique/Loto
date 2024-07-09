<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://matcha.mizu.sh/matcha.css">
    <title>Document</title>
</head>



<body>
    <!-- Créer un script qui remplit un tableau de 1 à 49-->
<?php
$tab = array();
for ($i = 1; $i <= 49; $i++) {
    $tab[] = $i;
}
?>

<!-- On affiche les valeurs dans un tableau où les valeurs sont en ligne -->
<h2 style= "margin-top: 60px; text-align: center;">Les données :</h2>
<table>
    <tr>
        <?php
        foreach ($tab as $value) {
            echo "<td> {$value} </td>";
        }
        ?>
    </tr>
</table>

<!--A l'aide d'une boucle for, créer un tableau de 5 nombres entiers aléatoires compris entre 1 et 49 (les valeurs de mon tableau $tab)-->
<?php
// $tirage = array_rand($tab, 5);
// $tirage = array_map(function ($i) use ($tab) {
//     return $tab[$i];
// }, $tirage);

$tirage = array();
for ($i = 0; $i < 5; $i++) {
    $tirage[] = $tab[rand(0, 48)];
}
?>

<!-- On va afficher le tirage dans un autre tableau -->
<h2 style= "margin-top: 60px; text-align: center;">Le tirage :</h2>
<table>
    <tr>
        <?php
        foreach ($tirage as $value) {
            echo "<td> {$value} </td>";
        }
        ?>
    </tr>
</table>

<!-- On va afficher le tirage avec un while -->
<h2 style= "margin-top: 60px; text-align: center;">Le tirage avec un while :</h2>
<table>
    <tr>
        <?php
        $i = 0;
        while ($i < 5) {
            echo "<td> {$tirage[$i]} </td>";
            $i++;
        }
        ?>
    </tr>
</table>

<!-- On crée une fonction "tirage" qui renvoie un tableau rempli (5 numéros sélection)-->
<?php
function tirage($tab) {
    $tirage = array();
    for ($i = 0; $i < 5; $i++) {
        $tirage[] = $tab[rand(0, 48)];
    }
    return $tirage;
}
$tab = array();
for ($i = 1; $i <= 49; $i++) {
    $tab[] = $i;
}
?>

<!-- On crée et affiche 10 tirages de 5 numéros aléatoires en utilisant la fonction tirage() en créant un tableau à 2 dimensions et mettre les 10 tirages en ordre croissant les uns à la suite des autres -->
<?php
$nombreTirage = 5000;
?>

<h2 style="margin-top: 60px; text-align: center;"> <?= $nombreTirage ?>  essais :</h2>
<table>
    <tr>
        <?php
        
        $tab = array();
        for ($i = 1; $i <= 49; $i++) {
            $tab[] = $i;
        }
        $tirages = array();
        for ($i = 0; $i < $nombreTirage; $i++) {
            $tirage = tirage($tab);
            sort($tirage);
            $tirages[] = $tirage;
        }
        foreach ($tirages as $value) {
            echo "<td> " . implode(" ", $value) . " </td>";
        }
        ?>
    </tr>
</table>


<!-- Afficher les statistiques des numéros les plus sortis -->
<h2 style="margin-top: 60px; text-align: center;"> Concaténation des numéros sortis lors des tirages :</h2>

<!-- On concatene le résultat des tirages dans un tableau à une dimension -->
<?php
$numeros = [];
foreach ($tirages as $tirage) {
    $numeros = array_merge($numeros, $tirage);
}
sort($numeros);
?> 

<table>
    <tr>
        <?php
        foreach ($numeros as $value) {
            echo "<td> {$value} </td>";
        }
        ?>
    </tr>
</table>


<!-- On va compter le nombre d'occurence de chaque numeros -->
<h2 style="margin-top: 60px; text-align: center;"> Statistiques des numeros sortis :</h2>

<table>
    <tr>
        <th>Nombre</th>
        <th>Nombre d'occurrence</th>
    </tr>
    <?php
    $countValues = array_count_values($numeros);
    arsort($countValues);

    foreach ($countValues as $numero => $count) {
        echo "<tr>";
        echo "<td>{$numero}</td>";
        echo "<td>{$count}</td>";
        echo "</tr>";
    }
    ?>
</table>

<!-- On définit et affiche une combinaison gagnate pour le tableau -->
<h2 style="margin-top: 60px; text-align: center;"> Combinaison gagnante :</h2>

<table>
    <tr>
        <?php
        $combinaisonGagnante = [];
        for ($i = 0; $i < 5; $i++) {
            $combinaisonGagnante[] = $tab[rand(0, 48)];
        }
        sort($combinaisonGagnante);
        foreach ($combinaisonGagnante as $value) {
            echo "<td> {$value} </td>";
        }
        ?>
    </tr>
</table>

<!-- On compare avec chacune des combinaisons contenues dans le tableau $tirages si c'est une combinaison gagnante -->
<h2 style="margin-top: 60px; text-align: center;"> Avez-vous gagné ?</h2>


<?php
$resultat = "Vous avez Perdu";
foreach ($tirages as $tirage) {
    // var_dump($tirage);
    // var_dump($combinaisonGagnante);
    if ($tirage == array_values($combinaisonGagnante)) {
        $resultat = "Vous avez Gagné";
        break;
    }
}
echo "<h2 style=\"margin-top: 60px; text-align: center;\"> {$resultat} </h2>";
?>

</body>
</html>