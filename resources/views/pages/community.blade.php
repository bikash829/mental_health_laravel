@extends('layouts.app')

@section('title') Community forum @endsection

@section('banner')
    <div class="banner ">
        <h1 class="banner__title">Community Forum</h1>
        <img class="banner__img" src="{{asset('images/banner/banner3.jpg')}}" alt="{{__('Community Forum')}}">
    </div>
@endsection

@section('content')
    <section class="segment-margin community">
        <!-- post sectoin  -->
        <div class="community__post post">
            <!-- creating new post section  -->
            <div class="post__card">
                <div class="post__title">
                    <p class="text-center fs-4 text-danger">Please Login to create a new post</p>
                    <h3 class="post__author">Create a new post</h3>
                </div>
                <div class="p-des">
                    <div class="p-des__article">

                        <form action="./backend/create_post.php" method="POST">

                            <input type="hidden" name="user_id" value="">
                            <div class="form-group py-2">

                                <input type="text" name="post_title" required class="form-control" placeholder="Post Title" maxlength="256">
                            </div>

                            <div class="form-group py-2">

                                <textarea name="post_details" required class="form-control" rows="3" placeholder="Write Your Post Here"></textarea>
                            </div>

                            <div class="form-group py-2">
                                <div class="col text-center"><input type="submit" value="Post Now" name="post_article" class="btn btn-primary"></div>

                            </div>
                        </form>

                    </div>

                </div>
            </div>

            <!-- end creating new post  -->
            <div class="post__card">
                <div class="post__title">
                    <h3 class="post__author">Full Name</h3>
                    <h4 class="post__upload-info">{{'Doctor'}}  |  {{'Date of post'}} </h4>
                </div>
                <div class="p-des">
                    <h5>Post title</h5>
                    <p class="p-des__article">
                        Post description
                    </p>
                    <div class="p-des__react-info" id="blah">
                        <div class="p-des__comment btn-comment"><span id="commnetsCount" class="comment-count"></span><span> comments</span><i class="picon-size fa-solid fa-comments"></i></div>
                        <div class="p-des__react"> <span id="reactCount">5 </span><a href="#" class="text-secondary"><i class="picon-size fa-solid fa-face-grin-hearts"></i></a></div>
                    </div>


                    <div class="p-des__comments comment-reply" id="commentsReply">
                        <hr>
                        <!-- comments form  -->
                        <form action="./backend/create_post.php" method="POST" class="mb-2">

                            <h6 class="p-des__reply-author py-2"> <a href="#" class="text-secondary">User Name</a> </h6>
                            <p class="text-center fs-6 text-danger">Please Login to comment</p>
                            <input type="hidden" name="user_id" value="">
                            <input type="hidden" name="post_id" value="">
                            <div class="">
                                <textarea name="comment" required rows="2" class="form-control " placeholder="Leave a Comment"></textarea>
                            </div>
                            <div class="text-end"><input class="btn btn-sm btn-secondary mt-1" type="submit" value="reply" name="btn-comment"></div>
                        </form>


                        <!-- show comments  -->
                        <div class="p-des__reply">
                            <h6 class="p-des__reply-author"> <a href="#" class="text-secondary">{{--<?= ucwords($comment['f_name'])  . ' ' . ucwords($comment['l_name'])  ?>--}}</a> </h6>

                            <p>Comment Description</p>
                            <div class="p-des__reply-info">
                                <p class="p-des__reply-time">Comment date</p>
                                <span class="p-des__reply-icon"><i class="picon-size fa-solid fa-face-grin-hearts"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



            <!-- page number  -->
            <div aria-label="Page navigation example">
                <ul class="pagination justify-content-center">
                    <li class="page-item disabled">
                        <a class="page-link">Previous</a>
                    </li>
                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#">Next</a>
                    </li>
                </ul>
            </div>
        </div>

        <!-- aside bar  -->
        <div class="community__aside com-aside">
            <h3 class="com-aside__title">Popular Posts</h3>
            <div class="com-aside__update aside-update">
                <h4 class="aside-update__header">&Lorem ipsum dolor, sit amet consectetur adipisicing elit.</h4>
                    <p class="aside-update__author">Post by Mayesha</p>
            </div>
        </div>

    </section>

@endsection

@section('scripts')
    <script>
        let btnComment;

        btnComment = document.querySelectorAll('.btn-comment');

        for (let i = 0; i < btnComment.length; i++) {
            btnComment[i].firstElementChild.textContent = btnComment[i].parentNode.nextElementSibling.children.length - 2;
            btnComment[i].addEventListener('click', () => {
                btnComment[i].parentNode.nextElementSibling.classList.toggle('comments-visible');
            })
        }
    </script>
@endsection
