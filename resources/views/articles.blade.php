<x-app-layout>
    <!-- Main Content -->
    <div class="w-full p-4 mx-auto flex ">
        <div class="mx-auto sm:px-6 lg:px-8  pb-32 flex flex-col  items-center">
            <div class=" pl-[16px] pb-12 pt-12 text-[color:#332C2B] font-rubik font-black text-[50px] flex  mt-[22px]">
                {{ __('Article') }}
            </div>

            <div class="grid grid-cols-3 gap-4">
                @foreach($articles as $article)
                <div class="relative max-w-sm bg-white shadow m-4 flex flex-col">
                    <a href="{{ route('articles.show', $article) }}">
                        @if($article->image)
                            <img class="p-4" src="{{ Storage::url($article->image) }}" alt="{{ $article->title }}" />
                        @endif
                    </a>
                    <div class="p-5 flex-grow">
                        <p class="font-rubik text-lg text-[color:#FD507E]">{{ $article->category }}</p> <!-- Add this line -->
                        <a href="{{ route('articles.show', $article) }}">
                            <h5 class="mb-2 font-rubik text-2xl font-semibold tracking-tight text-black">{{ $article->title }}</h5>
                        </a>
                        <p class="font-inter text-[color:#6A6A6A] text-sm line-clamp-2">{{ $article->content }}</p>
                        <hr class="h-px mt-4 mb-6 bg-gray-200 -0">
                        <div class="absolute bottom-0 left-0 right-0 p-5">
                            <p class="font-inter text-[color:#6A6A6A] text-sm">by {{ $article->author }}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <!-- Display pagination links -->
            {{ $articles->links() }}
        </div>
    </div>
</x-app-layout>
