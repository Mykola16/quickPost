document.getElementById('switchMode').querySelector('input').onclick = function () {
    let theme = document.getElementById("theme");

    if (theme) {
        if (theme.getAttribute('href') === "assets/styles/day.css") {
            theme.href = "assets/styles/night.css";
        } else {
            theme.href = "assets/styles/day.css";
        }
    }
}

let slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
    showSlides(slideIndex += n);
}

function currentSlide(n) {
    showSlides(slideIndex = n);
}

function showSlides(n) {
    let i;
    let slides = document.getElementsByClassName("mySlides");
    let dots = document.getElementsByClassName("dot");
    if (n > slides.length) {slideIndex = 1}
    if (n < 1) {slideIndex = slides.length}
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }
    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
    }
    slides[slideIndex-1].style.display = "block";
    dots[slideIndex-1].className += " active";
}

function showNextSlide() {
    slideIndex++;
    showSlides(slideIndex);
}

// let second = 1000*5;
// let TimerImage = setInterval(showNextSlide, second);
//
// let blockSlider = document.getElementById('blockSlider')
// blockSlider.addEventListener('mouseover',()=>{
//     clearInterval(TimerImage)
// })

blockSlider.addEventListener('mouseleave',()=>{
    TimerImage = setInterval(showNextSlide, second);
})









// Отримайте модаль
var modal = document.getElementById("myModal");


// Отримати кнопку, яка відкриває модаль
var btn = document.getElementById("myBtn");


// Коли користувач натискає кнопку, відкривається модальний
btn.onclick = function() {
    modal.style.display = "block";
    document.body.classList.add('modal-open');
}



// Коли користувач клацає будь-де за межами модального, закрийте його
window.onclick = function(event) {
    if (event.target === modal) {
        modal.style.display = "none";
        document.body.classList.remove('modal-open');
    }
}






function showSubCategories(categoryId) {
    // Скрыть все подкатегории
    var subcategoryLists = document.querySelectorAll('.subcategories');
    subcategoryLists.forEach(function(list) {
        list.style.display = 'none';
    });

    // Показать подкатегории выбранной категории
    var selectedList = document.getElementById('subcategories-' + categoryId);
    if (selectedList) {
        selectedList.style.display = 'block';
    }
}
