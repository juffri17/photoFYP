<x-header />
<x-sidebar :title="$title" />
<div class="container-fluid py-4">
    <div class="card pt-3">
        <div class="ms-md-auto pe-md-3 d-flex align-items-center">
            <div class="input-group">
                <div class="form-outline">
                    <input type="search" id="form1" class="form-control"style="width:91rem;" placeholder="Search" />
                </div>
                <button type="button" onclick="submitSearch()" class="btn btn-primary">
                    <i class="fas fa-search"></i>
                </button>
            </div>
        </div>
       
    </div>
    <div class="card mt-5">
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
                    @foreach ($services as $service)
                        <tr>
                            <td>
                                <div class="d-flex px-2 py-1">
                                    <div>
                                        @php
                                            $images = json_decode($service['image'], true);
                                        @endphp
                                        <img src="{{ $images[0]['image'] }}" class="avatar avatar-sm me-3">
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
                                <a href="javascript:;" class="text-secondary font-weight-bold text-xs d-block mb-2"
                                    data-toggle="tooltip" data-original-title="View user">
                                    View
                                </a>
                                <a href="javascript:;" class="text-secondary font-weight-bold text-xs d-block mb-2"
                                    data-toggle="tooltip" data-original-title="Edit user">
                                    Edit
                                </a>
                                <a href="javascript:;" class="text-secondary font-weight-bold text-xs d-block"
                                    data-toggle="tooltip" data-original-title="Edit user">
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
<x-footer />
<script>
    const submitSearch = () => {
        console.log('submit search')
    }
</script>
