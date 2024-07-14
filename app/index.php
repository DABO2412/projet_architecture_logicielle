<?php
            require_once("classes/autoload.php");
            $categorieDao = new CategorieDAO();
            $articleDao = new ArticleDAO();
            $list_categorie = $categorieDao->list();
            $list_article = $articleDao->list();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/index.css">
    <title>ESP Article</title>
</head>
<body>
    <div>
    <h1>ESP information</h1>
    <nav>
        <ul>
           <?php
                foreach ($list_categorie as $key) {
                    echo "<li><a href='#' class='categorie " .$key->getId()."'>".$key->getLibelle()."</a></li>";
                }
           ?>
        </ul>
    </nav>
    </div>
    
    <?php
        foreach($list_article as $key) {
            echo "
            <div class='article ".$key->getCategorie()."'>
                <h2 class='titreArticle'>".$key->getTitre()."</h2>
                <p class='contenuArticle'>".$key->getContenu()."</p>
                <p class='dateCreationArticle'>".$key->getDateCreation()."</p>
                <p class='dateModificationArticle'>".$key->getdDateModification()."</p> 
            </div>";
        }

    ?>

<script>
        

    function masquerArticles() {
        var articles = document.querySelectorAll('.article');
        articles.forEach(function(article) {
            article.style.display = 'none';
        });
    }

    // Fonction pour afficher les articles de la catégorie spécifiée
    function afficherArticles(categorie) {
        var articles = document.querySelectorAll('.article');
        articles.forEach(function(article) {
            if (article.classList.contains(categorie)) {
                article.style.display = 'block';
            }
        });
    }

    // Fonction d'initialisation
    function initialiserMenuDynamique() {
        var categories = document.querySelectorAll('.categorie');
        categories.forEach(function(categorie) {
            categorie.addEventListener('click', function() {
                // Masquer tous les articles avant d'afficher ceux de la nouvelle catégorie
                masquerArticles();
                // Récupérer la classe de la catégorie cliquée
                var categorieClasse = categorie.classList[1];
                console.log(categorieClasse)
                // Afficher les articles correspondants
                afficherArticles(categorieClasse);
            });
        });
    }

    // Appel de la fonction d'initialisation une fois que le DOM est prêt
    document.addEventListener('DOMContentLoaded', function() {
        masquerArticles();
        afficherArticles(1)
        initialiserMenuDynamique();
    });

</script>
</body>
</html>