@props([
    'tweets' => []
])
<div class="rounded-md shadow-lg mt-5 mb-5">
    <ul>
        @foreach ($tweets as $tweet)
        @php
        $isEven = $loop->index % 2 === 0;
        $tweetBgColorStyle = $isEven ? 'bg-white' : 'bg-indigo-50';
        @endphp
        <li class="border-b last:border-b-0 border-gray-200 p-4 flex items-start justify-between {{ $tweetBgColorStyle }}">
            <div>
                <span class="inline-block rounded-full text-gray-600 bg-emerald-100 px-2 py-1 text-xs mb-2">
                    <div class="flex">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                          </svg>&nbsp;{{ $tweet->user->name }}
                        |&nbsp;<svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                          </svg>&nbsp;{{ $tweet->updated_at }}
                    </div>
                </span>
                <p class="text-gray-600" style="overflow-wrap: anywhere;">
                    {!! nl2br(e($tweet->content)) !!}
                </p>
            </div>
            <div>
                {{-- 編集と削除 --}}
                <x-tweet.options :tweetId="$tweet->id" :userId="$tweet->user_id">
                </x-tweet.options>
            </div>
        </li>
        @endforeach
    </ul>
</div>
