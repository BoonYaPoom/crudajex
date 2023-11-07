@include('layout.header')


<form action="{{ route('updatePage') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="page-inner">
        <!-- .form -->
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
                        <label for="page_name">ชื่อหลักสูตรต้านทุจริตศึกษา Anti-Corruption Education<span
                                class="badge badge-warning">Required</span></label> <input type="text"
                            class="form-control" id="page_name" name="page_name" placeholder="ชื่อ DB" required=""
                            value="">
                    </div><!-- /.form-group -->
                    <div class="form-group">
                        <label for="page_path">ชื่อหลักสูตรต้านทุจริตศึกษา Anti-Corruption Education<span
                                class="badge badge-warning">Required</span></label> <input type="text"
                            class="form-control" id="page_path" name="page_path" placeholder="ชื่อ DB" required=""
                            value="">
                    </div><!-- /.form-group -->
                    <div class="form-group">
                        <label for="page_name">สถานะ </label> <label
                            class="switcher-control switcher-control-success switcher-control-lg"><input type="checkbox"
                                class="switcher-input" name="page_name" id="page_name" value="1"> <span
                                class="switcher-indicator"></span> <span class="switcher-label-on">ON</span> <span
                                class="switcher-label-off text-red">OFF</span></label>
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
