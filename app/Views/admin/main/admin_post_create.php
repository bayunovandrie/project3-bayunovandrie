<?= $this->extend('admin/layout/template') ?>

<?= $this->section('content') ?>
<div class="p-5 mb-4 bg-light rounded-3">
    <div class="container py-5">
        <h1 class="display-5 fw-bold">Blog > New</h1>
    </div>
</div>

<div class="container">
    <form id="form_new_post" action="<?= base_url('admin/create_blog_ajax') ?>" method="post">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group mb-2">
                    <label for="title">Title</label>
                    <input type="text" name="title" class="form-control" placeholder="Post title" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group mb-2">
                    <label for="title">Author</label>
                    <input type="text" name="author" class="form-control" placeholder="Post Author" required>
                    <input type="hidden" name="status" value="draft">
                </div>
            </div>
        </div>

        <div class="form-group mb-2">
            <textarea name="content" class="form-control" cols="30" rows="10"
                placeholder="Write a great post!"></textarea>
        </div>
        <div class="form-group">
            <!-- <button type="submit" name="status" value="published" class="btn btn-primary">Publish</button> -->
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
$(document).ready(function() {
    $('#form_new_post').on('submit', function(event) {
        event.preventDefault(); // Mencegah form melakukan submit secara default

        Swal.fire({
            title: 'Loading...',
            text: 'Please wait while we process your request',
            allowOutsideClick: false,
            didOpen: () => {
                Swal.showLoading();
            }
        });

        $.ajax({
            url: $(this).attr('action'), // URL yang ditentukan di form action
            method: $(this).attr('method'), // Metode yang ditentukan di form method
            data: $(this).serialize(), // Serialize data form untuk dikirim ke server
            dataType: 'json',
            success: function(response) {
                Swal.close();
                if (response.error) {
                    Swal.fire({
                        title: 'Error',
                        text: response.error,
                        icon: 'error',
                        showClass: {
                            popup: 'animate__animated animate__fadeInDown animate__faster'
                        },
                        hideClass: {
                            popup: 'animate__animated animate__fadeOutDown animate__faster'
                        }
                    });
                } else {
                    window.location.href = response.url;
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                Swal.close();
                Swal.fire({
                    title: 'Error',
                    text: 'Something went wrong! Please try again.',
                    icon: 'error',
                    showClass: {
                        popup: 'animate__animated animate__fadeInDown animate__faster'
                    },
                    hideClass: {
                        popup: 'animate__animated animate__fadeOutDown animate__faster'
                    }
                });
            }
        });
    });
});
</script>

<?= $this->endSection() ?>