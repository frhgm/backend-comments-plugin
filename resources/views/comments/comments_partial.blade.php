@forelse ($comments as $comment)
    <li class="bg-darkcomment border border-gray-600 rounded-lg p-4">
        <div class="flex items-center gap-3 mb-2">
            <div class="w-8 h-8 rounded-full bg-gray-500"></div>
            <span class="font-bold">{{ $comment->user->name ?? 'Anonymous' }}</span>
        </div>
        <p class="mb-3">{{ $comment->content }}</p>
        <div class="flex items-center gap-4">
            <div class="flex items-center gap-1">
                <button  class="text-gray-400 hover:text-white">
                    <i class="fas fa-arrow-up"></i>
                </button>
                <span>{{ $comment->votes }}</span>
                <button  class="text-gray-400 hover:text-white">
                    <i class="fas fa-arrow-down"></i>
                </button>
            </div>
            <button  class="text-gray-400 hover:text-white flex items-center gap-1">
                <i class="fas fa-reply"></i> Reply
            </button>
        </div>

        {{-- Reply form (will be handled later) --}}
    </li>
@empty
    <li class="bg-darkcomment rounded-lg p-4 text-center text-gray-400">
        No comments yet. Be the first to comment!
    </li>
@endforelse