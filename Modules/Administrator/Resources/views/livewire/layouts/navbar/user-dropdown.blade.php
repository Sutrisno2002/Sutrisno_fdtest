 <div class="relative">
     <button data-fc-type="dropdown" data-fc-placement="bottom-end" type="button" class="nav-link">
         <div class="h-10 w-10 relative overflow-hidden rounded-full">
             <img src="{{ $user?->getAvatar() }}" alt="Avatar {{ $user?->name }}"
                  class="h-full w-full object-cover object-center" id="navbar-avatar">
         </div>
     </button>
     <div
          class="fc-dropdown fc-dropdown-open:opacity-100 hidden opacity-0 w-44 z-50 transition-[margin,opacity] duration-300 mt-2 bg-white shadow-lg border rounded-lg p-2 border-gray-200 dark:border-gray-700 dark:bg-gray-800">
         <div class="flex flex-col py-2 px-3">
             <p class="text-dark font-semibold mb-2">{{ $user?->name }}</p>
             <small>{!! $user?->roleBadges() !!}</small>
         </div>

         <hr class="my-2 -mx-2 border-gray-200 dark:border-gray-700">

         @foreach ($menus as $item)
             @if ($item['role'])
                 @hasrole($item['role'])
                     <a class="flex items-center py-2 px-3 rounded-md text-sm text-gray-800 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300"
                        href="{{ $item['link'] }}">
                         <i class="{{ $item['icon'] }} me-2"></i>
                         <span>{{ $item['label'] }}</span>
                     </a>
                 @endhasrole
             @else
                 <a class="flex items-center py-2 px-3 rounded-md text-sm text-gray-800 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300"
                    href="{{ $item['link'] }}">
                     <i class="{{ $item['icon'] }} me-2"></i>
                     <span>{{ $item['label'] }}</span>
                 </a>
             @endif
         @endforeach

         <hr class="my-2 -mx-2 border-gray-200 dark:border-gray-700">

         <form method="POST" action="{{ route('auth.logout') }}">
             @csrf
             <a class="flex items-center py-2 px-3 rounded-md text-sm text-gray-800 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300"
                href="{{ route('auth.logout') }}" onclick="event.preventDefault();this.closest('form').submit();">
                 <i class="mgc_exit_line  me-2"></i>
                 <span>Log Out</span>
             </a>
         </form>
     </div>
 </div>
