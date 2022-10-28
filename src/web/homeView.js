function getAll(loggedUser) {
    fetch("http://localhost/php-concert-hall/src/services/loadAllConcerts.php")
        .then(resp => resp.json())
        .then(data => updateDashboard(data, loggedUser));

}

function updateDashboard(concerts, user) {
    let list = document.getElementById("dashboard");
    list.replaceChildren();
    let cards = user ? concerts.length : 3;
    for (let concert = 0; concert < cards; concert++) {
        let item = document.createElement('li');

        let artist = document.createElement('p');
        artist.textContent = concerts[concert].artist;
        artist.className = 'name';

        let image = document.createElement('img');
        image.src = concerts[concert].img;

        let venue = document.createElement('p');
        venue.textContent = concerts[concert].venue;

        let dates = document.createElement('p');
        dates.textContent = concerts[concert].dates;

        if (user === 1) {
            let deleteBtn = document.createElement('button');
            deleteBtn.textContent = 'Delete';
            deleteBtn.className='adm';
            deleteBtn.addEventListener('click', deleteEvent);
            item.append(deleteBtn, artist, image, venue, dates);
        } else {
            venue.style.display = 'none';
            dates.style.display = 'none';

            let price = document.createElement('p');
            price.textContent = '$' + concerts[concert].price;
            price.style.display = 'none';


            let moreBtn = document.createElement('button');
            moreBtn.textContent = 'Details';
            moreBtn.id = 'accordionBtn';
            moreBtn.addEventListener('click', showMore);

            item.append(artist, image, venue, dates, price, moreBtn);
        }

        list.appendChild(item);

    }

    let prompt = document.getElementById('prompt');
    prompt.style.display = user ? 'none' : '';
    if (user === 1) {
        document.getElementById('headlines').style.display = 'none';
        document.getElementById('addBtn').style.display = '';
    }
}

function showMore(e) {
    let btn = e.target;
    let li = btn.parentElement;
    let hiddenElements = li.getElementsByTagName('p');
    let venue = hiddenElements[1];
    let dates = hiddenElements[2];
    let price = hiddenElements[3];

    if (venue.style.display === 'none') {
        venue.style.display = '';
        dates.style.display = '';
        price.style.display = '';
        btn.textContent = 'Hide';
    } else {
        venue.style.display = 'none';
        dates.style.display = 'none';
        price.style.display = 'none';
        btn.textContent = 'Details';
    }
}

function deleteEvent(event) {
    if (confirm('Are you sure you want to remove this event?')) {
        let card = event.target.parentElement;
        let artist = card.getElementsByTagName('p')[0].textContent;
        fetch("http://localhost/php-concert-hall/src/services/remove.php", {
            method: 'POST',
            body: JSON.stringify({artist})
        });
        card.remove();
    }


}

function addView() {
    let form = document.querySelector('form');
    if (form.style.display === 'none') {
        form.style.display = '';
    } else {
        form.style.display = 'none';
    }
}