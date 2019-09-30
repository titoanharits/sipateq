<aside>
<div id="sidebar" class="nav-collapse ">
  <!-- sidebar menu start-->

  <ul class="sidebar-menu" id="nav-accordion">
    <h5 class="centered">Halo, {{ Auth::user()->name }}</h5>
    <li class="mt">
      <a  href="/adminHome">
        <i class="fa fa-dashboard"></i>
        <span>Dashboard</span>
      </a>
    </li>

    <li class="sub-menu">
      <a href="javascript:;">
        <i class="fa fa-desktop"></i>
        <span>Data Pegawai</span>
        </a>
      <ul class="sub">
        <li><a href="/pegawaiproduksi">Bagian Produksi</a></li>
        <li><a href="/pegawaipacking">Bagian Packing</a></li>
      </ul>
    </li>

    <li class="">
      <a class="" href="/adminBahanMentah">
        <i class="fa fa-pagelines"></i>
        <span>Bahan Mentah</span>
      </a>
    </li>

    <li class="">
      <a class="" href="/adminStockProduksi">
        <i class="fa fa-pagelines"></i>
        <span>Produksi Berjalan</span>
      </a>
    </li>

    <li class="">
      <a class="" href="/adminProduksiJual">
        <i class="fa fa-pagelines"></i>
        <span>Stock Pakan</span>
      </a>
    </li>
<!--
    <li class="sub-menu">
      <a href="javascript:;">
        <i class="fa fa-dropbox"></i>
        <span>Produksi</span>
      </a>
      <ul class="sub">
        <li><a href="adminProduksiJual">Produk Siap Jual</a></li>
        <li><a href="adminProduksiGagal">Produk Gagal</a></li>
        <li><a href="adminStockProduksi">Stock Produksi</a></li>
      </ul>
    </li> -->



  </ul>

  <!-- sidebar menu end-->
</div>
</aside>
