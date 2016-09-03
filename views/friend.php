<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>DailyHabit</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <link rel="stylesheet" href="views/css/friend.css">
    </head>
    <body>
        <div class="container">
            <div class="row">
              
            </div>






<?php require('menu.php'); ?>


 

<div class="container page" id="firstContainer">
 <div class="row">
        
        <div class="col-md-8 col-md-offset-2  profile" >

   
            <?php foreach ($selection as $row): ?>
                <img src="/views/uploads/<?php echo htmlentities($row['picture'], ENT_QUOTES, 'utf-8'); ?>"  class="circleBase type1" id="profile-pic"   onerror="if (this.src != 'views/images/no_photo.png') this.src = 'views/images/no_photo.png';">
             <?php endforeach; ?>
  

            <center>
            <?php foreach ($success as $row): ?>
            <h2 class="words"><?php echo htmlentities($row['first'], ENT_QUOTES, 'utf-8'); ?>     <?php echo htmlentities($row['last'], ENT_QUOTES, 'utf-8'); ?></h2>
            <h3 class="words"><?php echo htmlentities($row['gender'], ENT_QUOTES, 'utf-8'); ?>   |   <?php echo htmlentities($row['age'], ENT_QUOTES, 'utf-8'); ?></h3>  
            <label class="words">About me:</label>
            <div class="bio"><h5><?php echo htmlentities($row['biography'], ENT_QUOTES, 'utf-8'); ?></h5></div><br>
            <?php endforeach; ?>
            </center>
        </div>
 </div>
  
</div>


<div class="container page">
  <div class="row">
  
   <?php foreach ($comments as $row): ?>
        <div class="col-md-8 col-md-offset-2  comment">
            <div class="form-group">
                <img src="/views/uploads/<?php echo htmlentities($row['picture'], ENT_QUOTES, 'utf-8'); ?>"  width="70" height="70" class="img-circle" onerror="if (this.src != 'views/images/no_photo.png') this.src = 'views/images/no_photo.png';">
                <label>
                <h4> <?php echo htmlentities($row['first'], ENT_QUOTES, 'utf-8'); ?>  <?php echo htmlentities($row['last'], ENT_QUOTES, 'utf-8'); ?></h4>
                <h4> <?php echo htmlentities($row['time'], ENT_QUOTES, 'utf-8'); ?></h4>
                </label>
            </div>
            
            <?php echo htmlentities($row['comment'], ENT_QUOTES, 'utf-8'); ?>
            <button  class="btn btn-default secondbutton add" data-toggle="modal" data-target="#modal5" >Add a comment</button>
        </div>
            <?php endforeach; ?>
  </div>
</div>


 

<div class="modal" id="modal5">
    <div class="modal-dialog">
        <div class="modal-content"> 
            <div class="modal-body">
                <form action="friend.php" method="post" class="well">
                    <label >Comment</label>
                    <textarea class="form-control" rows="5" id="comment"   name="friendcomment" autocomplete="off" autofocus></textarea>
                    <?php if(isset($_SESSION['friend'])): ?>
                    <input type="hidden" name="task" value="<?php echo $_SESSION['friend']; unset($_SESSION['friend']);?>">
                    <button type="submit" class="btn btn-default add">Add</button>
                    <?php endif; ?>
                </form>     
            </div>
        </div>
    </div>
</div>
  
  