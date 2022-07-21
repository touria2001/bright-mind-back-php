document.getElementById("sign-up-form").addEventListener("submit", function (e) {
    e.preventDefault();

    var data = new FormData(this);

    var xhr = new XMLHttpRequest();

    xhr.onreadystatechange = function () {
        if (this.readyState != 4) {
            document.getElementById("submit").style.pointerEvents = "none";
            document.getElementById("submit").value = "Loading...";


        }
        if (this.readyState == 4 && this.status == 200) {

            document.getElementById("submit").style.pointerEvents = "auto";
            document.getElementById("submit").value = "Edit Class";

            Array.prototype.forEach.call(document.getElementsByClassName("error"), function (el) {
                el.innerHTML = "";
            });

            if (this.response) {
              
               if(this.response.classExist){
                document.getElementById("nomError").innerHTML = this.response.classExist;

               }
                if (this.response.nameVide) {

                    document.getElementById("nomError").innerHTML = this.response.nameVide;

                }
                if (this.response.subjectVide) {

                    document.getElementById("subjectError").innerHTML = this.response.subjectVide;

                }
                if (this.response.teacherVide) {

                    document.getElementById("teacherError").innerHTML = this.response.teacherVide;

                }
             
             
     
 
               
               


            }
        }
    };

    xhr.open("POST", "../include/modifierClassAjax.php", true);
    xhr.overrideMimeType('text/plain; charset=utf-8');


    xhr.responseType = "json";
    xhr.send(data);

});

Array.prototype.forEach.call(document.querySelectorAll("#sign-up-form > input"), function (el) {
    
    el.addEventListener('focus', function(){
        Array.prototype.forEach.call(document.getElementsByClassName("error"), function (ele) {
            ele.innerHTML = "";
        });
     });
} );