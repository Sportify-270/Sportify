<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Recherche - Sportify</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="Recherche.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<div class="wrapper">
    <header>
        <h1>Sportify : Planifiez, Progressez, Surprenez.</h1>
        <img src="Images/logo_sportify.webp" alt="Sportify Logo">
    </header>
    <nav>
        <ul>
            <li><a href="accueil.html">Accueil</a></li>
            <li><a href="Tout_Parcourir.html">Tout Parcourir</a></li>
            <li><a href="Recherche.html" class="active">Recherche</a></li>
            <li><a href="Rendez-vous.html">Rendez-vous</a></li>
            <li><a href="Votre_Compte.html">Votre Compte</a></li>
        </ul>
    </nav>
    <section class="content">
        <div class="search-container">
            <input type="text" id="search-box" name="search" placeholder="Barre de recherche">
            <button type="submit" id="search-button" onclick="submitSearch()">Rechercher</button>
        </div>
    </section>
    <section id="search-results">
        <!-- Les résultats de la recherche seront affichés ici -->
    </section>
    <footer>

    <div class="footer-container">

        <div class="footer-item">

            <h3>Mail</h3>
            
             <a href="mailto:Sportify@icloud.com">Sportify@icloud.com</a>


        </div>

        <div class="footer-item">

            <h3>Téléphone</h3>
            <a href="tel:+1234567890">+1 (234) 567-890</a>

        </div>

        <div class="footer-item">

            <h3>Adresse</h3>
        <a href="https://www.google.com/maps/search/?api=1&query=123+Rue+Exemple,+75001+Paris,+France">123 Rue Exemple, 75001 Paris, France</a>

        </div>

   <div class="footer-item">

            <h3>Maps</h3>

        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d5248.628943988052!2d2.3451403773295327!3d48.87128137133398!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e66fd32bf28833%3A0x6347a5b6a3fcab00!2seasyGym%20Paris%20Grands%20Boulevards!5e0!3m2!1sen!2sfr!4v1717113521959!5m2!1sen!2sfr" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>            
        </div>

    </div>
</footer>    
</div>
<script>
function submitSearch() {
    var searchTerm = document.getElementById('search-box').value;
    fetch('search_handler.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: 'search=' + encodeURIComponent(searchTerm)
    })
    .then(response => response.text())
    .then(html => document.getElementById('search-results').innerHTML = html)
    .catch(error => console.error('Error:', error));
}
</script>
</body>
</html>
