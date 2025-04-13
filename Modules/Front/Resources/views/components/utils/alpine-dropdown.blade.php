<div {{$attributes->merge(['class' => 'flex justify-center'])}}>
    <div x-data="{
        open: false,
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
        }
    }" x-on:keydown.escape.prevent.stop="close($refs.button)"
         x-on:focusin.window="! $refs.panel.contains($event.target) && close()" x-id="['dropdown-button']"
         class="relative">
        <!-- Button -->
        <button class="inline-flex items-center gap-1.5" x-ref="button" x-on:click="toggle()" :aria-expanded="open" :aria-controls="$id('dropdown-button')"
                type="button">
            {{ $slot }}
        </button>

        <!-- Panel -->
        <div x-ref="panel" x-show="open" x-transition.origin.top.right x-on:click.outside="close($refs.button)"
             :id="$id('dropdown-button')" style="display: none;"
             class="absolute right-0 mt-2 w-40 rounded-md bg-white shadow-md z-20">
            {{ $list }}
        </div>
    </div>
</div>
