// memastikan file sudah dilolad dgn sempurna
$(document).ready(function () {

    // preloader
    $(".spinner").fadeOut();


    // navbar
    $('#navbar1').click(function () {
        $('.menu').slideToggle();
    });

    $('#ryan').ready(function () {
        $('.menu2').hide();
    });


    $('#ryan').click(function () {
        $('.menu2').slideToggle();

    });


    // akhir navbar============
    $('h2').mouseenter(function () {
        $(this).css('color', 'blue');
    });

    $('h2').mouseleave(function () {
        $('h2').css('color', '#149b80');
    });


    $('h1').mouseenter(function () {
        $(this).css('color', 'blue');
    });

    $('h1').mouseleave(function () {
        $(this).css('color', '#12806a');
    });








    $('#kirimPesan').css({
        'color': '#12806a',
        'fontFamily': 'BebasNeue',
        'fontFamily': 'sans-serif',
        'text-align': 'center'
    });

    $('#kontak').mouseenter(function () {
        $('#kontak').css('color', 'yellow');
    });

    $('#kontak').mouseleave(function () {
        $('#kontak').css('color', 'white');
    });

    $('.btn-primary').click(function () {
        var nama = $('#nama').val();
        alert("Terima kasih telah mengirim pesan ini  " + nama) //aya notif diluhurna//

    });

    $('.content').mouseenter(function () {
        $('.content').css({
            'border-bottom': '5px solid #3498db'
        });
    });

    $('.content').mouseleave(function () {
        $('.content').css({
            'border-bottom': '0 solid #3498db'
        });
    });


    // Add smooth scrolling to all links
    $("a").on('click', function (event) {
        // Make sure this.hash has a value before overriding default behavior
        if (this.hash !== "") {
            // Prevent default anchor click behavior
            event.preventDefault();
            // Store hash
            var hash = this.hash;
            // Using jQuery's animate() method to add smooth page scroll
            // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
            $('html, body').animate({
                scrollTop: $(hash).offset().top
            }, 800, function () {
                // Add hash (#) to URL when done scrolling (default click behavior)
                window.location.hash = hash;
            });
        } // End if
    });


    // ========== marquee ==========
    $('marquee').mouseenter(function () {
        $('marquee').css('color', 'blue');
        $('marquee').stop();
    });

    $('marquee').mouseleave(function () {
        $('marquee').css('color', 'inherit');
    });

    var kelas1 = $('.menu').offset().top;

    $(window).scroll(function () {

        if ($(window).scrollTop() >= kelas1) {
            $('.menu').addClass('kelas1');
            $('.wrap').addClass('kelas2');

        } else {
            $('.menu').removeClass('kelas1');
            $('.wrap').removeClass('kelas2');
        }
    })



});