@include('partials.header')

@hasSection('blog')
<div class="main entry-content">
    @yield('blog')
</div>
@endif
<div class="@hasSection('sidebar') container mx-auto grid grid-cols-2 xl:grid-cols-3 max-w-6xl @endif">
    <main class="main entry-content @hasSection('sidebar') col-span-2 @endif">
        @yield('content')
    </main>

    @hasSection('sidebar')
    <aside class="sidebar col-span-2 xl:col-span-1">
        @yield('sidebar')
    </aside>
    @endif
</div>

@include('partials.footer')
