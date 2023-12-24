<?php

if(!session_id()){
    session_start();
}
?>
<!DOCTYPE html>
<!-- Coding By CodingNepal - codingnepalweb.com -->
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Registration or Sign Up form in HTML CSS | CodingLab </title>
    <link rel="stylesheet" href="assets/styles/registerstyle.css">
</head>

<body>
<div class="wrapper">
    <h2>Personnel Information</h2>
    <form action="?route=updateprofile" method="POST">
        <div class="input-box" style="margin-top: 1.5rem;">
            <label> Update your name </label>
            <input type="text" name="name" value="<?= @$_SESSION['name']?>" required>
        </div>
        <div class="input-box" style="margin-top: 1.5rem;">
            <label> Change your Email </label>
            <input type="text" name="email" value="<?= @$_SESSION['email']?>" required>
        </div>
        <div class="input-box" style="margin-top: 1.5rem;">
            <label> Change your password </label>
            <input type="text" name="password" value="" required>
        </div>
        <div class="input-box button" style="margin-top: 3rem;">
            <input type="submit" name="updateProfile" value="save change">
        </div>

        <div class="input-box  ">
            <input type="Submit" name="deleteAccount" value="delete account">
        </div>
        <a href="../index.php" class="nav-link text-white-50"> <-Precedent </a>

    </form>
</div>
</body>

</html>