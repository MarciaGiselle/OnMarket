<script src="<?php echo getBaseAddress() . 'Webroot/amcharts4/core.js'?>"></script>
<script src="<?php echo getBaseAddress() . '/Webroot/amcharts4/charts.js'?>"> </script>
<script src="<?php echo getBaseAddress() . 'Webroot/amcharts4/themes/animated.js'?>"></script>
<script src="<?php echo getBaseAddress() . 'Webroot/amcharts4/maps.js'?>"></script>

<div class="container mt-5">
    <div class="container-fluid mb-5">
    <h4 class="text-primary d-flex justify-content-center mt-5">Productos más buscados </h4>

    <div style=" width: 100%;
  max-height: 600px;
  height: 100vh;" id="chartdiv" ></div></div>



    <?php if(Empty($mensaje)){ ?>

    <script>

        am4core.useTheme(am4themes_animated);

        var chart = am4core.create("chartdiv", am4charts.PieChart);



        chart.data = [{
            "country": "<?php echo $arrayProd[0] ?>",
            "litres": <?php echo $arrayCant[0]?>
        }, {
            "country": "<?php echo $arrayProd[1] ?>",
            "litres": <?php echo $arrayCant[1]?>
        }, {
            "country": "<?php echo $arrayProd[2] ?>",
            "litres": <?php echo $arrayCant[2]?>
        }, {
            "country": "<?php echo $arrayProd[3] ?>",
            "litres": <?php echo $arrayCant[3]?>
        }, {
            "country": "<?php echo $arrayProd[4] ?>",
            "litres": <?php echo $arrayCant[4]?>
        }, {
            "country": "<?php echo $arrayProd[5] ?>",
            "litres": <?php echo $arrayCant[5]?>
        }];

        var series = chart.series.push(new am4charts.PieSeries());
        series.dataFields.value = "litres";
        series.dataFields.category = "country";

        // this creates initial animation
        series.hiddenState.properties.opacity = 1;
        series.hiddenState.properties.endAngle = -90;
        series.hiddenState.properties.startAngle = -90;

        chart.legend = new am4charts.Legend();
        chart.cursor = new am4charts.XYCursor();
        chart.cursor.lineX.strokeOpacity = 0;
        chart.cursor.lineY.strokeOpacity = 0;

        chart.exporting.menu = new am4core.ExportMenu();
    </script>

    <?php }else{
        echo $mensaje;
    } ?>
    <hr>
    <div class="container-fluid mb-5">
<h4 class="text-primary d-flex justify-content-center mt-5">Categorías de los productos más comprados</h4>


    <div style=" width: 100%;
  max-height: 600px;
  height: 100vh;" id="chartdivo"></div> </div>


    <script>
        am4core.useTheme(am4themes_animated);

        var chart2 = am4core.create("chartdivo", am4charts.XYChart);

        am4core.useTheme(am4themes_animated);

        var chart2 = am4core.create("chartdivo", am4charts.XYChart);

        chart2.data = [{
            "country": "Electronica",
            "visits": <?php echo $arrayCantCat[0]?>
        }, {
            "country": "Moda",
            "visits": <?php echo $arrayCantCat[1]?>
        }, {
            "country": "Mascotas",
            "visits": <?php echo $arrayCantCat[2]?>
        }, {
            "country": "Herramientas",
            "visits": <?php echo $arrayCantCat[3]?>
        }, {
            "country": "Muebles",
            "visits": <?php echo $arrayCantCat[4]?>
        }, {
            "country": "Deportes",
            "visits": <?php echo $arrayCantCat[5]?>
        }, {
            "country": "Libros y arte",
            "visits": <?php echo $arrayCantCat[5]?>
        }, {
            "country": "Jardin y decoracion",
            "visits": <?php echo $arrayCantCat[7]?>
        }];


        chart2.padding(40, 40, 40, 40);

        var categoryAxis = chart2.xAxes.push(new am4charts.CategoryAxis());
        categoryAxis.renderer.grid.template.location = 0;
        categoryAxis.dataFields.category = "country";
        categoryAxis.renderer.minGridDistance = 60;

        var valueAxis = chart2.yAxes.push(new am4charts.ValueAxis());

        var series = chart2.series.push(new am4charts.ColumnSeries());
        series.dataFields.categoryX = "country";
        series.dataFields.valueY = "visits";
        series.tooltipText = "{valueY.value}"
        series.columns.template.strokeOpacity = 0;

        chart2.cursor = new am4charts.XYCursor();

        // as by default columns of the same series are of the same color, we add adapter which takes colors from chart.colors color set
        series.columns.template.adapter.add("fill", function (fill, target) {
            return chart2.colors.getIndex(target.dataItem.index);
        });
        chart2.cursor.lineX.strokeOpacity = 0;
        chart2.cursor.lineY.strokeOpacity = 0;

        chart2.exporting.menu = new am4core.ExportMenu();

    </script>


    <hr>
    <div class="container-fluid mb-5">
        <h4 class="text-primary d-flex justify-content-center mt-5">Rango de Montos involucrados en las Ventas</h4>

