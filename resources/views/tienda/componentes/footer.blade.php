<footer class="footer spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="footer__about">
                    <div class="footer__about__logo">
                        @foreach ($empresa as $item)
                            <a href=""><img src="{{asset($item->foto)}}" width="200px" alt=""></a>
                        @endforeach
                    </div>
                    <ul>
                        <li>Direccion: @foreach ($empresa as $item){{$item->ubicacion}}@endforeach</li>
                        <li>Telefono: +@foreach($empresa as $item){{$item->prefijo}}{{$item->telefono}}@endforeach</li>
                        <li>Correo: @foreach ($empresa as $item){{$item->correo}}@endforeach</li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6 offset-lg-1">
                <div class="footer__widget">
                    <h6>Desarrollo Web</h6>
                </div>
            </div>
            <div class="col-lg-4 col-md-12">
                <div class="footer__widget">
                    <h6>Únase a nuestro boletín ahora</h6>
                    <p>Reciba actualizaciones por correo electrónico sobre nuestra última tienda y ofertas especiales.</p>
                    <form action="{{route('tienda.suscrito.crear')}}" method="POST">
                        @csrf
                        <input type="email" required name="correo" placeholder="Suscribete">
                        <button type="submit" class="site-btn">Suscribete</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="footer__copyright">
                    <div class="footer__copyright__text"><p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="#" class="text-primary">MeleanDev</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p></div>
                    <div class="footer__copyright__payment"><img src="{{asset("assets/img/payment-item.png")}}" alt=""></div>
                </div>
            </div>
        </div>
    </div>
</footer>