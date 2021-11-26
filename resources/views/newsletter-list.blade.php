<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Beer & Code Newsletter</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
        <!-- Styles -->
        @livewireStyles
        @powerGridStyles
    </head>
    <body>
        <p><div class="text-center mx-40 mt-1 p-5 rounded-lg border border-yellow-400 bg-yellow-100 text-black-900">
            E aí?! Já baixou o ⚡PowerGird⚡ hoje? <span class=" text-red-800 font-semibold">composer require power-components/livewire-powergrid</span> 👍</div></p><br>
         </div>
        <livewire:newsletter-table/>
        @livewireScripts
        @powerGridScripts

        <script>
            window.addEventListener('showAlert', event => {
                alert('Mandando e-mail para ' + event.detail.email);
            })
        </script>
    </body>
</html>
