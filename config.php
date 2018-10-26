<?php
include("utility/config.php");
include("style/style.php");
include("db.php");


$config_options = GetConfigOptions();
HeaderStyle("Configuration Screen");
?>
<div class="row">
  <div class="col">
    <h1>Configuration Options</h1>
  </div>
</div>
<div class="row">
  <div class="col">
    <table class="table table-striped table-hover">
      <thead>
        <th>Option</th>
        <th>Value</th>
      </thead>
      <?php
      foreach ($config_options as $option => $value) {
        echo "<tr>";
        echo "<td>$option</td>";
        echo "<td>$value</td>";
        echo "</tr>";
      } ?>
    </table>
  </div>
  <div class="col">
    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#optionModal">
      Add an Option
    </button>

    <div class="modal fade" id="optionModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add Option</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
          <form action="config.php" method="post" class="form">
            <input type="text" label="option" />
            <input type="text" label="value" />
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Add</button>
          </div>
        </div>
      </div>
    </div>

  </div>
</div>


<? FooterStyle();?>
