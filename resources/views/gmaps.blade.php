<!DOCTYPE html>
<html>
<head>
    <title>Laravel - Multiple markers in google map using gmaps.js</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>    
    <script src="http://maps.google.com/maps/api/js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gmaps.js/0.4.24/gmaps.js"></script><script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>    
    <script src="http://maps.google.com/maps/api/js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gmaps.js/0.4.24/gmaps.js"></script>
    

    <style type="text/css">
        #mymap {
            border:1px solid red;
            width: 1000px;
            height: 600px;
        }
    </style>
</head>
<body>
    <h1>Multiple markers in google map using gmaps.js</h1>
    <div id="mymap"></div>

    <script type="text/javascript">
        var locations = {!! json_encode($locations->toArray()) !!};
        var mymap = new GMaps({
            el: '#mymap',
            lat: 14.99084570,
            lng: 103.09985850,
            zoom: 10
        });

        $.each(locations, function(index, value){
            mymap.addMarker({
                lat: value.lat,
                lng: value.long,
                title: value.city,
                click: function(e){
                    alert('This is ' + value.city + 'Buriram');
                   
                }
            });
        });
    </script>
</body>
</html>