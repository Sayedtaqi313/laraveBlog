@props(['categories'])

<div class="side">
    <h3 class="sidebar-heading">Categories</h3>
    <div class="block-24">
        <ul>

            @foreach ($categories as $category)
                <li><a
                        href="{{ route('category.show',$category->slug) }}">{{ $category->name }}<span>{{ $category->posts_count }}</span></a>
                </li>
            @endforeach
        </ul>
    </div>
</div>