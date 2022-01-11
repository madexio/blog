@props(["heading"])
<section class="py-8 max-w-4xl mx-auto">

    <h1 class="text-lg font-bold border-b mb-6">
        {{$heading}}
    </h1>
    <div class="lg:grid lg:grid-cols-6">
        <div>
            <h4 class="font-semibold mb-2">Links</h4>

            <ul>
                <li>
                    <a href="/admin/posts/create" class="{{request()->is('admin/posts/create') ? 'text-blue-500' : ''}}">New Post</a>
                </li>
            </ul>
        </div>
        <main class="col-span-5">
            <div class="border border-gray-200 bg-gray-100 p-6 rounded-xl">
                {{$slot}}
            </div>
        </main>
    </div>
</section>