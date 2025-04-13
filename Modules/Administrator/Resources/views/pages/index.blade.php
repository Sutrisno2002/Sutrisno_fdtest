@extends('administrator::layouts.master')

@section('title', 'Dashboard')

@push('style')
    <style>
        html canvas {
            width: 100% !important;
        }
    </style>
@endpush

@section('content')
    <x-common::utils.breadcrumb title="Dashboard">
        <x-common::utils.breadcrumb-item page="Dashboard" />
    </x-common::utils.breadcrumb>
    <div class="card mb-4">
        <div class="card-header">
            <h5 class="card-title">Informasi Pengguna</h5>
        </div>
        <div class="card-body">
            <p class="card-text">Nama User: <strong>{{ auth()->user()->name }}</strong></p>
            <p class="card-text">Status Verifikasi:
                <strong>{{ auth()->user()->email_verified_at ? 'Sudah Diverifikasi' : 'Belum Diverifikasi' }}</strong></p>
        </div>
    </div>

    {{-- <livewire:administrator::dashboard /> --}}
    {{--
    <div class="grid 2xl:grid-cols-4 md:grid-cols-2 gap-6">
        <div class="2xl:col-span-2 md:col-span-2">
            <div class="card">
                <div class="p-6">
                    <div class="flex justify-between items-center">
                        <h4 class="card-title">Project Overview</h4>
                        <div>
                            <button class="text-gray-600 dark:text-gray-400" data-fc-type="dropdown"
                                    data-fc-placement="left-start" type="button">
                                <i class="mgc_more_2_fill text-xl"></i>
                            </button>

                            <div
                                 class="hidden fc-dropdown fc-dropdown-open:opacity-100 opacity-0 w-36 z-50 mt-2 transition-[margin,opacity] duration-300 bg-white dark:bg-gray-800 shadow-lg border border-gray-200 dark:border-gray-700 rounded-lg p-2">
                                <a class="flex items-center gap-1.5 py-1.5 px-3.5 rounded text-sm transition-all duration-300 bg-transparent text-gray-800 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-200"
                                   href="javascript:void(0)">
                                    Today
                                </a>
                                <a class="flex items-center gap-1.5 py-1.5 px-3.5 rounded text-sm transition-all duration-300 bg-transparent text-gray-800 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-200"
                                   href="javascript:void(0)">
                                    Yesterday
                                </a>
                                <a class="flex items-center gap-1.5 py-1.5 px-3.5 rounded text-sm transition-all duration-300 bg-transparent text-gray-800 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300"
                                   href="javascript:void(0)">
                                    Last Week
                                </a>
                                <a class="flex items-center gap-1.5 py-1.5 px-3.5 rounded text-sm transition-all duration-300 bg-transparent text-gray-800 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300"
                                   href="javascript:void(0)">
                                    Last Month
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="grid md:grid-cols-2 items-center gap-4">
                        <div class="md:order-1 order-2">
                            <div class="flex flex-col gap-6">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0">
                                        <i
                                           class="mgc_round_fill h-10 w-10 flex justify-center items-center rounded-full bg-primary/25 text-lg text-primary"></i>
                                    </div>
                                    <div class="flex-grow ms-3">
                                        <h5 class="fw-semibold mb-1">Product Design</h5>
                                        <ul class="flex items-center gap-2">
                                            <li class="list-inline-item"><b>26</b> Total Projects</li>
                                            <li class="list-inline-item">
                                                <div class="w-1 h-1 rounded bg-gray-400"></div>
                                            </li>
                                            <li class="list-inline-item"><b>4</b> Employees</li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="flex items-center">
                                    <div class="flex-shrink-0">
                                        <i
                                           class="mgc_round_fill h-10 w-10 flex justify-center items-center rounded-full bg-danger/25 text-lg text-danger"></i>
                                    </div>
                                    <div class="flex-grow ms-3">
                                        <h5 class="fw-semibold mb-1">Web Development</h5>
                                        <ul class="flex items-center gap-2">
                                            <li class="list-inline-item"><b>30</b> Total Projects</li>
                                            <li class="list-inline-item">
                                                <div class="w-1 h-1 rounded bg-gray-400"></div>
                                            </li>
                                            <li class="list-inline-item"><b>5</b> Employees</li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="flex items-center">
                                    <div class="flex-shrink-0">
                                        <i
                                           class="mgc_round_fill h-10 w-10 flex justify-center items-center rounded-full bg-success/25 text-lg text-success"></i>
                                    </div>
                                    <div class="flex-grow ms-3">
                                        <h5 class="fw-semibold mb-1">Illustration Design</h5>
                                        <ul class="flex items-center gap-2">
                                            <li class="list-inline-item"><b>12</b> Total Projects</li>
                                            <li class="list-inline-item">
                                                <div class="w-1 h-1 rounded bg-gray-400"></div>
                                            </li>
                                            <li class="list-inline-item"><b>3</b> Employees</li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="flex items-center">
                                    <div class="flex-shrink-0">
                                        <i
                                           class="mgc_round_fill h-10 w-10 flex justify-center items-center rounded-full bg-warning/25 text-lg text-warning"></i>
                                    </div>
                                    <div class="flex-grow ms-3">
                                        <h5 class="fw-semibold mb-1">UI/UX Design</h5>
                                        <ul class="flex items-center gap-2">
                                            <li class="list-inline-item"><b>8</b> Total Projects</li>
                                            <li class="list-inline-item">
                                                <div class="w-1 h-1 rounded bg-gray-400"></div>
                                            </li>
                                            <li class="list-inline-item"><b>4</b> Employees</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="md:order-2 order-1">
                            <div id="project-overview-chart" class="apex-charts"
                                 data-colors="#3073F1,#ff679b,#0acf97,#ffbc00"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-span-1">
            <div class="card">
                <div class="card-header">
                    <div class="flex justify-between items-center">
                        <h4 class="card-title">Daily Task</h4>
                        <div>
                            <select class="form-input form-select-sm">
                                <option selected>Today</option>
                                <option value="1">Yesterday</option>
                                <option value="2">Tomorrow</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="py-6">
                    <div class="px-6" data-simplebar style="max-height: 304px;">
                        <div class="space-y-4">
                            <div class="border border-gray-200 dark:border-gray-700 rounded p-2">
                                <ul class="flex items-center gap-2 mb-2">
                                    <a href="javascript:void(0);" class="text-base text-gray-600 dark:text-gray-400">Landing
                                        Page Design</a>
                                    <i class="mgc_round_fill text-[5px]"></i>
                                    <h5 class="text-sm font-semibold">2 Hrs ago</h5>
                                </ul>
                                <p class="text-gray-500 dark:text-gray-400 text-sm mb-1">Create a new landing page
                                    (Saas
                                    Product)</p>
                                <p class="text-gray-500 dark:text-gray-400 text-sm"><i
                                       class="mgc_group_line text-xl me-1 align-middle"></i> <b>5</b> People</p>
                            </div>

                            <div class="border border-gray-200 dark:border-gray-700 rounded p-2">
                                <ul class="flex items-center gap-2 mb-2">
                                    <a href="javascript:void(0);" class="text-base text-gray-600 dark:text-gray-400">Admin
                                        Dashboard</a>
                                    <i class="mgc_round_fill text-[5px]"></i>
                                    <h5 class="text-sm font-semibold">3 Hrs ago</h5>
                                </ul>
                                <p class="text-gray-500 dark:text-gray-400 text-sm mb-1">Create a new Admin dashboard
                                </p>
                                <p class="text-gray-500 dark:text-gray-400 text-sm"><i
                                       class="mgc_group_line text-xl me-1 align-middle"></i> <b>2</b> People</p>
                            </div>

                            <div class="border border-gray-200 dark:border-gray-700 rounded p-2">
                                <ul class="flex items-center gap-2 mb-2">
                                    <a href="javascript:void(0);"
                                       class="text-base text-gray-600 dark:text-gray-400">Client Work</a>
                                    <i class="mgc_round_fill text-[5px]"></i>
                                    <h5 class="text-sm font-semibold">5 Hrs ago</h5>
                                </ul>
                                <p class="text-gray-500 dark:text-gray-400 text-sm mb-1">Create a new Power Project
                                    (Sktech
                                    design)</p>
                                <p class="text-gray-500 dark:text-gray-400 text-sm"><i
                                       class="mgc_group_line text-xl me-1 align-middle"></i> <b>2</b> People</p>
                            </div>

                            <div class="border border-gray-200 dark:border-gray-700 rounded p-2">
                                <ul class="flex items-center gap-2 mb-2">
                                    <a href="javascript:void(0);" class="text-base text-gray-600 dark:text-gray-400">UI/UX
                                        Design</a>
                                    <i class="mgc_round_fill text-[5px]"></i>
                                    <h5 class="text-sm font-semibold">6 Hrs ago</h5>
                                </ul>
                                <p class="text-gray-500 dark:text-gray-400 text-sm mb-1">Create a new UI Kit in figma
                                </p>
                                <p class="text-gray-500 dark:text-gray-400 text-sm"><i
                                       class="mgc_group_line text-xl me-1 align-middle"></i> <b>3</b> People</p>
                            </div>

                            <div class="flex items-center justify-center">
                                <div class="animate-spin flex">
                                    <i class="mgc_loading_2_line text-xl"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-span-1">
            <div class="card">
                <div class="card-header flex justify-between items-center">
                    <h4 class="card-title">Team Customers</h4>
                    <div>
                        <select class="form-select form-select-sm">
                            <option selected>Active</option>
                            <option value="1">Offline</option>
                        </select>
                    </div>
                </div>

                <div class="py-6">
                    <div class="px-6" data-simplebar style="max-height: 304px;">
                        <div class="space-y-6">
                            <div class="flex items-center">
                                <img class="me-3 rounded-full" src="/images/users/avatar-1.jpg" width="40"
                                     alt="Generic placeholder image">
                                <div class="w-full overflow-hidden">
                                    <h5 class="font-semibold"><a href="javascript:void(0);"
                                           class="text-gray-600 dark:text-gray-400">Risa Pearson</a></h5>
                                    <div class="flex items-center gap-2">
                                        <div>UI/UX Designer</div>
                                        <i class="mgc_round_fill text-[5px]"></i>
                                        <div>2.5 Year Experience</div>
                                    </div>
                                </div>
                            </div>

                            <div class="flex items-center">
                                <img class="me-3 rounded-full" src="/images/users/avatar-2.jpg" width="40"
                                     alt="Generic placeholder image">
                                <div class="w-full overflow-hidden">
                                    <h5 class="font-semibold"><a href="javascript:void(0);"
                                           class="text-gray-600 dark:text-gray-400">Margaret D. Evans</a></h5>
                                    <div class="flex items-center gap-2">
                                        <div>PHP Developer</div>
                                        <i class="mgc_round_fill text-[5px]"></i>
                                        <div>2 Year Experience</div>
                                    </div>
                                </div>
                            </div>

                            <div class="flex items-center">
                                <img class="me-3 rounded-full" src="/images/users/avatar-3.jpg" width="40"
                                     alt="Generic placeholder image">
                                <div class="w-full overflow-hidden">
                                    <h5 class="font-semibold"><a href="javascript:void(0);"
                                           class="text-gray-600 dark:text-gray-400">Bryan J. Luellen</a></h5>
                                    <div class="flex items-center gap-2">
                                        <div>Front end Developer</div>
                                        <i class="mgc_round_fill text-[5px]"></i>
                                        <div>1 Year Experience</div>
                                    </div>
                                </div>
                            </div>

                            <div class="flex items-center">
                                <img class="me-3 rounded-full" src="/images/users/avatar-4.jpg" width="40"
                                     alt="Generic placeholder image">
                                <div class="w-full overflow-hidden">
                                    <h5 class="font-semibold"><a href="javascript:void(0);"
                                           class="text-gray-600 dark:text-gray-400">Kathryn S. Collier</a></h5>
                                    <div class="flex items-center gap-2">
                                        <div>UI/UX Designer</div>
                                        <i class="mgc_round_fill text-[5px]"></i>
                                        <div>3 Year Experience</div>
                                    </div>
                                </div>
                            </div>

                            <div class="flex items-center">
                                <img class="me-3 rounded-full" src="/images/users/avatar-5.jpg" width="40"
                                     alt="Generic placeholder image">
                                <div class="w-full overflow-hidden">
                                    <h5 class="font-semibold"><a href="javascript:void(0);"
                                           class="text-gray-600 dark:text-gray-400">Timothy Kauper</a></h5>
                                    <div class="flex items-center gap-2">
                                        <div>Backend Developer</div>
                                        <i class="mgc_round_fill text-[5px]"></i>
                                        <div>2 Year Experience</div>
                                    </div>
                                </div>
                            </div>

                            <div class="flex items-center">
                                <img class="me-3 rounded-full" src="/images/users/avatar-6.jpg" width="40"
                                     alt="Generic placeholder image">
                                <div class="w-full overflow-hidden">
                                    <h5 class="font-semibold"><a href="javascript:void(0);"
                                           class="text-gray-600 dark:text-gray-400">Zara Raws</a></h5>
                                    <div class="flex items-center gap-2">
                                        <div>Python Developer</div>
                                        <i class="mgc_round_fill text-[5px]"></i>
                                        <div>1 Year Experience</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- Grid End --> --}}
