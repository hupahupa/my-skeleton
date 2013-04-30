<?//TODO: More information to config: http://api.highcharts.com/highcharts?>

<?//Line?>
<?$this->Widget('application.extensions.highcharts.HighchartsWidget', array(
   'options'=>array(
       'credits' => array('enabled' => false),
       'exporting' => array('enabled' => false),
       'theme' => null,//dark-blue, dark-green,  gray, grid, skies
       'title' => array(
           'text' => 'Fruit Consumption'
       ),
       'xAxis' => array(
          'categories' => array('Apples', 'Bananas', 'Oranges')
       ),
       'yAxis' => array(
          'title' => array('text' => 'Fruit eaten')
       ),
       'series' => array(
          array('name' => 'Jane', 'data' => array(1, 0, 4)),
          array('name' => 'John', 'data' => array(5, 7, 3))
       ),
   )
));?>

<?//Area?>
<?$this->Widget('application.extensions.highcharts.HighchartsWidget', array(
    'chartOptions'=>array(
        'type'=>'area',//Original extention forget to add type to chart so I just add new type in.
    ),
    'options'=>array(
        'credits' => array('enabled' => false),
        'exporting' => array('enabled' => false),
        'theme' => null,//dark-blue, dark-green,  gray, grid, skies
        'title' => array(
            'text' => 'US and USSR nuclear stockpiles'
        ),
        'subtitle' => array(
            'text' => 'Source: <a href="http://thebulletin.metapress.com/content/c4120650912x74k7/fulltext.pdf">thebulletin.metapress.com</a>'
        ),
        'xAxis' => array(
            'labels' => array(
                'formatter'=> 'js:function() {
                    return this.value; // clean, unformatted number for year
                }'
            ),
        ),
        'yAxis' => array(
            'title' => array(
                'text' => 'Nuclear weapon states',
            ),
            'labels' => array(
                //TODO: try to round up with 2 digits
                'formatter'=>"js:function() { return Math.round((this.value / 1000)*100)/100 + 'k'; }"
            ),
        ),
        'tooltip' => array(
            'pointFormat' => '{series.name} produced <b>{point.y}</b><br/>warheads in {point.x}'
        ),
        'plotOptions' => array(
            'area' => array(
                'pointStart'=> 1940,
                'marker' => array(
                    'enabled'=> false,
                    'symbol' => 'circle',
                    'radius'=> 2,
                    'states' => array(
                        'hover' => array(
                            'enabled'=> true
                        ),
                    )
                )
            )
        ),
        'series' => array(
            array(
                'name' => 'USA',
                'data' => array(
                    null, null, null, null, null, 6 , 11, 32, 110, 235, 369, 640,
                    1005, 1436, 2063, 3057, 4618, 6444, 9822, 15468, 20434, 24126,
                    27387, 29459, 31056, 31982, 32040, 31233, 29224, 27342, 26662,
                    26956, 27912, 28999, 28965, 27826, 25579, 25722, 24826, 24605,
                    24304, 23464, 23708, 24099, 24357, 24237, 24401, 24344, 23586,
                    22380, 21004, 17287, 14747, 13076, 12555, 12144, 11009, 10950,
                    10871, 10824, 10577, 10527, 10475, 10421, 10358, 10295, 10104
                ),
            ),
            array(
                'name' => 'USSR/Russia',
                'data' => array(
                    null, null, null, null, null, null, null , null , null ,null,
                    5, 25, 50, 120, 150, 200, 426, 660, 869, 1060, 1605, 2471, 3322,
                    4238, 5221, 6129, 7089, 8339, 9399, 10538, 11643, 13092, 14478,
                    15915, 17385, 19055, 21205, 23044, 25393, 27935, 30062, 32049,
                    33952, 35804, 37431, 39197, 45000, 43000, 41000, 39000, 37000,
                    35000, 33000, 31000, 29000, 27000, 25000, 24000, 23000, 22000,
                    21000, 20000, 19000, 18000, 18000, 17000, 16000
                ),
            )
        )
    )
));?>
