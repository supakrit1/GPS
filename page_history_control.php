<head>
  <?php //include('css.php') ?>
  <meta charset="utf-8">
  <title>Examples</title>
  <style media="screen">
    .select2-container--bootstrap4 .select2-selection {
      /* background-color: #fff; */
      /* outline: 0; */
      /* display: inline-block; */
      /* border: 1px solid #ced4da; */
      /* border-radius: .10rem; */
      /* width: 100%; */
      height: calc(1.8rem + 2px);
      padding: .200rem .50rem;
      line-height: 1.5;
      color: #495057;
    }
    #table-control {
      margin-top: : 10px;
    }
    #history_head {
      background-color: ;
    }
    #hr_1 {
        margin-top: 0rem;
        margin-bottom: 0rem;
        border: 0;
        border-top: 1px solid #333333;
    }
    #hr_2 {
        margin-top: -1rem;
        margin-bottom: 0rem;
        border: 0;
        border-top: 1px solid #333333;
    }
  </style>
</head>
<body>
  <?php
    require("config.php");
    $sql = "SELECT
    `devices`.`devi_id`,
    `devices`.`devi_name`,
    `devices`.`devi_imei`,
    `devices`.`id_position`,
    `devices`.`rfid_name`,
    `devices`.`rfid_number`,
    `positions`.`devicetime`,
    `positions`.`servertime`,
    `positions`.`altitude`,
    `positions`.`lat`,
    `positions`.`lng`,
    `positions`.`speed`,
    `positions`.`course`,
    `positions`.`attributes`,
    `positions`.`valid`,
    `positions`.`state`
  FROM
    `devices`
    INNER JOIN `positions` ON `devices`.`id_position` = `positions`.`posi_id`";
    $result = $conn->query($sql);
   ?>

  <p></p>
<div class="row">
  <!-- table control -->
  <table id="table-control" class="table table-bordered table-sm">
    <tr>
      <td>
        <div class="container">
          <div class="form-row">
            <div class="col-3 text-right">
              <span>อุปกรณ์</span>
            </div>
            <div class="col">
              <select class="form-control form-control-sm " id="simple-single-select">
                <?php
                while($rs = $result->fetch_assoc()) {
                 ?>
                <option value="<?= $rs[devi_id]; ?>"><?= $rs[devi_name]; ?></option>
                <?php
              } ?>
              </select>
            </div>
          </div>
        </div>
      </td>
    </tr>
    <tr>
      <td>
        <div class="container">
          <div class="form-row">
            <div class="col-3 text-right">
              <span>จากเวลา</span>
            </div>
            <div class="col">
              <input type="datetime-local" class=" form-control form-control-sm">
            </div>
          </div>
        </div>
      </td>
    </tr>
    <tr>
      <td>
        <div class="container">
          <div class="form-row">
            <div class="col-3 text-right">
              <span>ถึงเวลา</span>
            </div>
            <div class="col">
              <input type="datetime-local" class=" form-control form-control-sm">
            </div>
          </div>
        </div>
      </td>
    </tr>
    <tr>
      <td>
        <div class="container">
          <div class="form-row">
            <div class="col-sm-12 text-center">
              <button class="btn btn-info btn-sm" type="button" name="button">
                <i class="fas fa-search"></i>
                ค้นหา
              </button>
            </div>
          </div>
        </div>
      </td>
    </tr>
  </table>
</div>
  <hr id="hr_1">
<div class="row">
  <!-- table list -->

  <table class="table table-bordered table-sm">
    <thead>
      <tr id="history_head">
        <td class="text-center"> <i class="fas fa-check-circle"></i> </td>
        <td class="text-center"> <i class="fas fa-location-arrow"></i> </td>
        <td class="text-center"><i class="far fa-shipping-fast"></i> </td>
        <td class="text-center"> <i class="far fa-map-marked-alt"></i> </td>
        <td class="text-center"><i class="fas fa-history"></i> </td>
        <td class="text-center"> <i class="fas fa-ban"></i> </td>
      </tr>
    </thead>
      <tbody>
        <td>55</td>
        <td>55</td>
        <td>55</td>
        <td>55</td>
        <td>55</td>
        <td>55</td>
    </tbody>
  </table>
</div>
<hr id="hr_2">
</body>
<!-- script  -->
<?php //include('js.php') ?>
<!-- scrip select2 -->
<script type="text/javascript">
  $("#simple-single-select, #simple-multiple-select, #input-group-single-select, #input-group-multiple-select").select2({
    width: "100%",
    theme: "bootstrap4",
    placeholder: "เลือกอุปกรณ์",
    allowClear: true
  });
  $("#disabled-single-select").select2({
    width: "100%",
    theme: "bootstrap4",
    disabled: true
  });
  $("#disabled-multiple-select").select2({
    width: "100%",
    theme: "bootstrap4",
    allowClear: true
  });
  $("#form-single-select, #form-multiple-select").select2({
    width: "100%",
    theme: "bootstrap4"
  });
</script>
<!-- /// scrip select2 -->
