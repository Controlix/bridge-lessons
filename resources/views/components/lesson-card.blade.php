<a href="{{ $url ?? '#' }}" class="block bg-white dark:bg-gray-900 rounded-lg shadow-[0px_0px_1px_0px_rgba(0,0,0,0.03),0px_1px_2px_0px_rgba(0,0,0,0.06)] dark:shadow-[inset_0px_0px_0px_1px_#fffaed2d] border border-gray-200 dark:border-gray-700 p-6 hover:shadow-md transition-shadow cursor-pointer">
    <div class="flex items-center gap-4 mb-3">
        <div class="flex items-center justify-center w-10 h-10 rounded-full bg-gray-50 dark:bg-gray-900 shadow-[0px_0px_1px_0px_rgba(0,0,0,0.03),0px_1px_2px_0px_rgba(0,0,0,0.06)] border border-gray-200 dark:border-gray-700">
            <svg class="w-4 h-4 text-red-600 dark:text-red-500" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path d="M8 5v14l11-7z"/>
            </svg>
        </div>
        <h3 class="font-medium text-gray-900 dark:text-gray-100">{{ $title }}</h3>
    </div>
    <p class="text-gray-600 dark:text-gray-400 text-sm leading-relaxed">{{ $description }}</p>
</a>