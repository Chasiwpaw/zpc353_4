<!DOCTYPE HTML>
<html>
<head>
<link rel="stylesheet" href="style.css" type="text/css">
</head>
<body>
<div class="flex">
<h1> Books page 
    <button class=button onmouseover="this.className='style1'" onmouseout="this.className='button'" onclick="location.href='main.php'">Main page</button>
</h1>
<h3>
<button class=button style="width:60%" onmouseover="this.className='style1'" onmouseout="this.className='button'" onclick="location.href='query_a.php'"> A. Get all books in Bookstore </button><br>
<button class=button style="width:60%" onmouseover="this.className='style1'" onmouseout="this.className='button'" onclick="location.href='query_b.php'"> B. Get all books in back order </button><br>
</h3>
<form action="query_g.php" method="post">
<h3>
	Weeks Passed:
	<input type="text" id="week"></input>
</h3>
<h3>
<button style="width:60%" type="submit" class=button onmouseover="this.className='style1'" onmouseout="this.className='button'"> G. Get all books ordered, not received in X weeks </button>
</h3>
</form>
</div>
</body>
</html>
