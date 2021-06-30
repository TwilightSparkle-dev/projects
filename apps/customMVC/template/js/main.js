$(document).ready(function () {

    var uri = $('#lang_change_uri').val();

    if (uri == '/buy') {
        let mainSliderSelector = '.main-slider',
            navSliderSelector = '.nav-slider',
            interleaveOffset = 0.5;

        // Main Slider
        let mainSliderOptions = {
            loop: true,
            speed: 1000,
            autoplay: {
                delay: 3000
            },
            loopAdditionalSlides: 10,
            grabCursor: true,
            watchSlidesProgress: true,
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            on: {
                init: function () {
                    this.autoplay.stop();
                },
                imagesReady: function () {
                    this.el.classList.remove('loading');
                    this.autoplay.start();
                },
                slideChangeTransitionEnd: function () {
                    let swiper = this,
                        captions = swiper.el.querySelectorAll('.caption');
                    for (let i = 0; i < captions.length; ++i) {
                        captions[i].classList.remove('show');
                    }
                    swiper.slides[swiper.activeIndex].querySelector('.caption').classList.add('show');
                },
                progress: function () {
                    let swiper = this;
                    for (let i = 0; i < swiper.slides.length; i++) {
                        let slideProgress = swiper.slides[i].progress,
                            innerOffset = swiper.width * interleaveOffset,
                            innerTranslate = slideProgress * innerOffset;
                        swiper.slides[i].querySelector(".slide-bgimg").style.transform =
                            "translate3d(" + innerTranslate + "px, 0, 0)";
                    }
                },
                touchStart: function () {
                    let swiper = this;
                    for (let i = 0; i < swiper.slides.length; i++) {
                        swiper.slides[i].style.transition = "";
                    }
                },
                setTransition: function (speed) {
                    let swiper = this;
                    for (let i = 0; i < swiper.slides.length; i++) {
                        swiper.slides[i].style.transition = speed + "ms";
                        swiper.slides[i].querySelector(".slide-bgimg").style.transition =
                            speed + "ms";
                    }
                }
            }
        };
        let mainSlider = new Swiper(mainSliderSelector, mainSliderOptions);

        // Navigation Slider
        let navSliderOptions = {
            loop: true,
            loopAdditionalSlides: 10,
            speed: 1000,
            spaceBetween: 5,
            slidesPerView: 5,
            centeredSlides: true,
            touchRatio: 0.2,
            slideToClickedSlide: true,
            direction: 'vertical',
            on: {
                imagesReady: function () {
                    this.el.classList.remove('loading');
                },
                click: function () {
                    mainSlider.autoplay.stop();
                }
            }
        };
        let navSlider = new Swiper(navSliderSelector, navSliderOptions);

        // Matching sliders
        mainSlider.controller.control = navSlider;
        navSlider.controller.control = mainSlider;
    }

    if (uri == '/game') {
        const game = document.querySelector('.game');
        var arrFactory = [];
        var arrTree = [];
        var newFactory;
        var interval = 800;

//var counter = 1;

        function createGame() {
            for (let i = 0; i < 30; i++) {
                let a = document.querySelector('.game');
                let b = document.createElement('div');
                b.classList.add('box');
                b.setAttribute('data-value', i);
                a.appendChild(b);
            }

        }

        function replay() {
            var replay = document.querySelector('.replay');
            replay.addEventListener('click', function () {
                box.forEach(function (box) {
                    box.classList.remove('green');
                    box.classList.remove('tree');

                });
                //counter += 1;
                //document.querySelector('.counter').innerHTML = 'Level: ' + counter;
                document.querySelector('.hidden').classList.add('levelUp')
                let bang = document.querySelector('.won');
                newFactory = setInterval(randomFactory, 600);
                bang.style.animation = 'start .6s ease-in-out';
                bang.style.top = '100%';
            });
        }

        function addTree(e) {
            let c = e.target;

            if (arrTree.indexOf(c.dataset.value) == -1) {
                arrTree.push(c.dataset.value);
                if (arrTree.length == 30) {
                    clearInterval(newFactory);

                    document.querySelector('.hidden').classList.remove('levelUp');
                    let bang = document.querySelector('.won');
                    bang.style.animation = 'won .6s ease-in-out';
                    bang.style.top = '30%';
                    replay();
                }
            }


            if (arrFactory.indexOf(c.dataset.value) != -1) {
                arrFactory.splice(arrFactory.indexOf(c.dataset.value), 1);
            }
            c.classList.remove('red');
            c.classList.remove('factory');
            c.classList.add('green');
            c.classList.add('tree');
            console.log(arrTree);
        }

        function randomFactory() {
            let e = Math.random() * 30;
            let g = Math.floor(e);

            if (arrFactory.indexOf(box[g].dataset.value) == -1) {
                arrFactory.push(box[g].dataset.value);
                box[g].classList.add('red');
                box[g].classList.remove('green');
                box[g].classList.add('factory');
                if (arrFactory.length == 30) {
                    clearInterval(newFactory);
                }
            }

            if (arrTree.indexOf(box[g].dataset.value) != -1) {
                arrTree.splice(arrTree.indexOf(box[g].dataset.value), 1);
            }
            console.log(arrFactory);
        }

        var yol = document.querySelector('.yolo');

        createGame();

        var box = document.querySelectorAll('.box');
// console.log(box);
        var start = document.querySelector('.floating');
        start.addEventListener('click', function () {
            let init = document.querySelector('.init');
            init.style.animation = 'start .5s ease-in';
            init.style.top = '100%';
            newFactory = setInterval(randomFactory, interval);
        });

        box.forEach(function (box) {
            box.addEventListener('click', addTree, false);
        }, false);

        function fire(e) {
            console.log(e.target);
            let trg = e.target;

            const itemDim = this.getBoundingClientRect(),
                itemSize = {
                    x: itemDim.right - itemDim.left,
                    y: itemDim.bottom - itemDim.top,
                };

            let burst = new mojs.Burst({
                left: itemDim.left + (itemSize.x / 2),
                top: itemDim.top + (itemSize.y / 1.7),
                count: 9,
                radius: {50: 90},
            });
            burst.play();
        };


        box.forEach(function (box) {
            box.addEventListener('click', fire);
        });
    }




    $('.page-buy-gallery_photo-active').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        fade: true,
        asNavFor: '.page-buy-gallery_photo'
    });

    $('.page-buy-gallery_photo').slick({
        slidesToShow: 3,
        autoplay: true,
        slidesToScroll: 1,
        asNavFor: '.page-buy-gallery_photo-active',
        dots: true,
        centerMode: true,
        focusOnSelect: true
    });

    $('.page-buy-gallery_video').slick({
        slidesToShow: 3,
        autoplay: true,
        slidesToScroll: 1,
        dots: true,
        centerMode: true,
        focusOnSelect: true,
        arrows: true
    });


    $('#change_lang').ddslick({
        width: 150,
        height: 75
    });

    $('.dd-option').click(function () {
        var language = $(this).children('.dd-option-value').val(),
            uri = $('#lang_change_uri').val();

        var url = '/user/changeLanguage/' + language;
        $(function () {
            $.post(url, {}, function () {
                window.location.href = uri;
            });
            return false;

        });
    });


});
