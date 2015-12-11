<?php
  
  /*include("config/config.php");

  if (!$con) {
    die('Não foi possivel conectar!: ' . mysql_error());
  }

  mysql_select_db("projeto", $con);

  $sth = mysql_query("SELECT litro FROM litros");

  while($r = mysql_fetch_assoc($sth))
  {  
  }*/
?>

<!DOCTYPE html>
<html lang="pt-br">

  <head>
    <meta charset="utf-8">

    <title> GERAGUA - Racionando com consciência!</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Sistema para Automacao e controle de recursos hidrícos de uma residencia">
    <meta name="author" content="Felipe Alves, Gabriel Lins, Guilherme Teixeira">
    <link rel="shortcut icon" href="img/favico.gif">

    <!-- Links do estilo -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" >
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">

    
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
  
    <script type="text/javascript">
        jQuery(document).ready(function($) { 
          $(".scroll").click(function(event){        
              event.preventDefault();
          $('html,body').animate({scrollTop:$(this.hash).offset().top}, 'slow');
        });
      });
    </script>


    <!--Grafico de Linha-->
    <script type="text/javascript">
              $(function () {
                  var chart;
                  $(document).ready(function() {
                      $.getJSON("data.php", function(json) {
                    
                      chart = new Highcharts.Chart({
                            chart: {
                                renderTo: 'grafico_linha',
                                type: 'line',
                                marginRight: 130,   
                                marginBottom: 25
                            },
                            title: {
                                text: 'Quantidade de litros por hora',
                                x: -20 //center
                            },
                            subtitle: {
                                text: '-Sistema Geragua-',
                                x: -20
                            },
                            xAxis: {
                                  
                                   formatter: function() {
                                        return '<b>'+ this.series.name +'</b><br/>'+ this.x +': '+ this.y;
                                }

                            },
                            yAxis: {
                                title: {
                                    text: 'Quantidade de litros'
                                },
                                plotLines: [{
                                    value: 0,
                                    width: 1,
                                    color: '#808080'
                                }]
                            },
                            tooltip: {
                                formatter: function() {
                                        return '<b>'+ this.series.name +'</b><br/>'+ this.x +': '+ this.y;
                                }

                               
                            },
                            legend: {
                                layout: 'vertical',
                                align: 'right',
                                verticalAlign: 'top',
                                x: -10,
                                y: 100,
                                borderWidth: 0
                            },
                            series: json
                        });
                    });
                  
                  });
                  
              });
    </script>


        <script type="text/javascript">
            $(function () {
                  $('#grafico_barra').highcharts({
                      chart: {
                          type: 'column'
                      },
                      title: {
                          text: 'Consumo Mensal de Água'
                      },
                      subtitle: {
                          text: '-Sistema Geragua-'
                      },
                      xAxis: {
                          categories: [
                              'Jan',
                              'Fev',
                              'Mar',
                              'Abr',
                              'Mai',
                              'Jun',
                              'Jul',
                              'Ago',
                              'Set',
                              'Out',
                              'Nov',
                              'Dez'
                          ]
                      },
                      yAxis: {
                          min: 0,
                          title: {
                              text: 'Rainfall (mm)'
                          }
                      },
                      tooltip: {
                          headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                          pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                              '<td style="padding:0"><b>{point.y:.1f} mm</b></td></tr>',
                          footerFormat: '</table>',
                          shared: true,
                          useHTML: true
                      },
                      plotOptions: {
                          column: {
                              pointPadding: 0.2,
                              borderWidth: 0
                          }
                      },
                      series: [{
                          name: 'minimo',
                          data: [49.9, 71.5, 106.4, 129.2, 144.0, 176.0, 135.6, 148.5, 216.4, 194.1, 95.6, 54.4]

                      },{
                          name: 'máximo',
                          data: [48.9, 38.8, 39.3, 41.4, 47.0, 48.3, 59.0, 59.6, 52.4, 65.2, 59.3, 51.2]

                      },{
                          name: 'médio',
                          data: [83.6, 78.8, 98.5, 93.4, 106.0, 84.5, 105.0, 104.3, 91.2, 83.5, 106.6, 92.3]

                      }]
                  });
              });
        </script>

        <script type="text/javascript">
            $(function () {
                $(document).ready(function () {
                    Highcharts.setOptions({
                        global: {
                            useUTC: false
                        }
                    });

                    $('#tempo_real').highcharts({
                        chart: {
                            type: 'spline',
                            animation: Highcharts.svg, // don't animate in old IE
                            marginRight: 10,
                            events: {
                                load: function () {

                                    // set up the updating of the chart each second
                                    var series = this.series[0];
                                    setInterval(function () {
                                        var x = (new Date()).getTime(), // current time
                                            //y = 0
                                           y = Math.random();
                                        series.addPoint([x, y], true, true);
                                    }, 1000);
                                }
                            }
                        },
                        title: {
                            text: 'Consumo em Tempo Real'
                        },
                        subtitle: {
                                text: '-Sistema Geragua-',
                                x: -20
                            },
                        xAxis: {
                            type: 'datetime',
                            tickPixelInterval: 150
                        },
                        yAxis: {
                            title: {
                                text: 'Litros'
                            },
                            plotLines: [{
                                value: 0,
                                width: 1,
                                color: '#808080'
                            }]
                        },
                        tooltip: {
                            formatter: function () {
                                return '<b>' + this.series.name + '</b><br/>' +
                                    Highcharts.dateFormat('%Y-%m-%d %H:%M:%S', this.x) + '<br/>' +
                                    Highcharts.numberFormat(this.y, 2);
                            }
                        },
                        legend: {
                            enabled: false
                        },
                        exporting: {
                            enabled: false
                        },
                        series: [{
                            name: 'Random data',
                            data: (function () {
                                // generate an array of random data
                                var data = [],
                                    time = (new Date()).getTime(),i;

                                for (i = -19; i <= 0; i += 1) {
                                    data.push({
                                        x: time + i * 1000,
                                        y: 0 
                                    });
                                }
                                return data;
                            }())
                        }]
                    });
                });
            });
        </script>

        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
          <script src="../assets/js/html5shiv.js"></script>
        <![endif]-->
  </head>



  <body>

    <!--Inicio menu topo-->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
          <div class="container" >
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="index.php"><img src="img/logo-geragua.gif" height="70"></a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
              <ul id="insidepagenav" class="nav navbar-nav navbar-right">
                          <li><a href="index.php"><span class="glyphicon glyphicon-home"></span> Inicio</a></li>
                          <li><a href="projeto.php"><span class="glyphicon glyphicon-paperclip"></span> Projeto</a></li>
                          <li><a href="sobre.php"><span class="glyphicon glyphicon-phone-alt"></span> Quem Somos</a></li>
                      </ul>
            </div><!--/.navbar-collapse -->
             </div>
    </nav>


    <!-- Inicio Conteudo -->
    <div class="container">

         <div class="alinhamento" id="dia"></div>  


        <!--Grafico Linha-->
        <div class="row">
          <div class="col-xs-12 " >
              <div class="col-xs-2">
                  <h4><span class="glyphicon glyphicon-time"></span>  Filtrar</h4>
                  <ul class="nav menulat ">
                    <li><a href="#"></span>Dia</a></li>
                    <li><a href="#mes" class="scroll">Mês</a></li>
                    <li><a href="#temporeal" class="scroll">Tempo Real</a></li>
                  </ul>
              </div>  
              
              <div class="col-xs-10">
                <h4 class="cor">Relatório Diário</h4>
                    <div id="grafico_linha" style="min-width: 310px; height: 450px; margin: 0 auto">
                    <!--Grafico linha aqui--> 
                    </div>
                </div>
          </div>
        </div>


      
        <div class="alinhamento" id="mes"></div>    



        <!-- Grafico Coluna -->
        <div class="row">
          <div class="col-xs-12">
              <div class="col-xs-2 ">

                <h4><span class="glyphicon glyphicon-time"></span>  Filtrar</h4>

                <ul class="nav menulat">
                  <li><a href="#dia" class="scroll"></span>Dia</a></li>
                  <li><a href="#mes">Mês</a></li>
                  <li><a href="#temporeal" class="scroll">Tempo Real</a></li>
                </ul>
              </div>
            
              <div class="col-xs-10">
                <h4 class="cor">Relatório Mensal</h4>
                    <div id="grafico_barra" style="min-width: 310px; height: 450px; margin: 0 auto">

                      <!-- grafico coluna aqui-->
                    </div>
              </div>
          </div>
        </div>
        
        
        <div class="alinhamento" id="temporeal" ></div>        


        <!-- Grafico Tempo Real-->
        <div class="row">
          <div class="col-xs-12" >
              <div class="col-xs-2">
                <h4><span class="glyphicon glyphicon-time"></span>  Filtrar</h4>
                <ul class="nav menulat">
                  <li><a href="#dia" class="scroll"></span>Dia</a></li>
                  <li><a href="#mes" class="scroll">Mês</a></li>
                  <li><a href="#temporeal">Tempo Real</a></li>
                </ul>
              </div>
           
              <div class="col-xs-10">
                <h4 class="cor">Relatório - Tempo Real</h4>
                      <div id="tempo_real" style="min-width: 310px; height: 450px; margin: 0 auto">
                      <!-- grafico  tempo real aqui-->
                      </div>
              </div>
          </div>
        </div>

        
        <!-- Inicio Rodape-->
        <div class="row">
          <div class="col-xs-12 footer">
            <h5><span class="glyphicon glyphicon-play-circle"></span> Apresentação - Feira Estadual 2014</h5><small>Equipe GERAGUA | Pedra Branca - CE</small>
          </div>
        </div> 
        <!-- Fim rodape-->

  </div> <!-- /container -->

  </body>
    <script src="js/bootstrap.js" type="text/javascript"></script>
    <script src="js/bootstrap.min.js" type="text/javascript"></script>
    <script src="http://code.highcharts.com/highcharts.js"></script>
    <script src="http://code.highcharts.com/modules/exporting.js"></script>
  
</html>