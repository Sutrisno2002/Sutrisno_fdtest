<div class="flex items-center justify-center" x-data="{
    dropdownId: '{{ randAlpha() }}',
    show: false,
    changed: false,
    notFound: false,
    placeholder: '{{ isset($placeholder) ? $placeholder : 'Pilih opsi' }}',
    reset: () => {
        const data = this.Alpine.$data($el);
        data.changed = false;
        data.notFound = false;
        data.placeholder = '{{ isset($placeholder) ? $placeholder : 'Pilih opsi' }}';
    },
    searchItem: (el, dropdownId) => {
        const searchTerm = el.value.toLowerCase();
        const items = document.querySelectorAll(`#${dropdownId} li:not(:last-child)`);
        const data = this.Alpine.$data($el);
        let notFound = 0;

        items.forEach((item) => {
            const text = item.textContent.toLowerCase();
            item.classList.remove('block', 'hidden');
            if (text.includes(searchTerm)) {
                item.classList.add('block');
            } else {
                item.classList.add('hidden');
            }
        });


        const hidden = document.querySelectorAll(`#${dropdownId} li:not(:last-child).hidden`);
        if (hidden.length == items.length) {
            data.notFound = true
        } else {
            data.notFound = false
        }
    }
}">
    <div class="w-full relative">
        <div class="input-group append">
            <div class="form-input flex justify-between align-center" x-on:click="show = !show"
                 x-bind:class="changed ? '' : '!border-e !rounded-e'">
                <span class="mr-2 text-slate-500" x-text="placeholder"></span>
                <span>
                    <i class="bx bx-chevron-down transition-all origin-center text-lg !leading-[unset]"
                       x-bind:class="show ? 'rotate-180' : ''"></i>
                </span>
            </div>
            <div class="text" x-show="changed" style="display: none">
                <a href="javascript:void(0)" x-show="changed" x-on:click="reset()"
                   wire:click="$set('{{ $property }}', '')">
                    <i class="bx bx-x transition-all origin-center text-lg !leading-[unset]"></i>
                </a>
            </div>
        </div>
        <div id="dropdown-menu"
             class="absolute left-0 right-14 max-w-[400px] mt-2 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 p-2 space-y-2 overflow-hidden"
             x-show="show" style="display: none">
            <input class="form-input" type="text" placeholder="Search..." autocomplete="off"
                   x-on:keyup="searchItem($el, dropdownId)">
            <ul x-bind:id="dropdownId">
                @foreach ($items as $item)
                    <li class="px-4 py-2 text-sm font-normal overflow-hidden overflow-ellipsis">
                        <a href="javascript:void(0)" wire:click="$set('{{ $property }}', '{{ $item->value }}')"
                           data-value="{{ $item->value }}"
                           x-on:click="show = !show; placeholder = '{{ $item['label'] }}'; changed = true"
                           class="text-gray-700 hover:bg-gray-100 active:bg-blue-100 cursor-pointer rounded-md whitespace-nowrap hover:whitespace-normal transition-all">
                            {{ $item['label'] }}
                        </a>
                    </li>
                @endforeach
                <li class="text-sm font-normal text-center px-4 py-2" x-show="notFound" style="display: none">
                    No results found.
                </li>
            </ul>
        </div>
    </div>
</div>
