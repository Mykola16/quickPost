<div>

    <script>
        window.addEventListener('unload', function () {
            fetch("{{ route('decrement.views', $product->id) }}", {
                method: "POST",
                keepalive: true, // Позволяет запросу завершиться, даже если страница закрывается
                headers: {
                    "X-CSRF-TOKEN": "{{ csrf_token() }}", // Добавляем CSRF токен для защиты запроса
                    "Content-Type": "application/json"
                },
                body: JSON.stringify({})
            });
        });
    </script>
</div>



