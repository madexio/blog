<x-layout>
    <section class="px-6 py-8">
        <form action="/admin/posts"
              method="post">
            @csrf
            <div class="border border-gray-200 p-6 rounded-xl max-w-md mx-auto">
                <div class="mb-6 space-y-4">
                    <div>
                        <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                               for="title">
                            Title
                        </label>
                        <input class="border border-gray-400 p-2 w-full"
                               type="text"
                               name="title"
                               id="title"
                               value="{{old('title')}}"
                               required>

                        @error("title")
                        <p class="text-red-500 text-xs mt-2">{{$message}}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                               for="slug">
                            Slug
                        </label>
                        <input class="border border-gray-400 p-2 w-full"
                               type="text"
                               name="slug"
                               id="slug"
                               value="{{old('slug')}}"
                               required>

                        @error("slug")
                        <p class="text-red-500 text-xs mt-2">{{$message}}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block uppercase font-bold text-xs text-gray-700"
                               for="excerpt">
                            Excerpt
                        </label>
                        <textarea class="border border-gray-400 p-2 w-full"
                                  name="excerpt"
                                  id="excerpt"
                                  rows="2"

                                  required>{{old("excerpt")}}</textarea>
                        @error("excerpt")
                        <p class="text-red-500 text-xs mt-2">{{$message}}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block uppercase font-bold text-xs text-gray-700"
                               for="body">
                            Body
                        </label>
                        <textarea class="border border-gray-400 p-2 w-full"
                                  name="body"
                                  id="body"
                                  rows="10"
                                  required>{{old("body")}}</textarea>
                        @error("body")
                        <p class="text-red-500 text-xs mt-2">{{$message}}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block uppercase font-bold text-xs text-gray-700"
                               for="category_id">
                            Category
                        </label>

                        <select name="category_id"
                                id="category_id">
                            @php
                                $categories = \App\Models\Category::all();
                            @endphp
                            @foreach($categories as $category)
                                <option value="{{$category->id}}" {{old("category_id") == $category->id ? "selected" : ""}}>{{ucwords($category->name)}}</option>
                            @endforeach
                        </select>

                        @error("category_id")
                        <p class="text-red-500 text-xs mt-2">{{$message}}</p>
                        @enderror
                    </div>

                    <x-basic-button>Publish</x-basic-button>
                </div>
            </div>
        </form>
    </section>
</x-layout>