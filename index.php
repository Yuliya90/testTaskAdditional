<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>addition</title>
</head>
<?php
$dbhost = "localhost";
$dbusername = "root";
$dbuserpassword = "";
$default_dbname = "add";

include($_SERVER["DOCUMENT_ROOT"]."/db.php");
$db=new db($dbhost,$dbusername,$dbuserpassword,$default_dbname);
?>
<body>
    <form class="form" action="controllers.php" method="post">
        <p>
            <div class="title">Добавить контакт</div>
        </p>
        <hr align="center" width="410" size="2" color="#eeeeee" />
        <p><input class="in" name="name" placeholder="Имя"></p>
        <p><input class="in" name="phone" type="phone" placeholder="Телефон"></p>
        <p><input class="btn" type="submit" value="Добавить"></p>
    </form>


    <section class="contacts">
<?php
	echo get_cont();
?>
     
    </section>
    <script type="text/javascript" src="http://scriptjava.net/source/scriptjava/scriptjava.js"></script>
    <script src="http://code.jquery.com/jquery-1.8.3.js"></script>
    <script src="main.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="script.js"></script>
</body>

</html>
<?php
	function get_cont(){
	global $db;
	$sql = "select * from `addition`;";
    $res = $db->q($sql);
    if ($res && $db->num_rows($res) > 0) {
        $result = "<section><p><div class='title'>Список контактов</div></p>";
        for ($i = 0; $i < $db->num_rows($res); $i++) {
            $data = @mysqli_fetch_array($res);
            $result .= " 
            <hr align='center' width='410' size='2' color='#eeeeee' />
            <div class='cont'>
            <p>
            	<div>".$data['name']."<div class='close1'> &times;</div>
				<input type = 'hidden' class='del' value='".$data['id']."'>
            	</div>
            	
            </p>
        	
            <p>
            	<div class='tel'>".$data['phone']."</div>
        	</p>
            </div>
        ";
        }
        return $result."</section>";
    } else return "";
}
?>