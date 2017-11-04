<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<meta name="description" content="这顿吃啥呢？我也不知道">
	<meta name="author" content="Tb">

	<title>Tb这顿吃什么</title>
	<link rel="stylesheet" href="bootstrap.min.css">
</head>

<body>
<div class="container theme-showcase" role="main" >
	<div class="jumbotron">
		<h1>Tb's recipe</h1>
		<h3>关于这顿吃什么的哲学问题的尝试性解决方案, Ver0.1.1</h3>
		<h4>Changelog 161030 修复了编码问题</h4>
	</div>
	<div class="pre-header">
	    <h1>Recipe List</h1>
    </div>
    <h3 style="line-height:150%;">
		<?php #Connect MySQL

			DEFINE ('DB_USER', 'root');
			DEFINE ('DB_PASSWORD', 'passwd');
			DEFINE ('DB_HOST', 'localhost');
			DEFINE ('DB_NAME', 'proj');

			$dbc=@mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) OR die ('数据库连接失败！'. mysqli_connect_error() );
			mysqli_query($dbc,"set names utf8");
			$q="SELECT id,name FROM recipes";
			$r=mysqli_query($dbc,$q);
			$num=mysqli_num_rows($r);			

			if ($num>0)
			{
				while ($row=mysqli_fetch_array($r,MYSQLI_ASSOC))
				{
					$arr[]=$row;
					echo '<span class="label label-info">'.$row['name'].'</span>';
					if ($row!= NULL) echo '  ';
				}
				echo "<p></p>";
				echo '<a href="?action=select" class="btn btn-lg btn-primary role="button"">吃啥好呢</a>';

				if (isset($_GET['action']) and ($_GET['action']=='select'))
					{
						$shit=rand(1,$num);
						echo '   <span class="label label-danger">不如'.$arr[$shit-1]['name'].'吧</span>';
					}
			}
			else
			{
				echo '<p><h1>什么吃的都没有，Tb要被饿死了</h1></p>';
				echo '<p><button type="button" class="btn btn-lg btn-primary" disabled="disabled">吃个屁</button></p>';
				if (isset($_GET['action']) and ($_GET['action']=='select'))
					{
					}
			}


		?>
	</h3>
	<div class="footer">
	     <div class="container">
	     	<p class="text-muted">Written by Tb for fun. Inspired by rijn.</p>
     </div>
    </div>
</div>

</body>

</html>
