@auth
    <form action="/posts/{{$post->slug}}/comments"
          class="border-2 border-blue-100 p-6 rounded-xl bg-blue-50 space-y-3"
          method="post">
        @csrf
        <header class="flex items-center">
            <img src="https://i.pravatar.cc/60?u={{auth()->id()}}"
                 class="rounded-xl"
                 alt="">
            <h2 class="ml-4">New comment</h2>
        </header>
        <x-form.textarea name="body" rows="4" placeholder="Comment"/>
        <div class="flex justify-end mt-2">
            <x-basic-button>
                Post
            </x-basic-button>
        </div>
    </form>
@else
    <div class="flex space-x-3">
        <form action="/login"
              method="get">

            <x-basic-button>
                Log in to comment
            </x-basic-button>

        </form>
        <form action="/register"
              method="get">

            <x-basic-button>
                Register to comment
            </x-basic-button>

        </form>
    </div>
@endauth
@foreach($post->comments as $comment)
    <x-post-comment :comment="$comment"/>
@endforeach