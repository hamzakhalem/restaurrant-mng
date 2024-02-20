<!DOCTYPE html>
<html lang="en">

  <head>
    <base href="/public">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;500;600;700&display=swap" rel="stylesheet">
    <title>Klassy Cafe - Restaurant HTML Template</title>
    <!--
        
        TemplateMo 558 Klassy Cafe
        
        https://templatemo.com/tm-558-klassy-cafe
        
    -->
    <!-- Additional CSS Files -->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css">
    
    <link rel="stylesheet" href="assets/css/templatemo-klassy-cafe.css">
    
    <link rel="stylesheet" href="assets/css/owl-carousel.css">
    
    <link rel="stylesheet" href="assets/css/lightbox.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    
    </head>
    
    <body>
    
    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>  
    <!-- ***** Preloader End ***** -->
    
    
    <!-- ***** Header Area Start ***** -->
    <header class="header-area header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <!-- ***** Logo Start ***** -->
                        <a href="index.html" class="logo">
                            <img src="assets/images/klassy-logo.png" align="klassy cafe html template">
                        </a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            <li class="scroll-to-section"><a href="#top" class="active">Home</a></li>
                            <li class="scroll-to-section"><a href="#about">About</a></li>
                           	
                        <!-- 
                            <li class="submenu">
                                <a href="javascript:;">Drop Down</a>
                                <ul>
                                    <li><a href="#">Drop Down Page 1</a></li>
                                    <li><a href="#">Drop Down Page 2</a></li>
                                    <li><a href="#">Drop Down Page 3</a></li>
                                </ul>
                            </li>
                        -->
                            <li class="scroll-to-section"><a href="#menu">Menu</a></li>
                            <li class="scroll-to-section"><a href="#chefs">Chefs</a></li> 
                            <li class="submenu">
                                <a href="javascript:;">Features</a>
                                <ul>
                                    <li><a href="#">Features Page 1</a></li>
                                    <li><a href="#">Features Page 2</a></li>
                                    <li><a href="#">Features Page 3</a></li>
                                    <li><a href="#">Features Page 4</a></li>
                                </ul>
                            </li>
                            <!-- <li class=""><a rel="sponsored" href="https://templatemo.com" target="_blank">External URL</a></li> -->
                            <li class="scroll-to-section"><a href="#reservation">Contact Us</a></li> 
                            @auth
                                <li class="scroll-to-section"><a href="{{ route('showcart', Auth::user()->id) }}">Cart[{{ $count }}]</a></li> 
                            @endauth
                            @guest
                                <li class="scroll-to-section"><a href="#">Cart[0]</a></li> 
                            @endguest
                            <li class="scroll-to-section">
                                
                                @if (Route::has('login'))
                                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                                    @auth
                                        <li>
                                            <x-app-layout>

                                            </x-app-layout>                                        
                                        </li>
                                    @else
                                            <li>
                                                <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a> 
                                            </li>
                
                                        @if (Route::has('register'))
                                           <li>
                                                <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                                           </li> 
                                        @endif
                                    @endauth
                                </div>
                                @endif
                                
                            </li> 
                        </ul>        
                        <a class='menu-trigger'>
                            <span>Menu</span>
                        </a>
                        <!-- ***** Menu End ***** -->
                    </nav>
                </div>
            </div>
        </div>
    </header>



<div class="container " style="margin-top:120px; margin-left: 10%">
    <div class="table-responsive m-auto mt-4 " style="width: 80%">
                
        <table class="table table-dark">
            <thead>
              <tr>
                <th scope="col">Food Name</th>
                <th scope="col">Price</th>
                <th scope="col">Qte</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
    <form action="{{ route('orderconfirm') }}" method="POST">
        @csrf
    
            @foreach($carts as $cart)
                 
                <tr>
                    <td>
                        {{ $cart->title }}
                        <input type="text" name="foodname[]" value="{{ $cart->title }}" hidden>
                        
                    </td>
                    <td>
                        {{ $cart->price }}
                        <input type="text" name="price[]" value="{{ $cart->price }}" hidden>
                    </td>
                    <td>
                        {{ $cart->quantity }}
                        <input type="text" name="quantity[]" value="{{ $cart->quantity }}" hidden>
                    </td>
                  
                   
                </tr>
    
            @endforeach
                @foreach ($cartsid as $cart)
                    
                    <td>
                        <a href="{{ route('removeCart', $cart->id) }}"  >Remove</a>
                    </td>
                @endforeach
            
            </tbody>
        </table>
        <div id="order" class="container center" style="padding: 10px">
            <button class="btn btn-dark">Order Now</button>
        </div>
        <div id="order-place" class="center" style="padding: 10px; display: none">
            <div>
                <label for="name">Name:</label>
                <input type="text" name="name" placeholder="Name">
            </div>
            <div>
                <label for="phone">Phone:</label>
                <input type="number" name="phone" placeholder="+XXX XXX XXX">
            </div>
            <div>
                <label for="name">Adress:</label>
                <input type="text" name="address" placeholder="Adress">
            </div>
            <div>
                <input type="submit" value="Order Confirm" class="btn btn-dark">
            </div>

        </form>
        </div>
    </div>
</div>







       
    <!-- ***** Footer Start ***** -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-xs-12">
                    <div class="right-text-content">
                            <ul class="social-icons">
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                            </ul>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="logo">
                        <a href="index.html"><img src="assets/images/white-logo.png" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-4 col-xs-12">
                    <div class="left-text-content">
                        <p>© Copyright Klassy Cafe Co.
                        
                        <br>Design: TemplateMo</p>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- jQuery -->
    <script src="assets/js/jquery-2.1.0.min.js"></script>

    <!-- Bootstrap -->
    <script src="assets/js/popper.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

    <!-- Plugins -->
    <script src="assets/js/owl-carousel.js"></script>
    <script src="assets/js/accordions.js"></script>
    <script src="assets/js/datepicker.js"></script>
    <script src="assets/js/scrollreveal.min.js"></script>
    <script src="assets/js/waypoints.min.js"></script>
    <script src="assets/js/jquery.counterup.min.js"></script>
    <script src="assets/js/imgfix.min.js"></script> 
    <script src="assets/js/slick.js"></script> 
    <script src="assets/js/lightbox.js"></script> 
    <script src="assets/js/isotope.js"></script> 
    
    <!-- Global Init -->
    <script src="assets/js/custom.js"></script>
    <script>
        $('#order').click(function(){
            $('#order-place').show();
        });
    </script>
    <script>

        $(function() {
            var selectedClass = "";
            $("p").click(function(){
            selectedClass = $(this).attr("data-rel");
            $("#portfolio").fadeTo(50, 0.1);
                $("#portfolio div").not("."+selectedClass).fadeOut();
            setTimeout(function() {
              $("."+selectedClass).fadeIn();
              $("#portfolio").fadeTo(50, 1);
            }, 500);
                
            });
        });

    </script>
  </body>
</html>