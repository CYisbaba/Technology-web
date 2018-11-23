<div id="content">

<P>MONEY:</P>
<form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>?page=money&action=add_money" method="post">

Add money :<input type="number" name="money" id="money" placeholder="Money" min="0" max="9999" required oninvalid="setCustomValidity('Please input your money.');" oninput="setCustomValidity('');">
<BR><BR>
<button type="submit" id="sumbit" name="submit">Confirmer</button>
<button type="reset">Reset</button>
</form>

</div>
