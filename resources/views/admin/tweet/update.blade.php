<x-layout title="編集(管理者) | つぶやきアプリ">
    <x-layout.single>
        <h2 class="text-center text-blue-500 text-4xl font-bold mt-8 mb-8">
            つぶやきアプリ
        </h2>
        @php
            $breadcrumbs = [
                ['href' => route('tweet.index'), 'label' => 'TOP'],
                ['href' => route('admin.tweet.index'), 'label' => '管理者ページ'],
                ['href' => '#', 'label' => 'つぶやき編集（管理者）']
            ];
        @endphp
        <x-element.breadcrumbs :breadcrumbs="$breadcrumbs">
        </x-element.breadcrumbs>
        <x-admin.tweet.form.put :tweet="$tweet"></x-admin.tweet.form.put>
    </x-layout.single>
</x-layout>
