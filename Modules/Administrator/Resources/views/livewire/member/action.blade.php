<div class="flex flex-col md:flex-row gap-3 items-end">
    @can('template.member', 'web')
        <a href="{{ route('administrator.member.template') }}" class="btn bg-success hover:bg-green-600 text-white rounded-full"><i
                class='bx bx-download me-2'></i> Template <span class="hidden md:block">&nbsp;CSV</span></a>
    @endcan
    @can('import.member', 'web')
        <div>
            <input class="sr-only" type="file" id="csv" accept=".csv" wire:model="csv">
            <label for="csv" wire:loading.class="bg-gray-500" wire:loading.class.remove="bg-primary"
                class="btn bg-primary hover:bg-sky-700 text-white rounded-full"><i class='bx bx-upload me-2'></i>Import <span class="hidden md:block">&nbsp;CSV</span>
                <span wire:loading
                    class="animate-spin inline-block ml-3 w-3 h-3 border-[2px] border-current border-t-transparent rounded-full ">
                    <span class="sr-only">Loading...</span>
                </span></label>
        </div>
    @endcan
</div>
