<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>DailyHabit</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <link rel="stylesheet" href="views/css/community.css">
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
                <div class="community">
                    <h2><span class="glyphicon glyphicon-user top"></span> Community</h2><br>
                </div>
                </center>
            </div>
        </div>
    
            
            
            
            
        <?php foreach ($selection as $row): ?>
        <form action="friend.php" method="get">
        <div class="container">
            <div class="row">
              
                <div class="col-md-8 col-md-offset-4">
                    <div class="col-md-6 comment" id="leftcol">
                    <div class="media">
                        <center>
                        <div class="form-group">
                            <br><img src="/views/uploads/<?php echo htmlentities($row['picture'], ENT_QUOTES, 'utf-8'); ?>"  id="profile-pic" class="img-circle" width="110" height="110"  onerror="if (this.src != 'views/images/no_photo.png') this.src = 'views/images/no_photo.png';">
                            <div class="media-body"><br>
                            <label>
                                <h4><?php echo htmlentities($row['first'], ENT_QUOTES, 'utf-8'); ?> <?php echo htmlentities($row['last'], ENT_QUOTES, 'utf-8'); ?></h4>
                            </label>
                            </div>
                        </div>
                        </center>
                        
                         <input type="hidden" name="user_id" value="<?php echo $row['user_id']; ?>">
                         <input type="submit" name="friend" class="proButton" value="View Profile">
                         </form>
        <?php if (isset($_SESSION['administrator'])): ?>
                          <form action="community.php" method="post">
                             <input type="hidden" name="user_id" value="<?php echo $row['user_id']; ?>">
                             <input type="submit" name="delete" class="delete" value="Delete Account">
                            
                          </form>
                      <?php endif; ?>

                         
                    </div>  
                    </div>
                </div>
            </div>
        </div>
    
    <?php endforeach; ?>
    </div>
