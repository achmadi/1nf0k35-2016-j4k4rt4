<div class="row">
  <div class="col-md-6">
    <table class="table table-bordered table-hover">
      <tr>
        <th>Kegiatan Posyandu</th>
        <th>Jumlah</th>
        <th>Persentase</th>
      </tr>
      <tr>
        <td>Ya</td>
        <td><?php echo $ikutposyandu;?></td>
        <td><?php echo ($ikutposyandu>0) ?number_format($ikutposyandu/$jumlahorang*100,2):0; echo " %";?></td>
      </tr>
      <tr>
        <td>Tidak</td>
        <td><?php echo $tdkposyandu;?></td>
        <td><?php echo ($tdkposyandu>0) ?number_format($tdkposyandu/$jumlahorang*100,2):0; echo " %";?></td>
      </tr>
      <tr>
        <th>Total</th>
        <th><?php echo $jumlahorang; ?></th>
        <th><?php echo ($jumlahorang>0) ? $jumlahorang/$jumlahorang*100 : 0; echo " %";?></th>
      </tr>
      
    </table>
  </div>
  <div class="col-md-6">
    <div class="row" id="row1">
      <div class="chart">
        <canvas id="pieChart" height="240" width="511" style="width: 511px; height: 240px;"></canvas>
      </div>
    </div>
    <div class="row"> 
        <div class="col-md-3">
            
        </div>
        <div class="col-md-4">
            <div class="bux1"></div> &nbsp; <label>Ya</label>
        </div>
        <div class="col-md-5">
            <div class="bux"></div> &nbsp; <label>Tidak</label>
        </div>
      </div>
    </div>
  </div>
<style type="text/css">

      .bux{
        width: 10px;
        padding: 10px; 
        margin-right: 40%;
        background-color: #00BFFF;
        margin: 0;
        float: left;
      }
      .bux1{
        width: 10px;
        padding: 10px;
        background-color: #e02a11;
        margin: 0;
        float: left;
      }
</style>
<?php // print_r($bar);?>
<script>
  $(function () { 
    
    //-------------
        //- PIE CHART -
        //-------------
        // Get context with jQuery - using jQuery's .get() method.
        var pieChartCanvas = $("#pieChart").get(0).getContext("2d");
        var pieChart = new Chart(pieChartCanvas);
        var PieData = [<?php 
            
            echo "
              {
              value: ";echo  number_format(($ikutposyandu>0) ?$ikutposyandu/$jumlahorang*100:0,2).",
              color: \"".'#e02a11'."\",
              highlight: \"".'#e02a11'."\",
              label: \"".'Ya'."\"
              },
              {
              value: ";echo number_format(($tdkposyandu>0) ? $tdkposyandu/$jumlahorang*100:0,2).",
              color: \"".'#00BFFF'."\",
              highlight: \"".'#00BFFF'."\",
              label:  \"".'Tidak'."\"
              }"; 
            ?>

        ];
        var pieOptions = {
          segmentShowStroke: true,
          segmentStrokeColor: "#fff",
          segmentStrokeWidth: 2,
          percentageInnerCutout: 40, // This is 0 for Pie charts
          animationSteps: 100,
          animationEasing: "easeOutBounce",
          animateRotate: true,
          animateScale: false,
          responsive: true,
          maintainAspectRatio: false,
          legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<segments.length; i++){%><li><span style=\"background-color:<%=segments[i].fillColor%>\"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>"
        };
        pieChart.Doughnut(PieData, pieOptions);
  });
</script>