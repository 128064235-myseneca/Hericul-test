<?php include "includes_frontend/header.php" ?>

<div class="container-bg">
    <div class="overlay overlay-main position-absolute " style="z-index : -1;"></div>
    <div class="heading-main m-auto position-absolute">
    </div>

    <div id = "container" class="main-container m-auto">
        <div class="sub-container p-5 pl-0">
            <h1 class="login-title mb-3">Welcome</h1>
            <p class="login-detail mb-2">Lorem ipsum incididunt ut labore et dolore magna aliqua. Lorem ipsum dolor sit amet,
                consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim
                ad
                minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis
                aute
                irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur
                sint
                occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
            <a href="#">
                <button class="btn-custom mt-4" type="button" name="Teacher" onclick="signin()">SIGN IN AS A HOST</button>
            </a>
        </div>

        <div class="sub-container p-5 pr-0">
            <h1 class="login-title mb-3">Login</h1>
            <form class="login-detail login-form" action="admin/loginHandleUser.php" method="post">
                <div class="form-row">
                    <label for="your_email">Username</label>
                    <input type="text" name="uid" placeholder="Username" required>
                    <label for="password">Password</label>
                    <input type="password" name="pwd" class="input-text" placeholder="Password" required>
                </div>
                <div class="form-footer">
                    <input type="checkbox" name="login-remember">&nbsp;&nbsp;<label for="login-remember">Remember
                        password</label><br>
                    <a class="text-danger" href="#">Forgot password?</a>
                </div>
                <input class="btn-custom" type="submit" name="submit" value="SIGN IN">
            </form>
        </div>
    </div>
</div>

<script>
    function signin(){
        document.getElementById('container').innerHTML= "<div class=\"sub-container p-5 pr-0\">\n" +
            "            <h1 class=\"login-title mb-3\">Login as Host</h1>\n" +
            "            <form class=\"login-detail login-form\" action=\"admin/loginHandle.php\" method=\"post\">\n" +
            "                <div class=\"form-row\">\n" +
            "                    <label for=\"your_email\">Username</label>\n" +
            "                    <input type=\"text\" name=\"uid\" placeholder=\"Username\" required>\n" +
            "                    <label for=\"password\">Password</label>\n" +
            "                    <input type=\"password\" name=\"pwd\" class=\"input-text\" placeholder=\"Password\" required>\n" +
            "                </div>\n" +
            "                <div class=\"form-footer\">\n" +
            "                    <input type=\"checkbox\" name=\"login-remember\">&nbsp;&nbsp;<label for=\"login-remember\">Remember\n" +
            "                        password</label><br>\n" +
            "                    <a class=\"text-danger\" href=\"#\">Forgot password?</a>\n" +
            "                </div>\n" +
            "                <input class=\"btn-custom\" type=\"submit\" name=\"submit\" value=\"SIGN IN\">\n" +
            "            </form>\n" +
            "        </div>        <div class=\"sub-container p-5 pl-0\">\n" +
            "            <h1 class=\"login-title mb-3\">Welcome</h1>\n" +
            "            <p class=\"login-detail mb-2\">Lorem ipsum incididunt ut labore et dolore magna aliqua. Lorem ipsum dolor sit amet,\n" +
            "                consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim\n" +
            "                ad\n" +
            "                minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis\n" +
            "                aute\n" +
            "                irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur\n" +
            "                sint\n" +
            "                occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\n" +
            "            <a href=\"#\">\n" +
            "                <button class=\"btn-custom mt-4\" type=\"button\" name=\"Teacher\" onclick=\"document.location.reload(true)\">SIGN IN AS A TOURIST</button>\n" +
            "            </a>\n" +
            "        </div>";
    }
</script>
</body>
</html>
