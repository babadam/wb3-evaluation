// alert("Hi");

(function(){
    window.addEventListener("load", function(){

        // je cible mes éléments
        var msg = document.getElementById("msg");
        var formulaire = document.getElementById("needs-validation");
        var select = document.getElementsByClassName("selection");

        // je pose mon écouteur d'évènement sur l'envoi du formulaire
        formulaire.addEventListener("submit", function(event){
            if(formulaire.checkValidity() == false){
                event.preventDefault();
                event.stopPropagation();
                //j'ajoute la class .error pour mon message
                msg.classList.add("error");
                //j'injecte mon message
                var pbFormulaire = document.getElementsByClassName("error");
                var msgInfo = "Vous devez renseigner les champs surlignés en rouge !";
                pbFormulaire[0].innerText = msgInfo;
            }
            formulaire.classList.add("was-validated");
            if(formulaire.checkValidity() === true){
                event.preventDefault();
                event.stopPropagation();

                //j'injecte le message de réussite
                msg.classList.add("valid");
                var formulaireOk = document.getElementsByClassName("valid");
                var msgInfo = "Votre formulaire a bien été envoyé";
                formulaireOk[0].innerText = msgInfo;
            }
        }, false);
    }, false);
}());
