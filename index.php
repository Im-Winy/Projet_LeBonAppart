<?php
/* Appel du fichier init */
require './inc/init.inc.php';

/* Appel du HEADER */
require './inc/header.inc.php';
?>

<!-- MAIN -->
<main class="container">

    <!-- titre -->
    <h2>Accueil</h2>

    <!-- début de rangée -->
    <div class="row">
        <!-- affichage de mes différents articles -->
        <?php $requete = $pdoAppart->query("SELECT * FROM advert ORDER BY id_advert DESC LIMIT 15");
        while ($article = $requete->fetch(PDO::FETCH_ASSOC)) { ?>
            <!-- début de colonne -->
            <div class="col-md-4 mb-3">
                <!-- début de la carte -->
                <div class="card bg-light">
                    <!-- entête de la carte -->
                    <div class="card-title" style="height: 24rem;">
                        <!-- image -->
                        <img src="<?php echo $article["photo"]; ?>" class="rounded-top" style="height: 320px;" alt="">
                        <!-- titre -->
                        <h3 class="text-center fs-5"><?php echo substr(strtoupper($article["title"]), 0, 55); ?></h3>
                    </div>
                    <!-- fin de l'entête de la carte -->
                </div>
                <!-- fin de la carte -->
            </div>
            <!-- fin de colonne -->
        <?php } ?>
        <!-- fin de l'affichage de mes articles -->
    </div>
    <!-- fin de rangée -->
</main>
<!-- fin du MAIN -->

<?php
/* Appel du FOOTER */
require './inc/footer.inc.php';
?>