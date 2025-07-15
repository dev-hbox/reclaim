@extends('layouts.main')

@section('content')
    <div class="nk-content nk-content-fluid">
        <div class="container-xl wide-xl">
            <div class="nk-content-body">
                <div class="components-preview wide-xl mx-auto">
                    @include('partials._response')
                    <div class="nk-block nk-block-lg">
                        <div class="nk-block-between my-5">
                            <div class="nk-block-head-content">
                                <h3 class="nk-block-title page-title">All Posts <span
                                        class="badge badge-light text-muted">{{ $posts->total() }}</span> </h3>

                            </div><!-- .nk-block-head-content -->

                        </div><!-- .nk-block-between -->

                        <div class="card card-preview">
                            <div class="card-inner">
                                <div class="row">

                                    @foreach ($posts as $post)
                                        <div class="card mb-4 shadow-sm" id="post-{{ $post['id'] }}">
                                            <div class="card-body">

                                                <div class="d-flex align-items-center mb-3">
                                                    {{-- Only user info is clickable --}}
                                                    <a href="{{ url('admin/user-detail/' . $post['user']['id']) }}"
                                                        class="d-flex align-items-center text-decoration-none text-dark">
                                                        <img src="{{ asset($post['user']['profile']['avatar'] ?? 'uploads/profile/user-default.png') }}"
                                                            alt="User Avatar" class="rounded-circle" width="50"
                                                            height="50" style="object-fit: cover;">
                                                        <div class="ms-3">
                                                            <h6 class="mb-0 fw-bold">
                                                                {{ $post['user']['profile']['name'] ?? 'Unknown User' }}
                                                            </h6>
                                                            <span class="text-muted small ms-2">
                                                                {{ \Carbon\Carbon::parse($post['created_at'])->diffForHumans() }}
                                                            </span>
                                                        </div>
                                                    </a>

                                                    {{-- The delete button stays outside --}}
                                                    <div class="ms-auto">
                                                        @if ($post['is_report'] != 0)
                                                            <span
                                                                class="badge badge-light text-muted text-danger">Reported</span>
                                                        @endif

                                                        {{-- <a href="{{ url('admin/community/delete/' . $post['id']) }}"
                                                            class="btn btn-sm btn-danger">
                                                            Delete
                                                        </a> --}}

                                                    </div>



                                                </div>

                                                {{-- POST TITLE --}}
                                                <h5 class="fw-bold mb-2">{{ $post['title'] }}</h5>

                                                {{-- POST CONTENT --}}
                                                <p class="text-muted mb-3">{{ $post['content'] }}</p>

                                                {{-- MEDIA (Image or Video) --}}
                                                @if ($post['image'])
                                                    <img src="{{ asset($post['image']) }}" class="img-fluid rounded mb-3"
                                                        style="max-height: 300px;" alt="Post Image">
                                                @elseif(isset($post['video']) && $post['video'])
                                                    <div class="ratio ratio-16x9 mb-3">
                                                        <video controls>
                                                            <source src="{{ asset($post['video']) }}" type="video/mp4">
                                                            Your browser does not support the video tag.
                                                        </video>
                                                    </div>
                                                @endif

                                                {{-- POST STATS --}}
                                                <div class="mb-3">
                                                    <span class="text-muted me-3">
                                                        <i class="bi bi-hand-thumbs-up"></i> {{ $post['likes_count'] }}
                                                        Likes
                                                    </span>
                                                    <span class="text-muted me-3">
                                                        <i class="bi bi-chat"></i> {{ $post['comments_count'] }} Comments
                                                    </span>
                                                </div>

                                                {{-- COMMENTS --}}
                                                @if ($post['comments']->count())
                                                    <div class="border-top pt-2">
                                                        <h6 class="fw-bold mb-3">Comments</h6>

                                                        @foreach ($post['comments'] as $comment)
                                                            <div class="mb-3">
                                                                <div class="d-flex justify-content-between">
                                                                    <strong>{{ $comment['user']['profile']['name'] ?? 'Anonymous' }}</strong>
                                                                    <span class="text-muted small">

                                                                        {{ \Carbon\Carbon::parse($comment['created_at'])->diffForHumans() }}
                                                                    </span>
                                                                </div>
                                                                <p class="mb-1">{{ $comment['comment'] }}</p>
                                                                <span class="text-muted small">
                                                                    <i class="bi bi-hand-thumbs-up"></i>
                                                                    {{ $comment['likes_count'] }} Likes
                                                                </span>
                                                            </div>
                                                            <hr>
                                                        @endforeach
                                                    </div>
                                                @else
                                                    <p class="text-muted small">No comments yet.</p>
                                                @endif
                                            </div>
                                        </div>
                                    @endforeach


                                </div>




                            </div>
                        </div><!-- .card-preview -->

                    </div>
                    {{-- pagination start  --}}
                    <div class="card-inner">
                        <div class="nk-block-between-md g-3">
                            <div class="g">
                                <ul class="pagination justify-content-center justify-content-md-start">
                                    {{-- Previous Page Link --}}
                                    @if ($posts->onFirstPage())
                                        <li class="page-item disabled">
                                            <span class="page-link">Prev</span>
                                        </li>
                                    @else
                                        <li class="page-item">
                                            <a class="page-link" href="{{ $posts->previousPageUrl() }}">Prev</a>
                                        </li>
                                    @endif

                                    {{-- Pagination Elements --}}
                                    @foreach ($posts->getUrlRange(1, $posts->lastPage()) as $page => $url)
                                        <li class="page-item {{ $posts->currentPage() == $page ? 'active' : '' }}">
                                            <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                                        </li>
                                    @endforeach

                                    {{-- Next Page Link --}}
                                    @if ($posts->hasMorePages())
                                        <li class="page-item">
                                            <a class="page-link" href="{{ $posts->nextPageUrl() }}">Next</a>
                                        </li>
                                    @else
                                        <li class="page-item disabled">
                                            <span class="page-link">Next</span>
                                        </li>
                                    @endif
                                </ul><!-- .pagination -->
                            </div>

                            <div class="g">
                                <div class="pagination-goto d-flex justify-content-center justify-content-md-start gx-3">
                                    <div>Page</div>
                                    <div>
                                        <select class="form-select js-select2" data-search="on" data-dropdown="xs center"
                                            onchange="window.location.href = this.value">
                                            @for ($i = 1; $i <= $posts->lastPage(); $i++)
                                                <option value="{{ $posts->url($i) }}"
                                                    {{ $posts->currentPage() == $i ? 'selected' : '' }}>
                                                    {{ $i }}
                                                </option>
                                            @endfor
                                        </select>
                                    </div>
                                    <div>OF {{ $posts->lastPage() }}</div>
                                </div>
                            </div><!-- .pagination-goto -->
                        </div><!-- .nk-block-between -->
                    </div><!-- .card-inner -->

                </div>



            </div>
        </div>
    </div>
@endsection
