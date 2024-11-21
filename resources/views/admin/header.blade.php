    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- require for flowbite/tailwind --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>admin dashboard</title>
    
    <!-- Add Font Awesome for icons -->
    <link
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
      rel="stylesheet"
    />

    {{-- for bootstrap --}}
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
      rel="stylesheet"
    />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    {{-- for flowbite --}} 
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.js"></script>

    {{-- for the fontawesome (icon) --}}
    <script src="https://kit.fontawesome.com/6cb8a8478d.js" crossorigin="anonymous"></script>

    <script src="//unpkg.com/alpinejs" defer></script>
