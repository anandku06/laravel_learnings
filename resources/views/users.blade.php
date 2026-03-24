@php
    $color = ['red', 'green', 'blue', 'yellow', 'orange'];
    $name = "Anand";
@endphp

<div>
    <!-- Simplicity is the essence of happiness. - Cedric Bledsoe -->
    <!-- Optional parameter example -->
    <h1>Welcome {{ $name ?? 'Guest' }}</h1>
    <p>This is the users page. You can access this page with or without providing a name in the URL. If you provide a name, it will be displayed here. If you don't provide a name, it will display 'Guest' instead.</p>
    <h2>Colors:</h2>
    {{-- <ul>
        @foreach ($color as $c)
            <li>{{ $c }}</li>
        @endforeach
    </ul> --}}
    <ul>
        @foreach ($color as $c)
            <li>{{$loop->iteration}} : {{$c}}</li>
        @endforeach
    </ul>
</div>

 