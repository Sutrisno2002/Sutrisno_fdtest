<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Front Module - {{ config('app.name', 'Laravel') }}</title>

    <meta name="description" content="{{ $description ?? '' }}">
    <meta name="keywords" content="{{ $keywords ?? '' }}">
    <meta name="author" content="{{ $author ?? '' }}">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <link type="text/css" href="{{ asset('assets/front/css/style.css') }}" rel="stylesheet">
    <link type="text/css" href="{{ asset('assets/front/css/custom.css') }}" rel="stylesheet">
    {{-- Vite CSS --}}
    {{-- {{ module_vite('build-front', 'resources/assets/sass/app.scss') }} --}}
    <link type="text/css" href="{{ asset('assets/panel/css/app.css') }}" rel="stylesheet">
</head>

{{-- <body> --}}
{{-- @yield('content') --}}

{{-- Vite JS --}}
{{-- {{ module_vite('build-front', 'resources/assets/js/app.js') }} --}}
{{-- </body> --}}

<body x-data="{ page: 'home', 'darkMode': true, 'stickyMenu': false, 'navigationOpen': false, 'scrollTop': false }" x-init="darkMode = JSON.parse(localStorage.getItem('darkMode'));
$watch('darkMode', value => localStorage.setItem('darkMode', JSON.stringify(value)))" :class="{ 'b eh': darkMode === true }">

    @include('front::layouts.header')

    <main>
        <!-- ===== Hero Start ===== -->
        <section class="gj do ir hj sp jr i pg">
            <!-- Hero Images -->
            <div class="xc fn zd/2 2xl:ud-w-187.5 bd 2xl:ud-h-171.5 h q r">
                <img src="{{ asset('assets/front/images/shape-04.svg') }}" alt="shape" class="h q r" />
                <img src="{{ asset('assets/default/images/logo-gpj-outline.svg') }}" alt="GPJ" class="h q r ua"
                    style="width: 400px; right: 160px; top: 130px;" />
            </div>

            <!-- Hero Content -->
            <div class="bb ze ki xn 2xl:ud-px-0">
                <div class="tc _o">
                    <div class="animate_left jn/2">
                        <h1 class="fk vj zp or kk wm wb">Gibran Penerus Jokowi
                        </h1>
                        <p class="fq">
                            Gibran Penerus Jokowi (GPJ) adalah gerakan relawan yang mendukung Gibran Rakabuming Raka
                            untuk melanjutkan perjuangan Presiden ke-7, Joko Widodo, dengan semangat mewujudkan Indonesia Emas
                            melalui perubahan positif dan kemajuan berkelanjutan.
                        </p>
                        <span class="inline-block mt-2">#RelawanGibranRakabumingRaka</span>
                        <div class="tc tf yo zf mb">
                            <a href="#" class="ek jk lk gh gi hi rg ml il vc _d _l">Bergabung Relawan</a>

                            <span class="tc sf">
                                <span class="inline-block ek xj kk wm"> Temukan Kami di Sosial Media</span>
                                <span class="inline-block">@gibranpenerusjokowi</span>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- ===== Hero End ===== -->

        <!-- ===== About Start ===== -->
        <section class="ji gp uq 2xl:ud-py-35 pg">
            <div class="bb ze ki xn wq">
                <div class="tc wf gg qq">
                    <!-- About Images -->
                    <div class="animate_left xc gn gg jn/2 i">
                        <div>
                            <img src="{{ asset('assets/front/images/shape-05.svg') }}" alt="Shape"
                                class="h -ud-left-5 x" />
                            <img src="{{ asset('assets/default/images/about/about-1.jpg') }}" alt="About" class="ib" />
                            <img src="{{ asset('assets/default/images/about/about-2.jpg') }}" alt="About" />
                        </div>
                        <div>
                            <img src="{{ asset('assets/front/images/shape-06.svg') }}" alt="Shape" />
                            <img src="{{ asset('assets/default/images/about/about-3.jpg') }}" alt="About" class="ob gb" />
                            <img src="{{ asset('assets/front/images/shape-07.svg') }}" alt="Shape" class="bb" />
                        </div>
                    </div>

                    <!-- About Content -->
                    <div class="animate_right jn/2">
                        {{-- <h4 class="ek yj mk gb">Why Choose Us</h4> --}}
                        <h2 class="fk vj zp pr kk wm qb">Gibran Rakabuming Raka</h2>
                        <p class="uo">
                            Gibran Rakabuming Raka adalah sosok muda yang penuh inspirasi dan diharapkan dapat
                            meneruskan kepemimpinan Presiden ke-7, Joko Widodo pada periode 2024-2029 sebagai Wakil Presiden
                            Republik Indonesia. Gibran telah menunjukkan dedikasi dalam pelayanan publik dengan
                            pendekatan yang inovatif dan merakyat. Kepemimpinannya diharapkan dapat melanjutkan visi
                            Presiden ke-7, Joko Widodo dalam membawa Indonesia menuju kemajuan yang lebih baik, berkeadilan,
                            dan sejahtera bagi seluruh rakyat.
                        </p>

                        {{-- <a href="https://www.youtube.com/watch?v=xcJtL7QggTI" data-fslightbox class="vc wf hg mb">
                            <span class="tc wf xf be dd rg i gh ua">
                                <span class="nf h vc yc vd rg gh qk -ud-z-1"></span>
                                <img src="{{ asset('assets/front/images/icon-play.svg') }}" alt="Play" />
                            </span>
                            <span class="kk">SEE HOW WE WORK</span>
                        </a> --}}
                    </div>
                </div>

            </div>
        </section>
        <!-- ===== About End ===== -->

        {{-- <!-- ===== Projects Start ===== -->
        <section class="pg pj vp mr oj wp nr">
            <!-- Section Title Start -->
            <div x-data="{ sectionTitle: `We Offer Great Affordable Premium Prices.`, sectionTitleText: `It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using.` }">
                <div class="animate_top bb ze rj ki xn vq">
                    <h2 x-text="sectionTitle" class="fk vj pr kk wm on/5 gq/2 bb _b">
                    </h2>
                    <p class="bb on/5 wo/5 hq" x-text="sectionTitleText"></p>
                </div>


            </div>
            <!-- Section Title End -->

            <div class="bb ze ki xn 2xl:ud-px-0 jb" x-data="{ filterTab: 1 }">
                <!-- Porject Tab -->
                <div class="projects-tab _e bb tc uf wf xf cg rg hh rm vk xm si ti fc">
                    <button data-filter="*" @click="filterTab = 1" :class="{ 'gh lk': filterTab === 1 }"
                        class="project-tab-btn ek rg ml il vi mi">
                        All
                    </button>
                    <button data-filter=".branding" @click="filterTab = 2" :class="{ 'gh lk': filterTab === 2 }"
                        class="project-tab-btn ek rg ml il vi mi">
                        Branding Strategy
                    </button>
                    <button data-filter=".digital" @click="filterTab = 3" :class="{ 'gh lk': filterTab === 3 }"
                        class="project-tab-btn ek rg ml il vi mi">
                        Digital Experiences
                    </button>
                    <button data-filter=".ecommerce" @click="filterTab = 4" :class="{ 'gh lk': filterTab === 4 }"
                        class="project-tab-btn ek rg ml il vi mi">
                        Ecommerce
                    </button>
                </div>

                <!-- Projects item wrapper -->
                <div class="projects-wrapper tc -ud-mx-5">
                    <div class="project-sizer"></div>
                    <!-- Project Item -->
                    <div class="project-item wi fb vd jn/2 to/3 branding ecommerce">
                        <div class="c i pg sg z-1">
                            <img src="{{ asset('assets/front/images/project-01.png') }}" alt="Project" />

                            <div class="h s r df nl kl im tc sf wf xf vd yc sg al hh/20 z-10">
                                <h4 class="ek tj kk hc">Photo Retouching</h4>
                                <p>Branded Ecommerce</p>
                                <a class="c tc wf xf ie ld rg _g dh ml il ph jm km jc" href="#">
                                    <svg class="th lm ml il" width="14" height="14" viewBox="0 0 14 14"
                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M10.4763 6.16664L6.00634 1.69664L7.18467 0.518311L13.6663 6.99998L7.18467 13.4816L6.00634 12.3033L10.4763 7.83331H0.333008V6.16664H10.4763Z" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Project Item -->
                    <div class="project-item wi fb vd jn/2 to/3 digital">
                        <div class="c i pg sg z-1">
                            <img src="{{ asset('assets/front/images/project-02.png') }}" alt="Project" />

                            <div class="h s r df nl kl im tc sf wf xf vd yc sg al hh/20 z-10">
                                <h4 class="ek tj kk hc">Photo Retouching</h4>
                                <p>Branded Ecommerce</p>
                                <a class="c tc wf xf ie ld rg _g dh ml il ph jm km jc" href="#">
                                    <svg class="th lm ml il" width="14" height="14" viewBox="0 0 14 14"
                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M10.4763 6.16664L6.00634 1.69664L7.18467 0.518311L13.6663 6.99998L7.18467 13.4816L6.00634 12.3033L10.4763 7.83331H0.333008V6.16664H10.4763Z" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Project Item -->
                    <div class="project-item wi fb vd jn/2 to/3 branding ecommerce">
                        <div class="c i pg sg z-1">
                            <img src="{{ asset('assets/front/images/project-04.png') }}" alt="Project" />

                            <div class="h s r df nl kl im tc sf wf xf vd yc sg al hh/20 z-10">
                                <h4 class="ek tj kk hc">Photo Retouching</h4>
                                <p>Branded Ecommerce</p>
                                <a class="c tc wf xf ie ld rg _g dh ml il ph jm km jc" href="#">
                                    <svg class="th lm ml il" width="14" height="14" viewBox="0 0 14 14"
                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M10.4763 6.16664L6.00634 1.69664L7.18467 0.518311L13.6663 6.99998L7.18467 13.4816L6.00634 12.3033L10.4763 7.83331H0.333008V6.16664H10.4763Z" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Project Item -->
                    <div class="project-item wi fb vd vo/3 digital ecommerce">
                        <div class="c i pg sg z-1">
                            <img src="{{ asset('assets/front/images/project-03.png') }}" alt="Project" />

                            <div class="h s r df nl kl im tc sf wf xf vd yc sg al hh/20 z-10">
                                <h4 class="ek tj kk hc">Photo Retouching</h4>
                                <p>Branded Ecommerce</p>
                                <a class="c tc wf xf ie ld rg _g dh ml il ph jm km jc" href="#">
                                    <svg class="th lm ml il" width="14" height="14" viewBox="0 0 14 14"
                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M10.4763 6.16664L6.00634 1.69664L7.18467 0.518311L13.6663 6.99998L7.18467 13.4816L6.00634 12.3033L10.4763 7.83331H0.333008V6.16664H10.4763Z" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- ===== Projects End ===== --> --}}

        {{-- POSTS --}}
        <section class="i pg ji gp uq">
            <!-- Bg Shapes -->
            <span class="rc h s r vd fd/5 fh gh"></span>
            <img src="{{ asset('assets/front/images/shape-08.svg') }}" alt="Shape Bg" class="h q r">
            {{-- <img src="images/shape-09.svg" alt="Shape" class="of h y z/2">
            <img src="images/shape-10.svg" alt="Shape" class="h _ aa">
            <img src="images/shape-11.svg" alt="Shape" class="of h m ba"> --}}

            <!-- Section Title Start -->
            <div>
                <div class="animate_top bb ze rj ki xn vq" data-sr-id="5"
                    style="visibility: visible; opacity: 1; transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1); transition: all, opacity 2.8s cubic-bezier(0.5, 0, 0, 1), transform 2.8s cubic-bezier(0.5, 0, 0, 1);">
                    <h2 class="fk vj pr kk wm on/5 gq/2 bb _b lk">Informasi Terbaru</h2>
                    <p class="bb on/5 wo/5 hq lk">Jelajahi artikel terbaru kami untuk
                        mendapatkan update terkini seputar Gibran Rakabuming Raka dan Relawan GPJ (Gibran Penerus
                        Jokowi)</p>
                </div>

            </div>
            <!-- Section Title End -->

            <div class="bb ze i va ki xn xq jb jo">
                <div class="wc qf pn xo gg cp">

                    <!-- Blog Item -->
                    <div class="animate_top sg vk rm xm">
                        <div class="c rc i z-1 pg">
                            <img class="w-full" src="{{ asset('assets/front/images/blog-01.png') }}" alt="Blog" />

                            <div class="im h r s df vd yc wg tc wf xf al hh/20 nl il z-10">
                                <a href="./blog-single.html" class="vc ek rg lk gh sl ml il gi hi">Read More</a>
                            </div>
                        </div>

                        <div class="yh">
                            <div class="tc uf wf ag jq">
                                <div class="tc wf ag">
                                    <img src="{{ asset('assets/front/images/icon-man.svg') }}" alt="User" />
                                    <p>Musharof Chy</p>
                                </div>
                                <div class="tc wf ag">
                                    <img src="{{ asset('assets/front/images/icon-calender.svg') }}" alt="Calender" />
                                    <p>25 Dec, 2025</p>
                                </div>
                            </div>
                            <h4 class="ek tj ml il kk wm xl eq lb">
                                <a href="blog-single.html">Free advertising for your online business</a>
                            </h4>
                        </div>
                    </div>

                    <!-- Blog Item -->
                    <div class="animate_top sg vk rm xm">
                        <div class="c rc i z-1 pg">
                            <img class="w-full" src="{{ asset('assets/front/images/blog-02.png') }}"
                                alt="Blog" />

                            <div class="im h r s df vd yc wg tc wf xf al hh/20 nl il z-10">
                                <a href="./blog-single.html" class="vc ek rg lk gh sl ml il gi hi">Read More</a>
                            </div>
                        </div>

                        <div class="yh">
                            <div class="tc uf wf ag jq">
                                <div class="tc wf ag">
                                    <img src="{{ asset('assets/front/images/icon-man.svg') }}" alt="User" />
                                    <p>Musharof Chy</p>
                                </div>
                                <div class="tc wf ag">
                                    <img src="{{ asset('assets/front/images/icon-calender.svg') }}" alt="Calender" />
                                    <p>25 Dec, 2025</p>
                                </div>
                            </div>
                            <h4 class="ek tj ml il kk wm xl eq lb">
                                <a href="blog-single.html">9 simple ways to improve your design skills</a>
                            </h4>
                        </div>
                    </div>

                    <!-- Blog Item -->
                    <div class="animate_top sg vk rm xm">
                        <div class="c rc i z-1 pg">
                            <img class="w-full" src="{{ asset('assets/front/images/blog-03.png') }}"
                                alt="Blog" />

                            <div class="im h r s df vd yc wg tc wf xf al hh/20 nl il z-10">
                                <a href="./blog-single.html" class="vc ek rg lk gh sl ml il gi hi">Read More</a>
                            </div>
                        </div>

                        <div class="yh">
                            <div class="tc uf wf ag jq">
                                <div class="tc wf ag">
                                    <img src="{{ asset('assets/front/images/icon-man.svg') }}" alt="User" />
                                    <p>Musharof Chy</p>
                                </div>
                                <div class="tc wf ag">
                                    <img src="{{ asset('assets/front/images/icon-calender.svg') }}" alt="Calender" />
                                    <p>25 Dec, 2025</p>
                                </div>
                            </div>
                            <h4 class="ek tj ml il kk wm xl eq lb">
                                <a href="blog-single.html">Tips to quickly improve your coding speed.</a>
                            </h4>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- ===== Youtube Start ===== -->
        <section class="i pg qh rm hp">
            <!-- Section Title Start -->
            <div x-data="{ sectionTitle: `Official Youtube Account`, sectionTitleText: `Gibran Penerus Jokowi` }">
                <div class="animate_top bb ze rj ki xn vq">
                    <span class="tc wf xf be dd rg i gh ua bb">
                        <span class="nf h vc yc vd rg gh qk -ud-z-1"></span>
                        <img src="{{ asset('assets/front/images/icon-play.svg') }}" alt="Play">
                    </span>
                    <h2 x-text="sectionTitle" class="fk vj pr kk wm on/5 gq/2 bb _b mt-6">
                    </h2>
                    <p class="bb on/5 wo/5 hq" x-text="sectionTitleText"></p>
                    <div class="mt-6 flex justify-center items-center">
                        <iframe width="560" height="315"
                            src="https://www.youtube.com/embed/lIIppSwJmoM?si=mopqkPe6FzBoRhQ0"
                            title="YouTube video player" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                            referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
            <!-- Section Title End -->
        </section>
        <!-- ===== Youtube End ===== -->

        <!-- ===== Services Start ===== -->
        <section class="lj tp kr ji">
            <!-- Section Title Start -->
            <div class="animate_top bb ze rj ki xn vq">
                <h2 class="ek yj mk mb-2">Media Center</h2>
                <h2 class="fk vj pr kk wm on/5 gq/2 bb _b">Gibran Penerus Jokowi</h2>
                <p class="bb on/5 wo/5 hq">Akun Media Sosial Resmi Gibran Penerus Jokowi</p>
            </div>
            <!-- Section Title End -->

            <div class="bb ze ki xn yq mb en">
                <div class="wc qf pn xo ng">
                    <div class="animate_top sg oi pi zq ml il am cn _m">
                        <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" viewBox="0 0 24 24"
                            style="fill: rgb(230, 33, 41);transform: ;msFilter:;">
                            <path
                                d="M20.947 8.305a6.53 6.53 0 0 0-.419-2.216 4.61 4.61 0 0 0-2.633-2.633 6.606 6.606 0 0 0-2.186-.42c-.962-.043-1.267-.055-3.709-.055s-2.755 0-3.71.055a6.606 6.606 0 0 0-2.185.42 4.607 4.607 0 0 0-2.633 2.633 6.554 6.554 0 0 0-.419 2.185c-.043.963-.056 1.268-.056 3.71s0 2.754.056 3.71c.015.748.156 1.486.419 2.187a4.61 4.61 0 0 0 2.634 2.632 6.584 6.584 0 0 0 2.185.45c.963.043 1.268.056 3.71.056s2.755 0 3.71-.056a6.59 6.59 0 0 0 2.186-.419 4.615 4.615 0 0 0 2.633-2.633c.263-.7.404-1.438.419-2.187.043-.962.056-1.267.056-3.71-.002-2.442-.002-2.752-.058-3.709zm-8.953 8.297c-2.554 0-4.623-2.069-4.623-4.623s2.069-4.623 4.623-4.623a4.623 4.623 0 0 1 0 9.246zm4.807-8.339a1.077 1.077 0 0 1-1.078-1.078 1.077 1.077 0 1 1 2.155 0c0 .596-.482 1.078-1.077 1.078z">
                            </path>
                            <circle cx="11.994" cy="11.979" r="3.003"></circle>
                        </svg>
                        <h4 class="ek zj kk wm pb _b">Instagram</h4>
                        <span>@gibranpenerusjokowi</span>
                    </div>

                    <div class="animate_top sg oi pi zq ml il am cn _m">
                        <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="50" height="50"
                            viewBox="0 0 50 50" style="fill: rgb(230, 33, 41);transform: ;msFilter:;">
                            <path
                                d="M41,4H9C6.243,4,4,6.243,4,9v32c0,2.757,2.243,5,5,5h32c2.757,0,5-2.243,5-5V9C46,6.243,43.757,4,41,4z M37.006,22.323 c-0.227,0.021-0.457,0.035-0.69,0.035c-2.623,0-4.928-1.349-6.269-3.388c0,5.349,0,11.435,0,11.537c0,4.709-3.818,8.527-8.527,8.527 s-8.527-3.818-8.527-8.527s3.818-8.527,8.527-8.527c0.178,0,0.352,0.016,0.527,0.027v4.202c-0.175-0.021-0.347-0.053-0.527-0.053 c-2.404,0-4.352,1.948-4.352,4.352s1.948,4.352,4.352,4.352s4.527-1.894,4.527-4.298c0-0.095,0.042-19.594,0.042-19.594h4.016 c0.378,3.591,3.277,6.425,6.901,6.685V22.323z">
                            </path>
                        </svg>
                        <h4 class="ek zj kk wm pb _b">Tiktok</h4>
                        <p>@gibran.penerus.jokowi</p>
                    </div>

                    <div class="animate_top sg oi pi zq ml il am cn _m">
                        <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="50" height="50"
                            viewBox="0 0 50 50" style="fill: rgb(230, 33, 41);transform: ;msFilter:;">
                            <path
                                d="M 11 4 C 7.134 4 4 7.134 4 11 L 4 39 C 4 42.866 7.134 46 11 46 L 39 46 C 42.866 46 46 42.866 46 39 L 46 11 C 46 7.134 42.866 4 39 4 L 11 4 z M 13.085938 13 L 21.023438 13 L 26.660156 21.009766 L 33.5 13 L 36 13 L 27.789062 22.613281 L 37.914062 37 L 29.978516 37 L 23.4375 27.707031 L 15.5 37 L 13 37 L 22.308594 26.103516 L 13.085938 13 z M 16.914062 15 L 31.021484 35 L 34.085938 35 L 19.978516 15 L 16.914062 15 z">
                            </path>
                        </svg>
                        <h4 class="ek zj kk wm pb _b">X / Twitter</h4>
                        <p>@gpj_indonesia</p>
                    </div>

                    <div class="animate_top sg oi pi zq ml il am cn _m">
                        <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="50" height="50"
                            viewBox="0 0 50 50" style="fill: rgb(230, 33, 41);transform: ;msFilter:;">
                            <path
                                d="M41,4H9C6.24,4,4,6.24,4,9v32c0,2.76,2.24,5,5,5h32c2.76,0,5-2.24,5-5V9C46,6.24,43.76,4,41,4z M37,19h-2c-2.14,0-3,0.5-3,2 v3h5l-1,5h-4v15h-5V29h-4v-5h4v-3c0-4,2-7,6-7c2.9,0,4,1,4,1V19z">
                            </path>
                        </svg>
                        <h4 class="ek zj kk wm pb _b">Facebook</h4>
                        <p>Gibran Penerus Jokowi</p>
                    </div>

                    <div class="animate_top sg oi pi zq ml il am cn _m">
                        <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="60" height="60"
                            viewBox="0 0 50 50" style="fill: rgb(230, 33, 41);transform: ;msFilter:;">
                            <path
                                d="M 44.898438 14.5 C 44.5 12.300781 42.601563 10.699219 40.398438 10.199219 C 37.101563 9.5 31 9 24.398438 9 C 17.800781 9 11.601563 9.5 8.300781 10.199219 C 6.101563 10.699219 4.199219 12.199219 3.800781 14.5 C 3.398438 17 3 20.5 3 25 C 3 29.5 3.398438 33 3.898438 35.5 C 4.300781 37.699219 6.199219 39.300781 8.398438 39.800781 C 11.898438 40.5 17.898438 41 24.5 41 C 31.101563 41 37.101563 40.5 40.601563 39.800781 C 42.800781 39.300781 44.699219 37.800781 45.101563 35.5 C 45.5 33 46 29.398438 46.101563 25 C 45.898438 20.5 45.398438 17 44.898438 14.5 Z M 19 32 L 19 18 L 31.199219 25 Z">
                            </path>
                        </svg>
                        <h4 class="ek zj kk wm pb _b">Youtube</h4>
                        <p>Gibran Penerus Jokowi</p>
                    </div>

                    <!-- Service Item -->
                    <div class="animate_top sg oi pi zq ml il am cn _m">
                        <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" viewBox="0 0 24 24"
                            style="fill: rgb(230, 33, 41);transform: ;msFilter:;">
                            <path
                                d="M20 4H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2zm0 4.7-8 5.334L4 8.7V6.297l8 5.333 8-5.333V8.7z">
                            </path>
                        </svg>
                        <h4 class="ek zj kk wm pb _b">Email</h4>
                        <p>hallo@gibranpenerusjokowi.com</p>
                    </div>
                </div>
            </div>
        </section>
        <!-- ===== Services End ===== -->

        <!-- ===== Contact Start ===== -->
        {{-- <section id="support" class="i pg fh rm ji gp uq">
            <!-- Bg Shapes -->
            <img src="{{ asset('assets/front/images/shape-06.svg') }}" alt="Shape" class="h aa y" />
            <img src="{{ asset('assets/front/images/shape-03.svg') }}" alt="Shape" class="h ca u" />
            <img src="{{ asset('assets/front/images/shape-07.svg') }}" alt="Shape" class="h w da ee" />
            <img src="{{ asset('assets/front/images/shape-12.svg') }}" alt="Shape" class="h p s" />
            <img src="{{ asset('assets/front/images/shape-13.svg') }}" alt="Shape" class="h r q" />

            <!-- Section Title Start -->
            <div x-data="{ sectionTitle: `Let’s Stay Connected`, sectionTitleText: `It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using.` }">
                <div class="animate_top bb ze rj ki xn vq">
                    <h2 x-text="sectionTitle" class="fk vj pr kk wm on/5 gq/2 bb _b">
                    </h2>
                    <p class="bb on/5 wo/5 hq" x-text="sectionTitleText"></p>
                </div>


            </div>
            <!-- Section Title End -->

            <div class="i va bb ye ki xn wq jb mo">
                <div class="tc uf sn tf rn un zf xl:gap-10">
                    <div class="animate_top w-full mn/5 to/3 vk sg hh sm yh rq i pg">
                        <!-- Bg Shapes -->
                        <img src="{{ asset('assets/front/images/shape-03.svg') }}" alt="Shape"
                            class="h la x wd" />
                        <img src="{{ asset('assets/front/images/shape-06.svg') }}" alt="Shape"
                            class="h la ma ne kf" />

                        <div class="fb">
                            <h4 class="wj kk wm cc">Email Address</h4>
                            <p><a href="#">support@startup.com</a></p>
                        </div>
                        <div class="fb">
                            <h4 class="wj kk wm cc">Office Location</h4>
                            <p>76/A, Green valle, Califonia USA.</p>
                        </div>
                        <div class="fb">
                            <h4 class="wj kk wm cc">Phone Number</h4>
                            <p><a href="#">+009 8754 3433 223</a></p>
                        </div>
                        <div class="fb">
                            <h4 class="wj kk wm cc">Skype Email</h4>
                            <p><a href="#">example@yourmail.com</a></p>
                        </div>

                        <span class="rc nd rh tm lc fb"></span>

                        <div>
                            <h4 class="wj kk wm qb">Social Media</h4>
                            <ul class="tc wf fg">
                                <li>
                                    <a href="#" class="c tc wf xf ie ld rg ml il tl">
                                        <svg class="th lm ml il" width="11" height="20" viewBox="0 0 11 20"
                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M6.83366 11.3752H9.12533L10.042 7.7085H6.83366V5.87516C6.83366 4.931 6.83366 4.04183 8.667 4.04183H10.042V0.96183C9.74316 0.922413 8.61475 0.833496 7.42308 0.833496C4.93433 0.833496 3.16699 2.35241 3.16699 5.14183V7.7085H0.416992V11.3752H3.16699V19.1668H6.83366V11.3752Z"
                                                fill="" />
                                        </svg>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="c tc wf xf ie ld rg ml il tl">
                                        <svg class="th lm ml il" width="20" height="16" viewBox="0 0 20 16"
                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M19.3153 2.18484C18.6155 2.4944 17.8733 2.6977 17.1134 2.78801C17.9144 2.30899 18.5138 1.55511 18.8001 0.666844C18.0484 1.11418 17.2244 1.42768 16.3654 1.59726C15.7885 0.979958 15.0238 0.57056 14.1901 0.432713C13.3565 0.294866 12.5007 0.436294 11.7558 0.835009C11.0108 1.23372 10.4185 1.86739 10.0708 2.63749C9.72313 3.40759 9.63963 4.27098 9.83327 5.09343C8.30896 5.01703 6.81775 4.62091 5.45645 3.93079C4.09516 3.24067 2.89423 2.27197 1.93161 1.08759C1.59088 1.67284 1.41182 2.33814 1.41278 3.01534C1.41278 4.34451 2.08928 5.51876 3.11778 6.20626C2.50912 6.1871 1.91386 6.02273 1.38161 5.72685V5.77451C1.38179 6.65974 1.68811 7.51766 2.24864 8.20282C2.80916 8.88797 3.58938 9.3582 4.45703 9.53376C3.89201 9.68688 3.29956 9.70945 2.72453 9.59976C2.96915 10.3617 3.44595 11.0281 4.08815 11.5056C4.73035 11.9831 5.50581 12.2478 6.30594 12.2627C5.51072 12.8872 4.60019 13.3489 3.62642 13.6213C2.65264 13.8938 1.63473 13.9716 0.630859 13.8503C2.38325 14.9773 4.4232 15.5756 6.50669 15.5737C13.5586 15.5737 17.415 9.73176 17.415 4.66535C17.415 4.50035 17.4104 4.33351 17.4031 4.17035C18.1537 3.62783 18.8016 2.95578 19.3162 2.18576L19.3153 2.18484Z"
                                                fill="" />
                                        </svg>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="c tc wf xf ie ld rg ml il tl">
                                        <svg class="th lm ml il" width="19" height="18" viewBox="0 0 19 18"
                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M4.36198 2.58327C4.36174 3.0695 4.16835 3.53572 3.82436 3.87937C3.48037 4.22301 3.01396 4.41593 2.52773 4.41569C2.0415 4.41545 1.57528 4.22206 1.23164 3.87807C0.887991 3.53408 0.69507 3.06767 0.695313 2.58144C0.695556 2.09521 0.888943 1.62899 1.23293 1.28535C1.57692 0.941701 2.04333 0.748781 2.52956 0.749024C3.01579 0.749267 3.48201 0.942654 3.82566 1.28664C4.1693 1.63063 4.36222 2.09704 4.36198 2.58327ZM4.41698 5.77327H0.750313V17.2499H4.41698V5.77327ZM10.2103 5.77327H6.56198V17.2499H10.1736V11.2274C10.1736 7.87244 14.5461 7.56077 14.5461 11.2274V17.2499H18.167V9.98077C18.167 4.32494 11.6953 4.53577 10.1736 7.31327L10.2103 5.77327Z"
                                                fill="" />
                                        </svg>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="c tc wf xf ie ld rg ml il tl">
                                        <svg class="th lm ml il" width="22" height="14" viewBox="0 0 22 14"
                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M6.82308 0.904297C7.40883 0.904297 7.95058 0.95013 8.44558 1.0858C8.89476 1.16834 9.32351 1.33772 9.70783 1.58446C10.069 1.81088 10.3394 2.12896 10.5191 2.53688C10.6997 2.9448 10.7895 3.44438 10.7895 3.98796C10.7895 4.62321 10.6547 5.1668 10.3394 5.57471C10.069 5.98355 9.61799 6.34563 9.07716 6.61788C9.84349 6.84521 10.4292 7.25313 10.7895 7.79672C11.1507 8.34122 11.3762 9.02138 11.3762 9.7923C11.3762 10.4275 11.2405 10.9711 11.015 11.4249C10.7895 11.8786 10.4292 12.2865 10.0232 12.5588C9.58205 12.8506 9.09443 13.0651 8.58124 13.1931C8.04041 13.3297 7.49958 13.4205 6.95874 13.4205H0.916992V0.904297H6.82308ZM6.46191 5.98263C6.95783 5.98263 7.36391 5.84696 7.67924 5.62055C7.99458 5.39413 8.13024 4.9853 8.13024 4.48663C8.13024 4.21438 8.08441 3.94213 7.99458 3.76155C7.90474 3.58005 7.76908 3.44346 7.58941 3.3078C7.40883 3.21705 7.22824 3.1263 7.00274 3.08138C6.77724 3.03555 6.55266 3.03555 6.28133 3.03555H3.66699V5.98355H6.46283L6.46191 5.98263ZM6.59758 11.3341C6.86799 11.3341 7.13841 11.2883 7.36391 11.2434C7.59159 11.2001 7.80692 11.1071 7.99458 10.9711C8.17826 10.8384 8.33193 10.6685 8.44558 10.4725C8.53541 10.246 8.62616 9.9738 8.62616 9.65663C8.62616 9.02138 8.44558 8.56763 8.08533 8.25046C7.72416 7.97822 7.22824 7.84255 6.64249 7.84255H3.66699V11.335H6.59758V11.3341ZM15.2986 11.2883C15.6588 11.6513 16.1997 11.8328 16.9211 11.8328C17.417 11.8328 17.868 11.6971 18.2282 11.4707C18.5894 11.1985 18.8149 10.9262 18.9047 10.654H21.1139C20.7527 11.742 20.2119 12.513 19.4914 13.0116C18.7691 13.4654 17.9129 13.7376 16.8762 13.7376C16.2128 13.7396 15.5551 13.6165 14.9374 13.3746C14.3816 13.1661 13.886 12.8235 13.4946 12.3773C13.0759 11.9598 12.7665 11.4457 12.5935 10.8804C12.368 10.291 12.2772 9.65663 12.2772 8.93063C12.2772 8.25047 12.368 7.61613 12.5935 7.0258C12.8103 6.45755 13.1311 5.93468 13.5395 5.48396C13.9456 5.07605 14.4415 4.71396 14.9823 4.48663C15.5843 4.24469 16.2274 4.12143 16.8762 4.12363C17.6425 4.12363 18.319 4.26021 18.9047 4.57738C19.4914 4.89455 19.9415 5.25755 20.3027 5.80205C20.6711 6.32503 20.9456 6.90819 21.1139 7.52538C21.2037 8.15972 21.2487 8.79497 21.2037 9.52005H14.667C14.667 10.246 14.9374 10.9262 15.2986 11.2892V11.2883ZM18.1384 6.52713C17.8231 6.20996 17.3272 6.02846 16.7405 6.02846C16.3353 6.02846 16.0191 6.11922 15.7487 6.25488C15.4782 6.39147 15.2986 6.57297 15.118 6.75447C14.952 6.92978 14.8422 7.15067 14.8027 7.3888C14.7568 7.61613 14.7119 7.79672 14.7119 7.97822H18.7691C18.6792 7.29805 18.4537 6.84522 18.1384 6.52713ZM14.1711 1.76596H19.2201V2.99063H14.172V1.76596H14.1711Z"
                                                fill="" />
                                        </svg>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="animate_top w-full nn/5 vo/3 vk sg hh sm yh tq">
                        <form action="https://formbold.com/s/unique_form_id" method="POST">
                            <div class="tc sf yo ap zf ep qb">
                                <div class="vd to/2">
                                    <label class="rc ac" for="fullname">Full name</label>
                                    <input type="text" name="fullname" id="fullname" placeholder="Devid Wonder"
                                        class="vd ph sg zk xm _g ch pm hm dm dn em pl/50 xi mi" />
                                </div>

                                <div class="vd to/2">
                                    <label class="rc ac" for="email">Email address</label>
                                    <input type="email" name="email" id="email"
                                        placeholder="example@gmail.com"
                                        class="vd ph sg zk xm _g ch pm hm dm dn em pl/50 xi mi" />
                                </div>
                            </div>

                            <div class="tc sf yo ap zf ep qb">
                                <div class="vd to/2">
                                    <label class="rc ac" for="phone">Phone number</label>
                                    <input type="text" name="phone" id="phone" placeholder="+009 3342 3432"
                                        class="vd ph sg zk xm _g ch pm hm dm dn em pl/50 xi mi" />
                                </div>

                                <div class="vd to/2">
                                    <label class="rc ac" for="subject">Subject</label>
                                    <input type="text" for="subject" id="subject"
                                        placeholder="Type your subject"
                                        class="vd ph sg zk xm _g ch pm hm dm dn em pl/50 xi mi" />
                                </div>
                            </div>

                            <div class="fb">
                                <label class="rc ac" for="message">Message</label>
                                <textarea placeholder="Message" rows="4" name="message" id="message"
                                    class="vd ph sg zk xm _g ch pm hm dm dn em pl/50 ci"></textarea>
                            </div>

                            <div class="tc xf">
                                <button class="vc rg lk gh ml il hi gi _l">Send Message</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section> --}}
        <!-- ===== Contact End ===== -->

        <!-- ===== CTA Start ===== -->
        <section class="i pg gh ji">
            <!-- Bg Shape -->
            <img class="h p q" src="{{ asset('assets/front/images/shape-16.svg') }}" alt="Bg Shape" />

            <div class="bb ye i z-10 ki xn dr">
                <div class="tc uf sn tn un gg">
                    <div class="animate_left to/2">
                        <h2 class="fk vj zp pr lk ac">
                            Bergabung Relawan GPJ
                        </h2>
                        <p class="lk">
                            Ayo Bergabung dengan Relawan Gibran Penerus Jokowi! Daftar Sekarang untuk Bergabung dengan
                            Relawan GPJ!
                        </p>
                    </div>
                    <div class="animate_right bf">
                        <a href="#" class="vc ek kk hh rg ol il cm gi hi">
                            Daftar Sekarang
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <!-- ===== CTA End ===== -->
    </main>

    @include('front::layouts.footer')

    <!-- ====== Back To Top Start ===== -->
    <button class="xc wf xf ie ld vg sr gh tr g sa ta _a" @click="window.scrollTo({top: 0, behavior: 'smooth'})"
        @scroll.window="scrollTop = (window.pageYOffset > 50) ? true : false" :class="{ 'uc': scrollTop }">
        <svg class="uh se qd" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
            <path
                d="M233.4 105.4c12.5-12.5 32.8-12.5 45.3 0l192 192c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L256 173.3 86.6 342.6c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3l192-192z" />
        </svg>
    </button>

    <!-- ====== Back To Top End ===== -->

    <script>
        //  Pricing Table
        const setup = () => {
            return {
                isNavOpen: false,

                billPlan: 'monthly',

                plans: [{
                        name: 'Starter',
                        price: {
                            monthly: 29,
                            annually: 29 * 12 - 199,
                        },
                        features: ['400 GB Storaget', 'Unlimited Photos & Videos', 'Exclusive Support'],
                    },
                    {
                        name: 'Growth Plan',
                        price: {
                            monthly: 59,
                            annually: 59 * 12 - 100,
                        },
                        features: ['400 GB Storaget', 'Unlimited Photos & Videos', 'Exclusive Support'],
                    },
                    {
                        name: 'Business',
                        price: {
                            monthly: 139,
                            annually: 139 * 12 - 100,
                        },
                        features: ['400 GB Storaget', 'Unlimited Photos & Videos', 'Exclusive Support'],
                    },
                ],
            };
        };
    </script>
    <script defer src="{{ asset('assets/front/js/bundle.js') }}"></script>
</body>
