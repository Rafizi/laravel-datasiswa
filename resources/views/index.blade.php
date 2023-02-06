<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>SISWA</title>
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
   <script src="https://code.highcharts.com/highcharts.js"></script>
   
</head>

<body>
   <div class="container mt-2">
      <div class="row">
         <div class="col-lg-12 margin-tb">
            <div class="pull-right mb-2">
               <h3 class="text-uppercase mt-5 text-center">{{ __('DATA SISWA') }}</h3>
               <a class="btn btn-success btn-sm rounded-pill mt-3" href="{{ route('siswa.create') }}">{{ __('Input Baru') }}</a>
            </div>
         </div>
      </div>
      @if ($message = Session::get('success'))
         <div class="alert alert-success" role="alert">
            <p>{{ $message }}</p>
         </div>
      @endif
      <table class="table-bordered table">
         <thead>
            <tr>
               <th>{{ __('NO') }}</th>
               <th>{{ __('NO PEND') }}</th>
               <th>{{ __('Name') }}</th>
               <th>{{ __('BHS INDO') }}</th>
               <th>{{ __('MTK') }}</th>
               <th>{{ __('IPA') }}</th>
               <th>{{ __('TOTAL') }}</th>
            </tr>
         </thead>
         <tbody>
            @foreach ($siswas as $no => $siswa)
               <tr>
                  <td>{{ ++$no }}</td>
                  <td>{{ $siswa->no_pendaftaran }}</td>
                  <td>{{ $siswa->nama }}</td>
                  <td>{{ $siswa->nilai_ind }}</td>
                  <td>{{ $siswa->nilai_mtk }}</td>
                  <td>{{ $siswa->nilai_ipa }}</td>
                  <td>{{ $siswa->nilai_ind + $siswa->nilai_mtk + $siswa->nilai_ipa }}</td>
               </tr>
            @endforeach
         </tbody>
      </table>
   </div>
   <div class="panel">
      <div id="chartNilai"></div>
   </div>

</body>
<script>
   
   var no_pendaftaran = <?php echo $siswa->no_pendaftaran ; ?>;
   var indo = <?php echo $siswa->nilai_ind ; ?>;
   var mtk = <?php echo $siswa->nilai_mtk; ?>;
   var ipa = <?php echo $siswa->nilai_ipa; ?>;
   var hasilIndo = indo;
   var hasilMtk = mtk;
   var hasilIpa = ipa;
   
   // var no_pendaftaran = <?php echo $siswa->no_pendaftaran ; ?>;
   // var indo = <?php echo $siswa->nilai_ind ; ?>;
   // var mtk = <?php echo $siswa->nilai_mtk; ?>;
   // var ipa = <?php echo $siswa->nilai_ipa; ?>;
   // var hasilIndo = indo+mtk+ipa;
   // var hasilMtk =mtk+indo+ipa;
   // var hasilIpa =ipa+mtk+indo;

Highcharts.chart('chartNilai', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Monthly Average Rainfall'
    },
    subtitle: {
        text: 'Source: WorldClimate.com'
    },
    xAxis: {
        categories: [
            'B INDO',
            'MTK',
            'IPA',

        ],
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'NILAI'
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
        name: 'NILAI',
      //   data: [69.9, 61.5, 70] 
      data:[hasilIndo,hasilMtk,hasilIpa]  
      

    }]
});
            
   </script>
</html>
