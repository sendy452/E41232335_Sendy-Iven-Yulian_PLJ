<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

  <ul class="sidebar-nav" id="sidebar-nav">

    <li class="nav-item">
      <a class="nav-link " href="index.html">
        <i class="bi bi-grid"></i>
        <span>Dashboard</span>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link collapsed" href="">
        <i class="bi bi-grid"></i>
        <span>Profile</span>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link collapsed" data-bs-target="#riwayat-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-layout-text-window-reverse"></i><span>Riwayat Hidup</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="riwayat-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
        <li>
          <a href="{{url('pendidikan')}}">
            <i class="bi bi-circle"></i><span>Pendidikan</span>
          </a>
        </li>
        <li>
          <a href="{{url('pengalaman_kerja')}}">
            <i class="bi bi-circle"></i><span>Pengalmaman Kerja</span>
          </a>
        </li>
      </ul>
    </li>
  </ul>

</aside>
<!-- End Sidebar-->