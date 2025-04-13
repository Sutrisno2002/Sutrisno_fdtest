@push('style')
    <link rel="stylesheet" href="{{ asset('assets/panel/vendor/filepond/filepond.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/panel/vendor/filepond/filepond-plugin-file-poster.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/panel/vendor/filepond/filepond-plugin-image-edit.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/panel/vendor/filepond/filepond-plugin-image-preview.min.css') }}" />
@endpush

<div wire:ignore>
    <input type="file" name="image" id="{{ $component_id }}" accept="image/*" />
</div>

@push('script')
    <script src="{{ asset('assets/panel/js/pages/extended-filepond.js') }}"></script>
    <script>
        function config() {
            return {
                server: {
                    process: (fieldName, file, metadata, load, error, progress, abort, transfer, options) => {
                        // set data
                        const formData = new FormData();
                        formData.append(fieldName, file, file.name);

                        // related to aborting the request
                        const CancelToken = axios.CancelToken;
                        const source = CancelToken.source();

                        axios.request({
                                method: "POST",
                                baseURL: '{{ $route }}',
                                headers: {
                                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                },
                                timeout: 5000,
                                data: formData,
                                cancelToken: source.token,
                                onUploadProgress: (e) => {
                                    progress(e.progress, e.loaded, e.total);
                                }
                            })
                            .then(res => {
                                load(res.data.data.filepath)
                                @this.set('value', res.data.data.filepath)
                            })
                            .catch((err) => {
                                error(err.response.data.message)
                                if (axios.isCancel(err)) {
                                    console.log('Request canceled', err.message);

                                }
                            });

                    },
                    revert: function(uniqueFileId, load, error) {
                        const formData = new FormData();
                        const request = new XMLHttpRequest();

                        formData.append('image', uniqueFileId);

                        request.open('POST', '{{ route('media.destroyImage') }}', true);
                        request.setRequestHeader("X-CSRF-TOKEN", "{{ csrf_token() }}")

                        request.onload = function() {
                            if (request.status >= 200 && request.status < 300) {
                                const data = JSON.parse(request.responseText);
                                @this.set('value', null)
                            }
                        };

                        request.send(formData);

                        error('oh my goodness');
                        load();
                    },
                },
            };
        }

        document.addEventListener('DOMContentLoaded', function() {
            const filepond = initFilepond('{{ $component_id }}', config())
            let pond = FilePond.find(document.getElementById('{{ $component_id }}'))

            document.addEventListener("resetFilepond", function(event) {
                if (pond != null) {
                    pond?.removeFile()
                    pond?.removeFiles();
                }
            });
        })
    </script>

    @if (!empty($info))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                let pond = FilePond.find(document.getElementById('{{ $component_id }}'))
                pond.files = [{
                    source: '{{ $oldValue }}',
                    options: {
                        type: 'local',
                        file: {
                            name: '{{ isset($info['name']) ? $info['name'] : $oldValue }}',
                            size: '{{ isset($info['size']) ? $info['size'] : '' }}',
                        },
                        metadata: {
                            poster: '{{ $oldValue }}'
                        }
                    }
                }];

            });
        </script>
    @endif
@endpush
