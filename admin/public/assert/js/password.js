document.getElementById("sign-in-form").addEventListener("submit", function (e) {
    e.preventDefault();

    var data = new FormData(this);

    var xhr = new XMLHttpRequest();

    xhr.onreadystatechange = function () {
        if (this.readyState != 4) {
            document.getElementById("connecte").style.pointerEvents = "none";
            document.getElementById("connecte").value = "Loading...";


        }
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("inscrir").style.pointerEvents = "auto";
            document.getElementById("inscrir").value = "Create Account";

            Array.prototype.forEach.call(document.getElementsByClassName("error"), function (el) {
                el.innerHTML = "";
            });
            if (this.response) {
                if (this.response.pwInvalide) {

                    document.getElementById("pwError").innerHTML = this.response.pwInvalide;

                }
                if (this.response.pwVide) {

                    document.getElementById("pwError").innerHTML = this.response.pwVide;

                }
                if (this.response.pwNotMatch) {

                    document.getElementById("pwVerifError").innerHTML = this.response.pwNotMatch;

                }
                if (this.response.pwVerifVide) {

                    document.getElementById("pwVerifError").innerHTML = this.response.pwVerifVide;

                }
                if (this.response.length == 0) {
                    document.location.href = "../connecter.php";
                }
            }
        }
    };

    xhr.open("POST", "../include/passwordAjax.php", true);

    xhr.responseType = "json";
    xhr.send(data);

});

Array.prototype.forEach.call(document.querySelectorAll("#sign-up-form > input"), function (el) {

    el.addEventListener('focus', function () {
        Array.prototype.forEach.call(document.getElementsByClassName("error"), function (ele) {
            ele.innerHTML = "";
        });
    });
});