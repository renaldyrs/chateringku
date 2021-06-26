@extends('layouts.utama')
@section('content')

@include('layouts.partial.navbar')

<!-- Breadcrumb Begin -->
<div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="breadcrumb__text">
                        <h2>Keranjang</h2>
                    </div>
                </div>
                <!-- <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="breadcrumb__links">
                        <a href="./index.html">Home</a>
                        <span>Keranjang</span>
                    </div>
                </div> -->
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Shopping Cart Section Begin -->
    <section class="shopping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="shopping__cart__table">
                        <table>
                            <thead>
                                <tr>
                                    <th>Nama Menu</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                        @if($cartItems)
                            @foreach($cartItems as $c)
                                <tr>
                                    <td class="product__cart__item">
                                        <div class="product__cart__item__pic">
                                            <img src="img/shop/cart/cart-1.jpg" alt="">
                                        </div>
                                        <div class="product__cart__item__text">
                                            <h6>{{$c['product_name']}}</h6>
                                            <h5 id="price{{ $c['product_id'] }}">{{$c['product_price']}}</h5>
                                        </div>
                                    </td>
                                    <td class="quantity__item">
                                        
                                                
                                        <div class="input-group row">
                                            <div class="input-group-prepend">
                                                <button type="button" class="btn btn-danger btn-number " data-quantity="minus" data-field="{{$c['product_id']}}">
                                                    <i class="fa fa-minus" aria-hidden="true"></i>
                                                </button>
                                            </div>
                                            <input type="text" class="form-control col-md-4" name="{{$c['product_id']}}"  min="1" onchange="a(this,{{$c['product_id']}})" onkeypress="return hanyaAngka(event,this)" value="{{$c['qty']}}">
                                            <button type="button" class="btn btn-success btn-number " data-quantity="plus" data-field="{{$c['product_id']}}">
                                                <i class="fa fa-plus" aria-hidden="true"></i>
                                            </button>
                                        </div>    
                                    </td>
                                    <td class="cart__price"  >
                                                    <span id="sub{{$c['product_id']}}">{{$c['product_price'] * $c['qty'] }}</span>
                                    </td>
                                    <td class="cart__close">
                                        <a href="{{route('delete',$c['product_id'])}}" class="btn btn-outline-danger"><i class="fa fa-times"></i>Hapus</a>
                                    </td>
                                </tr>
                                @endforeach
                            @endif
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="continue__btn">
                                <a href="/">Continue Shopping</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="cart__total">
                        <h6>Cart total</h6>
                        <ul>
                            <li>Subtotal <span id="totall"> {{ $subtotal}}</span></li>
                            <li>Total <span id="total">{{ $subtotal}}</span></li>
                        </ul>
                        <a href="/checkout" class="primary-btn">Proceed to checkout</a>
                    </div>
                </div>
            </div>
        </div>
    <br><br><br>
    <!-- Footer Section Begin -->
    <footer class="footer set-bg" data-setbg="img/footer-bg.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="footer__widget">
                        <h6>JAM KERJA</h6>
                        <ul>
                            <li>Senin - Jum'at : 08:00 am – 17:00 pm</li>
                            <li>Saturday : 10:00 am – 15:00 pm</li>
                            <li>Sunday : Off Work</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="footer__about">
                        <div class="footer__logo">
                            <a href="#"><img src="{{asset('assets/img/logo catering footer.png')}}" height="120px" width="150px" alt=""></a>
                        </div>
                        <p>Mudah, cepat, dan enak</p>
                        <div class="footer__social">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="footer__newslatter">
                        <h6>Contact</h6>
                        <h6>Whatshapp</h6><p>08222737377</p>
                        <h6>Instagram</h6><p>@Sudimoro</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7">
                        <p class="copyright__text text-white">
                            By Sudimoro Group
                      </p>
                  </div>
                  <div class="col-lg-5">
                    <div class="copyright__widget">
                        <ul>
                            <li><a href="#">Cara Memesan Menu</a></li>
                            <li><a href="#">Tentang Kami</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- Footer Section End -->

<!-- Search Begin -->
<div class="search-model">
    <div class="h-100 d-flex align-items-center justify-content-center">
        <div class="search-close-switch">+</div>
        <form class="search-model-form">
            <input type="text" id="search-input" placeholder="Search here.....">
        </form>
    </div>
</div>
<!-- Search End -->
@endsection
@push('scripts')
    @include('layouts.partial.script')
    <script type="text/javascript">
