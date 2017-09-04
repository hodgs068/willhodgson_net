<?php
// code for HEAD
function headStandard(){
	echo "
			<meta charset=\"utf-8\"/>
			<title>William's Website</title>
			<link rel=\"stylesheet\" href=\"$root/css/main.css\">
			<link rel=\"shortcut icon\" href=\"$root/favicon.png\" />
	";
}

//code for footer
function footerCode(){
	echo '
		<footer id="the_footer">
		Note: this website is best experienced in Google Chrome<br>
		<footer id="the_footer_copyright">
			<br>Copyright William Hodgson LLC 2012
		<footer>
	</footer>
	';
}

// code for header
function headerNavCode(){
	echo "
		<header id=\"top_header\">
		<h3>Welcome to William Hodgson's web design showcase page!</h3>
	</header>
	
	<nav id=\"top_menu\">
		<ul>
			<li><a href=\"$root/index.php\">Home</a></li>
			<li><a href=\"$root/empty.php\">Placeholder-1</a></li>
			<li><a href=\"$root/empty.php\">Placeholder-2</a></li>
			<li><a href=\"$root/empty.php\">Placeholder-3</a></li>
			<li><a href=\"$root/empty.php\">Discussion Forums (coming soon!)</a></li>
		</ul>
	</nav>";
	}
	
//code for aside
function asideCode(){
	$result = mysql_query("SELECT count(*) FROM side_news");
		$row = mysql_fetch_array($result);
		$counter = $row[0];
		echo "
		<aside id=\"side_news\">
		<h4>News</h4>
			<ul>";
				
				$result = mysql_query("SELECT item FROM side_news ORDER BY id DESC");
				while ($row = mysql_fetch_row($result)){ //note: this will shift the query result's internal pointer / iterator
					$item = $row[0];
					if ($counter > 1) {
						echo '<li>'.stripslashes($item).'</li><br/>'; 
						$counter--;
					} else {
						echo '<li>'.stripslashes($item).'</li>'; // will avoid adding that last break 
					}
				}
			echo "</ul>
	</aside>
	";
}  

function articlesCode(){
	
	$result = mysql_query("SELECT count(*) FROM articles");
		$row = mysql_fetch_array($result);
		$counter = $row[0];
		$result = mysql_query("SELECT title, link, img_link, text, time_stamp, author FROM articles ORDER BY id DESC");
				while ($row = mysql_fetch_row($result)){ //note: this will shift the query result's internal pointer / iterator
					$title = $row[0];
					$link = $row[1];
					$img_link = $row[2];
					$text = stripslashes($row[3]);
					$time_stamp = $row[4];
					$author = $row[5];
					echo "
					<article>
						<header>
							<hgroup>
								<h1><a href=\"$link\">$title</a></h1>
								<h2>Posted on $time_stamp</h2>
							</hgroup>
						</header>";
						if ($img_link != "") echo "<a href=\"$link\"><img src=\"$img_link\"></img></a>";
						echo "
						<p class=\"text_body\">
							$text
						</p>
						<hr class=\"hr\" />
						<footer>
							<p>By $author</p>
						</footer>
					</article>
					";
				}
}
?>