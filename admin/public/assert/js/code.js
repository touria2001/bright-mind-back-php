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
            document.getElementById("submit").value = "verify";

            Array.prototype.forEach.call(document.getElementsByClassName("error"), function (el) {
                el.innerHTML = "";
            });

            if (this.response) {
                if (this.response.codeInvalid) {

                    document.getElementById("error").innerHTML = this.response.codeInvalid;

                }

                if (this.response.fieldVide) {

                    document.getElementById("error").innerHTML = this.response.fieldVide;

                }
                if (this.response.length == 1 && this.response.email) {
                    document.location.href = "../password.php?email=" + this.response.email;
                }

            }
        }
    };

    xhr.open("POST", "../include/codeAjax.php", true);

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