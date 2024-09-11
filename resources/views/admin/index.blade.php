@can('admin')
<x-layout title="管理者ページ | つぶやきアプリ">
    <x-layout.single>
        <h2 class="text-center text-blue-500 text-4xl font-bold mt-8 mb-8">
            管理者ページ
        </h2>
        <div class="mt-4 mb-4">
            <x-element.button-a :href="route('tweet.index')">
                トップへ
            </x-element.button-a>
        </div>
        <x-user.list :users="$users"></x-user.list>
    </x-layout.single>
</x-layout>
@endcan
