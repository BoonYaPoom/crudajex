@include('layout.header')

<form action="{{ route('storedata') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="page-inner">
        <!-- .form -->
        <!-- .page-section -->
        <div class="container">
    <a href="/" class="btn btn-info">Back</a>
</div>

        <div class="page-section">
            <!-- .card -->
            <div class="card card-fluid">

                <!-- .card-body -->
                <div class="card-body">
                    <!-- .form-group -->
                    <div class="form-group">
                        <label for="category_th">Anti-Corruption Education<span class="badge badge-warning">Required</span></label> <input
                            type="text" class="form-control" id="category_th" name="category_th"
                            placeholder="ชื่อ DB" required="" value="">
                    </div><!-- /.form-group -->
                </div><!-- /.card-body -->
            </div><!-- /.card -->

            <!-- .form-actions -->
            <div class="form-actions">
                <button class="btn btn-lg btn-primary ml-auto" type="submit"><i class="far fa-save"></i>
                    บันทึก</button>
            </div><!-- /.form-actions -->
        </div><!-- /.page-section -->
    </div><!-- /.page-inner -->

</form>
