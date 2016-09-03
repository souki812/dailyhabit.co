<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>DailyHabit</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <link rel="stylesheet" href="views/css/activity.css">
    </head>
    <body>
        <div class="container">
            <div class="row">
              
            </div>


<?php require('menu.php'); ?>
             

<div class="container page" id="firstContainer">
    <div class="row">
        <div class="col-md-8 col-md-offset-2  profile">
            
            
            <?php foreach ($uploadimage as $row): ?>
                <img src="/views/uploads/<?php echo htmlentities($row['picture'], ENT_QUOTES, 'utf-8'); ?>"  class="circleBase type1"   id="profile-pic"   onerror="if (this.src != 'views/images/no_photo.png') this.src = 'views/images/no_photo.png';">
             <?php endforeach; ?>

            <center>
            <?php foreach ($selection as $row): ?>
            <h2 class="words"><?php echo htmlentities($row['first'], ENT_QUOTES, 'utf-8'); ?>   <?php echo htmlentities($row['last'], ENT_QUOTES, 'utf-8'); ?></h2>
            <h3 class="words"><?php echo htmlentities($row['gender'], ENT_QUOTES, 'utf-8'); ?>  |  <?php echo htmlentities($row['age'], ENT_QUOTES, 'utf-8'); ?></h3>
            <label class="words">About me:</label>
            <div class="bio"><h5 class="words"><?php echo htmlentities($row['biography'], ENT_QUOTES, 'utf-8'); ?></h5><br></div>
            <?php endforeach; ?>
            </center>
            
            
            <br><form action="activity.php" method="post" enctype="multipart/form-data">
                <div class="upload1">
                    <label for="file">Filename:</label>
                    <input type="file" name="file" id="file"><br>
                </div>
                <div class="upload2"><input type="submit" class="upload" name="profile" value="Upload"></div>
            </form>
            
            
               
                <button  class="btn btn-default secondbutton" data-toggle="modal" data-target="#modal2" >Post a comment</button>
                <button  class="btn btn-default secondbutton"  data-toggle="modal" data-target="#modal1" >Add Biography</button>
        </div>
 </div>
    


<div class="modal" id="modal2">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <form action="activity.php" method="post" class="well">
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







<div class="modal" id="modal1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <form action="activity.php" method="post" class="well">
                 <form class="form">
                    <label>Biography</label>
                    <textarea class="form-control" rows="5" id="biography" placeholder="Write Your Biography!"  name="biography" autocomplete="off" autofocus></textarea>
                    <input type="hidden" name="task" value="biography">
                    <button type="submit" class="btn btn-default add">Add</button>
                 </form>
                </form>
            </div>
        </div>
    </div>
</div>

        
</div>     

</div> 
</div>


<br><div class="container">
  <h2>Your Progress:</h2>
  <p><cite>Progress is impossible without change, and those who cannot change their minds cannot change anything.</cite> George Bernard Shaw </p> 
  
   <div class="progress">
  <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width:0%" id="progress1">Progress</div>
</div>

</div>

<div class="container page">
    
 <div class="row">
   <?php foreach ($comments as $row): ?>
        <div class="col-md-9 col-md-offset-2  comment" >
            <form action="activity.php" method="post" >
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
  
  







