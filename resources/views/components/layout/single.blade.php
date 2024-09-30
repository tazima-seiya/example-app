<div class="flex justify-center">
    <div class="max-w-screen-sm w-full">
        @auth
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <div class="flex justify-between p-4">
                <div class="flex justify-start py-4">
                    @php
                        $isAdmin = Request::user()->role === 10;
                        $isNormalPage = str_starts_with(Request::route()->getName(), "tweet");
                    @endphp
                    @if ($isAdmin && $isNormalPage)
                        <x-element.button-a : href="{{ route('admin.tweet.index') }}" : theme="green">
                            管理者
                        </x-element.button-a>
                    @endif
                </div>
                <button
                    class="justify-end mt-2 text-sm text-gray-500 hover-text-gray-800"
                    onclick="event.preventDefault(); this.closest('form').submit();"
                >ログアウト</button>
            </div>
        </form>
        @endauth

        {{ $slot }}
    </div>
</div>
