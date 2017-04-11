   <!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>DailyHabit</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
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

            td:nth-child(odd){background-color: #f2f2f2;

            }
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
                  
                 
                  
                 <table>
                         <tr>
                            <th>Current Goal</th>
                            <th>Number of Days</th>
                            <th><button  class="btn btn-default secondbutton" data-toggle="modal" data-target="#modal3" >Edit Goal</button></th>
                            
                         </tr>
                    <form action="habits.php" method="post">
                    <?php foreach ($current as $row): ?>
                    <tr>
                    <td> <?php echo htmlentities($row['current'], ENT_QUOTES, 'utf-8'); ?></td>
                    <td> <?php echo htmlentities($row['days'], ENT_QUOTES, 'utf-8'); ?></td>
                   
                    <td><input type="hidden" name="current_id" value="<?php echo $row['current_id']; ?>">
                    <input type="submit" name="delete" class="delete" value="delete"></td>
                    </tr>         
                    <?php endforeach; ?>
                </form>
            </table>
            
            </div>
            
                
            <div class="modal" id="modal3">
                <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">
                        <form action="habits.php" method="post" class="well">
                        <form class="form">
                            <label >Current</label>
                            <textarea class="form-control" rows="5" id="comment1"  name="current_habit" autocomplete="off" autofocus></textarea>
                            <label >Enter the number of days you want to perform the habit:</label>
                            <textarea class="form-control" rows="1" id="days"  name="current_days" autocomplete="off" autofocus></textarea>
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
                
                   
                
                
                <div>
                
                
                     <table>
                         <tr>
                            <th>Achieved Goals</th>
                            <th><button  class="btn btn-default secondbutton" data-toggle="modal" data-target="#modal1" >Edit List</button> </th>
                        
                            
                         </tr>
                        <form action="habits.php" method="post">
                        <?php foreach ($achieved as $row): ?>
                       
                        <tr>
                        <td> <?php echo htmlentities($row['achieved'], ENT_QUOTES, 'utf-8'); ?></td>
                        <td>
                             <input type="hidden" name="achieved_id" value="<?php echo $row['achieved_id']; ?>">
                        <input type="submit" name="delete" class="delete" value="delete">
                        </td>
                        </tr>
                        <?php endforeach; ?>

                    </form>
                </table>
                
                </div>
                
                    
                    
            <div class="modal" id="modal1">
                <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">
                        <form action="habits.php" method="post" class="well">
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
             
               
            <div>
                
                
                    <table>
                         <tr>
                            <th>Future Goals</th>
                            <th><button  class="btn btn-default secondbutton" data-toggle="modal" data-target="#modal2" >Edit List</button> </th>
                        
                            
                         </tr>
                         <form action="habits.php" method="post" >
                    <?php foreach ($future as $row): ?>
                <tr>
                    <td> <?php echo htmlentities($row['future'], ENT_QUOTES, 'utf-8'); ?></td>
                   <td> <input type="hidden" name="future_id" value="<?php echo $row['future_id']; ?>">
                    <input type="submit" name="delete" class="delete" value="delete"></td>
                </tr>
                    <?php endforeach; ?>
                </table>
                </form>
                 
            </div>
            
                
                
            <div class="modal" id="modal2">
                <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">
                        <form action="habits.php" method="post" class="well">
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
