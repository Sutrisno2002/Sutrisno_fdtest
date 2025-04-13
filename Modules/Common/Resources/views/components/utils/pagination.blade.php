<div class="flex flex-col md:flex-row" x-data="{
    perPage: {{ $paginator->perPage() }}
}">
    <div class="w-full md:w-6/12 mb-3 self-center">
        <div class="flex items-center justify-center md:justify-start">
            @isset($customTable)
                <select class="w-[60px] text-[.675rem] rounded me-2" style="padding: 0 .5rem"
                        x-on:change="$dispatch('changePerPage', {perPage: perPage})" x-model="perPage">
                    @foreach ($customTable->listPerPage as $perpage)
                        <option value="{{ $perpage }}">{{ $perpage }}</option>
                    @endforeach
                </select>
            @endisset
            @if (count($paginator) >= 1)
                <small class="m-0">Showing {{ $paginator->firstItem() . '-' . $paginator->lastItem() }} of
                    {{ $paginator->total() }}</small>
            @endif
        </div>
    </div>
    <div class="w-full md:w-6/12 mb-3">
        {{ count($paginator) < 1 ? '' : $paginator->onEachSide(1)->links('livewire::tailwind') }}
    </div>
</div>
