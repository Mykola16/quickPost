
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





    // Отримайте модаль
    var modal = document.getElementById("myModal");


    // Отримати кнопку, яка відкриває модаль
    var btn = document.getElementById("myBtn");


    if (modal && btn) {
        // Коли користувач натискає кнопку, відкривається модальний
        btn.onclick = function () {
            modal.style.display = "block";
            document.body.classList.add('modal-open');
        }


        // Коли користувач клацає будь-де за межами модального, закрийте його
        window.onclick = function (event) {
            if (event.target === modal) {
                modal.style.display = "none";
                document.body.classList.remove('modal-open');
            }
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












