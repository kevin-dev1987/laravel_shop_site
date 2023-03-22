<header>
    <div class="user-interaction">
        <div class="auth">
            <a href="#">
                <i class="bi bi-person-vcard-fill"></i>
                <span>Register</span>
            </a>
            <div>|</div>
            <a href="#">
                <i class="bi bi-person-fill"></i>
                <span>Login</span>
            </a>
        </div>
        <div class="shopping-tools">
            <div class="item">
                DELIVERY
                <i class="bi bi-truck"></i>
            </div>
            <div class="item">
                HELP
                <i class="bi bi-chat-fill"></i>
            </div>
            <div class="item">
                BASKET
                <i class="bi bi-basket-fill"></i>
            </div>
        </div>
    </div>
    <div class="header-mid">
        <div class="logo">
            <h1>My<span>Store</span></h1>
        </div>
        <div class="search">
            <form action="#" method="get">
                <div class="input-block">
                    <input type="search" name="site-search" id="site_search" placeholder="Search products...">
                    <select name="search-category" id="search_category">
                        <option value="Electronics">Electronics</option>
                        <option value="Gardening">Gardening</option>
                        <option value="Computing">Computing</option>
                        <option value="Toys">Toys</option>
                        <option value="Health">Health</option>
                    </select>
                </div>
                <button type="submit" class="btn-search">Search</button>
            </form>
        </div>
    </div>
    <nav>
        <ul>
            <a href="{{route('index')}}">Home</a>
            <a href="#">My Favourites</a>
            <a href="{{route('categories')}}">All Categories</a>
            <a href="{{route('products', ['category' => 'electronics'])}}">Electronics</a>
            <a href="{{route('products', ['category' => 'gardening'])}}">Gardening</a>
            <a href="{{route('products', ['category' => 'computing'])}}">Computing</a>
            <a href="{{route('products', ['category' => 'toys'])}}">Toys</a>
            <a href="{{route('products', ['category' => 'health'])}}">Health</a>
        </ul>
    </nav>
</header>