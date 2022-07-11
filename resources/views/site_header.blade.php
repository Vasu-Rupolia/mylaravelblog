<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        {{-- CKEditor CDN --}}
        <script src="https://cdn.ckeditor.com/ckeditor5/23.0.0/classic/ckeditor.js"></script>

        <!-- Styles -->
        <style>
            

            body{
                margin:0px;
            }
            header{
                background-color: black;
                padding:10px;
            }
            header a{
                color:white;
                text-decoration:none;
                margin-left:40px;
            }
            header a:first-of-type{
                margin-left:0px;
            }
            header a:hover{
                color:#000000;
                background-color:#ffffff;
                
            }
            .links{
                width:50%;
                margin:auto;
                display:inline-block;
                text-align:center;
            }
            #form_box{
                width:34%;
                margin:auto;
                margin-top:40px;
            }
            #form_box input{
                width:100%;
                margin-bottom:10px;
                height:27px;
            }
            #form_box textarea{
                width:100%;
                height:70px;
            }
            #submit{
                background-color:cornflowerblue;
                color:#ffffff;
                padding:10px 14px;
                border:none;
            }
            .buttons:hover{
                cursor:pointer;
            }
            #posts_box{
                width:54%;
                margin:auto;
                margin-top: 40px;
                min-height:400px;
                padding: 40px;
                
            }
            .blog_post_link{
                text-decoration:none;
            }
            #logo_box{
                color:#ffffff;
                width:20%;
                font-size:20px;
                display:inline-block;
            }
            .update_button{
                background-color:orange;
                color:#ffffff;
                padding:10px 14px;
                border:none;
                text-decoration:none;
            }
            .delete_button{
                background-color:red;
                color:#ffffff;
                padding:10px 14px;
                border:none;
                text-decoration:none;
            }
            #adminlogin{
                background-color:cornflowerblue;
                color:#ffffff;
                padding:10px 14px;
                border:none;
            }
            h2{
                color:red;
                list-style: none;
            }

            @media only screen and (max-width: 600px){
                #form_box{
                    width:80%;
                    margin:auto;
                    margin-top:40px;
                }
                #posts_box{
                    width:80%;
                    margin:auto;
                    margin-top:40px;
                }
            }


        </style>
    </head>
    <body class="antialiased">    
        <header>
            <div id="logo_box">Laravel Blog </> </div>
            <div class="links">
                <?php
                if (Session::has('adminlogin')){
                ?>
                    <a href="/create_post">Create Post</a>
                    <a href="/admin_update_post">Update Post</a>
                    <a href="/create_post">Delete Post</a>
                    <a href="/adminlogout">Logout</a>
                <?php
                }else{
                    ?>
                    <a href="/adminlogin">Login as Admin</a>
                    <?php
                }
                ?>
                <a href="/show_posts">View All Posts</a>
                
            </div>
        </header>
