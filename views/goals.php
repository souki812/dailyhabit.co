 
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>DailyHabit</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <script src='https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.bundle.js'></script>
       

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



             <button  class="btn btn-default secondbutton" data-toggle="modal" data-target="#modal4">Update Progress</button><br>

             
             <div class="type2">
                <form action="goals.php" method="post">
                    <?php foreach ($update as $row): ?>
                
                    <h4> <?php echo htmlentities($row['value'], ENT_QUOTES, 'utf-8'); ?></h4>
                    <h4> <?php echo htmlentities($row['date'], ENT_QUOTES, 'utf-8'); ?></h4>
                  
                    <input type="hidden" name="update_id" value="<?php echo $row['update_id']; ?>">
                    <input type="submit" name="delete" class="delete" value="delete"><br> 
                            
                    <?php endforeach; ?>
                </form>
            </div>


            <div class="modal" id="modal4">
                <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">
                        <form action="goals.php" method="post" class="well">
                        <form class="form">
                            <label>Update Progress</label> 
                            <textarea class="form-control" rows="1" id="days"  name="update" autocomplete="off" placeholder="Value" autofocus></textarea>
                            <textarea class="form-control" rows="1" id="days"  name="date" autocomplete="off" placeholder="Date" autofocus></textarea>


                             
                            <input type="hidden" name="task" value="update">
                            <button type="submit" class="btn btn-default button">Add</button>
                        </form>
                        </form>
                    </div>
                </div>
                </div>   

            </div>


             </div>



             <div class="col-md-4 comment">
            <div class="form-group type1">
                 <label><h3 class="form-group words"><span class="glyphicon glyphicon-road goals"></span>Goals</h3></label>
            </div>

  <div class="type2">

 
    <canvas id="canvas"></canvas>

<br>
<br>
<button id="randomizeData">Randomize Data</button>
<button id="addData">Add Data</button>
<button id="removeData">Remove Data</button>
<script>
    window.onload = function() {
        function randomScalingFactor() {
            return Math.round(Math.random() * 100 * (Math.random() > 0.5 ? -1 : 1));
        }
        function randomColorFactor() {
            return Math.round(Math.random() * 255);
        }
        function randomColor(opacity) {
            return 'rgba(' + randomColorFactor() + ',' + randomColorFactor() + ',' + randomColorFactor() + ',' + (opacity || '.3') + ')';
        }
        function newDate(days) {
            return moment().add(days, 'd').toDate();
        }
        function newDateString(days) {
            return moment().add(days, 'd').format();
        }
        var config = {
            type: 'line',
            data: {
                datasets: [{
                    label: "Dataset with string point data",
                    data: [{
                        x: newDateString(0),
                        y: randomScalingFactor()
                    }, {
                        x: newDateString(2),
                        y: randomScalingFactor()
                    }, {
                        x: newDateString(4),
                        y: randomScalingFactor()
                    }, {
                        x: newDateString(5),
                        y: randomScalingFactor()
                    }],
                    fill: false
                }, {
                    label: "Dataset with date object point data",
                    data: [{
                        x: newDate(0),
                        y: randomScalingFactor()
                    }, {
                        x: newDate(2),
                        y: randomScalingFactor()
                    }, {
                        x: newDate(4),
                        y: randomScalingFactor()
                    }, {
                        x: newDate(5),
                        y: randomScalingFactor()
                    }],
                    fill: false
                }]
            },
            options: {
                responsive: true,
                title:{
                    display:true,
                    text:"Chart.js Time Point Data"
                },
                scales: {
                    xAxes: [{
                        type: "time",
                        display: true,
                        scaleLabel: {
                            display: true,
                            labelString: 'Date'
                        }
                    }],
                    yAxes: [{
                        display: true,
                        scaleLabel: {
                            display: true,
                            labelString: 'value'
                        }
                    }]
                }
            }
        };
        jQuery.each(config.data.datasets, function(i, dataset) {
            dataset.borderColor = randomColor(0.4);
            dataset.backgroundColor = randomColor(0.5);
            dataset.pointBorderColor = randomColor(0.7);
            dataset.pointBackgroundColor = randomColor(0.5);
            dataset.pointBorderWidth = 1;
        });
        jQuery('#randomizeData').click(function() {
            jQuery.each(config.data.datasets, function(i, dataset) {
                jQuery.each(dataset.data, function(j, dataObj) {
                    dataObj.y = randomScalingFactor();
                });
            });
            window.myLine.update();
        });
        jQuery('#addData').click(function() {
            if (config.data.datasets.length > 0) {
                var lastTime = myLine.scales['x-axis-0'].labelMoments[0].length ? myLine.scales['x-axis-0'].labelMoments[0][myLine.scales['x-axis-0'].labelMoments[0].length - 1] : moment();
                var newTime = lastTime
                    .clone()
                    .add(1, 'day')
                    .format('MM/DD/YYYY HH:mm');
                for (var index = 0; index < config.data.datasets.length; ++index) {
                    config.data.datasets[index].data.push({
                        x: newTime,
                        y: randomScalingFactor()
                    });
                }
                window.myLine.update();
            }
        });
        jQuery('#removeData').click(function() {
            config.data.datasets.forEach(function(dataset, datasetIndex) {
                dataset.data.pop();
            });
            window.myLine.update();
        });
        var ctx = document.getElementById("canvas").getContext("2d");
        window.myLine = new Chart(ctx, config);
    };
</script>
            </div>
        </div>
    </div>   
        
    </div>

       

 

</body>


                
     
  