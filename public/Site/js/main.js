
jQuery(function (t) {
    "use strict";

        t(document).ready(function () {
            var e,
                i,
                o,
                a,
                n,
                l,
                s = 7;
            function r() {
                (l = 0), (a = !1), (n = setInterval(c, 10));
            }
            function c() {
                !1 === a && ((l += 1 / s), i.css({ width: l + "%" }), l >= 100 && o.trigger("owl.next"));
            }
            t("#main-slider")
                .find(".owl-carousel")
                .owlCarousel({
                    slideSpeed: 500,
                    paginationSpeed: 500,
                    singleItem: !0,
                    navigation: !0,
                    navigationText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
                    afterInit: function (a) {
                        (o = a), (e = t("<div>", { id: "progressBar" })), (i = t("<div>", { id: "bar" })), e.append(i).appendTo(o), r();
                    },
                    afterMove: function () {
                        clearTimeout(n), r();
                    },
                    startDragging: function () {
                        a = !0;
                    },
                });
        }),
        new WOW().init(),
        smoothScroll.init(),
        t(window).load(function () {
            var e = t(".portfolio-filter >li>a"),
                i = t(".portfolio-items");
            i.isotope({ itemSelector: ".portfolio-item", layoutMode: "fitRows" }),
                e.on("click", function () {
                    e.removeClass("active"), t(this).addClass("active");
                    var o = t(this).attr("data-filter");
                    return i.isotope({ filter: o }), !1;
                });
        }),
        t(document).ready(function () {
            t(".progress-bar").bind("inview", function (e, i, o, a) {
                i && (t(this).css("width", t(this).data("width") + "%"), t(this).unbind("inview"));
            }),
                (t.fn.animateNumbers = function (e, i, o, a) {
                    return this.each(function () {
                        var n = t(this),
                            l = parseInt(n.text().replace(/,/g, ""));
                        (i = void 0 === i || i),
                            t({ value: l }).animate(
                                { value: e },
                                {
                                    duration: null == o ? 1e3 : o,
                                    easing: null == a ? "swing" : a,
                                    step: function () {
                                        n.text(Math.floor(this.value)), i && n.text(n.text().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,"));
                                    },
                                    complete: function () {
                                        parseInt(n.text()) !== e && (n.text(e), i && n.text(n.text().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,")));
                                    },
                                }
                            );
                    });
                }),
                t(".animated-number").bind("inview", function (e, i, o, a) {
                    var n = t(this);
                    i && (n.animateNumbers(n.data("digit"), !1, n.data("duration")), n.unbind("inview"));
                });
        }),
        t("a[rel^='prettyPhoto']").prettyPhoto({ social_tools: !1 });
    var e = t("#google-map").data("latitude"),
        i = t("#google-map").data("longitude");
    google.maps.event.addDomListener(window, "load", function () {
        var t = new google.maps.LatLng(e, i),
            o = { zoom: 14, scrollwheel: !1, center: t },
            a = new google.maps.Map(document.getElementById("google-map"), o);
        new google.maps.Marker({ position: t, map: a });
    });
});

/* SPLIDE JS */

document.addEventListener('DOMContentLoaded', function () {
    new Splide('.splide', {
        type   : 'loop',
        drag   : 'free',
        focus  : 'center',
        pagination: false,
        arrows: false,
        perPage: 4,
        autoScroll: {
            speed: 1.5,
        },
    }).mount( window.splide.Extensions );
});

/* ESCONDER O HEADER */

let lastScrollTop = 0
navbar = document.getElementById("main-menu")

window.addEventListener("scroll",() => {
    let scrollTop = window.pageYOffset || document.documentElement.scrollTop;
    if (scrollTop > lastScrollTop) {
        navbar.style.top= "-120px"
    }else {
        navbar.style.top= "0px"
        navbar.style.transition= "0.3s"
    }
    lastScrollTop = scrollTop;
});


$(function() {

    $("#signup").click(function() {

        var largura = window.innerWidth;

        $(".message").css("transform", "translateX(100%)");
        if ($(".message").hasClass("login") && largura > 920) {
            $(".message").removeClass("login");
        }else if(largura < 920){
            $(".message").css("transform", "translateY(100%)");
        }
        $(".message").addClass("signup");

    });

    $("#login").click(function() {
        $(".message").css("transform", "translateX(0)");
        if ($(".message").hasClass("login")) {
            $(".message").removeClass("signup");
        }
        $(".message").addClass("login");
    });

});


/* FUNÇÃO PARA WORK-WITH-US */

$(function() {
    $("#work-contact-form")
})
