<?php
/* Appel du fichier init */
require './inc/init.inc.php';

/* Appel du HEADER */
require './inc/header.inc.php';

/* Traitement du formulaire */
if (!empty($_POST["ajout"])) {
    $requete = $pdoAppart->prepare("INSERT INTO advert (photo, title, description, postal_code, city, type, price) VALUES (:photo, :title, :description, :postal_code, :city, :type, :price)");
    $requete->execute([
        ":photo" => $_POST["photo"],
        ":title" => $_POST["title"],
        ":description" => $_POST["description"],
        ":postal_code" => $_POST["postal_code"],
        ":city" => $_POST["city"],
        ":type" => $_POST["type"],
        ":price" => $_POST["price"],
    ]);

    $message = "<p class=\"alert alert-success\">Votre annonce a été publiée</p>";

    if ($requete->rowCount() == 0) {
        header('location:index.php');
    }
}
?>
<?php echo $message; ?>
<!-- MAIN -->
<main class="container">

    <!-- Titre -->
    <h2 class="mb-3">Ajouter une annonce</h2>

    <form action="#" method="post" class="form-control bg-light">

        <div class="mb-3">
            <label for="photo" class="form-label fw-bold">Photo</label>
            <input type="text" name="photo" placeholder="Insérez le lien d'une image" id="photo" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="title" class="form-label fw-bold">Titre de l'annonce</label>
            <input type="text" name="title" id="title" placeholder="Indiquez le titre de l'annonce" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label fw-bold">Description de l'annonce</label>
            <input type="text" name="description" id="description" placeholder="Inscrivez une description" class="form-control">
        </div>

        <div class="mb-3">
            <label for="postal_code" class="form-label fw-bold">Code postal</label>
            <input type="number" name="postal_code" id="postal_code" placeholder="Indiquez le code postal" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="city" class="form-label fw-bold">Ville</label>
            <input type="text" name="city" id="city" placeholder="Veuilliez situer la ville" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="type" class="form-label fw-bold">Type d'annonce</label>
            <select name="type" id="type" class="form-select form-select-md">
                <option selected>- Selectionnez une option -</option>
                <option value="achat">Achat</option>
                <option value="location">Location</option>
            </select>

        </div>

        <div class="mb-3">
            <label for="price" class="form-label fw-bold">Prix</label>
            <input type="number" name="price" id="price" placeholder="Indiquez le prix" class="form-control" required>
        </div>

        <input type="submit" name="ajout" value="Ajouter l'annonce" class="btn btn-dark">

    </form>


</main>
<!-- fin du MAIN -->

<?php
/* Appel du FOOTER */
require './inc/footer.inc.php'; ?>