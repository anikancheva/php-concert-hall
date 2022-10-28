function getConcerts() {
    fetch('http://localhost/php-concert-hall/src/services/loadUserConcerts.php')
        .then(resp => resp.json())
        .then(data => updateTable(data))
}

function editView() {

}

function editProfile() {

}

function updateTable(concerts) {
    let div = document.getElementById('user-events');
    if (concerts.length === 0) {
        document.getElementById('noEvents').style.display = '';
    } else {
        let table = document.createElement('table');
        table.innerHTML='<tr><th>Artist</th><th>Venue</th><th>Dates</th><th>Price</th></tr>';
        for (let c of concerts){
            let tr=document.createElement('tr');

            let tdName=document.createElement('td');
            tdName.textContent=c.artist;

            let tdVenue=document.createElement('td');
            tdVenue.textContent=c.venue;

            let tdDates=document.createElement('td');
            tdDates.textContent=c.dates;

            let tdPrice=document.createElement('td');
            tdPrice.textContent=c.price;

            let tdImg=document.createElement('td');
            let img=document.createElement('img');
            img.src=c.img;
            img.height=50;
            tdImg.append(img);

            tr.append(tdName, tdVenue, tdDates, tdPrice, tdImg);
            table.append(tr);
        }
        div.append(table);
    }
}