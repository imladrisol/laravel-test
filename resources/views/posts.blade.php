<x-layout>
    @foreach ($posts as $post)
        <article class="{{ $loop->even ? 'foobar' : '' }}">
            <a href="post/{{ $post->slug }}">
                <h1>{{ $post->title }}</h1>

                <p>
                    <a href="#">{{ $post->category->name }}</a>
                </p>
            </a>
            <div>
                {{ $post->excerpt }}
            </div>
        </article>
    @endforeach
</x-layout>
