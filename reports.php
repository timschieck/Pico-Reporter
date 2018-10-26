<?php
require("api.php");
include("style/style.php");
HeaderStyle("Reports");
?>
<link rel="stylesheet"
      href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.13.1/styles/default.min.css">
<script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.13.1/highlight.min.js"></script>
<script>hljs.initHighlightingOnLoad();</script>
<?php
if (!isset($_GET["report"])) {
  echo "<h1>Custom Reports</h1>";
  echo "<ul>";
  $custom_reports = pco_people("reports")->data;
  foreach($custom_reports as $report) {
    if ($report->attributes->name == null) {$report->attributes->name = "Blank";}
    echo "<li><a href='?report=$report->id'>";
    echo $report->attributes->name;
    echo "</a></li>";
  }
  echo "</ul>";
  echo "<a role='button' class='btn btn-primary' href='./'>Back to Pico Reporter</a>";
} else {
  $report = $_GET["report"];
  $report_details = pco_people("reports/$report");
  echo "<h1>" . $report_details->data->attributes->name . "</h1>";
  echo "<pre><code class='html liquid'>" . htmlspecialchars($report_details->data->attributes->body) . "</code></pre>";

  echo "<a role='button' class='btn btn-primary' href='reports.php'>Back to lists</a>";
}
FooterStyle() ?>
