function initialiser() {
    var _this = this;
    console.log("initialiser");
    $("#prenom").on('blur', this.validerPrenom.bind(this));
    $("#nom").on('blur', this.validerNom.bind(this));
    $("#courriel").on('blur', this.validerCourriel.bind(this));
    $("#telephone").on('blur', this.validerTelephone.bind(this));
    $("#motDePasse").on('blur', this.validerMotDePasse.bind(this));
    fetch("../ressources/liaisons/json/objMessages.json")
        .then(function (response) {
        return response.json();
    })
        .then(function (response) {
        _this.objMessages = response;
        // console.log("objJSON", this.objMessages);
        switch (document.querySelector('main').classList[0]) {
            case 'connexion':
                _this.initialiserClientConnexion();
                break;
            case 'creer':
                _this.initialiserClientCreer();
                break;
            case 'livraison':
                _this.initialiserLivraison();
                break;
            case 'facturation':
                _this.initialiserFacturation();
                break;
        }
    })
        .catch(function (error) {
        console.log(error);
    });
}
function validerPrenom() {
    var refPrenom = document.querySelector("#prenom");
    if (refPrenom.value == "") {
        refPrenom.classList.add("error");
        $("#erreurPrenom").text(this.objMessages.prenom.erreurs.vide);
    }
    else {
        if (!refPrenom.value.match(refPrenom.pattern)) {
            refPrenom.classList.add("error");
            $("#erreurPrenom").text(this.objMessages.prenom.erreurs.motif);
        }
        else {
            refPrenom.classList.remove("error");
            $("#erreurPrenom").text("");
        }
    }
}
function validerNom() {
    var refNom = document.querySelector("#nom");
    if (refNom.value == "") {
        refNom.classList.add("error");
        $("#erreurNom").text(this.objMessages.nom.erreurs.vide);
    }
    else {
        if (!refNom.value.match(refNom.pattern)) {
            refNom.classList.add("error");
            $("#erreurNom").text(this.objMessages.nom.erreurs.motif);
        }
        else {
            refNom.classList.remove("error");
            $("#erreurNom").text("");
        }
    }
}
function validerCourriel() {
    var refCourriel = document.querySelector('#courriel');
    if (refCourriel.value == "") {
        refCourriel.classList.add("error");
        $('#errorCourriel').text(this.objMessages.courriel.erreurs.vide);
    }
}
function validerTelephone() {
    var refTel = document.querySelector('#telephone');
    if (refTel.value == "") {
        refTel.classList.add("error");
        $('#errorTelephone').text(this.objMessages.telephone.erreurs.vide);
    }
    else {
        if (!refTel.value.match(refTel.pattern)) {
            refTel.classList.add("error");
            $('#errorTelephone').text(this.objMessages.telephone.erreurs.motif);
        }
        else {
            refTel.classList.remove("error");
            $('#errorTelephone').text("");
        }
    }
}
function validerMotDePasse() {
    var refMdp = document.querySelector('#motDePasse');
    if (refMdp.value == "") {
        refMdp.classList.add("error");
        $('#errorMotDePasse').text(this.objMessages.motDePasse.erreurs.vide);
    }
    else {
        if (!refMdp.value.match(refMdp.pattern)) {
            refMdp.classList.add("error");
            $('#errorMotDePasse').text(this.objMessages.motDePasse.erreurs.motif);
        }
        else {
            refMdp.classList.remove("error");
            $('#errorMotDePasse').text("");
        }
    }
}
$(window).on("load", this.initialiser.bind(this));
