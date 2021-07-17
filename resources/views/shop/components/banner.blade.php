<div class="slider owl-carousel owl-theme">
    @if ($sliders->isEmpty())
        <div class="slider__item" style="background-image: url({{asset('shop/assets/image/slideshow_2.jpg')}});"></div>
        <div class="slider__item" style="background-image: url({{asset('shop/assets/image/slideshow_3.jpg')}});"></div>
    @else
        @foreach($sliders as $slider)
            <div class="slider__item" style="background-image: url({{ $slider->image_path }});"></div>
        @endforeach
    @endif
</div>
<div class="banner__category">
    <div class="row no-gutters">
        <div class="col l-4 m-4 c-12 banner__category-item">
            <a class="banner__category-link">
                <div class="banner__category-image" style="background-image: url({{asset('shop/assets/image/block_home_category1.jpg')}});"></div>
            </a>
            <div class="banner__category-caption">
                <span>SALE UP TO 70%</span>
                <h3>SPECIAL PRICE</h3>
                <a href="" class="button">Mua ngay</a>
            </div>
        </div>
        <div class="col l-4 m-4 c-12 banner__category-item">
            <a class="banner__category-link">
                <div class="banner__category-image" style="background-image: url({{asset('shop/assets/image/block_home_category2.jpg')}});"></div>
            </a>
            <div class="banner__category-caption">
                <span>NEW COLLECTION</span>
                <h3>SPECIAL PRICE</h3>
                <a href="/danh-muc/ao-phong" class="button">Mua ngay</a>
            </div>
        </div>
        <div class="col l-4 m-4 c-12 banner__category-item">
            <a class="banner__category-link">
                <div class="banner__category-image" style="background-image: url({{asset('shop/assets/image/block_home_category3.jpg')}});"></div>
            </a>
            <div class="banner__category-caption">
                <span>NEW COLLECTION</span>
                <h3>SPECIAL PRICE</h3>
                <a href="" class="button">Mua ngay</a>
            </div>
        </div>
    </div>
</div>
