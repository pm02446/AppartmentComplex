
<?php
//need this to connect to database.
include('connetDB.php');
//need this to continue session.
session_start();
//checks to see if the user has signed.
if(!isset($_SESSION['user_id']) || !isset($_SESSION['logged_in']) || $_SESSION['type'] != "admin"){
	//will send user back to sign-in.
	header('location:adminSign.php');
	exit;
}
//if user is signed in.
else{
	if($_POST['num']){
	//stores the session's user name in variable.
	    $num = $_POST['num'];
       $sql = "DELETE FROM pets WHERE petId=?";
       $statement = $conn->prepare($sql);
       //bind the values to the statement.
       $statement->bindValue(1
                             ,$num,PDO::PARAM_STR);
       //executes the sql statement.
       $statement->execute();
        
	header('location:pets.php');
		die;
	}

}
?>
