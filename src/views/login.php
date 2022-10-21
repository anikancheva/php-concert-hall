<?php
require_once "header.php";
var_dump($_SESSION);

?>
<style media="screen">
    *,
    *:before,
    *:after{
        padding: 0;
        margin: 0;
        box-sizing: border-box;
    }
    .background{
        width: 430px;
        height: 520px;
        position: absolute;
        transform: translate(-50%,-50%);
        left: 50%;
        top: 50%;
    }
    .background .shape{
        height: 200px;
        width: 200px;
        position: absolute;
        border-radius: 50%;
    }
    .shape:first-child{
        background: linear-gradient(
                #1845ad,
                #23a2f6
        );
        left: -80px;
        top: -80px;
    }
    .shape:last-child{
        background: linear-gradient(
                to right,
                #ff512f,
                #f09819
        );
        right: -30px;
        bottom: -80px;
    }
    form{
        height: 420px;
        width: 400px;
        background-color: rgba(255,255,255,0.13);
        position: absolute;
        transform: translate(-50%,-50%);
        top: 50%;
        left: 50%;
        border-radius: 10px;
        backdrop-filter: blur(10px);
        border: 2px solid rgba(255,255,255,0.1);
        box-shadow: 0 0 40px rgba(8,7,16,0.6);
        padding: 50px 35px;
    }
    form *{
        font-family: 'Poppins',sans-serif;
        color: #ffffff;
        letter-spacing: 0.5px;
        outline: none;
        border: none;
    }
    form h3{
        font-size: 32px;
        font-weight: 500;
        line-height: 42px;
        text-align: center;
    }

    label{
        display: block;
        margin-top: 10px;
        font-size: 16px;
        font-weight: 500;
    }
    input{
        display: block;
        height: 50px;
        width: 100%;
        background-color: rgba(255,255,255,0.07);
        border-radius: 3px;
        padding: 0 10px;
        margin-top: 8px;
        font-size: 14px;
        font-weight: 300;
    }
    ::placeholder{
        color: #e5e5e5;
    }
    button{
        margin-top: 50px;
        width: 100%;
        background-color: #ffffff;
        color: #080710;
        padding: 15px 0;
        font-size: 18px;
        font-weight: 600;
        border-radius: 5px;
        cursor: pointer;
    }
    p{
        font-size: small;
        margin-bottom: 10pt;
        margin-top: -10pt;
    }

</style>
<!-- Login Form -->
<main>
<div class="background">
    <div class="shape"></div>
    <div class="shape"></div>
</div>
<div class="login">
    <form id="loginForm" method="post" action="login" onsubmit="validate(event)">
        <label for="email">Email:
            <input type="text" name="email" value="">
        </label><br>
        <p id="errEmail" style="display: none; color: red">* Invalid email!</p>
        <label for="password">Password:
            <input type="password" name="password" value="">
        </label><br>
        <p id="errPass" style="display: none; color: red">* Password can't be empty!</p>
        <input type="submit" value="Login">
    </form>
</div>
</main>
<script>
    function validate(e) {
        e.preventDefault();
        let form = new FormData(document.getElementById('loginForm'));
        let email = form.get('email');
        let password = form.get('password');

        let errEmail = document.getElementById('errEmail');
        let errPass = document.getElementById('errPass');

        let validEmail = false;
        let validPass = false;

        if (!email.match(/^\w+([.-]?\w+)*@\w+([.-]?\w+)*(\.\w{2,3})+$/)) {
            errEmail.style.display = '';
        } else {
            errEmail.style.display = 'none';
            validEmail = true;
        }

        if (password == null || password.trim() === '') {
            errPass.style.display = '';
        } else {
            errPass.style.display = 'none';
            validPass = true;
        }

        if (validEmail && validPass) {
            submit({email, password});
        }
    }
    function submit(body) {
        let xhttp = new XMLHttpRequest();
        xhttp.open('POST', 'login');
        xhttp.onreadystatechange = function () {
            if (xhttp.readyState === 4) {
                let host = 'http://localhost/php-concert-hall/';
                window.location.href = xhttp.responseURL.replace(host, "");
            }
        }
        xhttp.send(JSON.stringify(body));
    }

</script>