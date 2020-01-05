<?php 
{
	 $server = 'ec2-174-129-33-139.compute-1.amazonaws.com';
	 $db = 'de5i3uu92bo5ru';
	 $username = 'bhmdwmkuiayytg';
	 $password = 'e02cf0c816bde3a34c70104c51b38e306debf18ad945dfc5054256a02a4c2451';
     $port = '5432';

         $connection = new mysqli($server, $db, $username, $password, $port);
if ($connection->connect_error) {
    die ($connection->connect_error);
}
         
function queryMysql($query)
{
    global $connection;
    $result = $connection->query($query);
    if (!$result) 
    {
        die ($connection->error);
    }
    return $result;
}

	 function execStatement($query)
	{
		$connection = new mysqli($this->dbhost, $this->dbuser, $this->dbpassword, $this->dbname);
		//chay cau truy van
		$result = $connection->query($query);
		//dong ket noi
		$connection->close();
		return $result;
	}
	 function execQuery($query, $numparam, $param)
	{
		$conn = new mysqli($this->host, $this->un, $this->pw, $this->dbname);
		$stm = $connection->prepare($query);
		$stm->bind_param($numparam, $param);
		$stm->execute();
		$stm->close();
		$connection->close();
	}
        
 function passwordToToken($password){
    $salt = random_bytes(5);
    $staticSalt = '$$%%#';
    global $salt;
    global $staticSalt;
    $token = hash( "ripemd128","$password");
    return $token;
}
function sanitizeString($str) {
    global $connection ;
    $str = strip_tags($str); //remove html tags
    $str = htmlentities($str); //encode html (for special characters)
    if (get_magic_quotes_gpc()){
        $str = stripslashes($str); //Don't use the magic quotes
    }
    //Avoid MYSQL Injection
    $str = $connection->real_escape_string($str);
    return $str;
}
function addUser($username, $password, $status){
    //Setup one default user
    $result = queryMysql("SELECT * FROM user where username='$username'");
    $row = mysqli_fetch_assoc($result);
    if (!$row) { //user doesn't exist
        //Add a default user
        $token = passwordToToken($password);
        $query = "INSERT INTO User(username, password, status) VALUES('$username', '$token', '$status')";
        queryMysql($query);
        return 1; //added
    }else {
        return 0; //not added
    }
}
}
?>