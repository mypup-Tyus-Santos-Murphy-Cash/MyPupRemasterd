<?php

require "header.php";

?>

<main>
<h1>Signup!</h1>
    <form action="includes/signup.inc.php" method="post">
        <input type="text" name="uid" placeholder="Username">
        <input type="text" name="mail" placeholder="Email">
        <input type="password" name="pwd" placeholder="Password">
        <input type="password" name="pwd-repeat" placeholder="Re-enter password">
        <button type="submit" name="signup-submit">Signup</button>
    </form>
</main>

<?php

require "footer.php";

?>
