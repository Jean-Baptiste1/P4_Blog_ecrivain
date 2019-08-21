<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <title>Un billet simple pour l'Alaska</title>
    <link href="" rel="stylesheet" />
    <script src="/assets/js/tinymce/tinymce.min.js" type="text/javascript"></script>
    <script type="text/javascript">
        tinymce.init({
            selector: 'textarea',
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
</head>
<body>
<!-- Debut Header -->
Un billet simple pour l'Alaska
<!-- Fin Header -->
<?php
//Affiche un lien de déconnexion quand l'utilisateur est connécté
if(isset($_SESSION['token'])){
echo '<a href="index.php?pages=backEnd&page=deconnexion">Déconnexion</a>';
}
//Affiche le contenu du site
echo $content
?>
<!-- Debut Footer -->
<!-- Fin Footer-->
</body>
</html>

