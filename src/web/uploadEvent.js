function uploadEvent(event){
    event.preventDefault();
    let form=new FormData(event.target);

    fetch('../services/uploadEvent.php', {
        method: 'POST',
        body: form
    })
        .then(res=> {
            if (res.status===400){
                alert('Invalid input data!')
            }else if (res.status===401){
                alert('Duplicate data!')
            }else if (res.status===200){
                alert('Successfully added event!');
                window.location.href='../views/home.php';
            }
        })

}