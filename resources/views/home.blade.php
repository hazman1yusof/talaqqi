@extends('layouts.main')

@section('page')

@section('styles')
  .carousel-3d{
    height: 100%;
    object-fit: fill;
  }
  .carousel-3d-slide{
    border-radius: 8px !important;
    box-shadow: -1px 2px 2px 1px #888888;
  }
@endsection

<div id="vue-slider">
  <div class="row row-para m-0 p-0">
    <carousel-3d :count="slides.length" :controls-visible="carouselControls" :width="slideWidth"
                 :height="slideHeight" :autoplay="autoplayEnabled" :disable3d="disable3d"
                 :space="slideSpace" :perspective="slidePerspective" :display="visible" :loop="infinite"
                 :animation-speed="animationSpeed" :dir="direction" :border="slideBorder"
                 :start-index="startIndex"
                 :inverse-scaling="slideScaling">
          <slide :index="0">
            <img src="http://www.uwaisqorny.com/wp-content/uploads/2017/11/header-kf.jpg" class='carousel-3d'>
          </slide>
          <slide :index="1">
            <img src="http://www.uwaisqorny.com/wp-content/uploads/2017/11/uwaisqorny.com-about.jpg" class='carousel-3d'>
          </slide>
          <slide :index="2">
            <img src="http://www.uwaisqorny.com/wp-content/uploads/2017/11/LOGO-BARU-PROTAZz2-smaller.png" class='carousel-3d'>
          </slide>
    </carousel-3d>
  </div>
</div>
<script type="text/javascript">
  require(['vue','Carousel3d','jquery'], function (vue,Carousel3d,$) {
    var slides = new vue({
        el: '#vue-slider',
        components: {
            'carousel-3d': Carousel3d.Carousel3d,
            'slide': Carousel3d.Slide
        },
        data: {
            carouselControls: true,
            slideWidth: 820,
            slideHeight: 400,
            slideBorder: 1,
            slideSpace: 240,
            slidePerspective: 35,
            slideScaling: 300,
            animationSpeed: 500,
            startIndex: 0,
            autoplayEnabled: false,
            visible: 5,
            direction: 'rtl',
            infinite: true,
            disable3d: false,
            slides: []
        },
        methods: {
            addSlide () {
                this.slides.push({
                    title: 'Slide X',
                    desc: 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Enim, maxime.',
                    src: 'https://placehold.it/360x270'
                })
            },
            removeSlide () {
                this.slides.pop()
            }
        }
    });

    slides.$nextTick(function () {
      $('.carousel-3d-container').css("height", "+=20")
    })
  });
</script>


<div class="container">
  <div class="row row-cards row-deck">
    <div class="col-md-12 col-lg-12">
      <div class="row">

      </div>
    </div>
  </div>
</div>


@endsection