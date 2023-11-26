<div>
    <!-- Product Details Section Begin -->
    <section class="product-details spad">
        <div class="container">

            @if (Session::has('success'))
                @include('components.alert', [
                    'message' => Session::get('success'),
                    'type' => 'success',
                ])
            @endif

            <div class="row">
                <form wire:submit.prevent="saveProduct()" style="width:100%;display:flex;">

                    <div class="col-lg-6 col-md-6 d-flex align-items-center justify-content-center">
                        <div class="product__details__pic">
                            <div class="product__details__pic__item" style="width: 250px;">
                                <img class="product__details__pic__item--large"
                                    src="{{ $image ? $image->temporaryUrl() : asset('storage/' . $item->image) }}"
                                    alt="">
                            </div>
                            <input type="file" accept=".jpg, .jpeg, .png"
                                style="background-color: #000; border-radius: 10px; color: #fff;"
                                wire:model.live="image">
                        </div>
                    </div>

                    {{-- $image ? $image->temporaryUrl() : $imagePlaceholder --}}

                    <div class="col-lg-6 col-md-6">
                        <div wire:loading wire:target="saveProduct()">
                            <livewire:components.loader />
                        </div>

                        @if (Session::has('success'))
                            @include('components.field-error', ['message' => Session::get('success')])
                        @endif


                        <div class="checkout__order" style="background-color: #cfcfcf;border-radius:5px;">

                            {{-- Product Name --}}
                            <div class="checkout__input">
                                <h6>Name
                                    <span>*
                                        @error('name')
                                            @include('components.field-error', ['message' => $message])
                                        @enderror
                                    </span>
                                </h6>
                                <input type="text" wire:model.live="name">
                            </div>


                            {{-- Product Description --}}
                            <div class="checkout__input">
                                <h6>Description
                                    <span>*
                                        @error('description')
                                            @include('components.field-error', ['message' => $message])
                                        @enderror
                                    </span>
                                </h6>
                                <input type="text" wire:model.live="description">
                            </div>


                            {{-- Product Price --}}
                            <div class="checkout__input">
                                <h6>Price
                                    <span>*
                                        @error('price')
                                            @include('components.field-error', ['message' => $message])
                                        @enderror
                                    </span>
                                </h6>
                                <input type="number" wire:model.live="price">
                            </div>


                            {{-- Product Stock Count --}}
                            <div class="checkout__input">
                                <h6>In Stock
                                    <span>*
                                        @error('stock')
                                            @include('components.field-error', ['message' => $message])
                                        @enderror
                                    </span>
                                </h6>
                                <input type="number" wire:model.live="stock">
                            </div>

                            <div class="checkout__input">
                                <button type="submit" class="site-btn" style="background-color: #000;">
                                    Submit
                                </button>
                            </div>

                            <div class="checkout__input">
                                <button class="site-btn" style="background-color: red;" wire:click="deleteProduct()">
                                    Delete
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!-- Product Details Section End -->
</div>
