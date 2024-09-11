@props([
    'users'
])
<div>
    <ul>
        @foreach ($users as $user)
            <li>
                <div  class="border-gray-200 flex items-start justify-between">
                    <div>
                        {{ $user->name . " | " . $user->email }}
                    </div>
                    @if($user->role === 1)
                    <div>
                        {{-- 編集と削除 --}}
                        <x-user.options :userId="$user->id">
                        </x-user.options>
                    </div>
                    @endif
                </div>
                <div class="bg-white rounded-md shadow-lg mt-5 mb-5">
                    @php
                        $tweets = $user->tweets()->get();
                    @endphp
                    <details>
                        <summary>つぶやき一覧</summary>
                        @if (count($tweets) === 0)
                            <p class="text-red-400">まだつぶやいていません</p>
                        @else
                        <ul>
                        @foreach ($tweets as $tweet)
                            <li  class="border-b last:border-b-0 border-gray-200 p-4 flex items-start justify-between">
                                <div class="text-gray-600">
                                    {!! nl2br(e($tweet->content)) !!}
                                </div>
                            </li>
                        @endforeach
                        </ul>
                        @endif
                    </details>
                </div>
            </li>
        @endforeach
    </ul>
</div>
