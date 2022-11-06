function getConcerts() {
    fetch('http://localhost/php-concert-hall/src/services/loadUserConcerts.php')
        .then(resp => resp.json())
        .then(data => updateTable(data))
}

function editView() {
    let editForm = document.createElement('form');
    editForm.method = 'POST';
    editForm.onsubmit = validate;
    editForm.innerHTML = 'First Name:<br>\n' +
        '            <input type="text" name="firstName" value="">\n' +
        '        <br>\n' +
        '        <p id="errFirst" style="display: none; color: red">* Name can\'t be empty!</p>\n' +
        '        Last Name:<br>\n' +
        '            <input type="text" name="lastName" value="">\n' +
        '        <br>\n' +
        '        <p id="errLast" style="display: none; color: red">* Name can\'t be empty!</p>\n' +
        '       New Password:<br>\n' +
        '            <input type="password" name="password" value="">\n' +
        '        <br>\n' +
        '        <p id="errPass" style="display: none; color: red">* Password can\'t be empty!</p>\n' +
        '        Confirm New Password:<br>\n' +
        '            <input type="password" name="conf-pass" value="">\n' +
        '        <br>' +
        '       <p id="errConfPass" style="display: none; color: red">* Passwords don\'t match!</p>\n' +
        '           <input id="updateBtn" type="submit" value="Update">';

    let userDiv = document.getElementById('user-events');
    if (userDiv) {
        userDiv.style.display = 'none';
    }
    document.getElementById('editProfile').replaceChildren(editForm);
}

function validate(e) {
    e.preventDefault();
    let form = new FormData(document.querySelector('form'));
    let first = form.get('firstName');
    let last = form.get('lastName');
    let password = form.get('password');
    let confPass = form.get('conf-pass');

    let errFirst = document.getElementById('errFirst');
    let errLast = document.getElementById('errLast');
    let errPass = document.getElementById('errPass');
    let errConfPass = document.getElementById('errConfPass');

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

    if (validFirst && validLast && validPass && validConfPass) {
        editProfile({first, last, password});
    }
}

function editProfile(userData) {

    fetch('http://localhost/php-concert-hall/src/services/editUser.php', {
        method: 'POST',
        body: JSON.stringify(userData)
    });

    alert('You successfully updated you personal information!');
    window.location.href = '../views/profile.php';
}

function updateTable(concerts) {
    let div = document.getElementById('user-events');
    if (concerts.length === 0) {
        document.getElementById('noEvents').style.display = '';
    } else {
        let table = document.createElement('table');
        table.innerHTML = '<tr><th>Artist</th><th>Venue</th><th>Dates</th><th>Price</th><th></th></tr>';
        for (let c of concerts) {
            let tr = document.createElement('tr');

            let tdName = document.createElement('td');
            tdName.textContent = c.artist;

            let tdVenue = document.createElement('td');
            tdVenue.textContent = c.venue;

            let tdDates = document.createElement('td');
            tdDates.textContent = c.dates;

            let tdPrice = document.createElement('td');
            tdPrice.textContent = "$" + c.price;

            let tdImg = document.createElement('td');
            let img = document.createElement('img');
            img.src = c.img;
            img.height = 100;
            tdImg.append(img);

            tr.append(tdName, tdVenue, tdDates, tdPrice, tdImg);
            table.append(tr);
        }
        div.append(table);
    }
}