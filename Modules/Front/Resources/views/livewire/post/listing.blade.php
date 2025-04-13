<section class="container mt-5">
    <div class="text-center mb-4">
        <h2 class="text-primary font-weight-bold mb-3">Buku yang Diunggah Pengguna</h2>
        <p class="text-secondary">Filter Buku Berdasarkan Kriteria</p>
    </div>
    <div class="mb-4">
        <div class="row">
            <div class="col-md-4 mb-3">
                <input type="text" wire:model.lazy="search" class="form-control border border-primary"
                    placeholder="Input nama penulis...">
            </div>
            <div class="col-md-4 mb-3">
                <select wire:model.lazy="selectedDate" class="form-control border border-primary">
                    <option value="">Filter berdasarkan Tanggal Diunggah</option>
                    <option value="today">Hari Ini</option>
                    <option value="this_week">Minggu Ini</option>
                    <option value="this_month">Bulan Ini</option>
                    <option value="three_months">3 Bulan Terakhir</option>
                    <option value="six_months">6 Bulan Terakhir</option>


                </select>
            </div>
            <div class="col-md-4 mb-3">
                <select wire:model.lazy="selectedRating" class="form-control border border-primary">
                    <option value="">Filter berdasarkan Rating</option>
                    <option value="5">5 Stars</option>
                    <option value="4">4 Stars</option>
                    <option value="3">3 Stars</option>
                    <option value="2">2 Stars</option>
                    <option value="1">1 Stars</option>


                </select>
            </div>
        </div>
    </div>
    <div class="row">
        @foreach ($datas as $book)
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card h-100 shadow-sm border-primary">
                    <img class="card-img-top" src="{{ $book->getThumbnail() }}" alt="Thumbnail">
                    <div class="card-body">
                        <h5 class="card-title text-dark">{{ $book->title }}</h5>
                        <p class="card-text text-muted">{{ optional($book->author)->name }}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="mt-4">
        {{ $datas->links() }} <!-- Pagination -->
    </div>
</section>
