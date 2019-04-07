<!DOCTYPE HTML>
<html>
<head>
    <link rel="stylesheet" href="style.css" type="text/css">
</head>
<body>
<div class="flex">
<h1>Employee Page
    <button class=button onmouseover="this.className='style1'" onmouseout="this.className='button'" onclick="location.href='main.php'">Main page</button>
</h1>
<form action="query_e.php" method="post">
<h3>
	Employee ID:
	<input type="text" name="eid"></input>
</h3>
<h3>
	Date:
	<input type="date" name="current_date"></input>
</h3>
<h3>
<button style="width: 60%;" type="submit" class=button onmouseover="this.className='style1'" onmouseout="this.className='button'"> E. Get All Sales of Employee X on Y Date </button>
</h3>
</form>
</div>
</body>
