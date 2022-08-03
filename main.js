


var data = [
    {
        image: "picture_memory",
        titre: "site Memory",
        Type: "travail collectif",
        Discription: "Premier projet collectif,qui contient la liste des stagière et un jeu memory",
        Version: ["#", "#", "#", "https://benmalem-yasmina.e-osengo.fr/memory"]
    },
    {
        image: "picture_game_dice",
        titre: "Jeu game_dice",
        Type: "travail personnel",
        Discription: "Premier projet personnel,c'est un jeu de dès entre deux joueur qui jètte leurs dès et celui qui tombe sur un dès superieur remporte la partie",
        Version: ["#", "#", "#", "https://benmalem-yasmina.e-osengo.fr/game_dice"]
    },
    {
        image: "picture_carte",
        titre: "jeu de carte",
        Type: "travail personnel",
        Discription: "la première verion consite a généré 52 carte en utilisant le HTML et le CSS,en suite on a généré les 52 cartes avec le Javascript,et actuelemnt on est on train de dévolopper un jeu de cartes",
        Version: ["https://benmalem-yasmina.e-osengo.fr/carte_g_par_HTML", "https://benmalem-yasmina.e-osengo.fr/carte_g_par_JS", "https://benmalem-yasmina.e-osengo.fr/jeu_cartes_actuel", "#"]
    },
    {
        image: "picture_jadoo",
        titre: "Site_ jadoo",
        Type: "travail personnel",
        Discription: "Realistaion de l'exercice proposé par la le site 'Vos-compétences'",
        Version: ["#", "#", "#", "https://benmalem-yasmina.e-osengo.fr/site_jadoo"]
    },
    {
        image: "picture_sondage",
        titre: "site de sondage",
        Type: "Projet collectif",
        Discription: "C'est un site qui permet de réaliser des sondages et des éléctions",
        Version: ["#", "#", "#", "https://silva-sebastien.e-osengo.fr/common/sondage/auth/"]
    },
    {
        image: "picture_affiche",
        titre: "creation d'affiche",
        Type: "travail collectif",
        Discription: "reproduire une affiche d'un film en utilisant le HTML et le CSS",
        Version: ["#", "#", "#", "https://silva-sebastien.e-osengo.fr/reprod_imageHUB/reprod_image_v1"]
    },
    {
        image: "picture_stagiere",
        titre: "Tableau Stagière",
        Type: "travail collectif",
        Discription: "Realisation d'une afficheresponsive que regroupe tous les stagières de la formation",
        Version: ["#", "#", "#", "https://begoud-camille.e-osengo.fr/eleves/"]
    },

]

var template_projet = `
<div class="style_bloc">
<div class="%image%">

</div>
<div class="bloc_milieu">
    <h2 class="style_titre">%titre%<span>%type%</span></h2>

    <p>%discription%</p>
</div>
<div class="evolution_projet">
    <h2>Versions</h2>
    <ul>
        <li class="verion"><a href="" target="_blank">verion1</a></li>
        <li class="verion"><a href="" target="_blank">verion2</a></li>
        <li class="verion"><a href="" target="_blank">verion3</a></li>
        <a class="site_finale" href="https://benmalem-yasmina.e-osengo.fr/memory"
            target="_blank">Version_finale</a>
    </ul>
    </div>
</div>`

function genrer_projet() {
    data.forEach(projet => {
        var divcard = document.createElement("div")
        document.getElementById("projet").appendChild(divcard);
        var html = template_projet
            .replaceAll("%titre%", projet.titre)
            .replaceAll("%type%", projet.Type)
            .replaceAll("%image%", projet.image)
            .replaceAll("%discription%", projet.Discription)

        divcard.outerHTML = html;
    })



}