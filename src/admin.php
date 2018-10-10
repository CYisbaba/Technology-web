<form action="upload.php" method="post" enctype="multipart/form-data">
name : <input type="text" name="name" placeholder="Product name" id="name" maxlength="20" required oninvalid="setCustomValidity('Cannot be empty.');" oninput="setCustomValidity('');">
<BR><BR>
number : <input type="number" name="number" placeholder="Number" id="number" min="0" max="999" required oninvalid="setCustomValidity('Cannot be empty.');" oninput="setCustomValidity('');">
<BR><BR>
price : <input type="text" name="price" placeholder="Number" id="number" pattern="^[0-9]+(.[0-9]{2})?$" required oninvalid="setCustomValidity('Cannot be empty.');" oninput="setCustomValidity('');">
<BR><BR>
image : <input name="img" type="file" id="img" accept="image/*" required oninvalid="setCustomValidity('Cannot be empty.');" oninput="setCustomValidity('');">
<BR><BR>
description :
<div>
<textarea name="description" id="description" maxlength="100" rows=10 cols=40 required oninvalid="setCustomValidity('Cannot be empty.');" oninput="setCustomValidity('');">
</TEXTAREA></div>
<BR><BR>
<button type="submit">Confirmer</button>
<button type="reset">Reset</button>
<a href="logout.php?action=logout" style="color:red">LOGOUT</a>
</form>