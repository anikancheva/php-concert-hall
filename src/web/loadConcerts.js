function getAll(loggedUser) {
    fetch("http://localhost/php-concert-hall/src/services/loadConcerts.php")
        .then(resp => resp.json())
        .then(data => updateDashboard(data, loggedUser));
}

function updateDashboard(concerts, user) {
    let list = document.getElementById("dashboard");
    list.replaceChildren();
    let cards= user? concerts.length : 3;
    for (let concert=0; concert<cards; concert++) {
        let item = document.createElement('li');

        let artist = document.createElement('p');
        artist.textContent = concerts[concert].artist;
        artist.className='name';

        let image = document.createElement('img');
        image.src = concerts[concert].img;

        let venue = document.createElement('p');
        venue.textContent = concerts[concert].venue;
        venue.style.display = 'none';

        let dates = document.createElement('p');
        dates.textContent = concerts[concert].dates;
        dates.style.display = 'none';

        let price = document.createElement('p');
        price.textContent = '$'+concerts[concert].price;
        price.style.display = 'none';


        let moreBtn = document.createElement('button');
        moreBtn.textContent = 'Details';
        moreBtn.id='accordionBtn';
        moreBtn.addEventListener('click', showMore);

        item.append(artist, image, venue, dates, price, moreBtn);
        list.appendChild(item);

        let prompt=document.getElementById('prompt');
        prompt.style.display= user? 'none':'';
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
        btn.textContent='Hide';
    }else {
        venue.style.display='none';
        dates.style.display='none';
        price.style.display='none';
        btn.textContent='Details';
    }
}