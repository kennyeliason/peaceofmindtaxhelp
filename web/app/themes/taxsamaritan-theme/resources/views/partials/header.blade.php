@php
$background = 'bg-gray-100';
$wpseo_local = get_option('wpseo_local');
$header = get_field('header','options');
$custom_logo_id = get_theme_mod( 'custom_logo' );
@endphp
<header class="banner sticky z-40 top-0 {{ $background }} shadow-lg border-brand-600 border-t-2">
    <div class="container mx-auto px-4">
        <div class="flex items-center justify-between items-stretch">

            <a href="{{ home_url('/') }}">
                {!! wp_get_attachment_image($custom_logo_id, 'medium', "", array('class'=>'py-2 pr-10 object-scale-down')) !!}
            </a>

            <div class="hidden lg:flex flex-col justify-between">
                <div class="flex justify-end font-heading font-light text-gray-900">
                    <a href="{{ $header['red_button']['url'] }}" target="{{ $header['red_button']['target'] }}" class="uppercase rounded-br-full rounded-bl-full bg-gradient-t-brandbrand text-white py-1 px-6">
                     <svg class="inline-block" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="0.264in" height="0.347in"><path fill-rule="evenodd"  fill="rgb(255, 255, 255)" d="M17.514,-0.001 C17.938,-0.001 19.000,0.654 19.000,1.310 L19.000,23.580 C18.787,24.017 18.151,24.999 17.620,24.999 L1.274,24.999 C0.531,24.781 -0.000,24.126 -0.000,23.471 L-0.000,1.528 C0.106,0.654 0.743,0.109 1.380,-0.001 L17.514,-0.001 ZM16.346,3.165 L16.346,9.825 L2.653,9.825 C2.653,5.549 2.653,5.622 2.653,3.165 L16.346,3.165 ZM6.793,4.367 L6.793,5.022 L5.625,5.022 L5.625,8.733 L4.564,8.733 L4.564,5.022 L3.396,5.022 L3.396,4.148 C3.503,4.257 3.715,4.148 6.581,4.148 L6.793,4.367 ZM9.871,4.367 C10.402,5.567 10.827,7.096 11.357,8.406 L11.357,8.733 L10.402,8.733 C9.978,7.533 9.871,7.751 9.234,7.751 C7.536,7.751 8.810,8.842 7.748,8.842 C7.430,8.842 7.430,8.733 7.218,8.624 C7.748,7.205 8.173,5.676 8.704,4.257 C8.916,4.148 9.022,4.148 9.234,4.148 C9.553,4.148 9.765,4.148 9.871,4.367 ZM13.905,5.567 C14.117,5.131 14.436,4.585 14.754,4.148 L15.497,4.148 C15.497,4.257 15.603,4.148 15.603,4.367 C15.603,4.694 14.542,6.113 14.542,6.331 C14.542,6.659 15.285,7.751 15.603,8.406 L15.603,8.733 C15.497,8.842 15.391,8.842 15.072,8.842 C14.117,8.842 14.436,8.078 13.799,7.205 C13.480,7.642 13.268,8.188 12.950,8.733 L11.994,8.733 C12.313,7.969 13.056,6.659 13.056,6.440 C13.056,6.113 12.525,5.240 12.100,4.585 L12.100,4.257 C12.206,4.148 12.313,4.148 12.525,4.148 C13.374,4.148 13.268,4.803 13.905,5.567 ZM9.553,6.877 C9.553,6.877 8.916,6.877 8.810,6.768 C8.916,6.440 9.128,6.004 9.234,5.567 C9.341,5.894 9.447,6.331 9.553,6.877 ZM6.369,11.790 L6.369,13.537 L8.067,13.537 L8.067,14.629 C7.642,14.629 6.687,14.410 6.369,14.847 C6.369,15.283 6.369,15.829 6.369,16.375 L5.307,16.375 C5.307,15.938 5.307,15.392 5.201,14.847 C4.882,14.410 3.927,14.629 3.609,14.629 L3.609,13.537 L5.307,13.537 L5.307,11.790 L6.369,11.790 ZM15.285,13.537 L15.285,14.629 L10.933,14.629 L11.039,13.537 L15.285,13.537 ZM5.838,19.323 C6.156,19.104 6.687,18.340 7.005,18.340 C7.218,18.340 7.536,18.776 7.748,18.995 C7.536,19.323 7.112,19.760 6.687,20.196 L7.748,21.288 C7.642,21.506 7.218,22.052 7.005,22.052 C6.687,22.052 6.262,21.397 5.944,21.070 C5.625,21.288 4.989,22.052 4.776,22.052 C4.458,22.052 4.246,21.615 4.033,21.397 C4.246,21.070 4.670,20.633 5.095,20.196 L4.033,19.104 C4.139,18.886 4.458,18.340 4.776,18.340 C4.989,18.340 5.519,18.995 5.838,19.323 ZM15.285,18.558 L15.285,19.650 L10.933,19.650 L10.933,18.558 L15.285,18.558 ZM15.285,20.960 L15.285,22.161 L10.933,22.161 L11.039,20.960 L15.285,20.960 Z"/></svg> <span class="">{{ $header['red_button']['title'] }}</span>
                 </a>
                 <div class="call-us px-4 py-1">
                    @svg('images/phone') Call Us: <a href="tel:{{ preg_replace("/[^0-9,.]/", "", $wpseo_local['location_phone']) }}">{{ $wpseo_local['location_phone'] }}</a>
                </div>
                <div class="login-signup py-1">
                    <a href="{{ $header['login']['url'] }}" target="{{ $header['red_button']['target'] }}">
                        <svg class="inline-block" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="0.278in" height="0.292in"><image  x="0px" y="0px" width="20px" height="21px"  xlink:href="data:img/png;base64,iVBORw0KGgoAAAANSUhEUgAAABQAAAAVCAQAAADs3AYjAAAABGdBTUEAALGPC/xhBQAAACBjSFJNAAB6JgAAgIQAAPoAAACA6AAAdTAAAOpgAAA6mAAAF3CculE8AAAAAmJLR0QA/4ePzL8AAAAHdElNRQfkBQEDIw3zA66kAAAA30lEQVQoz42SYZHCMBCFv9TAVQIS6uAw0PRQQBwcKIBT0OKgpwBmFRQH1EFwUBTk/jDMJjQcL3+yed+8zG5iAlr2iw2fwJlOTtoxIcaOqlxptIgCd/kqBqt8FYMvpEC7SE19ohObp5hmHhyewGEWlJFocnQy5prZRNU+27VclbmXm/ZM/IRgdzigl5/ECGrVru4e+6522rsn2hLHNwvA8wus7/sDvUyPq62jpcw8ycRWejAh/TNzWsmpAFr+UwumbpIxz2tZJF/rBejfAr0J2A8qlpRUlFG+x3NhYsDL9Q+H2Uy8XDYMQAAAAABJRU5ErkJggg==" /></svg> {{ $header['login']['title'] }}
                    </a>
                </div>
            </div>

            <nav class="nav-primary">
                @foreach($headerMenu as $item)
                @include('partials.nav-desktop', ['item' => $item, 'background' => $background])
                @endforeach
            </nav>
        </div>
        <div class="flex lg:hidden lg:invisible">
            <nav class="flex items-center justify-between flex-wrap absolute right-0 z-10 top-0 font-heading font-light" x-data="{ mobileOpen: false }" @keydown.escape="mobileOpen = false">
                <button @click="mobileOpen = !mobileOpen" type="button" class="block z-30 p-5 text-black hover:text-black focus:outline-none focus:text-black bg-gray-100 rounded-bl" :class="{ 'transition transform-180': mobileOpen }" >
                    <svg class="h-6 w-6 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                        <path x-show="mobileOpen" fill-rule="evenodd" clip-rule="evenodd" d="M18.278 16.864a1 1 0 0 1-1.414 1.414l-4.829-4.828-4.828 4.828a1 1 0 0 1-1.414-1.414l4.828-4.829-4.828-4.828a1 1 0 0 1 1.414-1.414l4.829 4.828 4.828-4.828a1 1 0 1 1 1.414 1.414l-4.828 4.829 4.828 4.828z"/>
                        <path x-show="!mobileOpen" fill-rule="evenodd" d="M4 5h16a1 1 0 0 1 0 2H4a1 1 0 1 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2z"/>
                    </svg>
                </button>
                <!--Menu-->
                <div class="w-full flex-grow pb-8 bg-gray-100 border-trim-500 border-t-2 overflow-y-scroll overflow-x-hidden w-full h-full text-xl" :class="{ 'fixed z-10 top-0 left-0 shadow-2xl': mobileOpen, 'hidden': !mobileOpen }" @click.away="mobileOpen = false" x-show="true" x-transition:enter="ease-out duration-200" x-transition:enter-start="opacity-0 transform" x-transition:enter-end="opacity-100 transform" x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100 transform" x-transition:leave-end="opacity-0 transform">
                    <div class="pl-4 pt-1">
                        {!! wp_get_attachment_image($custom_logo_id, 'medium', "", array('class'=>'py-2 pr-10 object-scale-down')) !!}
                    </div>

                    <a href="{{ $header['red_button']['url'] }}" target="{{ $header['red_button']['target'] }}" class="flex py-4 px-4 justify-center w-full bg-brand-600 text-white">
                     <svg class="inline-block" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="0.264in" height="0.347in"><path fill-rule="evenodd"  fill="rgb(255, 255, 255)" d="M17.514,-0.001 C17.938,-0.001 19.000,0.654 19.000,1.310 L19.000,23.580 C18.787,24.017 18.151,24.999 17.620,24.999 L1.274,24.999 C0.531,24.781 -0.000,24.126 -0.000,23.471 L-0.000,1.528 C0.106,0.654 0.743,0.109 1.380,-0.001 L17.514,-0.001 ZM16.346,3.165 L16.346,9.825 L2.653,9.825 C2.653,5.549 2.653,5.622 2.653,3.165 L16.346,3.165 ZM6.793,4.367 L6.793,5.022 L5.625,5.022 L5.625,8.733 L4.564,8.733 L4.564,5.022 L3.396,5.022 L3.396,4.148 C3.503,4.257 3.715,4.148 6.581,4.148 L6.793,4.367 ZM9.871,4.367 C10.402,5.567 10.827,7.096 11.357,8.406 L11.357,8.733 L10.402,8.733 C9.978,7.533 9.871,7.751 9.234,7.751 C7.536,7.751 8.810,8.842 7.748,8.842 C7.430,8.842 7.430,8.733 7.218,8.624 C7.748,7.205 8.173,5.676 8.704,4.257 C8.916,4.148 9.022,4.148 9.234,4.148 C9.553,4.148 9.765,4.148 9.871,4.367 ZM13.905,5.567 C14.117,5.131 14.436,4.585 14.754,4.148 L15.497,4.148 C15.497,4.257 15.603,4.148 15.603,4.367 C15.603,4.694 14.542,6.113 14.542,6.331 C14.542,6.659 15.285,7.751 15.603,8.406 L15.603,8.733 C15.497,8.842 15.391,8.842 15.072,8.842 C14.117,8.842 14.436,8.078 13.799,7.205 C13.480,7.642 13.268,8.188 12.950,8.733 L11.994,8.733 C12.313,7.969 13.056,6.659 13.056,6.440 C13.056,6.113 12.525,5.240 12.100,4.585 L12.100,4.257 C12.206,4.148 12.313,4.148 12.525,4.148 C13.374,4.148 13.268,4.803 13.905,5.567 ZM9.553,6.877 C9.553,6.877 8.916,6.877 8.810,6.768 C8.916,6.440 9.128,6.004 9.234,5.567 C9.341,5.894 9.447,6.331 9.553,6.877 ZM6.369,11.790 L6.369,13.537 L8.067,13.537 L8.067,14.629 C7.642,14.629 6.687,14.410 6.369,14.847 C6.369,15.283 6.369,15.829 6.369,16.375 L5.307,16.375 C5.307,15.938 5.307,15.392 5.201,14.847 C4.882,14.410 3.927,14.629 3.609,14.629 L3.609,13.537 L5.307,13.537 L5.307,11.790 L6.369,11.790 ZM15.285,13.537 L15.285,14.629 L10.933,14.629 L11.039,13.537 L15.285,13.537 ZM5.838,19.323 C6.156,19.104 6.687,18.340 7.005,18.340 C7.218,18.340 7.536,18.776 7.748,18.995 C7.536,19.323 7.112,19.760 6.687,20.196 L7.748,21.288 C7.642,21.506 7.218,22.052 7.005,22.052 C6.687,22.052 6.262,21.397 5.944,21.070 C5.625,21.288 4.989,22.052 4.776,22.052 C4.458,22.052 4.246,21.615 4.033,21.397 C4.246,21.070 4.670,20.633 5.095,20.196 L4.033,19.104 C4.139,18.886 4.458,18.340 4.776,18.340 C4.989,18.340 5.519,18.995 5.838,19.323 ZM15.285,18.558 L15.285,19.650 L10.933,19.650 L10.933,18.558 L15.285,18.558 ZM15.285,20.960 L15.285,22.161 L10.933,22.161 L11.039,20.960 L15.285,20.960 Z"/></svg> <span class="">{{ $header['red_button']['title'] }}</span>
                 </a>

                 <a class="flex py-4 px-4 mb-4 justify-center w-full bg-trim-500 text-black" href="tel:{{ preg_replace("/[^0-9,.]/", "", $wpseo_local['location_phone']) }}">
                    <span class="inline-block align-middle">@svg('images/phone') Call Us: {{ $wpseo_local['location_phone'] }}</span>
                </a>

                @foreach($headerMenu as $item)
                @include('partials.nav-mobile', ['item' => $item, 'background' => $background])
                @endforeach

                <a href="{{ $header['login']['url'] }}" target="{{ $header['login']['target'] }}" class="block px-4 py-2 leading-5 hover:text-gray-700 focus:outline-none focus:text-gray-900 uppercase">{{ $header['login']['title'] }}</a>
            </div>
        </nav>
    </div>
</div>
</header>
