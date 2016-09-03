<style>
    
    .button {
        border: #ffb3b3;
        background-color: #ffb3b3;
    }
    
    .button hover {
        border: #555555;
        background-color: #555555;
    }
            
</style>

<div class="navbar navbar-default navbar-fixed-top">
            
            <div class="container">
                <div class="navbar-header">
                    <button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand">DailyHabit</a>
                </div>
                
                <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                   <li <?php if ($_SERVER['REQUEST_URI'] == '/home.php') echo 'class="active"'; ?>><a href="../home.php">Home</a></li>
                   <li <?php if ($_SERVER['REQUEST_URI'] == '/activity.php') echo 'class="active"'; ?>><a href="../activity.php">Profile</a></li>
                   <li <?php if ($_SERVER['REQUEST_URI'] == '/goals.php') echo 'class="active"'; ?>><a href="../goals.php">Goals</a></li>
                   <li <?php if ($_SERVER['REQUEST_URI'] == '/community.php') echo 'class="active"'; ?>><a href="../community.php">Community</a></li> 
                </ul>
                
                <form  class="navbar-form navbar-right">
                     <input type="hidden" name="task" value="logout">
                     <button type="submit" class="btn btn-default button"><a href="../logout.php">Log Out</a></button>
                </form>
                </div>
            </div>
        </div>
