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
            <div class="m-1 mb-4 text-slate-700">
                <label for="name" class="inline-block flex">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 15" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
                    </svg>&nbsp;名前
                </label>
                <input type="text" name="name" id="name"
                class="focus:ring-blue-400 focus:border-blue-400 mt-1 block
                    w-full sm:text-sm border border-gray-300 rounded-md p-2"
                placeholder="{{ $user->name }}">
            </div>
            <div class="m-1 text-slate-700">
                <label for="email" class="inline-block flex">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 15" fill="currentColor">
                        <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
                        <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
                    </svg>&nbsp;メールアドレス
                </label>
                <input type="email" name="email" id="email"
                class="focus:ring-blue-400 focus:border-blue-400 mt-1 block
                    w-full sm:text-sm border border-gray-300 rounded-md p-2"
                placeholder="{{ $user->email }}">
            </div>
            <div class="mt-4 flex flex-wrap justify-end">
                <x-element.button>
                    編集
                </x-element.button>
            </div>
        </form>
    </x-layout.single>
</x-layout>
