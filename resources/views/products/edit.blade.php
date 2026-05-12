@extends('layouts.main')

@section('content')

<div class="container mt-5 d-flex justify-content-center">

    <div class="card border-0"
         style="
            width: 780px;
            border-radius: 30px;
            background: linear-gradient(145deg, #ffb6d9, #ffcce5);
            box-shadow: 0 10px 30px rgba(255, 105, 180, 0.25);
            overflow: hidden;
         ">

        {{-- Header --}}
        <div class="text-center py-4"
             style="
                background: linear-gradient(90deg, #ff4fa3, #ff85c2);
             ">

            <h1 class="fw-bold text-white mb-1">
                Edit Barang
            </h1>

            <p class="text-white mb-0">
                Form Update Data Inventaris
            </p>

        </div>

        {{-- Body --}}
        <div class="card-body px-5 py-5">

            <form action="{{ route('products.update', $product->id) }}" method="POST">
                @csrf
                @method('PUT')

                {{-- Nama Barang --}}
                <div class="mb-4">
                    <label class="form-label fw-bold"
                           style="color:#c2185b;">
                        Nama Barang
                    </label>

                    <input type="text"
                           class="form-control"
                           name="name"
                           value="{{ $product->name }}"
                           required
                           style="
                                border-radius:15px;
                                border:none;
                                padding:14px;
                                box-shadow:0 4px 10px rgba(0,0,0,0.08);
                           ">
                </div>

                {{-- Kategori --}}
                <div class="mb-4">
                    <label class="form-label fw-bold"
                           style="color:#c2185b;">
                        Kategori
                    </label>

                    <select class="form-select"
                            name="category_id"
                            required
                            style="
                                border-radius:15px;
                                border:none;
                                padding:14px;
                                box-shadow:0 4px 10px rgba(0,0,0,0.08);
                            ">

                        @foreach($categories as $c)
                            <option value="{{ $c->id }}"
                                {{ $product->category_id == $c->id ? 'selected' : '' }}>
                                {{ $c->name }}
                            </option>
                        @endforeach

                    </select>
                </div>

                {{-- Harga dan Stok --}}
                <div class="row">

                    <div class="col-md-6 mb-4">
                        <label class="form-label fw-bold"
                               style="color:#c2185b;">
                            Harga
                        </label>

                        <input type="number"
                               class="form-control"
                               name="price"
                               value="{{ $product->price }}"
                               required
                               style="
                                    border-radius:15px;
                                    border:none;
                                    padding:14px;
                                    box-shadow:0 4px 10px rgba(0,0,0,0.08);
                               ">
                    </div>

                    <div class="col-md-6 mb-4">
                        <label class="form-label fw-bold"
                               style="color:#c2185b;">
                            Stok
                        </label>

                        <input type="number"
                               class="form-control"
                               name="stock"
                               value="{{ $product->stock }}"
                               required
                               style="
                                    border-radius:15px;
                                    border:none;
                                    padding:14px;
                                    box-shadow:0 4px 10px rgba(0,0,0,0.08);
                               ">
                    </div>

                </div>

                {{-- Deskripsi --}}
                <div class="mb-4">
                    <label class="form-label fw-bold"
                           style="color:#c2185b;">
                        Deskripsi
                    </label>

                    <textarea class="form-control"
                              name="description"
                              rows="4"
                              style="
                                    border-radius:15px;
                                    border:none;
                                    padding:14px;
                                    box-shadow:0 4px 10px rgba(0,0,0,0.08);
                              ">{{ $product->description }}</textarea>
                </div>

                {{-- Status --}}
                <div class="mb-5">
                    <label class="form-label fw-bold"
                           style="color:#c2185b;">
                        Status
                    </label>

                    <select class="form-select"
                            name="status"
                            required
                            style="
                                border-radius:15px;
                                border:none;
                                padding:14px;
                                box-shadow:0 4px 10px rgba(0,0,0,0.08);
                            ">

                        <option value="">Pilih Status</option>
                        <option value="Tersedia"
                            {{ $product->status == 'Tersedia' ? 'selected' : '' }}>
                            Tersedia
                        </option>

                        <option value="Tidak Tersedia"
                            {{ $product->status == 'Habis' ? 'selected' : '' }}>
                            Habis
                        </option>

                    </select>
                </div>

                {{-- Tombol --}}
                <div class="text-center">

                    <button type="submit"
                            class="btn text-white fw-bold"
                            style="
                                background: linear-gradient(90deg, #ff4fa3, #ff2e93);
                                border:none;
                                border-radius:50px;
                                padding:14px 45px;
                                font-size:17px;
                                box-shadow:0 8px 18px rgba(255, 20, 147, 0.35);
                            ">

                         Update Data

                    </button>

                </div>

            </form>

        </div>
    </div>

</div>

@endsection