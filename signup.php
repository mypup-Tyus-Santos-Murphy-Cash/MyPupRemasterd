<html lang="en">



<body class="sign">
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
                <form action="includes/signup.inc.php"method="POST">
                    <div class="col-xl-12">
                        <label for="userRole">Select User Role</label>

<!--                        <select>-->
<!--                            <option value="breeder">Breeder</option>-->
<!--                            <option value="buyer">Buyer</option>-->
                            <!--                            <option value="admin">Admin</option>-->
<!--                        </select>-->
                    </div>

                    <div class="col-xl-12">
                        <label for="username">Username</label>
                        <input type="text" name="uid" placeholder="Username">
                    </div>

                    <div class="col-xl-12">
                        <label for="pwd">Password</label>
                        <input type="password" name="pwd" placeholder="Password">
                    </div>

                    <div class="col-xl-12">
                        <label for="pwd-repeat"></label>
                        <input type="password" name="pwd-repeat" placeholder="Re-enter password">
                    </div>

                    <div class="col-xl-12">
                        <label for="mail">Email</label>
                        <input type="text" name="mail" placeholder="Email">
                    </div>

                    <div class="col-xl-12">
                        <label for="phoneNumber">Phone No.</label>
                        <input type="text" name="phoneNumber" placeholder="phone number"/>
                    </div>

                    <div class="col-xl-12">
                        <label for="city">City</label>
                        <input type="text" name="city" placeholder="city"/>
                    </div>

                    <div class="col-xl-12">
                        <label for="state">State</label>
                        <input th:field="*{state}"/>
                    </div>

                    <div class="col-xl-12">
                        <label for="zipcode">Zip Code</label>
                        <input th:field="*{zipcode}"/>
                    </div>


                    <div class="col-xl-12">
                        <button class="button photo-upload upload-photo" type="button" id="picker">Profile Image
                        </button>
                        <input class="move-right" name="fileupload" id="fileupload" th:field="*{profileImage}">
                    </div>

                    <div class="col-xl-12">
                        <input class="loginSign-btn sign-create-btn" value="Sign me up!" type="submit"/>
                    </div>
                </form>

            </div>

        </div>
    </div>

</div>
</body>
</html>
