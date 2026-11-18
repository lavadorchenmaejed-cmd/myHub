<x-layout>
    <h1>Welcome to your hub {{ Auth::user()->name }}!</h1>


    

    <div class="profile">
        <form method="POST" action="{{ route('profile.store') }}">
            @csrf

           <h2>Profile</h2>

                @unless (Auth::user()?->profile) 
                   <input type="text" name="last_name" placeholder="Last Name" required>
                   <input type="date" name="birth_date" placeholder="Birthdate" required>
                   <textarea name="bio" placeholder="Bio" required></textarea>
                   <button type="submit">Add Profile</button>
                @endunless

                @if (Auth::user()?->profile)
                    @php 
                        $profile = Auth::user()->profile; 
                    @endphp
                    <div class="profile-card">
                        <div class="avatar">{{ strtoupper(mb_substr($profile->first_name, 0, 1)) }}</div>
                        <div class="profile-info">
                            <h3>{{ $profile->first_name }} {{ $profile->last_name }}</h3>
                            <p>Born on {{ \Carbon\Carbon::parse($profile->birth_date)->format('F j, Y') }}</p>
                            <p class="bio">{{ $profile->bio }}</p>
                        </div>
                    </div>
                @endif
        </form>
    </div>

    <div class="pet">
        <form method="POST" action="{{ route('pet.store') }}">
            @csrf

            <h2>Pets</h2>
            <input type="text" name="name" placeholder="Pet Name" required>
            <input type="text" name="type" placeholder="Pet Type" required>
            <button type="submit">Add Pet</button>

            <table>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Type</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse (Auth::user()?->pets ?? collect() as $pet)
                        <tr>
                            <td>{{ $pet->name }}</td>
                            <td>{{ $pet->type }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="2">No pets yet.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </form>
    </div>

   <div class="business">
    <form method="POST" action="{{ route('business.store') }}">
        @csrf

        <h2>Business</h2>
        <input type="text" name="name" placeholder="Business Name" required>
        <input type="text" name="description" placeholder="Business Description" required>

        <select name="owner_id">
            <option value="">Add another owner (optional)</option>
            @foreach (\App\Models\User::where('id', '!=', Auth::id())->orderBy('name')->get() as $user)
                <option value="{{ $user->id }}">{{ $user->name }} ({{ $user->username }})</option>
            @endforeach
        </select>

        <button type="submit">Add Business</button>

        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Owners</th>
                </tr>
            </thead>
            <tbody>
                @forelse (Auth::user()?->businesses()->with('users')->get() ?? collect() as $business)
                    <tr>
                        <td>{{ $business->name }}</td>
                        <td>{{ $business->description }}</td>
                        <td>{{ $business->users->pluck('name')->join(', ') }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3">No businesses yet.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </form>
</div>
</x-layout>
