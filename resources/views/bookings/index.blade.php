<x-header />
<x-sidebar :title="$title" />
<div class="container-fluid py-4">
    <div class="row my-3">
        <div class="col-md-12">
            <div class="card card-scroll">
                <div class="card-body">
                    <div class="">
                        <form id="formSearch" method="get" action="{{ route('bookings') }}">
                            <ul class="filter-bar-vessel">
                                <section class="d-block search-bar-vessel my-2">
                                    <li class="filter-item search-bar">
                                        <input type="text" name="search_input" placeholder="Search" id="search-input"
                                            class="form-control form-control-sm"
                                            value="{{ Request::get('search_input') }}">
                                    </li>
                                </section>
                                <section class="d-flex">
                                    <div class="filter-item" style="margin-right: 10px;">
                                        <label for=status-filter" class="form-control-label">Status</label>
                                        <select name="status" class="form-select form-select-sm select2"
                                            id="status-filter" data-live-search="true">
                                            <option value="">All Status</option>
                                            @php
                                                $statuses = [
                                                    1 => 'Pending',
                                                    2 => 'Ongoing',
                                                    3 => 'Completed',
                                                    4 => 'Cancelled',
                                                ];
                                            @endphp
                                            @foreach ($statuses as $key => $status)
                                                @if (Request::get('status') == $key)
                                                    <option value="{{ $key }}" selected>{{ $status }}
                                                    </option>
                                                @endif
                                                <option value="{{ $key }}">{{ $status }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="filter-item">
                                        <label for="package-filter" class="form-control-label">Service</label>
                                        <select name="service_id" class="form-select form-select-sm" id="package-filter"
                                            data-live-search="true">
                                            <option value="">All Services</option>
                                            @if (!empty($services))
                                                @foreach ($services as $service)
                                                    @if (Request::get('service_id') == $service['id'])
                                                        <option value="{{ $service['id'] }}" selected>
                                                            {{ $service['service_name'] }}</option>
                                                    @endif
                                                    <option value="{{ $service['id'] }}">
                                                        {{ $service['service_name'] }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </section>
                                <section class="d-flex">
                                    <div class="filter-item" style="margin-right: 10px;">
                                        <label for="example-datetime-local-from" class="form-control-label">From</label>
                                        <input class="form-control" type="date" name="from"
                                            value="{{ Request::get('from') ?? '' }}" id="example-datetime-local-from"
                                            onfocus="focused(this)" onfocusout="defocused(this)">
                                    </div>
                                    <div class="filter-item">
                                        <label for="example-datetime-local-to" class="form-control-label">To</label>
                                        <input class="form-control" type="date" name="to"
                                            value="{{ Request::get('to') ?? '' }}" id="example-datetime-local-to"
                                            onfocus="focused(this)" onfocusout="defocused(this)">
                                    </div>
                                </section>

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
            <a href="{{ route('bookings.create') }}" class="btn btn-primary btn-sm float-end"><i
                    class="fa fa-plus"></i>&nbsp; Add Bookings</a>
            {{-- add button --}}
        </div>
        <div class="table-responsive">
            <table class="table align-items-center mb-0">
                <thead>
                    <tr>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Booking ID
                        </th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Client Info
                        </th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                            Date</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                            Service</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                            Payment Info</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                            Status</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                            Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if (!empty($bookings))
                        @foreach ($bookings as $booking)
                            <tr>
                                <td>
                                    <div class="d-flex px-2 py-1">
                                        <div class="d-flex flex-column justify-content-center">
                                            <p class="text-xs font-weight-bold mb-0">
                                                {{ str_pad($booking['id'], 4, '0', STR_PAD_LEFT) }}</p>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <p class="text-xs font-weight-bold mb-0">{{ $booking->client['name'] }}</p>
                                    <p class="text-xs text-secondary mb-0">{{ $booking->booking_details['phone'] }}</p>
                                    <p class="text-xs text-secondary mb-0">{{ $booking->client['email'] }}</p>
                                    <p class="text-xs text-secondary mb-0">
                                        {{ $booking->booking_details['company_name'] ?? '-' }}</p>
                                </td>
                                <td class="align-middle text-center">
                                    <span
                                        class="text-secondary text-xs font-weight-bold">{{ date('d M Y', strtotime($booking['date'])) }}</span>
                                </td>
                                <td class="align-middle text-center">
                                    <span
                                        class="text-secondary text-xs font-weight-bold">{{ $booking->services['service_name'] }}</span>
                                </td>
                                <td class="align-middle text-center">
                                    {{-- <span --}}
                                    {{-- class="text-secondary text-xs font-weight-bold">{{ $booking->booking_details['payment_method'] == 1 ? '' }}</span> --}}
                                    <p class="text-xs text-secondary mb-0">
                                        {{ $booking->booking_details['payment_status'] == 'pending' ? 'Unpaid' : 'Paid' }}
                                    </p>
                                    <p class="text-xs text-bold text-secondary mb-0">[
                                        MYR {{ number_format($booking->booking_details['total_price'], 2) }} ]</p>
                                </td>
                                <td class="align-middle text-center">
                                    <span class="text-secondary text-xs font-weight-bold">
                                        @if ($booking['status'] == 1)
                                            <span class="badge bg-gradient-warning">Pending</span>
                                        @elseif($booking['status'] == 2)
                                            <span class="badge bg-gradient-info">Ongoing</span>
                                        @elseif($booking['status'] == 4)
                                            <span class="badge bg-gradient-danger">Cancelled</span>
                                        @else
                                            <span class="badge bg-gradient-success">Completed</span>
                                        @endif
                                    </span>
                                </td>
                                <td class="align-middle text-center">
                                    @if (auth()->user()->hasRole('Client'))
                                        <a href="https://wa.me/6010101234" target="_blank"
                                            class="text-secondary font-weight-bold text-xs d-block mb-2"
                                            data-toggle="tooltip" data-original-title="View user">
                                            Whatsapp Photographer
                                        </a>
                                    @endif
                                    @if ($booking['status'] == 1)
                                        <a href="javascript:;" onclick="openCancel('{{ $booking['id'] }}')"
                                            class="text-secondary font-weight-bold text-xs d-block mb-2"
                                            data-toggle="tooltip" data-original-title="Delete user">
                                            Cancel Booking
                                        </a>
                                    @endif
                                    @if (auth()->user()->hasRole('Super Admin'))
                                        <a href="javascript:;" onclick="openProgress('{{ $booking['id'] }}')"
                                            class="text-secondary font-weight-bold text-xs d-block mb-2"
                                            data-toggle="tooltip" data-original-title="Delete user">
                                            Update Progress
                                        </a>
                                    @endif
                                    @if ($booking->booking_details['payment_status'] == 'pending' || auth()->user()->hasRole('Super Admin'))
                                    {{-- @if($booking->status == 4) --}}
                                    <a href="javascript:;" onclick="openPayment('{{ $booking['id'] }}','{{ number_format($booking->booking_details['total_price'], 2) }} ')"
                                        class="text-secondary font-weight-bold text-xs d-block mb-2"
                                        data-toggle="tooltip" data-original-title="Delete user">
                                        Make Payment
                                    </a>
                                    {{-- @endif --}}
                                    @endif
                                    @if (auth()->user()->hasRole('Super Admin') && $booking->booking_details['payment_status'] == 'Paid' )
                                        <a href="{{ asset('storage/'.$booking->booking_details['payment_proof']) }}" target="_blank"
                                            class="text-secondary font-weight-bold text-xs d-block mb-2"
                                            data-toggle="tooltip" data-original-title="Delete user">
                                            View Payment
                                        </a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="5" class="text-center">
                                <p class="text-xs font-weight-bold mb-0">No data
                                    available</p>
                            </td>
                        </tr>
                    @endif
                </tbody>
            </table>
            {{-- pagination --}}
            <div class="d-flex justify-content-right pagination pagination-info">
                {!! $bookings->links() !!}
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="openStatus" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Status</h5>
                <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="formStatus">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="progress">Progress</label>
                        <select name="progress" id="progress" class="form-control">
                            <option value="1">Pending</option>
                            <option value="2">Ongoing</option>
                            <option value="3">Completed</option>
                        </select>
                    </div>
                    <input type="hidden" name="booking_id">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" onclick="submitProgress()" class="btn bg-gradient-primary">Save
                        changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="openPayment" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Payment</h5>
                <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="formPayment">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="progress">Total need to Pay</label>
                        <p id="total_price"></p>
                    </div>
                    <div class="form-group">
                        <label for="progress">Pay MYR :</label>
                        <input type="text" name="total_payment" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="progress">Payment Proof</label>
                        <input type="file" name="payment_proof" class="form-control">
                    </div>
                    <input type="hidden" name="booking_id">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" onclick="submitPayment()" class="btn bg-gradient-primary">Save
                        changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
<x-footer />
<script>
    const submitSearch = () => {
        $('#formSearch').submit();
    }

    const openCancel = (id) => {

        Swal.fire({
            title: 'Are you sure?',
            text: "You want to cancel this booking?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',

            confirmButtonText: 'Yes, cancel it!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: "{{ route('bookings.cancel') }}",
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
                                    window.location.href = "{{ route('bookings') }}";
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
                    },
                    error: (err) => {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: err.message,
                        });
                    }
                });
            }
        });
    }

    const openProgress = (id) => {
        $('#openStatus').modal('show');
        $('#formStatus').find('input[name="booking_id"]').val(id);
    }

    const submitProgress = () => {
        let formData = $('#formStatus').serialize();
        $.ajax({
            url: "{{ route('bookings.progress') }}",
            method: "POST",
            data: formData,
            success: (res) => {
                if (res.status == 'success') {
                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: res.message,
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = "{{ route('bookings') }}";
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
            },
            error: (err) => {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: err.message,
                });
            }
        });
    }

    const openPayment = (id,price) => {
        $('#openPayment').modal('show');
        $('#formPayment').find('input[name="booking_id"]').val(id);
        $('#total_price').html('MYR '+price);
    }

    const submitPayment = () => {
        let formData = new FormData($('#formPayment')[0]);
        $.ajax({
            url: "{{ route('bookings.payment') }}",
            method: "POST",
            data: formData,
            processData: false,
            contentType: false,
            success: (res) => {
                if (res.status == 'success') {
                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: res.message,
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = "{{ route('bookings') }}";
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
            },
            error: (err) => {

                let errors = err.responseJSON.errors;
                let errorHtml = '<ul class="error-list">';
                for (const [key, value] of Object.entries(errors)) {
                    errorHtml += `<li>${value}</li>`;
                }
                errorHtml += '</ul>';

                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    html: errorHtml,
                });
            }
        });
    }
</script>
