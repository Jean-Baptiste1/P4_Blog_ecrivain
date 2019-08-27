<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <title>Un billet simple pour l'Alaska</title>
    <meta name="description" content="Blog de Jean Forteroche où il écrit les chapitres de son livre." />
    <!-- lien des ressource pour retrouver les icon de la page -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

    <!-- Appel de la feuille de style, de la police... -->
    <link rel="stylesheet" type="text/css" href="assets/css/stylesheet.css">

    <script src="assets/js/tinymce/tinymce.min.js" type="text/javascript"></script>
    <script type="text/javascript">
        tinymce.init({
            selector: 'textarea#backEnd',
            height: 500,
            menubar: false,
            plugins: [
                'advlist autolink lists link image charmap print preview anchor',
                'searchreplace visualblocks code fullscreen',
                'insertdatetime media table paste code help wordcount'
            ],
            toolbar: 'undo redo | formatselect | bold italic backcolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | help',
            content_css: [
                '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
                '//www.tiny.cloud/css/codepen.min.css'
            ]
        });
        </script>
    <script language='javascript'>
        function Supprimer()
        {
            if (confirm("Etes vous sûr ?"))
            {
                return true;
            }
        }
    </script>
</head>
<body>
<!-- Debut Header -->
<header>
    <!-- Le logo -->
    <div id="logoBlog">
        <a href="/">
            <img src="assets/images/logo.png" alt="Logo un billet simple pour l'Alaska">
        </a>
    </div>
    <!-- Menu -->
    <nav>
        <ul>
            <input id="nav">
            <li><a href="./">Accueil</a></li>
            <li><a href="./#chapitres">Chapitres</a></li>
            <li>
                <?php
                //Affiche un lien de déconnexion quand l'utilisateur est connécté
                if(isset($_SESSION['token'])){
                    echo '<a href="index.php?pages=backEnd">Administration</a><a href="index.php?pages=backEnd&page=deconnexion">Déconnexion</a>';
                } else {
                    echo '<a href="index.php?pages=backEnd">Administration</a>';
                }
                ?>
            </li>
        </ul>
    </nav>
</header>
<!-- Fin Header -->
<!-- Debut image -->
<section id="limage">
    <!-- La première slide -->
    <div class="image">
        <div class="imageHeader"></div>
        <div class="imageBody">
            <div class="textImage">
                <h1><span>Un billet simple pour l'Alaska</span></h1>
            </div>
        </div>
    </div>
</section>
<!-- Fin image -->
<?php
//Affiche le contenu du site
echo $content
?>
<!-- Debut Footer -->
<footer id="footer">
    <p>Site réalisé par Jean-Baptiste - DWJ OpenClassrooms 2019</p>
</footer>
<!-- Fin Footer-->
</body>
</html>