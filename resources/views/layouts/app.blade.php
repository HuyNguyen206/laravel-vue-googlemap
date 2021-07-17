<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<div id="app">
    <main class="container py-4">
        Vue google map
        <gmap-map
            :zoom="17"
            :center="mapCenter"
            style="width: 100%; height: 440px"
            @click="handleMapClick"
        >
            <gmap-info-window
                :options="infoWindowOptions"
                :position="infoWindowPosition"
                :opened="infoWindowOpened"
                @closeclick="closeInfoWindowClose"
            >
                <h2>@{{activeRestaurant.name}}</h2>
                <h5>Hours: @{{activeRestaurant.hours}}</h5>
                <p>Address: @{{activeRestaurant.adress}}</p>
                <p>City: @{{activeRestaurant.city}}</p>
            </gmap-info-window>
            <gmap-marker v-for="res in restaurants" :key="res.id"
                         :position="convertToFloat(res)"
                         :clickable="true"
                         :draggable="false"
                         @click="showGmapInfo(res)">
            </gmap-marker>
        </gmap-map>
    </main>
</div>
</body>
</html>
