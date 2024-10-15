{{-- resources/views/carousel/index.blade.php --}}
@extends('layouts.dashboard.layouts')

@section('content')
    <!-- رأس المحتوى -->
    <div class="content-header row">
        <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h2 class="content-header-title float-start mb-0">{{ __('Carousel') }}</h2>
                    <div class="breadcrumb-wrapper">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">{{ __('Home') }}</a></li>
                            <li class="breadcrumb-item active">{{ __('Carousel') }}</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-header-right col-md-3 col-12 mb-2">
            <a href="{{ route('carousel.create') }}" class="btn btn-primary float-end">
                {{ __('Add New Image') }}
            </a>
        </div>
    </div>

    <!-- عرض رسائل الجلسة -->
    @if (session('success'))
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
    @endif

    @if (session('error'))
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
    @endif

    <!-- تحقق من وجود صور -->
    @if ($images->isEmpty())
        <h4 class="text-center mb-2">
            {{ __('لا توجد صور متاحة') }}
        </h4>
    @else
        <!-- قائمة الصور -->
        <section id="card-demo-example">
            <div class="row match-height">
                @foreach ($images as $carousel)
                    <div class="col-md-4 col-lg-3 mb-4">
                        <div class="card">
                            <div style="width: 100%; height: 200px; overflow: hidden;">
                                <img class="card-img-top" src="{{ asset('storage/' . $carousel->image) }}" alt="Carousel Image"
                                    style="width: 100%; height: 100%; object-fit: cover;">
                            </div>
                            <div class="card-body text-center">
                                <button onclick="delete_item({{ $carousel->id }})" class="btn btn-outline-danger waves-effect">
                                    <i class="fa-solid fa-trash-can"></i> {{ __('Delete') }}
                                </button>
                                <form id="delete-form-{{ $carousel->id }}"
                                    action="{{ route('carousel.destroy', $carousel->id) }}" method="POST"
                                    style="display: none;">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- روابط التصفح -->
            <div class="d-flex justify-content-center mt-4">
                {{ $images->links('pagination::bootstrap-4') }}
            </div>
        </section>
    @endif

    <!-- سكربت الحذف باستخدام SweetAlert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function delete_item(item_id) {
            Swal.fire({
                title: '{{ __('هل أنت متأكد؟') }}',
                text: "{{ __('لن تتمكن من التراجع عن هذا!') }}",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: '{{ __('نعم، احذفه!') }}'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('delete-form-' + item_id).submit();
                }
            });
        }
    </script>
@endsection
