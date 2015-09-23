<?php $this->output('header');?>
<body>

<div class="container">
  <h2>Halaman Dashboard</h2>
  <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#menu1">Daftar Semua Anggota</a></li>
    <li><a data-toggle="tab" href="#menu2">Approve Wilayah <?php echo $wilayah; ?></a></li>
  </ul>

  <div class="tab-content">
    <div id="menu1" class="tab-pane fade in active">
      <p><table class="table">
    <thead>
      <tr>
        <th>Nama</th>
        <th>Wilayah Verifikasi</th>
        <th>Status</th>
      </tr>
    </thead>
    <tbody>
      <?php
 if($anggota){
 foreach ($anggota as $danggota) {
 ?>
 <tr>
 <td><?php echo $danggota->nama; ?></td>
 <td><?php echo $danggota->verifikasi; ?></td>
 <td><?php echo $danggota->status; ?></td>
 </tr>
 <?php
 }
 }else{ ?>
 <tr><td colspan='2'>Tidak ada data.</td.</tr>
 <?php } ?>

    </tbody>
  </table></p>
    </div>
    <div id="menu2" class="tab-pane fade">
      <p>
        <table class="table">
          <thead>
            <tr>
              <th>Nama</th>
              <th>Status</th>
            </tr>
          </thead>
          <tbody>
            <?php
       if($approve){
       foreach ($approve as $dapprove) {
       ?>
       <tr>
       <td><?php echo $dapprove->nama; ?></td>
       <td><?php echo $dapprove->status; ?></td>
       <td>
          <?php 
            if($dapprove->status == 'new'){
              echo '<a href="'.$this->uri->baseUri.'dashboard/approve/'.$dapprove->id.'">Approve</a>';
            }
            else{
              echo '<a href="'.$this->uri->baseUri.'dashboard/disapprove/'.$dapprove->id.'">Non Aktifkan</a>';
            }
          ?>
       </td>
       </tr>
       <?php
       }
       }else{ ?>
       <tr><td colspan='2'>Tidak ada data.</td.</tr>
       <?php } ?>

          </tbody>
        </table>
      </p>
    </div>
  </div>
</div>

</body>
</html>