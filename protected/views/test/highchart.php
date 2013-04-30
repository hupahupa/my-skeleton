<?//TODO: More information to config: http://api.highcharts.com/highcharts?>
<?$this->Widget('application.extensions.highcharts.HighchartsWidget', array(
   'options'=>array(
       'credits' => array('enabled' => false),
       'exporting' => array('enabled' => false),
       'theme' => 'dark-blue',
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
));
