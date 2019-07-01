
<head lang="en">
    <script src="https://maps.google.com/maps/api/js?key=AIzaSyAiq3xISXSZYgkd9GDAOdajy4NK2d3L7dY"></script>
    <script>
        function loadMap() {

            var mapOptions = {
                center:new google.maps.LatLng(<?php echo $lat; ?>,<?php echo $lon; ?>),
                zoom:12,
                panControl: false,
                zoomControl: false,
                scaleControl: false,
                mapTypeControl:false,
                streetViewControl:true,
                overviewMapControl:true,
                rotateControl:true,
                mapTypeId:google.maps.MapTypeId.ROADMAP
            };

            var map = new google.maps.Map(document.getElementById("mapa"),mapOptions);

            var marker = new google.maps.Marker({
                position: new google.maps.LatLng(<?php echo $lat; ?>,<?php echo $lon; ?>),
                map: map,
                draggable:true,
             
            });
               var info = new google.maps.InfoWindow({
                content:"ubicacion del producto"
            });

            info.open(map,marker);

            google.maps.event.addListener(marker, "click", function (event) {
                var latitude = event.latLng.lat();
                var longitude = event.latLng.lng();
                alert( latitude + ', ' + longitude );
            });

        }
    </script>
</head>
<body onload="loadMap()">

<div id="mapa" style="width:500px; height:400px;"></div>






</body>