@endsection

@push('script')
    {{--  --}}
@endpush


{{-- @push('script')
    <script src="https://d3js.org/d3-color.v1.min.js"></script>
    <script src="https://d3js.org/d3-interpolate.v1.min.js"></script>
    <script src="https://d3js.org/d3-scale-chromatic.v1.min.js"></script>
    <script src="{{ asset('assets/dashboard/js/color_generator.js') }}"></script>
    <script src="{{ asset('assets/dashboard/js/chart_generator.js') }}"></script>
    <script src="{{ asset('vendor/maps/indonesia.min.js') }}"></script>

    <script>
        $(function($) {
            /* Economic Potential */
            const economic_potential = null;
            const economic_potential_data = {
                labels: economic_potential.label,
                data: economic_potential.data,
            };

            /* Vulnerable Workers */
            const vulnerable_workers = null;
            const vulnerable_workers_data = {
                labels: vulnerable_workers.label,
                data: vulnerable_workers.data,
            };

            /* Colors */
            const colorScale = d3.interpolateBlues;
            const colorRangeInfo = {
                colorStart: .5,
                colorEnd: 1,
                useEndAsStart: true,
            };

            /* Create Economic Potential Chart */
            const economic_potential_chart = createChart({
                chartId: 'economic-potential-chart',
                chartData: economic_potential_data,
                colorScale: colorScale,
                colorRangeInfo: colorRangeInfo
            });

            /* Create Vulnerable Workers Chart */
            const vulnerable_workers_chart = createChart({
                chartId: 'vulnerable-workers-chart',
                chartData: vulnerable_workers_data,
                colorScale: colorScale,
                colorRangeInfo: colorRangeInfo
            });
        });
    </script>
@endpush --}}
