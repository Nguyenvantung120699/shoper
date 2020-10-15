<!-- Modal -->
<div class="modal fade" id="feedback{{$p->product_id}}ModalCenter" tabindex="-1" role="dialog" aria-labelledby="feedback{{$p->product_id}}ModalCenter" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="#" method="post" enctype="multipart/form-data">
        @csrf
        <div class="contact__form">
            <h5>Đánh Giá Sản Phẩm</h5>
                <div class="shop__cart__table">
                <table>
                    <thead>
                        <tr>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    <p>sản phẩm : </p>
                        <tr>
                            <td class="cart__product__item">
                                <input type="hidden" name="product_id" value="{{$p->product_id}}">
                                <img style="width:100px" src="{{asset($pr->thumbnail)}}" alt="">
                                <div class="cart__product__item__title">
                                    <h6>{{$pr->product_name}}</h6>
                                    <p>Màu : {{$p->color}}, Kích Thước : {{$p->size}}</p>
                                </div>
                            </td>
                            <td class="cart__price">{{$pr->getPrice()}} vnđ</td>
                        </tr>
                    </tbody>
                </table>
                </div>
                <div class="checkout__form__input rating">
                    <label>
                        <input type="radio" name="stars" value="1" />
                        <span class="icon">★</span>
                    </label>
                    <label>
                        <input type="radio" name="stars" value="2" />
                        <span class="icon">★</span>
                        <span class="icon">★</span>
                    </label>
                    <label>
                        <input type="radio" name="stars" value="3" />
                        <span class="icon">★</span>
                        <span class="icon">★</span>
                        <span class="icon">★</span>   
                    </label>
                    <label>
                        <input type="radio" name="stars" value="4" />
                        <span class="icon">★</span>
                        <span class="icon">★</span>
                        <span class="icon">★</span>
                        <span class="icon">★</span>
                    </label>
                    <label>
                        <input type="radio" name="stars" value="5" />
                        <span class="icon">★</span>
                        <span class="icon">★</span>
                        <span class="icon">★</span>
                        <span class="icon">★</span>
                        <span class="icon">★</span>
                    </label>
                </div>
                <div class="checkout__form__input">
                    <p>Đánh giá <span>*</span></p>
                    <textarea name="feel" placeholder="Đánh giá"></textarea>
                </div>
                <div class="row">
                    <div class="checkout__form__input col-md-8">
                        <p>Tải ảnh lên <span>*</span></p>
                        <input name="image" value="{{old("image")}}" type="file">
                    </div>
                    <div class="col-md-4">
                        <img src="{{asset("client/img/shop-cart/cp-1.jpg")}}" alt="">
                    </div>
                </div>
                <a id="feedbackBtn" type="button" class="site-btn feedbackBtn">Gửi đi</a>
            </div>
        </div>
        </form>
    </div>
  </div>
</div>
@section('js')
    <script type="text/javascript">
        var stars = 0;
        $(':radio').change(function() {
            stars = this.value;
        });
        $('.feedbackBtn').click(function(){
            console.log($("input[name=product_id]").val())
            $.ajax({
                url:"{{url("/postFeedback")}}",
                method: 'post',
                data: {
                    enctype: 'multipart/form-data',
                    _token: "{{ csrf_token() }}",
                    point: stars,
                    feel: $("textarea[name=feel]").val(),
                    product_id: $("input[name=product_id]").val(),
                    image: $("input[name=image]").val(),
                },
            success : function(data){
               console.log(data)
            },  
        });
        });
    </script>
    @endsection