   <!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>DailyHabit</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        
         <style type="text/css">


            .wall{
                    margin-top: 150px;
                   
                    font-family: Rockwell, serif;
                }

                 .comment{
        border: 1px solid grey;
        background-color: #eeeeee;
        font-family: "Palatino Linotype", "Book Antiqua", Palatino, serif;
       
    }
    
     .firstbutton{
        margin-left: 280px;
        margin-bottom: 20px;
        border: #DC143C;
        background-color: #DC143C;
    }
    
   
    
    .secondbutton:hover {
        border: #555555;
        background-color: #555555;
        color: white;
    }
    
    
    #profile-pic{
         width:150px; /* you can use % */
         height: 150px;
         border: 2px solid grey;
    }
    
    .col-xs-6 img[src=""] {
        display: none;
    }
    
    .circleBase {
        border-radius: 50%;
        }

    .type1 {
        /*background: url("views/images/manon.jpg");*/
        margin-left: 310px;
        margin-top: -100px;
        border-radius: 50%/50%; 
        width: 150px;
        border: 3px solid #000;
    }
    
    .words {
        margin:auto;
        margin-left: 25px;
        margin-top: 30px;
    }

    .words {
        font-family: "Palatino Linotype", "Book Antiqua", Palatino, serif;
    }
    
    .add {
        border: #DC143C;
        background-color: #DC143C;
        color: white;
    }
    
    .add hover {
        border: #555555;
        background-color: #555555;
        color: white;
    }
    
    .delete {
        float: right;
        border: #DC143C;
        background-color: #DC143C;
        color: white;
    }

        </style>
         
    </head>
    <body>
        <div class="container">
            <div class="row">
              
            </div>

     
<?php require('menu.php'); ?>

 <div class="container page">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <center>
                <div class="wall">
                    <h2><span class="glyphicon glyphicon-user top"></span> Community Wall</h2><br>
                </div>
                </center>
            </div>
        </div>





        




<div class="modal" id="modal2">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <form action="wall.php" method="post" class="well">
                 <form class="form">
                    <label >Comment</label>
                    <textarea class="form-control" rows="5" id="comment"   name="wall" autocomplete="off" autofocus>
                       
                    </textarea>
                    <input type="hidden" name="task" value="wall">
                    <button type="submit" class="btn btn-default add">Add</button>
                 </form>
                </form>
            </div>
        </div>
    </div>
</div>



<div class="container page">
    
 <div class="row">
   
   <?php foreach ($comments as $row): ?>
        <div class="col-md-9 col-md-offset-2  comment" >
            <form action="wall.php" method="post" >
                <div class="form-group">
                    <img src="/views/uploads/<?php echo htmlentities($row['picture'], ENT_QUOTES, 'utf-8'); ?>"  class="img-circle" width="70" height="70"  onerror="if (this.src != 'views/images/no_photo.png') this.src = 'views/images/no_photo.png';">
                    <label>
                    <h5 class="text"><?php echo htmlentities($row['first'], ENT_QUOTES, 'utf-8'); ?>  <?php echo htmlentities($row['last'], ENT_QUOTES, 'utf-8'); ?></h5>
                   <!-- <h6 class="text"><?php echo date(("F j, Y, g:i a"), strtotime($row['time'])); ?></h6>-->
                    <h4 class="text"><?php echo htmlentities($row['comment'], ENT_QUOTES, 'utf-8'); ?></h4>
                    </label>
                </div>
                
            
            <input type="hidden" name="comment_id" value="<?php echo $row['comment_id']; ?>">
            <input type="submit" name="delete" class="delete" value="delete">
            </form>


        </div>
            <?php endforeach; ?>
             <button  class="btn btn-default secondbutton" data-toggle="modal" data-target="#modal2" >Post a comment</button>
 </div>
</div>





































    
    
    
                
        </div>
  
