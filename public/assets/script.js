
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





    document.addEventListener('DOMContentLoaded', function () {


        // Функция для отображения подкатегорий выбранной категории
        window.showSubCategories = function (categoryId) {
            // Скрыть все подкатегории
            var subcategoryLists = document.querySelectorAll('.subcategories');
            subcategoryLists.forEach(function (list) {
                list.style.display = 'none';
            });

            // Показать подкатегории выбранной категории
            var selectedList = document.getElementById('subcategories-' + categoryId);
            if (selectedList) {
                selectedList.style.display = 'block';
            }
        }

    });





//Меню для кабінета
    document.addEventListener('DOMContentLoaded', () => {
        const navItems = document.querySelectorAll('.profile_menu_item a');
        const currentLocation = window.location.href;

        navItems.forEach(item => {
            if (item.href === currentLocation) {
                item.parentElement.classList.add('active1');
            } else {
                item.parentElement.classList.remove('active1');
            }
        });
    });


    function toggleAccordion(element) {
        const content = element.nextElementSibling;

        const icon = element.querySelector('img');

        if (content.style.display === "block") {
            content.style.display = "none";
            element.style.borderWidth = "1px 5px 1px 1px";
            element.style.borderRadius = "10px";

            if (icon) {
                icon.src = "assets/images/seting_menu_btn.png";
            }

        } else {
            content.style.display = "block";
            element.style.borderWidth = "1px 5px 0px 1px";
            element.style.borderRadius = "10px 10px 0  0";

            if (icon) {
                icon.src = "assets/images/btn_v_setting.png";
            }
        }
    }


    document.addEventListener('DOMContentLoaded', function () {

        // Получите элементы для первого модального окна
        var modal = document.getElementById("myModal");
        var btn = document.getElementById("myBtn");

        // Получите элементы для второго модального окна
        var modal2 = document.getElementById("myModal2");
        var btn2 = document.getElementById("myBtn2");
        var span2 = modal2 ? modal2.getElementsByClassName("close")[0] : null;

        // Обработчик для первого модального окна
        if (modal && btn) {
            btn.onclick = function () {
                modal.style.display = "block";
                document.body.classList.add('modal-open');
            }
        }

        // Обработчик для второго модального окна
        if (modal2 && btn2) {
            btn2.onclick = function () {
                modal2.style.display = "block";
                document.body.classList.add('modal-open');
            }

            if (span2) {
                span2.onclick = function () {
                    modal2.style.display = "none";
                    document.body.classList.remove('modal-open');
                }
            }
        }

        // Общий обработчик для закрытия модальных окон при клике вне их области
        window.onclick = function (event) {
            if (modal && event.target === modal) {
                modal.style.display = "none";
                document.body.classList.remove('modal-open');
            }
            if (modal2 && event.target === modal2) {
                modal2.style.display = "none";
                document.body.classList.remove('modal-open');
            }
        }
    });


