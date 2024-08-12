<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Articles</title>
    <link rel="icon" href="{{ asset('favicon.png') }}" sizes="32x32">
    <!-- <link rel="stylesheet" href="{{ asset('css/style.css') }}"> -->
     <style>
        @import url('https://fonts.googleapis.com/css2?family=Lexend+Deca:wght@100..900&display=swap');

        :root {
            --color-white: #FFFFFF;
            --color-orange: #ff6600;
            --primary-font: "Lexend Deca", sans-serif;
        }

        body 
        {
            font-family: var(--primary-font);
            font-weight: 400;
            font-size: 14px;
            background-color: var(--color-white);
            margin: 0;
            padding: 0;
            overflow-x: hidden;
        }

        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px 10%;
            background-color: var(--color-orange);
        }

        .navigation-bar li a {
            font-weight: 600;
            color: var(--color-white);
            text-decoration: none;
        }

        .navigation-bar img {
            width: 100px;
            cursor: pointer;
        }

        .nav-links {
            list-style: none;
        }

        .nav-links li {
            display: inline-block;
            padding: 0px 20px;
        }

        .nav-links li a:hover {
            font-weight: 700;
            text-decoration: underline;
            text-underline-offset: 5px;
        }

        .nav-links .active {
            font-weight: 700;
            line-height: 1.5rem;
            text-decoration: underline;
            text-underline-offset: 5px;
        }

        .header-dengan-image {
            background: url('../images/idea-img.jpg') no-repeat;
            background-size: cover;
            width: 100%;
            height: 60vh;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 2rem;
            position: relative;
            transform: skewY(-5deg) translateY(calc(60vh - 120%));
            z-index: -1;
            top: 0;
        }

        .judul {
            display:flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            margin-top: 6rem;
            transform: skewY(5deg);
        }

        .judul h1 {
            font-size: 2.5rem;
            color: var(--color-white);
            margin: 5px 0;
        }

        .judul p {
            color: var(--color-white);
            margin: 0;
        }
        .container {
            width: 80%;
            margin: auto;
            overflow: hidden;
        }

        .card {
            background: #fff;
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 0;
            margin: 16px 0;
            box-shadow: 0px 0px 10px 7px rgba(0,0,0,0.1);
        }

        .card-image {
            width: 100%;
            height: 200px;
            background: #ddd;
            border-radius: 8px 8px 0 0;
            margin-bottom: 16px;
            overflow: hidden;
        }

        .isi-card {
            padding: 0 1.5rem 1.5rem 1.5rem; 
        }

        .card h2 {
            margin: 0 0 12px 0;
            font-size: 1.5em;
            color: #333;
        }
        .card p {
            margin: 0 0 8px 0;
            color: #777;
        }
        .card .date {
            font-size: 0.9em;
            color: #999;
        }
        .card-container {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 16px;
            margin-bottom: 2rem;
        }


        .card-container .card img {
            background-size: cover;
        }
        .form-group {
            display: flex;
            align-items: center;
            flex-wrap: wrap; } 
            @media (max-width: 600px) {
                .form-group {
                    display:flex;
                    align-self: baseline;
                    flex-wrap: wrap;}
            }
        .form-component {
            margin-left: auto;
        }
        #size {
            margin-right: 20px;
            padding: 4px;
            min-width: 100px;
        }
        #sort {
            min-width: 100px;
            padding: 4px;
        }
        .pagination {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-bottom: 20px;
        }

        .pagination-link {
            margin: 0 5px;
            padding: 5px 10px;
            text-decoration: none;
            color: #333;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .pagination-link:hover {
            background-color: #333;
            color: #fff;
        }

        .pagination-link.active {
            background-color: #333;
            color: #fff;
            border-color: #333;
        }

        .pagination-link.disabled {
            color: #ccc;
            border-color: #ccc;
            pointer-events: none;
        }

     </style>
