@props(['user'])
<div class="bg-gray-100 rounded-md shadow-lg mt-2 mb-2">
    @php
        $tweets = $user->tweets()->get();
    @endphp
    <details class="rounded-md border-2 border-gray-400">
        {{-- <summary class="p-1 pl-4 bg-blue-200 rounded-md"> --}}
        <summary class="p-1 pl-4 bg-gray-200 rounded-md text-slate-800">
            つぶやき一覧
        </summary>
        @if (count($tweets) === 0)
            <p class="text-red-400 p-4 flex items-start justify-between">
                つぶやきが見つかりません
            </p>
        @else
        <ul>
        @foreach ($tweets as $tweet)
            <li class="border-b last:border-b-0 border-gray-200 p-4 flex items-start justify-between">
                <div class="text-gray-600">
                    {!! nl2br(e($tweet->content)) !!}
                </div>
                <div>
                    <x-admin.tweet.options :tweetId="$tweet->id" :userId="$tweet->user_id">
                    </x-admin.tweet.options>
                </div>
            </li>
        @endforeach
        </ul>
        @endif
    </details>
</div>
