@props([
    'users'
])
<div>
    <ul>
        @foreach ($users as $user)
            <li>
                <div class="border-gray-200 flex items-start justify-between">
                    @if($user->role === 1)
                    <div>
                        {{ $user->name . " | " . $user->email }}
                    </div>
                    <div>
                        {{-- 編集と削除 --}}
                        <x-admin.user.options :userId="$user->id">
                        </x-admin.user.options>
                    </div>
                    @else
                    <div>
                        {{ $user->name . " | " . $user->email . " (管理者)"}}
                    </div>
                    @endif
                </div>
                <x-admin.tweet.list :user="$user"/>
            </li>
        @endforeach
    </ul>
</div>
