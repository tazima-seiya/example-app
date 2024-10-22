@auth
<div class="z-10 rounded-md p-4 sticky top-0 max-w-screen-sm w-full bg-gray-50">
    <details class="accordion" open>
        <summary class="text-gray-700 text-center cursor-pointer" style="user-select: none">
            入力欄
        </summary>
        <form class="accordion-body" action="{{ route('tweet.create') }}" method="post">
            @csrf
            <div class="pt-4">
                <textarea name="tweet" rows="3" id="textarea" limit="140"
                    class="focus:ring-blue-400 focus:border-blue-400 mt-1 block w-full sm:text-sm border border-gray-300 rounded-md p-2"
                    placeholder="つぶやきを入力"></textarea>
            </div>
            <div class="flex flex-wrap">
                <p class="mt-2 text-sm text-gray-500">
                    <span id="count">0 / 140文字</span>
                </p>
                <script type="text/javascript">
                    const maxPostLength = 140;
                    const text = " / " + maxPostLength + "文字";
                </script>
                <script type="text/javascript" src="{{ asset('js/text-count.js') }}"></script>

                @error('tweet')
                    <x-alert.error>{{ $message }}</x-alert.error>
                @enderror
            </div>

            <div class="flex flex-wrap justify-end">
                <x-element.button>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="size-5">
                        <path
                            d="M3.105 2.288a.75.75 0 0 0-.826.95l1.414 4.926A1.5 1.5 0 0 0 5.135 9.25h6.115a.75.75 0 0 1 0 1.5H5.135a1.5 1.5 0 0 0-1.442 1.086l-1.414 4.926a.75.75 0 0 0 .826.95 28.897 28.897 0 0 0 15.293-7.155.75.75 0 0 0 0-1.114A28.897 28.897 0 0 0 3.105 2.288Z" />
                    </svg>&nbsp;つぶやく
                </x-element.button>
            </div>
        </form>
    </details>
</div>
@endauth
@guest
<div class="flex flex-wrap justify-center">
    <div class="w-1/2 p-4 flex flex-wrap justify-evenly">
        <x-element.button-a :href="route('login')">ログイン</x-element.button-a>
        <x-element.button-a :href="route('register')" theme="secondary">会員登録</x-element.button-a>
    </div>
</div>
@endguest

@once
@push('css_postForm')
<style>
.accordion > summary {
    list-style: none;
}

.accordion > summary::-webkit-details-marker {
    display: none;
}

.accordion > summary::before {
    font-family: FontAwesome;
    content: '\f067';
    margin-right: 20px;
}

.accordion[open] > summary::before {
    font-family: FontAwesome;
    content: '\f068';
    margin-right: 20px;
}
</style>
@endpush
@endonce
