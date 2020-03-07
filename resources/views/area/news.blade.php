<div class="row justify-content-center">
    <div class="col-md-6 text-center">
        <h1 class="text-center">
            <i class="fas fa-rss-square fa-2x text-warning"></i>
            NEWS UPDATE
        </h1>
    </div>
    <div class="col-md-6 text-center text-md-right">
        <a href="{{route('news.all')}}" class="btn btn-lg btn-warning px-5 rounded-pill py-3 shadow">
            <i class="fas fa-comment-dots fa-flip-horizontal fa-2x text-white"></i> ALL
        </a>
    </div>
</div>
<hr>
<div class="row">
    @forelse($news as $item)
        <div class="col-md-4 my-1">
            <div class="card">
                <a href="@if(!empty($item->link_url)) {{$item->link_url}} @else {{route('news.show', $item->id)}} @endif" target="_blank">
                    <img class="card-img-top newslogo" src="{{$item->image_url}}" alt="NEWS#{{$item->id}}">
                </a>
                <div class="card-body">
                    <h5 class="card-title">{!!$item->type_html()!!}</h5>
                    <h5 class="card-title">#{{$item->id}} {{$item->title}}</h5>
                    <hr>
                    <a href="@if(!empty($item->link_url)) {{$item->link_url}} @else {{route('news.show', $item->id)}} @endif" target="_blank" class="btn btn-primary btn-block">
                        <i class="fas fa-hand-point-right"></i> READ <i class="fas fa-hand-point-left"></i>
                    </a>
                </div>
            </div>
        </div>
    @empty
        <h1 class="text-danger text-center">ขณะนี้ยังไม่มีข่าวสาร</h1>
    @endforelse
</div>