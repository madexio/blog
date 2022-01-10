<x-layout>
    <section class="px-6 py-8">

        <main class="max-w-6xl mx-auto mt-10 lg:mt-20 space-y-6">
            <article class="max-w-4xl mx-auto lg:grid lg:grid-cols-12 gap-x-10">
                {{--Post details--}}
                <div class="col-span-4 lg:text-center lg:pt-14 mb-10">
                    <img src="/images/illustration-1.png"
                         alt=""
                         class="rounded-xl">

                    <p class="mt-4 block text-gray-400 text-xs">
                        <time>{{$post->created_at->diffForHumans()}}</time>
                    </p>

                    <div class="flex items-center lg:justify-center text-sm mt-4">
                        <img src="https://i.pravatar.cc/60?u={{$post->user_id}}"
                             class="rounded-xl"
                             alt="">
                        <div class="ml-3 text-left">
                            <strong><a href="/?authors={{$post->author->username}}">{{$post->author->name}}</a></strong>
                        </div>
                    </div>
                </div>
                {{--Back to posts--}}
                <div class="col-span-8">
                    <div class="hidden lg:flex justify-between mb-6">
                        <a href="/"
                           class="transition-colors duration-300 relative inline-flex items-center text-lg hover:text-blue-500">
                            <svg width="22"
                                 height="22"
                                 viewBox="0 0 22 22"
                                 class="mr-2">
                                <g fill="none"
                                   fill-rule="evenodd">
                                    <path stroke="#000"
                                          stroke-opacity=".012"
                                          stroke-width=".5"
                                          d="M21 1v20.16H.84V1z">
                                    </path>
                                    <path class="fill-current"
                                          d="M13.854 7.224l-3.847 3.856 3.847 3.856-1.184 1.184-5.04-5.04 5.04-5.04z">
                                    </path>
                                </g>
                            </svg>

                            Back to Posts
                        </a>

                        <div class="space-x-2">
                            <x-category-button :category="$post->category"/>
                        </div>
                    </div>

                    <h1 class="font-bold text-3xl lg:text-4xl mb-10">
                        {{$post->title}}
                    </h1>

                    <div class="space-y-4 lg:text-lg leading-loose">
                        {!! $post->body !!}
                    </div>
                </div>
                {{--Comments--}}
                <section class="col-span-8 col-start-5 mt-10 space-y-6">
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
                                          placeholder="Insert comment here"></textarea>
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
                </section>
            </article>
        </main>
    </section>
</x-layout>
