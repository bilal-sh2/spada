@extends('layouts.dashboard.layouts')

@section('content')
<style>
    .prod-img img{
        width: 250px !important;
        height: 450px;
        object-fit: cover;
    }
</style>
    <div class="content-header row">
        <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h2 class="content-header-title float-start mb-0">{{ __('Show Product') }}</h2>
                    <div class="breadcrumb-wrapper">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/dashboard">{{ __('Home') }}</a>
                            </li>
                            <li class="breadcrumb-item"><a href="{{route('products.index')}}">{{ __('Products') }}</a>
                            </li>
                            <li class="breadcrumb-item active"><a href="#">{{ __('Show Product') }}</a>
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <section id="multiple-column-form">
        <div class="row  justify-content-center">
            <div class="col-12 col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">{{ __('Show Product') }}</h4>
                    </div>
                    <div class="card-body ">
                        @if ($product->evaluation == 'height')
                        <div class="d-flex justify-content-center align-items-center prod-img">
                            <img class="card-img" src="{{ asset('storage/' . $product->image) }}" alt="Card image cap" >
                        </div>
                        @else
                        <div class="d-flex justify-content-center align-items-center">
                            <img class="card-img" src="{{ asset('storage/' . $product->image) }}" alt="Card image cap" >
                        </div>
                        @endif
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <h4 class="card-text text-primary">
                                        {{ __('Category') }} 
                                    </h4>
                                    <h4 class="card-text">
                                        {{ $product->category->category_name }}
                                    </h4>
                                </div>

                                <div class="col-12 my-2" dir="ltr">
                                    <h4 class="card-title text-primary">{{ __('Product Name') }}</h4>
                                    <h4 class="card-title">{{$product->name}}</h4>
                                    <h4 class="card-text text-primary">
                                        {{ __('Description') }}
                                    </h4>
                                    <h4 class="card-text">
                                        {!!$product->description!!}
                                    </h4>
                                </div>

                                <div class="col-12 my-2" dir="rtl">
                                    <h4 class="card-title text-primary">{{ __('Product Name (Arabic)') }}</h4>
                                    <h4 class="card-title">{{$product->name_ar}}</h4>

                                    <h4 class="card-text text-primary">
                                        {{ __('Description (Arabic)') }}
                                    </h4>
                                    <h4 class="card-text">
                                        {!!$product->description_ar!!}
                                    </h4>
                                </div>
                              
                                {{-- <div class="col-12 col-md-6">
                                    <h4 class="card-text text-primary">
                                        {{ __('Technonology') }} 
                                    </h4>
                                    <h4 class="card-text">
                                        {{ $product->technonology }}
                                    </h4>
                                </div>
                                <div class="col-12 col-md-4">
                                    <h4 class="card-text text-primary">
                                        {{ __('Height') }} 
                                    </h4>
                                    <h4 class="card-text">
                                        {{ $product->height }}
                                    </h4>
                                </div>
                                <div class="col-12 col-md-4">
                                    <h4 class="card-text text-primary">
                                        {{ __('Width') }} 
                                    </h4>
                                    <h4 class="card-text">
                                        {{ $product->width }}
                                    </h4>
                                </div>
                                <div class="col-6 col-md-4">
                                    <h4 class="card-text text-primary">
                                        {{ __('Dipth') }} 
                                    </h4>
                                    <h4 class="card-text">
                                        {{ $product->dipth }}
                                    </h4>
                                </div> --}}

                               

                                {{-- <div class="col-12 my-2">
                                    <h4 class="card-text text-primary">
                                        {{ __('Product Used Method') }}
                                    </h4>
                                    <h4 class="card-text">
                                        {{$product->use_method}}
                                    </h4>
                                </div>

                                <div class="col-12 my-2">
                                    <h4 class="card-text text-primary">
                                        {{ __('Product Used Method (Arabic)') }}
                                    </h4>
                                    <h4 class="card-text">
                                        {{$product->use_method_ar}}
                                    </h4>
                                </div> --}}


                            </div>
                            <a href="{{ route('products.edit', $product->id) }}" class="btn btn-outline-warning waves-effect">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </a>
                            <button onclick="delete_item({{ $product->id }})" class="btn btn-outline-danger waves-effect">
                                <i class="fa-solid fa-trash-can"></i>
                            </button>
                            <form id="delete-form-{{ $product->id }}" action="{{ route('products.destroy', $product->id) }}" method="POST" style="display: none;">
                                @csrf
                                @method('DELETE')
                            </form>
                        </div>
                    </div>
                    <a href="{{route('products.index')}}"
                    class="btn btn-outline-primary m-2 waves-effect">{{ __('Back') }}</a>
                </div>
            </div>
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

