
    <div class ="carousel-custom">
        <div>
          <img src ="<?=base_url()?>application/public/img/main/carousel-1.jpg" class="c-images"/>
        </div>
        <div><img src ="<?=base_url()?>application/public/img/main/carousel-2.jpg" class="c-images"/> </div>
         <div><img src ="<?=base_url()?>application/public/img/main/carousel-3.jpg" class="c-images"/> </div>

    </div>


    <div class = "container" id="height-adjust">
      <div class = "row">
        <div class = "home-header">Rooms</div>
      </div>
          <div class="row home-item">
            <div class = "col-xs-5 image">
              <a href = "#" class = "image">
                <img src ="<?=base_url()?>application/public/img/Rooms/Bungalow.jpg" class="ra-images"/>
              </a>
              <h2><span>Bungalow</span></h2>
            </div>
            <div class = "col-xs-1"></div>
            <div class = "col-xs-5 image">
              <a href = "#">
                <img src ="<?=base_url()?>application/public/img/Rooms/Deluxe.jpg" class="ra-images"/>
              </a>
              <h2><span>Deluxe</span></h2>
            </div>
          </div>
          <div class="row home-item">
            <div class = "col-xs-5 image">
              <a href = "#">
                <img src ="<?=base_url()?>application/public/img/Rooms/Executive.jpg" class="ra-images"/>
              </a>
              <h2><span>Executive</span></h2>
            </div>
            <div class = "col-xs-1"></div>
            <div class = "col-xs-5 image">
              <a href = "#">
                <img src ="<?=base_url()?>application/public/img/Rooms/Presidential Suite.jpg" class="ra-images"/>
              </a>
              <h2><span>Presidential Suite</span></h2>
            </div>
          </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function(){
            $('.carousel-custom').slick({
              dots: true,
              infinite: true,
              speed: 1,
              fade: true,
              slide: 'div',
              cssEase: 'linear'
            });

         $("h2")
          .wrapInner("<span>")

        $("h2 br")
          .before("<span class='spacer'>")
          .after("<span class='spacer'>");



        });
    </script>
        