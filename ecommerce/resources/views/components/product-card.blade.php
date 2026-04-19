{{-- @props(['product'])

<a href="{{ route('shop.product', $product->slug) }}" class="product-card">
    <div class="image-container">
        @if($product->images && isset($product->images[0]))
            <img src="{{ asset('storage/' . $product->images[0]) }}" alt="{{ $product->name }}">
        @else
            <i class="iconoir-camera" style="font-size: 32px; opacity: 0.2;"></i>
        @endif
        <div class="quick-add"><i class="iconoir-plus"></i></div>
    </div>
    <div class="product-meta">
        <div>
            <h4>{{ $product->name }}</h4>
            <p>{{ $product->material ?? 'Local' }}</p>
        </div>
        <span class="price">${{ number_format($product->price, 2) }}</span>
    </div>
</a> --}}


@props(['product'])

<a href="{{ route('shop.product', $product->slug) }}" class="product-card">
    <div class="image-container">
        @if($product->images && isset($product->images[0]))
            <img src="{{ $product->images[0]}}" alt="{{ $product->name }}">
        @else
            <i class="iconoir-camera" style="font-size: 32px; opacity: 0.2;"></i>
        @endif
        <div class="quick-add"><i class="iconoir-plus"></i></div>
    </div>
    <div class="product-meta">
        <div>
            <h4>{{ $product->name }}</h4>
            <p>{{ $product->material ?? 'Local' }}</p>
        </div>
        <span class="price">${{ number_format($product->price, 2) }}</span>
    </div>
</a>