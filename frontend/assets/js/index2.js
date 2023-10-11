$(function () {
  "use strict";

  // chart 3 JS
  Highcharts.chart("chart3", {
    chart: {
      height: 420,
      type: "column",
      styledMode: true,
    },
    credits: {
      enabled: false,
    },
    title: {
      text: "Statistik Review Kontributor",
      style: {
        display: "none",
      },
    },
    xAxis: {
      categories: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
      crosshair: true,
    },
    yAxis: {
      min: 0,
      title: {
        text: "Dalam satuan",
        style: {
          display: "none",
        },
      },
    },
    exporting: {
      buttons: {
        contextButton: {
          enabled: false,
        },
      },
    },
    tooltip: {
      headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
      pointFormat:
        '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
        '<td style="padding:0"><b>{point.y:.1f}</b></td></tr>',
      footerFormat: "</table>",
      shared: true,
      useHTML: true,
    },
    plotOptions: {
      column: {
        pointPadding: 0.2,
        borderWidth: 0,
      },
    },
    series: [
      {
        color: "#55BF3B",
        name: "Halal",
        data: [48.9, 38.8, 39.3, 41.4, 47.0, 48.3, 59.0, 59.6, 52.4, 65.2, 59.3, 51.2],
      },
    ],
  });

  // world map

  jQuery("#geographic-map").vectorMap({
    map: "world_mill_en",
    backgroundColor: "transparent",
    borderColor: "#818181",
    borderOpacity: 0.25,
    borderWidth: 1,
    zoomOnScroll: false,
    color: "#009efb",
    regionStyle: {
      initial: {
        fill: "#6c757d",
      },
    },
    markerStyle: {
      initial: {
        r: 9,
        fill: "#fff",
        "fill-opacity": 1,
        stroke: "#000",
        "stroke-width": 5,
        "stroke-opacity": 0.4,
      },
    },
    enableZoom: true,
    hoverColor: "#009efb",
    markers: [
      {
        latLng: [21.0, 78.0],
        name: "I Love My India",
      },
    ],
    series: {
      regions: [
        {
          values: {
            IN: "#8833ff",
            US: "#29cc39",
            RU: "#f41127",
            AU: "#ffb207",
          },
        },
      ],
    },
    hoverOpacity: null,
    normalizeFunction: "linear",
    scaleColors: ["#b6d6ff", "#005ace"],
    selectedColor: "#c9dfaf",
    selectedRegions: [],
    showTooltip: true,
    onRegionClick: function (element, code, region) {
      var message = 'You clicked "' + region + '" which has the code: ' + code.toUpperCase();
      alert(message);
    },
  });
});
