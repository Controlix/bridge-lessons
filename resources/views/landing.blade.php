<x-layout title="Bridge Lessons - Learn to Play Bridge">
    <div class="mb-12">
        <h1 class="text-3xl font-medium mb-3 text-gray-900 dark:text-gray-100">Learn to Play Bridge</h1>
        <p class="text-gray-600 dark:text-gray-400 text-lg">Master the world's most popular card game with interactive lessons.</p>
    </div>

    <section>
        <h2 class="text-xl font-medium mb-6 text-gray-900 dark:text-gray-100">Get Started</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($lessons as $lesson)
                <x-lesson-card
                    :title="$lesson['title']"
                    :description="$lesson['description']"
                    :url="route('lesson.show', ['slug' => $lesson['slug']])"
                />
            @endforeach
        </div>
    </section>
</x-layout>