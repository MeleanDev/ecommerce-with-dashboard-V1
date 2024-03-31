<div class="row">
    @foreach ($producto as $item)
    <div class="col-lg-4 col-md-6 col-sm-6">
        <div class="product__item">
            <div class="product__item__pic set-bg" data-setbg="{{asset($item->foto)}}">
                <ul class="product__item__pic__hover">
                    <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                </ul>
            </div>
            <div class="product__item__text">
                <h6><a href="#">{{$item->nombre}}</a></h6>
                <h5>${{$item->precio}}</h5>
            </div>
        </div>
    </div>
    @endforeach
</div>
    {{$producto->links('pagination::Bootstrap-4')}}