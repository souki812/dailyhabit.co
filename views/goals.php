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
                <label><h3 class="form-group words"><span class="glyphicon glyphicon-road goals"></span>Goals</h3></label>
                <button  class="btn btn-default secondbutton" data-toggle="modal" data-target="#modal3" >Enter New Goal</button><br>
            </div>
            
            <div class="type2">
                <form action="goals.php" method="post">
                    <?php foreach ($current as $row): ?>
                    <h4> <?php echo htmlentities($row['current'], ENT_QUOTES, 'utf-8'); ?></h4>
                    <h4> <?php echo htmlentities($row['days'], ENT_QUOTES, 'utf-8'); ?></h4>

                    <input type="hidden" name="goal_id" value="<?php echo $row['current_id']; ?>">
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
                            <label>New Goal</label>
                            <textarea class="form-control" rows="5" id="comment1"  name="current_habit" autocomplete="off" autofocus ></textarea>
                            <label>How do you want to track your progress?</label>
                            <textarea class="form-control" rows="1" id="days"  name="current_days" autocomplete="off" placeholder="Variable (e.g: savings)" autofocus></textarea>
                            <textarea class="form-control" rows="1" id="days"  name="current_days" autocomplete="off" placeholder="Units (e.g: $)" autofocus></textarea>
                            <textarea class="form-control" rows="1" id="days"  name="current_days" autocomplete="off" placeholder="Goal value: (e.g: 100000" autofocus></textarea>



                            <input type="hidden" name="task" value="goal">
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
  