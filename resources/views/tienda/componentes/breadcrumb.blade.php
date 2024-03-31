<section class="breadcrumb-section set-bg" data-setbg="{{asset("assets/img/breadcrumb.jpg")}}">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    @foreach ($empresa as $item)
                        <h2>{{$item->nombre}}</h2>
                    @endforeach
                    <div class="breadcrumb__option">
                        <a href="">Inicio</a>
                        <span>Productos</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>