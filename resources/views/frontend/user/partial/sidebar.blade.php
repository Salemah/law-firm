 <aside class="main-sidebar">
                    <!-- sidebar-->
                    <section class="sidebar">
                        <!-- sidebar menu-->
                        <ul class="sidebar-menu" data-widget="tree">

                            <li class="header nav-small-cap">PERSONAL</li>

                            <li class="treeview active">
                                <a href="#">
                                    <i class="ti-dashboard"></i>
                                    <span>Dashboard</span>
                                    <span class="pull-right-container">
                                        <i class="fa fa-angle-right pull-right"></i>
                                    </span>
                                </a>
                                <ul class="treeview-menu">
                                    <li><a href="index.html"><i class="ti-more"></i>Material</a></li>
                                    <li><a href="index-2.html"><i class="ti-more"></i>e-Commerce</a></li>
                                    <li><a href="index-3.html"><i class="ti-more"></i>Analytics</a></li>
                                    <li><a href="index-4.html"><i class="ti-more"></i>Hospital</a></li>
                                    <li class="active"><a href="index-5.html"><i class="ti-more"></i>Real Estate</a>
                                    </li>
                                    <li><a href="index-6.html"><i class="ti-more"></i>University</a></li>
                                    <li><a href="index-7.html"><i class="ti-more"></i>Foodplaza</a></li>
                                    <li><a href="index-8.html"><i class="ti-more"></i>CRM</a></li>
                                </ul>
                            </li>














                            

                            <li>
                                <a href="{{ route('logout') }}"
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <i class="ti-power-off"></i>
                                    <span>Log Out</span>
                                </a>
                            </li>
 <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        style="display: none;">
                                        @csrf
                                    </form>
                        </ul>
                    </section>
                </aside>
