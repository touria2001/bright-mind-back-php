<!DOCTYPE html>
<html>

<head>
  <title>How to Upload Image using ckeditor in PHP</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <script src="http://cdn.ckeditor.com/4.6.2/standard-all/ckeditor.js"></script>
</head>

<body>
  <div class="container">
    <h3>ajouter cours</h3>
    <form action="" method="POST" enctype="multipart/form-data" id="ajouterCours_form">
      <input type="text" name="titre" placeholder="title">
      <p class="error" id="titreError"></p>
      <input type="text" name="description" placeholder="description">
      <p class="error" id="descriptionError"></p>
      <textarea name="editor" id="editor" class="form-control ckeditor"> </textarea>
      <div id='files'>
        <input type="file" name='file1' />
        <p class="error" id='file1Error'></p>

      </div>
      <p id="ajouterFile">ajouter autre file</p>

      <input type="submit" value="ajouter" id="ajouter">
    </form>
  </div>

</body>

</html>

<script>
  "ckeditor/ckeditor.js"
</script>
<script src="assert/js/ajouterCours.js"></script>
<style>
  .error {
    color: red;
  }
</style>