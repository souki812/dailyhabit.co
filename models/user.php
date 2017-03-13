
<?php

class User {
    
    private $db; // PDO connection
    
    function __construct($db) {
        $this->db = $db;
    }
    
   /** function select($id){
		return $this->db->query("select username,gender,age from users where user_id=$id");
	} **/
    
    // Attempt to add this user and return whether it worked
    function register($first, $last, $email, $password, $gender, $age, $admin) {
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $insert = $this->db->prepare('insert into users(first,last,email,password,gender,age,admin) values(:first,:last,:email,:password,:gender,:age,:admin)');
        $insert->bindParam(':first', $first, PDO::PARAM_STR);
        $insert->bindParam(':last', $last, PDO::PARAM_STR);
        $insert->bindParam(':email', $email, PDO::PARAM_STR);
        $insert->bindParam(':password', $hash, PDO::PARAM_STR);
        $insert->bindParam(':gender', $gender, PDO::PARAM_STR);
        $insert->bindParam(':age', $age, PDO::PARAM_INT);
        $insert->bindParam(':admin', $admin, PDO::PARAM_INT);
        return $insert->execute();
    }
	
	function deleteAccount($user_id){
		$delete = $this->db->prepare('delete from users where user_id= :user_id');
		$delete->bindParam(':user_id', $user_id, PDO::PARAM_INT);
		return $delete->execute();
	}
	
	function newsfeed($comment, $id){
		$insert = $this->db->prepare("insert into newsfeed(comment,user_id,friend_id) values(:comment,:user_id,:friend_id)");
        $insert->bindParam(':comment', $comment, PDO::PARAM_STR);
		$insert->bindParam(':user_id', $id, PDO::PARAM_INT);
		$insert->bindParam(':friend_id', $id, PDO::PARAM_INT);
		return $insert->execute();
	}
	
	function comment_friend($comment, $user_id, $friend_id){
		$insert = $this->db->prepare("insert into newsfeed(comment,user_id,friend_id) values(:comment,:user_id,:friend_id)");
        $insert->bindParam(':comment', $comment, PDO::PARAM_STR);
		$insert->bindParam(':user_id', $user_id, PDO::PARAM_INT);
		$insert->bindParam(':friend_id', $friend_id, PDO::PARAM_INT);
		return $insert->execute();
	}
	
	function remove_comment($comment_id){
		$delete = $this->db->prepare('delete from newsfeed where comment_id= :comment_id');
		$delete->bindParam(':comment_id', $comment_id, PDO::PARAM_INT);
		$delete->execute();
	}


	function insert_date($date, $user_id, $habit_id){
		$insert = $this->db->prepare("insert into dates(date,user_id,habit_id) values(:date,:user_id,:habit_id)");
        $insert->bindParam(':date', $date, PDO::PARAM_STR);
        $insert->bindParam(':habit_id', $habit_id, PDO::PARAM_INT);
		$insert->bindParam(':user_id', $user_id, PDO::PARAM_INT);
		return $insert->execute();
	}
	
	//GETDATE FOR CALENDAR
	function getdate($id) {
	
       $select = $this->db->query("select * from dates where user_id= '$id'");
       

       $row = $select->fetchAll(PDO::FETCH_COLUMN);
      
	   return $row;
		
	}


	


	//for progress
	function countdate($id, $habit_id) {
	
       $select = $this->db->query("select count(*) from dates where user_id= '$id' and habit_id='$habit_id'");
      
       $row = $select->fetchColumn();
      
	   return $row;
		
	}


	function insert_event($title, $date, $user_id){
		$insert = $this->db->prepare("insert into events(title,date,user_id) values(:title,:date,:user_id)");
        $insert->bindParam(':title', $title, PDO::PARAM_STR);
        $insert->bindParam(':date', $date, PDO::PARAM_STR);
		$insert->bindParam(':user_id', $user_id, PDO::PARAM_INT);
		return $insert->execute();
	}
	

	function getevent($id) {
	
       $select = $this->db->query("select * from events where user_id= '$id' ");
       

       $row = $select->fetchAll(PDO::FETCH_COLUMN);
      
	   return $row;
		
	}
	
	function bio($id, $biography){
		
		$insert = $this->db->prepare("UPDATE users SET biography=:biography WHERE user_id=$id");
        $insert->bindParam(':biography', $biography, PDO::PARAM_STR);
		return $insert->execute();
	}
	
