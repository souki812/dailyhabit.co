    <!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>DailyHabit</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
       <link rel="stylesheet" href="views/css/home.css"> 
      <!--  <link rel='stylesheet' href='http://fullcalendar.io/js/fullcalendar-2.2.3/fullcalendar.css' /> -->
    </head>
    <body>
        <div class="container">
            <div class="row">
              
            </div>

    
<?php require('menu.php'); ?>

 <div class="container page">
   <div class="container">
        <h2>Your Progress:</h2>
        <p><cite>Progress is impossible without change, and those who cannot change their minds cannot change anything.</cite> George Bernard Shaw </p> 
  
        <div class="progress">
            <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width:0%"  id="progress1">Progress</div>
        </div>
        
       
    </div><br><br>
    
    
    <div class="row">
        <div class="col-md-8 col-md-offset-2  home" >
            <center>
            <div>
                <h3 class="words">Current Habit:</h3>
                <h5 class="words"><?php echo htmlentities($currenthabit, ENT_QUOTES, 'utf-8'); ?></h5>
            </div>

           
            </center>
        </div>
    </div>
   
   <!-- Adding a calendar -->

   <br><br>
     <div class="row">
  <div class="col-md-12">
   

    <div id='calendar'></div>


  </div>
  </div>

</div>




   
    <div class="container page">
        <div class="row">
            <center>
                <div class="col-md-8 col-md-offset-2" >
                    <div class="form-group newsfeed">
                        <label><h3>Newsfeed</h3></label>
                        <button  class="btn btn-default secondbutton" data-toggle="modal" data-target="#modal3" >Post a comment</button>
                    </div>
            </center>
        </div>
    </div>
 
 
 
 

<br><div class="row">
   <?php foreach ($comments as $row): ?>
        <div class="col-md-6 col-md-offset-3  comment" >
            <form action="home.php" method="post" >
                <div class="form-group">
                    <img src="/views/uploads/<?php echo htmlentities($row['picture'], ENT_QUOTES, 'utf-8'); ?>"  class="img-circle"   width="70" height="70"  onerror="if (this.src != 'views/images/no_photo.png') this.src = 'views/images/no_photo.png';">
                    <label>
                    <h4 class="words"><?php echo htmlentities($row['first'], ENT_QUOTES, 'utf-8'); ?>  <?php echo htmlentities($row['last'], ENT_QUOTES, 'utf-8'); ?></h4>
                    <h4 class="words"><?php echo htmlentities($row['time'], ENT_QUOTES, 'utf-8'); ?></h4>
                    </label>
                </div>
            
            <h5 class="words"><?php echo htmlentities($row['comment'], ENT_QUOTES, 'utf-8'); ?></h5>
            <input type="hidden" name="comment_id" value="<?php echo $row['comment_id']; ?>">
            <input type="submit" name="delete" class="delete" value="delete">
           </form>

        </div>
    <?php endforeach; ?>
</div>

 
 
<div class="modal" id="modal3">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <form action="home.php" method="post" class="well">
                 <form class="form">
                    <label >Comment</label>
                    <textarea class="form-control" rows="5" id="comment1"  name="newsfeed" autocomplete="off" autofocus></textarea>
                    <input type="hidden" name="task" value="newsfeed">
                     <button type="submit" class="btn btn-default add">Add</button>
                </form>

                </form>

            </div>
            
        </div>
    </div>  
</div>

</div>
             
   