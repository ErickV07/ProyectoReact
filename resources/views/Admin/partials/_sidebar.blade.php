
        <div class="sidebar" id="sidebar">
          <div class="sidebar-inner slimscroll">
              <div id="sidebar-menu" class="sidebar-menu">
                  <ul>
                      <li class="menu-title">
                      </li>
                      <li class="active">
                          <a href="/dashboard"><i class="fe fe-home"></i> <span>Dashboard</span></a>
                      </li>
                      @if(Auth::check() && Auth::user()->tipo_usuario == "admin" || Auth::user()->tipo_usuario == "SuperAdmin")
                      <li class="submenu">
                          <a href="#"><i class="fe fe-users"></i> <span> Usuarios</span> <span
                                  class="menu-arrow"></span></a>
                          <ul style="display: none;">
                              <li><a href="/usuario/listar">Usuarios</a></li>
                              <li><a href="/lead/list">Leads</a></li>
                          </ul>
                      </li>
                      @endif
                      <li class="submenu">
                          <a href="#"><i class="fe fe-sync"></i> <span> History </span> <span
                                  class="menu-arrow"></span></a>
                          <ul style="display: none;">
                              <li><a href="#"> Call History </a></li>
                              <li><a href="#"> Group History </a></li>
                          </ul>
                      </li>
                      <li>
                          <a href="#"><i class="fe fe-file"></i> <span>Blank Page</span></a>
                      </li>


                      <li class="submenu">
                          <a href="#"><i class="fe fe-layout"></i> <span> Forms <span
                                      class="menu-arrow"></span></span></a>
                          <ul style="display: none;">
                              <li><a href="#">Basic Inputs</a></li>
                              <li><a href="#">Input Groups</a></li>
                          </ul>
                      </li>

                      <li class="submenu">
                          <a href="javascript:void(0);"><i class="fe fe-code"></i> <span>Multi Level</span> <span
                                  class="menu-arrow"></span></a>
                          <ul style="display: none;">
                              <li class="submenu">
                                  <a href="javascript:void(0);"> <span>Level 1</span> <span
                                          class="menu-arrow"></span></a>
                                  <ul style="display: none;">
                                      <li><a href="javascript:void(0);"><span>Level 2</span></a></li>
                                      <li class="submenu">
                                          <a href="javascript:void(0);"> <span> Level 2</span> <span
                                                  class="menu-arrow"></span></a>
                                          <ul style="display: none;">
                                              <li><a href="javascript:void(0);">Level 3</a></li>
                                              <li><a href="javascript:void(0);">Level 3</a></li>
                                          </ul>
                                      </li>
                                      <li><a href="javascript:void(0);"> <span>Level 2</span></a></li>
                                  </ul>
                              </li>
                              <li>
                                  <a href="javascript:void(0);"> <span>Level 1</span></a>
                              </li>
                          </ul>
                      </li>
                  </ul>
              </div>
          </div>
      </div>