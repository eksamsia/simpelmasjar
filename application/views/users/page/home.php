<?php $this->load->view('users/layout/new-header');?>
<?php $this->load->view('users/layout/new-navbar');?>
<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Dashboard</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                                <li class="breadcrumb-item active">Dashboard</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div>
                <h1 style="text-align: center; padding-top: 100px; font-size: 60px;"> WELCOME TO SIMPELMASJAR </h1>
            </div>


            <?php $this->load->view('users/layout/new-footer');?>

            <script type="text/javascript">
            function detail_foto(id) {
                var url_gambar = "";
                var getUrl = window.location;
                var baseUrl = getUrl.protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1];
                $.ajax({
                    dataType: 'json',
                    url: 'admin/master-rr/ambil-data-by-id/' + id,
                    success: function(data) {
                        url_gambar = baseUrl + '/' + data.data[0].filepath;
                        deskripsi = data.data[0].deskripsi_rr;
                        $("#modal_gambar").find("#gambar").attr("src", url_gambar);
                        $("#modal_gambar").find("#deskripsi").html(deskripsi);
                        $('#modal_gambar').modal('show');
                    },
                    error: function(data) {
                        console.log('error');
                    }
                });
            }
            </script>