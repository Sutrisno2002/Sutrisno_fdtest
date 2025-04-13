<div class="col-span-1 lg:col-span-2">
    <div class="card">
        <div class="card-body">
            <h5>Pendapatan</h5>
            <p class="text-success font-semibold text-lg">
                {{ $total_revenue ? price($total_revenue, true, 2) : price(0, true, 2) }}
            </p>
            <div class="h-80" wire:ignore wire:loading.class="skeleton">
                <canvas id="revenue-chart"></canvas>
            </div>
        </div>
    </div>
</div>

@push('script')
    <script>
        window.addEventListener('DOMContentLoaded', function() {
            const ctx = document.getElementById('revenue-chart').getContext('2d');
            const colors = window.chartjs_options.colors;
            let options = window.chartjs_options.line;
            let gradient = ctx.createLinearGradient(0, 0, 0, 400);
            gradient.addColorStop(.5, colors.gradient_primary.from);
            gradient.addColorStop(0, colors.gradient_primary.to);

            /**
             * Add data too chart
             *
             * @param {object} chart
             * @param {object} response
             */
            function addData(chart, response) {
                chart.data.labels = response.labels;
                chart.data.datasets = response.data;
                // chart.data.datasets[0].backgroundColor = [colors.warning, colors.primary, colors.light]

                chart.update();
            }

            /**
             * Remove chart data
             *
             * @param {object} chart
             */
            function removeData(chart) {
                chart.data.labels = [];
                chart.data.datasets = []
                chart.update();
            }
            /**
             * Update chart data (label, datasets)
             *
             * @param {object} chart
             * @param {object} response
             */
            function upadateChart(chart, response) {
                removeData(chart)
                addData(chart, response)
            }

            // Modify default options
            // Set data labels
            options.data.labels = @json($labels);
            // Set datasets
            options.data.datasets = @json($data);

            // Set colors to pie chart
            options.data.datasets[0].fill = true
            options.data.datasets[0].fillColor = gradient

            // Modify data tooltip
            options.options = {
                responsive: true,
                maintainAspectRatio: false,
                elements: {
                    line: {
                        tension: 0.4
                    }
                },
                plugins: {
                    tooltip: {
                        callbacks: {
                            label: function(item) {
                                return (`Revenue: Rp. ${item.formattedValue}`)
                            }
                        }
                    }
                }
            }

            // Render Chart
            const chart = new Chart(ctx, options);

            // Render value when livewire dispatch update-revenue-chart event
            window.addEventListener('update-revenue-chart', function(e) {
                const res = e.detail[0]
                upadateChart(chart, res)
            })

        })
    </script>
@endpush
