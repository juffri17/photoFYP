<x-header />
<x-sidebar :title="$title" />
<div class="container-fluid py-4">
    <div class="row my-3">
        <div class="col-md-12">
            <div class="card card-scroll">
                <div class="card-header pb-0">
                    <h6>Add Booking</h6>
                </div>
                <div class="card-body">
                    <form id="createFrom" method="post" action="{{ route('bookings.store') }}"
                        enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="client_id" value="{{ auth()->user()->id }}">
                        <div class="form-group">
                            <label for="">Name</label>
                            <input name="client_name" type="text" class="form-control" id="" placeholder=""
                                value="{{ auth()->user()->name }}">
                        </div>
                        <div class="form-group">
                            <label for="">Email</label>
                            <input name="client_email" type="text" class="form-control" id="" placeholder=""
                                value="{{ auth()->user()->email }}">
                        </div>
                        <div class="form-group">
                            <label for="">Phone</label>
                            <input name="client_phone" type="text" class="form-control" id="" placeholder=""
                                value="{{ auth()->user()->phone }}">
                        </div>
                        <div class="form-group">
                            <label for="">Company</label>
                            <input name="company" type="text" class="form-control" id="" placeholder=""
                                value="">
                        </div>
                        <div class="form-group">
                            <label for="">Date</label>
                            <input name="client_date" type="date" class="form-control" id="" placeholder=""
                                value="">
                        </div>
                        <div class="form-group">
                            <label for="">Package</label>
                            <select class="form-select form-select-sm" name="service_id"
                                aria-label=".form-select-sm example">
                                <option value="" selected>Nothing Selected</option>
                                @if (isset($services))
                                    @foreach ($services as $service)
                                        <option value="{{ $service->id }}">{{ $service->service_name }}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>

                        <button type="button" onclick="submitForm()" class="btn btn-primary float-end">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<x-footer />
<script>
    const submitForm = () => {
        let urlSubmit = "{{ route('bookings.storev2') }}";
        let action = 'create';
        $.ajax({
            url: urlSubmit,
            method: "POST",
            data: new FormData($('#createFrom')[0]),
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
