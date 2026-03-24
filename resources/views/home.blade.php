<div>
    <!-- Simplicity is the essence of happiness. - Cedric Bledsoe -->
    <h1 class="text-2xl font-bold text-gray-800 mb-4">Welcome to the Home Page</h1>
    <h2 class="text-xl font-semibold text-gray-700 mb-2">Hello, {{ $name }}! Of age {{ $age }}</h2>
    <p class="text-gray-600 mb-4">This is the home page of our Laravel application. You can navigate to different sections using the links below:</p>
    <ul class="list-disc list-inside text-gray-600 mb-4">
        <li><a href="/multiplication-table/{number}" class="text-blue-500 hover:underline">View Multiplication Table for any number</a></li>
        <li><a href="/about" class="text-blue-500 hover:underline">About Us</a></li>
        <li><a href="/contact" class="text-blue-500 hover:underline">Contact Us</a></li>
    </ul>
    <p class="text-gray-600">Feel free to explore the different pages and see how Laravel handles routing and views!</p>
</div>
