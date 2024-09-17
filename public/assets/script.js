






    // document.addEventListener('DOMContentLoaded', function() {
    //     var showMessageButton = document.getElementById('showMessageButton');
    //     var messageElement = document.getElementById('message');
    //
    //     showMessageButton.addEventListener('click', function() {
    //         // Показати сповіщення
    //         messageElement.style.display = 'block';
    //
    //         // Почати анімацію через 5 секунд
    //         setTimeout(function() {
    //             messageElement.classList.add('fade-out');
    //             // Видалити елемент з DOM після завершення анімації
    //             setTimeout(function() {
    //                 messageElement.style.display = 'none';
    //                 messageElement.classList.remove('fade-out');
    //             }, 100000); // Тривалість анімації
    //         }, 5000000); // Затримка перед початком анімації
    //     });
    // });





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

    document.addEventListener('DOMContentLoaded', () => {
        const navItems2 = document.querySelectorAll('.admin_profile_menu_item a');
        const currentLocation2 = window.location.href;

        navItems2.forEach(item => {
            if (item.href === currentLocation2) {
                item.parentElement.classList.add('active1');
            } else {
                item.parentElement.classList.remove('active1');
            }
        });
    });


    // в настройках меню
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
    /////////////////////////////////////////////////////////////////////

    function toggleAccordion2(element2) {
        const content2 = element2.nextElementSibling;

        const icon2 = element2.querySelector('img');

        if (content2.style.display === "block") {
            content2.style.display = "none";
            element2.style.borderRadius = "15px";
            element2.style.borderWidth = "3px";

            if (icon2) {
                icon2.src = "assets/images/seting_menu_btn.png";
            }

        } else {
            content2.style.display = "block";
            element2.style.borderRadius = "15px 15px 0  0";
            element2.style.borderWidth = "3px 3px 0  3px";

            if (icon2) {
                icon2.src = "assets/images/btn_v_setting.png";
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

    micClick.addEventListener('click', function () {
        var speech = true;
        window.SpeechRecognition = window.webkitSpeechRecognition;
        const recognition = new SpeechRecognition();
        recognition.interimResults = true;

        recognition.addEventListener('result', e => {
            const transcript = Array.from(e.results)
                .map(result => result[0])
                .map(result => result.transcript)
                .join('');

            searchInput.value = transcript;

            // Создаем событие input для синхронизации с Livewire
            searchInput.dispatchEvent(new Event('input'));
        });

        if (speech === true) {
            recognition.start();
        }
    });

    // document.addEventListener('DOMContentLoaded', function() {
    //     // Показати сповіщення через кнопку
    //     document.getElementById('showMessageButton').addEventListener('click', function() {
    //         var messageElement = document.getElementById('message');
    //         if (messageElement) {
    //             // Почати анімацію через 5 секунд
    //             setTimeout(function() {
    //                 messageElement.classList.add('fade-out');
    //                 // Видалити елемент після завершення анімації
    //                 setTimeout(function() {
    //                     messageElement.remove();
    //                 }, 1000); // Тривалість анімації
    //             }, 5000); // Затримка перед початком анімації
    //         }
    //     });
    // });




