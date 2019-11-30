<div class="card no-padding">
            <div class="columns">
                <div class="column post column-post-image is-11-tablet" data-link="{{ route('post.show', $post) }}">
                    <div class="meta-padding-top">
                        <span class="card-meta"><i class="far fa-user-circle"></i> {{ $post->user->name }} &#183; {{ $post->created_at->diffForHumans() }}</span>
                        <h1 class="title is-5 card-title">
                            <div class="columns is-vcentered">

                                @if((!empty($post->link)) && (!empty($post->image)))
                                <div class="column is-narrow">
                                    <div class="tags are-small"><span class="tag is-light">LINK</span><span class="tag is-light">IMAGE</span></div>
                                </div>
                                @elseif(!empty($post->link))
                                <div class="column is-narrow">
                                    <span class="tag is-light is-small">LINK</span>
                                </div>
                                @elseif(!empty($post->image))
                                <div class="column is-narrow">
                                    <span class="tag is-light is-small">IMAGE</span>
                                </div>
                                @endif

                                <div class="column">
                                    @if(!empty($post->link))
                                    <h1 class="title post-title"><a href="{{ $post->link }}">{{ $post->title }}</a></h1>
                                    @elseif(!empty($post->image))
                                    <h1 class="title post-title">{{ $post->title }}</h1>
                                    @else
                                    <h1 class="title post-title">{{ $post->title }}</h1>
                                    @endif
                                </div>
                            </div>
                        </h1>
                    </div>

                    @if(!empty($post->image))
                    <img class="post-image" src="{{ $post->image }}">
                    @endif

                    <div class="meta-padding-bottom">
                        @if(empty($post->image))
                        <p class="truncate-content">{{ $post->body }}</p>
                        @endif
                        <hr>
                        <span class="menu-label">{{ $post->votes->sum('value') }} points &#183; {{ $post->replies->count() }} replies</span>
                    </div>
                </div>
                <div class="column is-1-tablet card-meta-right is-vcentered" data-id="{{ $post->id }}">
                    <div class="upvote @auth{{ $post->votes->where('user_id', Auth::user()->id)->pluck('value') == '[1]' ? 'voted' : '' }}@endauth"><i class="fas fa-angle-up"></i></div>
                    <div class="menu-label tag is-light is-rounded upvote-count"><strong>{{ $post->votes->sum('value') }}</strong></div>
                    <div class="downvote @auth{{ $post->votes->where('user_id', Auth::user()->id)->pluck('value') == '[-1]' ? 'voted' : '' }}@endauth"><i class="fas fa-angle-down"></i></div>
                </div>
            </div>
</div>