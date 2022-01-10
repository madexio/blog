@auth
    <form action="/posts/{{$post->slug}}/comments"
          class="border-2 border-blue-100 p-6 rounded-xl bg-blue-50"
          method="post">
        @csrf
        <header class="flex items-center">
            <img src="https://i.pravatar.cc/60?u={{auth()->id()}}"
                 class="rounded-xl"
                 alt="">
            <h2 class="ml-4">New comment</h2>

        </header>
        <div class="mt-6">
            <textarea name="body"
                      class="w-full text-sm focus:outline-none focus:ring rounded-l"
                      cols="30"
                      rows="10"
                      placeholder="Insert comment here"
                      required></textarea> @error("body") <span class="text-red-500 text-xs mt-1">{{$message}}</span>
            @enderror
        </div>
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