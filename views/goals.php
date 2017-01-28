 
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

            <canvas id="myChart" width="400" height="400"></canvas>
            <script>
                    var ctx = document.getElementById("myChart");
                    var myChart = new Chart(ctx, {
                        type: 'bar',
                        data: {
                            labels: ["Red", "Blue", "Yellow", "Green", "Purple", "Orange"],
                            datasets: [{
                                label: '# of Votes',
                                data: [12, 19, 3, 5, 2, 3],
                                backgroundColor: [
                                    'rgba(255, 99, 132, 0.2)',
                                    'rgba(54, 162, 235, 0.2)',
                                    'rgba(255, 206, 86, 0.2)',
                                    'rgba(75, 192, 192, 0.2)',
                                    'rgba(153, 102, 255, 0.2)',
                                    'rgba(255, 159, 64, 0.2)'
                                ],
                                borderColor: [
                                    'rgba(255,99,132,1)',
                                    'rgba(54, 162, 235, 1)',
                                    'rgba(255, 206, 86, 1)',
                                    'rgba(75, 192, 192, 1)',
                                    'rgba(153, 102, 255, 1)',
                                    'rgba(255, 159, 64, 1)'
                                ],
                                borderWidth: 1
                            }]
                        },
                        options: {
                            scales: {
                                yAxes: [{
                                    ticks: {
                                        beginAtZero:true
                                    }
                                }]
                            }
                        }
                    });
            </script>
            
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
        
    

 
</head>
<body>


                
        </div>
    </div> 
  