	function progress($progress, $id){
		
		$insert = $this->db->prepare("UPDATE users SET progress=:progress WHERE user_id=$id");
        $insert->bindParam(':progress', $progress, PDO::PARAM_STR);
		$insert->execute();
		return $progress;
	}

		function insert_goal($goal, $variable, $unit, $value,  $id){
		
		$insert = $this->db->prepare("insert into goals(goal,variable,unit,value,user_id) values(:goal,:variable,:unit,:value,:user_id)");
        $insert->bindParam(':goal', $goal, PDO::PARAM_STR);
        $insert->bindParam(':variable', $variable, PDO::PARAM_STR);
        $insert->bindParam(':unit', $unit, PDO::PARAM_STR);
        $insert->bindParam(':value', $value, PDO::PARAM_INT);
		$insert->bindParam(':user_id', $id, PDO::PARAM_INT);
		return $insert->execute();
	}

		function insert_update($value, $date, $user_id){
		
		$insert = $this->db->prepare("insert into goalupdate(value,date,user_id) values(:value,:date,:user_id)");
        $insert->bindParam(':value', $value, PDO::PARAM_INT);
        $insert->bindParam(':date', $date, PDO::PARAM_STR);
		$insert->bindParam(':user_id', $user_id, PDO::PARAM_INT);
		return $insert->execute();
	}

	function selectUpdate($id) {
       return $this->db->query("select * from goalupdate where user_id= '$id' ");
		
	}

	//GETDATE FOR CALENDAR
	function getupdatedate($id) {
	
       $select = $this->db->query("select date from goalupdate where user_id= '$id'");
       

       $row = $select->fetchAll(PDO::FETCH_COLUMN);
      
	   return $row;
		
	}

	function getupdatevalue($id) {
	
       $select = $this->db->query("select value from goalupdate where user_id= '$id'");
       

       $row = $select->fetchAll(PDO::FETCH_COLUMN);
      
	   return $row;
		
	}

	 function selectGoals($id) {
       return $this->db->query("select * from goals where user_id= '$id' ");
		
	}


	function getgoal($id) {
        $select = $this->db->prepare('select goal from goals where user_id=:user_id');
        $select->bindParam(':user_id', $id, PDO::PARAM_INT);
        $select->execute();
		$row = $select->fetch(PDO::FETCH_ASSOC);
		return $row['goal'];
	 }


	 function getvariable($id){
	 	 $select = $this->db->prepare('select variable from goals where user_id=:user_id');
        $select->bindParam(':user_id', $id, PDO::PARAM_INT);
        $select->execute();
		$row = $select->fetch(PDO::FETCH_ASSOC);
		return $row['variable'];

	 }

	  function getunit($id){
	 	 $select = $this->db->prepare('select unit from goals where user_id=:user_id');
        $select->bindParam(':user_id', $id, PDO::PARAM_INT);
        $select->execute();
		$row = $select->fetch(PDO::FETCH_ASSOC);
		return $row['unit'];

	 }

	 function getvalue($id){
	 	 $select = $this->db->prepare('select value from goals where user_id=:user_id');
        $select->bindParam(':user_id', $id, PDO::PARAM_INT);
        $select->execute();
		$row = $select->fetch(PDO::FETCH_ASSOC);
		return $row['value'];

	 }

	function remove_goal($goal_id){
		$delete = $this->db->prepare('delete from goals where goal_id= :goal_id');
		$delete->bindParam(':goal_id', $goal_id, PDO::PARAM_INT);
		$delete->execute();
	}

	
		
	function current($current, $days, $id){
		
		$insert = $this->db->prepare("insert into current(current,days,user_id) values(:current,:days,:user_id)");
        $insert->bindParam(':current', $current, PDO::PARAM_STR);
        $insert->bindParam(':days', $days, PDO::PARAM_INT);
		$insert->bindParam(':user_id', $id, PDO::PARAM_INT);
		return $insert->execute();
	}


	function getcurrentdays($id) {
        $select = $this->db->prepare('select days from current where user_id=:user_id');
        $select->bindParam(':user_id', $id, PDO::PARAM_INT);
        $select->execute();
		$row = $select->fetch(PDO::FETCH_ASSOC);
		return $row['days'];
	 }

