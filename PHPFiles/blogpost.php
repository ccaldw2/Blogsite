<?php 
    include_once 'login.php';
    include_once 'dbmanager.php';
    include_once 'timestampmanager.php';
    
    $fetcher = new dbmanager($hostname, $username, $password, $database);
    
    $file = $_GET['item'];
    
    if($file!= NULL){
        $post = $fetcher->fetch_item("blogposts","link",$file)->fetch_row();
        if(file_exists("../Blogposts/$file")) {
            $title = $post[0];
            $date = timestampmanager::to_month_and_year($post[1]);
            $contents = file_get_contents("../Blogposts/$file");
        }
        else {
            $title = "404";
            $date = "never";
            $contents = "This article doesn't exist!";
        }
    }
    
echo <<<_END
<!DOCTYPE html>
<html>
<html lang="en">
	<head>
		<title>$title</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	</head>
	<body>
		<div class="jumbotron text-center">
			<h1>Caleb J. Caldwell</h1>
			<p>i do blogging sometimes.</p>
		</div>

		<a href="../blog.php">Back</a>

        <div class="container">
			<div class = "panel panel-default">
				<div class="panel-heading">			
					<h1>$title <small>Written $date</small></h1>
				</div>
                <div class="panel-body">
				    $contents
                </div>
		   </div>
        </div>

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	</body>
</html>
_END
?>