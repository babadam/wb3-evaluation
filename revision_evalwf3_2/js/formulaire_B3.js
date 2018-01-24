// alert('test');
$(".btnsubmit").on("click", function(){
    /*je cible mon bouton .btnsubmit
    puis je pose mon écouteur d'évènement .on sur le "click"
    et ensuite je code ma fonction*/
    var nom = $("#oblignom").val();
    /*je stocke dans ma variable nom la valeur de l'élément HTML qui a l'ID #oblignom*/
    var message = $('#msg');
    if(nom === ""){ // si le nom est vide / pas remplit
        /* /!\ on manipule des classes de Bootstrap ici : je vais rajouter la classe .has-error de Bootstrap3 à la div ayant la classe form-group la plus proche parente de l'élément #oblignom => résultat si le champ n'est pas rempli son cadre devient rouge*/
        $("#oblignom").closest('div.form-group').addClass("has-error");
        /*je rajoute ensuite la class prévue dans mon css .error sur la div#msg*/
        message.addClass('error');
        /*je stocke dans une variable le message d'erreur que je veux afficher*/
        var pasDeNom = $(".error"); /*ici je cible une classe et comme en JS par défaut il renvoie l'information dans un tableau [0, 1, 2, ...]*/
        var msgPasDeNom = "Vous n'avez pas renseigné votre nom !";
        pasDeNom[0].innerHTML = msgPasDeNom;
    } /*fin du if de vérification du nom*/

    /*si le formulaire est rempli sur tous les champs que je rend obligatoires alors je remplace le formulaire par un message de réussite*/
    var prenom = $('#obligprenom').val();
    var adresse = $('#obligadresse').val();
    var cp = $('#obligcp').val();
    var telephone = $('#telephone').val();
    var selection = $('.selection').val();/*PAYS*/
    if (nom !== "" && prenom !== "" && adresse !== "" && cp !== "" && telephone !== "" && selection !== "Pays") {
        var formulaireOk = $("form");
        formulaireOk.addClass('valid');
        var msgOk = "Votre formulaire est validé ;-) !";
        formulaireOk[0].innerHTML = msgOk;
    }
});
