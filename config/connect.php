<?PHP
//change server address '127.0.0.1:3307' and database name 'library' accordingly 
define('server','127.0.0.1:3307');
define('user','root');
define('pwd','');
define('db','library');

$connect=mysqli_connect(server,user,pwd,db);

if($connect){
	//echo "connected";
}else{
	die("CONNECTION_ERROR".mysqli_connect_error());
}

?>