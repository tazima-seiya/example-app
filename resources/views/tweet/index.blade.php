<x-layout title="TOP | つぶやきアプリ">
    <x-layout.single>
        @can('admin')
            <x-element.button-a : href="{{ route('tweet.admin.index') }}">
                管理者
            </x-element.button-a>
        @endcan
        <h2 class="text-center text-blue-500 text-4xl font-bold mt-8 mb-8">
            つぶやきアプリ
        </h2>
        <x-tweet.form.post></x-tweet.form.post>
        <x-tweet.list :tweets="$tweets"></x-tweet.list>
    </x-layout.single>
</x-layout>
