<x-app-layout>
    <!-- Back Button -->
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-24">
        <button id="backBtn"
            class="ml-2 bg-[#FFEAEA] text-pink-500 flex items-center border border-[#FD507E] rounded-full px-5 py-3 hover:bg-pink-100">
            <svg class="w-6 h-6 mr-2 text-[#FD507E]" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                viewBox="0 0 14 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                    d="M10 5H1m0 0 4 4M1 5l4-4" />
            </svg>
            <span class="text-[#FD507E] text-lg font-rubik">Back</span>
        </button>
    </div>

    <!-- Main Content -->
    <div class="flex max-w-7xl mx-auto sm:px-6 lg:px-8 py-6">
        <div class="w-3/4 flex items-center mx-auto overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 items-center border-b border-gray-200">
                <!-- Article Content -->
                <div class="mb-8">
                    <h1 class="font-rubik text-4xl font-bold text-[color:#332C2B] mb-2">{{ $article->title }}</h1>
                    <p class="font-inter text-lg text-[color:#FD507E] mb-4">{{ $article->created_at->format('j F Y') }}
                        · by {{ $article->author }}</p>
                    @if ($article->image)
                        <img class="w-full mb-6" src="{{ Storage::url($article->image) }}"
                            alt="{{ $article->title }}" />
                    @endif
                    <div class="font-inter text-[color:#6A6A6A] text-lg text-justify">
                        {!! nl2br(e($article->content)) !!}
                    </div>
                </div>

                <!-- Comments Section or CTA -->
                <div class="mt-8">
                    @auth
                        <h2 class="text-2xl font-semibold mb-4">Comment</h2>
                        <form action="{{ route('comments.store', $article) }}" method="POST">
                            @csrf
                            <div class="mb-4">
                                <input type="text" name="content" class="w-full p-3 border border-gray-300 rounded"
                                    placeholder="Write a comment...">
                            </div>
                            <button type="submit" class="px-4 py-2 bg-pink-500 text-white rounded">Submit</button>
                        </form>

                        <!-- Example Comments -->
                        <div class="space-y-4 mt-12" id="commentContainer">
                            @foreach ($article->comments->take(4) as $comment)
                                <div class="flex items-start space-x-4">
                                    <img src="{{ $comment->user->picture ? Storage::url($comment->user->picture) : 'https://via.placeholder.com/40' }}"
                                        alt="User avatar" class="w-10 h-10 rounded-full">
                                    <div class="flex-1">
                                        <div class="bg-gray-100 p-4 rounded-lg">
                                            <div class="font-bold">{{ $comment->user->username }}</div>
                                            <p class="text-gray-700">{{ $comment->content }}</p>
                                        </div>
                                        <div class="mt-2 text-sm text-gray-500 flex items-center space-x-4">
                                            <span>{{ $comment->created_at->diffForHumans() }}</span>
                                            <button class="text-pink-500 hover:text-pink-700">Reply</button>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            <!-- More comments ... -->
                        </div>

                        <!-- Show More Button -->
                        <div class="mt-8 text-center" id="showMoreContainer">
                            <button id="showMoreBtn"
                                class="px-6 py-2 bg-pink-500 text-white font-semibold rounded-full hover:bg-pink-700">Show
                                more</button>
                        </div>
                    @endauth

                    @guest
                        <div class="text-center py-8 border border-[#B4B4B4] rounded-lg">
                            <p class="text-lg font-inter text-[color:#6A6A6A] mb-4">You must be logged in to post a comment
                            </p>
                            <p class="text-lg font-inter text-[color:#6A6A6A] mb-4">please
                                <a class="underline font-inter text-base text-[#FD507E] mt-1" href="{{ route('login') }}">
                                    Login
                                </a>
                                or
                                <a class="underline font-inter text-base text-[#FD507E] mt-1"
                                    href="{{ route('register') }}">
                                    Sign Up
                                </a>
                                now!
                            </p>
                        </div>
                    @endguest
                </div>
            </div>
        </div>
    </div>

</x-app-layout>

<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
<script>
    document.getElementById('showMoreBtn').addEventListener('click', function() {
        fetchComments();
        this.style.display = 'none';
    });

    function fetchComments() {
        fetch(`/articles/{{ $article->id }}/comments`, {
                method: 'GET' // Explicitly specify the HTTP method
            })
            .then(response => response.json())
            .then(data => {
                const commentContainer = document.getElementById('commentContainer');
                data.comments.forEach(comment => {
                    const div = document.createElement('div');
                    const imgSrc = comment.user.picture ? 'http://127.0.0.1:8000/storage/' + comment.user.picture :
                        'https://via.placeholder.com/40';
                    const createdAtFormatted = moment(comment.created_at)
                        .fromNow(); // Format createdAt to a human-readable format
                    div.innerHTML = `
                        <div class="flex items-start space-x-4">
                            <img src="${imgSrc}" alt="User avatar" class="w-10 h-10 rounded-full">
                            <div class="flex-1">
                                <div class="bg-gray-100 p-4 rounded-lg">
                                    <div class="font-bold">${comment.user.username}</div>
                                    <p class="text-gray-700">${comment.content}</p>
                                </div>
                                <div class="mt-2 text-sm text-gray-500 flex items-center space-x-4">
                                    <span>${createdAtFormatted}</span>
                                    <button class="text-pink-500 hover:text-pink-700">Reply</button>
                                </div>
                            </div>
                        </div>
                    `;
                    commentContainer.appendChild(div);
                });
            })
            .catch(error => console.error('Error fetching comments:', error));
    }

    document.getElementById('backBtn').addEventListener('click', function() {
        window.history.back();
    });
</script>
