function validate(e) {
    e.preventDefault();
    let form = new FormData(document.getElementById('loginForm'));
    let email = form.get('email');
    let password = form.get('password');

    let errEmail = document.getElementById('errEmail');
    let errPass = document.getElementById('errPass');
    let noUserErr = document.getElementById('noUser');
    if (noUserErr.style.display === '') {
        noUserErr.style.display = 'none';
    }

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
    let loginReq = new XMLHttpRequest();
    loginReq.open('POST', '../services/login.php');
    loginReq.onreadystatechange = function () {
        if (loginReq.readyState === 4 && loginReq.status === 200) {
            window.location.href = "../views/home.php";
        } else if (loginReq.readyState === 4 && loginReq.status === 400) {
            document.getElementById('noUser').style.display = '';
        }
    }
    loginReq.send(JSON.stringify(body));
}