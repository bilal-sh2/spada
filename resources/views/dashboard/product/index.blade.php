@extends('layouts.dashboard.layouts')

@section('content')
    <style>
        .img-height {
            height: 350px !important;
            width: 100%;
            overflow: hidden;
            object-fit: contain;
        }
    </style>

    <div class="content-header row">
        <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h2 class="content-header-title float-start mb-0">{{ __('Products') }}</h2>
                    <div class="breadcrumb-wrapper">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/dashboard">{{ __('Home') }}</a>
                            </li>
                            <li class="breadcrumb-item active"><a href="#">{{ __('Products') }}</a>
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>


    @if (session('success'))
        <div class="demo-spacing-0 mb-2">
            <div class="alert alert-primary mt-1 alert-validation-msg" role="alert">
                <div class="alert-body d-flex align-items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="feather feather-info me-50">
                        <circle cx="12" cy="12" r="10"></circle>
                        <line x1="12" y1="16" x2="12" y2="12"></line>
                        <line x1="12" y1="8" x2="12.01" y2="8"></line>
                    </svg>
                    <span><strong>{{ session('success') }}</strong></span>
                </div>
            </div>
        </div>
    @endif
    @if (session('error'))
        <div class="demo-spacing-0 mb-2">
            <div class="alert alert-danger mt-1 alert-validation-msg" role="alert">
                <div class="alert-body d-flex align-items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="feather feather-info me-50">
                        <circle cx="12" cy="12" r="10"></circle>
                        <line x1="12" y1="16" x2="12" y2="12"></line>
                        <line x1="12" y1="8" x2="12.01" y2="8"></line>
                    </svg>
                    <span><strong>{{ session('error') }}</strong></span>
                </div>
            </div>
        </div>
    @endif

    @if ($products->isEmpty())
        <h4 class="text-center mb-2">
            {{ __('No Products Available') }}
        </h4>
    @endif

    <section id="card-demo-example">
        <!-- القسم الأول للمنتجات التي تقييمها width -->
        <h3 class="text-center mb-2">
            {{ __('Products)') }}
        </h3>
        <div class="row match-height">
            @foreach ($products as $product)
                    <div class="col-md-4 col-lg-3">
                        <div class="card">
                            <div style="width: 100%; height: 200px; overflow: hidden; object-fit: cover">
                                <img class="card-img-top" src="{{ asset('storage/' . $product->image) }}"
                                    alt="Card image cap" style="width: 100%; height: 100%; object-fit: cover;">
                            </div>
                            <div class="card-body">
                                <h4 class="card-title">{{ $product->name }}</h4>
                                <p class="card-text">{{ $product->category->category_name }}</p>
                                <a href="{{ route('products.show', $product->id) }}"
                                    class="btn btn-outline-primary waves-effect">
                                    <i class="fa-solid fa-eye"></i>
                                </a>
                                <a href="{{ route('products.edit', $product->id) }}"
                                    class="btn btn-outline-warning waves-effect">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </a>
                                <button onclick="delete_item({{ $product->id }})"
                                    class="btn btn-outline-danger waves-effect">
                                    <i class="fa-solid fa-trash-can"></i>
                                </button>
                                <form id="delete-form-{{ $product->id }}"
                                    action="{{ route('products.destroy', $product->id) }}" method="POST"
                                    style="display: none;">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </div>
                        </div>
                    </div>
            @endforeach
        </div>


    </section>

    <!-- سكربت الحذف -->
    <script>
        function delete_item(item_id) {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('delete-form-' + item_id).submit();
                }
            });
        }
    </script>
@endsection
