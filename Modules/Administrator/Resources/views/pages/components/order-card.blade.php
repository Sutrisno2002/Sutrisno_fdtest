    <div class="card" style="cursor:pointer;" wire:click="showOrder('{{ $data->order_code }}')">
        <div class="card-header justify-content-between flex">
            <div class="">
                <img src="{{ $data->customer->getAvatar() ? $data->customer->getAvatar() : '' }}" alt=""
                     class="rounded-circle border border-secondary mr-2" style="height: 30px;width:30px">
                {{ $data->customer->name }}
            </div>
            <div class="">
                No. Pesanan {{ $data->order_code }}
            </div>
        </div>
        <div class="p-6">
            @foreach ($data->details as $detail)
                <div class="row">
                    <div class="col-md-1">
                        <img src="{{ $detail->getThumbnail($detail) }}" class="img-fluid">
                    </div>
                    <div class="col-md-3">
                        <span class="font-weight-bold">
                            {{ $detail->product_name }}
                        </span>
                    </div>
                    <div class="col-md-1">
                        x{{ $detail->qty }}
                    </div>
                    @if ($loop->first)
                        <div class="col-md-2">
                            {{ price($data->order_paid_nominal, true) }}
                            <p class="text-muted">({{ $data->payment_method_type }})</p>
                        </div>
                        <div class="col-md-2">
                            {!! $data->getPaymentStatus() !!} <span class="mx-1">|</span>{!! $data->getOrderStatus() !!}
                        </div>
                        <div class="col-md-3 text-center">
                            <a href="javascript:void(0)" class="show-order">
                                <i class='bx bx-file-find item-icon'></i> Lihat
                                Rincian
                            </a>
                            {{-- <span class="align-middle text-center">middle</span> --}}
                        </div>
                    @endif
                </div>
            @endforeach
        </div>
    </div>
