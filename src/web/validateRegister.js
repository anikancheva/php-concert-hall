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

    let userExistsErr = document.getElementById('userExists');
    if (userExistsErr.style.display === '') {
        userExistsErr.style.display = 'none';
    }

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
    fetch('../services/register.php', {
        method: 'POST',
        body: JSON.stringify(body)
    })
        .then(resp=> {
            if(resp.status===200){
                window.location.href = "../views/home.php";
            }else if(resp.status===400){
                document.getElementById('userExists').style.display = '';
            }
        })
}