@push('styles')
@endpush

<div class="text-dark">

    {{-- Summary --}}
    <livewire:administrator::dashboard.summary />

    {{-- <div class="grid lg:grid-cols-3 gap-6 overflow-hidden">
        <livewire:administrator::dashboard.revenue :dates="$dates" />
        <livewire:administrator::dashboard.order.chart :dates="$dates" />
    </div> --}}

    {{--
    <div class="grid 2xl:grid-cols-4 gap-6 mb-6">

        <div class="col-span-2 md:col-span-1">
            <div class="card mb-6">
                <div class="px-6 py-5 flex justify-between items-center">
                    <h4 class="header-title">Project Summary</h4>
                    <div>
                        <button class="text-gray-600 dark:text-gray-400" data-fc-type="dropdown"
                                data-fc-placement="left-start" type="button">
                            <i class="mgc_more_1_fill text-xl"></i>
                        </button>

                        <div
                             class="hidden fc-dropdown fc-dropdown-open:opacity-100 opacity-0 w-36 z-50 mt-2 transition-[margin,opacity] duration-300 bg-white dark:bg-gray-800 shadow-lg border border-gray-200 dark:border-gray-700 rounded-lg p-2">
                            <a class="flex items-center gap-1.5 py-1.5 px-3.5 rounded text-sm transition-all duration-300 bg-transparent text-gray-800 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-200"
                               href="javascript:void(0)">
                                <i class="mgc_add_circle_line"></i> Add
                            </a>
                            <a class="flex items-center gap-1.5 py-1.5 px-3.5 rounded text-sm transition-all duration-300 bg-transparent text-gray-800 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-200"
                               href="javascript:void(0)">
                                <i class="mgc_edit_line"></i> Edit
                            </a>
                            <a class="flex items-center gap-1.5 py-1.5 px-3.5 rounded text-sm transition-all duration-300 bg-transparent text-gray-800 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300"
                               href="javascript:void(0)">
                                <i class="mgc_copy_2_line"></i> Copy
                            </a>
                            <div class="h-px bg-gray-200 dark:bg-gray-700 my-2 -mx-2"></div>
                            <a class="flex items-center gap-1.5 py-1.5 px-3.5 rounded text-sm transition-all duration-300 bg-transparent text-danger hover:bg-danger/5"
                               href="javascript:void(0)">
                                <i class="mgc_delete_line"></i> Delete
                            </a>
                        </div>
                    </div>
                </div>
                <div class="px-4 py-2 bg-warning/20 text-warning" role="alert">
                    <i class="mgc_folder_star_line me-1 text-lg align-baseline"></i> <b>38</b> Total Admin & Client
                    Projects
                </div>

                <div class="p-6 space-y-3">
                    <div class="flex items-center border border-gray-200 dark:border-gray-700 rounded px-3 py-2">
                        <div class="flex-shrink-0 me-2">
                            <div
                                 class="w-12 h-12 flex justify-center items-center rounded-full text-primary bg-primary/25">
                                <i class="mgc_group_line text-xl"></i>
                            </div>
                        </div>
                        <div class="flex-grow">
                            <h5 class="font-semibold mb-1">Project Discssion</h5>
                            <p class="text-gray-400">6 Person</p>
                        </div>
                        <div>
                            <button class="text-gray-400" data-fc-type="tooltip" data-fc-placement="top">
                                <i class="mgc_information_line text-xl"></i>
                            </button>
                            <div class="bg-slate-700 hidden px-2 py-1 rounded transition-all text-white opacity-0 z-50"
                                 role="tooltip">
                                Info <div class="bg-slate-700 w-2.5 h-2.5 rotate-45 -z-10 rounded-[1px]" data-fc-arrow>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="flex items-center border border-gray-200 dark:border-gray-700 rounded px-3 py-2">
                        <div class="flex-shrink-0 me-2">
                            <div
                                 class="w-12 h-12 flex justify-center items-center rounded-full text-warning bg-warning/25">
                                <i class="mgc_compass_line text-xl"></i>
                            </div>
                        </div>
                        <div class="flex-grow">
                            <h5 class="fw-semibold my-0">In Progress</h5>
                            <p>16 Projects</p>
                        </div>
                        <div>
                            <button class="text-gray-400" data-fc-type="tooltip" data-fc-placement="top">
                                <i class="mgc_information_line text-xl"></i>
                            </button>
                            <div class="bg-slate-700 hidden px-2 py-1 rounded transition-all text-white opacity-0 z-50"
                                 role="tooltip">
                                Info <div class="bg-slate-700 w-2.5 h-2.5 rotate-45 -z-10 rounded-[1px]" data-fc-arrow>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="flex items-center border border-gray-200 dark:border-gray-700 rounded px-3 py-2">
                        <div class="flex-shrink-0 me-2">
                            <div
                                 class="w-12 h-12 flex justify-center items-center rounded-full text-danger bg-danger/25">
                                <i class="mgc_check_circle_line text-xl"></i>
                            </div>
                        </div>
                        <div class="flex-grow">
                            <h5 class="fw-semibold my-0">Completed Projects</h5>
                            <p>24</p>
                        </div>
                        <div>
                            <button class="text-gray-400" data-fc-type="tooltip" data-fc-placement="top">
                                <i class="mgc_information_line text-xl"></i>
                            </button>
                            <div class="bg-slate-700 hidden px-2 py-1 rounded transition-all text-white opacity-0 z-50"
                                 role="tooltip">
                                Info <div class="bg-slate-700 w-2.5 h-2.5 rotate-45 -z-10 rounded-[1px]" data-fc-arrow>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="flex items-center border border-gray-200 dark:border-gray-700 rounded px-3 py-2">
                        <div class="flex-shrink-0 me-2">
                            <div
                                 class="w-12 h-12 flex justify-center items-center rounded-full text-success bg-success/25">
                                <i class="mgc_send_line text-xl"></i>
                            </div>
                        </div>
                        <div class="flex-grow">
                            <h5 class="fw-semibold my-0">Delivery Projects</h5>
                            <p>20</p>
                        </div>
                        <div>
                            <button class="text-gray-400" data-fc-type="tooltip" data-fc-placement="top">
                                <i class="mgc_information_line text-xl"></i>
                            </button>
                            <div class="bg-slate-700 hidden px-2 py-1 rounded transition-all text-white opacity-0 z-50"
                                 role="tooltip">
                                Info <div class="bg-slate-700 w-2.5 h-2.5 rotate-45 -z-10 rounded-[1px]" data-fc-arrow>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card p-6">
                <h4 class="text-gray-600 dark:text-gray-300 mb-2.5">On Time Completed Rate <span
                          class="px-2 py-0.5 rounded bg-success/25 text-success ms-2"><i
                           class="mgc_arrow_up_line text-sm align-baseline me-1"></i>59%</span></h4>
                <div class="flex justify-between items-center mb-2">
                    <h5 class="text-base font-semibold">Completed Projects</h5>
                    <h5 class="text-gray-600 dark:text-gray-300">65%</h5>
                </div>
                <div class="flex w-full h-1 bg-gray-200 rounded-full overflow-hidden dark:bg-gray-700 ">
                    <div class="flex flex-col justify-center overflow-hidden bg-primary w-1/4" role="progressbar"
                         aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>
        </div>
    </div> --}}

    <div class="grid grid-cols-4 gap-6 mt-6">
        <div class="col-span-4 md:col-span-2 lg:col-span-1">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">
                        Berdasarkan Jenis Kelamin
                    </div>
                    <div class="flex justify-center items-center" style="height: 320px;">
                        <div class="" id="gender-donut"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-span-4 md:col-span-2 lg:col-span-1">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">
                        Berdasarkan Jenis Kelamin
                    </div>
                    <div class="chart-area default-padding " style="height: 320px;">
                        <div class="" id="gender-bar"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-span-4 md:col-span-2 lg:col-span-1">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">
                        Berdasarkan Umur
                    </div>
                    <div class="flex justify-center items-center" style="height: 320px;">
                        <div class="" id="age-donut"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-span-4 md:col-span-2 lg:col-span-1">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">
                        Berdasarkan Umur
                    </div>
                    <div class="chart-area default-padding " style="height: 320px;">
                        <div class="" id="age-bar"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="mt-6">
        <div class="card">
            <div class="card-body">
                <div class="card-title">
                    Berdasarkan Provinsi
                </div>
                <div class="chart-area default-padding ">
                    <div class="" id="province-bar"></div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('script')
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

    <script>
        //  Gender Chart
        const gender = @json($gender);

        const gender_data = {
            labels: gender.label,
            data: gender.data,
            count: gender.count,
        };

        var gender_donut = {
            series: gender.data,
            chart: {
                type: 'donut',
                width: "100%",
            },
            labels: gender.label,
            legend: {
                position: 'bottom',
            },
            colors: ['#800a01', '#d41002'],
        };
        var chart = new ApexCharts(document.querySelector("#gender-donut"), gender_donut);
        chart.render();

        var gender_bar = {
            series: [{
                name: 'Jumlah',
                data: gender.count
            }],
            chart: {
                toolbar: false,
                type: 'bar',
                height: 300
            },
            plotOptions: {
                bar: {
                    borderRadius: 4,
                    borderRadiusApplication: 'end',
                    horizontal: false,
                }
            },
            dataLabels: {
                enabled: false
            },
            xaxis: {
                categories: gender.label
            },
            colors: ['#800a01']
        };
        var chart2 = new ApexCharts(document.querySelector("#gender-bar"), gender_bar);
        chart2.render();


        // Age Chart
        const age = @json($age);

        const age_data = {
            labels: age.label,
            data: age.data,
            count: age.count,
        };

        var age_donut = {
            series: age.data,
            chart: {
                type: 'donut',
                width: "100%",
            },
            labels: age.label,
            legend: {
                position: 'bottom',
            },
            colors: ['#800a01', '#d41002', '#e81302', '#e85202', '#fc5a03', '#fcc323', '#f9fc23'],
        };

        var chart3 = new ApexCharts(document.querySelector("#age-donut"), age_donut);
        chart3.render();

        var age_bar = {
            series: [{
                name: 'Jumlah',
                data: age.count
            }],
            chart: {
                toolbar: false,
                type: 'bar',
                height: 300
            },
            plotOptions: {
                bar: {
                    borderRadius: 4,
                    borderRadiusApplication: 'end',
                    horizontal: false,
                }
            },
            dataLabels: {
                enabled: false
            },
            xaxis: {
                categories: age.label
            },
            colors: ['#800a01']
        };

        var chart4 = new ApexCharts(document.querySelector("#age-bar"), age_bar);
        chart4.render();


        // Province
        const province = @json($province);

        const province_data = {
            labels: province.label,
            data: province.data,
            count: province.count,
        };

        var province_bar = {
            series: [{
                name: 'Jumlah',
                data: province.count
            }],
            chart: {
                toolbar: false,
                type: 'bar',
                height: 300
            },
            plotOptions: {
                bar: {
                    borderRadius: 4,
                    borderRadiusApplication: 'end',
                    horizontal: false,
                }
            },
            dataLabels: {
                enabled: false
            },
            xaxis: {
                categories: province.label
            },
            colors: ['#800a01']
        };

        var chart5 = new ApexCharts(document.querySelector("#province-bar"), province_bar);
        chart5.render();
    </script>
@endpush
