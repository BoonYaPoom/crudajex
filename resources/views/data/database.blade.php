@include('layout.header')
<div class="container">
    <a href="/" class="btn btn-info">Back</a>
</div>

<!-- .page-inner -->
<div class="page-inner">
    <!-- .page-section -->
    <div class="page-section">
        <!-- .card -->
        <div class="card card-fluid">

            <div class="card-body">

                <!-- .table-responsive -->
                <div class="table-responsive">
                    <!-- .table -->
                    <table id="datatable2" class="table w3-hoverable">
                        <!-- thead -->
                        <thead>
                            <tr class="bg-infohead">
                                <th class="align-middle" style="width:5%"> ลำดับ </th>
                                <th class="align-middle" style="width:30%"> ชื่อหมวด (ไทย) </th>
                                <th class="align-middle" style="width:15%"> สถานะ </th>
                                <th class="align-middle" style="width:5%"> กระทำ </th>
                                <th class="align-middle" style="width:5%"> Table </th>
                             
                            </tr>
                        </thead><!-- /thead -->
                        <!-- tbody -->
                        <tbody><!-- tr -->
               
                            <tr>
                                <td><a href="#"></a></td>
                                <td></td>
                  
                                <td class="align-middle"> <label
                                        class="switcher-control switcher-control-success switcher-control-lg"><input
                                            type="checkbox" class="switcher-input switcher-edit" value="1" >
                                        <span class="switcher-indicator"></span> <span
                                            class="switcher-label-on">ON</span> <span
                                            class="switcher-label-off text-red">OFF</span></label> </td>
                            
                            </tr><!-- /tr --><!-- tr -->
                   
                        </tbody><!-- /tbody -->
                    </table><!-- /.table -->
                </div><!-- /.table-responsive -->
            </div><!-- /.card-body -->
        </div><!-- /.card -->
    </div><!-- /.page-section -->

    <!-- .page-title-bar -->
    <header class="page-title-bar">
        <!-- floating action -->
        <button type="button" onclick="window.location='{{ route('createHome') }}'"
            class="btn btn-success btn-floated btn-addwms" data-toggle="tooltip" title="เพิ่ม"><span
                class="fas fa-plus"></span></button>
        <!-- /floating action -->
    </header><!-- /.page-title-bar -->
</div><!-- /.page-inner -->
