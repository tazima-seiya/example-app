<x-layout title="管理者ページ | つぶやきアプリ">
    <x-layout.single>
        <h2 class="text-center text-blue-500 text-4xl font-bold mt-8 mb-8">
            管理者ページ
        </h2>
        <x-user.list :users="$users"></x-user.list>
    </x-layout.single>
</x-layout>
