const tags = document.querySelectorAll('.tags__btn');
let ajaxData = [];

for(let i = 0; i < tags.length; i++) {
    tags[i].addEventListener('click', function(e) {
        e.preventDefault();
        let data = toggleTag(tags[i]);
        data = 'json={"tag_id":[' + data + ']}';
        newXhr(data, '/api', true);
    });
}

function toggleTag(tag) {
    tag.classList.toggle('tags__btn--active');
    tagId = {
        'id': tag.getAttribute('data-id')
    }

    const indexInAjaxData = ajaxData.findIndex(function(elem) {
        return elem === tagId.id;
    });
    
    if (indexInAjaxData !== -1) {
        ajaxData.splice(indexInAjaxData, 1);
        return ajaxData;
    }

    ajaxData.push(tagId.id);
    return ajaxData;
}

function toggleFav(data) {
    const favBtn = document.querySelector(`[data-id='c${data}']`);
    favBtn.classList.toggle('blog__icon-fav--active');
    favBtn.classList.toggle('animate__flare');    
    data = 'id=' + data + '"';
    newXhr(data, '/api/fav', false);
}

function newXhr(elem, route, render) {
    let xhr;

    if (window.XMLHttpRequest) { // Mozilla, Safari, ...
        xhr = new XMLHttpRequest();
    } else if (window.ActiveXObject) { // IE 8 and older
        xhr = new ActiveXObject("Microsoft.XMLHTTP");
    }

    xhr.open("POST", route, true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.send(elem);

    if (render) {

        xhr.onreadystatechange = display_data;
        function display_data() {
            if (xhr.readyState == 4) {
                if (xhr.status == 200) {
                    document.querySelector('#entries').innerHTML = xhr.responseText;
                } else {
                    alert('There was a problem with the request.');
                }
            }
        }

    }
    
}