	 function getcurrenthabit($id) {
        $select = $this->db->prepare('select current from current where user_id=:user_id');
        $select->bindParam(':user_id', $id, PDO::PARAM_INT);
        $select->execute();
		$row = $select->fetch(PDO::FETCH_ASSOC);
		return $row['current'];
	 }

	 function gethabitid($id) {
        $select = $this->db->prepare('select * from current where user_id=:user_id');
        $select->bindParam(':user_id', $id, PDO::PARAM_INT);
        $select->execute();
		$row = $select->fetch(PDO::FETCH_ASSOC);
		return $row['current_id'];
	 }
	
		 // Attempt to return the ID of this user
    function selectCurrent($id) {
       return $this->db->query("select * from current where user_id= '$id' ");
		
	}
	
	function remove_current($current_id){
		$delete = $this->db->prepare('delete from current where current_id= :current_id');
		$delete->bindParam(':current_id', $current_id, PDO::PARAM_INT);
		$delete->execute();
	}
		
	function achieved($achieved, $id){
		
		$insert = $this->db->prepare("insert into achieved(achieved,user_id) values(:achieved,:user_id)");
        $insert->bindParam(':achieved', $achieved, PDO::PARAM_STR);
		$insert->bindParam(':user_id', $id, PDO::PARAM_INT);
		return $insert->execute();
	}
	
	 function selectAchieved($id) {
       return $this->db->query("select * from achieved where user_id= '$id' ");
		
	}
	
	function remove_achieved($achieved_id){
		$delete = $this->db->prepare('delete from achieved where achieved_id= :achieved_id');
		$delete->bindParam(':achieved_id', $achieved_id, PDO::PARAM_INT);
		$delete->execute();
	}
		
	function future($future, $id){
		
		$insert = $this->db->prepare("insert into future(future,user_id) values(:future,:user_id)");
        $insert->bindParam(':future', $future, PDO::PARAM_STR);
		$insert->bindParam(':user_id', $id, PDO::PARAM_INT);
		return $insert->execute();
	}
	
	 function selectFuture($id) {
       return $this->db->query("select * from future where user_id= '$id' ");
		
	}
	
	function remove_future($future_id){
		$delete = $this->db->prepare('delete from future where future_id= :future_id');
		$delete->bindParam(':future_id', $future_id, PDO::PARAM_INT);
		$delete->execute();
	}
	
	 function getprogress($id) {
        $select = $this->db->prepare('select progress from users where user_id=:user_id');
        $select->bindParam(':user_id', $id, PDO::PARAM_INT);
        $select->execute();
		$row = $select->fetch(PDO::FETCH_ASSOC);
		return $row['progress'];
	 }
	 
	 // Attempt to return the ID of this user
    function selectAll($id) {
       return $this->db->query("select * from users where user_id= '$id' ");
		
	}
	
		 
	 // Attempt to return the ID of this user
    function communityselect() {
       return $this->db->query("select * from users");
		
	}
	
		 // Attempt to return the ID of this user
    function selectNewsfeed($id) {
       return $this->db->query("select * from newsfeed natural join users where user_id= '$id'  ORDER BY time DESC");
		
	}
	
	 // Attempt to return the ID of this user
    function selectComments($id) {
       return $this->db->query("select * from users join newsfeed on users.user_id= newsfeed.friend_id where newsfeed.user_id= '$id' ORDER BY time ASC");

	}
	
	
    // Attempt to return the ID of this user
    function login($email, $password) {
        $select = $this->db->prepare('select * from users where email=:email');
        $select->bindParam(':email', $email, PDO::PARAM_STR);
        $select->execute();
        
        $row = $select->fetch(PDO::FETCH_ASSOC);
        if (isset($row) && password_verify($password, $row['password'])) {


            return $row['user_id'];
        } else {
            return NULL;
        }
    }
	
	
	//Is the user an admin or not
	function getadmin($id){
		 $select = $this->db->prepare('select * from users where user_id=:user_id');
        $select->bindParam(':user_id', $id, PDO::PARAM_INT);
        $select->execute();
        
        $row = $select->fetch(PDO::FETCH_ASSOC);
		return $row['admin'];
	}
	
	function picture($file, $id){
		$insert = $this->db->prepare("UPDATE users SET picture=:picture WHERE user_id=$id");
        $insert->bindParam(':picture', $file, PDO::PARAM_STR);
		return $insert->execute();
	}
	

}