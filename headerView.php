<header class="main-header">
    <a href="index.php" class="hdr-btn">Home</a>
    <a href="index.php?page=termekek" class="hdr-btn">Termékek</a>
    <element class="search" method="post">
     <input type="text" placeholder="Termék keresése">
<element class="signin-up">
    <?php if( @!$_SESSION['userName']): ?>
        <a href="index.php?page=signUp" class="hdr-btn">Sign Up</a>
        <a href="index.php?page=signIn" class="hdr-btn">Sign In</a>

    <?php else: ?>
        <span class="hdr-btn hdr-usr"><?= @$_SESSION['userName'] ?></span>
        <a href="index.php?page=logout" class="hdr-btn">Logout</a>       
        <?php if ($_SESSION['userName']=='admin'){?>
        <a href="index.php?page=admintermekek" class="hdr-btn">Admin termékek</a>
        <a href="index.php?page=ujtermekek" class="hdr-btn">Új termék felvétele</a>
        <?php } ?>
    <?php endif ?>


<?php

$search = new PDO("mysql:host=localhost;dbname=db",'root','');

if (isset($_POST["submit"])) {
	$str = $_POST["search"];
	$sth = $search->prepare("SELECT * FROM `termekek` WHERE leiras = '$str'");

	$sth->setFetchMode(PDO:: FETCH_OBJ);
	$sth -> execute();

	if($row = $sth->fetch())
	{
		?>
		<br><br><br>
		<table>
			<tr>
				<th>leiras</th>
				<th>Description</th>
			</tr>
			<tr>
				<td><?php echo $row->leiras; ?></td>
				<td><?php echo $row->Description;?></td>
			</tr>

		</table>
<?php 
	}
		
	
		else{
			echo "Name Does not exist";
		}

}

?>

</header>