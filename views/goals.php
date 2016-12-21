 
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>DailyHabit</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <link rel="stylesheet" href="views/css/goals.css">
          <script type="text/javascript" src="jquery-1.7.2.js"></script>
    <script type="text/javascript" src="jquery.sparkline.js"></script>
    </head>
    <body>
        <div class="container">
            <div class="row">
              
            </div>

    
<?php require('menu.php'); ?>
<?php require_once('./conf.php');  ?>

    
    
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
                    <h4> <?php echo htmlentities($row['goal'], ENT_QUOTES, 'utf-8'); ?></h4>
                    <h4> <?php echo htmlentities($row['variable'], ENT_QUOTES, 'utf-8'); ?></h4>
                    <h4> <?php echo htmlentities($row['unit'], ENT_QUOTES, 'utf-8'); ?></h4>
                    <h4> <?php echo htmlentities($row['value'], ENT_QUOTES, 'utf-8'); ?></h4>

                    <input type="hidden" name="goal_id" value="<?php echo $row['goal_id']; ?>">
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
                            <textarea class="form-control" rows="5" id="comment1"  name="goal" autocomplete="off" autofocus ></textarea>
                            <label>How do you want to track your progress?</label>
                            <textarea class="form-control" rows="1" id="days"  name="variable" autocomplete="off" placeholder="Variable (e.g: savings)" autofocus></textarea>
                            <textarea class="form-control" rows="1" id="days"  name="unit" autocomplete="off" placeholder="Units (e.g: $)" autofocus></textarea>
                            <textarea class="form-control" rows="1" id="days"  name="value" autocomplete="off" placeholder="Goal value: (e.g: 100000" autofocus></textarea>



                            <input type="hidden" name="task" value="goal">
                            <button type="submit" class="btn btn-default button">Add</button>
                        </form>
                        </form>
                    </div>
                </div>
                </div>   
            </div>
            </div>
        
    

    <script type="text/javascript">
    $(function() {
        /** This code runs when everything has been loaded on the page */
        /* Inline sparklines take their values from the contents of the tag */
        $('.inlinesparkline').sparkline(); 

        /* Sparklines can also take their values from the first argument 
        passed to the sparkline() function */
        var myvalues = [10,8,5,7,4,4,1];
        $('.dynamicsparkline').sparkline(myvalues);

        /* The second argument gives options such as chart type */
        $('.dynamicbar').sparkline(myvalues, {type: 'bar', barColor: 'green'} );

        /* Use 'html' instead of an array of values to pass options 
        to a sparkline with data in the tag */
        $('.inlinebar').sparkline('html', {type: 'bar', barColor: 'red'} );
    });
    </script>
</head>
<body>

<p>
Inline Sparkline: <span class="inlinesparkline">1,4,4,7,5,9,10</span>.
</p>
<p>
Sparkline with dynamic data: <span class="dynamicsparkline">Loading..</span>
</p>
<p>
Bar chart with dynamic data: <span class="dynamicbar">Loading..</span>
</p>
<p>
Bar chart with inline data: <span class="inlinebar">1,3,4,5,3,5</span>
</p>
                
        </div>
    </div> 
  