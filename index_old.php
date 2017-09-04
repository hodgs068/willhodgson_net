<?php
	include 'php/connect.inc.php';
?>

<!doctype html>

<html lang="en">
<head>
	<meta charset="utf-8"/>
	<title>William's Website</title>
	<link rel="stylesheet" href="main.css">
	

</head>
<body>
	<div id="big_wrapper">
	
	<header id="top_header">
		<h1>Welcome to William Hodgson's gnarly website design central!</h1>
	</header>
	
	<nav id="top_menu">
		<ul>
			<li><a href="http://www.williamhodgson.org">Home</a></li>
			<li><a href="http://www.williamhodgson.org/empty.php">Hot New Recipes</a></li>
			<li><a href="http://www.williamhodgson.org/empty.php">Gerbil Hair Products</a></li>
			<li><a href="http://www.williamhodgson.org/empty.php">Podcast</a></li>
			<li><a href="http://www.williamhodgson.org/empty.php">Discussion Forums</a></li>
		</ul>
	</nav>
	

	<nav id="top_menu2">
		<?php
			$result = mysql_query("SELECT count(1) FROM `users`");
			$row = mysql_fetch_array($result);
			
			$total = $row[0];
			echo "Total number of registered users so far:  ".$total;
			
			//$lastUser = mysql_query("SELECT
			
		?>
		
	</nav>
	
	
	
	
	
	<div id="new_div">
	<section id="main_section">
	
	
	
	
	
	
	<article>
			<header>
				<hgroup>
					<h1>Fun with jQuery</h1>
					<h2>Interactive page elements ahoy</h2>
				</hgroup>
			</header>
			<p><a href="js/test.html">jQuery Playground</a></p>
			<footer>
				<p>Written by William Hodgson</p>
			</footer>
		</article>
	
	
	
	
	<article>
			<header>
				<hgroup>
					<h1>Log in, log out prototype</h1>
					<h2>Work in progress...</h2>
				</hgroup>
			</header>
			<p><a href="php/index.php">Finally you can register and log in!</a></p>
			<footer>
				<p>Written by William Hodgson</p>
			</footer>
		</article>
	
	
	
	
	<article>
			<header>
				<hgroup>
					<h1>Javascript-powered calculator</h1>
					<h2>All Javascript all the time</h2>
				</hgroup>
			</header>
			<p>
			<FORM NAME="Calc">
				<TABLE BORDER=4>
				<TR>
				<TD>
				<INPUT TYPE="text"   NAME="Input" Size="16">
				<br>
				</TD>
				</TR>
				<TR>
				<TD>
				<INPUT TYPE="button" NAME="one"   VALUE="  1  " OnClick="Calc.Input.value += '1'">
				<INPUT TYPE="button" NAME="two"   VALUE="  2  " OnCLick="Calc.Input.value += '2'">
				<INPUT TYPE="button" NAME="three" VALUE="  3  " OnClick="Calc.Input.value += '3'">
				<INPUT TYPE="button" NAME="plus"  VALUE="  +  " OnClick="Calc.Input.value += ' + '">
				<INPUT TYPE="button" NAME="open_paren"  VALUE="  (  " OnClick="Calc.Input.value += '('">
				<br>
				<INPUT TYPE="button" NAME="four"  VALUE="  4  " OnClick="Calc.Input.value += '4'">
				<INPUT TYPE="button" NAME="five"  VALUE="  5  " OnCLick="Calc.Input.value += '5'">
				<INPUT TYPE="button" NAME="six"   VALUE="  6  " OnClick="Calc.Input.value += '6'">
				<INPUT TYPE="button" NAME="minus" VALUE="  -  " OnClick="Calc.Input.value += ' - '">
				<INPUT TYPE="button" NAME="close_paren"  VALUE="  )  " OnClick="Calc.Input.value += ')'">
				<br>
				<INPUT TYPE="button" NAME="seven" VALUE="  7  " OnClick="Calc.Input.value += '7'">
				<INPUT TYPE="button" NAME="eight" VALUE="  8  " OnCLick="Calc.Input.value += '8'">
				<INPUT TYPE="button" NAME="nine"  VALUE="  9  " OnClick="Calc.Input.value += '9'">
				<INPUT TYPE="button" NAME="times" VALUE="  x  " OnClick="Calc.Input.value += ' * '">
				<INPUT TYPE="button" NAME="point"  VALUE="  .  " OnClick="Calc.Input.value += '.'">
				<br>
				<INPUT TYPE="button" NAME="clear" VALUE="  c  " OnClick="Calc.Input.value = ''">
				<INPUT TYPE="button" NAME="zero"  VALUE="  0  " OnClick="Calc.Input.value += '0'">
				<INPUT TYPE="button" NAME="DoIt"  VALUE="  =  " OnClick="Calc.Input.value = eval(Calc.Input.value)">
				<INPUT TYPE="button" NAME="div"   VALUE="  /  " OnClick="Calc.Input.value += ' / '">
				<INPUT TYPE="button" NAME="mod"   VALUE=" mod " OnClick="Calc.Input.value += ' % '">
				<br>
				</TD>
				</TR>
				</TABLE>
				</FORM>
			</p>
			<footer>
				<p>Written by William Hodgson</p>
			</footer>
		</article>
	

		<article>
			<header>
				<hgroup>
					<h1>Find and replace prototype</h1>
					<h2>PHP powered!</h2>
				</hgroup>
			</header>
			<p><a href="php_stuff/firstfile/find_and_replace.php">Enter text, then use the form to replace the selected word type!</a></p>
			<footer>
				<p>Written by William Hodgson</p>
			</footer>
		</article>
	
	
		<article>
			<header>
				<hgroup>
					<h1>Rotating Logo</h1>
					<h2>Aren't you just a little bit curious?</h2>
				</hgroup>
			</header>
			<p><a href="secondpage/rotating.html">Click here for a cool rotating logo!</a></p>
			<footer>
				<p>Written by William Hodgson</p>
			</footer>
		</article>
		
		<article>
			<header>
				<hgroup>
					<h1>Drag and Drop website test</h1>
					<h2>Robin is so insensitive...</h2>
				</hgroup>
			</header>
			<p><a href="thirdpage/drag_and_drop.html">Try to get Batman into the left box!</a></p>
			<footer>
				<p>Written by William Hodgson</p>
			</footer>
		</article>
		
	</section>
	
	<aside id="side_news">
		<h4>News</h4>
			<ul>
				<li>This website is coming along nicely so far, next to add log-ons and passwords.
					Also, I need to get templates set up so the site is drawn up automatically from a database of
					post and page objects.</li>
					<br>
				<li>Libby (almost) caught a chipmunk!</li>
			</ul>
	</aside>
	

	</div>
	
	<footer id="the_footer">
		

		Note: this website is best experienced in Google Chrome<br>
		<footer id="the_footer_copyright">
			<br>Copyright William Hodgson LLC 2012
		<footer>
	</footer>
	
	</div>
</body>

</html>