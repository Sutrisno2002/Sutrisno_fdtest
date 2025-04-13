<!-- ===== CTA Start ===== -->
<section class="i pg gh ji">
    <!-- Bg Shape -->
    <img class="h p q" src="{{ asset('assets/front/images/shape-16.svg') }}" alt="Bg Shape" />

    <div class="bb ye i z-10 ki xn dr">
        <div class="tc uf sn tn un gg">
            <div class="animate_left to/2">
                <h2 class="fk vj zp pr lk ac">
                    {{ cache('cta_registration_title') ?? 'Bergabung Relawan GPJ' }}
                </h2>
                <p class="lk">
                    {{ cache('cta_registration_description') ?? 'Ayo Bergabung dengan Relawan Gibran Penerus Jokowi! Daftar Sekarang untuk Bergabung dengan
                    Relawan GPJ!' }}
                </p>
            </div>
            <div class="animate_right bf">
                <a href="{{ route('front.member') }}" class="vc ek kk hh rg ol il cm gi hi">
                    Daftar Sekarang
                </a>
            </div>
        </div>
    </div>
</section>
<!-- ===== CTA End ===== -->