<div style=" width: 100%;
  max-height: 600px;
  height: 100vh;" id="chartdiv5"></div></div>
<script>

    am4core.useTheme(am4themes_animated);

    var chart5 = am4core.create("chartdiv5", am4charts.XYChart);


    var data5 = [];

    chart5.data = [{
        "year": " $0-$500",
        "income": <?php echo $arrayMontos[0] ?>,

    }, {
        "year": "$500-$1000",
        "income": <?php echo $arrayMontos[1] ?>,

    }, {
        "year": " $1000-$1500",
        "income": <?php echo $arrayMontos[2] ?>,

    }, {
        "year": " $1500-3000",
        "income": <?php echo $arrayMontos[3] ?>,

    }, {
        "year": " $3000-$10000",
        "income": <?php echo $arrayMontos[4] ?>,

    }];

    var categoryAxis = chart5.xAxes.push(new am4charts.CategoryAxis());
    categoryAxis.renderer.grid.template.location = 0;
    categoryAxis.renderer.ticks.template.disabled = true;
    categoryAxis.renderer.line.opacity = 0;
    categoryAxis.renderer.grid.template.disabled = true;
    categoryAxis.renderer.minGridDistance = 40;
    categoryAxis.dataFields.category = "year";


    var valueAxis = chart5.yAxes.push(new am4charts.ValueAxis());
    valueAxis.tooltip.disabled = true;
    valueAxis.renderer.line.opacity = 0;
    valueAxis.renderer.ticks.template.disabled = true;
    valueAxis.min = 0;

    var columnSeries = chart5.series.push(new am4charts.ColumnSeries());
    columnSeries.dataFields.categoryX = "year";
    columnSeries.dataFields.valueY = "expenses";
    columnSeries.tooltipText = "expenses: {valueY.value}";
    columnSeries.sequencedInterpolation = true;
    columnSeries.defaultState.transitionDuration = 1500;
    columnSeries.fill = chart5.colors.getIndex(4);

    var columnTemplate = columnSeries.columns.template;
    columnTemplate.column.cornerRadiusTopLeft = 10;
    columnTemplate.column.cornerRadiusTopRight = 10;
    columnTemplate.strokeWidth = 1;
    columnTemplate.strokeOpacity = 1;
    columnTemplate.stroke = columnSeries.fill;

    var desaturateFilter = new am4core.DesaturateFilter();
    desaturateFilter.saturation = 0.5;

    columnTemplate.filters.push(desaturateFilter);

    // first way - get properties from data. but can only be done with columns, as they are separate objects.
    columnTemplate.propertyFields.strokeDasharray = "stroke";
    columnTemplate.propertyFields.fillOpacity = "opacity";

    // add some cool saturation effect on hover
    var desaturateFilterHover = new am4core.DesaturateFilter();
    desaturateFilterHover.saturation = 1;

    var hoverState = columnTemplate.states.create("hover");
    hoverState.transitionDuration = 2000;
    hoverState.filters.push(desaturateFilterHover);

    var lineSeries = chart5.series.push(new am4charts.LineSeries());
    lineSeries.dataFields.categoryX = "year";
    lineSeries.dataFields.valueY = "income";
    lineSeries.tooltipText = "income: {valueY.value}";
    lineSeries.sequencedInterpolation = true;
    lineSeries.defaultState.transitionDuration = 1500;
    lineSeries.stroke = chart5.colors.getIndex(11);
    lineSeries.fill = lineSeries.stroke;
    lineSeries.strokeWidth = 2;

    // second way - add axis range.
    var lineSeriesRange = categoryAxis.createSeriesRange(lineSeries);
    lineSeriesRange.category = "2018";
    lineSeriesRange.endCategory = "2019";
    lineSeriesRange.contents.strokeDasharray = "3,3";
    lineSeriesRange.locations.category = 0.5;

    var bullet = lineSeries.bullets.push(new am4charts.CircleBullet());
    bullet.fill = lineSeries.stroke;
    bullet.circle.radius = 4;

    chart5.cursor = new am4charts.XYCursor();
    chart5.cursor.behavior = "none";
    chart5.cursor.lineX.strokeOpacity = 0;
    chart5.cursor.lineY.strokeOpacity = 0;

    chart5.exporting.menu = new am4core.ExportMenu();
</script>

</div>

