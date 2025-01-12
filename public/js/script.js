
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
        canva.style.transform = 'translateY(0)';
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

if(document.getElementById('footerCategory')){
    const category = document.getElementById('footerCategory');

    category.addEventListener('click', showUlFooter);
}

function showUlFooter() {
    const footerUl = document.getElementById('footerUl');
    if(!footerUl.classList.contains('hide')){
        footerUl.classList.add("hide");
    }else {
        footerUl.classList.remove("hide");
        footerUl.classList.add("show2");
    }
   
}

if(document.getElementById('footerService')){
    const service = document.getElementById('footerService');

    service.addEventListener('click', showService);
}

function showService() {
    const footerService = document.getElementById('footerContact');
    if(!footerService.classList.contains('hide')){
        footerService.classList.add("hide");
    }else {
        footerService.classList.remove("hide");
        footerService.classList.add('show2');
    }
   
}




if(document.getElementById('moreArticle')){
    const moreArticle = document.getElementById('moreArticle');
    const articles = document.querySelectorAll('.moreArticleArticle');
    // je récupere le nombre d'article total
    const totalArticles = articles.length;
    // je calcul le temps de l'aniamtion pour que chaque article soit affiché 2s
    const animationDuration = totalArticles * 2

    // Je modifie la durée de l'animation en fonction du nombre d'articles
    moreArticle.style.animationDuration = `${animationDuration}s`;
}
