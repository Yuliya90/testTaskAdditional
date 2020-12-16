
<?php  
$dbhost = "localhost";
$dbusername = "root";
$dbuserpassword = "";
$default_dbname = "add";

include($_SERVER["DOCUMENT_ROOT"]."/db.php");
$db=new db($dbhost,$dbusername,$dbuserpassword,$default_dbname);
if(isset($_POST['name'])){
	echo create($_POST);
}
	
function create($arr_input){
    global $db;
    $id=" ";
    $sql = "insert into `addition` set `name`= '".$arr_input['name']."', `phone` = '".$arr_input['phone']."';";
	$res = $db->q($sql);
    if ($res) {
    	return header('Location: ' . "/");
   		$id=mysqli_insert_id($db->link);
   	}else die("error insert");  
}
if(isset($_POST["action"])){
	if($_POST["action"] == "close1"){
		$sql = "delete from `addition` where `id` = '".$_POST['id']."';";
		$db->q($sql);
	}
}
?>