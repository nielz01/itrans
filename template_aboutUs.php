<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
  font-family: Arial, Helvetica, sans-serif;
  margin: 0;
}

html {
  box-sizing: border-box;
}

*, *:before, *:after {
  box-sizing: inherit;
}

.column {
  float: left;
  width: 33.3%;
  margin-bottom: 16px;
  padding: 0 8px;
}

.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  margin: 8px;
}

.about-section {
  padding: 50px;
  text-align: center;
  background-color:#005ce6;
  color: white;
}

.container {
  padding: 0 16px;
}

.container::after, .row::after {
  content: "";
  clear: both;
  display: table;
}

.title {
  color: grey;
}


.button:hover {
  background-color: #555;
}

@media screen and (max-width: 650px) {
  .column {
    width: 100%;
    display: block;
  }
}
</style>
</head>
<body>

<div class="about-section">
  <h1>About Us Page</h1>
  <p> PT Indonesia Comnets Plus (PLN Icon Plus)</p>
  <p>Pada tahun 2001, PLN Icon Plus memulai kegiatan komersialnya dengan Network Operation Centre yang berlokasi di Gandul, Cinere. Sebagai Entitas Anak PT PLN (Persero), pendirian PLN Icon Plus difokuskan untuk melayani kebutuhan PT PLN (Persero) terhadap jaringan telekomunikasi.</p>
</div>

<h2 style="text-align:center">Our Team</h2>
<div class="row">
  <div class="column">
    <div class="card">
      <img src="/w3images/team1.jpg" alt="Jane" style="width:100%">
      <div class="container">
        <h2>Daniel Harry Ramadhan</h2>
        <p class="title">NPM : 202043500655</p>
        <p>KONTRIBUSI :</p>
        <p>ISI KONTRIBUSI</p>
        
      </div>
    </div>
  </div>

  <div class="column">
    <div class="card">
      <img src="/w3images/team2.jpg" alt="Mike" style="width:100%">
      <div class="container">
        <h2>Lathiffah Ghaluh Sevtiady</h2>
        <p class="title">NPM : 20204350654</p>
        <p>KONTRIBUSI : </p>
        <p>ISI KONTRIBUSI</p>
        
      </div>
    </div>
  </div>
  
  <div class="column">
    <div class="card">
      <img src="/w3images/team3.jpg" alt="John" style="width:100%">
      <div class="container">
        <h2>Dedi Gunawan </h2>
        <p class="title">NPM : 202043502493</p>
        <p>KONTRIBUSI : </p>
        <p>ISI KONTRIBUSI</p>
        
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="column">
    <div class="card">
      <img src="/w3images/team1.jpg" alt="Jane" style="width:100%">
      <div class="container">
        <h2>Said</h2>
        <p class="title">NPM : 202043502490</p>
        <p>KONTRIBUSI : </p>
        <p>ISI KONTRIBUSI</p>
        
      </div>
    </div>
  </div>

  <div class="column">
    <div class="card">
      <img src="/w3images/team2.jpg" alt="Mike" style="width:100%">
      <div class="container">
        <h2>Widiya Hartati </h2>
        <p class="title">NPM : 202043500695</p>
        <p>KONTRIBUSI : </p>
        <p>ISI KONTRIBUSI</p>
        
      </div>
    </div>
  </div>
  
  <div class="column">
    <div class="card">
      <img src="/w3images/team3.jpg" alt="John" style="width:100%">
      <div class="container">
        <h2>Eka Budi Prasetyo</h2>
        <p class="title">NPM : 202043500741</p>
        <p>KONTRIBUSI : </p>
        <p>ISI KONTRIBUSI</p>
        
      </div>
    </div>
  </div>
</div>
</body>
</html>
