 
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>DailyHabit</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <script src='https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.bundle.js'></script>
       

       <link rel="stylesheet" href="views/css/goals.css">
       <style>
            table {
                border-collapse: collapse;
                border-spacing: 0;
                width: 100%;
                border: 1px solid #ddd;
            }

            th, td {
                border: none;
                text-align: left;
                padding: 8px;
            }

            tr:nth-child(even){background-color: #f2f2f2}
</style>
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
            
            <div>
                <button  class="btn btn-default secondbutton" data-toggle="modal" data-target="#modal3" >Enter New Goal</button>
                <form action="goals.php" method="post">
                    <table>
                         <tr>
                            <th>Goal</th>
                            <th>Variable</th>
                            <th>Unit</th>
                            <th>Value</th>
                            <th></th>
                            
                         </tr>

                    <?php foreach ($current as $row): ?>
                    <tr>
                    <td> <?php echo htmlentities($row['goal'], ENT_QUOTES, 'utf-8'); ?></td>
                    <td> <?php echo htmlentities($row['variable'], ENT_QUOTES, 'utf-8'); ?></td>
                    <td> <?php echo htmlentities($row['unit'], ENT_QUOTES, 'utf-8'); ?></td>
                    <td> <?php echo htmlentities($row['value'], ENT_QUOTES, 'utf-8'); ?></td>
                     <td></td>
                    </tr>        
                    <?php endforeach; ?>
                </table>
                <input type="hidden" name="goal_id" value="<?php echo $row['goal_id']; ?>">
                    <input type="submit" name="delete" class="delete" value="delete">
                </form>
               
                <canvas id="myChart" width="400" height="400"></canvas>
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



             

             
             <div>
                <button  class="btn btn-default secondbutton" data-toggle="modal" data-target="#modal4">Update Progress</button>
                <form action="goals.php" method="post">
                    <table>
                         <tr>
                            <th>Date</th>
                            <th>Value</th>
                            <th></th>
                           
                         </tr>
                    <?php foreach ($update as $row): ?>
                    <tr>
                    <td> <?php echo htmlentities($row['date'], ENT_QUOTES, 'utf-8'); ?></td>
                    <td> <?php echo htmlentities($row['value'], ENT_QUOTES, 'utf-8'); ?></td>
                    
                    <td> <input type="hidden" name="update_id" value="<?php echo $row['update_id']; ?>">
                    <input type="submit" name="delete" class="delete" value="delete"><br> </td>
                   
                    </tr>     
                    <?php endforeach; ?>
                </table>
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



    </div>   
        
    </div>

       

 

</body>


                
     
  