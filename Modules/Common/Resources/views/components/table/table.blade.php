<div class="py-2 {{ isset($withoutCard) ? '' : 'card' }}" x-data="{
    deleteConfirm: false,
}">
    @isset($searchable)
        @if ($searchable)
            <div class="p-4">
                <div class="flex flex-wrap justify-end gap-2 md:gap-4">
                    <div class="w-8/12 md:w-4/12 lg:w-3/12 relative">
                        <label for="search" class="sr-only">Search</label>
                        <input type="text" name="search" wire:model.lazy="search" class="form-input pl-11"
                            placeholder="Pencarian...">
                        <div class="absolute inset-y-0 start-0 flex items-center pointer-events-none pl-4">
                            <i class="bx bx-search"></i>
                        </div>
                    </div>

                    @isset($searchAction)
                        <div class="relative">
                            {{ $searchAction }}
                        </div>
                    @endisset
                </div>
            </div>
        @endif
    @endisset

    @isset($filter)
        {{ $filter }}
    @endisset

    <div class="overflow-auto p-4">
        <div class="min-w-full inline-block align-middle">
            <div class="border dark:border-gray-700">
                <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                    {{-- Table Header --}}
                    <x-common::table.thead :columns="$customTable->columns" :sort="$sort" :order="$order" />

                    @isset($sortable)
                        {{-- Table Body --}}
                        <x-common::table.tbody wire:sortable="updateOrder" wire:sortable.options="{ animation: 100 }">
                            {{ $slot }}
                        </x-common::table.tbody>
                    @else
                        {{-- Table Body --}}
                        <x-common::table.tbody>
                            {{ $slot }}
                        </x-common::table.tbody>
                    @endisset
                </table>
            </div>
        </div>
    </div>

    <div class="p-4 pb-2">
        <x-common::utils.pagination :custom-table="$customTable" :paginator="$datas" />
    </div>

    <x-common::utils.remove-modal />
</div>
