@forelse ($comments as $comment)
    <li class="comment-item mb-3">
        <div class="flex">
            {{-- Left vertical line for visual hierarchy --}}
            <div class="comment-line-wrapper mr-3">
                <div class="comment-line"></div>
            </div>
            
            <div class="flex-1">
                {{-- Comment header --}}
                <div class="flex items-center gap-2 mb-1">
                    <div class="w-5 h-5 rounded-full bg-gray-600"></div>
                    <span class="text-sm font-medium text-gray-300">{{ $comment->user->name ?? 'Anonymous' }}</span>
                    <span class="text-xs text-gray-500">• 3h</span>
                </div>
                
                {{-- Comment content --}}
                <p class="text-sm mb-2 text-gray-200">{{ $comment->content }}</p>
                
                {{-- Comment actions --}}
                <div class="flex items-center gap-4 text-xs">
                    <div class="vote-wrapper flex items-center">
                        <button class="vote-btn hover:bg-gray-700 rounded p-1">
                            <i class="fas fa-arrow-up text-gray-500 hover:text-blue-500"></i>
                        </button>
                        <span class="px-2 font-medium">{{ $comment->votes }}</span>
                        <button class="vote-btn hover:bg-gray-700 rounded p-1">
                            <i class="fas fa-arrow-down text-gray-500 hover:text-red-500"></i>
                        </button>
                    </div>
                    <button class="flex items-center gap-1 text-gray-500 hover:text-gray-300">
                        <i class="fas fa-reply text-xs"></i>
                        <span>Reply</span>
                    </button>
                </div>
            </div>
        </div>
    </li>
    
@empty
    <div class="no-comments-message rounded-lg p-6 bg-gray-800/50">
        <p class="text-sm">No comments yet. Be the first to comment!</p>
    </div>
@endforelse