<?= $this->extend("layout/master") ?>

<?= $this->section("content") ?>

<header class="mb-3">
  <a href="#" class="burger-btn d-block d-xl-none">
    <i class="fa-solid fa-bars"></i>
  </a>
</header>

<div class="page-heading">
  <h3>ANGGOTA</h3>
</div>

<!-- Main content -->
<div class="card">
  <div class="card-header">
    <div class="row">
      <div class="col-10 mt-2">
        <!-- <h3 class="card-title">ANGGOTA</h3> -->
      </div>
      <div class="col-2">
        <!-- <button type="button" id="btn-anggota" class="btn btn-sm float-right btn-primary" onclick="save()" title="Tambah Data Anggota>">
          <i class="fa fa-plus"></i>Tambah Data</button> -->
      </div>
    </div>
  </div>
  <!-- /.card-header -->
  <div class="card-body">
  <button type="button" id="btn-anggota" class="btn btn-sm float-right btn-primary" onclick="save()" title="Tambah Data Anggota>">
          <i class="fa fa-plus"></i>Tambah Data</button>
    <table id="data_table" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>Nama</th>
          <th>Nik</th>
          <th>Tempat lahir</th>
          <th>Tanggal lahir</th>
          <th>Alamat</th>
          <th>Nama ibu kandung</th>
          <th>Jenis kelamin</th>
          <th>No hp</th>
          <th>Status</th>
          <th>Agama</th>
          <th>Pekerjaan</th>
          <th>Instansi</th>

          <th></th>
        </tr>
      </thead>
    </table>
  </div>
  <!-- /.card-body -->
</div>
<!-- /.card -->

<!-- /Main content -->

<!-- ADD modal content -->
<div id="data-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-md">
    <div class="modal-content">
      <div class="text-center bg-primary p-3" id="model-header">
        <h4 class="modal-title text-white" id="info-header-modalLabel"></h4>
      </div>
      <div class="modal-body">
        <form id="data-form" class="pl-3 pr-3">
          <div class="row">
            <input type="hidden" id="id" name="id" class="form-control" placeholder="Id" maxlength="20" required>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="form-group mb-3">
                <label for="nama" class="col-form-label"> Nama: <span class="text-danger">*</span> </label>
                <input type="text" id="nama" name="nama" class="form-control" placeholder="Nama" minlength="0"
                  maxlength="100" required>
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group mb-3">
                <label for="nik" class="col-form-label"> NIK: <span class="text-danger">*</span> </label>
                <input type="text" id="nik" name="nik" class="form-control" placeholder="Nik" minlength="0"
                  maxlength="16" required>
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group mb-3">
                <label for="tempat_lahir" class="col-form-label"> Tempat lahir: <span class="text-danger">*</span>
                </label>
                <input type="text" id="tempat_lahir" name="tempat_lahir" class="form-control" placeholder="Tempat lahir"
                  minlength="0" maxlength="100" required>
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group mb-3">
                <label for="tanggal_lahir" class="col-form-label"> Tanggal lahir: <span class="text-danger">*</span>
                </label>
                <input type="date" id="tanggal_lahir" name="tanggal_lahir" class="form-control" dateISO="true" required>
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group mb-3">
                <label for="alamat" class="col-form-label"> Alamat: <span class="text-danger">*</span> </label>
                <textarea cols="40" rows="5" id="alamat" name="alamat" class="form-control" placeholder="Alamat"
                  minlength="0" required></textarea>
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group mb-3">
                <label for="nama_ibu_kandung" class="col-form-label"> Nama ibu kandung: <span
                    class="text-danger">*</span> </label>
                <input type="text" id="nama_ibu_kandung" name="nama_ibu_kandung" class="form-control"
                  placeholder="Nama ibu kandung" minlength="0" maxlength="50" required>
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group mb-3">
                <label for="jenis_kelamin" class="col-form-label"> Jenis kelamin: <span class="text-danger">*</span>
                </label>
                <select id="jenis_kelamin" name="jenis_kelamin" class="form-select" required>
                  <option value="L">Laki-laki</option>
                  <option value="P">Perempuan</option>
                </select>
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group mb-3">
                <label for="no_hp" class="col-form-label"> No hp: <span class="text-danger">*</span> </label>
                <input type="text" id="no_hp" name="no_hp" class="form-control" placeholder="No hp" minlength="0"
                  maxlength="20" required>
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group mb-3">
                <label for="status" class="col-form-label"> Status: <span class="text-danger">*</span> </label>
                <select id="status" name="status" class="form-select" required>
                  <option value="Belum Kawin">Belum Kawin</option>
                  <option value="Kawin">Kawin</option>
                </select>
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group mb-3">
                <label for="agama" class="col-form-label"> Agama: <span class="text-danger">*</span> </label>
                <select id="agama" name="agama" class="form-select" required>
                  <option value="Islam">Islam</option>
                  <option value="Protestan">Protestan</option>
                  <option value="Katolik">Katolik</option>
                  <option value="Hindu">Hindu</option>
                  <option value="Buddha">Buddha</option>
                  <option value="Khonghucu">Khonghucu</option>
                </select>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="form-group mb-3">
                <label for="pekerjaan" class="col-form-label"> Pekerjaan: <span class="text-danger">*</span> </label>
                <select id="pekerjaan" name="pekerjaan" class="form-select" required>
                  <option value="select1">select1</option>
                  <option value="select2">select2</option>
                  <option value="select3">select3</option>
                </select>
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group mb-3">
                <label for="instansi" class="col-form-label"> Instansi: <span class="text-danger">*</span> </label>
                <input type="text" id="instansi" name="instansi" class="form-control" placeholder="Instansi"
                  minlength="0" maxlength="100" required>
              </div>
            </div>
          </div>

          <div class="form-group text-center">
            <div class="btn-group">
              <button type="submit" class="btn btn-primary mr-2" id="form-btn">Simpan Data</button>
              <button type="button" class="btn btn-outline-primary" data-bs-dismiss="modal">Kembali</button>
            </div>
          </div>
        </form>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div>
