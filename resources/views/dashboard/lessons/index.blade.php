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
                                <h3 class="nk-block-title page-title">All Lessons <span
                                        class="badge badge-light text-muted">{{ $lessons->total() }}</span></h3>

                            </div><!-- .nk-block-head-content -->
                            <div class="nk-block-head-content">
                                <div class="toggle-wrap nk-block-tools-toggle">

                                    <a href="#" class="btn btn-icon btn-trigger toggle-expand me-n1"
                                        data-target="pageMenu"><em class="icon ni ni-menu-alt-r"></em></a>
                                    <div class="toggle-expand-content" data-content="pageMenu">
                                        <ul class="nk-block-tools g-3">
                                            <li class="nk-block-tools-opt">
                                                <div class="drodown">
                                                    <a href="#" class="dropdown-toggle btn btn-icon btn-primary"
                                                        data-bs-toggle="dropdown"><em class="icon ni ni-plus"></em></a>
                                                    <div class="dropdown-menu dropdown-menu-end">
                                                        <ul class="link-list-opt no-bdr">
                                                            <li><a href="#" data-bs-toggle="modal"
                                                                    data-bs-target="#modalForm"><span>Add
                                                                        Lessons</span></a></li>

                                                        </ul>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div><!-- .toggle-wrap -->
                            </div><!-- .nk-block-head-content -->
                        </div><!-- .nk-block-between -->

                        <div class="card card-preview">
                            <div class="card-inner">
                                <div class="row">
                                    @foreach ($lessons as $lesson)
                                        <div class="col-lg-4 mb-2 d-flex">
                                            <div class="card h-100 w-100" style="height: 300px;">
                                                <div class="card-inner d-flex flex-column h-100">

                                                    {{-- Media section (either video or image) --}}
                                                    @if ($lesson->video)
                                                        <video width="100%" height="180" controls>
                                                            <source src="{{ asset($lesson->video) }}" type="video/mp4">
                                                            Your browser does not support the video tag.
                                                        </video>
                                                    @elseif($lesson->avatar)
                                                        <img src="{{ asset($lesson->avatar) }}" class="card-img-top mb-2"
                                                            alt="" style="height: 180px; object-fit: cover;">
                                                    @else
                                                        <img src="{{ asset('images/slides/slide-a.jpg') }}"
                                                            class="card-img-top mb-2" alt=""
                                                            style="height: 180px; object-fit: cover;">
                                                    @endif

                                                    {{-- Title --}}
                                                    <h5 class="card-title my-2">
                                                        {{ $lesson->title ?? '' }}
                                                    </h5>


                                                    {{-- Description --}}
                                                    <p class="card-text flex-grow-1 overflow-auto"
                                                        style="max-height: 100px;">
                                                        {{ $lesson->description ?? '' }}
                                                    </p>

                                                    {{-- Action Buttons --}}
                                                    <div class="mt-auto">
                                                        <a href="{{ route('lessons.delete', $lesson->id) }}"
                                                            class="btn btn-danger mt-auto"
                                                            onclick="return confirm('Are you sure you want to delete this lesson?');">
                                                            Delete
                                                        </a>

                                                        <a href="javascript:void(0);" class="btn btn-info edit-lesson-btn"
                                                            data-id="{{ $lesson->id }}"
                                                            data-title="{{ e($lesson->title) }}"
                                                            data-description="{{ e($lesson->description) }}"
                                                            data-avatar="{{ $lesson->avatar }}"
                                                            data-video="{{ $lesson->video }}">
                                                            Edit
                                                        </a>


                                                    </div>

                                                </div>
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
                                    @if ($lessons->onFirstPage())
                                        <li class="page-item disabled">
                                            <span class="page-link">Prev</span>
                                        </li>
                                    @else
                                        <li class="page-item">
                                            <a class="page-link" href="{{ $lessons->previousPageUrl() }}">Prev</a>
                                        </li>
                                    @endif

                                    {{-- Pagination Elements --}}
                                    @foreach ($lessons->getUrlRange(1, $lessons->lastPage()) as $page => $url)
                                        <li class="page-item {{ $lessons->currentPage() == $page ? 'active' : '' }}">
                                            <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                                        </li>
                                    @endforeach

                                    {{-- Next Page Link --}}
                                    @if ($lessons->hasMorePages())
                                        <li class="page-item">
                                            <a class="page-link" href="{{ $lessons->nextPageUrl() }}">Next</a>
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
                                            @for ($i = 1; $i <= $lessons->lastPage(); $i++)
                                                <option value="{{ $lessons->url($i) }}"
                                                    {{ $lessons->currentPage() == $i ? 'selected' : '' }}>
                                                    {{ $i }}
                                                </option>
                                            @endfor
                                        </select>
                                    </div>
                                    <div>OF {{ $lessons->lastPage() }}</div>
                                </div>
                            </div><!-- .pagination-goto -->
                        </div><!-- .nk-block-between -->
                    </div><!-- .card-inner -->

                </div>


                <!-- Store Lesson Modal -->
                <div class="modal fade" id="modalForm">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Add Lesson</h5>
                                <a href="#" class="close" data-bs-dismiss="modal" aria-label="Close">
                                    <em class="icon ni ni-cross"></em>
                                </a>
                            </div>
                            <div class="modal-body">

                                {{-- Display server-side media error --}}
                                @if ($errors->has('media'))
                                    <div class="alert alert-danger">
                                        {{ $errors->first('media') }}
                                    </div>
                                @endif

                                <form action="{{ route('lessons.store') }}" method="POST" enctype="multipart/form-data"
                                    class="form-validate is-alter">
                                    @csrf

                                    <p class="text-muted small">
                                        * Please upload either an avatar image or a video. Only one is allowed and required.
                                    </p>

                                    <div class="form-group">
                                        <label class="form-label" for="title">Title</label>
                                        <div class="form-control-wrap">
                                            <input type="text" class="form-control" name="title" id="title"
                                                value="{{ old('title') }}" required>
                                            @error('title')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label" for="description">Description</label>
                                        <div class="form-control-wrap">
                                            <textarea class="form-control no-resize" name="description" id="description" required>{{ old('description') }}</textarea>
                                            @error('description')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label" for="avatar">Avatar Image</label>
                                        <div class="form-control-wrap">
                                            <input type="file" class="form-control" name="avatar" id="avatar"
                                                accept="image/*">
                                            @error('avatar')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label" for="video">Video</label>
                                        <div class="form-control-wrap">
                                            <input type="file" class="form-control" name="video" id="video"
                                                accept="video/*">
                                            @error('video')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-lg btn-primary">Add Lesson</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Store Lesson Modal End -->


                <!-- Update Lesson Modal -->

                <div class="modal fade" id="modalFormUpdate" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modalTitle">Update Lesson</h5>
                                <a href="#" class="close" data-bs-dismiss="modal" aria-label="Close">
                                    <em class="icon ni ni-cross"></em>
                                </a>
                            </div>
                            <div class="modal-body">
                                {{-- For showing validation errors --}}
                                <div id="modal-error" class="alert alert-danger d-none"></div>

                                <form id="lessonUpdateForm" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')

                                    <input type="hidden" name="lesson_id" id="modal-lesson-id">

                                    <p class="text-muted small">
                                        * Please upload either an avatar image or a video. Only one is allowed and optional
                                        when updating.
                                    </p>

                                    <div class="form-group">
                                        <label class="form-label" for="modal-title">Title</label>
                                        <div class="form-control-wrap">
                                            <input type="text" class="form-control" name="title" id="modal-title"
                                                required>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label" for="modal-description">Description</label>
                                        <div class="form-control-wrap">
                                            <textarea class="form-control no-resize" name="description" id="modal-description"></textarea>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label">Current Avatar</label>
                                        <div id="modal-current-avatar"></div>
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label" for="modal-avatar">Upload New Avatar Image</label>
                                        <div class="form-control-wrap">
                                            <input type="file" class="form-control" name="avatar" id="modal-avatar"
                                                accept="image/*">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label">Current Video</label>
                                        <div id="modal-current-video"></div>
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label" for="modal-video">Upload New Video</label>
                                        <div class="form-control-wrap">
                                            <input type="file" class="form-control" name="video" id="modal-video"
                                                accept="video/*">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-lg btn-primary">Update Lesson</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>


                <!-- Update Modal Form -->

            </div>
        </div>
    </div>
@endsection
