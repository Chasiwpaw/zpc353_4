<!DOCTYPE HTML>
<html>
<head>
<link rel="stylesheet" href="style.css" type="text/css">
</head>
<body>
<div class="flex">
<h1> Customer Page 
    <button class=button onmouseover="this.className='style1'" onmouseout="this.className='button'" onclick="location.href='main.php'">Main page</button>
</h1>
<h3>
<button class=button onmouseover="this.className='style1'" onmouseout="this.className='button'" onclick="location.href='query_allcustomer.php'"> Get All Customers </button>
</h3>
<form action="query_c.php" method="post">
<h3>
	Customer Email:
	<input type="text" name="cid"></input>
<button style="width:40%" type="submit" class=button onmouseover="this.className='style1'" onmouseout="this.className='button'"> C. Get All Special Orders </button>
</h3>
<h3>
</form>
<form action="query_d.php" method="post">
	Customer Email:
        <input type="text" name="cid"></input>
<button style="width:40%;" type="submit" class=button onmouseover="this.className='style1'" onmouseout="this.className='button'"> D. Get All Purchases Made </button>
</form>
</h3>
<h3>
<button class=button onmouseover="this.className='style1'" onmouseout="this.className='button'" onclick="location.href='query_f.php'"> F. Get All Purchar Made Grouped by Year </button>
</h3>
</div>
</body>
</html>
