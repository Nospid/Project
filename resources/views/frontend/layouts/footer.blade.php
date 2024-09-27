{{-- 



<!-- JavaScript files-->
<script src="{{asset('frontend/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('frontend/vendor/glightbox/js/glightbox.min.js')}}"></script>
<script src="{{asset('frontend/vendor/nouislider/nouislider.min.js')}}"></script>
<script src="{{asset('frontend/vendor/swiper/swiper-bundle.min.js')}}"></script>
<script src="{{asset('frontend/vendor/choices.js/public/assets/scripts/choices.min.js')}}"></script>
<script src="{{asset('frontend/js/front.js')}}"></script>
<script>
  // ------------------------------------------------------- //
  //   Inject SVG Sprite - 
  //   see more here 
  //   https://css-tricks.com/ajaxing-svg-sprite/
  // ------------------------------------------------------ //
  function injectSvgSprite(path) {
  
      var ajax = new XMLHttpRequest();
      ajax.open("GET", path, true);
      ajax.send();
      ajax.onload = function(e) {
      var div = document.createElement("div");
      div.className = 'd-none';
      div.innerHTML = ajax.responseText;
      document.body.insertBefore(div, document.body.childNodes[0]);
      }
  }
  // this is set to BootstrapTemple website as you cannot 
  // inject local SVG sprite (using only 'icons/orion-svg-sprite.svg' path)
  // while using file:// protocol
  // pls don't forget to change to your domain :)
  injectSvgSprite('https://bootstraptemple.com/files/icons/orion-svg-sprite.svg'); 
  
</script>
<!-- FontAwesome CSS - loading as last, so it doesn't block rendering-->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
</div>

<footer class="bg-dark text-white">
  <div class="container py-4">
    <div class="row py-5">
      <div class="col-md-4 mb-3 mb-md-0">
        <h6 class="text-uppercase mb-3">Customer services</h6>
        <ul class="list-unstyled mb-0">
         
          <li><a class="footer-link" href="#!">Returns &amp; Refunds</a></li>
          <li><a class="footer-link" href="#!">Online Stores</a></li>
          <li><a class="footer-link" href="#!">Terms &amp; Conditions</a></li>
        </ul>
      </div>
      <div class="col-md-4 mb-3 mb-md-0">
        <h6 class="text-uppercase mb-3">Company</h6>
        <ul class="list-unstyled mb-0">
          <li><a class="footer-link" href="#!">About us</a></li>
          <li><a class="footer-link" href="#!">Contact us</a></li>
          <li><a class="footer-link" href="#!">Latest Posts</a></li>
          <li><a class="footer-link" href="!">Maps</a></li>
        </ul>
      </div>
      <div class="col-md-4">
        <h6 class="text-uppercase mb-3">Social media</h6>
        <ul class="list-unstyled mb-0">
          <li><a class="footer-link" href="#!">Twitter</a></li>
          <li><a class="footer-link" href="#!">Instagram</a></li>
          <li><a class="footer-link" href="#!">Facebook</a></li>
          <li><a class="footer-link" href="https://www.google.com/">Google</a></li>
        </ul>
      </div>
    </div>
    <div class="border-top pt-4" style="border-color: #1d1d1d !important">
      <div class="row">
        <div class="text-center ">
          <p class="small  mb-0 text-light ">&copy; 2021 All rights reserved.</p>
        </div>
        <div class=" text-center text-md-end">
          <p class="small text-muted mb-0 text-center"> <a class="text-white reset-anchor" href="https://bootstrapious.com/p/boutique-bootstrap-e-commerce-template">Optical Store</a></p>
         
        </div>
      </div>
    </div>
  </div>
</footer> --}}