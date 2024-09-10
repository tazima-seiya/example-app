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
            </li>
        @endforeach
    </ul>
</div>
