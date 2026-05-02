<a href="{{ $url ?? '#' }}" class="block bg-white dark:bg-[#161615] rounded-lg shadow-[0px_0px_1px_0px_rgba(0,0,0,0.03),0px_1px_2px_0px_rgba(0,0,0,0.06)] dark:shadow-[inset_0px_0px_0px_1px_#fffaed2d] border border-[#e3e3e0] dark:border-[#3E3E3A] p-6 hover:shadow-md transition-shadow cursor-pointer">
    <div class="flex items-center gap-4 mb-3">
        <div class="flex items-center justify-center w-10 h-10 rounded-full bg-[#FDFDFC] dark:bg-[#161615] shadow-[0px_0px_1px_0px_rgba(0,0,0,0.03),0px_1px_2px_0px_rgba(0,0,0,0.06)] border border-[#e3e3e0] dark:border-[#3E3E3A]">
            <svg class="w-4 h-4 text-[#f53003] dark:text-[#FF4433]" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path d="M8 5v14l11-7z"/>
            </svg>
        </div>
        <h3 class="font-medium text-[#1b1b18] dark:text-[#EDEDEC]">{{ $title }}</h3>
    </div>
    <p class="text-[#706f6c] dark:text-[#A1A09A] text-sm leading-relaxed">{{ $description }}</p>
</a>