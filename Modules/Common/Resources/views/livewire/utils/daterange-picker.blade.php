@push('style')
    <link type="text/css" href="{{ asset('assets/panel/vendor/daterangepicker/daterangepicker.css') }}" rel="stylesheet">
@endpush

<div class="{{ $class }}">
    <div class="input-group prepend">
        <div class="text"><i class="bx bx-calendar"></i></div>
        <input class="form-input" id="{{ $component_id }}" readonly />
    </div>
</div>

@push('script')
    <script src="{{ asset('assets/panel/vendor/moment/moment.min.js') }}"></script>
    <script src="{{ asset('assets/panel/vendor/daterangepicker/daterangepicker.js') }}"></script>
    <script>
        (function() {
            const ranges = {
                'Today': [moment().startOf('day'), moment().endOf('day')],
                'Yesterday': [moment().subtract(1, 'days').startOf('day'), moment().subtract(1, 'days').endOf(
                    'day')],
                'Last 7 Days': [moment().subtract(6, 'days').startOf('day'), moment().endOf('day')],
                'Last 30 Days': [moment().subtract(29, 'days').startOf('day'), moment().endOf('day')],
                'This Month': [moment().startOf('month').startOf('day'), moment().endOf('month').endOf('day')],
                'Last Month': [
                    moment().subtract(1, 'months').startOf('month').startOf('day'),
                    moment().subtract(1, 'months').endOf('month').endOf('day')
                ],
                'This Year': [
                    moment().startOf('year').startOf('day'),
                    moment().endOf('year').endOf('day')
                ],
                'Last Year': [
                    moment().subtract(1, 'years').startOf('year').startOf('day'),
                    moment().subtract(1, 'years').endOf('year').endOf('day')
                ],
            }

            new DateRangePicker('{{ $component_id }}', {
                    opens: 'right',
                    ranges: ranges,
                    minYear: 1950,
                    maxYear: 2100,
                    autoApply: true,
                    opens: "left",
                    drops: "auto",
                    startDate: '{{ $value['start'] }}',
                    endDate: '{{ $value['end'] }}',
                    locale: {
                        format: "YYYY-MM-DD",
                    }
                },
                function(start, end) {
                    @this.set('value.start', start.format('YYYY-MM-DD'))
                    @this.set('value.end', end.format('YYYY-MM-DD'))
                })
        })()
    </script>
@endpush