<!-- /ADD modal content -->



<?= $this->endSection() ?>
<!-- /.content -->


<!-- page script -->
<?= $this->section("pageScript") ?>
<script>

 // dataTables
  $(function () {
    var table = $('#data_table').removeAttr('width').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "scrollY": '45vh',
      "scrollX": true,
      "scrollCollapse": false,
      "responsive": false,
      "ajax": {
        "url": '<?php echo base_url($controller . "/getAll") ?>',
        "type": "POST",
        "dataType": "json",
        async: "true"
      }
    });
  });

  $("#data_table_wrapper > div > div").append($("#btn-anggota"));

  var urlController = '';
  var submitText = '';

  function getUrl() {
    return urlController;
  }

  function getSubmitText() {
    return submitText;
  }

  function save(id) {
    // reset the form 
    $("#data-form")[0].reset();
    $(".form-control").removeClass('is-invalid').removeClass('is-valid');
    if (typeof id === 'undefined' || id < 1) { //add
      urlController = '<?= base_url($controller . "/add") ?>';
      submitText = 'Simpan Data';
      // $('#model-header').removeClass('bg-info').addClass('bg-primary');
      $("#info-header-modalLabel").text('Tambah Data Anggota');
      $("#form-btn").text(submitText);
      $('#data-modal').modal('show');
    } else { //edit
      urlController = '<?= base_url($controller . "/edit") ?>';
      submitText = '<?= lang("App.update") ?>';
      $.ajax({
        url: '<?php echo base_url($controller . "/getOne") ?>',
        type: 'post',
        data: {
          id: id
        },
        dataType: 'json',
        success: function (response) {
          $('#model-header').removeClass('bg-success').addClass('bg-info');
          $("#info-header-modalLabel").text('<?= lang("App.edit") ?>');
          $("#form-btn").text(submitText);
          $('#data-modal').modal('show');
          //insert data to form
          $("#data-form #id").val(response.id);
          $("#data-form #nama").val(response.nama);
          $("#data-form #nik").val(response.nik);
          $("#data-form #tempat_lahir").val(response.tempat_lahir);
          $("#data-form #tanggal_lahir").val(response.tanggal_lahir);
          $("#data-form #alamat").val(response.alamat);
          $("#data-form #nama_ibu_kandung").val(response.nama_ibu_kandung);
          $("#data-form #jenis_kelamin").val(response.jenis_kelamin);
          $("#data-form #no_hp").val(response.no_hp);
          $("#data-form #status").val(response.status);
          $("#data-form #agama").val(response.agama);
          $("#data-form #pekerjaan").val(response.pekerjaan);
          $("#data-form #instansi").val(response.instansi);

        }
      });
    }
    $.validator.setDefaults({
      highlight: function (element) {
        $(element).addClass('is-invalid').removeClass('is-valid');
      },
      unhighlight: function (element) {
        $(element).removeClass('is-invalid').addClass('is-valid');
      },
      errorElement: 'div ',
      errorClass: 'invalid-feedback',
      errorPlacement: function (error, element) {
        if (element.parent('.input-group').length) {
          error.insertAfter(element.parent());
        } else if ($(element).is('.select')) {
          element.next().after(error);
        } else if (element.hasClass('select2')) {
          //error.insertAfter(element);
          error.insertAfter(element.next());
        } else if (element.hasClass('selectpicker')) {
          error.insertAfter(element.next());
        } else {
          error.insertAfter(element);
        }
      },
      submitHandler: function (form) {
        var form = $('#data-form');
        $(".text-danger").remove();
        $.ajax({
          // fixBug get url from global function only
          // get global variable is bug!
          url: getUrl(),
          type: 'post',
          data: form.serialize(),
          cache: false,
          dataType: 'json',
          beforeSend: function () {
            $('#form-btn').html('<i class="fa fa-spinner fa-spin"></i>');
          },
          success: function (response) {
            if (response.success === true) {
              Swal.fire({
                toast: true,
                position: 'top-end',
                icon: 'success',
                title: response.messages,
                showConfirmButton: false,
                timer: 1500
              }).then(function () {
                $('#data_table').DataTable().ajax.reload(null, false).draw(false);
                $('#data-modal').modal('hide');
              })
            } else {
              if (response.messages instanceof Object) {
                $.each(response.messages, function (index, value) {
                  var ele = $("#" + index);
                  ele.closest('.form-control')
                    .removeClass('is-invalid')
                    .removeClass('is-valid')
                    .addClass(value.length > 0 ? 'is-invalid' : 'is-valid');
                  ele.after('<div class="invalid-feedback">' + response.messages[index] + '</div>');
                });
              } else {
                Swal.fire({
                  toast: false,
                  position: 'bottom-end',
                  icon: 'error',
                  title: response.messages,
                  showConfirmButton: false,
                  timer: 3000
                })

              }
            }
            $('#form-btn').html(getSubmitText());
          }
        });
        return false;
      }
    });

    $('#data-form').validate({

      //insert data-form to database

    });
  }



  function remove(id) {
    Swal.fire({
      title: "<?= lang("App.remove - title") ?>",
      text: "<?= lang("App.remove - text") ?>",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: '<?= lang("App.confirm") ?>',
      cancelButtonText: '<?= lang("App.cancel") ?>'
    }).then((result) => {

      if (result.value) {
        $.ajax({
          url: '<?php echo base_url($controller . "/remove") ?>',
          type: 'post',
          data: {
            id: id
          },
          dataType: 'json',
          success: function (response) {

            if (response.success === true) {
              Swal.fire({
                toast: true,
                position: 'top-end',
                icon: 'success',
                title: response.messages,
                showConfirmButton: false,
                timer: 1500
              }).then(function () {
                $('#data_table').DataTable().ajax.reload(null, false).draw(false);
              })
            } else {
              Swal.fire({
                toast: false,
                position: 'bottom-end',
                icon: 'error',
                title: response.messages,
                showConfirmButton: false,
                timer: 3000
              })
            }
          }
        });
      }
    })
  }
</script>


<?= $this->endSection() ?>