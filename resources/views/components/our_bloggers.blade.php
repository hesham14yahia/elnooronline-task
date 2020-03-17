<h4 class="text-center">
    <i class="fa fa-users" aria-hidden="true"></i>
    Our Bloggers
</h4>
<ul class="list-group">
    @foreach ($users as $user)
    <li class="list-group-item">
        <a href="#">
            <img data-src="holder.js/50x50" class="img img-circle">
        </a>
        <a href="#">
            {{ $user->name }}
        </a>
    </li>
    @endforeach

</ul>
