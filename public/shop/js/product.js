var  ncurrent;

$(document).ready(function() {
    changeImageDetail('thumb-one');
    ncurrent = ncurrent - 1;
});

function changeImageDetail(id = 'thumb-one') {
    const imageThumb =  document.getElementById(id);
    const imagePath = imageThumb.getAttribute('src');
    ncurrent = parseInt($('.product__gallery-thumb').index('.active') + 1);
    document.getElementById('img-detail').setAttribute('src', imagePath);
    document.querySelector('.product__gallery-thumb.active').classList.remove('active');
    imageThumb.closest('.product__gallery-thumb').classList.add('active');
};



$(document).on('click', '.product__zoom-in', function() {
    $('body').addClass('open__layer');
    $('.divzoom').css({'opacity': 0, 'visibility': 'hidden'}).show();

    if ( $(window).width() < 1024) {
        ncurrent = parseInt($(".product__image-slider-item.is-selected").index());
    };

    $('.divzoom__main').flickity({
        resize: true,
        draggable: true,
    })
        .flickity( 'select', ncurrent );

    setTimeout(function() {
        $('.divzoom').css({'opacity': 1, 'visibility': 'visible'})
    }, 50);
});

function addToCart(event) {
    event.preventDefault();
    let url = $(this).data('url');
    let size = $('.sd').text().trim();
    let quantity =  $("input[name='quantity']").val();
    let data = {
        'size': size,
        'quantity': quantity
    }

    $.ajax({
        type: 'GET',
        url: url,
        data: data,
        dataType: 'json',
    })
        .then(data => {
            if(data.code === 200) {
                console.log(data)
                $('.cart_count').text(data.count)
            }
        })
        .catch(err => {
            // console.log(err);
        })
}

$(function() {
    $('.add_to_cart').on('click', addToCart);
});

$(document).on('click','.divzoom__close', function(event) {
    $(".divzoom").hide();
    $("body").removeClass("open__layer");
    $('.divzoom__main').flickity('select', 0);
    //$('.divzoom_main').slick('unslick');
});

$('.image__main').flickity({
    resize: true,
    draggable: true,
    contain: true,
});
