<div>
    <!-- Simplicity is the essence of happiness. - Cedric Bledsoe -->
    {{-- Route parameters constraints example --}}
    <h1>Category Slug: {{ $slug ?? 'Default Slug' }}</h1>
    <p>This is the category page. You can access this page by providing a slug in the URL. For example, if you access /categories/technology, it will display "Category Slug: technology". If you try to access /categories/Tech, it will not work because the slug must be a string containing lowercase letters, numbers, and hyphens due to the regex constraint defined in the route.</p>
</div>
