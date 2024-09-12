<x-layout title="ユーザー編集(管理者) | つぶやきアプリ">
    <x-layout.single>
        <h2 class="text-center text-blue-500 text-4xl font-bold mt-8 mb-8">
            つぶやきアプリ
        </h2>
        @php
            $breadcrumbs = [
                ['href' => route('tweet.index'), 'label' => 'TOP'],
                ['href' => route('admin.tweet.index'), 'label' => '管理者ページ'],
                ['href' => '#', 'label' => 'ユーザー情報編集（管理者）']
            ];
        @endphp
        <x-element.breadcrumbs :breadcrumbs="$breadcrumbs"/>
        <form action="{{ route('admin.user.update.put', ['userId' => $user->id]) }}", method="POST">
            @method('PUT')
            @csrf
            @if (session('feedback.success'))
                <x-alert.success>{{ session('feedback.success') }}</x-alert.success>
            @endif
            <div class="m-1 mb-4">
                <label for="name">名前</label>
                <input type="text" name="name" id="name"
                class="focus:ring-blue-400 focus:border-blue-400 mt-1 block
                    w-full sm:text-sm border border-gray-300 rounded-md p-2"
                placeholder="{{ $user->name }}">
            </div>
            <div class="m-1">
                <label for="email">メールアドレス</label>
            </div>
            <input type="email" name="email" id="email"
            class="focus:ring-blue-400 focus:border-blue-400 mt-1 block
                w-full sm:text-sm border border-gray-300 rounded-md p-2"
            placeholder="{{ $user->email }}">

            <div class="mt-4 flex flex-wrap justify-end">
                <x-element.button>
                    編集
                </x-element.button>
            </div>
        </form>
    </x-layout.single>
</x-layout>
