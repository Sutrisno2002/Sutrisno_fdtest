<div class="relative" x-bind:class="getStatus()" x-data="{
    progress_id: '{{ randAlpha() }}',
    uploading: false,
    progress: 0,
    error: false,
    success: false,
    getStatus() {
        const el = $el;
        const input = el.querySelector('input[type=\'file\']');

        input.classList.remove('danger')
        input.classList.remove('success')

        if (this.error) {
            return input.classList.add('danger')
        }

        if (this.success) {
            console.log()
            return input.classList.add('success')
        }
        return;
    },
    reset() {
        this.progress = 0;
        this.error = false;
        this.success = false;
    }
}"
     x-on:livewire-upload-start="reset(); uploading = true;"
     x-on:livewire-upload-finish="uploading = false; success = true; getStatus()"
     x-on:livewire-upload-cancel="uploading = false"
     x-on:livewire-upload-error="uploading = false; error = true; getStatus()"
     x-on:livewire-upload-progress="progress = $event.detail.progress" wire:ignore>

    {{ $slot }}

    <!-- Progress Bar -->
    <div class="absolute flex items-center justify-end text-[10px] font-medium text-white top-[2px] right-[2px] bottom-[2px] rounded-e pr-1 w-14 bg-gradient-to-l from-black/75"
         x-show="uploading" style="display: none" x-text="progress + '%'"></div>
</div>
