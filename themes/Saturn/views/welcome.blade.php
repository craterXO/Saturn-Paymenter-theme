<x-app-layout title="home">
    <x-success class="mt-4" />
    @if (config('settings::home_page_text'))
    <div class="relative">
        <img src="{{ asset('img/welcomeIMG.png') }}" alt="Welcome Banner" class="w-full h-auto max-h-[800px] lg:max-h-[600px] object-cover">
        
        <div class="absolute inset-0 flex flex-col items-start justify-start text-white px-4 sm:px-8 md:px-16 py-[50px] sm:py-[100px] md:py-[150px]">
            <h1 class="text-[24px] sm:text-[30px] lg:text-[60px] font-regular font-opensans mb-2 sm:mb-4">@markdownify(config('settings::home_page_text'))</h1>
            <p class="text-[16px] sm:text-[18px] md:text-[20px] font-regular font-opensans">
                Create the perfect Dream Project with our <span class="hidden sm:inline"><br></span> Premium Services
            </p>
            <a href="{{ route('clients.home') }}" class="mt-4 sm:mt-6 px-6 sm:px-8 py-3 sm:py-4 bg-blue-600 hover:bg-blue-700 rounded-lg text-[14px] sm:text-[16px]">
                Get Started
            </a>
        </div>
        <div class="relative flex justify-start items-start flex-col px-[130px] pt-8">
            <h2 class="text-[40px] font-regular font-opensans mb-4">How can we help today?</h2>
            <div class="flex flex-col lg:flex-row gap-12">
                <a href="{{ App\Models\Category::whereNull('category_id')
                    ->whereHas('products', function($query) {
                        $query->where('hidden', false);
                    })
                    ->orderBy('order')
                    ->first()
                    ?->slug 
                    ? route('products', App\Models\Category::whereNull('category_id')
                        ->whereHas('products', function($query) {
                            $query->where('hidden', false);
                        })
                        ->orderBy('order')
                        ->first()->slug)
                    : '#' }}" 
                    class="flex flex-col items-center justify-center mt-6 px-8 py-4 bg-zinc-800/40 border-2 border-zinc-800 hover:border-blue-600 transition-all rounded-lg w-[270px] h-[180px] font-opensans font-normal text-[20px] text-white">
                    Order New Service
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-[80px] h-auto text-white py-4">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m21 7.5-2.25-1.313M21 7.5v2.25m0-2.25-2.25 1.313M3 7.5l2.25-1.313M3 7.5l2.25 1.313M3 7.5v2.25m9 3 2.25-1.313M12 12.75l-2.25-1.313M12 12.75V15m0 6.75 2.25-1.313M12 21.75V19.5m0 2.25-2.25-1.313m0-16.875L12 2.25l2.25 1.313M21 14.25v2.25l-2.25 1.313m-13.5 0L3 16.5v-2.25" />
                    </svg>
                </a>
                <a href="{{ route('clients.home') }}" class="flex flex-col items-center justify-center mt-6 px-4 py-4 bg-zinc-800/40 border-2 border-zinc-800 hover:border-blue-600 transition-all rounded-lg w-[270px] h-[180px] font-opensans font-normal text-[20px] text-white">
                    Manage Your Services
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-[80px] h-auto text-white py-4">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 8.25h19.5M2.25 9h19.5m-16.5 5.25h6m-6 2.25h3m-3.75 3h15a2.25 2.25 0 0 0 2.25-2.25V6.75A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25v10.5A2.25 2.25 0 0 0 4.5 19.5Z" />
                    </svg>
                </a>
                <a href="{{ route('clients.tickets.index') }}" class="flex flex-col items-center justify-center mt-6 px-8 py-4 bg-zinc-800/40 border-2 border-zinc-800 hover:border-blue-600 transition-all rounded-lg w-[270px] h-[180px] font-opensans font-normal text-[20px] text-white">
                    Get Support
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-[80px] h-auto text-white py-4">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M7.5 8.25h9m-9 3H12m-9.75 1.51c0 1.6 1.123 2.994 2.707 3.227 1.129.166 2.27.293 3.423.379.35.026.67.21.865.501L12 21l2.755-4.133a1.14 1.14 0 0 1 .865-.501 48.172 48.172 0 0 0 3.423-.379c1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0 0 12 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018Z" />
                    </svg>
                </a>
            </div>
        </div>
    </div>
    @endif

    @if ($announcements->count() > 0)
        <div class="relative px-[130px]">
            <h2 class="font-semibold text-2xl mb-2 pt-20">{{ __('News & Updates') }}</h2>
            <div class="grid grid-cols-1 gap-4 pt-10">
                @foreach ($announcements->sortByDesc('created_at') as $announcement)
                    <div class="lg:col-span-1 md:col-span-1 col-span-1 ">
                        <div class="w-full h-[200px] bg-zinc-800/50 p-10 rounded-lg">
                            <h3 class="font-semibold text-lg">{{ $announcement->title }}</h3>
                            <div class="prose dark:prose-invert">@markdownify(strlen($announcement->announcement) > 100 ? substr($announcement->announcement, 0, 100) . '...' : $announcement->announcement)</div>
                            <div class="flex justify-between items-center mt-3">
                                <span class="text-sm text-secondary-600">{{ __('Published') }}
                                    {{ $announcement->created_at->diffForHumans() }}</span>
                                <a href="{{ route('announcements.view', $announcement->id) }}"
                                    class="button px-4 py-2 bg-zinc-900/50 border-2 border-zinc-800 hover:border-blue-600 transition-all rounded-lg">{{ __('Read More') }}</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endif

</x-app-layout>