function onSubmitClick(event){
    const title = document.getElementById('article-title');
    const content = document.getElementById('content');

    if(!(title.value.length > 0) || !(content.value.length > 0)){
        event.preventDefault();
    }  
}

function onResponse(response){
    if (!response){
        return null;
    }
    return response.json();
}

function onJson(json){
    const container = document.getElementById('container');
    const image = document.createElement('img');
    image.dataset.selected = 'false';
    image.src = json.urls.small;
    image.addEventListener('click', onImageClick);
    container.appendChild(image);
}

let last_title = "";

function loadImages(event){

    const title = event.currentTarget.value;
    const container = document.getElementById('container');

    if(title !== last_title){
        last_title = title;
        container.innerHTML = "";

        for(let i = 0; i<4; i++){
        fetch(BASE_URL + 'write/get-image/' + title, ).then(onResponse).then(onJson);
    }

    }else return;
   
}

function onImageClick(event){
    const image = event.currentTarget;
    const isSelected = image.dataset.selected;

    checkSelection();

    if(isSelected === 'false')
        addSelected(image);

    else if(isSelected === 'true') removeSelected(image)

}

function addSelected(image){
    image.dataset.selected = 'true';
    image.classList.add('selected');
    imageInput.value = image.src;
    
}

function removeSelected(image){
    image.dataset.selected = 'false';
    image.classList.remove('selected');
}

function checkSelection(){
    const images = document.querySelectorAll('#container img');

    for(const img of images){
        if(img.dataset.selected === 'true') removeSelected(img);
    }
}

const form = document.getElementById('write-article');
form.addEventListener('submit', onSubmitClick);

const title_box = document.getElementById('article-title');
title_box.addEventListener('blur', loadImages);

const imageInput = document.querySelector('#image-input');