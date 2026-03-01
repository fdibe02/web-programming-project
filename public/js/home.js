onLoadNews();

function openArticle(event){
  const card_id = event.currentTarget.dataset.id;

  window.location.assign('article/' + card_id);
}

const cards = document.querySelectorAll('.card');

for(const card of cards){

  card.addEventListener('click', openArticle);
}

function onResponse(response){
    if (!response.ok) 
      return null;

    return response.json();
}

function onJsonCheck(json){

  if(json) console.log(json);
  
}

let dislikedCard = null;

function onDislikeClick(event) {
    dislikedCard = event.currentTarget.parentNode.parentNode.parentNode.parentNode;

    const dislikeModal = document.querySelector("#dislike-modal");
    dislikeModal.classList.remove("hidden");
    document.body.classList.add("no-scroll");
    dislikeModal.style.top = window.pageYOffset + "px";

    event.stopPropagation();
  }

  const dislikeList = document.querySelectorAll(".dislike");
  
  for(const dislike of dislikeList){
    dislike.addEventListener("click", onDislikeClick);
  }
  
  function onUndoClick() {
    const dislikeModal = document.querySelector("#dislike-modal");
    dislikeModal.classList.add("hidden");
    document.body.classList.remove("no-scroll");
  }

  const undo = document.querySelector("#undo");
  undo.addEventListener("click", onUndoClick);

  function onDoneClick() {
    removeFromLiked(dislikedCard);
    addToDislikedArticles(dislikedCard);
    dislikedCard.remove();
    onUndoClick();
  }

  const done = document.querySelector("#done");
  done.addEventListener("click", onDoneClick);

  function addToDislikedArticles(card){
    const card_id = card.dataset.id;

    const form_data = new FormData();
    form_data.append('card_id', card_id);
    form_data.append('_token', csrf_token);


    fetch(BASE_URL + "profile/add-dislike", {method: 'post', body: form_data}).then(onResponse).then(onJsonCheck);
    
  }

 
function onLoadNews(){
  fetch(BASE_URL + "home/news").then(onResponse).then(onJsonNews);
  }
  
  function onJsonNews(json){
  
  const news_section = document.getElementById('news-section')
  const section_title = document.createElement('h2');
  news_section.appendChild(section_title);
  section_title.textContent = "News by NY Times";
  
  for(let i = 0; i < 10; i++){
    const side_card = document.createElement('div');
    side_card.classList.add('side-card');
    news_section.appendChild(side_card);
  
  
    const side_author_section = document.createElement('div');
    side_author_section.classList.add('side-author');
    side_card.appendChild(side_author_section);
  
      
    const ny_times_logo = document.createElement('img');
    ny_times_logo.src = "https://1000logos.net/wp-content/uploads/2017/04/Symbol-New-York-Times.png";
    side_author_section.appendChild(ny_times_logo);
   
    const by_line = document.createElement('div');
    by_line.textContent = json.results[i].byline;
    side_author_section.appendChild(by_line);
      
  
    const news_headline = document.createElement('h3');
    news_headline.textContent = json.results[i].title;
    side_card.appendChild(news_headline);
    
  
    const news_date = document.createElement('div');
    news_date.classList.add('date');
    const unformatted_date = json.results[i].published_date;
    const formatted_date = writeDate(unformatted_date);
    news_date.textContent = formatted_date;
    side_card.appendChild(news_date);
    }
}

function writeDate(date){
  const month_number = date.substring(5, 7);
  const months = [ "January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December" ];
      
  const month = months[month_number-1];
  const day = date.substring(8);
  const news_date = 'published on ' + month + ', ' + day; 
      
  return news_date;
}
  
  
  function onLikeClick(event){
   const addButton = event.currentTarget;
   const card = event.currentTarget.parentNode.parentNode.parentNode.parentNode.parentNode;
   const isAdded = addButton.dataset.added;
   const n_likes = card.querySelector('.likes .n');

   if(isAdded === 'true'){
      addButton.innerHTML = '&#10133;';
      n_likes.innerHTML = parseInt(n_likes.innerHTML) - 1;
      addButton.dataset.added = 'false';
      removeFromLiked(card);
   }else{
    addButton.innerHTML="&#11088;";
    n_likes.innerHTML = parseInt(n_likes.innerHTML) + 1;
    addButton.dataset.added = 'true';
    addToLiked(card);
   }

   event.stopPropagation();

  }

  const likeButtons = document.querySelectorAll(".add-like");

  for(const likeButton of likeButtons){
    likeButton.addEventListener("click", onLikeClick);
  }

function addToLiked(card){
  const card_id = card.dataset.id;

  form_data = new FormData();
  form_data.append('card_id', card_id);
  form_data.append('_token', csrf_token);

  fetch(BASE_URL + "profile/add-like", {method: 'post', body: form_data}).then(onResponse).then(onJsonCheck);
}

function removeFromLiked(card){
  const card_id = card.dataset.id;

  form_data = new FormData();
  form_data.append('card_id', card_id);
  form_data.append('_token', csrf_token);

  fetch(BASE_URL + "profile/remove-like", {method: 'post', body: form_data}).then(onResponse).then(onJsonCheck);
}

  
function onTopicClick(event){
  const topic_text = event.currentTarget.textContent;
  window.location.assign(BASE_URL + 'home/' + topic_text);
}

const topics = document.querySelectorAll('.topic');

for(const topic of topics){
  topic.addEventListener('click', onTopicClick);
}





  




  
  


  
  