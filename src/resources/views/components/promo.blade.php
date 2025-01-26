<header class="header-2">
    <div class="page-header min-vh-75 relative"
         style="background-image: url(@yield('promo.bgImage', asset('img/bg-landing.jpg')))">
        <span class="mask bg-gradient-dark opacity-4"></span>
        <div class="container">
            <div class="row">
                <div class="col-lg-7 text-center mx-auto">
                    <h1 class="text-white font-weight-black pt-3 mt-n5">
                        {{ $mainTitle ?? 'Динамический Заголовок' }}
                    </h1>
                    <p class="lead text-white mt-3">
                        {{ $subTitle ?? 'Динамический Подзаголовок' }}
                    </p>
                </div>
            </div>
        </div>
    </div>
</header>
<div class="card card-body blur shadow-blur mx-3 mx-md-4 mt-n6">

    <section class="pt-3 pb-4" id="count-stats">
        <div class="container">
            @yield('content')

        </div>
    </section>
</div>
