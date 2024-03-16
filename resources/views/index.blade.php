<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
    <!-- Fonts -->
    <!-- <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono&display=swap" rel="stylesheet"> -->
    <link href="{{ asset('frontend/fonts/RobotoMono-VariableFont_wght.ttf') }}" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto+Mono&display=swap');
    </style>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="{{ asset('frontend/libs/bootstrap/bootstrap.min.css') }}"/>
    <!-- Css -->
    <link rel="stylesheet" href="{{ asset('frontend/css/default3.css') }}"/>
    <link rel="stylesheet" href="{{ asset('frontend/css/index4.css') }}"/>
</head>
<body>
<nav>

    @forelse($categories_data as $category_data)
        <a href="{{ route('index', ['category' => $category_data['name']]) }}">{{ $category_data['name'] }}</a>
    @empty
        <a href="#">{{ 'Add Category' }}</a>
    @endforelse

</nav>

<div>
    <h2>Events Current 30 Day</h2>
    <table id ="Events Current 30 Day" border="1">
        @forelse($events_30 as $event_30)
            <table>
                <tr>
                    <td>
                        {{ $event_30->name }} | At: {{ $event_30->date }} | Repeat: {{$event_30->re}} Day
                    </td>
                </tr>
            </table>
        @empty
            <p>NO EVENTS IN CURRENT 30 DAY</p>
        @endforelse
    </table>
    <!-- <img src="frontend/img/fantazy-planet.png" alt=""> -->
</div>

<!-- Events Table -->
<table class="events-table">
    <tr>
        <th>name</th>
        <th>description</th>
        <th>date</th>
    </tr>


    @forelse($specificEvents as $event_data)

            <tr>
                <td>{{ $event_data->name }}</td>
                <td>---------------------------------</td>
                <td>{{ $event_data->date }}</td>
            </tr>

    @empty
            <tr>
                <td>this events is empty</td>
            </tr>
    @endforelse




</table>
</body>
</html>
