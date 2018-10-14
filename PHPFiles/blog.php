<?php 
    include_once 'login.php';
    include_once 'dbmanager.php';
    
    $fetcher = new dbmanager($hostname, $username, $password, $database);
    $table = $fetcher->fetch_table("blogposts");
    $articles = array();
    $selector = "";
    
    for ($i = 0; $i < $table->num_rows; $i++) {
        $row = $table->fetch_row();
        $articles[$i] = "<a href= blogpost.php/?item=$row[2]>$row[0]</a>";
    }
    
    for ($j = 0; $j<$table->num_rows; $j++) {
        if ($j%3 == 0) $selector = $selector . '<div class = "row">';
        $selector = $selector . '<div class = "col-sm-4 panel panel-default"><div class="panel-body"><h1>' . $articles[$j] . '</h1></div></div>';
        if ($j%3 == 2) $selector = $selector . '</div>';
    }
    
    
echo <<<_END
<!DOCTYPE html>
<html>
<html lang="en">
	<head>
		<title>Blog</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	</head>
	<body>
				<div class="jumbotron text-center">
					<h1>Musings</h1>
					<p>technology, introspection, thoughts.</p>
			</div>
								<a href="index.php">back</a>
        <div class="container">
            $selector
        </div>

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	</body>
</html>
_END
?>
