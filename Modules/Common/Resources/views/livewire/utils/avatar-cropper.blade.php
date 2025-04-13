 <div x-show="cropModal" class="fixed inset-0 z-50 overflow-y-auto" aria-labelledby="modal-title" role="dialog"
     aria-modal="true" wire:ignore>
     <div
         class="flex items-end justify-center min-h-screen px-4 text-center md:items-center sm:block sm:p-0 overflow-auto">
         <div x-cloak x-show="cropModal" x-transition:enter="transition ease-out duration-300 transform"
             x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
             x-transition:leave="transition ease-in duration-200 transform" x-transition:leave-start="opacity-100"
             x-transition:leave-end="opacity-0" class="fixed inset-0 transition-opacity bg-gray-500 bg-opacity-40"
             aria-hidden="true"></div>

         <div class="flex w-full h-screen justify-center items-center">
             <div x-cloak x-show="cropModal" x-transition:enter="transition ease-out duration-300 transform"
                 x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                 x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                 x-transition:leave="transition ease-in duration-200 transform"
                 x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                 x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                 class="w-[90%] max-w-[350px] overflow-hidden text-left transition-all bg-white rounded-lg shadow-xl absolute">

                 <div class="flex items-center justify-between space-x-4">
                     <button type="button"
                         class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                         x-on:click="cropModal = false">
                         <i class="bx bx-x"></i>
                     </button>
                 </div>

                 <div class="p-6 mt-6 text-center rounded-lg overflow-hidden" x-data="{ cropper: false }">
                     <div class="wrapper min-h-[78px]">
                         <div class="avatar-wrapper rounded overflow-hidden">
                             <img id="image" src="" alt="">
                         </div>
                         <div class="relative w-full h-20 border border-dashed border-slate-300 bg-slate-100 rounded"
                             x-show="!cropper">
                             <label
                                 class="absolute h-full w-full top-0 left-0 text-center grid place-items-center text-slate-600"
                                 for="avatar">Choose your avatar</label>
                             <input class="h-0 w-0 opacity-0" type="file" name="avatar" id="avatar"
                                 accept="image/*" x-on:change="cropper = true">
                         </div>
                     </div>

                     <div class="flex flex-wrap gap-2 justify-end mt-3">
                         <button
                             class="text-white bg-blue-600 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center"
                             type="button" id="apply-avatar" wire:click="apply" x-show="cropper"
                             x-on:click="cropModal = false">
                             Terapkan
                             <i class="bx bx-check"></i>
                         </button>
                         <button type="button" x-on:click="cropModal = false; setTimeout(() => cropper = false, 500)"
                             class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                             Batal
                         </button>
                     </div>
                 </div>
             </div>
         </div>

     </div>
 </div>

 @push('script')
     <script src="{{ asset('assets/panel/js/pages/extended-cropperjs.js') }}"></script>
     <script>
         document.addEventListener('DOMContentLoaded', function() {
             let cropper;
             const apply = document.querySelector('#apply-avatar');
             const target = document.querySelector('#avatar-target');
             const avatar = document.querySelector('#avatar');
             const cancelButton = document.querySelector('#cancel-trigger');

             avatar.addEventListener('change', function(e) {
                 if (e.target.files.length) {
                     // start file reader
                     const reader = new FileReader();
                     const res = document.querySelector('.avatar-wrapper');
                     reader.onload = (e) => {
                         if (e.target.result) {
                             // create new image
                             let img = document.createElement('img');
                             img.id = 'image';
                             img.src = e.target.result;
                             res.innerHTML = '';
                             res.appendChild(img);

                             // init cropper
                             cropper = initCrop(img);
                         }
                     };
                     reader.readAsDataURL(e.target.files[0]);
                 }
             })

             // save on click
             apply.addEventListener('click', (e) => {
                 e.preventDefault();
                 // get result to data uri
                 let imgSrc = cropper.getCroppedCanvas({
                     width: 200
                 }).toDataURL();
                 // remove hide class of img
                 target.classList.remove('hide');
                 target.src = imgSrc;
                 @this.set('value', imgSrc)
             });

             //  Apply cropper
             //  Dismiss modal and reset cropper
             document.addEventListener('apply-cropper', function() {
                 cancelButton.click();
             })

             cancelButton.addEventListener('click', function() {
                 resetCropper();
             })

             function resetCropper() {
                 setTimeout(() => {
                     const image = document.querySelector('#image');

                     image.src = ''
                     cropper?.destroy()
                     avatar.value = null;
                 }, 1000);
             }
         })
     </script>
 @endpush
