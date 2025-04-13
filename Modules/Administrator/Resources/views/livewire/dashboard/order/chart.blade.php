<div class="col-span-1" data-wrapper="order-pie-chart">
    <div class="card">
        <div class="card-body" wire:ignore wire:loading.class="skeleton">
            <h5 class="mb-7">Statistik Pesanan</h5>
            <div class="h-80" wire:ignore>
                <canvas id="order-pie-chart" class="m-auto"></canvas>
            </div>
        </div>
    </div>
</div>

@push('script')
    <script>
        window.addEventListener('DOMContentLoaded', function() {
            const wrapper = document.querySelector('[data-wrapper="order-pie-chart"]');
            const ctx = document.getElementById('order-pie-chart').getContext('2d');
            const colors = window.chartjs_options.colors;
            let options = window.chartjs_options.pie;

            /**
             * Add data too chart
             *
             * @param {object} chart
             * @param {object} response
             */
            function addData(chart, response) {
                chart.data.labels = response.labels;
                chart.data.datasets = response.data;
                chart.data.datasets[0].backgroundColor = [colors.warning, colors.primary, colors.light]

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
            options.data.datasets[0].backgroundColor = [colors.warning, colors.primary, colors.light]

            // Modify data tooltip
            options.options = {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    tooltip: {
                        callbacks: {
                            label: (item) => (` ${item.parsed} Pesanan`)
                        }
                    }
                }
            }

            // Render Chart
            const chart = new Chart(ctx, options);

            // Render value when livewire dispatch update-order-pie-chart event
            window.addEventListener('update-order-pie-chart', function(e) {
                const res = e.detail[0]
                upadateChart(chart, res)
            })
        })
    </script>
@endpush
