

<section class="segment-margin community px-2 mb-5">
<!-- post sectoin  -->
    <div class="community__post post">

    <!-- creating new post section  -->
    <div class="post__card">
        <div class="post__title">
            {{-- <p id="login_warning" class="text-center fs-4 text-danger">Please Login to create a new post</p> --}}
            <h3 class="post__author">Create a new post</h3>
        </div>
        <div class="p-des">
            <div class="p-des__article">

                <form action="./backend/create_post.php" class="needs-validation" method="POST" novalidate>

                    <div class="form-group py-2">

                        <input type="text" name="title" required class="form-control" placeholder="Post Title" maxlength="256">
                    </div>

                    <div class="form-group py-2">

                        <textarea name="description" required class="form-control" rows="3" placeholder="Write Your Post Here"></textarea>
                    </div>

                    <input type="hidden" name="frmPost" value="article">

                    <div class="form-group py-2">
                        <div class="col text-center">
                            {{-- <input type="submit" value="" name="post" class="btn btn-primary"> --}}
                            <button id="btnPostArticle" class="btn btn-primary" type="submit" name="post" value="article">Post</button>
                        </div>

                    </div>
                </form>

            </div>

        </div>
    </div>

    <!-- end creating new post  -->
    <div class="post__card">
        <div class="post__title">
            <h3 class="post__author">Full Name</h3>
            {{-- <h4 class="post__upload-info">{{'Doctor'}}  |  {{'Date of post'}} </h4> --}}
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
                    {{-- <p class="text-center fs-6 text-danger">Please Login to comment</p> --}}
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

</div>

