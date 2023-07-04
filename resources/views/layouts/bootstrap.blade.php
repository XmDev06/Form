<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/3d2d859c73.js" crossorigin="anonymous"></script>

    <script
        src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"></script>

    <title>FORUM </title>
    <style>
        body {
            margin-top: 20px;
            background: #eee;
            color: #708090;
        }

        .icon-1x {
            font-size: 24px !important;
        }

        a {
            text-decoration: none;
        }

        .text-primary, a.text-primary:focus, a.text-primary:hover {
            color: #00ADBB !important;
        }

        .text-black, .text-hover-black:hover {
            color: #000 !important;
        }

        .font-weight-bold {
            font-weight: 700 !important;
        }

        .postcard {
            flex-wrap: wrap;
            display: flex;
            box-shadow: 0 4px 21px -12px rgba(0, 0, 0, 0.66);
            border-radius: 10px;
            margin: 0 0 2rem 0;
            overflow: hidden;
            position: relative;
            color: #ffffff;
        }

        .postcard.dark {
            background-color: #18151f;
        }

        .postcard.light {
            background-color: #e1e5ea;
        }

        .postcard .t-dark {
            color: #18151f;
        }

        .postcard a {
            color: inherit;
        }

        .postcard h1,
        .postcard .h1 {
            margin-bottom: 0.5rem;
            font-weight: 500;
            line-height: 1.2;
        }

        .postcard .small {
            font-size: 80%;
        }

        .postcard .postcard__title {
            font-size: 1.75rem;
        }

        .postcard .postcard__img {
            max-height: 180px;
            width: 100%;
            object-fit: cover;
            position: relative;
        }

        .postcard .postcard__img_link {
            display: contents;
        }

        .postcard .postcard__bar {
            width: 50px;
            height: 10px;
            margin: 10px 0;
            border-radius: 5px;
            background-color: #424242;
            transition: width 0.2s ease;
        }

        .postcard .postcard__text {
            padding: 1.5rem;
            position: relative;
            display: flex;
            flex-direction: column;
        }

        .postcard .postcard__preview-txt {
            overflow: hidden;
            text-overflow: ellipsis;
            text-align: justify;
            height: 100%;
        }

        .postcard .postcard__tagbox {
            display: flex;
            flex-flow: row wrap;
            font-size: 14px;
            margin: 20px 0 0 0;
            padding: 0;

        }

        .postcard .postcard__tagbox .tag__item {
            display: inline-block;
            background: rgba(83, 83, 83, 0.4);
            border-radius: 3px;
            padding: 2.5px 10px;
            margin: 0 5px 5px 0;
            cursor: default;
            user-select: none;
            transition: background-color 0.3s;
        }

        .postcard .postcard__tagbox .tag__item:hover {
            background: rgba(83, 83, 83, 0.8);
        }

        .postcard:before {
            content: "";
            position: absolute;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            background-image: linear-gradient(-70deg, #424242, transparent 50%);
            opacity: 1;
            border-radius: 10px;
        }

        .postcard:hover .postcard__bar {
            width: 100px;
        }

        @media screen and (min-width: 769px) {
            .postcard {
                flex-wrap: inherit;
            }

            .postcard .postcard__title {
                font-size: 2rem;
            }

            .postcard .postcard__tagbox {
                justify-content: start;
            }

            .postcard .postcard__img {
                max-width: 300px;
                max-height: 100%;
                transition: transform 0.3s ease;
            }

            .postcard .postcard__text {
                padding: 3rem;
                width: 100%;
            }

            .postcard .media.postcard__text:before {
                content: "";
                position: absolute;
                display: block;
                background: #18151f;
                top: -20%;
                height: 130%;
                width: 55px;
            }

            .postcard:hover .postcard__img {
                transform: scale(1.1);
            }

            .postcard:nth-child(2n+1) {
                flex-direction: row;
            }

            .postcard:nth-child(2n+0) {
                flex-direction: row-reverse;
            }

            .postcard:nth-child(2n+1) .postcard__text::before {
                left: -12px !important;
                transform: rotate(4deg);
            }

            .postcard:nth-child(2n+0) .postcard__text::before {
                right: -12px !important;
                transform: rotate(-4deg);
            }
        }

        @media screen and (min-width: 1024px) {
            .postcard__text {
                padding: 2rem 3.5rem;
            }

            .postcard__text:before {
                content: "";
                position: absolute;
                display: block;
                top: -20%;
                height: 130%;
                width: 55px;
            }

            .postcard.dark .postcard__text:before {
                background: #18151f;
            }

            .postcard.light .postcard__text:before {
                background: #e1e5ea;
            }
        }

        /* COLORS */
        .postcard .postcard__tagbox .green.play:hover {
            background: #79dd09;
            color: black;
        }

        .green .postcard__title:hover {
            color: #79dd09;
        }

        .green .postcard__bar {
            background-color: #79dd09;
        }

        .green::before {
            background-image: linear-gradient(-30deg, rgba(121, 221, 9, 0.1), transparent 50%);
        }

        .green:nth-child(2n)::before {
            background-image: linear-gradient(30deg, rgba(121, 221, 9, 0.1), transparent 50%);
        }

        .postcard .postcard__tagbox .blue.play:hover {
            background: #0076bd;
        }

        .blue .postcard__title:hover {
            color: #0076bd;
        }

        .blue .postcard__bar {
            background-color: #0076bd;
        }

        .blue::before {
            background-image: linear-gradient(-30deg, rgba(0, 118, 189, 0.1), transparent 50%);
        }

        .blue:nth-child(2n)::before {
            background-image: linear-gradient(30deg, rgba(0, 118, 189, 0.1), transparent 50%);
        }

        .postcard .postcard__tagbox .red.play:hover {
            background: #bd150b;
        }

        .red .postcard__title:hover {
            color: #bd150b;
        }

        .red .postcard__bar {
            background-color: #bd150b;
        }

        .red::before {
            background-image: linear-gradient(-30deg, rgba(189, 21, 11, 0.1), transparent 50%);
        }

        .red:nth-child(2n)::before {
            background-image: linear-gradient(30deg, rgba(189, 21, 11, 0.1), transparent 50%);
        }

        .postcard .postcard__tagbox .yellow.play:hover {
            background: #bdbb49;
            color: black;
        }

        .yellow .postcard__title:hover {
            color: #bdbb49;
        }

        .yellow .postcard__bar {
            background-color: #bdbb49;
        }

        .yellow::before {
            background-image: linear-gradient(-30deg, rgba(189, 187, 73, 0.1), transparent 50%);
        }

        .yellow:nth-child(2n)::before {
            background-image: linear-gradient(30deg, rgba(189, 187, 73, 0.1), transparent 50%);
        }

        @media screen and (min-width: 769px) {
            .green::before {
                background-image: linear-gradient(-80deg, rgba(121, 221, 9, 0.1), transparent 50%);
            }

            .green:nth-child(2n)::before {
                background-image: linear-gradient(80deg, rgba(121, 221, 9, 0.1), transparent 50%);
            }

            .blue::before {
                background-image: linear-gradient(-80deg, rgba(0, 118, 189, 0.1), transparent 50%);
            }

            .blue:nth-child(2n)::before {
                background-image: linear-gradient(80deg, rgba(0, 118, 189, 0.1), transparent 50%);
            }

            .red::before {
                background-image: linear-gradient(-80deg, rgba(189, 21, 11, 0.1), transparent 50%);
            }

            .red:nth-child(2n)::before {
                background-image: linear-gradient(80deg, rgba(189, 21, 11, 0.1), transparent 50%);
            }

            .yellow::before {
                background-image: linear-gradient(-80deg, rgba(189, 187, 73, 0.1), transparent 50%);
            }

            .yellow:nth-child(2n)::before {
                background-image: linear-gradient(80deg, rgba(189, 187, 73, 0.1), transparent 50%);
            }
        }

        @import url("https://fonts.googleapis.com/css2?family=Baloo+2&display=swap");
    </style>
</head>
<body style="background: #110f16;">

<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container-fluid">
        <a class="navbar-brand" href="/">Forum</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="/dashboard">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/post">Posts</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                       data-bs-toggle="dropdown" aria-expanded="false">
                        Categories
                    </a>
                    <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="{{route('post')}}">All</a></li>
                        @foreach(\App\Models\Category::all() as $category)
                            <li><a class="dropdown-item"
                                   href="{{route('post')}}?category_id={{$category->id}}">{{$category->name}}</a></li>
                        @endforeach
                    </ul>
                </li>
            </ul>
            <ul class="navbar-nav d-flex flex-row me-3 mb-sm-0 mb-2">
                <li class="nav-item">
                    <a class="nav-link btn-sm px-2 btn-primary" href="#" data-bs-toggle="modal"
                       data-bs-target="#exampleModal">Add Post</a>
                </li>
            </ul>

            <form class="w-auto" action="{{route('post.search')}}" method="post">
                @csrf
                <input name="search" type="search" class="form-control typeahead" placeholder="Search"
                       aria-label="Search post">
            </form>

            <ul class="mx-3 me-5 navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                       data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-user"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDropdown">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <a class="dropdown-item" onclick="event.preventDefault();
                                                            this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </a>
                        </form>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>

@yield('content')

<script>
    let path = "{{route('ajax')}}";
    $('input.typeahead').typeahead({
        source: function (terms, process) {
            return $.get(path, {terms: terms}, function (data) {
                return process(data);
            })
        }
    })
</script>

{{--<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>--}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>


{{--<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"--}}
{{--        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"--}}
{{--        crossorigin="anonymous"></script>--}}
{{--<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"--}}
{{--        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"--}}
{{--        crossorigin="anonymous"></script>--}}
</body>
</html>
