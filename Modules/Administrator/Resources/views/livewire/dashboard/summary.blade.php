 <div>
     <div class="grid md:grid-cols-3 grid-cols-1 gap-6 mb-6">

         <div class="col-span-1">
             <div class="card">
                 <div class="p-6">
                     <div class="flex items-center" wire:loading.class="skeleton" wire:target.except="customer_status">
                         <div class="flex-shrink-0 me-3">
                             <div class="w-12 h-12 flex justify-center items-center rounded text-primary bg-primary/25">
                                 <i class="bx bx-group text-xl"></i>
                             </div>
                         </div>
                         <div class="flex-grow">
                             <h5 class="mb-1">
                                 <a href="">
                                     Total Anggota
                                 </a>
                             </h5>
                             <p class="text-slate-500">{{ $members }} Anggota</p>
                         </div>
                     </div>
                 </div>
             </div>
         </div>

         <div class="col-span-1">
             <div class="card">
                 <div class="p-6">
                     <div class="flex items-center" wire:loading.class="skeleton" wire:target.except="order_status">
                         <div class="flex-shrink-0 me-3">
                             <div class="w-12 h-12 flex justify-center items-center rounded text-success bg-success/25">
                                 <i class="bx bx-check-circle text-xl"></i>
                             </div>
                         </div>
                         <div class="flex-grow">
                             <h5 class="mb-1">
                                 <a href="">
                                     Terverifikasi
                                 </a>
                             </h5>
                             <p class="text-slate-500">{{ $verified }} Anggota</p>
                         </div>
                     </div>
                 </div>
             </div>
         </div>

         <div class="col-span-1">
             <div class="card">
                 <div class="p-6">
                     <div class="flex items-center" wire:loading.class="skeleton"
                         wire:target.except="customer_status, order_status">
                         <div class="flex-shrink-0 me-3">
                             <div class="w-12 h-12 flex justify-center items-center rounded text-warning bg-warning/25">
                                 <i class="bx bx-info-circle text-xl"></i>
                             </div>
                         </div>
                         <div class="flex-grow">
                             <h5 class="mb-1">
                                 <a href="">
                                     Belum Terverfifikasi
                                 </a>
                             </h5>
                             <p class="text-slate-500">{{ $notverified }} Anggota</p>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>

     <div class="card">
         <div class="card-header">
             <div class="card-title">
                 <h5>Status KTA Anggota Terverifikasi</h5>
             </div>
         </div>
         <div class="card-body">
             <div class="grid md:grid-cols-2 grid-cols-1 gap-6">
                 <div class="p-6 border rounded-md">
                     <div class="flex items-center" wire:loading.class="skeleton"
                         wire:target.except="customer_status, order_status">
                         <div class="flex-shrink-0 me-3">
                             <div class="w-12 h-12 flex justify-center items-center rounded text-success bg-success/25">
                                 <i class="bx bx-check-circle text-xl"></i>
                             </div>
                         </div>
                         <div class="flex-grow">
                             <h5 class="mb-1">
                                 <a href="">
                                     Sudah Dikirim KTA
                                 </a>
                             </h5>
                             <p class="text-slate-500">{{ $kta_done }} Anggota</p>
                         </div>
                     </div>
                 </div>
                 <div class="p-6 border rounded-md">
                     <div class="flex items-center" wire:loading.class="skeleton"
                         wire:target.except="customer_status, order_status">
                         <div class="flex-shrink-0 me-3">
                             <div class="w-12 h-12 flex justify-center items-center rounded text-warning bg-warning/25">
                                 <i class="bx bx-info-circle text-xl"></i>
                             </div>
                         </div>
                         <div class="flex-grow">
                             <h5 class="mb-1">
                                 <a href="">
                                     Belum Dikirim KTA
                                 </a>
                             </h5>
                             <p class="text-slate-500">{{ $kta_pending }} Anggota</p>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </div>

 @push('script')
     <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
     <script>
         var options = {
             series: [44, 55, 13, 43, 22],
             chart: {
                 width: 380,
                 type: 'pie',
             },
             labels: ['Team A', 'Team B', 'Team C', 'Team D', 'Team E'],
             responsive: [{
                 breakpoint: 480,
                 options: {
                     chart: {
                         width: 200
                     },
                     legend: {
                         position: 'bottom'
                     }
                 }
             }]
         };

         var chart = new ApexCharts(document.querySelector("#chart"), options);
         chart.render();
     </script>
 @endpush
