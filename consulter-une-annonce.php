<?php
/* Appel du fichier init */
require './inc/init.inc.php';

/* Appel du HEADER */
require './inc/header.inc.php';

/* réception des informations des articles par son id */
if (isset($_GET['id_advert'])) {
    $info = $pdoAppart->prepare("SELECT * FROM advert WHERE id_advert = :id_advert");
    $info->execute([
        ':id_advert' => $_GET['id_advert'],
    ]);
    if ($info->rowCount() == 0) {
        header('location:consulter-toutes-les-annonces.php');
        exit();
    }
    $article = $info->fetch(PDO::FETCH_ASSOC);
} else { // si pas d'id_advert dans l'url
    header('location:consulter-toutes-les-annonces.php');
    exit();
}

/* Traitement du formulaire de réservation */
if (!empty($_POST['reservation'])) {
    $requete = $pdoAppart->prepare("UPDATE advert SET reservation_message = :reservation_message WHERE id_advert = :id_advert");
    $requete->execute([
        ":reservation_message" => $_POST['reservation_message'],
        ":id_advert" => $_GET['id_advert'],
    ]);

    $message = "<p class=\"alert alert-success\">Votre annonce a été publiée</p>";
}
?>
<?php echo $message; ?>
<!-- MAIN -->
<main class="container">

    <!-- titre -->
    <h2 class="mb-3"></h2>

    <div class="card mb-3 bg-light">
        <!-- entête de la carte -->
        <div class="card-title">
            <!-- image -->
            <img src="<?php echo $article["photo"]; ?>" class="rounded-top" alt="">
            <!-- titre -->
            <h3 class="text-center"><?php echo strtoupper($article["title"]); ?></h3>
        </div>
        <!-- fin de l'entête de la carte -->
        <!-- contenu de la carte -->
        <div class="card-body">
            <!-- description -->
            <p><strong>Description: </strong><?php echo $article["description"]; ?></p>
            <!-- code postal -->
            <p><strong>Code postal: </strong><?php echo $article["postal_code"]; ?></p>
            <!-- ville -->
            <p><strong>Ville: </strong><?php echo $article["city"]; ?></p>
            <!-- type -->
            <p><strong>Type d'annonce: </strong><?php echo $article["type"]; ?></p>
            <!-- prix -->
            <p><strong>Prix: </strong><?php echo $article["price"]; ?> €</p>
            <!-- message -->
            <?php if (!empty($article["reservation_message"])) { ?>
                <p><strong>Message de réservation: </strong><?php echo $article["reservation_message"]; ?></p>
            <?php } ?>
        </div>
        <!-- fin du contenu de la carte -->
    </div>


    <?php
    if (empty($article['reservation_message'])) {  ?>
        <!-- formulaire de réservation -->
        <form action="#" method="post" class="form-control mb-3 bg-light">
            <label for="reservation_message" class="form-label fw-bold">Message de réservation</label>
            <textarea name="reservation_message" id="reservation_message" cols="30" rows="10" class="form-control"></textarea>
            <!-- bouton -->
            <input type="submit" value="Je réserve" class="btn btn-dark my-3" name="reservation">
        </form>
        <!-- fin du formulaire -->
    <?php
    }
    ?>

</main>
<!-- fin du MAIN -->

<?php
/* Appel du FOOTER */
require './inc/footer.inc.php';
?>