
    // document.getElementById('switchMode').querySelector('input').onclick = function () {
    //     let theme = document.getElementById("theme");
    //
    //     if (theme) {
    //         if (theme.getAttribute('href') === "assets/styles/day.css") {
    //             theme.href = "assets/styles/night.css";
    //         } else {
    //             theme.href = "assets/styles/day.css";
    //         }
    //     }
    // }
    //
    //



    document.addEventListener('DOMContentLoaded', function () {

        // Получите модальное окно
        var modal = document.getElementById("myModal");

        // Получите кнопку, которая открывает модальное окно
        var btn = document.getElementById("myBtn");

        // Убедитесь, что элементы существуют
        if (modal && btn) {
            // Когда пользователь нажимает кнопку, открывается модальное окно
            btn.onclick = function () {
                modal.style.display = "block";
                document.body.classList.add('modal-open');
            }

            // Когда пользователь кликает вне модального окна, оно закрывается
            window.onclick = function (event) {
                if (event.target === modal) {
                    modal.style.display = "none";
                    document.body.classList.remove('modal-open');
                }
            }
        }

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

        window.closeModal = function () {
            modal.style.display = "none";
            document.body.classList.remove('modal-open');

        };
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





