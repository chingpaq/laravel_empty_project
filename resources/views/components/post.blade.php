
<div class="mb-4">
    <a href="{{ route('users.posts', $post->user) }}" class="font-bold">{{ $post->user->name }}</a>
    <span class="text-gray-600 text-sm"> {{ $post->created_at->isoFormat('MMM DD YYYY, ddd hh:MM') }}</span>

    <p class="mb-2">{{ $post->body }}</p>


    @can('delete', $post)
        <form action="{{ route('posts.destroy', $post) }}" method="post" class="mr-5">
            @csrf
            @method('DELETE')
            <button type="submit" class="text-blue-500">Delete</button>
        </form>
    @endcan

    <div class="flex items-center">
        @auth
            <form action="{{ route('post.likes', $post) }}" method="post" class="mr-5">
                @csrf
                <button type="submit" @if ($post->likedBy(auth()->user())) disabled class="text-red-500"
                        @else class="text-blue-500"
                    @endif >Like</button>
            </form>
            <form action="{{ route('post.likes', $post) }}" method="post" class="mr-5">
                @csrf
                @method('DELETE')
                <button type="submit" class="text-blue-500">Unlike</button>
            </form>
        @endauth
        <span>{{ $post->likes->count() }} {{ Str::plural('like', $post->likes->count()) }}</span>
    </div>
</div>

