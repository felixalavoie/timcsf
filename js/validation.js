function initialiser() {
    var _this = this;
    console.log("initialiser");
    var link = "wp-content/themes/tim/json/objMessages.json";

    fetch(link)
        .then(function (response) {
        return response.json();
    })
        .then(function (response) {
        _this.objMessages = response;
        console.log("JSON reçu");
        initEcouteurs();
        console.log("Écouteurs init")
    })
        .catch(function (error) {
        console.log(error);
    });
}

function initEcouteurs() {
    $("#nom").on('blur', this.validerChamp.bind(this));
    $("#courriel").on('blur', this.validerChamp.bind(this));
    $("#destinataire").on('blur', this.validerChamp.bind(this));
    $("#sujet").on('blur', this.validerChamp.bind(this));
    $("#message").on('blur', this.validerChamp.bind(this));
}

function validerChamp(evenement) {
    console.log("dans validerChamp");
    var id = evenement.currentTarget.id;
    var refInput = $("#" + id);
    var refDiv = refInput.parent("div");
    var refChampMessage = refDiv.children(".messageErreur");
    var pattern = new RegExp(this.objMessages[id]["regexp"]);

    if (refInput.val() == "") {
        console.log("dans erreur vide");
        refDiv.addClass("champErreur");
        refChampMessage.text(this.objMessages[id]["vide"]);
    }
    else {
        if (pattern.test(refInput.val()) !== true) {
            console.log("dans erreur regexp");
            console.log(pattern);
            console.log(pattern.test(refInput.val()));
            refDiv.addClass("champErreur");
            refChampMessage.text(this.objMessages[id]["erreur"]);
        }
        else {
            console.log("dans champs valide");
            refDiv.removeClass("champErreur");
            refChampMessage.text("");
        }
    }
}


$(window).on("load", this.initialiser.bind(this));
//# sourceMappingURL=validationClient.js.map