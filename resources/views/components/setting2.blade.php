@props(['heading'])

<section class="max-w-4xl mx-auto mt-6">
    <h1 class="text-lg font-bold mb-8 pb-2 border-b">{{ $heading }}</h1>

    <div class="flex">
        <main class="flex-1">
            <x-panel>
                {{$slot}}
            </x-panel>
        </main>
    </div>
</section>