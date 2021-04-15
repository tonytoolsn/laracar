<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta content="width=device-width, initial-scale=1.0" name="viewport" />

        <title>JUIRNI</title>
        <!-- Google Fonts -->
        <link
            href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
            rel="stylesheet"
        />

        <!-- Vendor CSS Files -->
        <link href="{{asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" />
        <link href="{{asset('assets/vendor/icofont/icofont.min.css') }}" rel="stylesheet" />
        <link href="{{asset('assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet" />
        <link href="{{asset('assets/vendor/animate.css/animate.min.css') }}" rel="stylesheet" />
        <link href="{{asset('assets/vendor/venobox/venobox.css') }}" rel="stylesheet" />
        <link href="{{asset('assets/vendor/owl.carousel/assets/owl.carousel.min.css') }}" rel="stylesheet" />
        <!-- Template Main CSS File -->
        <link href="{{asset('assets/css/style.css')}}" rel="stylesheet" />

        <!-- jQuery v1.9.1 -->
        <script src="{{asset('assets/vendor/calendar/js/jquery-1.9.1.min.js') }}"></script>
        <!-- Moment.js v2.20.0 -->
        <script src="{{asset('assets/vendor/calendar/js/moment.min.js') }}"></script>
        <!-- FullCalendar v3.8.1 -->
        <link href="{{asset('assets/vendor/Calendar/css/fullcalendar.min.css') }}" rel="stylesheet" />
        <script src="{{asset('assets/vendor/calendar/js/fullcalendar.min.js') }}"></script>
        <link href="{{asset('assets/css/style2.css') }}" rel="stylesheet" />

        <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet" />

    <body>
        <!-- ======= Header ======= -->
        <header id="header" class="fixed-top">
            <div class="container d-flex align-items-center">
                <h1 class="logo mr-auto"><a href="{{ url('/') }}">JUIRNI</a></h1>
                <nav class="nav-menu d-none d-lg-block">
                    <ul>
                        @if (Route::has('login'))
                        @auth
                        <li><a  href="{{ route('edit') }}">帳號修改</a></li>
                            <li><a  href="{{ route('orderSearch') }}">定單查詢</a></li>
                                <li><a  href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                            {{ __('登出') }}
                        </a></li>
                        <li style="color: #ae0000;margin-left: 10px">{{ Auth::user()->name }}登入中</li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                        @else
                        <li><a href="{{ route('login') }}">登入</a></li>
                        @if (Route::has('register'))
                        <li><a href="{{ route('register') }}">註冊</a></li>
                        @endif
                        @endauth
                        @endif
                    </ul>
                </nav>
                <!-- .nav-menu -->

            </div>
        </header>
        <main class="py-4 mt-5">
            <div class="mt-5">
                @yield('content')
            </div>
        </main>
        <!-- End Header -->

        <script src="{{asset('assets/vendor/jquery/jquery.min.js') }}"></script>
        <script src="{{asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{asset('assets/vendor/jquery.easing/jquery.easing.min.js') }}"></script>
        <script src="{{asset('assets/vendor/php-email-form/validate.js') }}"></script>
        <script src="{{asset('assets/vendor/waypoints/jquery.waypoints.min.js') }}"></script>
        <script src="{{asset('assets/vendor/counterup/counterup.min.js') }}"></script>
        <script src="{{asset('assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
        <script src="{{asset('assets/vendor/venobox/venobox.min.js') }}"></script>
        <script src="{{asset('assets/vendor/owl.carousel/owl.carousel.min.js') }}"></script>
        <script src="{{asset('assets/js/main.js') }}"></script>

        <script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
        <script>
            $(".example").DataTable({
                // 參數設定[註1]
                "bPaginate": false, // 顯示換頁
                "searching": false, // 顯示搜尋
                "info":	false, // 顯示資訊
                "fixedHeader": true, // 標題置頂
            });
        </script>
    </body>
</html>

