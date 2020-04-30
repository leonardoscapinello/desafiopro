CountDownTimer('05/01/2020 23:59', 'countdown-timer');
var initialTimer = 1;

function CountDownTimer(dt, id) {
    var end = new Date(dt);
    var _second = 1000;
    var _minute = _second * 60;
    var _hour = _minute * 60;
    var _day = _hour * 24;
    var timer;
    let d = document.getElementsByClassName(id);


    function showRemaining() {
        var now = new Date();
        var distance = end - now;
        if (distance < 0) {
            clearInterval(timer);
            if (d !== null && d !== undefined) {
                for (let i = 0; i < d.length; i++) {
                    d[i].innerHTML = '00:00:00:00';
                }
                return;
            }

        }
        let days = Math.floor(distance / _day);
        let hours = Math.floor((distance % _day) / _hour);
        let minutes = Math.floor((distance % _hour) / _minute);
        let seconds = Math.floor((distance % _minute) / _second);
        let miliseconds = Math.floor((distance % seconds) / .5);


        days = days < 10 ? "0" + days : days;
        hours = hours < 10 ? "0" + hours : hours;
        minutes = minutes < 10 ? "0" + minutes : minutes;
        seconds = seconds < 10 ? "0" + seconds : seconds;
        miliseconds = miliseconds < 10 ? "0" + miliseconds : miliseconds;

        if (d !== null && d !== undefined) {
            for (let i = 0; i < d.length; i++) {
                d[i].innerHTML = "<span class=\"days\">" + days + ":</span>";
                d[i].innerHTML += "<span class=\"hours\">" + hours + ":</span>";
                d[i].innerHTML += "<span class=\"minutes\">" + minutes + ":</span>";
                d[i].innerHTML += "<span class=\"seconds\">" + seconds + "</span>";
            }
        }


        initialTimer = 1250;

    }

    timer = setInterval(showRemaining, initialTimer);
}


$(".modal-close").on("click", function () {
    $(this).parent().slideUp(300).delay(300).parent().fadeOut(300);
});
$(".modal-open").on("click", function () {
    $("#" + $(this).attr("data-modal")).fadeIn(300).children().slideDown(300);
});

$(document).ready(function () {
    $('.token').mask('000-000', {
        placeholder: "___-___"
    });
});

var owl = $(".carousel--exercicio");
var owl2 = $(".carousel--alimentacao");

owl.owlCarousel({
    nav: true,
    center: true,
    margin: 10,
    navText: ["<div class=\"owl--data-prev\"><i class=\"far fa-arrow-left\"></i></div>", "<div class=\"owl--data-next\"><i class=\"far fa-arrow-right\"></i></div>"],
    responsive: {
        0: {
            items: 1.2
        },
        600: {
            items: 2.2
        },
        960: {
            items: 3.2
        },
        1200: {
            items: 4.2
        }
    }
});
owl2.owlCarousel({
    nav: true,
    center: true,
    margin: 10,
    navText: ["<div class=\"owl--data-prev\"><i class=\"far fa-arrow-left\"></i></div>", "<div class=\"owl--data-next\"><i class=\"far fa-arrow-right\"></i></div>"],
    responsive: {
        0: {
            items: 1.2
        },
        600: {
            items: 2.2
        },
        960: {
            items: 3.2
        },
        1200: {
            items: 4.2
        }
    }
});
owl.on('mousewheel', function (e) {
    if (e.originalEvent.deltaY >= 0) {
        owl.trigger('next.owl');

    } else {
        owl.trigger('prev.owl');

    }

    e.preventDefault();
});
owl2.on('mousewheel', function (e) {
    if (e.originalEvent.deltaY >= 0) {
        owl2.trigger('next.owl');

    } else {
        owl2.trigger('prev.owl');

    }

    e.preventDefault();
});

function clipboard(field) {
    field.select();
    field.setSelectionRange(0, 99999);
    document.execCommand("copy");
}