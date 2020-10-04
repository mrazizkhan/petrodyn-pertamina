<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Pantau penyebaran COVID-19</title>
  </head>
  <body>
    <div class="jumbotron jumbotron-fluid bg-success text-white text-center">
      <div class="container">
        <h1 class="display-4">Corona Virus</h1>
        <p class="lead">
          <h2>
              PANTAU PENYEBARAN COVID-19<br>
              SECARA REAL-TIME<br>
              Mari bersama menjaga kesehatan diri kita dan keluarga
          </h2>
        </p>
      </div>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-md-4">
            <div class="bg-danger box text-white">
                <div class="row">
                  <div class="col-md-6">
                    <h5>Positif</h5>
                    <h2 id="data-kasus">20222</h2>
                    <h5>Orang</h5>
                  </div>
                  <div class="col-md-4">
                    <img src="img/sad.svg" alt="" width="100px">
                  </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="bg-info box text-white">
                <div class="row">
                  <div class="col-md-6">
                    <h5>Meninggal</h5>
                    <h2 id="data-mati">20222</h2>
                    <h5>Orang</h5>
                  </div>
                  <div class="col-md-4">
                    <img src="img/cry.svg" alt="" width="100px">
                  </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="bg-success box text-white">
                <div class="row">
                  <div class="col-md-6">
                    <h5>Sembuh</h5>
                    <h2 id="data-sembuh">20222</h2>
                    <h5>Orang</h5>
                  </div>
                  <div class="col-md-4">
                    <img src="img/happy.svg" alt="" width="100px">
                  </div>
                </div>
            </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12 mt-5">
              <div class="bg-primary box text-white">
                  <div class="row">
                    <div class="col-md-3">
                      <h2>INDONESIA</h2>
                      <h5 id="data-ind"> Positif : 12 orang <br>
                        Meninggal : 20 orang <br>
                        Sembuh: 2000 orang</h5>
                    </div>
                    <div class="col-md-4">
                      <img src="img/indonesia.svg" alt="" width="150px">
                    </div>
                  </div>
              </div>
          </div>
      </div>
      <div class="row">
        <div class="col-md-12 mt-5">
              <div class="bg-dark box text-white">
                  <div class="row">
                    <div class="col-md-3">
                      <h2>Sumatera Utara</h2>
                      <h5 id="data-sumut"> Positif : 12 orang <br>
                        Meninggal : 20 orang <br>
                        Sembuh: 2000 orang</h5>
                    </div>
                    <div class="col-md-4">
                      <img src="https://1.bp.blogspot.com/-fcEHnGPGLxY/T4LzmVAfA9I/AAAAAAAAFkc/rGPa1UQpM2w/s1600/LOGO+PROVINSI+SUMATERA+UTARA.png" alt="" width="150px">
                    </div>
                  </div>
              </div>
          </div>
      </div>
    </div>

    <footer class="bg-success text-center text-white mt-3 pt-2 pb-2">
      Created By @YAZID-AKBAR
    </footer>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  </body>
</html>

<script>
$(document).ready(function(){

  // Panggil fungsi semua data
  semuaData();
  dataIndonesia();
  dataSumut();

  //Refresh Otomatis
  setInterval(() => {
    semuaData();
    dataIndonesia();
  },3000);
  function semuaData(){
    $.ajax({
      url: 'https://coronavirus-19-api.herokuapp.com/all',
      success: function(data){
        try{
          let json = data;
          let kasus = data.cases;
          let meninggal = data.deaths;
          let sembuh = data.recovered;

          $('#data-kasus').html(kasus);
          $('#data-mati').html(meninggal);
          $('#data-sembuh').html(sembuh);

        }
        catch{
          alert('Error')
        }
      }
    });
  }

  function dataIndonesia(){
    $.ajax({
      url:'https://coronavirus-19-api.herokuapp.com/countries',
      success: function(data){
        try{
          let json = data;
          let html = [];

          if(json.length > 0 ){
            let i;
            for (let i = 0; i < json.length; i++) {
              let dataIndonesia = json[i];
              let namaNegara = dataIndonesia.country;

              if(namaNegara === 'Indonesia'){
                let kasus = dataIndonesia.cases;
                let meninggal = dataIndonesia.deaths;
                let sembuh = dataIndonesia.recovered;

                $('#data-ind').html(
                  'Positif :' + ' '+kasus+' orang <br> Meninggal :'+' '+meninggal+' orang <br> Sembuh :'+' '+sembuh+' orang'

                )
              }
            }
          }
        }catch{
          alert("Error")
        }
      }
    })
  }
});

  function dataSumut(){
    $.ajax({
      url:'https://api.kawalcorona.com/indonesia/provinsi',
      success: function(data){
        try{
          let json = data;
          let html = [];

          if(json.length > 0 ){
            let i;
            for (let i = 0; i < json.length; i++) {
              let dataSumut = json[i];
              let namaProvinsi = dataSumut.provinsi;

              if(namaProvinsi === 'Sumatera Utara'){
                let kasus = dataSumut.kasus_posi;
                let meninggal = dataSumut.kasus_semb;
                let sembuh = dataSumut.kasus_meni;

                $('#data-sumut').html(
                  'Positif :' + ' '+kasus+' orang <br> Meninggal :'+' '+meninggal+' orang <br> Sembuh :'+' '+sembuh+' orang'
                )

              }
            }
          }
        }catch{
          alert("Error")
        }
      }
    })
  }

</script>