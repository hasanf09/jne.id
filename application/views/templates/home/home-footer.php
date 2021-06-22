<br><br>



<!-- Footer -->
<!DOCTYPE html>
<html>

<head>
    <footer id="register">
        <div class="container">
            <div class="col-md-4">
                <h4>ALAMAT</h4><br>
                <p>
                    <span style="line-height: 20px">
                    Jalur Nugraha Ekakurir (JNE) <br>
                        Kantor Pusat : <br>
                        Jl. Tomang Raya No. 11 <br>
                        Jakarta Barat 11440 <br>
                    </span>
                </p>
                <ul class="list-inline" style="font-size: 18px;font-weight: bold;">
                    <li>
                        <p> &nbsp;
                            CUSTOMER CARE :<br>
                            <span style="color: lightblue"><i class="fa fa-phone" style="transform: scaleX(-1);"></i></span> &nbsp;(62-21) 2927 8888
                        </p>
                    </li>&nbsp;&nbsp;&nbsp;
                    <li><span style="color: lightblue"><i class="fa fa-envelope"></i></span> &nbsp;
                    <span style="color: lightblue"><i class="__cf_email__" style="transform: scaleX(-1);"></i></span> &nbsp;CUSTOMERCARE@JNE.CO.ID
                     </li>
                </ul>
            </div>
            <div class="col-md-4 hidden-xs footer-link">
                <h4>QUICK LINKS</h4><br>
                <ul class="col-md-6 quick-link list-unstyled">
                    <li><i class="fa fa-angle-right"></i>
                        <a href="<?= base_url('home'); ?>">
                            Home </a>
                    </li>
                    <li><i class="fa fa-angle-right"></i>
                        <a href="<?= base_url('id/sejarah'); ?>">
                            Profile </a>
                    </li>
                    <li><i class="fa fa-angle-right"></i>
                        <a href="<?= base_url('id/produk'); ?>">
                            Product & Services </a>
                    </li>
                    <li><i class="fa fa-angle-right"></i>
                        <a href="<?= base_url('id/kontak'); ?>">
                            Contact Us </a>
                    </li>
                </ul>
            </div>
            <div class="col-md-4 ftr-logo text-center">
                <div class="box-ftr">
                    <a href="<?= base_url('home'); ?>"><img src="<?= base_url('assets/img/logo/logo jne.png'); ?>" alt="" width="100%"></a>
                </div>
                <ul class="list-inline social-footer">
                    <li><i class="fab fa-facebook-square"></i> &nbsp;<a href="https://www.facebook.com/JNEPusat/" target="_blank">jne.id</a></li>&nbsp;
                    <li><i class="fab fa-twitter-square"></i> &nbsp;<a href="https://twitter.com/JNE_ID" target="_blank">@jne_id</a></li>&nbsp;
                    <li><i class="fab fa-instagram"></i> &nbsp;<a href="https://www.instagram.com/jne_id/" target="_blank">@jne_id</a></li>&nbsp;
                    <li><i class="fas fa-globe-americas"></i> &nbsp;<a href="https://www.jne.co.id/id/beranda" target="_blank">jne.id</a></li>&nbsp;
                </ul>
            </div>
        </div>
    </footer>
    </body>

</html>
<!-- End of Footer -->

<a id="scroller"><i class="fas fa-angle-up"></i></a>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-126976199-1"></script>
<script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'UA-126976199-1');
</script>
<script>
    AOS.init({
        duration: 1000
    });

    // Swiper
    var swiper = new Swiper('.swiper-container', {
        spaceBetween: 30,
        centeredSlides: true,
        autoplay: {
            delay: 2500,
            disableOnInteraction: false,
        },
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
    });
    // End Swiper


    //
    var modal = $('#myModal'),
        modalImg = $('#img01'),
        captionText = $('#caption'),
        span = $('.close');

    $('.myImg').click(function() {
        modal.style.display = "block";
        modalImg.src = $(this).data('img');
        captionText.innerHTML = this.alt;
    });

    span.onclick = function() {
        modal.style.display = "none";
    }
    // End Image Show

    var acc = document.getElementsByClassName("accordion_ak");
    var i;

    for (i = 0; i < acc.length; i++) {
        acc[i].addEventListener("click", function() {
            this.classList.toggle("active_ak");
            var panel = this.nextElementSibling;
            if (panel.style.display === "block") {
                panel.style.display = "none";
            } else {
                panel.style.display = "block";
            }
        });
    }

    var acc = document.getElementsByClassName("accordion_sp");
    var i;

    for (i = 0; i < acc.length; i++) {
        acc[i].addEventListener("click", function() {
            this.classList.toggle("active_sp");
            var panel = this.nextElementSibling;
            if (panel.style.display === "block") {
                panel.style.display = "none";
            } else {
                panel.style.display = "block";
            }
        });
    }

    var acc = document.getElementsByClassName("accordion_pk");
    var i;

    for (i = 0; i < acc.length; i++) {
        acc[i].addEventListener("click", function() {
            this.classList.toggle("active_pk");
            var panel = this.nextElementSibling;
            if (panel.style.display === "block") {
                panel.style.display = "none";
            } else {
                panel.style.display = "block";
            }
        });
    }


    var acc = document.getElementsByClassName("accordion_p");
    var i;

    for (i = 0; i < acc.length; i++) {
        acc[i].addEventListener("click", function() {
            this.classList.toggle("active_p");
            var panel = this.nextElementSibling;
            if (panel.style.display === "block") {
                panel.style.display = "none";
            } else {
                panel.style.display = "block";
            }
        });
    }

    $(document).ready(function() {
        // Fade in/out based on scrollTop value
        $(window).scroll(function() {
            if ($(this).scrollTop() > 700) {
                $('#scroller').fadeIn();
            } else {
                $('#scroller').fadeOut();
            }
        });

        $(window).scroll(function() {
            if ($(this).scrollTop() > 50) {
                $('.languange').fadeOut();
            } else {
                $('.languange').fadeIn();
            }
        });

        // Scroll body to 0px on click
        $('#scroller').click(function() {
            $('body,html').animate({
                scrollTop: 0
            }, 700);
            return false;
        });

        var acc = document.getElementsByClassName("collapsed");
        var i;

        for (i = 0; i < acc.length; i++) {
            acc[i].addEventListener("click", function() {
                this.classList.toggle("active");
                var panel = this.nextElementSibling;
                if (panel.style.maxHeight) {
                    panel.style.maxHeight = null;
                } else {
                    panel.style.maxHeight = panel.scrollHeight + "px";
                }
            });
        }
    });

    (function($) {
        $.fn.inputFilter = function(inputFilter) {
            return this.on("input keydown keyup mousedown mouseup select contextmenu drop", function() {
                if (inputFilter(this.value)) {
                    this.oldValue = this.value;
                    this.oldSelectionStart = this.selectionStart;
                    this.oldSelectionEnd = this.selectionEnd;
                } else if (this.hasOwnProperty("oldValue")) {
                    this.value = this.oldValue;
                    this.setSelectionRange(this.oldSelectionStart, this.oldSelectionEnd);
                }
            });
        };
    }(jQuery));
</script>
</body>

</html>