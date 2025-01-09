
if(document.getElementById('hamburgerIcon')){
    const menuBurger = document.getElementById('hamburgerIcon');

    menuBurger.addEventListener('click', showCanva)
}

if(document.getElementById("closeIcon")){
    const closeIcon = document.getElementById("closeIcon");

    closeIcon.addEventListener('click', hideCanva)

}

function showCanva() {
    const canva = document.getElementById('offsetCanva');
    const closeIcon = document.getElementById("closeIcon");
    const menuBurger = document.getElementById('hamburgerIcon');
    if(!canva.classList.contains("show")){
        canva.classList.add('show');
        closeIcon.classList.add("show");
        menuBurger.classList.add('hide');
    }  
}

function hideCanva() {
    const closeIcon = document.getElementById("closeIcon");
    const canva = document.getElementById('offsetCanva');
    const menuBurger = document.getElementById('hamburgerIcon');

    if(!canva.classList.contains("hide")){
        canva.classList.remove('show');
        closeIcon.classList.remove("show");
        menuBurger.classList.remove('hide');
    }
}