   <!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>DailyHabit</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <link rel="stylesheet" href="views/css/goals.css">
    </head>
    <body>
        <div class="container">
            <div class="row">
              
            </div>

     
<?php require('menu.php'); ?>


    
    
    <div class="container PageContainer" id="secondcontainer">
        <div class="row margintop" class="centertext">
            
            
        <!--Current Goal-->
          <div class="col-md-4 comment">
            <div class="form-group type1">
                <label><h3 class="form-group words"><span class="glyphicon glyphicon-road goals"></span> Current Goal:</h3></label>
                <button  class="btn btn-default secondbutton" data-toggle="modal" data-target="#modal3" >Edit Goal</button><br>
            </div>
            
            <div class="type2">
                <form action="goals.php" method="post">
                    <?php foreach ($current as $row): ?>
                    <h4> <?php echo htmlentities($row['current'], ENT_QUOTES, 'utf-8'); ?></h4>
                    <input type="hidden" name="current_id" value="<?php echo $row['current_id']; ?>">
                    <input type="submit" name="delete" class="delete" value="delete"><br>          
                    <?php endforeach; ?>
                </form>
            </div>
                
            <div class="modal" id="modal3">
                <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">
                        <form action="goals.php" method="post" class="well">
                        <form class="form">
                            <label >Current</label>
                            <textarea class="form-control" rows="5" id="comment1"  name="current" autocomplete="off" autofocus></textarea>
                            <input type="hidden" name="task" value="current">
                            <button type="submit" class="btn btn-default button">Add</button>
                        </form>
                        </form>
                    </div>
                </div>
                </div>   
            </div>
            </div>
        
        
        <!--Achieved Goals-->
        <div class="col-md-4 comment">
                <div class="form-group type1">
                    <label><h3 class="words"><span class="glyphicon glyphicon-thumbs-up goals"></span> Achieved Goals:</h3></label>
                    <button  class="btn btn-default secondbutton" data-toggle="modal" data-target="#modal1" >Edit List</button><br>
                </div>
                
                <div class="type2">
                    <form action="goals.php" method="post">
                        <?php foreach ($achieved as $row): ?>
                        <h4> <?php echo htmlentities($row['achieved'], ENT_QUOTES, 'utf-8'); ?></h4>
                        <input type="hidden" name="achieved_id" value="<?php echo $row['achieved_id']; ?>">
                        <input type="submit" name="delete" class="delete" value="delete"><br>
                        <?php endforeach; ?>
                    </form>
                </div>
                    
                    
            <div class="modal" id="modal1">
                <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">
                        <form action="goals.php" method="post" class="well">
                        <form class="form">
                            <label>Achieved</label>
                            <textarea class="form-control" rows="5" name="achieved" autocomplete="off" autofocus></textarea>
                            <input type="hidden" name="task" value="achieved">
                            <button type="submit" class="btn btn-default button">Add</button>
                        </form>
                        </form>
                    </div>
                </div>
                </div>   
            </div>        
        </div>
        
        
        <!--Future Goals-->
        <div class="col-md-4 comment">
             <div class="form-group type1">
                <label><h3 class="words"><span class="glyphicon glyphicon-pushpin goals"></span> Future Goals:</h3></label>
                <button  class="btn btn-default secondbutton" data-toggle="modal" data-target="#modal2" >Edit List</button><br>
            </div>
                
            <div class="type2">
                <form action="goals.php" method="post" >
                    <?php foreach ($future as $row): ?>
                    <h4> <?php echo htmlentities($row['future'], ENT_QUOTES, 'utf-8'); ?></h4>
                    <input type="hidden" name="future_id" value="<?php echo $row['future_id']; ?>">
                    <input type="submit" name="delete" class="delete" value="delete"><br>
                    <?php endforeach; ?>
                </form>
            </div>
                
                
            <div class="modal" id="modal2">
                <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">
                        <form action="goals.php" method="post" class="well">
                        <form class="form">
                            <label >Future</label>
                            <textarea class="form-control" rows="5"  name="future" autocomplete="off" autofocus></textarea>
                            <input type="hidden" name="task" value="future">
                            <button type="submit" class="btn btn-default button">Add</button>
                        </form>
                        </form>
                    </div> 
                </div>
                </div>  
            </div>
                
                
                
        </div>
    </div> 
  </div>