</head>
<body>
    <header class="navigation-bar">
        <img src="{{ asset('images/logo-white-img.png')}}" alt="" class="logo" loading="lazy">
        <nav>
            <ul class="nav-links">
                <li><a href="#">Work</a></li>
                <li><a href="#">About</a></li>
                <li><a href="#">Services</a></li>
                <li><a href="#" class="active">Ideas</a></li>
                <li><a href="#">Careers</a></li>
                <li><a href="#">Contact</a></li>
            </ul>
        </nav>
    </header>

    <div class="header-dengan-image" loading="lazy">
        <div class="judul">
            <h1>Ideas</h1>
            <p>Where all our great things begin</p>
        </div>
    </div>

    <div class="container">
        <!-- Komponen Sort By & Show per page -->
        <div class="form-group">
            <div class="text">
                <p>
                    Showing {{ ($meta['current_page'] - 1) * $meta['per_page'] + 1 }} - 
                    {{ min($meta['current_page'] * $meta['per_page'], $meta['total']) }} of 
                    {{ $meta['total'] }}
                </p>
            </div>
            <div class="form-component">
                <form method="GET" action="/" id="filterForm">
                    <label for="size">Show per page:</label>
                    <select name="size" id="size" onchange="submitForm()">
                        <option value="5" {{ request('size') == 5 ? 'selected' : '' }}>5</option>
                        <option value="10" {{ request('size') == 10 ? 'selected' : '' }}>10</option>
                        <option value="50" {{ request('size') == 50 ? 'selected' : '' }}>50</option>
                    </select>

                    <label for="sort">Sort by:</label>
                    <select name="sort" id="sort" onchange="submitForm()">
                        <option value="published_at" {{ request('sort') == 'published_at' ? 'selected' : '' }}>Oldest</option>
                        <option value="-published_at" {{ request('sort') == '-published_at' ? 'selected' : '' }}>Newest</option>
                    </select>
                </form>
            </div>
        </div>

        <!-- Artikel -->
        <div class="card-container">
            @foreach($articles as $article)
                <div class="card">
                <img src="{{ asset('images/card-img.jpg')}}" alt="" class="card-image" loading="lazy">
                    <div class="isi-card">
                        <p class="date">Published on: {{ \Carbon\Carbon::parse($article['published_at'])->format('M d, Y') }}</p>
                        <h2>{{ $article['title'] }}</h2>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <div class="pagination">
        @if(isset($links['first']))
            <form action="{{ url()->current() }}" method="GET" class="pagination-form">
                <input type="hidden" name="page" value="1">
                <button type="submit" class="pagination-link">«</button>
            </form>
        @else
            <span class="pagination-link disabled">«</span>
        @endif

        @if(isset($links['prev']))
            <form action="{{ url()->current() }}" method="GET" class="pagination-form">
                <input type="hidden" name="page" value="{{ $meta['current_page'] - 1 }}">
                <button type="submit" class="pagination-link">‹</button>
            </form>
        @else
            <span class="pagination-link disabled">‹</span>
        @endif

        @for($i = max($meta['current_page'] - 1, 1); $i <= min($meta['current_page'] + 1, $meta['total']); $i++)
            <form action="{{ url()->current() }}" method="GET" class="pagination-form">
                <input type="hidden" name="page" value="{{ $i }}">
                <input type="hidden" name="size" value="{{ request('size', 10) }}">
                <input type="hidden" name="sort" value="{{ request('sort', '-published_at') }}">
                <button type="submit" class="pagination-link {{ $meta['current_page'] == $i ? 'active' : '' }}">
                    {{ $i }}
                </button>
            </form>
        @endfor

        @if(isset($links['next']))
            <form action="{{ url()->current() }}" method="GET" class="pagination-form">
                <input type="hidden" name="page" value="{{ $meta['current_page'] + 1 }}">
                <button type="submit" class="pagination-link">›</button>
            </form>
        @else
            <span class="pagination-link disabled">›</span>
        @endif

        @if(isset($links['last']))
            <form action="{{ url()->current() }}" method="GET" class="pagination-form">
                <input type="hidden" name="page" value="{{ $meta['last_page'] }}">
                <button type="submit" class="pagination-link">»</button>
            </form>
        @else
            <span class="pagination-link disabled">»</span>
        @endif
    </div>

    <script>
        function submitForm() {
            document.getElementById('filterForm').submit();
        }
    </script>
</body>
</html>
