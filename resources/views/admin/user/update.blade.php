<x-layout title="ユーザー編集 | つぶやきアプリ">
    <x-layout.single>
        <h2 class="text-center text-blue-500 text-4xl font-bold mt-8 mb-8">
            つぶやきアプリ
        </h2>
        @php
            $breadcrumbs = [
                ['href' => route('tweet.index'), 'label' => 'TOP'],
                ['href' => route('admin.tweet.index'), 'label' => '管理者ページ'],
                ['href' => '#', 'label' => 'ユーザー情報編集']
            ];
        @endphp
        <x-element.breadcrumbs :breadcrumbs="$breadcrumbs"/>
        <form action="{{ route('admin.user.update.put', ['userId' => $user->id]) }}", method="POST">
            @method('PUT')
            @csrf
            @if (session('feedback.success'))
                <x-alert.success>{{ session('feedback.success') }}</x-alert.success>
            @endif
            <div>
                <label for="name">名前</label>
            </div>
            <input type="text" name="name" id="name"
            class="block w-full"
            placeholder="{{ $user->name }}">
            <div>
                <label for="email">メールアドレス</label>
            </div>
            <input type="email" name="email" id="email"
            class="block w-full"
            placeholder="{{ $user->email }}">

            <x-element.button>
                編集
            </x-element.button>
        </form>
    </x-layout.single>
</x-layout>
