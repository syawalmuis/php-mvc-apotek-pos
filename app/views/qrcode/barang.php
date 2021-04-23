
	  <!-- scan -->
    
   <script src="<?=BASEURL;?>/bootstrap/js/jquery-3.5.1.js"></script>
   <script src="scanner/vendor/modernizr/modernizr.js"></script>
  <script src="scanner/vendor/vue/vue.min.js"></script>
  <div id="app" class="row box">
    <div class="col-sm-4">
      <ul>
        <li v-if="cameras.length === 0" class="empty">No cameras found</li>
        <li v-for="camera in cameras">
          <span v-if="camera.id == activeCameraId" :title="formatName(camera.name)" class="active"><input type="radio" class="align-middle mr-1" checked> {{ formatName(camera.name) }}</span>
          <span v-if="camera.id != activeCameraId" :title="formatName(camera.name)">
            <a @click.stop="selectCamera(camera)"> <input type="radio" class="align-middle mr-1">@{{ formatName(camera.name) }}</a>
          </span>
        </li>
      </ul>
      <div class="clearfix"></div>
      <!-- form scan -->
      <div class="row">
        <div class="col-sm-8 offset-2">
          <form action="" method="POST" id="myForm">
            <fieldset class="scheduler-border">
              <legend class="scheduler-border"> Form Scan </legend>
              <input type="text" name="qrcode" id="qrcode" class="form-control form-control-sm">
            </fieldset>
          </form>
        </div>
      </div>
    </div>
    <div class="col-sm preview-container camera">
      <div class="card shadow-lg rounded">
        <div class="card-body">
          <div class="embed-responsive embed-responsive-21by9">
            <video id="preview" class="embed-responsive-item "></video>
          </div>
        </div>
      </div>
        
    </div>
   </div>

   <!-- scanner -->
<!-- <script src="<?=BASEURL?>/scanner/js/app.js"></script> -->
<script src="<?=BASEURL?>/scanner/vendor/instascan/instascan.min.js"></script>
<script src="<?=BASEURL?>/scanner/js/scanner.js"></script>
 