<x-layout>
    <section class="py-8 max-w-md mx-auto">
        <h1 class="text-lg font-bold">
            Publish New Post
        </h1>
        <form action="/admin/posts"
              method="post"
              enctype="multipart/form-data"
        >
            @csrf
            <div class="border border-gray-200 p-6 rounded-xl">
                <div class="mb-6 space-y-4">
                    <x-form.input name="title"/>

                    <x-form.input name="slug"/>
                    <x-form.input name="thumbnail" type="file"/>
                    <x-form.textarea name="excerpt"/>
                    <x-form.textarea name="body" rows="10"/>
                    <x-form.select name="Categories" />


                    <x-basic-button>Publish</x-basic-button>
                </div>
            </div>
        </form>
    </section>
</x-layout>