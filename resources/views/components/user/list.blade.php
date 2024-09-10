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
                <div>
                    @php
                        $tweets = $user->tweets()->get();
                    @endphp
                    <ul class="list-disc">
                    @foreach ($tweets as $tweet)
                        <li>
                            {!! nl2br(e($tweet->content)) !!}
                        </li>
                    @endforeach
                    </ul>
                </div>
            </li>
        @endforeach
    </ul>
</div>
