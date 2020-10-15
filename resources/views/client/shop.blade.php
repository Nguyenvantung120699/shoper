@extends('layouts.clientLayout')

@section('content')
<div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__links">
                        <a href="./index.html"><i class="fa fa-home"></i> Home</a>
                        <span>Shop</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Shop Section Begin -->
    <section class="shop spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3">
                <form action="#" method="post">
                @csrf
                    <div class="shop__sidebar">
                        <div class="sidebar__categories">
                            <div class="section-title">
                                <h4>Danh Mục</h4>
                            </div>
                            <div class="categories__accordion">
                                <div class="accordion" id="accordionExample">
                                  @foreach($category as $c)
                                    <div class="card">
                                        <div class="card-heading">
                                            <a data-toggle="collapse" data-target="#collapseOne{{$c->id}}">{{$c->categories_name}}</a>
                                        </div>
                                        <div id="collapseOne{{$c->id}}" class="collapse" data-parent="#accordionExample">
                                            <div class="card-body">
                                                <ul>
                                                    @foreach($brand as $b)
                                                      <li><a href="#" class="brand_id" data-id="{{$b->id}}">{{$b->brands_name}}</a></li>
                                                      <input type="hidden" class="category_id" data-cid="{{$c->id}}" value="{{$c->id}}">
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="sidebar__filter">
                            <div class="section-title">
                                <h4>Lọc Theo Giá</h4>
                            </div>
                            <div class="filter-range-wrap">
                                <div class="price-range ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content"
                                data-min="1" data-max="99"></div>
                                <div class="range-slider">
                                    <div class="price-input">
                                        <p>Giá:</p>
                                        <input type="text" id="minamount">
                                        <input type="text" id="maxamount">
                                    </div>
                                </div>
                            </div>
                            <a href="#">Lọc</a>
                        </div>
                    </div>
                </form>
                </div>
                <div class="success col-lg-9 col-md-9">
                    <div class="row" id="ajaxquery">
                    @foreach($product as $p)
                        <div class="col-lg-4 col-md-6">
                            <div class="product__item">
                                <div class="product__item__pic set-bg" data-setbg="{{asset($p->thumbnail)}}">
                                    <div class="label new">New</div>
                                    <ul class="product__hover">
                                        <li><a href="{{asset($p->thumbnail)}}" class="image-popup"><span class="arrow_expand"></span></a></li>
                                        <li><a href="#"><span class="icon_heart_alt"></span></a></li>
                                        <li><a href="#"><span class="icon_bag_alt"></span></a></li>
                                    </ul>
                                </div>
                                <div class="product__item__text">
                                    <h6><a href="{{url("/product_single/{$p->id}")}}">{{$p->product_name}}</a></h6>
                                    <div class="rating">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                    <div class="product__price">{{$p->getPrice()}}</div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        <div class="col-lg-12 text-center">
                            <div class="pagination__option">
                              @if($product->previousPageUrl() != null)
                                <a href="{{$product->previousPageUrl()}}"><i class="fa fa-angle-left"></i></a>
                                @else
                               @endif
                                @for ($i = 1; $i <= $product->lastPage(); $i++)
                                  <a href="{{$product->nextPageUrl()}}">{{$i}}</a>
                                @endfor
                               @if($product->nextPageUrl() != null)
                                <a href="{{$product->nextPageUrl()}}"><i class="fa fa-angle-right"></i></a>
                                @else
                               @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shop Section End -->
    @endsection
    @section('js')
    <script type="text/javascript">
        $('.brand_id').click(function(){
            var id =$(this).attr("data-id")
            $.ajax({
                url:'{{url("/shopAjax")}}',
                method: 'post', 
                data: {
                    _token: "{{ csrf_token() }}",
                    brand_id : id,
                },
                success :function(response ) { 
                   var html = ''
                    $.each(response , function(i, product) {
                        $.each(product , function(i, pr) {
                            if(pr != null){
                                html+='<div class="col-lg-4 col-md-6">'
                                    +'<div class="product__item">'
                                        +'<div class="product__item__pic set-bg" data-setbg="{{asset('+pr.thumbnail+')}}">'
                                            +'<div class="label new">New</div>'
                                        +'<ul class="product__hover">'
                                                +'<li><a href="{{asset('+ pr.thumbnail +')}}" class="image-popup"><span class="arrow_expand"></span></a></li>'
                                                +'<li><a href="#"><span class="icon_heart_alt"></span></a></li>'
                                                +'<li><a href="#"><span class="icon_bag_alt"></span></a></li>'
                                        +'</ul>'
                                        +'</div>'
                                        +'<div class="product__item__text">'
                                            +'<h6><a href="{{url("/product_single/{'+pr.id+'}")}}">'+ pr.product_name +'</a></h6>'
                                        +'<div class="rating">'
                                                +'<i class="fa fa-star"></i>'
                                                +'<i class="fa fa-star"></i>'
                                                +'<i class="fa fa-star"></i>'
                                                +'<i class="fa fa-star"></i>'
                                                +'<i class="fa fa-star"></i>'
                                        +'</div>'
                                            +'<div class="product__price">'+ pr.price +'VND</div>'
                                        +'</div>'
                                    +'</div>'
                                +'</div>'
                            }else{
                            html+='<div class="container">'
                                '<div class="col-lg-4 offset-lg-4">'
                                    '<div class="cart__total__procced">'
                                        '<h6>Không Tìm Thấy Sản Phẩm</h6>'
                                    '</div>'
                                '</div>'
                            '</div>'
                            }
                        });
                    });
                    $("#ajaxquery").html(html);

		        },
        });
        });
    </script>
    @endsection