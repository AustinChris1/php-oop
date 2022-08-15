<?php

require_once "databases/app.php";
require_once "controllers/authController.php";

$authenticated = new AuthenticationController;

$data = $authenticated->authUserDetail();
include "header.php";
?>
<div class="py-5 mt-5">
    <div class="container">
        <?php include "message.php";?>
        <h1>Profile Page</h1> <hr>
        <?= $data['email']?>
    </div>
</div>
<?php
include "footer.php";
?>
</body>
</html>