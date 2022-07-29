function supprimerComment(id) {
    //  window.location.href="../include/supprimerComment.php?id="+id;

    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            if (document.getElementById(id)) 
            {




                if (this.response) 
                {

                    document.getElementById(id).innerHTML = 'this message has been deleted';
                    console.log('reponse non vide 1');

                }
                else 
                {
                    document.getElementById(id).style.display = 'none';
                }
            }

        }
    }

    xhr.open("GET", "../include/supprimerComment.php?id=" + id, true);
    xhr.responseType = "json";
    xhr.send();
}