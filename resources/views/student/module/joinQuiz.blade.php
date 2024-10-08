<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Quiz for Module: ' . $module->title) }}
        </h2>
    </x-slot>

    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper">
            @include('.student.module.studentSideBar')

            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="col-lg-12 grid-margin stretch-card">
                        <div class="card mt-2">
                            <div class="card-body">
                                <h4 class="card-title text-center">Quiz Questions</h4>

                                @if($questions->isEmpty())
                                    <p class="text-center">No questions available for this module.</p>
                                @else
                                    <form id="quizForm" action="{{ route('quiz.save') }}" method="POST">
                                        @csrf
                                        <input type="hidden" id="module_id" name="module_id" value="{{ $module->id }}">
                                        <input type="hidden" name="student_id" value="{{ auth()->user()->id }}">

                                        @foreach($questions as $question)
                                            <div class="card mb-3">
                                                <div class="card-body">
                                                    <h5 class="card-title text-center">{{ $question->question }}</h5>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="answer-row">
                                                                @foreach($question->shuffledAnswers as $index => $answer)
                                                                    @if ($index % 2 == 0)
                                                                        <div class="form-check">
                                                                            <input type="radio" class="form-check-input" name="question[{{ $question->id }}]" value="{{ $answer['text'] }}" id="answer-{{ $answer['id'] }}-{{ $question->id }}" {{ $answer['text'] == $question->preSelectedAnswer ? 'checked' : '' }}>
                                                                            <label class="form-check-label" for="answer-{{ $answer['id'] }}-{{ $question->id }}">{{ $answer['text'] }}</label>
                                                                        </div>
                                                                    @endif
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="answer-row">
                                                                @foreach($question->shuffledAnswers as $index => $answer)
                                                                    @if ($index % 2 != 0)
                                                                        <div class="form-check">
                                                                            <input type="radio" class="form-check-input" name="question[{{ $question->id }}]" value="{{ $answer['text'] }}" id="answer-{{ $answer['id'] }}-{{ $question->id }}" {{ $answer['text'] == $question->preSelectedAnswer ? 'checked' : '' }}>
                                                                            <label class="form-check-label" for="answer-{{ $answer['id'] }}-{{ $question->id }}">{{ $answer['text'] }}</label>
                                                                        </div>
                                                                    @endif
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach

                                        <div class="text-center mt-3">
                                            <button type="button" class="btn btn-secondary mr-3" id="cancelButton">Cancel</button>
                                            <button type="button" class="btn btn-danger mr-3" id="deleteButton">Delete</button>
                                            <button type="button" class="btn btn-warning" id="saveExitButton">Save and Exit</button>
                                            <button type="button" class="btn btn-primary d-none" id="submitButton">Submit</button>
                                        </div>
                                    </form>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
   

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Function to check if all questions are answered
            function updateButtonStates() {
                let allAnswered = true;

                // Check each question
                document.querySelectorAll('[name^="question["]').forEach(function (input) {
                    let questionId = input.name.match(/\d+/)[0];
                    if (!document.querySelector(`input[name="question[${questionId}]"]:checked`)) {
                        allAnswered = false;
                    }
                });

                // Show the correct button based on the answers
                document.getElementById('submitButton').classList.toggle('d-none', !allAnswered);
                document.getElementById('saveExitButton').classList.toggle('d-none', allAnswered);
            }

            // Initial check
            updateButtonStates();

            // Add event listener for changes in the form
            document.querySelectorAll('[name^="question["]').forEach(function (input) {
                input.addEventListener('change', updateButtonStates);
            });

            // SweetAlert for Cancel
            document.getElementById('cancelButton').addEventListener('click', function () {
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You will leave this quiz and lose progress!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, cancel it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = '{{ route('module.index') }}';
                    }
                });
            });
            // SweetAlert for Delete
            document.getElementById('deleteButton').addEventListener('click', function () {
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You progress will be deleted!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, Delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        var module_id = document.getElementById('module_id').value;
                        var url = '{{ route('quiz.delete') }}' + '?module_id=' + encodeURIComponent(module_id);
                        window.location.href = url;
                    }
                });
            });

            // SweetAlert for Save and Exit / Submit
            document.getElementById('saveExitButton').addEventListener('click', function () {
                Swal.fire({
                    title: 'Are you sure?',
                    text: "Your answers will be saved!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, Save and Exit!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        document.getElementById('quizForm').submit();
                    }
                });
            });

            // SweetAlert for Submit
            document.getElementById('submitButton').addEventListener('click', function () {
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You are about to submit your quiz.",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, Submit!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        document.getElementById('quizForm').submit();
                    }
                });
            });
            @if (session('error'))
                Swal.fire({
                    icon: 'error',
                    title: 'Error!',
                    text: '{{ session('error') }}',
                    confirmButtonText: 'Ok'
                });
            @endif
        });
        
    </script>

    <style>
        .answer-row {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100%;
        }
        .form-check {
            margin-bottom: 1rem; /* Adjust spacing between answers if needed */
        }
        .row {
            display: flex;
            justify-content: center;
        }
        .col-md-6 {
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
    </style>
</x-app-layout>
