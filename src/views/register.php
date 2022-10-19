<?php
require_once "header.php";

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
        height: 650px;
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
        margin-top: 60pt;
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
        height: 40px;
        width: 100%;
        background-color: rgba(255,255,255,0.07);
        border-radius: 3px;
        padding: 0 10px;
        margin-top: 6px;
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
<!-- Register Form -->
<main>
<div class="background">
    <div class="shape"></div>
    <div class="shape"></div>
</div>
<div class="register">
    <form id="regForm" action="" method="post" onsubmit="validate(event)">
        <label for="firstName">First Name:
            <input type="text" name="firstName" value="">
        </label><br>
        <p id="errFirst" style="display: none; color: red">* Name can't be empty!</p>
        <label for="lastName">Last Name:
            <input type="text" name="lastName" value="">
        </label><br>
        <p id="errLast" style="display: none; color: red">* Name can't be empty!</p>
        <label for="email">Email:
            <input type="text" name="email" value="">
        </label><br>
        <p id="errEmail" style="display: none; color: red">* Invalid email!</p>
        <label for="password">Password:
            <input type="password" name="password" value="">
        </label><br>
        <p id="errPass" style="display: none; color: red">* Password can't be empty!</p>
        <label for="conf-pass">Confirm Password:
            <input type="password" name="conf-pass" value="">
        </label><br>
        <p id="errConfPass" style="display: none; color: red">* Passwords don't match!</p>
        <input type="submit" value="Register">
    </form>
</div>
</main>
<!-- TODO add JS validation -->

<script>
    function validate(e) {
        e.preventDefault();
        let form = new FormData(document.getElementById('regForm'));
        let first = form.get('firstName');
        let last = form.get('lastName');
        let email = form.get('email');
        let password = form.get('password');
        let confPass = form.get('conf-pass');

        let errFirst = document.getElementById('errFirst');
        let errLast = document.getElementById('errLast');
        let errEmail = document.getElementById('errEmail');
        let errPass = document.getElementById('errPass');
        let errConfPass = document.getElementById('errConfPass');

        let validEmail = false;
        let validPass = false;
        let validConfPass = false;
        let validFirst = false;
        let validLast = false;

        if (first == null || first.trim() === '') {
            errFirst.style.display = '';
        } else {
            errFirst.style.display = 'none';
            validFirst = true;
        }
        if (last == null || last.trim() === '') {
            errLast.style.display = '';
        } else {
            errLast.style.display = 'none';
            validLast = true;
        }
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

        if (password !== confPass) {
            errConfPass.style.display = '';
        } else {
            validConfPass = true;
        }

        if (validFirst && validLast && validEmail && validPass && validConfPass) {
            submit({first, last, email, password});
        }
    }

    function submit(body) {
        let xhttp = new XMLHttpRequest();
        xhttp.open('POST', 'register');
        xhttp.onreadystatechange = function () {
            if (xhttp.readyState === 4) {
                let host = 'http://localhost/php-concert-hall/';
                window.location.href = xhttp.responseURL.replace(host, "");
            }
        }
        xhttp.send(JSON.stringify(body));
    }

</script>