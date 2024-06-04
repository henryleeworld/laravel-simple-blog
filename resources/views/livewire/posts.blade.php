<div class="card-body">
    <p class="mb-2">
	    {{ trans('global.categories') }}<br/>
        @foreach ($categories as $id => $category)
            <div class="badge{{ in_array($id, $selectedCategories) ? ' bg-warning text-dark' : ' text-dark' }}" wire:click="filterCategories({{ $id }})">
                {{ $category }}
            </div>
        @endforeach
    </p>
    <div class="row">
        @foreach ($posts as $post)
            <div class="col-12 mb-2">
                <div class="float-left my-2 me-2">
                    @forelse($post->categories as $category)
                        <span class="h4 me-1 text-white bg-warning rounded p-1">{{ $category->name }}</span>
                    @empty
                        <span class="h4 me-1 text-white bg-warning rounded p-1">{{ __('ALL') }}</span>
                    @endforelse
                </div>
                <span style="color: darkgreen;">
                            {{ $post->title }}<br/>
                            {{ $post->start_date }}
                </span>
                <p>
                    @if (strlen(strip_tags($post->post_text)) > 100)
                        {{ Str::limit(strip_tags($post->post_text), 100) }}
                    @else
                        {!! $post->post_text !!}
                    @endif
                </p>
                <p>
                    <a href="{{ route('frontend.posts.show', $post) }}" class="link-underline link-underline-opacity-0 link-underline-opacity-75-hover">{{ __('Read more') }}</a>
                </p>
            </div>
        @endforeach
    </div>
</div>
