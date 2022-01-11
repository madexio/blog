<x-layout>
    <x-setting :heading="'Edit ' . $post->title">
        <form action="/admin/posts/{{ $post->id }}"
              method="post"
              enctype="multipart/form-data"
        >
            @csrf
            @method("PATCH")
            <div>
                <div class="mb-6 space-y-4">
                    <x-form.input name="title"
                                  :value="old('title', $post->title)"/>
                    <x-form.input name="slug"
                                  :value="old('slug', $post->slug)"/>
                    <div class="flex mt-6">
                        <div class="flex-1 mr-2">
                            <x-form.input name="thumbnail"
                                          type="file"
                                          :value="old('thumbnail', $post->thumbnail)"/>
                        </div>

                        <img src="{{asset("storage/" . $post->thumbnail)}}"
                             alt=""
                             class="rounded-xl"
                             width=100>
                    </div>

                    <x-form.textarea name="excerpt">{{old('excerpt', $post->excerpt)}}</x-form.textarea>
                    <x-form.textarea name="body"
                                     rows="10">{{old('body', $post->body)}}</x-form.textarea>
                    <x-form.select name="Categories"
                                   :post=$post/>

                        <x-basic-button>Publish</x-basic-button>
                </div>
            </div>
        </form>
    </x-setting>

</x-layout>