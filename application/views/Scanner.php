<html>
    <head>    
<link rel="stylesheet" type="text/css" href="<?php echo $this->config->item('filing')."assets/style.css"?>">

<link rel="stylesheet" type="text/css" href="<?php echo $this->config->item('filing')."assets/bower_components/bootstrap/dist/css/bootstrap.min.css"?>">
<link rel="stylesheet" type="text/css" href="<?php echo $this->config->item('filing')."assets/dist/css/AdminLTE.min.css"?>">
<script type="text/javascript" src="<?php echo $this->config->item('filing')."assets/barcode.js"?>"></script>
<script type="text/javascript" src="https://unpkg.com/html5-qrcode@2.3.7/html5-qrcode.min.js"></script>
    </head>
    <body>
<div id="qr-reader" style="width:500px"></div>
<div id="qr-reader-results"></div>
	<div class="row">
    <div class="col-md-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Data Kekurangan Ticket</h3>
        </div>

        <div class="box-body-center">
        <form role="form" action="<?php base_url('Checkin/wdIn')?>" method="post">
          <div class="form-group">
            <label class="payment_status">Nomor Ticket</label>
            <input type="text" class="form-control" id="noTc" name="noTc" value="" disabled>
            <input type="hidden" id="idParking" name="idParking" value="">
          </div>
		  <div class="form-group">
            <label class="payment_status">Jumlah Ticket Welcome Drink</label>
            <input type="text" class="form-control" id="amtTc" name="amtTc" value="" disabled>           
          </div>
          <div class="form-group">
            <label class="payment_status">Jumlah Kekurangan Ticket</label>
            <input type="text" class="form-control" id="amountTc" name="amountTc" placeholder="Amount Ticket">
          </div>
        </div>
       <div class="box-footer">
            <button type="submit" class="btn btn-primary">Save Changes</button>
        </div>

        </form>

      </div>
    </div>
  </div>
</body>

<script src="<?php echo $this->config->item('filing')."assets/jquery.min.js"?>"></script>
</html>
