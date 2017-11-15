const tags = document.querySelectorAll('.tags__btn');

for(let i = 0; i < tags.length; i++) {
    tags[i].addEventListener('click', function(e) {
        e.preventDefault();
        tags[i].classList.toggle('tags__btn--active');
        dataId = tags[i].getAttribute('data-id');
        ajaxData = 'json={"AJAX":true,"tag_id":' + dataId + '}';
        console.log(ajaxData);
        newXhr(ajaxData);
    });
}

function newXhr(elem) {
    let xhr;

    if (window.XMLHttpRequest) { // Mozilla, Safari, ...
        xhr = new XMLHttpRequest();
    } else if (window.ActiveXObject) { // IE 8 and older
        xhr = new ActiveXObject("Microsoft.XMLHTTP");
    }

    let data = elem;
    xhr.open("POST", "index.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.send(data);

    xhr.onreadystatechange = display_data;
    function display_data() {
        if (xhr.readyState == 4) {
            if (xhr.status == 200) {
                //alert(xhr.responseText);	   
                console.log(xhr.responseText);
                document.querySelector('#entries').innerHTML = xhr.responseText;
            } else {
                alert('There was a problem with the request.');
            }
        }
    }
}

