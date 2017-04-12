   <!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>DailyHabit</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <link rel="stylesheet" href="views/css/activity.css">
         <style type="text/css">


            .wall{
                    margin-top: 150px;
                    border-top: 20px solid #000;
                    border-bottom: 20px solid #000;
                    font-family: Rockwell, serif;
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
                    <textarea class="form-control" rows="5" id="comment"   name="newsfeed" autocomplete="off" autofocus>
                       
                    </textarea>
                    <input type="hidden" name="task" value="newsfeed">
                    <button type="submit" class="btn btn-default add">Add</button>
                 </form>
                </form>
            </div>
        </div>
    </div>
</div>



<div class="container page">
    
 <div class="row">
    <button  class="btn btn-default secondbutton" data-toggle="modal" data-target="#modal2" >Post a comment</button>
   <?php foreach ($comments as $row): ?>
        <div class="col-md-9 col-md-offset-2  comment" >
            <form action="wall.php" method="post" >
                <div class="form-group">
                    <img src="/views/uploads/<?php echo htmlentities($row['picture'], ENT_QUOTES, 'utf-8'); ?>"  class="img-circle" width="70" height="70"  onerror="if (this.src != 'views/images/no_photo.png') this.src = 'views/images/no_photo.png';">
                    <label>
                    <h4 class="text"><?php echo htmlentities($row['first'], ENT_QUOTES, 'utf-8'); ?>  <?php echo htmlentities($row['last'], ENT_QUOTES, 'utf-8'); ?></h4>
                    <h4 class="text"><?php echo htmlentities($row['time'], ENT_QUOTES, 'utf-8'); ?></h4>
                    </label>
                </div>
                
            <h5 class="words"><?php echo htmlentities($row['comment'], ENT_QUOTES, 'utf-8'); ?></h5>
            <input type="hidden" name="comment_id" value="<?php echo $row['comment_id']; ?>">
            <input type="submit" name="delete" class="delete" value="delete">
            </form>


        </div>
            <?php endforeach; ?>
            
 </div>
</div>





































    
    
    
                
        </div>
  
