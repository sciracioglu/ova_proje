<!doctype html>
<html lang="tr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="/css/app.css">
    @yield('css')
    <title>aragonit - @yield('baslik')</title>
  </head>
  <body>
    <div class="container mx-auto text-xs">
        <div class="flex h-screen flex-col">
            <nav class="flex items-center bg-grey-lighter justify-between flex-wrap p-6 shadow">
                <div class="flex items-center flex-no-shrink mr-6">
                    @yield('logo')
                </div>
                <div class="block lg:hidden">
                    <button class="flex items-center px-3 py-2 border rounded text-teal-lighter border-teal-light hover:text-white hover:border-white">
                    <svg class="fill-current h-3 w-3" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><title>Menu</title><path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"/></svg>
                    </button>
                </div>
            </nav>    
            <div class="px-4 mt-4 flex-1 font-body text-xl">
                @yield('icerik')
            </div>
            <footer class="p-4 mt-6 bg-black text-grey-darker ">
                <div class="flex items-center">
                    <img src="/img/aragonit.png" style="height:30px" class="d-inline-block align-top" alt="">
            
                    <div class="pl-4 font-sans ">
                        &copy; {!! date('Y') !!} aragonit bilgi teknolojileri
                    </div> 
                </div>
            </footer>
        </div>
    </div>
    <script src="/js/app.js"></script>
    @yield('scripts')
</body>
</html>