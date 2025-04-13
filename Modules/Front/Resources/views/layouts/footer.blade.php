<footer class="bg-light text-dark mt-5">
    <div class="container py-4">
        <div class="row">
            <div class="col-md-4">
                <h5 class="font-weight-bold">Kontak</h5>
                <p>Buku kuu</p>
                <p>Telepon: {{ cache('social_phone') ?? '(+62) 812-3456-7890' }}</p>
                <p>Email: <a
                        href="mailto:{{ cache('social_email') ?? 'contact@buku.com' }}">{{ cache('social_email') ?? 'contact@buku.com' }}</a>
                </p>
            </div>
            <div class="col-md-4">
                <h5 class="font-weight-bold">Tautan</h5>
                <ul class="list-unstyled">
                    <li><a href="#">Beranda</a></li>
                    <li><a href="#">Tentang Kami</a></li>
                    <li><a href="#">Berita</a></li>
                </ul>
            </div>
            <div class="col-md-4">
                <h5 class="font-weight-bold">Bantuan</h5>
                <ul class="list-unstyled">
                    <li><a href="#">FAQ</a></li>
                    <li><a href="#">Hubungi Kami</a></li>
                </ul>
            </div>
        </div>
        <hr class="my-4">
        <div class="text-center">
            <p class="mb-0">{{ 'Copyright © Bukuku ' . date('Y') }}</p>
            <a href="#">Kebijakan Privasi</a> |
            <a href="#">Syarat & Ketentuan</a>
        </div>
    </div>
</footer>
