@section('title')
    USER
@endsection



<div>
    <h1>USER</h1>

    @if (Auth::user())

        <!-- Authentication -->
        <form method="POST" action="{{ route('logout') }}" x-data>
            @csrf

            <x-dropdown-link href="{{ route('logout') }}"
                             @click.prevent="$root.submit();">
                {{ __('Log Out') }}
            </x-dropdown-link>
        </form>
    @endif
</div>
