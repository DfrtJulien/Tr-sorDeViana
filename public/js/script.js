
const img = document.getElementById('imgUser');
const showContainer = document.getElementById('showContainer');
const closeIcon = document.getElementById('closeContainerIcon');


img.addEventListener('click', toggleShow);

function toggleShow(){
    showContainer.classList.toggle('hidden');
}


closeIcon.addEventListener('click', removeContainer);


function removeContainer(){
    showContainer.classList.add('hidden');
}

document.addEventListener('click', (event) => {
    if(!showContainer.classList.contains('hidden') && event.target !== img && event.target !== showContainer){
        showContainer.classList.add('hidden');
    } 
});

