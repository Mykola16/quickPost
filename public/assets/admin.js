document.addEventListener('DOMContentLoaded', function () {

    var add_modal = document.getElementById("add_modal");

    // Функція для відкриття модального вікна
    function openModal() {
        add_modal.style.display = "block";
        document.body.classList.add('modal-open');
    }

    // Функція для закриття модального вікна
    function closeModal() {
        add_modal.style.display = "none";
        document.body.classList.remove('modal-open');
    }

    // Відкриття модального вікна при кліку на кнопку
    var add_btn = document.getElementById("add_btn");
    if (add_modal && add_btn) {
        add_btn.onclick = function () {
            openModal();
        };
    }

    var add_close = document.getElementById("add_close");
    if (add_modal && add_close) {
        add_close.onclick = function () {
            closeModal();
        };
    }


    // Закриття модального вікна при кліку поза вікном
    window.onclick = function (event) {
        if (add_modal && event.target === add_modal) {
            closeModal();
        }
    };

    // Відкриття модального вікна через Livewire подію
    window.addEventListener('openModal', function () {
        openModal();
    });
});
