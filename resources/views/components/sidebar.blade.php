<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link {{ Request::is('standing') ? '' : 'collapsed' }}" href="{{ url('standing') }}">
          <i class="bi bi-dice-2-fill"></i>
          <span>Standing</span>
        </a>
      </li><!-- End Dashboard Nav -->
      <li class="nav-item">
        <a class="nav-link {{ Request::is('match') ? '' : 'collapsed' }}" href="{{ url('match') }}">
          <i class="bi bi-collection-play-fill"></i>
          <span>Match</span>
        </a>
      </li><!-- End Dashboard Nav -->
      <li class="nav-item">
        <a class="nav-link {{ Request::is('team') ? '' : 'collapsed' }}" href="{{ url('team') }}">
          <i class="bi bi-collection-play-fill"></i>
          <span>Team</span>
        </a>
      </li><!-- End Dashboard Nav -->
    </ul>

  </aside><!-- End Sidebar-->
