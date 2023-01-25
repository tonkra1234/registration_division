<script>

        const country_bar = document.getElementById('country_sum');
        const annual_drug = document.getElementById('annual_drug');
        
        var country_sum = <?php echo json_encode($country_sum); ?>;
        var country_title = <?php echo json_encode($country_title); ?>;

        var annual_sum = <?php echo json_encode($annual_sum); ?>;
        var annual_title = <?php echo json_encode($annual_title); ?>;
        
        Chart.register(ChartDataLabels);

        new Chart(country_bar, {
            type: 'bar',
            data: {
            labels: country_title,
            datasets: [{
                label: 'Number of imported drugs from each country',
                data: country_sum ,
                backgroundColor: [
                'rgb(255, 99, 132)',
                'rgb(54, 162, 235)',
                'rgb(255, 205, 86)',
                'rgb(26, 188, 156 )',
                'rgb(164, 128, 255 )',
                'rgb(74, 123, 214 )',
                'rgb(74, 214, 112 )',
                'rgb(100, 254, 205 )',
                'rgb(237, 156, 253 )',
                'rgb(243, 126, 223 )',
                'rgb(251, 90, 131 )',
                'rgb(230, 241, 96 )',
                'rgb(200, 126, 32 )',
                'rgb(134, 180, 60 )',
                'rgb(130, 10, 171 )',
                'rgb(129, 129, 129 )',
                'rgb(229, 152, 102 )',
                'rgb(72, 201, 176 )',
                'rgb(93, 173, 226 )',
                'rgb(153, 163, 164 )',
                'rgb(26, 188, 156 )',
                'rgb(212, 172, 13 )'
                ],
                hoverOffset: 4
                }]
            },
            options: {
            scales: {
                y: {
                    beginAtZero: true,
                    title: {
                        text:'Amount',
                        display:true,
                        font: {
                            size: 16,
                            weight: "bold"
                        }
                    },
                    // suggestedMax:
                },
                x: {
                    beginAtZero: true,
                    title: {
                        text:'Country',
                        display:true,
                        font: {
                            size: 16,
                            weight: "bold"
                        }
                    }
                }
            },
            plugins: {
                datalabels: { // This code is used to display data values
                    anchor: 'end',
                    align: 'top',
                    color: 'black',
                    font: {
                        weight: 'bold',
                        size: 16
                        }
                    }
                }
            
            }
        });

        new Chart(annual_drug, {
            type: 'bar',
            data: {
            labels: annual_title ,
            datasets: [{
                label: 'Number of registrated drugs in each year',
                data: annual_sum,
                backgroundColor: [
                'rgb(255, 99, 132)',
                'rgb(54, 162, 235)',
                'rgb(255, 205, 86)',
                'rgb(26, 188, 156 )',
                'rgb(164, 128, 255 )',
                'rgb(74, 123, 214 )',
                'rgb(74, 214, 112 )',
                'rgb(162, 85, 3 )'
                ],
                hoverOffset: 4
                }]
            },
            options: {
            indexAxis: 'y',
            scales: {
                y: {
                    beginAtZero: true,
                    title: {
                        text:'Year',
                        display:true,
                        font: {
                            size: 16,
                            weight: "bold"
                        }
                    },
                    // suggestedMax:
                },
                x: {
                    beginAtZero: true,
                    title: {
                        text:'Amount',
                        display:true,
                        font: {
                            size: 16,
                            weight: "bold"
                        }
                    }
                }
            },
            plugins: {
                datalabels: { // This code is used to display data values
                    anchor: 'end',
                    align: 'start',
                    color: 'black',
                    font: {
                        weight: 'bold',
                        size: 16
                        }
                    }
                }
            
            }
        });

</script>