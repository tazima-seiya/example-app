@props([
    'users'
])
<div>
    <ul>
        @foreach ($users as $user)
            <li>
                <h3>
                    {{ $user->name . " | " . $user->email }}
                </h3>
                <div>
                    @if($user->role === 1)
                    <div>
                        <a href="{{ route('user.update.index', ['userId' => $user->id]) }}">
                            編集
                        </a>
                    </div>
                    <div>
                        <form action="{{ route('user.delete', ['userId' => $user->id]) }}"
                            method="POST" onclick="return confirm('削除してもよろしいでしょうか？');">
                            @method('DELETE')
                            @csrf
                            <button type="submit">
                                削除
                            </button>
                        </form>
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
