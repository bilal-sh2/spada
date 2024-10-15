@extends('layouts.dashboard.layouts')

@section('content')
    <div class="content-header row">
        <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h2 class="content-header-title float-start mb-0">{{ __('Articles') }}</h2>
                    <div class="breadcrumb-wrapper">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/dashboard">{{ __('Home') }}</a>
                            </li>
                            <li class="breadcrumb-item active"><a href="#">{{ __('Articles') }}</a>
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

    @if ($articles->isEmpty())
        <h4 class="text-center mb-2">
            {{ __('No Articles Available') }}
        </h4>
    @endif

    <section id="card-demo-example">
        <div class="row match-height">
            @foreach ($articles as $article)
                <div class="col-md-4 col-lg-3">
                    <div class="card">
                        <div style="width: 100%; height: 200px; overflow: hidden; object-fit: cover">
                            <img class="card-img-top" src="{{ asset('storage/' . $article->image) }}" alt="Card image cap"
                                style="width: 100%; height: 100%; object-fit: cover;">
                        </div>
                        <div class="card-body">
                            <h4 class="card-title">{{ $article->name }}</h4>
                            {{-- <p class="card-text">
                            Some quick example text to build on the card title and make up the bulk of the card's content.
                        </p> --}}
                            <a href="{{ route('article.show', $article->id) }}"
                                class="btn btn-outline-primary waves-effect">
                                <i class="fa-solid fa-eye"></i>
                            </a>
                            <a href="{{ route('article.edit', $article->id) }}"
                                class="btn btn-outline-warning waves-effect">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </a>
                            <button onclick="delete_item({{ $article->id }})" class="btn btn-outline-danger waves-effect">
                                <i class="fa-solid fa-trash-can"></i>
                            </button>
                            <form id="delete-form-{{ $article->id }}"
                                action="{{ route('article.destroy', $article->id) }}" method="POST"
                                style="display: none;">
                                @csrf
                                @method('DELETE')
                            </form>
                        </div>
                    </div>

                </div>
            @endforeach
            <!-- أزرار التنقل بين الصفحات مع تنسيق Bootstrap -->
            <div class="d-flex justify-content-center mt-4">
                {{ $articles->links('pagination::bootstrap-4') }}
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
