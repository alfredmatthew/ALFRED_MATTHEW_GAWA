<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Articles</title>
    <link rel="icon" href="{{ asset('favicon.png') }}" sizes="32x32">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
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