function hanyaAngka(evt,a) {
    var charCode = (evt.which) ? evt.which : event.keyCode
    
    var currentVal = parseInt($(a).val());
    // console.log(currentVal); 
    if (!isNaN(currentVal)) {
            // Increment
            // console.log("a");
            if (charCode > 31 && (charCode < 48 || charCode > 57))
            
            return false;
            return true;
        } else {
            if (charCode > 31 && (charCode < 49 || charCode > 57))
            
            return false;
            return true;
        }
   
}
function a(nilai,id){
           
           // 
           var n = $(nilai).val();
          console.log(id);
               tambah(id,n);
       }
       function tambah(id,n){
            $.get({
                    url:"{{url('/keranjang/change')}}"+"/"+id+"/"+n,
                    type:'GET',
                    // dataType: 'json',
                    data: 
                        {
                            // "id_calon_karyawan": kar, 
                            "_token": "{{ csrf_token() }}",
                        },
                    success:function(response){
                    //    console.log("a");
                        price = document.getElementById("price"+id).innerHTML;
                        sub = document.getElementById("sub"+id).innerHTML;
                        console.log(sub);
                        sub1= document.getElementById("sub"+id).innerHTML = price*n;
                        sub1 = document.getElementById("sub"+id).innerHTML;
                        var total=document.getElementById("total").innerHTML  ;
                        console.log(sub1);

                        if(parseInt(sub1)-parseInt(sub)<0){
                            cek = parseInt(sub)-parseInt(sub1);
                            console.log(cek);
                            document.getElementById("total").innerHTML  =parseInt( total)-parseInt(cek) ;
                            document.getElementById("totall").innerHTML  =parseInt( total)-parseInt(cek) ;
                        }else{
                            cek = parseInt(sub1)-parseInt(sub);
                            console.log(cek);
                            document.getElementById("total").innerHTML  =parseInt( total)+parseInt(cek) ;
                            document.getElementById("totall").innerHTML  =parseInt( total)+parseInt(cek) ;
                        }

                    }    
                });
        }
        function deleted(id){
            // console.log("a");
            $.get({
                    url:"{{url('/keranjang/delete')}}"+"/"+id,
                    type:'GET',
                    // dataType: 'json',
                    data: 
                        {
                            // "id_calon_karyawan": kar, 
                            "_token": "{{ csrf_token() }}",
                        },
                    success:function(response){
                        x = document.getElementById("table"+fieldName).rowIndex;
                        // alert( x);
                        document.getElementById("check").remove();
                        $("#total").remove();
                        
                        $(".badge-danger").html("0");
                        document.getElementById("table").deleteRow(x);
                    }    
                });
        }


        jQuery(document).ready(function(){
    // This button will increment the value
    $('[data-quantity="plus"]').click(function(e){
        // Stop acting like a button
        e.preventDefault();
        // Get the field name
        fieldName = $(this).attr('data-field');
        // Get its current value
        var currentVal = parseInt($('input[name='+fieldName+']').val());
        // If is not undefined
        // console.log(fieldName);
        if (!isNaN(currentVal)) {
            // Increment
            $('input[name='+fieldName+']').val(currentVal + 1);
            tambah(fieldName,currentVal+1);
        } else {
            // Otherwise put a 0 there
            $('input[name='+fieldName+']').val(1);
        }
    });
    // This button will decrement the value till 0
    $('[data-quantity="minus"]').click(function(e) {
        // Stop acting like a button
        e.preventDefault();
        // Get the field name
        fieldName = $(this).attr('data-field');
        // Get its current value
        var currentVal = parseInt($('input[name='+fieldName+']').val());
        // If it isn't undefined or its greater than 0
        if (!isNaN(currentVal) && currentVal > 0) {
            // Decrement one
            if(currentVal - 1>0){
                $('input[name='+fieldName+']').val(currentVal - 1);
                tambah(fieldName,currentVal-1);
            }else{
                // $('input[name='+fieldName+']').val(1);
                // // tambah(fieldName,currentVal-1);
                // x = document.getElementById("table"+fieldName).rowIndex;
                // // alert( x);
                // document.getElementById("table").deleteRow(x);
                swal({
                    title: 'Apakah Kamu Yakin?',
                    text: 'Produk ini akan terhapus dari keranjang!',
                    icon: 'warning',
                    buttons: ["Cancel", "Delete!"],
                }).then(function(value) {
                    if (value) {
                        // console.log("a");
                        deleted(fieldName);
                    }
                });
            }
           
        } else {
            // Otherwise put a 0 there
            $('input[name='+fieldName+']').val(1);
        }
    });
});
    </script>
@endpush