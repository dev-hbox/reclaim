@extends('layouts.main')
@section('title', 'Affirmations')
@section('content')
    <div class="nk-content nk-content-fluid">
        <div class="container-xl wide-xl">
            <div class="nk-content-body">
                <div class="components-preview wide-xl mx-auto">
                    @include('partials._response')
                    <div class="nk-block nk-block-lg">
                        <div class="nk-block-between my-5">
                            <div class="nk-block-head-content">
                                <h3 class="nk-block-title page-title">Daily Affirmation <span
                                        class="badge badge-light text-muted">{{ $affirmations->total() }} </span> </h3>

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
                                                                        Affitmation</span></a></li>

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
                                    @foreach ($affirmations as $affirm)
                                        <div class="col-lg-4 mb-2 d-flex">
                                            <div class="card h-100 w-100" style="height: 300px;">
                                                <div class="card-inner d-flex flex-column h-100">
                                                    <h5 class="card-title mb-1">
                                                        @php
                                                            $isLongTitle = strlen($affirm->title ?? '') > 80;
                                                        @endphp

                                                        <span class="title-text  {{ $isLongTitle ? 'expandable' : '' }}"
                                                            onclick="toggleTitle(this)">
                                                            {{ $affirm->title }}
                                                        </span>

                                                        @if ($isLongTitle)
                                                            <small class="text-primary" style="cursor:pointer;"
                                                                onclick="toggleTitle(this.previousElementSibling)">

                                                            </small>
                                                        @endif
                                                    </h5>

                                                    <h6 class="card-subtitle my-2 ff-base">
                                                        {{ $affirm->show_date ? \Carbon\Carbon::parse($affirm->show_date)->diffForHumans() : '' }}
                                                    </h6>
                                                    <p class="card-text flex-grow-1 overflow-auto"
                                                        style="max-height: 100px;">
                                                        {{ $affirm->description ?? '' }}
                                                    </p>
                                                    <div class="mt-auto">
                                                        <a href="{{ url('admin/affirm-delete/' . $affirm->id) }}"
                                                            class="btn btn-danger mt-auto">Delete</a>
                                                        <a href="javascript:void(0);" class="btn btn-info edit-btn"
                                                            data-id="{{ $affirm->id }}"
                                                            data-title="{{ e($affirm->title) }}"
                                                            data-description="{{ e($affirm->description) }}"
                                                            data-date="{{ $affirm->show_date }}">
                                                            Edit
                                                        </a>



                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>



                            </div>
                            {{-- pagination start --}}
                            <div class="card-inner">
                                <div class="nk-block-between-md g-3">
                                    <div class="g">
                                        <ul class="pagination justify-content-center justify-content-md-start">
                                            {{-- Previous Page Link --}}
                                            @if ($affirmations->onFirstPage())
                                                <li class="page-item disabled">
                                                    <span class="page-link">Prev</span>
                                                </li>
                                            @else
                                                <li class="page-item">
                                                    <a class="page-link"
                                                        href="{{ $affirmations->previousPageUrl() }}">Prev</a>
                                                </li>
                                            @endif

                                            {{-- Pagination Elements --}}
                                            @foreach ($affirmations->getUrlRange(1, $affirmations->lastPage()) as $page => $url)
                                                <li
                                                    class="page-item {{ $affirmations->currentPage() == $page ? 'active' : '' }}">
                                                    <a class="page-link"
                                                        href="{{ $url }}">{{ $page }}</a>
                                                </li>
                                            @endforeach

                                            {{-- Next Page Link --}}
                                            @if ($affirmations->hasMorePages())
                                                <li class="page-item">
                                                    <a class="page-link" href="{{ $affirmations->nextPageUrl() }}">Next</a>
                                                </li>
                                            @else
                                                <li class="page-item disabled">
                                                    <span class="page-link">Next</span>
                                                </li>
                                            @endif
                                        </ul><!-- .pagination -->
                                    </div>

                                    <div class="g">
                                        <div
                                            class="pagination-goto d-flex justify-content-center justify-content-md-start gx-3">
                                            <div>Page</div>
                                            <div>
                                                <select class="form-select js-select2" data-search="on"
                                                    data-dropdown="xs center" onchange="window.location.href = this.value">
                                                    @for ($i = 1; $i <= $affirmations->lastPage(); $i++)
                                                        <option value="{{ $affirmations->url($i) }}"
                                                            {{ $affirmations->currentPage() == $i ? 'selected' : '' }}>
                                                            {{ $i }}
                                                        </option>
                                                    @endfor
                                                </select>
                                            </div>
                                            <div>OF {{ $affirmations->lastPage() }}</div>
                                        </div>
                                    </div><!-- .pagination-goto -->
                                </div><!-- .nk-block-between -->
                            </div><!-- .card-inner -->
                            {{-- pagination end --}}
                        </div><!-- .card-preview -->

                    </div>

                </div>


                <!-- Store Modal Form -->
                <div class="modal fade" id="modalForm">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Add Affirmation</h5>
                                <a href="#" class="close" data-bs-dismiss="modal" aria-label="Close">
                                    <em class="icon ni ni-cross"></em>
                                </a>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('affirmations.store') }}" method="POST"
                                    class="form-validate is-alter">

                                    @csrf

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
                                            <textarea class="form-control no-resize" name="description" id="description">{{ old('description') }}</textarea>
                                            @error('description')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label">Date</label>
                                        <div class="form-control-wrap">
                                            <div class="form-icon form-icon-left">
                                                <em class="icon ni ni-calendar"></em>
                                            </div>
                                            <input type="text" class="form-control date-picker" name="show_date"
                                                value="{{ old('show_date') }}" data-date-format="yyyy-mm-dd">
                                            @error('show_date')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-lg btn-primary">Add Affirmation</button>
                                    </div>
                                </form>

                            </div>

                        </div>
                    </div>
                </div>
                <!-- Store Modal Form End -->


                <!-- Update Modal Form -->
                <div class="modal fade" id="modalFormUpdate" tabindex="-1" aria-hidden="true">

                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modalTitle">Add Affirmation</h5>
                                <a href="#" class="close" data-bs-dismiss="modal" aria-label="Close">
                                    <em class="icon ni ni-cross"></em>
                                </a>
                            </div>
                            <div class="modal-body">
                                <form id="affirmationForm" method="POST" class="form-validate is-alter">
                                    @csrf

                                    <div class="form-group">
                                        <label class="form-label" for="modal-title">Title</label>
                                        <div class="form-control-wrap">
                                            <input type="text" class="form-control" name="title" id="modal-title"
                                                required>
                                            @error('title')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label" for="modal-description">Description</label>
                                        <div class="form-control-wrap">
                                            <textarea class="form-control no-resize" name="description" id="modal-description"></textarea>
                                            @error('description')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label">Date</label>
                                        <div class="form-control-wrap">
                                            <div class="form-icon form-icon-left">
                                                <em class="icon ni ni-calendar"></em>
                                            </div>
                                            <input type="text" class="form-control date-picker" name="show_date"
                                                id="modal-date" data-date-format="yyyy-mm-dd">
                                            @error('show_date')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" id="modal-submit-btn" class="btn btn-lg btn-primary">Add
                                            Affirmation</button>
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
