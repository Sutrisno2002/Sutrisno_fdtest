<div class="coupon" x-data="{
    open: false,
    showTooltip: function() {
        this.open = !this.open
        setTimeout(() => {
            this.open = !this.open
        }, 1000);
    }
}">

    <div class="flex items-center justify-center space-x-2 mb-4">
        <span class="border-dashed border text-white px-4 py-2 rounded-l">{{ $coupon->code }}</span>
        <div class="relative">
            <button type="button" x-on:click="$clipboard('{{ $coupon->code }}'); showTooltip()"
                    class="border border-white bg-white text-purple-600 px-4 py-3 rounded-r cursor-pointer text-sm inline-flex items-center">
                <i class="bx bx-copy text-lg mr-1"></i> Salin
            </button>
            <div class="custom-tooltip" x-show="open" style="display: none">
                Copied
            </div>
        </div>
    </div>

    <div class="flex justify-center gap-1 flex-wrap mb-4">
        <div class="text-xs bg-white/25 text-white rounded px-2 py-1 inline-flex items-center">
            <i class="bx bxs-offer text-lg mr-1"></i>{{ $coupon->getCouponValue() }}
        </div>
        @if ($coupon->max_discount)
            <div class="text-xs bg-white/25 text-white rounded px-2 py-1 inline-flex items-center">
                Maks. {{ $coupon->getMaxDiscount() }}
            </div>
        @endif
        <div class="text-xs bg-white/25 text-white rounded px-2 py-1 inline-flex items-center">
            <i class="bx bxs-coupon text-lg mr-1"></i>{{ $coupon->getQuota() }}
        </div>
    </div>

    <p class="text-sm text-white/75">Berlaku Hingga: {{ dateTimeTranslated($coupon->expiry_date, 'd M Y') }}</p>

    @if (isset($withShowButton))
        <button type="button"
                class="text-white italic underline rounded cursor-pointer text-sm inline-flex items-center"
                wire:click="showCoupon('{{ $coupon->id }}')" x-on:click="showCouponModal = !showCouponModal">
            Detail kupon
        </button>
    @endif
</div>
