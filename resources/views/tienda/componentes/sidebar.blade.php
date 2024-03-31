<div class="col-lg-3 col-md-5 border-right">
    <div class="sidebar">
        <div class="sidebar__item">
            <h4 class="text-center p-2 mb-3 bg-light">Categorias</h4>
            <ul class="text-center">
                @foreach ($categoria as $item)
                    <li class="d-block p-2 bg-light"><a href="{{route('inicio.categoria',$item->categoria)}}" class="btn btn-outline-secondary">{{$item->categoria}}</a></li> 
                @endforeach
            </ul>
        </div>
    </div>
    <div class="sidebar">
        <div class="sidebar__item">
            <h4 class="text-center p-2 mb-3 bg-light">Desarrollador</h4>
            <ul class="text-center">
                <blockquote class="blockquote text-center">
                    <p class="mb-0">MeleanDev</p>
                    <footer class="blockquote-footer">E@example.com</footer>
                  </blockquote>
            </ul>
        </div>
    </div>
</div>