document.getElementById("ajouterMeet-form").addEventListener("submit", function (e) {
    e.preventDefault();

    var data = new FormData(this);

    var xhr = new XMLHttpRequest();

    xhr.onreadystatechange = function () {
        if (this.readyState != 4) {
            document.getElementById("ajouter").style.pointerEvents = "none";
            document.getElementById("ajouter").value = "Loading...";


        }
        if (this.readyState == 4 && this.status == 200) {

            document.getElementById("ajouter").style.pointerEvents = "auto";
            document.getElementById("ajouter").value = "Ajouter";
            

            if (this.response) {
              
                if (this.response.dateVide) {

                    document.getElementById("dateError").innerHTML = this.response.dateVide;

                }
                if (this.response.dateInvalide) {

                    document.getElementById("dateError").innerHTML = this.response.dateInvalide;

                }
             
                if (this.response.descriptionVide) {

                    document.getElementById("descriptionError").innerHTML = this.response.descriptionVide;

                }
                // if (this.response.telInvalide) {

                //     document.getElementById("telError").innerHTML = this.response.telInvalide;

                // }
                if (this.response.lienVide) {

                    document.getElementById("lienError").innerHTML = this.response.lienVide;

                }
              
               
        

            }
        }
    };

    xhr.open("POST", "../include/ajouterMeet.php", true);

    xhr.responseType = "json";
    xhr.send(data);

});

Array.prototype.forEach.call(document.querySelectorAll("#ajouterMeet-form > input"), function (el) {
    
    el.addEventListener('focus', function(){
        Array.prototype.forEach.call(document.getElementsByClassName("error"), function (ele) {
            ele.innerHTML = "";
        });
     });
} );