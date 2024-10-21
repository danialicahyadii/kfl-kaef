<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link {{ Request::is('admin') ? '' : 'collapsed' }}" href="{{ url('admin') }}">
          <i class="bi bi-dice-2-fill"></i>
          <span>Standing</span>
        </a>
      </li><!-- End Dashboard Nav -->
      <li class="nav-item">
        <a class="nav-link {{ Request::is('admin/bracket') ? '' : 'collapsed' }}" href="{{ url('admin/bracket') }}">
          <i class="bi bi-dice-2-fill"></i>
          <span>Bracket</span>
        </a>
      </li><!-- End Dashboard Nav -->
      <li class="nav-item">
        <a class="nav-link {{ Request::is('admin/match') ? '' : 'collapsed' }}" href="{{ url('admin/match') }}">
          <i class="bi bi-collection-play-fill"></i>
          <span>Match</span>
        </a>
      </li><!-- End Dashboard Nav -->
      <li class="nav-item">
        <a class="nav-link {{ Request::is('admin/team') ? '' : 'collapsed' }}" href="{{ url('admin/team') }}">
          <i class="bi bi-people-fill"></i>
          <span>Team</span>
        </a>
      </li><!-- End Dashboard Nav -->
      <li class="nav-item">
        <a class="nav-link {{ Request::is('admin/news') ? '' : 'collapsed' }}" href="{{ url('admin/news') }}">
          <i class="bi bi-newspaper"></i>
          <span>News</span>
        </a>
      </li><!-- End Dashboard Nav -->
      <li class="nav-item">
        <a class="nav-link {{ Request::is('admin/tentang-kami') ? '' : 'collapsed' }}" href="{{ url('admin/tentang-kami') }}">
          <i class="bi bi-pentagon-half"></i>
          <span>Tentang</span>
        </a>
      </li><!-- End Dashboard Nav -->
    </ul>

  </aside><!-- End Sidebar-->
