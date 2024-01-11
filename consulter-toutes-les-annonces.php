<?php
/* Appel du fichier init */
require './inc/init.inc.php';

/* Appel du HEADER */
require './inc/header.inc.php';
?>

<!-- MAIN -->
<main class="container">

    <!-- titre -->
    <h2 class="mb-3">Consulter une annonce</h2>

    <!-- début de rangée -->
    <div class="row">
        <!-- affichage de mes différents articles -->
        <?php $requete = $pdoAppart->query("SELECT * FROM advert ORDER BY id_advert DESC");
        while ($article = $requete->fetch(PDO::FETCH_ASSOC)) { ?>
            <!-- début de colonne -->
            <div class="col-md-2 mb-3">
                <!-- début de la carte -->
                <div class="card bg-light">
                    <!-- entête de la carte -->
                    <div class="card-title" style="height: 12rem;">
                        <!-- image -->
                        <img src="<?php echo $article["photo"]; ?>" class="rounded-top" style="height: 145px;" alt="">
                        <!-- titre -->
                        <h3 class="text-center lh-1 fs-6"><?php echo substr(strtoupper($article["title"]), 0, 55); ?></h3>
                    </div>
                    <!-- fin de l'entête de la carte -->
                    <hr class="m-0">
                    <!-- contenu de la carte -->
                    <div class="card-body">
                        <!-- bouton -->
                        <a href="consulter-une-annonce.php?id_advert=<?php echo "$article[id_advert]"; ?>" class="btn btn-dark w-100">consulter une annonce</a>
                        <!-- statut -->
                        <?php
                        if (!empty($article["reservation_message"])) { ?>
                            <div class="bg-danger rounded my-3">
                                <p class="text-light text-center">réservé</p>
                            </div>
                        <?php
                        } else { ?>
                            <div class="bg-success rounded my-3">
                                <p class="text-light text-center">disponible</p>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                    <!-- fin du contenu de la carte -->
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