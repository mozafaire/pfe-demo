home

<a href="{{route('reviewer.logout')}}" onclick="event.preventDefault();document.getElementById('logout.form').submit()">logout</a>
<form action="{{route('reviewer.logout')}}" id="logout.form" method="POST">
    @csrf
</form>

