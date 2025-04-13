@push('style')
    <link rel="stylesheet" href="{{ asset('assets/panel/vendor/tagify/tagify.css') }}" />
@endpush

<div wire:ignore>
    <input type="text" class="form-input" id="{{ $component_id }}" value="{{ $value }}">
</div>

@push('script')
    <script src="{{ asset('assets/panel/js/pages/extended-tagify.js') }}"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const default_config = @json($config);
            const callback = {
                callbacks: {
                    "add": (e) => {
                        let values = e.detail.tagify.value;
                        values = values.map(item => item.value).join(',');
                        @this.set('value', values)
                    },
                    "remove": (e) => {
                        let values = e.detail.tagify.value;
                        values = values.map(item => item.value).join(',');
                        @this.set('value', values)
                    },
                    "edit:updated": (e) => {
                        let values = e.detail.tagify.value;
                        values = values.map(item => item.value).join(',');
                        @this.set('value', values)
                    },
                }
            };

            const config = Object.assign(default_config, callback)
            const tagify = initTagify('{{ $component_id }}', config);

            document.addEventListener("resetTagifyTag", function(event) {
                tagify.removeAllTags()
            });
        })
    </script>
@endpush
