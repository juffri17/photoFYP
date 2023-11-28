<x-header />
<x-sidebar :title="$title" />
<div class="container-fluid py-4">
    <div class="row my-3">
        <div class="col-md-12">
            <div class="card card-scroll">
                <div class="card-body">
                    <div class="">
                        <form id="formSearch" method="get" action="{{ route('services') }}">
                            <ul class="filter-bar-vessel">
                                <section class="d-block search-bar-vessel my-2">
                                    <li class="filter-item search-bar">
                                        <input type="text" name="search_input" placeholder="Search" id="search-input"
                                            class="form-control form-control-sm"
                                            value="{{ Request::get('search_input') }}">
                                    </li>
                                </section>
                                {{-- <section class="d-flex">
                                    <div class="filter-item" style="margin-right: 10px;">
                                        <select name="status_filter" class="form-select form-select-sm select2" id="status-filter" data-live-search="true">
                                            <option value="">Select Status</option>
                                        </select>
                                    </div>
                                    <div class="filter-item">
                                        <select name="product_filter" class="form-select form-select-sm" id="package-filter" data-live-search="true">
                                            <option value="">All Package</option>
                                        </select>
                                    </div>
                                </section> --}}

                                <section class="d-block">
                                    <div class="filter-item float-end" style="width:10%;">
                                        <button type="button" onclick="submitSearch()"
                                            class="btn btn-sm btn-outline-primary submit-form-search"
                                            style="width: 80px;"><i class="fa fa-search"></i>
                                        </button>
                                    </div>
                                </section>

                            </ul>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card mt-5">
        <div class="card-header pb-0">
            {{-- add button --}}
            <a href="{{ route('services.create') }}" class="btn btn-primary btn-sm float-end"><i
                    class="fa fa-plus"></i>&nbsp; Add Service</a>
            {{-- add button --}}
        </div>
        <div class="table-responsive">
            <table class="table align-items-center mb-0">
                <thead>
                    <tr>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Package Name
                        </th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Price</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                            Description</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                            Created At</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                            Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if (count($services) == 0)
                        <tr>
                            <td colspan="5" class="text-center">
                                <p class="text-xs font-weight-bold mb-0">No data
                                    available</p>
                            </td>
                        </tr>
                    @endif
                    @foreach ($services as $service)
                        <tr>
                            <td>
                                <div class="d-flex px-2 py-1">
                                    <div>
                                        @php
                                            $images = json_decode($service['image'], true);
                                        @endphp
                                        <img src="{{ asset('images/' . $images[0]) }}" class="avatar avatar-sm me-3">
                                    </div>
                                    <div class="d-flex flex-column justify-content-center">
                                        <h6 class="mb-0 text-xs">{{ $service['service_name'] }}</h6>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <p class="text-xs font-weight-bold mb-0">MYR {{ number_format($service['price'], 2) }}
                                </p>
                            </td>
                            <td class="align-middle text-center text-sm" style="width:460px">
                                <p class="text-xs font-weight-bold mb-0 text-wrap">{{ $service['description'] }}</p>
                            </td>
                            <td class="align-middle text-center">
                                <span
                                    class="text-secondary text-xs font-weight-bold">{{ date('d M Y', strtotime($service['created_at'])) }}</span>
                            </td>
                            <td class="align-middle text-center">
                                <a href="javascript:;" onclick="openView('{{ $service['id'] }}')"
                                    class="text-secondary font-weight-bold text-xs d-block mb-2" data-toggle="tooltip"
                                    data-original-title="View user">
                                    View
                                </a>
                                <a href="javascript:;" onclick="openEdit('{{ $service['id'] }}')"
                                    class="text-secondary font-weight-bold text-xs d-block mb-2" data-toggle="tooltip"
                                    data-original-title="Edit user">
                                    Edit
                                </a>
                                <a href="javascript:;" onclick="openDelete('{{ $service['id'] }}')"
                                    class="text-secondary font-weight-bold text-xs d-block mb-2" data-toggle="tooltip"
                                    data-original-title="Delete user">
                                    Delete
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{-- pagination --}}
            <div class="d-flex justify-content-right pagination pagination-info">
                {!! $services->links() !!}
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="viewModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Gallery</h5>
                <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>
                {{-- <button type="button" class="btn bg-gradient-primary">Save changes</button> --}}
            </div>
        </div>
    </div>
</div>
<x-footer />
<script>
    const submitSearch = () => {
        $('#formSearch').submit();
    }

    const openEdit = (id) => {
        window.location.href = "{{ url('services/edit') }}/" + id;
    }

    const openDelete = (id) => {
        Swal.fire({
            title: 'Are you sure?',
            text: "You want to delete this service?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: "{{ route('services.delete') }}",
                    method: "POST",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "id": id
                    },
                    success: (res) => {
                        if (res.status == 'success') {
                            Swal.fire({
                                icon: 'success',
                                title: 'Success',
                                text: res.message,
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    window.location.href = "{{ route('services') }}";
                                }
                            });
                        }

                        if (res.status == 'error') {
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: res.message,
                            });
                        }
                    }
                });
            }
        });
    }

    const openView = (id) => {
        $.ajax({
            url: "{{ route('services.view') }}",
            method: "POST",
            data: {
                "_token": "{{ csrf_token() }}",
                "id": id
            },
            success: (res) => {
                if (res.status == 'success') {
                    // $('#viewModal .modal-body').html(res.data);
                    $('#viewModal').modal('show');
                    let html =
                        '<div class="container mt-4"><div class="row row-cols-1 row-cols-md-3 g-4">';
                    let images = JSON.parse(res.data.image);
                    images.forEach((image, index) => {
                        html += `<div class="col">
                            <div class="card">
                                <img src="{{ asset('images') }}/${image}" class="card-img-top" alt="Image ${index + 1}" style="width: 100%;height:200px;">
                            </div>
                        </div>`;
                    });

                    html += '</div></div>';
                    $('#viewModal .modal-body').html(html);

                }

                if (res.status == 'error') {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: res.message,
                    });
                }
            }
        });
    }
</script>
