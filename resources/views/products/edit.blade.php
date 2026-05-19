@extends('layouts.main')

@section('content')

<div class="container mt-5">

    <div class="row justify-content-center">

        <div class="col-md-8">

            <div class="card">

                {{-- Header --}}
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">Edit Barang</h4>
                </div>

                {{-- Body --}}
                <div class="card-body">

                    <form action="{{ route('products.update', $product->id) }}" method="POST">

                        @csrf
                        @method('PUT')

                        {{-- Nama Barang --}}
                        <div class="mb-3">
                            <label class="form-label">Nama Barang</label>

                            <input type="text"
                                   class="form-control"
                                   name="name"
                                   value="{{ $product->name }}"
                                   required>
                        </div>

                        {{-- Kategori --}}
                        <div class="mb-3">
                            <label class="form-label">Kategori</label>

                            <select class="form-select"
                                    name="category_id"
                                    required>

                                @foreach($categories as $c)
                                    <option value="{{ $c->id }}"
                                        {{ $product->category_id == $c->id ? 'selected' : '' }}>
                                        {{ $c->name }}
                                    </option>
                                @endforeach

                            </select>
                        </div>

                        {{-- Harga --}}
                        <div class="mb-3">
                            <label class="form-label">Harga</label>

                            <input type="number"
                                   class="form-control"
                                   name="price"
                                   value="{{ $product->price }}"
                                   required>
                        </div>

                        {{-- Stok --}}
                        <div class="mb-3">
                            <label class="form-label">Stok</label>

                            <input type="number"
                                   class="form-control"
                                   name="stock"
                                   value="{{ $product->stock }}"
                                   required>
                        </div>

                        {{-- Deskripsi --}}
                        <div class="mb-3">
                            <label class="form-label">Deskripsi</label>

                            <textarea class="form-control"
                                      name="description"
                                      rows="4">{{ $product->description }}</textarea>
                        </div>

                        {{-- Status --}}
                        <div class="mb-3">
                            <label class="form-label">Status</label>

                            <select class="form-select"
                                    name="status"
                                    required>

                                <option value="Tersedia"
                                    {{ $product->status == 'Tersedia' ? 'selected' : '' }}>
                                    Tersedia
                                </option>

                                <option value="Tidak Tersedia"
                                    {{ $product->status == 'Tidak Tersedia' ? 'selected' : '' }}>
                                    Tidak Tersedia
                                </option>

                            </select>
                        </div>

                        {{-- Tombol --}}
                        <button type="submit" class="btn btn-primary">
                            Update Data
                        </button>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection