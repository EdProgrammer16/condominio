<script src="<?= JS_URL; ?>plugins/dragula/dragula.min.js"></script>
<script src="<?= JS_URL; ?>plugins/jkanban/jkanban.js"></script>
<script src="<?= JS_URL; ?>plugins/chartjs.min.js"></script>
<script>
    var ctx1 = document.getElementById("chart-line").getContext("2d");
    var ctx2 = document.getElementById("chart-doughnut").getContext("2d");

    var gradientStroke1 = ctx1.createLinearGradient(0, 230, 0, 50);

    gradientStroke1.addColorStop(1, 'rgba(203,12,159,0.2)');
    gradientStroke1.addColorStop(0.2, 'rgba(72,72,176,0.0)');
    gradientStroke1.addColorStop(0, 'rgba(203,12,159,0)'); //purple colors

    var gradientStroke2 = ctx1.createLinearGradient(0, 230, 0, 50);

    gradientStroke2.addColorStop(1, 'rgba(20,23,39,0.2)');
    gradientStroke2.addColorStop(0.2, 'rgba(72,72,176,0.0)');
    gradientStroke2.addColorStop(0, 'rgba(20,23,39,0)'); //purple colors

    <?php

    function getNumVisitasMes($visitas, $tipo_operacao, $mes_num){
      $num_visitas_out = 0;
      foreach($visitas as $visita){
        $data = new DateTime($visita['data_hora']);
        $mes = $data->format('m'); // 'm' retorna o mês com dois dígitos
        if($visita['tipo'] == $tipo_operacao && $mes == $mes_num) {
          $num_visitas_out++;
        }
      }
      echo $num_visitas_out > 0 ? $num_visitas_out : null;
    }
    ?>

    // Line chart
    new Chart(ctx1, {
      type: "line",
      data: {
        labels: ["jan", "Fev", "Mar", "Abr", "Mai", "Jun", "Jul", "Ago", "Set", "Out", "Nov", "Dez"],
        datasets: [{
            label: "Visitas",
            tension: 0.4,
            borderWidth: 0,
            pointRadius: 5,
            pointBackgroundColor: "#4caf50",
            borderColor: "#4caf50",
            borderWidth: 3,
            backgroundColor: gradientStroke1,
            data: [
              <?php getNumVisitasMes($visitas,'Entrada', 1); ?>, 
              <?php getNumVisitasMes($visitas,'Entrada', 2); ?>, 
              <?php getNumVisitasMes($visitas,'Entrada', 3); ?>, 
              <?php getNumVisitasMes($visitas,'Entrada', 4); ?>, 
              <?php getNumVisitasMes($visitas,'Entrada', 5); ?>, 
              <?php getNumVisitasMes($visitas,'Entrada', 6); ?>, 
              <?php getNumVisitasMes($visitas,'Entrada', 7); ?>, 
              <?php getNumVisitasMes($visitas,'Entrada', 8); ?>, 
              <?php getNumVisitasMes($visitas,'Entrada', 9); ?>, 
              <?php getNumVisitasMes($visitas,'Entrada', 10); ?>, 
              <?php getNumVisitasMes($visitas,'Entrada', 11); ?>, 
              <?php getNumVisitasMes($visitas,'Entrada', 12); ?> 
            ],
            maxBarThickness: 6
          },
          {
            label: "Saídas",
            tension: 0.4,
            borderWidth: 0,
            pointRadius: 5,
            pointBackgroundColor: "#f44335",
            borderColor: "#f44335",
            borderWidth: 3,
            backgroundColor: gradientStroke2,
            data: [
              <?php getNumVisitasMes($visitas,'Saida', 1); ?>, 
              <?php getNumVisitasMes($visitas,'Saida', 2); ?>, 
              <?php getNumVisitasMes($visitas,'Saida', 3); ?>, 
              <?php getNumVisitasMes($visitas,'Saida', 4); ?>, 
              <?php getNumVisitasMes($visitas,'Saida', 5); ?>, 
              <?php getNumVisitasMes($visitas,'Saida', 6); ?>, 
              <?php getNumVisitasMes($visitas,'Saida', 7); ?>, 
              <?php getNumVisitasMes($visitas,'Saida', 8); ?>, 
              <?php getNumVisitasMes($visitas,'Saida', 9); ?>, 
              <?php getNumVisitasMes($visitas,'Saida', 10); ?>, 
              <?php getNumVisitasMes($visitas,'Saida', 11); ?>, 
              <?php getNumVisitasMes($visitas,'Saida', 12); ?> 
            ],
            maxBarThickness: 6
          },
        ],
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            display: false,
          }
        },
        interaction: {
          intersect: false,
          mode: 'index',
        },
        scales: {
          y: {
            grid: {
              drawBorder: false,
              display: true,
              drawOnChartArea: true,
              drawTicks: false,
              borderDash: [5, 5]
            },
            ticks: {
              display: true,
              padding: 10,
              color: '#9ca2b7'
            }
          },
          x: {
            grid: {
              drawBorder: false,
              display: true,
              drawOnChartArea: true,
              drawTicks: true,
              borderDash: [5, 5]
            },
            ticks: {
              display: true,
              color: '#9ca2b7',
              padding: 10
            }
          },
        },
      },
    });


    // Doughnut chart
    new Chart(ctx2, {
      type: "doughnut",
      data: {
        labels: ['Domingo', 'Segunda-Feira', 'Terça-Feira', 'Quarta-Feira', 'Quinta-Feira', 'Sexta-Feira', 'Sabado'],
        datasets: [{
          label: "Projects",
          weight: 9,
          cutout: 60,
          tension: 0.9,
          pointRadius: 2,
          borderWidth: 2,
          backgroundColor: ['#e91e63', '#7b809a', '#4caf50', '#fb8c00', '#1a73e8', '#f44335', '#344767'],
          data: [25, 13, 12, 37, 13, 6, 12],
          fill: false
        }],
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            display: false,
          }
        },
        interaction: {
          intersect: false,
          mode: 'index',
        },
        scales: {
          y: {
            grid: {
              drawBorder: false,
              display: false,
              drawOnChartArea: false,
              drawTicks: false,
            },
            ticks: {
              display: false
            }
          },
          x: {
            grid: {
              drawBorder: false,
              display: false,
              drawOnChartArea: false,
              drawTicks: false,
            },
            ticks: {
              display: false,
            }
          },
        },
      },
    });
  </script>