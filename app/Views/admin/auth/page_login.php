<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<style>
html {
    height: 100%;
}

.login-box {
    position: absolute;
    top: 50%;
    left: 50%;
    width: 400px;
    padding: 40px;
    transform: translate(-50%, -50%);
    background: rgba(0, 0, 0, .5);
    box-sizing: border-box;
    box-shadow: 0 15px 25px rgba(0, 0, 0, .6);
    border-radius: 10px;
}

.login-box h2 {
    margin: 0 0 30px;
    padding: 0;
    color: #fff;
    text-align: center;
}

.login-box .user-box {
    position: relative;
}

.login-box .user-box input {
    width: 100%;
    padding: 10px 0;
    font-size: 16px;
    color: #fff;
    margin-bottom: 30px;
    border: none;
    border-bottom: 1px solid #fff;
    outline: none;
    background: transparent;
}

.login-box .user-box label {
    position: absolute;
    top: 0;
    left: 0;
    padding: 10px 0;
    font-size: 16px;
    color: #fff;
    pointer-events: none;
    transition: .5s;
}

.login-box .user-box input:focus~label,
.login-box .user-box input:valid~label {
    top: -20px;
    left: 0;
    color: #03e9f4;
    font-size: 12px;
}

.login-box form a {
    position: relative;
    display: inline-block;
    padding: 10px 20px;
    color: #03e9f4;
    font-size: 16px;
    text-decoration: none;
    text-transform: uppercase;
    overflow: hidden;
    transition: .5s;
    margin-top: 40px;
    letter-spacing: 4px
}

@keyframes hoverAnimation {
    0% {
        background-color: initial;
        color: initial;
        box-shadow: none;
    }

    100% {
        background-color: rgba(255, 255, 255, 0.86);
        color: black;
        box-shadow: 0 5px 7px rgba(0, 0, 0, 0.5);
    }
}

.button_login {
    width: 100%;
}

.button_login .btn-login {
    transition: all 0.3s ease;
    width: 100%;
    object-fit: cover;
    background: transparent;
    color: white;
    padding: .5rem 0;
    border: 0px solid white;
    border-radius: 10px;
    cursor: pointer;
}

.button_login .btn-login:hover {
    animation: hoverAnimation 0.4s forwards;
}

.kolom_error {
    width: 100%;
    background-color: rgba(255, 100, 100, 0.8);
    justify-content: center;
    border-radius: 20px;
}

.kolom_error .text-error {
    padding: .5rem 0;
}
</style>

<body>
    <div class="login-box">
        <h2>Login</h2>
        <?php if (session()->get('error')): ?>
        <div id="errorContainer" class="kolom_error">
            <p class="text-error" align="center"><?php echo session()->get('error'); ?></p>
        </div>
        <?php endif; ?>
        <form action="<?= base_url('auth/login') ?>" method="post">
            <div class="user-box">
                <input type="text" name="username" required>
                <label>Username</label>
            </div>
            <div class="user-box">
                <input type="password" name="password" required>
                <label>Password</label>
            </div>
            <div class="button_login">
                <button class="btn-login">Sign In</button>
            </div>
        </form>
    </div>

    <script>
    document.addEventListener("DOMContentLoaded", function() {
        const errorContainer = document.getElementById('errorContainer');

        // Show the error message
        errorContainer.style.display = 'block';

        // Hide the error message after 4 seconds (4000 milliseconds)
        setTimeout(function() {
            errorContainer.style.display = 'none';
        }, 3000);
    });
    </script>
</body>

</html>