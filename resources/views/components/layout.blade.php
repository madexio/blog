<!doctype html>

<title>Laravel From Scratch Blog</title>
<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css"
      rel="stylesheet">
<link rel="preconnect"
      href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap"
      rel="stylesheet">
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js"
        defer></script>

<style>
    html {
        scroll-behavior: smooth;
    }
</style>

<body style="font-family: Open Sans, sans-serif">
    <section class="px-6 py-8">
        {{--Header--}}
        <nav class="md:flex md:justify-between md:items-center">
            <div>
                <a href="/">
                    <img src="/images/logo.svg"
                         alt="Laracasts Logo"
                         width="165"
                         height="16">
                </a>
            </div>

            <div class="mt-8 md:mt-0 flex items-center space-x-2">
                @auth
                    <x-dropdown>
                        <x-slot name="trigger">
                            <x-basic-button class="text-xs font-bold uppercase"> Welcome back, {{auth()->user()->name}}
                            </x-basic-button>
                        </x-slot>
                        @admin
                            <x-dropdown-item href="/admin/posts/create"
                                             :active="request()->is('admin/posts/create')">New Post
                            </x-dropdown-item>
                            <x-dropdown-item href="/admin/posts"
                                             :active="request()->is('admin/posts')">Edit Posts
                            </x-dropdown-item>
                        @endadmin
                        <x-dropdown-item href="#"
                                         x-data="{}"
                                         @click.prevent="document.querySelector('#logout-form').submit()">Log out
                        </x-dropdown-item>
                        <form id="logout-form"
                              action="/logout"
                              method="post"
                              class="hidden">
                            @csrf
                        </form>
                    </x-dropdown>

                @else
                    <form action="/register"
                          method="get">
                        @csrf
                        <x-basic-button>
                            Register
                        </x-basic-button>
                    </form>
                    <form action="/login"
                          method="get">
                        @csrf
                        <x-basic-button>
                            Log In
                        </x-basic-button>
                    </form>
                @endauth

                <a href="#newsletter"
                   class="bg-blue-500 rounded-full text-xs font-semibold text-white uppercase py-3 px-5">
                    Subscribe for Updates
                </a>
            </div>
        </nav>

        {{$slot}}
        {{--Footer--}}
        <footer id="newsletter"
                class="bg-gray-100 border border-black border-opacity-5 rounded-xl text-center py-16 px-10 mt-16">
            <img src="/images/lary-newsletter-icon.svg"
                 alt=""
                 class="mx-auto -mb-6"
                 style="width: 145px;">
            <h5 class="text-3xl">Stay in touch with the latest posts</h5>
            <p class="text-sm mt-3">Promise to keep the inbox clean. No bugs.</p>

            <div class="mt-10">
                <div class="relative inline-block mx-auto lg:bg-gray-200 rounded-full">

                    <form method="POST"
                          action="/newsletter"
                          class="lg:flex text-sm">
                        @csrf
                        <div class="lg:py-3 lg:px-5 flex items-center">
                            <label for="email"
                                   class="hidden lg:inline-block">
                                <img src="/images/mailbox-icon.svg"
                                     alt="mailbox letter">
                            </label>

                            <div>
                                <input id="email"
                                       name="email"
                                       type="text"
                                       placeholder="Your email address"
                                       class="lg:bg-transparent py-2 lg:py-0 pl-4 focus-within:outline-none">
                                @error("email")
                                <span class="text-red-500 text-xs mt-1">{{$message}}</span>
                                @enderror
                            </div>
                        </div>

                        <button type="submit"
                                class="transition-colors duration-300 bg-blue-500 hover:bg-blue-600 mt-4 lg:mt-0 lg:ml-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-8"
                        >
                            Subscribe
                        </button>
                    </form>
                </div>
            </div>
        </footer>
    </section>

    <x-flash/>
</body>
