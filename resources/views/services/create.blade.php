<x-header />
<x-sidebar :title="$title" />
<div class="container-fluid py-4">
    <div class="row my-3">
        <div class="col-md-12">
            <div class="card card-scroll">
                <div class="card-header pb-0">
                    @if(Request::segment(2) == 'create')
                    <h6>Add Service</h6>
                    @else
                    <h6>Edit Service</h6>
                    @endif
                </div>
                <div class="card-body">
                    @if(Request::segment(2) == 'create')
                    <form id="createFrom" method="post" action="{{ route('services.store') }}" enctype="multipart/form-data">
                    @else
                    <form id="createFrom" method="post" action="{{ route('services.update') }}" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="{{ $services['id'] ?? '' }}">
                    @endif
                        @csrf
                        <div class="form-group">
                            <label for="package-name">Name</label>
                            <input name="name" type="text" class="form-control" id="package-name"
                                placeholder="Package A" value="{{ $services['service_name'] ?? '' }}">
                        </div>
                        <div class="form-group">
                            <label for="package-desc">Description</label>
                            <textarea name="description" class="form-control" id="package-desc" rows="3" placeholder="Describe about service">{{ $services['description'] ?? '' }}</textarea>

                        </div>
                        <div class="form-group">
                            <label for="package-price">Price</label>
                            <input name="price" type="number" class="form-control" id="package-price"
                                placeholder="10.00" value="{{ $services['price'] ?? '' }}">
                        </div>
                        {{-- upload files --}}
                        <div class="form-group">
                            <label for="package-price">Images</label>
                            <input name="image[]" type="file" class="form-control" multiple="multiple"
                                accept="png, jpg, jpeg">
                        </div>

                        @if(Request::segment(2) == 'edit')
                        {{-- load gallery --}}
                        <div class="container mt-4">
                            <div class="row row-cols-1 row-cols-md-3 g-4">

                                @php $images = json_decode($services['image'],true); @endphp
                                @foreach($images as $image)
                                <div class="col">
                                    <div class="card">
                                        <img src="{{ asset('images/' .$image) }}" class="card-img-top" alt="Image 1" style="width: 100%;height:200px;">
                                        <input type="hidden" name="old_image[]" value="{{ $image }}">
                                        <div class="card-body">
                                            {{-- <p class="card-text">Caption for Image 1</p> --}}
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        @endif

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
        let urlSubmit = @if(Request::segment(2) == 'create') "{{ route('services.store') }}" @else "{{ route('services.update') }}" @endif;
        let action = @if(Request::segment(2) == 'create') "create" @else "edit" @endif;
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
                            if(action == 'create')
                            {
                                window.location.href = "{{ route('services') }}";
                            }
                            else
                            {
                                window.location.href = "{{ url('services/edit') }}/" + res.data.id;
                            }
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
