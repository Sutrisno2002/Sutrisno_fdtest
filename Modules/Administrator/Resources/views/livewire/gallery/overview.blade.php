<div class="card">
    <div class="w-full p-4 flex justify-start absolute">
        <livewire:common::utils.daterange-picker :value="$dates" />
    </div>
    <livewire:administrator::gallery.table :dates="$dates" />
</div>