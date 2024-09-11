<div>
    <ul>
        @foreach ($users as $user)
            <li>
                <div>
                    {{ $user->name }}
                </div>
                <div>
                    {{ $user->email }}
                </div>
                <div class="bg-white rounded-md shadow-lg mt-5 mb-5">
                    @php
                        $tweets = $user->tweets()->get();
                    @endphp
                    <ul class="list-disc">
                    @foreach ($tweets as $tweet)
                        <li  class="border-b last:border-b-0 border-gray-200 p-4 flex items-start justify-between">
                            <div class="text-gray-600">
                                {!! nl2br(e($tweet->content)) !!}
                            </div>
                            <div>
                                {{-- 編集と削除 --}}
                                <x-tweet.admin.options :tweetId="$tweet->id" :userId="$tweet->user_id">
                                </x-tweet.admin.options>
                            </div>
                        </li>
                    @endforeach
                    </ul>
                </div>
            </li>
        @endforeach
    </ul>
</div>
