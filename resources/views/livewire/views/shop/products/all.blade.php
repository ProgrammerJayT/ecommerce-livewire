<div>
    <!-- Hero Section Begin -->
    <section class="hero">
        <div class="container">
            <div class="row">

                <div class="col-lg-3">
                    <livewire:components.sidebar />
                </div>


                <div class="col-lg-9">
                    <div class="hero__search">
                        <div class="hero__search__form">
                            <form>
                                <input style="width:100%;" type="text" placeholder="Search for a product">
                            </form>
                        </div>

                        <div class="hero__search__phone">
                            <div class="hero__search__phone__icon">
                                <i class="fa fa-phone"></i>
                            </div>
                            <div class="hero__search__phone__text">
                                <h5>+27 606 447 885</h5>
                                <span>Support 24/7 </span>
                            </div>
                        </div>
                    </div>

                    <div class="filter__item">
                        <div class="row">
                            <div class="col-lg-4 col-md-5">
                                <div class="filter__sort">
                                    <span>Sort By</span>
                                    <select>
                                        <option value="0">Default</option>
                                        <option value="name-asc">Name-Asc</option>
                                        <option value="name-desc">Name-Desc</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <div class="filter__found">
                                    <h6><span>{{ count($items) }}</span> Product(s) found</h6>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-3">
                                <div class="filter__option">
                                    <span class="icon_grid-2x2"></span>
                                    <span class="icon_ul"></span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        @unless (count($items) > 0)
                            <h3>No items found in store</h3>
                        @else
                            @foreach ($items as $item)
                                <div wire:key="{{ $item->product_id }}" class="col-lg-3 col-md-6 col-sm-6">
                                    <div class="product__item" style="cursor: pointer;"
                                        wire:click="viewProduct({{ $item->product_id }})">

                                        <div wire:loading wire:target="addToCart({{ $item->product_id }})">
                                            <livewire:components.loader />
                                        </div>

                                        <div class="product__item__pic set-bg"
                                            data-setbg="{{ asset('storage/' . $item->image) }}">
                                        </div>

                                        <span style="color:{{ $item->qty == 0 ? 'red' : 'green' }};font-weight:bold;">
                                            {{ $item->qty == 0 ? 'Out of stock' : 'In stock' }}
                                        </span>

                                        <div class="product__item__text">
                                            <h6>
                                                <a>{{ $item->name }}</a>

                                            </h6>

                                            <h5 style="color: {{ $item->user_id ? null : 'red' }}">
                                                {{ $item->user_id ? 'R' . $item->price : 'Display product' }}</h5>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endunless
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->
</div>