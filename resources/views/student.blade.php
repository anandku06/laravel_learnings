<div>
    <!-- The biggest battle is the war against ignorance. - Mustafa Kemal Atatürk -->
    <!-- Route parameters example -->
    <h1>Student ID: {{ $id }}</h1>
    <h1>Student Name: {{ $name ?? 'Default Name' }}</h1>
    <p>This is the student page. You can access this page by providing an ID in the URL. For example, if you access /students/123, it will display "Student ID: 123". If you try to access /students/abc, it will not work because the ID must be a number due to the regex constraint defined in the route.</p>
</div>
