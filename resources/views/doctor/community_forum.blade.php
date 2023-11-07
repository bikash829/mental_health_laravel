@extends('layouts.admin.app')

@section('link')
    <x-vendor.bootstrap_css />
    <link rel="stylesheet" href="{{ asset('css/community.css') }}">
@endsection

@section('content')
    <div class="toast-container position-fixed top-0 end-0 p-3">
        <div id="toastError" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
                {{-- <img src="..." class="rounded me-2" alt="..."> --}}
                <strong class="me-auto text-danger">Warning!</strong>
                <small>11 mins ago</small>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
                <div id="toastContentError">
                </div>
            </div>
        </div>
    </div>

    {{--            toast success --}}
    <div class="toast-container position-fixed top-0 end-0 p-3">
        <div id="toastSuccess" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
                <strong class="me-auto text-success">Success!</strong>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
                <div id="toastContentSuccess">
                </div>
            </div>
        </div>
    </div>

    <x-coomunity_forum :posts="$posts"/>
@endsection

@section('scripts')

    <x-vendor.bootstrap_js />


    <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields

        /**
         * toast variables
         */
        const toastContentSuccess = $('#toastContentSuccess');
        const toastSuccess = $('#toastSuccess');

        const toastContentError = $('#toastContentError');
        const toastError = $('#toastError');

        let toastContainer = $('<div>');


        (() => {
            'use strict'

            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            const forms = document.querySelectorAll('.needs-validation')


            // Loop over them and prevent submission
            Array.from(forms).forEach(form => {
                form.addEventListener('submit', event => {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    } else {
                        event.preventDefault()

                        const formData = new FormData(form);

                        if (formData.get('frmPost') == 'article') {

                            axios.post("{{ route('doctor.community.store') }}", formData)
                                .then(function(response) {
                                    console.log(response);
                                    if (response.status == 200) {
                                        toastSuccessShow(response.data.success);
                                    } else {
                                        alert('Post creation failed');
                                    }




                                })
                                .catch(function(error) {
                                    console.log(error);

                                    const errorList = $('<ul>');
                                    Object.entries(error.response.data.errors).forEach(element => {
                                        console.log(element);
                                        errorList.append($("<li>").text(element[1][0]));
                                    });

                                    toastErrorShow(errorList);
                                });
                        }

                    }

                    form.classList.add('was-validated')
                }, false)
            })
        })()

        // bootstrap toast
        /**
         * toast success function
         */
            function toastSuccessShow(message) {
            toastContentSuccess.empty();
            toastContainer = toastContainer.text(message);

            toastContentSuccess.append(toastContainer);
            const toastBootstrap = bootstrap.Toast.getOrCreateInstance(toastSuccess)
            toastBootstrap.show()
        }

        function toastErrorShow(message) {
            toastContentError.empty();
            // toastContainer = toastContainer.text(message);

            toastContentError.append(message);
            const toastBootstrap = bootstrap.Toast.getOrCreateInstance(toastError)
            toastBootstrap.show()
        }


        /**
         * post live card
         */
        // const postCard = $('#postCard');
        // postCard.hide();





        $(document).ready(function() {
            const toastTrigger = document.getElementById('liveToastBtn')
            const toastLiveExample = document.getElementById('liveToast')

            if (toastTrigger) {
            const toastBootstrap = bootstrap.Toast.getOrCreateInstance(toastLiveExample)
            toastTrigger.addEventListener('click', () => {
                toastBootstrap.show()
            })
            }


            const $btnComment = $('.btn-comment');

            $btnComment.each(function(index) {
                const $this = $(this);
                $this.find(':first-child').text($this.parent().next().children().length - 2);

                $this.on('click', function() {
                    $this.parent().next().toggleClass('comments-visible');
                });
            });
        });
    </script>
@endsection
