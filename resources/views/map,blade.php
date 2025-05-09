<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Google Maps</title>
</head>
<body>
    <div id="map" style="height: 400px; width: 100%;"></div>

    <!-- Підключення Google Maps API -->
    <script src="https://maps.googleapis.com/maps/api/js?key=ВАШ_КЛЮЧ&callback=initMap" async defer></script>

    <script>
        // Ініціалізація карти
        function initMap() {
            // Вказуємо координати для мітки (можна змінити на необхідні)
            var office = { lat: 50.7472, lng: 25.3244 }; // приклад: Луцьк
            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 14,
                center: office
            });
            var marker = new google.maps.Marker({ position: office, map: map });
        }
    </script>
</body>
</html>
