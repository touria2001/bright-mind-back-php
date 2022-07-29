



<div class="box_comment" id="<?php echo $comment['id'];?>">
    <?php 
    if($comment['contenu']=='this message has been deleted'){
    ?>
<p class="messageSupprimer"><?php  echo  $comment['contenu']; ?></p>

<?php }
else{?>
<p><?php  echo  $comment['contenu']; ?></p>
<button>repondre</button>
<button onclick="supprimerComment(<?php echo $comment['id'];?>)">supprimer</button>
<button>modifier</button>
<?php } ?>
</div>

<?php
foreach($prof->comment_child($comment['id']) as $comment){ ?>  
 <div class="fils">
    <?php require("commentaire.php"); } ?>
</div>

</div>
<style>
        .box_comment {
            box-shadow: rgba(50, 50, 93, 0.25) 0px 30px 60px -12px inset, rgba(0, 0, 0, 0.3) 0px 18px 36px -18px inset;
          margin: 10px;
            padding: 0px;
            display: flex;
         
        }

        .fils {
            margin-left: 20px;
           
        }

        button {
            height: 30px;
        }
        #commentaireError{
            color:red;
        }
        .messageSupprimer{
            color: grey;
        }
    </style>
   <script src="assert/js/crudComment.js"></script>