<h1>ADMINISTRAATOR: {{  auth()->user()->name  }}</h1>
{{-- mapagal amg code kaya tigcopy ko lng so sako --}}
<a href="{{ route('auth.logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> Logout
</a>
<form id="logout-form" action="{{ route('auth.logout') }}" method="POST" >
    @csrf
</form>