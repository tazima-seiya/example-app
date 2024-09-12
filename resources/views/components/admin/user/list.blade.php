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
                        <x-admin.user.options :userId="$user->id">
                        </x-admin.user.options>
                    </div>
                    @endif
                </div>
                <x-admin.tweet.list :user="$user"/>
            </li>
        @endforeach
    </ul>
</div>
