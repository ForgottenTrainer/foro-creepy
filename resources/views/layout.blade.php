<!DOCTYPE html>
<html lang="en" data-theme="light">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="shortcut icon" href="{{ asset('logo.webp') }}" type="image/x-icon">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@1.0.0/css/bulma.min.css" >
        <link rel="stylesheet" href="{{ asset('css/app.css') }}" />
        <title>Foro </title>
    </head>
    <body class="container">
        @include('components.navbar')
        <div class="container">
            
            <h1 class="title mt-4"> @yield('titulo') </h1>

            @yield('contenido')
        </div>
    </body>

    <script src="https://kit.fontawesome.com/2157411cb1.js" crossorigin="anonymous"></script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const themeToggleBtn = document.getElementById('theme-toggle');
            const themeIcon = document.getElementById('theme-icon');
            const htmlElement = document.documentElement;

            // Load saved theme from localStorage
            const savedTheme = localStorage.getItem('theme') || 'light';
            htmlElement.setAttribute('data-theme', savedTheme);
            if (savedTheme === 'dark') {
                themeIcon.classList.replace('fa-sun', 'fa-moon');
            } else {
                themeIcon.classList.replace('fa-moon', 'fa-sun');
            }

            themeToggleBtn.addEventListener('click', () => {
                let currentTheme = htmlElement.getAttribute('data-theme');
                let newTheme = currentTheme === 'light' ? 'dark' : 'light';
                
                htmlElement.setAttribute('data-theme', newTheme);
                localStorage.setItem('theme', newTheme);

                if (newTheme === 'dark') {
                    themeIcon.classList.replace('fa-sun', 'fa-moon');
                } else {
                    themeIcon.classList.replace('fa-moon', 'fa-sun');
                }
            });
        });
    </script>

</html>