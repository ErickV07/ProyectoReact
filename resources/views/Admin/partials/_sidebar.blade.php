
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
                              <li><a href="/usuarios">Usuarios</a></li>
                              <li><a href="/lead/list">Leads</a></li>
                          </ul>
                      </li>
                      @endif
                      <li class="submenu">
                          <a href="#"><i class="fe fe-sync"></i> <span> History </span> <span
                                  class="menu-arrow"></span></a>
                          <ul style="display: none;">
                              <li><a href="call-history.html"> Call History </a></li>
                              <li><a href="group-history.html"> Group History </a></li>
                          </ul>
                      </li>
                      <li class="submenu">
                          <a href="#"><i class="fe fe-gear"></i> <span> Settings </span> <span
                                  class="menu-arrow"></span></a>
                          <ul style="display: none;">
                              <li><a href="general.html">General</a></li>
                              <li><a href="admob.html">Admob </a></li>
                              <li><a href="sinch-settings.html">Sinch Settings </a></li>
                              <li><a href="firebase-settings.html">Firebase Settings </a></li>
                          </ul>
                      </li>
                      <li>
                          <a href="blank-page.html"><i class="fe fe-file"></i> <span>Blank Page</span></a>
                      </li>
                      <li>
                          <a href="vector-maps.html"><i class="fe fe-map"></i> <span>Vector Maps</span></a>
                      </li>
                      <li>
                          <a href="components.html"><i class="fe fe-vector"></i> <span>Components</span></a>
                      </li>
                      <li class="submenu">
                          <a href="#"><i class="fe fe-layout"></i> <span> Forms <span
                                      class="menu-arrow"></span></span></a>
                          <ul style="display: none;">
                              <li><a href="form-basic-inputs.html">Basic Inputs</a></li>
                              <li><a href="form-input-groups.html">Input Groups</a></li>
                              <li><a href="form-horizontal.html">Horizontal Form</a></li>
                              <li><a href="form-vertical.html">Vertical Form </a></li>
                              <li><a href="form-mask.html">Form Mask</a></li>
                              <li><a href="form-validation.html">Form Validation </a></li>
                          </ul>
                      </li>
                      <li class="submenu">
                          <a href="#"><i class="fe fe-table"></i> <span> Tables <span
                                      class="menu-arrow"></span></span></a>
                          <ul style="display: none;">
                              <li><a href="tables-basic.html">Basic Tables </a></li>
                              <li><a href="data-tables.html">Data Table </a></li>
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