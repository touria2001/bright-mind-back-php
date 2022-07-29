CKEDITOR.replace('editor', {
  filebrowserUploadUrl: 'ckeditor/ck_upload.php',
  filebrowserUploadMethod: 'form'
});
var nombreFile = 1;

document.getElementById('ajouterFile').addEventListener('click', function() {
  nombreFile++;
  var i = document.createElement('input');
  i.setAttribute("type", "file");
  i.setAttribute("name", "file" + nombreFile);

  var addressContainer = document.getElementById("files");
  addressContainer.appendChild(i);
  var p = document.createElement('p');
  p.setAttribute("class", "error");
  p.setAttribute("id", "file" + nombreFile + 'Error');
  addressContainer.appendChild(p);

});


//ajax

document.getElementById("ajouterCours_form").addEventListener("submit", function(e) {
  e.preventDefault();

  var data = new FormData(this);

  var xhr = new XMLHttpRequest();

  xhr.onreadystatechange = function() {
    if (this.readyState != 4) {
      document.getElementById("ajouter").style.pointerEvents = "none";
      document.getElementById("ajouter").value = "Loading...";


    }
    if (this.readyState == 4 && this.status == 200) {

      document.getElementById("ajouter").style.pointerEvents = "auto";
      document.getElementById("ajouter").value = "Ajouter";


      if (this.response) {

        if (this.response.titreVide) {

          document.getElementById("titreError").innerHTML = this.response.titreVide;

        }
        
        if (this.response.descriptionVide) {

          document.getElementById("descriptionError").innerHTML = this.response.descriptionVide;

        }
        
        var i;
        
        for (i = 1; i < nombreFile + 1; i++) {
          
          if (this.response['file' + i]) {

           document.getElementById("file" + i + 'Error').innerHTML =this.response['file' + i];

          }
        }



      }
    }
  };

  xhr.open("POST", "../include/enregistrerFile.php", true);

  xhr.responseType = "json";
  xhr.send(data);

});
Array.prototype.forEach.call(document.querySelectorAll("#ajouterCours_form  input"), function (el) {
    
  el.addEventListener('focus', function(){
      Array.prototype.forEach.call(document.getElementsByClassName("error"), function (ele) {
          ele.innerHTML = "";
      });
   });
} );