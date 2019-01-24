<?php
require "view/header.php";



echo "this is body";

require "view/footer.php";
?>
<form action="http://khalid/help/post" method="post">
    <input type="text" name="name">
    <input type="email" name="email">
    <input type="password" name="password">
    <input type="submit" value='submit' name="submit">
</form>