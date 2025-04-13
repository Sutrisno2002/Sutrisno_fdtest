/*
Template Name: Prompt - Tailwind CSS Multipurpose Landing Page Template
Version: 1.1.0
Author: coderthemes
Email: support@coderthemes.com
*/

import Snackbar from "node-snackbar";
import Errors from "./errors";

// Snackbar
window.Snackbar = Snackbar;

function init() {
    // Animation on Scroll (Plugin)
    AOS.init();

    window.switchSnackbar = (res) => {
        return switchSnackbar(res);
    };

    // Topnav Active Menu
    function initTopnav() {
        // Menu Active
        const pageUrl = window.location.href.split(/[?#]/)[0];
        const navbarLinks = Array.from(
            document.querySelectorAll("#navbar .navbar-nav a")
        );

        navbarLinks.forEach((link) => {
            if (link.href === pageUrl) {
                link.classList.add("active");

                const parentMenu =
                    link.parentElement.parentElement.parentElement;
                if (parentMenu?.classList.contains("nav-item")) {
                    const dropdownElement = parentMenu.querySelector(
                        '[data-fc-type="dropdown"]'
                    );
                    dropdownElement?.classList.add("active");
                }

                const parentParentMenu =
                    link.parentElement.parentElement.parentElement.parentElement
                        .parentElement;
                if (parentParentMenu?.classList.contains("nav-item")) {
                    const dropdownElement = parentParentMenu.querySelector(
                        '[data-fc-type="dropdown"]'
                    );
                    dropdownElement?.classList.add("active");
                }
            }
        });
    }

    // Mobile Menu Active
    function initMobileNav() {
        const pageUrl = window.location.href.split(/[?#]/)[0];
        const navbarLinks = Array.from(
            document.querySelectorAll("#mobileMenu .navbar-nav a")
        );

        navbarLinks.forEach((link) => {
            if (link.href === pageUrl) {
                link.classList.add("active");
                const parentMenu =
                    link.parentElement.parentElement.parentElement;
                const parentCollapse = link.parentElement.parentElement;
                if (parentMenu?.classList.contains("nav-item")) {
                    const collapseElement = parentMenu.querySelector(
                        '[data-fc-type="collapse"]'
                    );
                    collapseElement.classList.add("active");
                    if (collapseElement) {
                        const collapse =
                            frost.Collapse.getInstanceOrCreate(collapseElement);
                        collapse.show();
                        if (parentCollapse) {
                            parentCollapse.style.height = null;
                        }
                    }
                }
            }
        });
    }

    // Topbar Sticky
    function initStickyNav() {
        // Sticky Navbar
        function windowScroll() {
            const navbar = document.getElementById("navbar");
            if (navbar) {
                if (
                    document.body.scrollTop >= 75 ||
                    document.documentElement.scrollTop >= 75
                ) {
                    navbar.classList.add("nav-sticky");
                } else {
                    navbar.classList.remove("nav-sticky");
                }
            }
        }
        window.addEventListener("scroll", (ev) => {
            ev.preventDefault();
            windowScroll();
        });
    }

    // Back To Top
    function initBacktoTop() {
        const mybutton = document.querySelector('[data-toggle="back-to-top"]');

        window.addEventListener("scroll", function () {
            if (window.pageYOffset > 72) {
                mybutton.classList.add("flex");
                mybutton.classList.remove("hidden");
            } else {
                mybutton.classList.remove("flex");
                mybutton.classList.add("hidden");
            }
        });

        if (mybutton) {
            mybutton.addEventListener("click", function (e) {
                e.preventDefault();
                window.scrollTo({ top: 0, behavior: "smooth" });
            });
        }
    }

    // Swiper ( One card ) (Plugin)
    function initswiperOne() {
        new Swiper("#swiper_one", {
            slidesPerView: 1,
            spaceBetween: 30,
            loop: true,
            autoplay: {
                delay: 2500,
                disableOnInteraction: false,
            },
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            rewind: true,
            navigation: {
                nextEl: ".button-next",
                prevEl: ".button-prev",
            },
            breakpoints: {
                320: {
                    slidesPerView: 1,
                },
            },
        });
    }

    // Swiper ( Two card ) (Plugin)
    function initswiperTwo() {
        new Swiper("#swiper_two", {
            slidesPerView: 1,
            loop: true,
            autoHeight: true,
            spaceBetween: 30,
            navigation: {
                nextEl: ".button-next",
                prevEl: ".button-prev",
            },
            breakpoints: {
                576: {
                    slidesPerView: 1,
                },
                768: {
                    slidesPerView: 2,
                },
            },
        });
    }

    // Text Animation
    function initTypewrite() {
        var TxtType = function (el, toRotate, period) {
            this.toRotate = toRotate;
            this.el = el;
            this.loopNum = 0;
            this.period = parseInt(period, 10) || 2000;
            this.txt = "";
            this.tick();
            this.isDeleting = false;
        };

        TxtType.prototype.tick = function () {
            var i = this.loopNum % this.toRotate.length;
            var fullTxt = this.toRotate[i];
            if (this.isDeleting) {
                this.txt = fullTxt.substring(0, this.txt.length - 1);
            } else {
                this.txt = fullTxt.substring(0, this.txt.length + 1);
            }
            this.el.innerHTML = '<span class="wrap">' + this.txt + "</span>";
            var that = this;
            var delta = 200 - Math.random() * 100;
            if (this.isDeleting) {
                delta /= 2;
            }
            if (!this.isDeleting && this.txt === fullTxt) {
                delta = this.period;
                this.isDeleting = true;
            } else if (this.isDeleting && this.txt === "") {
                this.isDeleting = false;
                this.loopNum++;
                delta = 500;
            }
            setTimeout(function () {
                that.tick();
            }, delta);
        };

        var elements = document.getElementsByClassName("typewrite");
        for (var i = 0; i < elements.length; i++) {
            var toRotate = elements[i].getAttribute("data-type");
            var period = elements[i].getAttribute("data-period");
            if (toRotate) {
                new TxtType(elements[i], JSON.parse(toRotate), period);
            }
        }
    }

    function switchSnackbar(res) {
        let response = {};
        if (res.status == "success") {
            response = {
                status: "snackbar-success",
                icon: "bx bx-check",
                message: res.message,
            };
        } else if (res.status == "warning") {
            response = {
                status: "snackbar-warning",
                icon: "bx bx-x",
                message: res.message,
            };
        } else if (res.status == "error") {
            response = {
                status: "snackbar-error",
                icon: "bx bx-info-circle",
                message: res.message,
            };
        }

        return `<div class="inner ${response?.status}">
           <div class="icon-wrapper">
               <div class="icon-box">
                   <i class="${response?.icon}"></i>
               </div>
           </div>
           <div class="text">${response?.message}</div>
        </div>`;
    }

    initMobileNav();
    initTopnav();
    initStickyNav();
    initBacktoTop();
    initswiperOne();
    initswiperTwo();
    window.onload = initTypewrite();

    document.addEventListener("updated-avatar", function (e) {
        const url = e.detail[0].url;
        const el = document.querySelector("#navbar-avatar");
        el.src = url;
    });

    document.addEventListener("updated-cart", function (e) {
        const items_count = e.detail[0];
        const el = document.querySelector("#cart-counter");
        el.innerHTML = items_count;
    });

    document.addEventListener("flash-session", function (e) {
        Snackbar.show({
            text: switchSnackbar(e.detail[0]),
            pos: "top-center",
            showAction: true,
            duration: 5000,
        });
    });

    document.addEventListener("DOMContentLoaded", function () {
        Livewire.hook(
            "request",
            async ({ uri, options, payload, respond, succeed, fail }) => {
                respond(({ status, response }) => {
                    // Runs when the response is received...
                    // "response" is the raw HTTP response object
                    // before await response.text() is run...
                });

                succeed(({ status, json }) => {
                    // Runs when the response is received...
                    // "json" is the JSON response object...
                });

                fail(({ status, content, preventDefault }) => {
                    if (document.MODE == "production") {
                        preventDefault();
                        let errors = new Errors();
                        let message = errors.stwichErrorStatus(status);
                        let res = {
                            status: "error",
                            message: message,
                        };

                        Snackbar.show({
                            text: switchSnackbar(res),
                            pos: "top-center",
                            showAction: true,
                            duration: 5000,
                        });

                        if (status == 419) {
                            setTimeout(() => {
                                window.location.reload();
                            }, 5000);
                        }
                    }
                });
            }
        );
    });
}

init();
