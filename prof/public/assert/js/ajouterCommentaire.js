document.getElementById("ajouterCommentaire-form").addEventListener("submit", function (e) {
    e.preventDefault();

    var data = new FormData(this);

    var xhr = new XMLHttpRequest();

    xhr.onreadystatechange = function () {
        if (this.readyState != 4) {
            document.getElementById("envoyer").style.pointerEvents = "none";
            document.getElementById("envoyer").value = "Loading...";


        }
        if (this.readyState == 4 && this.status == 200) {

            document.getElementById("envoyer").style.pointerEvents = "auto";
            document.getElementById("envoyer").value = "Envoyerer";
            

            if (this.response) {
              
                if (this.response.commentaireVide) {

                    document.getElementById("commentaireError").innerHTML = this.response.commentaireVide;

                }
              
            }
        }
    };

    xhr.open("POST", "../include/ajouterComment.php", true);

    xhr.responseType = "json";
    xhr.send(data);

});

document.getElementById('contenu').addEventListener('focus', function(){
    document.getElementById("commentaireError").innerHTML="";
 

 });

