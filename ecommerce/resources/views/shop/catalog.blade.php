@extends('layouts.app')

@section('title', 'All Objects — Aura Studio')

@section('content')
    {{-- header--}}
    <section class="page-header container">
        <div class="breadcrumb">
            <a href="{{ url('/') }}">Home</a> <span>/</span> <a href="#">Shop</a> <span>/</span> Objects
        </div>
        <div class="page-header-content">
            <div class="page-title">
                <h1>Curated objects</h1>
                <p style="margin-top: 16px;">A selection of tactile, grounding pieces designed to bring balance to your daily environment. Crafted slowly with organic materials.</p>
            </div>
            <svg class="organic-accent" viewBox="0 0 100 100" stroke="var(--accent-terracotta)" stroke-width="1.5" fill="none" stroke-linecap="round" stroke-linejoin="round">
                {{-- SVG موجود مسبقاً --}}
            </svg>
        </div>
    </section>

    {{--filters --}}
    <section class="shop-layout container grid-12">
        <aside class="sidebar">
            <div class="filter-group">
                <h3>Category</h3>
                <ul class="filter-list">
                    @foreach($categories as $category)
                        <li>
                            <label class="checkbox-label">
                                <input type="checkbox" name="category[]" value="{{ $category->id }}" 
                                    {{ in_array($category->id, request('category', [])) ? 'checked' : '' }}>
                                <div class="checkmark"></div>
                                <span>{{ $category->name }}</span>
                            </label>
                        </li>
                    @endforeach
                </ul>
            </div>
        </aside>

        <div class="products-area">
            <div class="sorting-bar">
                <div class="product-count">Showing {{ $products->firstItem() }}–{{ $products->lastItem() }} of {{ $products->total() }} pieces</div>
                <div class="sort-dropdown">
                    <label for="sort" style="color: var(--text-secondary);">Sort by:</label>
                    <select id="sort" name="sort" onchange="this.form.submit()" form="filter-form">
                        <option value="newest" {{ request('sort') == 'newest' ? 'selected' : '' }}>Curated selection</option>
                        <option value="price_asc" {{ request('sort') == 'price_asc' ? 'selected' : '' }}>Price: Low to High</option>
                        <option value="price_desc" {{ request('sort') == 'price_desc' ? 'selected' : '' }}>Price: High to Low</option>
                    </select>
                </div>
            </div>

            <form id="filter-form" method="GET" action="{{ route('shop.catalog') }}">
                {{-- نضع هنا حقول الفلاتر المخفية لتُرسل مع النموذج --}}
            </form>

            <div class="products-grid">
                @forelse($products as $product)
                    <x-product-card :product="$product" />
                @empty
                    <p>No products found.</p>
                @endforelse
            </div>

            {{ $products->withQueryString()->links('pagination.custom') }}
        </div>
    </section>
@endsection