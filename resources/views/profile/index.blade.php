<x-header />
<x-sidebar :title="$title" />
<div class="container-fluid py-4">
    <div class="row my-3">
        <div class="col-md-12">
            <div class="card card-scroll">
                <div class="card-header pb-0">
                    <h6>Edit Profile</h6>
                </div>
                <div class="card-body">
                    <form id="createFrom" method="post" action="{{ route('profile.update') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="package-name">Name</label>
                            <input name="name" type="text" class="form-control" id="package-name"
                                placeholder="Package A" value="{{ $user['name'] ?? '' }}">
                        </div>
                        <div class="form-group">
                            <label for="package-desc">Email</label>
                            <input type="email" class="form-control" id="package-desc" rows="3" placeholder="Describe about service" value="{{ $user['email'] ?? '' }}" disabled>
                        </div>
                        <div class="form-group">
                            <label for="package-price">Password</label>
                            <input name="password" type="password" class="form-control" id="package-price">
                        </div>
                        <input type="hidden" name="id" value="{{ $user['id'] ?? '' }}">

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
        let urlSubmit = $('#createFrom').attr('action');
        $.ajax({
            url: urlSubmit,
            method: "POST",
            dataType: "JSON",
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
                            window.location.href = "{{ route('profile') }}";
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
