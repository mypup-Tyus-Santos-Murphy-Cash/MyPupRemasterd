
<?php
require "header.php";
?>

<main class="sign">
<div class="main-container">

    <header class="container my-5"></header>
    <div class="jumbotron-sign">
        <h1 class="text-left text-light mx-4.5 display-1" id="h1-sign-up">Sign Up</h1>
    </div>

    <div class="card-container form-container">
        <div class="card bg-light text-dark col-xl-6">
            <div class="card-body sign-up-form">
                <h5 class="card-title user-Form-Text">User Sign Up</h5>
                <hr>
            <form action="includes/signup.inc.php" method="POST">
                <input type="text" name="uid" placeholder="Username"/>
                    <input type="text" name="mail" placeholder="Email"/>
                        <input type="password" name="pwd" placeholder="Password"/>
                            <input type="password" name="pwd-repeat" placeholder="Re-enter password"/>
                                <input type="text" name="phone-number" placeholder="phone number"/>
                                    <input type="text" name="city" placeholder="city"/>
                                        <input type="text" name="state" placeholder="state"/>
                                            <input type="text" name="zipcode" placeholder="zipcode"/>
                                                <select name="user-role">
                                                    <option value="breeder">Breeder</option>
                                                        <option value="buyer">Buyer</option>
                                                            <option value="admin">Admin</option>
                                                         </select>
                                                    <input type="text" name="image" placeholder="image">
                                                <button type="submit" name="signup-submit">Sign me up!</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </main>

<?php
require "footer.php";
?>