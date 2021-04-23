(function () {
  const baseurl = 'http://localhost/mvcelearning/public';
  var app;
  var route = "Shopping/getPro/";

  app = new Vue({
    el: '#app',
    data: {
      scanner: null,
      activeCameraId: null,
      cameras: [],
      scans: []
    },
    mounted: function () {
      var self;
      self = this;
      self.scanner = new Instascan.Scanner({
        video: document.getElementById('preview'),
        scanPeriod: 3,
        mirror: true
      });
      self.scanner.addListener('scan', function (content, image) {

        let inv = $('#inv-4').html();
        let sound = new Audio(baseurl + '/sound/scan.aac');
        let wrong = new Audio(baseurl + '/sound/wrong.wav');
        let success = new Audio(baseurl + '/sound/sensor.wav');
        let sbtll = $('#sub-ttl1').val();

        $("#qrcode").val(content);

        if (content.match(/prdk/)) {
          //alert(content);
          $.ajax({
            type: 'post',
            data: { code: content, qty: 1, inv_1: inv },
            url: baseurl + '/getqrcode/scan_prdk',
            success: function () {

              sound.play();

              $('.load-table').load(baseurl + '/sale/viewTr')
              $('#ttl1').load(baseurl + '/sale/ttl1')
              $('.ttl2').load(baseurl + '/sale/ttl2')
              $('.modal-load').load(baseurl + '/sale/modal')
              // alert('Produk ditambahkan');

            }
          })
        } else if (content.match(/usr.*/)) {
          let art = 0.15;

          let art1 = sbtll - (sbtll * art)

          let cash = $('#cash').val();
          let gt = $('#grand-ttl').html();
          let ttl = cash - art1;

          $.ajax({

            type: 'post',
            data: { id_user: content },
            url: baseurl + '/getqrcode/scan_user',
            dataType: 'json',
            success: function (data) {

              if (data.level == 'member') {

                $('#dsc-ttl').html('15%');
                $('#grand-ttl').html(art1)
                $('#total-2').html(art1)
                $('#dsc-fix').val(0.15)
                $('#csm-fix').val(data.name);
                $('#ttl-fix').val(art1)
                $('#invoice').val(inv);
                if (cash != '') {
                  $('#change').html(ttl);
                  $('#cash-fix').val(cash);

                }

                success.play();

              } else {

                wrong.play();
                alert('data tidak ditemukan')

              }
            }
          })

        }
        //document.getElementById("myForm").submit();
        // return window.location = route;
      });
      return Instascan.Camera.getCameras().then(function (cameras) {
        self.cameras = cameras;
        if (cameras.length > 0) {
          if (cameras[1]) {
            self.activeCameraId = cameras[1].id;
            return self.scanner.start(cameras[1]);
          } else {
            self.activeCameraId = cameras[0].id;
            return self.scanner.start(cameras[0]);
          }
        } else {
          return console.error('No cameras found.');
        }
      }).catch(function (e) {
        return console.error(e);
      });
    },
    methods: {
      formatName: function (name) {
        return name || '(unknown)';
      },
      selectCamera: function (camera) {
        this.activeCameraId = camera.id;
        return this.scanner.start(camera);
      }
    }
  });

}).call(this);
