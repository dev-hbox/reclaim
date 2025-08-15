@extends('layouts.main')
@section('title', 'Questionnaire')
@section('content')
    <div class="nk-content nk-content-fluid">
        <div class="container-xl wide-xl">
            <div class="nk-content-body">
                <div class="components-preview wide-xl mx-auto">
                    @include('partials._response')
                    <div class="nk-block nk-block-lg">
                        <div class="nk-block-between my-5">
                            <div class="nk-block-head-content">
                                <h3 class="nk-block-title page-title">Questionnaire <span class="badge badge-light text-muted">{{$questions->total()}}</span> </h3>

                            </div><!-- .nk-block-head-content -->

                        </div><!-- .nk-block-between -->

                        <div class="card">
                            <div class="card-inner">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <h4 class="title">All Questions</h4>
                                    <a href="javascript:void(0);" class="btn btn-primary" id="addQuestionBtn"
                                        data-action="{{ route('store-questions') }}">
                                        <em class="icon ni ni-plus"></em> Add New Question
                                    </a>
                                </div>

                                @foreach ($questions as $question)
                                    <div class="border rounded p-3 mb-4">
                                        <div class="d-flex justify-content-between align-items-center mb-2">
                                            <h5 class="mb-1">
                                                <em class="icon ni ni-chat-fill"></em>
                                                {{ $question->question_text }}
                                                {{-- <span class="badge badge-light text-muted">({{ ucfirst($question->type) }}
                                                    choice)</span> --}}
                                            </h5>
                                            <div>
                                                <button class="btn btn-xs btn-warning edit-question-btn"
                                                    data-id="{{ $question->id }}"
                                                    data-question="{{ $question->question_text }}"
                                                    data-type="{{ $question->type }}"
                                                    data-answers='@json($question->answers)'>
                                                    <em class="icon ni ni-edit"></em>
                                                </button>
                                                <button class="btn btn-xs btn-danger delete-question-btn"
                                                    data-id="{{ $question->id }}">
                                                    <em class="icon ni ni-trash"></em>
                                                </button>
                                            </div>
                                        </div>

                                        <ul class="list-group">
                                            @foreach ($question->answers as $answer)
                                                <li
                                                    class="list-group-item d-flex justify-content-between align-items-center">
                                                    <span>{{ $answer->answer_text }}</span>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endforeach
                            </div>
                            {{-- pagination start  --}}
                            <div class="card-inner">
                                <div class="nk-block-between-md g-3">
                                    <div class="g">
                                        <ul class="pagination justify-content-center justify-content-md-start">
                                            {{-- Previous Page Link --}}
                                            @if ($questions->onFirstPage())
                                                <li class="page-item disabled">
                                                    <span class="page-link">Prev</span>
                                                </li>
                                            @else
                                                <li class="page-item">
                                                    <a class="page-link" href="{{ $questions->previousPageUrl() }}">Prev</a>
                                                </li>
                                            @endif

                                            {{-- Pagination Elements --}}
                                            @foreach ($questions->getUrlRange(1, $questions->lastPage()) as $page => $url)
                                                <li
                                                    class="page-item {{ $questions->currentPage() == $page ? 'active' : '' }}">
                                                    <a class="page-link"
                                                        href="{{ $url }}">{{ $page }}</a>
                                                </li>
                                            @endforeach

                                            {{-- Next Page Link --}}
                                            @if ($questions->hasMorePages())
                                                <li class="page-item">
                                                    <a class="page-link" href="{{ $questions->nextPageUrl() }}">Next</a>
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
                                                    @for ($i = 1; $i <= $questions->lastPage(); $i++)
                                                        <option value="{{ $questions->url($i) }}"
                                                            {{ $questions->currentPage() == $i ? 'selected' : '' }}>
                                                            {{ $i }}
                                                        </option>
                                                    @endfor
                                                </select>
                                            </div>
                                            <div>OF {{ $questions->lastPage() }}</div>
                                        </div>
                                    </div><!-- .pagination-goto -->
                                </div><!-- .nk-block-between -->
                            </div><!-- .card-inner -->

                        </div>
                        <!-- .card-preview -->



                    </div>
                </div>

                <!-- Add/Edit Question Modal -->
                <div class="modal fade" id="questionModal" tabindex="-1">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form method="POST" id="questionForm">
                                @csrf
                                <input type="hidden" name="_method" id="form-method" value="POST">
                                <input type="hidden" name="id" id="question-id">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="questionModalTitle">Add Question</h5>
                                    <a href="#" class="close" data-bs-dismiss="modal"><em
                                            class="icon ni ni-cross"></em></a>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label>Question Text</label>
                                        <input type="text" name="question_text" id="question-text" class="form-control"
                                            required>
                                    </div>
                                    <div class="form-group">
                                        <label>Type</label>
                                        <select name="type" id="question-type" class="form-control">
                                            <option value="single">Single Choice</option>
                                            <option value="multiple">Multiple Choice</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Answers</label>
                                        <div id="answers-container">
                                            <input type="text" name="answers[]" class="form-control mb-2"
                                                placeholder="Answer 1" required>
                                            <input type="text" name="answers[]" class="form-control mb-2"
                                                placeholder="Answer 2" required>
                                        </div>
                                        <button type="button" class="btn btn-sm btn-secondary" id="add-answer-field">
                                            <em class="icon ni ni-plus"></em> Add More Answer
                                        </button>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary">Save Question</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
@endsection
