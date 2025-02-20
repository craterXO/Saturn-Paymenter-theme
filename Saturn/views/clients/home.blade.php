<x-app-layout clients title="{{ __('Home') }}">
    <script>
        function removeElement(element) {
            element.remove();
            this.error = true;
        }
    </script>
    
    <div class="content">
        <x-success class="mt-4" />
        <div class="grid grid-cols-12 gap-4">
            <div class="col-span-3 hidden lg:block">
                <div class="bg-zinc-800 bg-gradient-to-b from-zinc-800 to-zinc-600 p-4 rounded-xl text-white min-h-[200px] lg:min-h-[500px]">
                    <div class="flex flex-col items-start justify-start px-4 py-4 ">
                        <div class="flex-shrink-0 w-12 h-12" style="display: none;">
                            <img class="w-8 h-8 rounded-md" style="align-self: center; width: 3rem; height: 3rem;"
                                src="https://www.gravatar.com/avatar/{{ md5(Auth::user()->email) }}?s=200&d=mp" />
                        </div>
                        <img class="w-[100px] h-auto rounded-full" src="https://www.gravatar.com/avatar/{{md5(Auth::user()->email)}}?s=200&d=mp" alt="Avatar"/>
                        <div class="text-[30px] pt-8 font-opensans font-regular leading-7">
                            {{ Auth::user()->name }}
                        </div>
                        <div class="text-[16px] pt-2 font-opensans font-regular text-gray-400">
                            {{ Auth::user()->email }}
                        </div>
                        @if(Auth::user()->phone)
                            <div class="text-[16px] pt-2 font-opensans font-regular text-gray-400">
                                <i class="ri-phone-line mr-2"></i>{{ Auth::user()->phone }}
                            </div>
                        @endif
                        @if(Auth::user()->address)
                            <div class="text-[16px] pt-2 font-opensans font-regular text-gray-400">
                                <i class="ri-map-pin-line mr-2"></i>{{ Auth::user()->address }}
                            </div>
                        @endif
                        @if(Auth::user()->city && Auth::user()->country)
                            <div class="text-[16px] pt-2 font-opensans font-regular text-gray-400">
                                <i class="ri-global-line mr-2"></i>{{ Auth::user()->city }}, {{ Auth::user()->country }}
                            </div>
                        @endif
                        <div class="text-[16px] pt-2 font-opensans font-regular text-gray-400">
                            <i class="ri-time-line mr-2"></i>{{ __('Member since') }} {{ Auth::user()->created_at->format('M Y') }}
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-span-12 lg:col-span-9">
                <div class="bg-primary-400 px-6 lg:px-12 py-8 lg:py-10 rounded-xl text-white min-h-[150px] lg:min-h-[300px] bg-[url('/img/dashboardIMG.png')] bg-cover bg-center">
                    <div class="flex flex-col items-start justify-start">
                        <h2 class="text-[20px] lg:text-[40px] font-opensans font-regular">
                            Your User Dashboard
                            <br>
                            <span class="text-[14px] lg:text-[20px] font-opensans font-regular hidden lg:block">
                                Manage all your services and invoices here.
                            </span>
                        </h2>   
                    </div>
                </div>
                <div class="flex flex-col lg:flex-row items-center justify-start gap-8 p-6">
                    <div class="bg-zinc-800/40 border-2 border-zinc-800 hover:border-zinc-600 transition-all duration-300 rounded-xl w-full lg:w-[410px] h-[200px] mt-6 ml-4">
                        <div class="flex flex-col items-center justify-center px-2 py-4">

                        <div class="text-[60px] font-bold text-white mb-2">
                            {{ Auth::user()->invoices()->where('status', 'pending')->count() }}
                        </div>
                        <h2 class="text-[20px] font-opensans font-regular mb-4">
                            {{ __('Pending Invoices') }}
                        </h2>
                        <div class="mt-auto">
                            <a href="{{ route('clients.invoice.index') }}" class="text-blue-500 hover:text-blue-400 text-sm flex items-center">
                                <span>{{ __('View All') }}</span>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="bg-zinc-800/40 border-2 border-zinc-800 hover:border-zinc-600 transition-all duration-300 rounded-xl w-full lg:w-[410px] h-[200px] mt-6">
                    <div class="flex flex-col items-center justify-center px-2 py-4">

                        <div class="text-[60px] font-bold text-white mb-2">
                            {{ App\Models\Ticket::where('user_id', Auth::id())->where('status', 'open')->count() }}
                        </div>
                        <h2 class="text-[20px] font-opensans font-regular mb-4">
                            {{ __('Open Tickets') }}
                        </h2>
                        <div class="mt-auto">
                            <a href="{{ route('clients.tickets.index') }}" class="text-blue-500 hover:text-blue-400 text-sm flex items-center">
                                <span>{{ __('View All') }}</span>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
                </div>
                <div class="flex flex-col lg:flex-row justify-between p-6">
                    <div class="bg-zinc-800/40 border-2 border-zinc-800 hover:border-zinc-600 transition-all duration-300 rounded-xl w-full lg:w-[930px] h-auto lg:h-[350px] mt-6 mx-4 lg:ml-4 overflow-x-auto">
                        <table class="w-full min-w-[600px] lg:min-w-0">
                            <thead class="border-b-2 border-secondary-200 dark:border-secondary-200 text-secondary-600">
                                <tr>
                                    <th scope="col" class="text-start pl-6 py-2 text-sm font-normal">
                                        {{ __('Product/Service') }}</th>
                                    <th scope="col" class="text-start pr-6 py-2 text-sm font-normal hidden md:table-cell">
                                        {{ __('Cost') }}</th>
                                    <th scope="col" class="text-start pr-6 py-2 text-sm font-normal hidden md:table-cell">
                                        {{ __('Active until') }}</th>
                                    <th scope="col" class="text-start pr-6 py-2 text-sm font-normal hidden md:table-cell">
                                        {{ __('Status') }}</th>
                                    <th scope="col" class="text-start pr-6 py-2 text-sm font-normal">
                                        {{ __('Actions') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (count($services) > 0)
                                    @foreach ($services as $service)
                                        @php($loop1 = $loop)
                                        @foreach ($service->products as $product2)
                                            @php($product = $product2->product)
                                            @if($product2->status === 'cancelled')
                                                @continue
                                            @endif
                                            <tr class="@if($loop1->index < ($loop1->count - $loop->count )) border-b-2 border-secondary-200 @endif">
                                                <td class="pl-6 py-3 items-center break-all max-w-[200px] lg:max-w-fit">
                                                    <div class="flex items-center">
                                                        <img src="{{ $product->image }}" alt="{{ $product->name }}" class="w-8 h-8 md:w-12 md:h-12 rounded-md flex-shrink-0"
                                                             onerror="removeElement(this);">
                                                        <strong class="ml-3 line-clamp-2 lg:line-clamp-none">{{ ucfirst($product->name) }}</strong>
                                                    </div>
                                                </td>
                                                <td class="py-3 hidden md:table-cell whitespace-nowrap" data-order="0.00">
                                                    <x-money :amount="$product2->price" />
                                                </td>
                                                <td class="py-3 hidden md:table-cell whitespace-nowrap">
                                                    {{ $product2->expiry_date ? $product2->expiry_date->toDateString() : __('Doesn\'t Expire') }}
                                                </td>
                                                <td class="py-3 hidden md:table-cell whitespace-nowrap">
                                                    <div class="font-bold rounded-md text-left">
                                                        @if ($product2->status === 'paid')
                                                            <span class="label status status-active text-green-500">{{__('Active')}}</span>
                                                        @elseif($product2->status === 'pending')
                                                            <span class="label status status-active text-orange-500">{{ __('Pending') }}</span>
                                                        @elseif($product2->status === 'cancelled')
                                                            <span class="label status status-active text-red-500">{{ __('Expired') }}</span>
                                                        @elseif($product2->status === 'suspended')
                                                            <span class="label status status-active text-red-500">{{ __('Suspended') }}</span>
                                                        @else
                                                            <span class="label status status-active text-red-500">{{ $product2->status }}</span>
                                                        @endif
                                                    </div>
                                                </td>
                                                <td class="py-3">
                                                    <div class="flex items-center space-x-2">
                                                        <a class="button button-secondary" @if($product2->status === 'cancelled' || $product2->status === 'suspended') style="opacity: 0.5; cursor: not-allowed;" @else href="{{ route('clients.active-products.show', $product2->id) }}" @endif><i class="ri-eye-line"></i></a>
                                                        <span class="relative flex">
                                                            <a class="button @if($product2->status !== 'pending' || $product2->status !== 'suspended') cursor-pointer bg-secondary-200 hidden @else button-secondary @endif" @if($product2->status === 'pending' || $product2->status === 'suspended') href='{{ route('clients.invoice.index') }}'@endif><i class="ri-money-dollar-circle-line"></i></a>
                                                            @if($product2->status === 'pending' || $product2->status === 'suspended')
                                                                <span class="animate-ping -top-1 -right-1 absolute inline-flex h-3 w-3 rounded-full bg-red-400 opacity-75"></span>
                                                                <span class="absolute inline-flex -top-1 -right-1 rounded-full h-3 w-3 bg-red-500"></span>
                                                            @endif
                                                        </span>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endforeach
                                @elseif (count($services) <= 0)
                                    <tr class="w-full">
                                        <td colspan="5" class="pt-5 w-full font-opensans font-regular dark:text-blue-600 font-bold text-lg text-center">
                                            {{ __('No services found.') }}
                                        </td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                    
                </div>


        </div>
    </div>
</x-app-layout>
