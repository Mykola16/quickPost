$(document).ready(function() {
    // Инициализация изображений для товаров
    function initImage() {
        var images = $('.detail_img');
        var selected = $('.product_img img');

        images.each(function() {
            var image = $(this);
            image.on('click', function() {
                var imagePath = new String(image.data('image'));
                selected.attr('src', imagePath);
                images.removeClass('active');
                image.addClass('active');
            });
        });
    }

    initImage();
});
