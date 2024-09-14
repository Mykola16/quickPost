document.addEventListener('DOMContentLoaded', function () {

    var add_modal = document.getElementById("add_modal");
    var add_btn = document.getElementById("add_btn");

    //Open
    if (add_modal && add_btn) {
        add_btn.onclick = function () {


            add_modal.style.display = "block";
            document.body.classList.add('modal-open');
        };
    }

    //Close
    window.onclick = function (event) {
        if (add_modal && event.target === add_modal) {
            add_modal.style.display = "none";
            document.body.classList.remove('modal-open');
        }
    };
});
