
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

	
		
	function current($current, $id){
		
		$insert = $this->db->prepare("insert into current(current,user_id) values(:current,:user_id)");
        $insert->bindParam(':current', $current, PDO::PARAM_STR);
		$insert->bindParam(':user_id', $id, PDO::PARAM_INT);
		return $insert->execute();
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