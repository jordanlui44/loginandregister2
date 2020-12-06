<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
<fieldset>
<!-- We are asking if the post currency was set but no we are asking on more question is the post currency equal to the value? -->

<label>Name</label>
<input type="text" name="firstname" value="<?php 
if(isset($_POST['firstname'])) echo htmlspecialchars($_POST['firstname']);
?>">
<span><?php echo $firstnameer; ?> </span>

<label>Last Name</label>
<input type="text" name="lastname" value="<?php 
if(isset($_POST['lastname'])) echo htmlspecialchars($_POST['lastname']);
?>">
<span><?php echo $lastnameer; ?> </span>
<label>Email</label>
<input type="email" name="email" value="<?php 
if(isset($_POST['email'])) echo htmlspecialchars($_POST['email']);
?>"> <span><?php echo $emailer; ?> </span>
<label>Phone</label>
<input type="tel" name="tel" placeholder="555-420-1337" value="<?php 
if(isset($_POST['tel'])) echo htmlspecialchars($_POST['tel']);
?>"> <span><?php echo $telerr; ?> </span>


<label> What is your Gender </label>
<ul>
<li><input type ="radio" name="gender" value="male"
<?php if(isset($_POST['gender']) && $_POST ['gender'] == 'male') echo 'checked="checked"' ;?>
>Male</li>
<li><input type ="radio" name="gender" value="female"
<?php if(isset($_POST['gender']) && $_POST ['gender'] == 'female') echo 'checked="checked"' ;?>
>Female</li>
</ul>
<span><?php echo $genderer; ?> </span>
<label> Splash that Wine </label>
<ul>

<li><input type ="checkbox" name="wine[]" value="Cabernet"
<?php if(isset($_POST['wine']) && $_POST ['wine'] == 'Cabernet') echo 'checked="checked"' ;?>
>Cabernet</li>
<li><input type ="checkbox" name="wine[]" value="Pinot Noir"
<?php if(isset($_POST['wine']) && $_POST ['wine'] == 'Pinot Noir') echo 'checked="checked"' ;?>
>Pinot Noir</li>
<li><input type ="checkbox" name="wine[]" value="Merlot"
<?php if(isset($_POST['wine']) && $_POST ['wine'] == 'Merlot') echo 'checked="checked"' ;?>
>Merlot</li>
<li><input type ="checkbox" name="wine[]" value="water"
<?php if(isset($_POST['wine']) && $_POST ['wine'] == 'water') echo 'checked="checked"' ;?>
>water</li>
</ul>
<span><?php echo $wineer; ?> </span>
<label>Comments</label>
<textarea name="comments">
<?php 
if(isset($_POST['comments'])) echo htmlspecialchars($_POST['comments']);
?>
</textarea>
<span><?php echo $commentser; ?> </span>

<input type="radio" name="privacy" value="<?php 
if(isset($_POST['privacy'])) echo htmlspecialchar($_POST['privacy']);?>" >Privacy or no?
<span><?php echo $privacyer; ?> </span>
<input type ="submit" name="Convert it">
<p><a href ="">Reset</a></p>
</fieldset>



</form>