<div class="relative" wire:ignore>
    <div x-data="{
        open: false,
        id: '{{ randAlpha() }}',
        placeholder: '{{ isset($placeholder) ? $placeholder : 'Pilih opsi' }}',
        property: '{{ isset($property) ? $property : 'item' }}',
        toggle() {
            if (this.open) {
                return this.close()
            }
    
            this.$refs.button.focus()
            this.open = true
        },
        close(focusAfter) {
            if (!this.open) return
            this.open = false
            focusAfter && focusAfter.focus()
        },
    }" x-on:keydown.escape.prevent.stop="close($refs.button)"
         x-on:focusin.window="! $refs.panel.contains($event.target) && close()" x-id="[id]" class="relative">

        <button x-ref="button" x-on:click="toggle()" :aria-expanded="open" :aria-controls="$id(id)" type="button"
                class="{{ $attributes['class'] ?: 'flex items-center gap-2 bg-white px-5 py-2.5 rounded-md shadow' }}">
            <span x-text="placeholder"></span>
            <i class="bx bx-chevron-down text-base ml-2"></i>
        </button>

        <div x-ref="panel" x-show="open" x-transition.origin.top.left x-on:click.outside="close($refs.button)"
             :id="$id(id)" style="display: none;"
             class="absolute z-50 left-0 mt-2 w-40 rounded-md bg-white shadow-md">
            @foreach ($lists as $item)
                <a href="javascript:void(0)" wire:click="$set('{{ $property }}', '{{ $item['value'] }}')"
                   x-on:click="toggle(); placeholder = '{{ $item['label'] }}'"
                   class="flex items-center gap-2 w-full first-of-type:rounded-t-md last-of-type:rounded-b-md px-4 py-2.5 text-left text-sm hover:bg-gray-50 disabled:text-gray-500">
                    {{ $item['label'] }}
                </a>
            @endforeach
        </div>
    </div>
</div>
