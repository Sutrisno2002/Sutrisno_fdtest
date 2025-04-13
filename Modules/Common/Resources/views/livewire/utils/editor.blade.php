@push('style')
    <link rel="stylesheet" href="{{ asset('assets/panel/vendor/froala/froala_editor.pkgd.min.css') }}">
@endpush

<div wire:ignore>
    <div id="{{ $component_id }}">{!! $value !!}</div>
</div>

@push('script')
    <script type="module" src="{{ asset('assets/panel/js/pages/editor.js') }}"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            let config = @json($editor_config);
            const editor = initEditor('{{ $component_id }}', config, (e) => {
                const val = e.currentTarget.innerHTML;
                @this.set('value', val)
            });

            document.addEventListener("resetEditor", function(e) {
                editor.html.set('')
            });
        })
    </script>
@endpush
