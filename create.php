<?php
require_once("config.php");




if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les valeurs soumises par le formulaire
    $nom = htmlspecialchars($_POST['nom']);
    $prenom = htmlspecialchars($_POST['prenom']);
    $id_trancheAge = htmlspecialchars($_POST['trancheAge']);
    $sexe = htmlspecialchars($_POST['sexe']);
    $situationMatrimoniale = htmlspecialchars($_POST['situationMatrimoniale']);
    $id_statut = htmlspecialchars($_POST['statut']);
    $id_quartier = htmlspecialchars($_POST['quartier']);

    if ($nom != "" && $prenom != "" && $id_trancheAge != "" && $sexe != "" && $situationMatrimoniale != "" && $id_statut != "" && $id_quartier != "") {
        if ($membre->validateNom($nom) && $membre->validatePrenom($prenom)) {
            $membre->create($nom, $prenom, $id_trancheAge, $sexe, $situationMatrimoniale, $id_statut, $id_quartier);
        } else {

            echo "Veuillez revoir les champs nom ou prenom.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enrôlement d'un membre</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <h1>
            Enrôlement des membres de la commune de Patte d’Oie (PHP - POO - MySQL)
        </h1>

        <form action="" method="POST">
            <label for="nom">Nom :</label>
            <input type="text" id="nom" name="nom" required><br><br>

            <label for="prenom">Prénom :</label>
            <input type="text" id="prenom" name="prenom" required><br><br>

            <label for="trancheAge">Tranche d'âge :</label>
            <select name="trancheAge" id="trancheAge" required>
                <option value="">Choisis ta tranche d'âge</option>
                <?php foreach ($ages as $age) : ?>
                    <option value="<?php echo $age->id; ?>"><?php echo $age->tranche; ?></option>
                <?php endforeach; ?>
            </select><br><br>

            <label for="sexe">Sexe :</label>
            <select id="sexe" name="sexe">
                <option value="M">Masculin</option>
                <option value="F">Féminin</option>
            </select><br><br>

            <label for="situationMatrimoniale">Situation matrimoniale :</label>
            <select id="situationMatrimoniale" name="situationMatrimoniale">
                <option value="Célibataire">Célibataire</option>
                <option value="Marié(e)">Marié(e)</option>
                <option value="Divorcé(e)">Divorcé(e)</option>
                <option value="Veuf/Veuve">Veuf/Veuve</option>
            </select><br><br>

            <label for="statut">Statut</label>
            <select name="statut" id="statut" required>
                <option value="">Choisis un statut</option>
                <?php foreach ($statuts as $statut) : ?>
                    <option value="<?php echo $statut->id; ?>"><?php echo $statut->libelle; ?></option>
                <?php endforeach; ?>
            </select><br><br>

            <label for="quartier">Quartier</label>
            <select name="quartier" id="quartier" required>
                <option value="">Choisis un quartier</option>
                <?php foreach ($quartiers as $quartier) : ?>
                    <option value="<?php echo $quartier->id; ?>"><?php echo $quartier->libelle_q; ?></option>
                <?php endforeach; ?>
            </select><br><br>

            <div class="confirm">
                <button type="submit">Enregistrer</button>
                <button type="cancel"><a href="index.php"> Annuler</a></button>
            </div>
        </form>
    </div>
</body>

</html>