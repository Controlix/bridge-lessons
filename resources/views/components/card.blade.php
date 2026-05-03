@props(['rank', 'suit'])

<span class="inline-flex items-center px-2 py-1 bg-white dark:bg-[#2a2a28] border border-[#e3e3e0] dark:border-[#3E3E3A] rounded shadow-sm text-lg font-medium mr-1 gap-0.5">
    <span class="text-[#1b1b18] dark:text-[#EDEDEC]">{{ $rank }}</span><x-suit :type="$suit" />
</span>
