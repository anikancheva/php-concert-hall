function getAll() {
    fetch("http://localhost/php-concert-hall/src/services/loadConcerts.php")
        .then(resp => resp.json())
        .then(data => updateDashboard(data));
}

function updateDashboard(concerts) {
    let list = document.getElementById("dashboard");
    list.replaceChildren();
    for (let concert of concerts) {
        let item = document.createElement('li');

        let artist = document.createElement('p');
        artist.textContent = concert.artist;
        artist.className='name';

        let image = document.createElement('img');
        image.src = concert.img;

        let venue = document.createElement('p');
        venue.textContent = concert.venue;
        venue.style.display = 'none';

        let dates = document.createElement('p');
        dates.textContent = concert.dates;
        dates.style.display = 'none';

        let price = document.createElement('p');
        price.textContent = '$'+concert.price;
        price.style.display = 'none';


        let moreBtn = document.createElement('button');
        moreBtn.textContent = 'Show more';
        moreBtn.id='accordionBtn';
        moreBtn.addEventListener('click', showMore);

        item.append(artist, image, venue, dates, price, moreBtn);
        list.appendChild(item);

    }
}

function showMore(e) {
    let btn=e.target;
    let li = btn.parentElement;
    let hiddenElements=li.getElementsByTagName('p');
    let venue=hiddenElements[1];
    let dates=hiddenElements[2];
    let price=hiddenElements[3];

    if(venue.style.display==='none'){
        venue.style.display='';
        dates.style.display='';
        price.style.display='';
        btn.textContent='Show less';
    }else {
        venue.style.display='none';
        dates.style.display='none';
        price.style.display='none';
        btn.textContent='Show more';
    }
}