@php
    $name = "Anand";
@endphp

<div>
    <!-- If you do not have a consistent goal in life, you can not live it in a consistent way. - Marcus Aurelius -->
    <!-- Route parameters constraints example -->
    <h1>Post ID: {{ $id }}</h1>
    <h1>User: {{ $name }}</h1>
    <p>This is the post page. You can access this page by providing a numeric ID in the URL. For example, if you access /posts/123, it will display "Post ID: 123". If you try to access /posts/abc, it will not work because the ID must be a number due to the regex constraint defined in the route.</p>
</div>
